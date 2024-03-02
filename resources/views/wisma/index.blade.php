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
          <a href="javascript:void(0)" class="btn btn-outline-info">Cek Ketersedian</a>
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
          <a href="javascript:void(0)" class="btn btn-outline-danger">Cek Ketersedian</a>
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
              <h5 class="modal-title" id="modalFullTitle">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div id="seat-results">
                <table id="displaySeats" data-seats="seat">
                  <tr>
                    <td id="seat-1" data-name="1">1</td>
                    <td id="seat-2" data-name="2">2</td>
                    <td id="seat-3" data-name="3">3</td>
                    <td id="seat-4" data-name="4">4</td>
                    <td id="seat-5" data-name="5">5</td>
                    <td id="seat-6" data-name="6">6</td>
                    <td id="seat-7" data-name="7">7</td>
                    <td id="seat-8" data-name="8">8</td>
                    <td id="seat-9" data-name="9">9</td>
                    <td id="seat-10" data-name="10">10</td>
                  </tr>
                  <tr>
                    <td id="seat-11" data-name="11">11</td>
                    <td id="seat-12" data-name="12">12</td>
                    <td id="seat-131" data-name="13">13</td>
                    <td id="seat-14" data-name="14">14</td>
                    <td id="seat-15" data-name="15">15</td>
                    <td id="seat-16" data-name="16">16</td>
                    <td id="seat-17" data-name="17">17</td>
                    <td id="seat-18" data-name="18">18</td>
                    <td id="seat-19" data-name="19">19</td>
                    <td id="seat-20" data-name="20">20</td>
                  </tr>
                  <tr>
                    <td class="space">&nbsp;</td>
                    <td class="space">&nbsp;</td>
                    <td class="space">&nbsp;</td>
                    <td class="space">&nbsp;</td>
                    <td class="space">&nbsp;</td>
                    <td class="space">&nbsp;</td>
                    <td class="space">&nbsp;</td>
                    <td class="space">&nbsp;</td>
                    <td class="space">&nbsp;</td>
                    <td class="space">&nbsp;</td>
                  </tr>
                  <tr>
                    <td id="seat-21" data-name="21">21</td>
                    <td id="seat-22" data-name="22">22</td>
                    <td id="seat-23" data-name="23">23</td>
                    <td id="seat-24" data-name="24">24</td>
                    <td id="seat-25" data-name="25">25</td>
                    <td id="seat-26" data-name="26">26</td>
                    <td id="seat-27" data-name="27">27</td>
                    <td id="seat-28" data-name="28">28</td>
                    <td id="seat-29" data-name="29">29</td>
                    <td id="seat-30" data-name="30">30</td>
                  </tr>
                  <tr>
                    <td id="seat-31" data-name="31">31</td>
                    <td id="seat-32" data-name="32">32</td>
                    <td id="seat-33" data-name="33">33</td>
                    <td id="seat-34" data-name="34">34</td>
                    <td id="seat-35" data-name="35">35</td>
                    <td id="seat-36" data-name="36">36</td>
                    <td id="seat-37" data-name="37">37</td>
                    <td id="seat-38" data-name="38">38</td>
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
  const seats = [1, 2, 3];

  // check if seat is available from the server
  for (let i = 0; i < button.length; i++) {
    if (seats.includes(parseInt(button[i].getAttribute('data-name')))) {
      button[i].classList.add('notAvailable');
    }
  }

  // add or remove seat from the array
  button.forEach((btn) => {
    btn.addEventListener('click', () => {
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