<!-- Modal -->

<!-- Sepertinya component ini tidak diperlukan  -->

<div class="modal fade" id="roomsModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFullTitle">Paviliun ini adalah modal {{--  $data['id'] --}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="seat-results">
          <table id="displaySeats" data-seats="seat">
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