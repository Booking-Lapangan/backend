@include('layout.navbar')
    <!-- Hero Section -->
    <div class="container">
      <div class="bg-container">
        <div class="overlay-text">
          <h1>Selamat Datang di MAHIR FUTSAL!</h1>
          <p>
            Dapatkan pengalaman bermain futsal yang tak terlupakan di MAHIR
            FUTSAL. Jadwalkan pertandingan Anda dengan mudah, temukan lapangan
            yang sesuai, dan nikmati akses yang cepat dan aman untuk memastikan
            momen bermain futsal Anda menjadi luar biasa.
          </p>
          <a class="nav-link" href="#">
            <button type="button" class="btn btn-primary">Book Now</button>
          </a>
        </div>
      </div>

      <!-- Lapangan Section -->
      <div class="container mt-5">
        <div class="text-center mb-4">
          <h3>Lapangan Mahir Futsal</h3>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <img src="assets/img/img3.jpeg" class="card-img-top" alt="Image 1" />
              <div class="card-body text-center">
                <h5 class="card-title">Lapangan 1</h5>
                <p class="card-text">Rp. 100.000-175.000</p>
                <a href="project/jadwal.html" class="btn btn-primary"
                  >Lihat Jadwal</a
                >
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <img src="assets/img/img3.jpeg" class="card-img-top" alt="Image 2" />
              <div class="card-body text-center">
                <h5 class="card-title">Lapangan 2</h5>
                <p class="card-text">Rp. 100.000-175.000</p>
                <a href="project/jadwal.html" class="btn btn-primary"
                  >Lihat Jadwal</a
                >
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <img src="assets/img/img3.jpeg" class="card-img-top" alt="Image 3" />
              <div class="card-body text-center">
                <h5 class="card-title">Lapangan 3</h5>
                <p class="card-text">Rp. 100.000-175.000</p>
                <a href="project/jadwal.html" class="btn btn-primary"
                  >Lihat Jadwal</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Why Choose Us Section -->
      <div class="container mt-5">
        <div class="text-center mb-5">
          <h3><span style="color: blue">Kenapa memilih</span> Mahir.Futsal?</h3>
        </div>
        <div class="row">
          <div class="col-md-6">
            <img src="assets/img/img4.jpeg" style="width: 100%" />
          </div>
          <div class="col-md-6">
            <h5>
              Platform digital kami mempermudah pemain untuk melihat
              ketersediaan lapangan, membooking serta mentransaksi secara
              online, kapanpun dan dimanapun. Mahir.Futsal juga membantu pemilik
              dalam menyediakan jadwal dan menunjukkan harga booking Lapangan
              Futsal.
            </h5>
            <a href="#" class="btn btn-primary mt-4">Booking Sekarang</a>
          </div>
        </div>
      </div>
    </div>
    <!-- End Why Choose Us Section -->

@include('layout.footer')