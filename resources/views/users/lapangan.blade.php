@include('layout.navbar')
@include('layout.navbar-nav')

<!-- Main Container -->
<div class="container-fluid">
  <div class="row align-items-start">
      <!-- Card 1 -->
      @foreach ($lapangan as $item)
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card mb-3" style="width: 100%;">
        <img src="{{asset('storage/' . $item->image)}}" class="card-img-top" alt="Lapangan Sintetis 1">
        <div class="card-body">
          <h5 class="card-title fw-bold">{{$item->title}}</h5>
          <p class="card-text">Rp. {{$item->price}}</p>
          <a href="jadwal.html" class="btn btn-primary">Lihat Jadwal</a>
        </div>
      </div>
    </div>
    <!-- End Card 1 -->
    @endforeach
  </div>
</div>

@include('layout.footer')
