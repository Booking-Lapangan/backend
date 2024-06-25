@include('layout.navbar')
<div class="container">
    <div class="row align-items-start">
        <div class="col-md-6 g-col-4">
            <!-- bagian detail pengguna -->
            <div class="p-2 mb-4 border border-dark rounded">
             <h4>Invoice</h4>
             <a href="#" class="text-dark" style="text-decoration-line: none;">
                 <p class="fw-bold">Nama</p>
                 <p class="text-bolder">{{ $user->name }}</p>
         
                 <div class="mb-3">
                     <p class="fw-bold">Jenis Lapangan</p>
                     @if ($groupedBookings->isNotEmpty())
                         @foreach ($groupedBookings as $key => $bookings)
                             @php
                                 $booking = $bookings->first();
                             @endphp
                             <p class="text-bolder">{{ $booking->lapangan->title }} - {{ $booking->schedule->tanggal }}</p>
                         @endforeach
                     @else
                         <p class="text-bolder">Belum booking lapangan.</p>
                     @endif
                 </div>
         
                 {{-- Informasi dari satu booking (misalnya yang pertama) --}}
                 @if ($groupedBookings->isNotEmpty())
                     @php
                         $firstBooking = $groupedBookings->first()->first();
                         $totalPembayaran = 0;
                     @endphp
                     <p class="fw-bold">Tanggal</p>
                     <p class="text-bolder">{{ $firstBooking->schedule->date }}</p>
                     <p class="fw-bold">Waktu Booking</p>
                     @foreach ($groupedBookings as $key => $bookings)
                         @foreach ($bookings as $booking)
                             <p class="text-bolder">{{ $booking->schedule->formatted_time }}</p>
                             @php
                                 // Mengubah harga dari varchar ke float untuk perhitungan
                                 $price = floatval($booking->lapangan->price);
                                 $totalPembayaran += $price;
                             @endphp
                         @endforeach
                     @endforeach
                     <p class="fw-bold">Total Pembayaran</p>
                     <p class="text-bolder">Rp. {{ number_format($totalPembayaran, 0, ',', '.') }}</p>
                 @endif
             </a>
         </div>
         
         
            
            
            
            
       
        </div>
        <div class="col-md-6 g-col-4">
            <div class="container mb-3">
                <div>
                    <!-- Bagian form Input nama tim -->
                    <form action="{{ route('booking.submit', $booking->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="namaTim" class="form-label">Nama Tim</label>
                            <input type="text" class="form-control border border-dark" name="nama_tim" id="namaTim">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control border border-dark" name="email" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="noHp" class="form-label">No Hp</label>
                            <input type="text" class="form-control border border-dark" name="no_hp" id="noHp">
                        </div>
                        <div class="mb-3">
                            <label for="note" class="form-label">Note</label>
                            <textarea class="form-control border border-dark" name="note" id="note" rows="6"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary d-block" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <ul>
            <li>Lakukan Pembayaran Sebelum h-1</li>
            <li>Jika sudah melakukan transaksi kemudian bukti transfer disini</li>
        </ul>
    </div>
</div>

<!-- bagian mokeup Pemberitahuan -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="fa-solid fa-check fw-bolder fs-3" style="color: #1623d8;"></i>
                <p>Tunggu 3 menit admin setelah admin menginformasi pembayaran</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- akhiran bagian mokeup Pemberitahuan -->

@include('layout.footer')