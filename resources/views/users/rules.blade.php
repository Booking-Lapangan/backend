@include('layout.navbar')
@include('layout.navbar-nav')
<div class="container m-4">
  <div class="row align-items-start">
      <!-- Left Column -->
      <div class="col-md-6">
          <!-- Booking Information -->
          <div class="p-2 mb-4 border border-dark rounded">
              <ul>
                  <li>Pemesanan lapangan valid apabila sudah ada konfirmasi dari online booking system, dan harus ditunjukkan kepada staf Inspire Arena.</li>
                  <li>Pengguna lapangan yang walk-in tetap melakukan pemesanan dan pembayaran via sistem sebelum memasuki lapangan.</li>
                  <li>TIDAK ADA perpanjangan waktu untuk keterlambatan pengguna lapangan di jam reservasi.</li>
                  <li>TIDAK ADA kebijakan Refund dari pihak pengelola; Reschedule bisa dilakukan by request melalui sistem selambatnya H-5.</li>
                  <li>Peminjaman bola bisa dilakukan dengan menitipkan KTP atau SIM ke staf Inspire Arena.</li>
                  <li>Kunci kendaraan Anda di parkiran, dan tunjukkan karcis parkir ketika meninggalkan Inspire Arena.</li>
                  <li>Barang bawaan menjadi tanggung jawab masing-masing; segala bentuk kerusakan dan kehilangan di luar tanggung jawab Inspire Arena.</li>
                  <li>Jagalah kebersihan di seluruh area Inspire Arena dan buanglah sampah ke tempat sampah yang telah disediakan.</li>
                  <li>DILARANG merokok di semua area lapangan, foodcourt dll; merokok hanya diperbolehkan di area yang disediakan di taman belakang.</li>
                  <li>DILARANG membawa air mineral kemasan sekali pakai, kami menyediakan air minum isi ulang secara gratis untuk semua pengunjung.</li>
                  <li>DILARANG makan dan minum di dalam lapangan.</li>
                  <li>DILARANG membawa senjata tajam, minuman keras / alkohol maupun obat-obatan terlarang.</li>
              </ul>
          </div>
          <!-- Booking Steps -->
          <div class="border border-dark rounded p-3">
              <div class="text-center">
                  <h4>Cara Booking</h4>
              </div>
              <div class="container">
                  <div class="row align-items-start">
                      <div class="col-12 col-md-6 border border-dark m-2">
                          <div class="p-2">
                              <p class="fw-bold">1. Buat Profil Akun</p>
                              <p>Untuk memudahkan kamu dalam proses pemesanan, pastikan kamu telah mempunyai akun di website Mahir.Futsal.</p>
                          </div>
                      </div>
                      <div class="col-12 col-md-6 border border-dark m-2">
                          <div class="p-2">
                              <p class="fw-bold">2. Pilih Layanan Sesuai Preferensimu</p>
                              <p>Pilih Layanan yang sesuai dengan preferensi olahragamu. Klik Lapangan yang tersedia untuk melihat jadwal.</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="container">
                  <div class="row align-items-start">
                      <div class="col-12 col-md-6 border border-dark m-2">
                          <div class="p-2">
                              <p class="fw-bold">3. Pilih Tanggal & Waktu Bermain</p>
                              <p>Pilih tanggal & waktu bermain sesuai dengan ketersediaan jadwal di lapangan.</p>
                          </div>
                      </div>
                      <div class="col-12 col-md-6 border border-dark m-2">
                          <div class="p-2">
                              <p class="fw-bold">4. Bermain</p>
                              <p>Setelah permainan selesai lanjut transaksi di admin.</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- Right Column -->
      <div class="col-md-6">
          <!-- Opening Hours -->
          <div class="container text-center mb-3 border border-dark rounded p-3">
              <div class="text-center">
                  <h4>Jam Buka</h4>
              </div>
              <div class="row align-items-start">
                  <div class="col">
                      <h4>Hari</h4>
                      <p>Senin</p>
                      <p>Selasa</p>
                      <p>Rabu</p>
                      <p>Kamis</p>
                      <p>Jum'at</p>
                      <p>Sabtu</p>
                  </div>
                  <div class="col">
                      <h4>Jam</h4>
                      <p>08.00-00.00</p>
                      <p>08.00-00.00</p>
                      <p>08.00-00.00</p>
                      <p>08.00-00.00</p>
                      <p>08.00-00.00</p>
                      <p>08.00-00.00</p>
                  </div>
              </div>
          </div>
          <!-- Location -->
          <div class="border border-dark p-3 rounded">
              <h5>Lokasi</h5>
              <p>Jl. Gatot Subroto No.kav 24-25, RT.2/RW.2, Karet Semanggi, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12930</p>
              <div style="width: 100%; height: 200px;">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2546296992123!2d106.81828007409644!3d-6.230124161011151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699344f2417d09%3A0xc0d39dd39e257d5d!2sMahir%20Academy%20Indonesia!5e0!3m2!1sid!2sid!4v1718351575976!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
          </div>
      </div>
  </div>
</div>
@include('layout.footer')