@extends('layout.index')
@section('sidebar')
@include('layout.sidebar')
@endsection
@section('nav')
@include('layout.nav')
@endsection

@section('head')
<link href="{{ asset('/assets/vendor/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/vendor/libs/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Peminjaman/</span> Tambah peminjaman</h4>

  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Basic Layout</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
          <form>
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Full Name</label>
              <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-company">Company</label>
              <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc." />
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-email">Email</label>
              <div class="input-group input-group-merge">
                <input type="text" id="basic-default-email" class="form-control" placeholder="john.doe"
                  aria-label="john.doe" aria-describedby="basic-default-email2" />
                <span class="input-group-text" id="basic-default-email2">@example.com</span>
              </div>
              <div class="form-text">You can use letters, numbers & periods</div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-phone">Phone No</label>
              <input type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="658 799 8941" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-message">Message</label>
              <textarea id="basic-default-message" class="form-control"
                placeholder="Hi, Do you have a moment to talk Joe?"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Basic with Icons</h5>
          <small class="text-muted float-end">Merged input group</small>
        </div>
        <div class="card-body">
          <form>
            <div class="mb-3">
              <label class="form-label" for="basic-icon-default-fullname">Nama</label>
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Tulis disini ..."
                  aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" name="name" />
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-icon-default-company">Company</label>
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                <input type="text" id="basic-icon-default-company" class="form-control" placeholder="ACME Inc."
                  aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-icon-default-email">Email</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                <input type="text" id="basic-icon-default-email" class="form-control" placeholder="john.doe"
                  aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
                <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
              </div>
              <div class="form-text">You can use letters, numbers & periods</div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-icon-default-phone">Phone No</label>
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                  placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" />
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-icon-default-message">Catatan tambahan</label>
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>
                <textarea id="basic-icon-default-message" class="form-control"
                  placeholder="Hi, Do you have a moment to talk Joe?" aria-label="Hi, Do you have a moment to talk Joe?"
                  aria-describedby="basic-icon-default-message2"></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Basic</h5>
        </div>
        <div class="card-body">
          <div class="example-container">
            <div class="example-content">
              <input class="form-control flatpickr1" type="text" placeholder="Select Date..">
            </div>
            <div class="example-code">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="html-tab" data-bs-toggle="tab" data-bs-target="#htmlCode"
                    type="button" role="tab" aria-controls="htmlCode" aria-selected="true">HTML</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="js-tab" data-bs-toggle="tab" data-bs-target="#jsCode" type="button"
                    role="tab" aria-controls="jsCode" aria-selected="false">JS</button>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="htmlCode" role="tabpanel" aria-labelledby="html-tab">
                  <pre><code class="html">&lt;input class=&quot;form-control flatpickr1&quot; type=&quot;text&quot; placeholder=&quot;Select Date..&quot;&gt;</code></pre>
                </div>
                <div class="tab-pane fade" id="jsCode" role="tabpanel" aria-labelledby="js-tab">
                  <pre><code class="js">$(".flatpickr1").flatpickr();</code></pre>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">DateTime</h5>
        </div>
        <div class="card-body">
          <div class="example-container">
            <div class="example-content">
              <input class="form-control flatpickr2" type="text" placeholder="Select Date..">
            </div>
            <div class="example-code">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="html-tab4" data-bs-toggle="tab" data-bs-target="#htmlCode4"
                    type="button" role="tab" aria-controls="htmlCode4" aria-selected="true">HTML</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="js-tab4" data-bs-toggle="tab" data-bs-target="#jsCode4" type="button"
                    role="tab" aria-controls="jsCode4" aria-selected="false">JS</button>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="htmlCode4" role="tabpanel" aria-labelledby="html-tab4">
                  <pre><code class="html">&lt;input class=&quot;form-control flatpickr2&quot; type=&quot;text&quot; placeholder=&quot;Select Date..&quot;&gt;</code></pre>
                </div>
                <div class="tab-pane fade" id="jsCode4" role="tabpanel" aria-labelledby="js-tab4">
                  <pre><code class="js">$(".flatpickr2").flatpickr({ enableTime: true, dateFormat: "Y-m-d H:i",});</code></pre>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Basic</h5>
        </div>
        <div class="card-body">
          <p class="card-description">Select2 was designed to be a replacement for the standard
            <code>&lt;select&gt;</code> box that is displayed by the browser. By default it supports all options and
            operations that are available in a standard select box, but with added flexibility.
          </p>
          <div class="example-container">
            <div class="example-content">
              <select class="js-states form-control" tabindex="-1" style="display: none; width: 100%">
                <optgroup label="Alaskan/Hawaiian Time Zone">
                  <option value="AK">Alaska</option>
                  <option value="HI">Hawaii</option>
                </optgroup>
                <optgroup label="Pacific Time Zone">
                  <option value="CA">California</option>
                  <option value="NV">Nevada</option>
                  <option value="OR">Oregon</option>
                  <option value="WA">Washington</option>
                </optgroup>
                <optgroup label="Mountain Time Zone">
                  <option value="AZ">Arizona</option>
                  <option value="CO">Colorado</option>
                  <option value="ID">Idaho</option>
                  <option value="MT">Montana</option>
                  <option value="NE">Nebraska</option>
                  <option value="NM">New Mexico</option>
                  <option value="ND">North Dakota</option>
                  <option value="UT">Utah</option>
                  <option value="WY">Wyoming</option>
                </optgroup>
                <optgroup label="Central Time Zone">
                  <option value="AL">Alabama</option>
                  <option value="AR">Arkansas</option>
                  <option value="IL">Illinois</option>
                  <option value="IA">Iowa</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="MN">Minnesota</option>
                  <option value="MS">Mississippi</option>
                  <option value="MO">Missouri</option>
                  <option value="OK">Oklahoma</option>
                  <option value="SD">South Dakota</option>
                  <option value="TX">Texas</option>
                  <option value="TN">Tennessee</option>
                  <option value="WI">Wisconsin</option>
                </optgroup>
                <optgroup label="Eastern Time Zone">
                  <option value="CT">Connecticut</option>
                  <option value="DE">Delaware</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="IN">Indiana</option>
                  <option value="ME">Maine</option>
                  <option value="MD">Maryland</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MI">Michigan</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NY">New York</option>
                  <option value="NC">North Carolina</option>
                  <option value="OH">Ohio</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="VT">Vermont</option>
                  <option value="VA">Virginia</option>
                  <option value="WV">West Virginia</option>
                </optgroup>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
<!-- menggunakan onchange pada form yang akan di inputkan, inputan di sesuaikan dengan kebbutuhan masing - masing peminjaman tempat -->

@section('script')
<script src="{{ asset('/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('/assets/vendor/libs/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/js/select2.js') }}"></script>
<script>
  $(".flatpickr1").flatpickr();
  $(".flatpickr2").flatpickr({ enableTime: true, dateFormat: "Y-m-d H:i", });
</script>
@endsection