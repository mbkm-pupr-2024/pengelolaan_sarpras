<div class="modal fade" id="roomsPaviliun" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFullTitle">Paviliun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="seat-results">
          <table id="displaySeats" data-seats="seat">
            <tr>
              <td id="seat-2" data-name="Paviliun 48CD - 1">Paviliun 48CD - 1</td>
              <td id="seat-2" data-name="Paviliun 48CD - 2">Paviliun 48CD - 3</td>
            </tr>
            <tr>
              <td id="seat-1" data-name="Paviliun 48CD - 1">Paviliun 48CD - 2</td>
            </tr>
            <tr>
              <td id="seat-1" data-name="Paviliun 48EF - 1">Paviliun 48EF - 1</td>
              <td id="seat-2" data-name="Paviliun 48EF - 3">Paviliun 48EF - 3</td>
            </tr>
            <tr>
              <td id="seat-2" data-name="Paviliun 48EF - 2">Paviliun 48EF - 2</td>
            </tr>
            <tr>
              <td id="seat-1" data-name="Paviliun 48G - 1">Paviliun 48G - 1</td>
              <td id="seat-2" data-name="Paviliun 48G - 2">Paviliun 48G - 2</td>
            </tr>
            <tr>
              <td id="seat-1" data-name="Paviliun 48H - 1">Paviliun 48H - 1</td>
              <td id="seat-2" data-name="Paviliun 48H - 2">Paviliun 48H - 2</td>
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

<script>
  // get all the button element
  const btnPaviliun = document.querySelectorAll('td');
  // convert php collection to js array
  const seatsPav = @json($paviliun);
  // const seatsPav = ["Paviliun 48C - 1", "Paviliun 48D - 1"];

  console.log(seatsPav);
  // let limit = document.getElementById('limit').value;
  const newSeatsPav = [];
  // check if seat is available from the server
  for (let i = 0; i < btnPaviliun.length; i++) {
    if (seatsPav.includes((btnPaviliun[i].getAttribute('data-name')))) {
      btnPaviliun[i].classList.add('notAvailable');
    }
  }

  // onchange event to check if the limit is reached
  document.getElementById('limit').addEventListener('input', () => {
    limit = document.getElementById('limit').value;
  });

  // add or remove seat from the array
  btnPaviliun.forEach((btn) => {
    btn.addEventListener('click', () => {

      if (newSeatsPav.length >= limit && !btn.classList.contains('notAvailable')) {
        alert(`You can only select ${limit} seatsPav`);
        return;
      }

      // if seatsPav include on seatsPav array then return
      if (seatsPav.includes(btn.getAttribute('data-name'))) {
        alert('Seat not available');
        return;
      }

      btn.classList.toggle('notAvailable');
      const seatName = btn.getAttribute('data-name');
      if (newSeatsPav.includes(seatName)) {
        const index = newSeatsPav.indexOf(seatName);
        if (index > -1) {
          newSeatsPav.splice(index, 1);
        }
      } else {
        newSeatsPav.push(seatName);
      }
      rooms.value = newSeatsPav;
      console.log(newSeatsPav);
    });
  });
</script>