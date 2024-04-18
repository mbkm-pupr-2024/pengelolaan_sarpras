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

  @if($errors->any())
  <div class="alert alert-danger">
    <h5 class="text-danger">Masukkan data dengan benar</h5>
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  
  <div class="row">
    <div class="col-xl-6">
      <div class="nav-align-top mb-4">
        <ul class="nav nav-tabs nav-fill" role="tablist">
          <li class="nav-item">
            <button type="button" class="map nav-link active" role="tab"
              data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile"
              aria-selected="false">
              <i class="tf-icons bx bx-user"></i> Wisma
            </button>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="navs-justified-profile"
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
                    <label for="end">Sampai</label>
                    <input id="end" type="date" class="form-control" placeholder=""
                      aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" name="end"/>
                  </div>
                  <div class="mb-3">
                    <label for="basic-select">Wisma</label>
                    <input id="rooms" type="text" class="form-control" placeholder="Cek ketersediaan..."
                      aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" name="rooms" readonly/>
                  </div>
                  <button type="submit" class="btn btn-primary" id="submitBtnForm">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6" id="hidden-select">
      <div class="col-md-8 col-lg-8 mb-3">
        <div class="card h-100 border border-info border-5 border-top-0 border-bottom-0 border-end-0">
          <div class="card-body">
            <h5 class="card-title">Wisma Suhodo</h5>
            <p class="card-text">
              Wisma Suhodo, terletak pada sebelah barat ruang makan 1 yang memiliki 3 lantai dimana untuk penomorannya nomor ganjil pada sebela timur dan nomor genap pada sebela barat
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
              Wisma Surjono, terlatak pada sebela timur ruang makan 1. Wisma Surjono memiliki 3 lantai dimana untuk penomorannya nomor ganjil pada sebela timur dan nomor genap pada sebela barat
            </p>
            <a href="javascript:void(0)" class="btn btn-outline-warning" data-bs-toggle="modal"
              data-bs-target="#roomsSurjono">Cek Ketersedian</a>
          </div>
        </div>
      </div>
      <div class="col-md-8 col-lg-8 mb-3">
        <div class="card h-100 border border-danger border-5 border-top-0 border-bottom-0 border-end-0">
          <div class="card-body">
            <h5 class="card-title">Paviliun</h5>
            <p class="card-text">
              Paviliun terletak pada bagian paling barat. Paviliun diperuntukan untuk orang - orang penting atau para instruktur yang datang untuk memberikan pelatihan. Paviliun memiliki 1 lantai.
            </p>
            <a href="javascript:void(0)" class="btn btn-outline-danger" data-bs-toggle="modal"
              data-bs-target="#roomsPaviliun">Cek Ketersedian</a>
          </div>
        </div>
      </div>

    </div>

  </div>

  @include('components.suhodo-modal')
  @include('components.surjono-modal')
  @include('components.paviliun-modal')

  <!-- Modal Alert -->
  <div class="modal fade" id="modalAlert" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Alert</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id="message"></p>
        </div>
        </div>
      </div>
    </div>
  </div>

<!-- Modal trigger -->
<button type="button" id="modal-alert" class="btn btn-primary invisible" data-bs-toggle="modal" data-bs-target="#modalAlert">
  Launch demo modal
</button>





  @endsection
  <!-- menggunakan onchange pada form yang akan di inputkan, inputan di sesuaikan dengan kebbutuhan masing - masing peminjaman tempat -->

  @section('script')
  <script>
    // Modal Alert
    const modalAlert = document.getElementById('modal-alert');
    let message = document.getElementById('message');
    
    // untuk alert bisa pake toast 

    // const triggerAlert = (teks) => {
    //   message.innerHTML = teks;
    //   modalAlert.click();
    // }

    // Manage rooms 
    // get all the button element
    const button = document.querySelectorAll('td');
    // convert php collection to js array
    const seats = @json($wisma);
    // console.log(seats);
    let limit = document.getElementById('limit').value;
    const newSeats = [];
    // check if seat is available from the server
    for (let i = 0; i < button.length; i++) {
      if (seats.includes((button[i].getAttribute('data-name')))) {
        button[i].classList.add('notAvailable');
      }
    }

    // onchange event to check if the limit is reached
    document.getElementById('limit').addEventListener('input', () => {
      limit = document.getElementById('limit').value;
    });

    // add or remove seat from the array
    button.forEach((btn) => {
      btn.addEventListener('click', () => {

        if (newSeats.length >= limit && !btn.classList.contains('notAvailable')) {
          alert('Anda hanya bisa memilih ' + limit + ' kamar');
          triggerAlert(`Anda hanya bisa memilih ${limit} kamar`);
          return;
        }

        // if seats include on seats array then return
        if (seats.includes(btn.getAttribute('data-name'))) {
          alert('Kamar ' + btn.getAttribute('data-name') + ' untuk saat ini tidak tersedia');
          triggerAlert(`Kamar ${btn.getAttribute('data-name')} untuk saat ini tidak tersedia`);
          return;
        }

        btn.classList.toggle('notAvailable');
        const seatName = btn.getAttribute('data-name');
        if (newSeats.includes(seatName)) {
          const index = newSeats.indexOf(seatName);
          if (index > -1) {
            newSeats.splice(index, 1);
          }
        } else {
          newSeats.push(seatName);
        }
        rooms.value = newSeats;
        console.log(newSeats);
      });
    });
  </script>
  @endsection