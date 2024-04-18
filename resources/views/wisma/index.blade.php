@extends('layout.index')
@section('sidebar')
@include('layout.sidebar')
@endsection
@section('nav')
@include('layout.nav')
@endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ketersediaan/</span> Asrama & Paviliun</h4>
  <div class="row">
    <div class="col-md-6 col-lg-4 mb-3">
      <div class="card h-100 border border-info border-5 border-top-0 border-bottom-0 border-end-0">
        <div class="card-body">
          <h5 class="card-title">Wisma Suhodo</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card's content.
          </p>
          <a href="javascript:void(0)" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#roomsSuhodo">Cek Ketersedian</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 mb-3">
      <div class="card h-100 border border-warning border-5 border-top-0 border-bottom-0 border-end-0">
        <div class="card-body">
          <h5 class="card-title">Wisma Surjono</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card's content.
          </p>
          <a href="javascript:void(0)" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#roomsSurjono">Cek Ketersedian</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 mb-3">
      <div class="card h-100 border border-danger border-5 border-top-0 border-bottom-0 border-end-0">
        <div class="card-body">
          <h5 class="card-title">Paviliun</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card's content.
          </p>
          <a href="javascript:void(0)" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#roomsPaviliun">Cek Ketersedian</a>
        </div>
      </div>
    </div>
  </div>

  @include('components.suhodo-modal')
  @include('components.surjono-modal')
  @include('components.paviliun-modal')
</div>
<script>
    // Manage rooms 
    // get all the button element
    const button = document.querySelectorAll('td');
    // convert php collection to js array
    const seats = @json($wisma);
    console.log(seats);
    // check if seat is available from the server
    for (let i = 0; i < button.length; i++) {
      if (seats.includes((button[i].getAttribute('data-name')))) {
        button[i].classList.add('notAvailable');
      }
    }
</script>
@endsection