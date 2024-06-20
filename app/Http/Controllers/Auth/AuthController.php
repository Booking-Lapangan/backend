<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use App\Traits\Fonnte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    use Fonnte;

    public function login()
    {
        return view('auth.login');
    }

    public function login_process(Request $request)
    {
        $messages = [
            'login.required' => 'Nomor HP atau Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ];

        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ], $messages);

        $loginType = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $credentials = [
            $loginType => $request->input('login'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->withErrors(['login' => 'Nomor, Email, atau Password salah']);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_process(Request $request)
    {
        $messages = [
            'name.required' => 'Nama wajib diisi',
            'name.min' => 'Nama minimal harus 3 karakter',
            'phone.required' => 'Nomor HP wajib diisi',
            'phone.unique' => 'Nomor telepon sudah digunakan.',
            'phone.min' => 'Nomor HP minimal harus 11 karakter',
            'phone.max' => 'Nomor HP maksimal harus 13 karakter',
            'phone.regex' => 'Format nomor HP tidak valid',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah digunakan.',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'password.min' => 'Password minimal harus 8 karakter',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi',
            'password_confirmation.same' => 'Konfirmasi password tidak cocok',
            'password_confirmation.min' => 'Password minimal harus 8 karakter',
        ];

        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255|string',
            'phone' => 'required|string|min:11|max:13|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8',
        ], $messages);

        $phone = $validatedData['phone'];
        if (Str::startsWith($phone, '62')) {
            $phone = '0' . substr($phone, 2);
        }

        $validatedData['phone'] = $phone;
        $validatedData['otp'] = rand(111111, 999999);

        $user = User::create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'otp' => $validatedData['otp'],
            'access' => "no",
            'role' => "user",
        ]);

        $this->send_message($user->phone, "Ini adalah token anda " . $user->otp);

        return redirect()->route('verify', ['phone' => $user->phone]);
    }

    public function verify()
    {
        return view('auth.verify');
    }

    public function verify_process(Request $request)
    {
        $messages = [
            'otp.required' => 'Kode OTP wajib diisi.',
        ];

        $request->validate([
            'otp' => 'required',
        ], $messages);

        $otp = $request->otp;
        $user = User::where('otp', $otp)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['otp' => 'Token tidak valid']);
        }

        if ($user->access == 'no') {
            $user->update(['access' => 'yes']);
            return redirect()->route('login')->with('success', 'Verifikasi berhasil, silakan login');
        } else {
            return redirect()->back()->withErrors(['otp' => 'Token sudah kadaluwarsa']);
        }
    }

    public function forgot_password()
    {
        return view('auth.forgot_password');
    }


    public function forgot_password_act(Request $request)
    {
        $messages = [
            'credential.required' => 'Email wajib diisi',
            'credential.email' => 'Email tidak valid',
            'credential.exists' => 'Email tidak terdaftar',
        ];

        $request->validate([
            'credential' => 'required|email|exists:users,email',
        ], $messages);

        $email = $request->credential;
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['credential' => 'Email tidak ditemukan']);
        }

        $otp = rand(111111, 999999);

        DB::table('password_resets')->updateOrInsert(
            [
                'email' => $user->email
            ],
            [
                'email' => $user->email,
                'otp' => $otp,
                'created_at' => now()
            ]
        );

        Mail::to($user->email)->send(new ResetPasswordMail($otp));

        return redirect()->route('login')->with('success', 'OTP reset password telah dikirim ke email Anda');
    }

    public function validasi_forgot_password($otp)
    {
        $otpRecord = DB::table('password_resets')->where('otp', $otp)->first();

        if (!$otpRecord) {
            return redirect()->route('login')->with('failed', 'Token tidak valid');
        }

        return view('auth.reset_password', compact('otp'));
    }


    public function validasi_forgot_password_act(Request $request)
    {
        $messages = [

            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'password.min' => 'Password minimal harus 8 karakter',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi',
            'password_confirmation.same' => 'Konfirmasi password tidak cocok',
            'password_confirmation.min' => 'Password minimal harus 8 karakter',
        ];
        $request->validate([
            'otp' => 'required|exists:password_resets,otp',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8',
        ]);

        $otpRecord = DB::table('password_resets')->where('otp', $request->otp)->first();
        $user = User::where('email', $otpRecord->email)->first();

        $user->password = bcrypt($request->password);
        $user->save();

        DB::table('password_resets')->where('otp', $request->otp)->delete();

        return redirect()->route('login')->with('success', 'Password berhasil direset, silakan login');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
