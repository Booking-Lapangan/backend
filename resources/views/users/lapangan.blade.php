@include('layout.navbar')
@include('layout.navbar-nav')

<!-- Main Container -->
<div class="container-fluid">
  <div class="row align-items-start">
      <!-- Card 1 -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card mb-3" style="width: 100%;">
        <img src="{{asset('storage/' . $lapangan->image)}}" class="card-img-top" alt="Lapangan Sintetis 1">
        <div class="card-body">
          <h5 class="card-title fw-bold">{{$lapangan->title}}</h5>
          <p class="card-text">Rp. {{$lapangan->price}}</p>
          <a href="jadwal.html" class="btn btn-primary">Lihat Jadwal</a>
        </div>
      </div>
    </div>
    <!-- End Card 1 -->
  </div>
</div>

@include('layout.footer')
