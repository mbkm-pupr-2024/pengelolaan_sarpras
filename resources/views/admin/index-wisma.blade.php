@extends('layout.index')
@section('sidebar')
@include('layout.sidebar')
@endsection
@section('nav')
@include('layout.nav')
@endsection

@section('head')
<link href="{{ asset('/assets/vendor/libs/datatables/datatables.min.css') }}" rel="stylesheet">
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
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data master/</span> Asrama & Paviliun</h4>
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="d-flex justify-content-between">
          <div class="head">
            <h5 class="card-header">Asrama & Paviliun</h5>
          </div>
          <div class="my-auto pe-4">
            <a href="{{ route('transactions.wisma.show') }}" class="btn btn-primary me-3">
              <span class="tf-icons bx bx-plus-medical bx-sm"></span>
            </a>
            <a href="{{ route('transactions.wisma.export') }}" class="btn btn-info">
              <span class="tf-icons bx bx-cloud-download bx-sm"></span>
            </a>
          </div>
        </div>
        <div class="table-responsive text-nowrap p-4">
          <table id="datatable1" class="table">
            <thead>
              <tr>
                <th style="width: 10px">✔</th>
                <th>Nama</th>
                <th>Ruangan</th>
                <th>Asal</th>
                <th>Selesai pada</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($transactions as $wisma )
              <tr>
                <th>
                  <input type="checkbox" class="form-check-input" value="{{ $wisma->id }}">
                </th>
                <td><strong>{{ ucfirst($wisma->name) }}</strong></td>
                <td>{{ $wisma->room }}</td>
                <td>
                  {{ $wisma->from}}
                </td>
                <td>{{ $wisma->end }}</td>
                <td>
                  <span class="badge bg-label-{{ (!$wisma->isOut)? 'danger':'success' }} me-1">
                    {{ (!$wisma->isOut)? 'Ditempati':'Selesai' }}
                  </span> 
                </td>
                <td>
                  <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                    data-bs-target="#modalCenter{{ $wisma->id }}"><i class="bx bx-edit-alt me-2"></i>Edit
                  </button>
                </td>
              </tr>

              @include('components.edit-modal')

              @endforeach
            </tbody>
          </table>
          <form action="{{ route('transactions.wisma.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="text" class="d-none" id="selected" name="selected">
            <input type="button" class="btn btn-danger d-none" id="delete" value="Delete" data-bs-toggle="modal"
              data-bs-target="#modalDeleteRooms">

            <!-- Confirm modal -->
            <div class="modal fade" id="modalDeleteRooms" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Hapus ruangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus data ini?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                      Close
                    </button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </div>
                </div>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->

@endsection

@section('script')

<script src="{{ asset('/assets/vendor/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/js/datatables.js') }}"></script>
<script>
  const check = document.querySelectorAll('.form-check-input');
  const deleteBtn = document.getElementById('delete');
  let formSelected = document.getElementById('selected');
  let selected = [];

  check.forEach((c) => {
    c.addEventListener('change', (e) => {
      let value = parseInt(e.target.value)
      if (e.target.checked) {
        selected.push(value);
      } else {
        selected = selected.filter((s) => s !== value);
      }
      formSelected.value = selected;
      console.log(formSelected);

      if (selected.length > 0) {
        deleteBtn.classList.remove('d-none');
      } else {
        deleteBtn.classList.add('d-none');
      }
    });
  });

</script>

@endsection