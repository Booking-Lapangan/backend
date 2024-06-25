
  @include('layout.navbar')
  @include('layout.navbar-nav')

  <!-- Main Container -->
<div class="container-fluid">
    <div class="row align-items-start">
        <!-- Card 1 -->
        @foreach ($gallery as $item)
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card mb-3" style="width: 100%;">
          <img src="{{asset('storage/' . $item->gallery)}}" class="card-img-top" alt="Lapangan Sintetis 1">
        </div>
      </div>
      <!-- End Card 1 -->
      @endforeach
    </div>
  </div>
  

  @include('layout.footer')