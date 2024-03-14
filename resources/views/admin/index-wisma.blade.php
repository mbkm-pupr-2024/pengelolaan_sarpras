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
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <h5 class="card-header">Wisma & Paviliun</h5>
        <div class="table-responsive text-nowrap p-4">
          <table id="datatable1" class="table">
            <thead>
              <tr>
                <th style="width: 10px">✔</th>
                <th>Nama</th>
                <th>Ruangan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($transactions as $t )
              <tr>
                <th>
                  <input type="checkbox" class="form-check-input" value="{{ $t->id }}">
                </th>
                <td><strong>{{ ucfirst($t->name) }}</strong></td>
                <td>{{ $t->room }}</td>
                <td>
                  -
                </td>
                <td><span class="badge bg-label-danger me-1">Ditempati</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i> Detail</a>
                      <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                      <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <form action="{{ route('transactions.wisma.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="text" class="d-none" id="selected" name="selected">
            <input type="button" class="btn btn-danger d-none" id="delete" value="Delete" data-bs-toggle="modal" data-bs-target="#modalDeleteRooms">
            
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