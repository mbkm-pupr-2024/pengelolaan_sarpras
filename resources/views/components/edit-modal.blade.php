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
                name="capacity" value="{{ $property->capacity }}"/>
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