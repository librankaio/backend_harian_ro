@section('vendorcss')
{{-- <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />  --}}
    <link rel="stylesheet" href="{{ asset('../assets/vendor/libs/flatpickr/flatpickr.css') }}"/>
<link rel="stylesheet" href="{{ asset('../assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
<link rel="stylesheet" href="{{ asset('../assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
<link rel="stylesheet" href="{{ asset('../assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
<link rel="stylesheet" href="{{ asset('../assets/vendor/libs/pickr/pickr-themes.css') }}" />
@stop
@extends('layouts.main')
@section('content')
{{-- <div class="container-xxl flex-grow-1 container-p-y"> --}}
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
      <span class="text-muted fw-light">Buku Harian RO/</span> Buat
      Kunjungan RO
    </h4>
    <!-- Basic Layout -->
    <div class="row">
      <div class="col-6">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Basic Layout</h5>
            <small class="text-muted float-end">Pengajuan kunjungan</small>
          </div>
          <div class="card-body">
            <form action="{{ route('kunjunganropost') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-6">
                  <div class="mb-3">
                    <label class="form-label">Code Kunjungan</label>
                    <input
                      type="text"
                      class="form-control"
                      id="defaultFormControlInput"
                      aria-describedby="defaultFormControlHelp"
                      name="code_kunjungan"
                      readonly="true"
                      value="wqIIIII6721"
                    />
                  </div>
                  <div class="mb-3">
                    <label for="name_ro" class="form-label">Nama RO</label>
                    <select id="name_ro" class="select2 form-select form-select-lg" data-allow-clear="true" name="name_ro">
                      <option></option>
                      <option value="AK">Alaska</option>
                      <option value="HI">Hawaii</option>
                      <option value="CA">California</option>
                      <option value="NV">Nevada</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <select id="lokasi" class="select2 form-select form-select-lg" data-allow-clear="true" name="lokasi">
                      <option></option>
                      <option value="AK">Alaska</option>
                      <option value="HI">Hawaii</option>
                      <option value="CA">California</option>
                      <option value="NV">Nevada</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="jns_kunjungan" class="form-label">Jenis Kunjungan</label>
                    <select id="jns_kunjungan" class="select2 form-select form-select-lg" data-allow-clear="true" name="jns_kunjungan">
                      <option></option>
                      <option value="AK">Alaska</option>
                      <option value="HI">Hawaii</option>
                      <option value="CA">California</option>
                      <option value="NV">Nevada</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">To-Do</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">
                    Simpan
                  </button>
                </div>
                <div class="col-6">
                  <div class="mb-3">
                    <label for="nama_client" class="form-label">Nama Client</label>
                    <select id="nama_client" class="select2 form-select form-select-lg" name="nama_client">
                      <option></option>
                      <option value="AK">Alaska</option>
                      <option value="HI">Hawaii</option>
                      <option value="CA">California</option>
                      <option value="NV">Nevada</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Code RO</label>
                    <input
                      type="text"
                      class="form-control"
                      name="code_ro"
                      readonly="true"
                      value="wqwq"
                    />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Waktu Kunjungan</label>
                    <input type="text" class="form-control flatpickr-input" name="dt_kunjungan" placeholder="YYYY-MM-DD" id="dt_kunjungan" readonly="readonly" value="{{date('Y-m-d')}}">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Outstanding</label>
                    <input
                      type="text"
                      class="form-control"
                      id="defaultFormControlInput"
                      placeholder="John Doe"
                      aria-describedby="defaultFormControlHelp"
                      name="outstanding"
                    />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Disposisi</label>
                    <select id="disposisi" class="select2 form-select form-select-lg" data-allow-clear="true" name="disposisi">
                      <option></option>
                      <option value="AK">Alaska</option>
                      <option value="HI">Hawaii</option>
                      <option value="CA">California</option>
                      <option value="NV">Nevada</option>
                    </select>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
@section('vendorjs')
    <script src="{{ asset('../assets/vendor/libs/i18n/i18n.js') }}"></script>
    {{-- <script src="{{ asset('../assets/vendor/libs/moment/moment.js') }}"></script> --}}
    <script src="{{ asset('../assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('../assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('../assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
    <script src="{{ asset('../assets/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('../assets/vendor/libs/pickr/pickr.js') }}"></script>
@stop
@section('pagejs')
  <script src="{{ asset('../assets/js/forms-pickers.js') }}"></script>
@stop
@section('botscripts')
<script type="text/javascript">
    $(document).ready(function() {
        $("#lokasi").select2({
            placeholder : 'Select Lokasi',
        });
        $("#jns_kunjungan").select2({
            placeholder : 'Select Jenis Kunjungan',
        });
        $("#nama_client").select2({
            placeholder : 'Select Client',
        });
        $("#disposisi").select2({
            placeholder : 'Select Disposisi',
        });
        $("#name_ro").select2({
            placeholder : 'Select Nama RO',
        });
        $('#dt_kunjungan').flatpickr({
        // monthSelectorType: "static"
        })
    })
</script>
@endsection
