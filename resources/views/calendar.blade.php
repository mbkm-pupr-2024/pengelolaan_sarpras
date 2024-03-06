@extends('layout.index')
@section('sidebar')
@include('layout.sidebar')
@endsection
@section('nav')
@include('layout.nav')
@endsection
@section('content')
<!-- Content -->

@section('head')
<link href="{{ asset('/assets/vendor/libs/fullcalendar/lib/main.min.css') }}" rel="stylesheet">
@endsection

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Calendar</h4>
  <div class="row">
    <div class="col">
      <div class="card calendar-container">
        <div class="card-body">
          <div id="calendar"></div>
        </div>
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
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialDate: new Date(),
      selectable: true,
      businessHours: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        {
          title: 'Business Lunch',
          start: '2024-03-03T09:00:00',
          end: '2024-03-06T14:00:00'
        },
        {
          title: 'Long Event',
          start: '2024-03-07',
          end: '2024-03-10'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2024-03-09T16:00:00'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2023-03-16T16:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2024-03-28'
        }
      ]
    });

    calendar.render();
  });
</script>
@endsection