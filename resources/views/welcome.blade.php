@extends('layout.index')
@section('sidebar')
@include('layout.sidebar')
@endsection
@section('nav')
@include('layout.nav')
@endsection
@section('content')

@section('head')
<link href="{{ asset('/assets/vendor/libs/fullcalendar/lib/main.min.css') }}" rel="stylesheet">
@endsection

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard/</span> Dashboard</h4>
    <div class="row">
        <div class="col-lg-6  mb-4 order-0">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="text-nowrap mb-2">
                            <span class="badge bg-label-success me-2">
                                <i class="bx bx-task"></i>
                            </span>
                            Kegiatan
                        </h4>
                    </div>
                    <table class="table table-hover mb-3">
                        <thead>
                            <tr>
                                <th>Event</th>
                                <th>Tanggal</th>
                                <th>Ruangan</th>
                            </tr>
                        </thead>
                        @foreach ( $events as $e )
                        <tbody>
                            <tr>
                                <td>{{ ucfirst($e->kegiatan) }}</td>
                                <td>{{ date("d-m-Y", strtotime($e->start)) . " | " . date("d-m-Y", strtotime($e->end))
                                    }}</td>
                                <td>{{ $e->properties->name }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    @if (Auth::user()->role == 'admin')
                    <a href="{{ route('transactions.ruangan.detail') }}" class="btn btn-success">More</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="text-nowrap mb-2">
                            <span class="badge bg-label-danger me-2">
                                <i class="bx bx-buildings"></i>
                            </span>
                            Paviliun
                        </h4>
                    </div>
                    <div class="capacity">
                        <div class="d-flex justify-content-evenly">
                            <div class="left">
                                <span class="d-block mb-1">Terisi</span>
                                <h4 class="card-title text-nowrap mb- text-danger text-center">{{ $paviliun }}</h4>
                            </div>
                            <div class="right">
                                <span class="d-block mb-1">Kosong</span>
                                <h4 class="card-title text-nowrap mb-2 text-success text-center">{{ $paviliunAvailable
                                    }}</h4>
                            </div>
                        </div>
                        @if(Auth::user()->role == 'admin')
                        <a href="{{ route('wisma-admin') }}" class="btn btn-danger">More</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="text-nowrap mb-2">
                            <span class="badge bg-label-warning me-2">
                                <i class="bx bx-home"></i>
                            </span>
                            Asrama
                        </h4>
                    </div>
                    <div class="capacity">
                        <div class="d-flex justify-content-evenly">
                            <div class="left">
                                <span class="d-block mb-1">Terisi</span>
                                <h4 class="card-title text-nowrap mb- text-danger text-center">{{ $wisma }}</h4>
                            </div>
                            <div class="right">
                                <span class="d-block mb-1">Kosong</span>
                                <h4 class="card-title text-nowrap mb-2 text-success text-center">{{ $wismaAvailable }}
                                </h4>
                            </div>
                        </div>
                        @if(Auth::user()->role == 'admin')
                        <a href="{{ route('wisma-admin') }}" class="btn btn-warning">More</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h1>Today events</h1>
                            <h5 class="card-title text-primary">Congratulations John! 🎉</h5>
                            <p class="mb-4">
                                Di dashboard diisi jumlah kamar dan ruangan yang tersedia untuk di pinjamkan
                                You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                                your profile.
                            </p>

                            <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4 order-0">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="text-nowrap mb-2">
                            <span class="badge bg-label-primary me-2">
                                <i class="bx bx-calendar"></i>
                            </span>
                            Kalender
                        </h4>
                    </div>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    @endsection

    @section('script')
    <script src="{{ asset('/assets/vendor/libs/fullcalendar/lib/main.min.js') }}"></script>
    <script>

        const venue = document.getElementById('venue');

        // check available ruangan berdasarkan tanggal
        // venue.addEventListener('change', async function() {
        //   const start = document.getElementById('start').value;
        //   const end = document.getElementById('end').value;
        //   const propertyId = venue.value;

        //   const response = await fetch(`/api/check?start=${start}&end=${end}&property_id=${propertyId}`);
        //   const data = await response.json();

        //   if (data.length > 0) {
        //     alert('Ruangan sudah terpakai');
        //     venue.value = '';
        //   }
        // });

        const getEvents = async () => {
            const response = await fetch('/api/events');
            const data = await response.json();
            return data;
        }

        document.addEventListener('DOMContentLoaded', async function () {
            var calendarEl = document.getElementById('calendar');
            const btnTrig = document.getElementById('btn-trigger');
            const startDate = document.getElementById('start');
            const endDate = document.getElementById('end');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialDate: new Date(),
                // customButtons: {
                // addEventButton: {
                //     text: 'Add Event',
                //     click: function() {
                //       btnTrig.click();
                //     }
                //   }
                // },
                // headerToolbar: {
                //   left: 'addEventButton',
                //   center: 'title',
                // },
                // selectable: true,
                // eventClick: function(arg) {
                //   console.log(arg.event.title);
                // },
                // select: function(arg) {
                //   // convert to dete input value 
                //   console.log(arg.start);
                //   // startDate.value = new Date(arg.start).toISOString().slice(0, 16);
                //   // endDate.value = new Date(arg.end).toISOString().slice(0, 16);
                //   btnTrig.click();
                // },
                // businessHours: true,
                // dayMaxEvents: true, // allow "more" link when too many events
                events: await getEvents(),
            });

            calendar.render();
        });
    </script>
    @endsection