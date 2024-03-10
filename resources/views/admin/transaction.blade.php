@extends('layout.index')
@section('sidebar')
@include('layout.sidebar')
@endsection
@section('nav')
@include('layout.nav')
@endsection

@section('head')
<link href="{{ asset('/assets/vendor/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/vendor/libs/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')

@if (session('success'))
<x-toast bgColor="bg-success" title="Success">
  {{ session('success') }}
</x-toast>
@endif

@if (session('failed'))
<x-toast bgColor="bg-danger" title="Failed">
  {{ session('failed') }}
</x-toast>
@endif

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Peminjaman/</span> Tambah peminjaman</h4>

  <!-- <div>
    <div class="alert alert-danger">
      <h5 class="text-danger">Masukkan data dengan benar</h5>
      <ul>
        <li>Error error</li>
        <li>Error error</li>
        <li>Error error</li>
        <li>{{ session('tab') }}</li>
      </ul>
    </div>
  </div> -->
  <div class="row">
    <div class="col-xl-6">
      <div class="nav-align-top mb-4">
        <ul class="nav nav-tabs nav-fill" role="tablist">
          <li class="nav-item">
            <button type="button" class="map nav-link {{ (session('tab')) ? '' : 'active' }}" role="tab"
              data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home"
              aria-selected="true">
              <i class="tf-icons bx bx-home"></i> Ruangan
            </button>
          </li>
          <li class="nav-item">
            <button type="button" class="map nav-link {{ (session('tab')) ? 'active' : '' }}" role="tab"
              data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile"
              aria-selected="false">
              <i class="tf-icons bx bx-user"></i> Wisma
            </button>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade {{ (session('tab')) ? '' : 'show active' }}" id="navs-justified-home"
            role="tabpanel">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Peminjaman Ruangan</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Kegiatan</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                      <input type="text" class="form-control" id="basic-icon-default-fullname"
                        placeholder="Tulis disini ..." aria-label="John Doe"
                        aria-describedby="basic-icon-default-fullname2" name="name" />
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label mb-3" for="basic-date-time">Tanggal mulai</label>
                    <input class="form-control" type="date" placeholder="Select Date.." id="basic-date-time"
                      name="start">
                  </div>
                  <div class="mb-3">
                    <label class="form-label mb-3" for="basic-date-time">Tanggal selesai</label>
                    <input class="form-control" type="date" placeholder="Select Date.." id="basic-date-time" name="end">
                  </div>
                  <div class="mb-3">
                    <label for="basic-select">Venue</label>
                    <select class="js-states form-control" tabindex="-1" style="display: none; width: 100%"
                      id="basic-select" name="property_id">
                      <option value="" selected disabled>Pilih tempat</option>
                      @foreach ($aulaKelas as $ak)
                      <option value="{{ $ak->id }}">{{ $ak->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
          <div class="tab-pane fade {{ (session('tab')) ? 'show active' : '' }}" id="navs-justified-profile"
            role="tabpanel">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Pendataan wisma</h5>
              </div>
              <div class="card-body">
                <form action="{{ route('transactions.wisma.store') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Nama</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                      <input type="text" class="form-control" id="basic-icon-default-fullname"
                        placeholder="Tulis disini ..." aria-label="John Doe"
                        aria-describedby="basic-icon-default-fullname2" name="name" />
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Asal</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"><i
                          class="bx bx-location-plus"></i></span>
                      <input type="text" class="form-control" id="basic-icon-default-fullname"
                        placeholder="Tulis disini ..." aria-label="John Doe"
                        aria-describedby="basic-icon-default-fullname2" name="asal" />
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="limit">Jumlah</label>
                    <input id="limit" type="number" class="form-control" placeholder="Tulis disini ..."
                      aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" min="0" value="0"/>
                  </div>
                  <div class="mb-3">
                    <label for="basic-select">Wisma</label>
                    <input id="rooms" type="text" class="form-control" placeholder="Cek ketersediaan..."
                      aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" name="rooms" />
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 d-none" id="hidden-select">
      <div class="col-md-8 col-lg-8 mb-3">
        <div class="card h-100 border border-info border-5 border-top-0 border-bottom-0 border-end-0">
          <div class="card-body">
            <h5 class="card-title">Wisma Suhodo</h5>
            <p class="card-text">
              Some quick example text to build on the card title and make up the bulk of the card's content.
            </p>
            <a href="javascript:void(0)" class="btn btn-outline-info" data-bs-toggle="modal"
              data-bs-target="#roomsSuhodo">Cek Ketersedian</a>
          </div>
        </div>
      </div>
      <div class="col-md-8 col-lg-8 mb-3">
        <div class="card h-100 border border-warning border-5 border-top-0 border-bottom-0 border-end-0">
          <div class="card-body">
            <h5 class="card-title">Wisma Surjono</h5>
            <p class="card-text">
              Some quick example text to build on the card title and make up the bulk of the card's content.
            </p>
            <a href="javascript:void(0)" class="btn btn-outline-warning" data-bs-toggle="modal"
              data-bs-target="#roomsModal">Cek Ketersedian</a>
          </div>
        </div>
      </div>
      <div class="col-md-8 col-lg-8 mb-3">
        <div class="card h-100 border border-danger border-5 border-top-0 border-bottom-0 border-end-0">
          <div class="card-body">
            <h5 class="card-title">Paviliun</h5>
            <p class="card-text">
              Some quick example text to build on the card title and make up the bulk of the card's content.
            </p>
            <a href="javascript:void(0)" class="btn btn-outline-danger" data-bs-toggle="modal"
              data-bs-target="#roomsPaviliun">Cek Ketersedian</a>
          </div>
        </div>
      </div>

    </div>

  </div>

  @include('components.suhodo-modal', ['wisma' => $wisma])
  @include('components.paviliun-modal', ['paviliun' => $paviliun])

  @endsection
  <!-- menggunakan onchange pada form yang akan di inputkan, inputan di sesuaikan dengan kebbutuhan masing - masing peminjaman tempat -->

  @section('script')
  <script src="{{ asset('/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
  <script src="{{ asset('/assets/vendor/libs/select2/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('/assets/vendor/js/select2.js') }}"></script>
  <script>
    $(".flatpickr1").flatpickr();
    // $(".flatpickr2").flatpickr({ enableTime: true, dateFormat: "Y-m-d H:i", });
        // function to show or hide the hidden select rooms
    const map = document.querySelectorAll('.map');
    const hiddenSelect = document.getElementById('hidden-select');
    const rooms = document.getElementById('rooms');

    map.forEach((m) => {
      m.addEventListener('click', () => {
        if (map[1].classList.contains('active')) {
          hiddenSelect.classList.remove('d-none');
        } else {
          hiddenSelect.classList.add('d-none');
        }
      });
    });
 
  </script>
  @endsection