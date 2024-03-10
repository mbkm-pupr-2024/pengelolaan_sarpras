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
                <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>{{ ucfirst($t->name) }}</strong></td>
                <td>{{ $t->properties->name }}</td>
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

@endsection