@extends('layout.index')
@section('sidebar')
@include('layout.sidebar')
@endsection
@section('nav')
@include('layout.nav')
@endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-md-6 col-lg-4 mb-3">
      <div class="card h-100 border border-info border-5 border-top-0 border-bottom-0 border-end-0">
        <div class="card-body">
          <h5 class="card-title">Wisma Suhodo</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card's content.
          </p>
          <a href="javascript:void(0)" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#roomsModal">Cek Ketersedian</a>
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
          <a href="javascript:void(0)" class="btn btn-outline-warning">Cek Ketersedian</a>
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
          <a href="javascript:void(0)" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#fullscreenModal">Cek Ketersedian</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <small class="text-light fw-semibold">Fullscreen</small>
    <div class="mt-3">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal">
        Launch modal
      </button>

      <!-- Modal -->
      <div class="modal fade" id="fullscreenModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalFullTitle">Paviliun</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div id="seat-results">
                <table id="displaySeats" data-seats="seat" >
                  <tr>
                    <td id="seat-2" data-name="Paviliun 48C - 1">Paviliun 48C - 1</td>
                    <td id="seat-2" data-name="Paviliun 48C - 2">Paviliun 48C - 3</td>
                  </tr>
                  <tr>
                    <td id="seat-1" data-name="Paviliun 48D - 1">Paviliun 48D - 2</td>
                  </tr>
                  <tr>
                    <td id="seat-1" data-name="Paviliun 48E - 1">Paviliun 48E - 1</td>
                    <td id="seat-2" data-name="Paviliun 48E - 3">Paviliun 48E - 3</td>
                  </tr>
                  <tr>
                    <td id="seat-2" data-name="Paviliun 48E - 2">Paviliun 48F - 2</td>
                  </tr>
                  <tr>
                    <td id="seat-1" data-name="Paviliun 48G - 1">Paviliun 48G - 1</td>
                    <td id="seat-2" data-name="Paviliun 48G - 2">Paviliun 48G - 2</td>
                  </tr>
                  <tr>
                    <td id="seat-1" data-name="Paviliun 48G - 1">Paviliun 48H - 1</td>
                    <td id="seat-2" data-name="Paviliun 48G - 2">Paviliun 48H - 2</td>
                  </tr>
                  <tr>
                    <td id="seat-1" data-name="Paviliun 48I - 1">Paviliun 48I - 1</td>
                    <td id="seat-2" data-name="Paviliun 48I - 2">Paviliun 48I - 2</td>
                  </tr>
                  <tr>
                    <td id="seat-1" data-name="Paviliun 48J - 1">Paviliun 48J - 1</td>
                    <td id="seat-2" data-name="Paviliun 48J - 2">Paviliun 48J - 2</td>
                  </tr>
                </table>
                <div style="text-align: center; color: #9a031e; font-weight: bold;">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  const button = document.querySelectorAll('td');
  const seats = ["Paviliun 48C - 1", "Paviliun 48D - 1"];

  // check if seat is available from the server
  for (let i = 0; i < button.length; i++) {
    if (seats.includes((button[i].getAttribute('data-name')))) {
      button[i].classList.add('notAvailable');
    }
  }

  // add or remove seat from the array
  button.forEach((btn) => {
    btn.addEventListener('click', () => {

      if (seats.length >= 4 && !seats.includes(btn.getAttribute('data-name'))) {
        alert('You can only select 2 seats');
        return;
      }

      btn.classList.toggle('notAvailable');
      const seatName = btn.getAttribute('data-name');
      if (seats.includes(seatName)) {
        const index = seats.indexOf(seatName);
        if (index > -1) {
          seats.splice(index, 1);
        }
      } else {
        seats.push(seatName);
      }
      console.log(seats);
    });
  });
</script>
@endsection

-- include('components.rooms-modal', [
    'data' => [
        'id' => '1',
        'title' => 'Wisma Suhodo',
        'seats' => [
            'Suhodo 109',
            'Suhodo 110',
            'Suhodo 111',
            'Suhodo 112',
            'Suhodo 113',
            'Suhodo 114',
            'Suhodo 115',
        ]
    ]
  ]); -- 