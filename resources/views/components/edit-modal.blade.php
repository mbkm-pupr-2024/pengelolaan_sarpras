@if (isset($property))
<div class="modal fade" id="modalCenter{{ $property->id }}" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Edit ruangan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('properties.update', $property->id) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameWithTitle" class="form-label">Nama Ruangan</label>
              <input type="text" id="nameWithTitle" class="form-control" placeholder="Masukkan nama ruangan" name="name"
                value="{{ $property->name }}" />
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
              <label for="exampleFormControlSelect1" class="form-label">Jenis Sarana</label>
              <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example"
                name="type">
                <option value="kelas" {{ ($property->type == 'kelas') ? 'selected' : '' }}>Kelas</option>
                <option value="aula" {{ ($property->type == 'aula') ? 'selected' : '' }}>Aula</option>
              </select>
            </div>
            <div class="col mb-0">
              <label for="dobWithTitle" class="form-label">Kapasistas</label>
              <input type="number" id="dobWithTitle" class="form-control" placeholder="Kapasistas ruangan" min="1"
                name="capacity" value="{{ $property->capacity }}" />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@else
<div class="modal fade" id="modalCenter{{ $t->id }}" tabindex="-1" data-bs-backdrop="static" role="dialog"
  aria-labelledby="addEventLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="{{ route('transactions.ruangan.update', $t->id) }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="addEventLabel">Edit Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="office" class="form-label">Instansi</label>
            <input type="text" class="form-control" id="office" name="office" required value="{{ $t->instansi }}">
          </div>
          <div class="mb-3">
            <label for="event" class="form-label">Kegiatan</label>
            <input type="text" class="form-control" id="event" name="event" required value="{{ $t->kegiatan }}">
          </div>
          <div class="row">
            <div class="col mb-3">
              <label for="start" class="form-label">Mulai</label>
              <input type="date" class="form-control" id="start" name="start" required value="{{ $t->start }}">
            </div>
            <div class="col mb-3">
              <label for="end" class="form-label">Selesai</label>
              <input type="date" class="form-control" id="end" name="end" required value="{{ $t->end }}">
            </div>
          </div>
          <div class="mb-3">
            <label for="venue" class="form-label">Ruangan</label>
            <select class="form-select" id="venue" name="venue" required>
              <option selected disabled>Pilih Ruangan</option>
              @foreach ($ruangan as $property)
              <option value="{{ $property->id }}" {{ ($property->id == $t->property_id)? 'selected' : '' }}>{{
                $property->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $t->description }}</textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endif