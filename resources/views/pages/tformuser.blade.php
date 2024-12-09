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
      <span class="text-muted fw-light">Buku Harian RO/</span> Form User
    </h4>
    <!-- Basic Layout -->
    <div class="row">
      <div class="col-6">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form 1</h5>
            <small class="text-muted float-end">Form 1</small>
          </div>
          <div class="card-body">
            <form action="{{ route('kunjunganropost') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="name_kacab" class="form-label">Nama Kantor Cabang</label>
                        <select id="name_kacab" class="select2 form-select form-select-lg" data-allow-clear="true" name="name_kacab">
                          <option></option>
                          <option value="AK">Alaska</option>
                          <option value="HI">Hawaii</option>
                          <option value="CA">California</option>
                          <option value="NV">Nevada</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Nama Pemasar</label>
                        <input
                          type="text"
                          class="form-control"
                          name="code_ro"
                          readonly="true"
                          value="wqwq"
                        />
                      </div>
                      <div class="mb-3">
                        <label class="form-label">NIK Pekerja</label>
                        <input
                          type="text"
                          class="form-control"
                          name="code_ro"
                          readonly="true"
                          value="wqwq"
                        />
                      </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="jbtn_pemasar" class="form-label">Jabatan Pemasar</label>
                        <select id="jbtn_pemasar" class="select2 form-select form-select-lg" data-allow-clear="true" name="jbtn_pemasar">
                          <option></option>
                          <option value="AK">Alaska</option>
                          <option value="HI">Hawaii</option>
                          <option value="CA">California</option>
                          <option value="NV">Nevada</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Periode Pipeline</label>
                        <input type="text" class="form-control flatpickr-input" name="dt_kunjungan" placeholder="YYYY-MM-DD" id="dt_kunjungan" readonly="readonly" value="{{date('Y-m-d')}}">
                      </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form 2</h5>
                <small class="text-muted float-end">Form 2</small>
              </div>
              <div class="card-body">
                <form action="{{ route('kunjunganropost') }}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Calon User</label>
                            <input
                              type="text"
                              class="form-control"
                              name="code_ro"
                              readonly="true"
                              value="wqwq"
                            />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Tenaga Kerja Pria</label>
                            <input
                              type="text"
                              class="form-control"
                              name="code_ro"
                              value="wqwq"
                            />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Tenaga Kerja Wanita</label>
                            <input
                              type="text"
                              class="form-control"
                              name="code_ro"
                              value="wqwq"
                            />
                          </div>
                          <div class="mb-3">
                            <label for="kab" class="form-label">Kab/Kota</label>
                            <select id="kab" class="select2 form-select form-select-lg" data-allow-clear="true" name="kab">
                              <option></option>
                              <option value="AK">Alaska</option>
                              <option value="HI">Hawaii</option>
                              <option value="CA">California</option>
                              <option value="NV">Nevada</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="job" class="form-label">Job</label>
                            <select id="job" class="select2 form-select form-select-lg" data-allow-clear="true" name="job">
                              <option></option>
                              <option value="AK">Alaska</option>
                              <option value="HI">Hawaii</option>
                              <option value="CA">California</option>
                              <option value="NV">Nevada</option>
                            </select>
                          </div>
                        <div class="mb-3">
                            <label for="bid_usaha" class="form-label">Bidang Usaha</label>
                            <select id="bid_usaha" class="select2 form-select form-select-lg" data-allow-clear="true" name="bid_usaha">
                              <option></option>
                              <option value="AK">Alaska</option>
                              <option value="HI">Hawaii</option>
                              <option value="CA">California</option>
                              <option value="NV">Nevada</option>
                            </select>
                          </div>
                        <div class="mb-3">
                            <label for="kepemilkan" class="form-label">Kepemilikan</label>
                            <select id="kepemilkan" class="select2 form-select form-select-lg" data-allow-clear="true" name="kepemilkan">
                              <option></option>
                              <option value="AK">Alaska</option>
                              <option value="HI">Hawaii</option>
                              <option value="CA">California</option>
                              <option value="NV">Nevada</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Riwayat Usaha</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="riwayat_usaha"></textarea>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Kantor Pusat</label>
                            <input
                              type="text"
                              class="form-control"
                              name="code_ro"
                              value="wqwq"
                            />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Unit Kerja</label>
                            <input
                              type="text"
                              class="form-control"
                              name="code_ro"
                              value="wqwq"
                            />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Informasi Negatif</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Riwayat Kerja Sama</label>
                            <input
                              type="text"
                              class="form-control"
                              name="code_ro"
                              value="wqwq"
                            />
                          </div>
                    </div>
                    <div class="col-6">
                          <div class="mb-3">
                            <label class="form-label">Pengambilan Keputusan</label>
                            <input
                              type="text"
                              class="form-control"
                              name="code_ro"
                              value="wqwq"
                            />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Nama PIC</label>
                            <input
                              type="text"
                              class="form-control"
                              name="code_ro"
                              value="wqwq"
                            />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">NO User (HP/Telp)</label>
                            <input
                              type="text"
                              class="form-control"
                              name="code_ro"
                              value="wqwq"
                            />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Jabatan PIC</label>
                            <input
                              type="text"
                              class="form-control"
                              name="code_ro"
                              value="wqwq"
                            />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Fokus Bisnis</label>
                            <input
                              type="text"
                              class="form-control"
                              name="code_ro"
                              value="wqwq"
                            />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Potensi Bisnis</label>
                            <input
                              type="text"
                              class="form-control"
                              name="code_ro"
                              value="wqwq"
                            />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Vendor Existing</label>
                            <input
                              type="text"
                              class="form-control"
                              name="code_ro"
                              value="wqwq"
                            />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Akhir Masa Kerjasama</label>
                            <input
                              type="text"
                              class="form-control"
                              name="code_ro"
                              value="wqwq"
                            />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Farming/Hunting</label>
                            <input
                              type="text"
                              class="form-control"
                              name="code_ro"
                              value="wqwq"
                            />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Jalur Kerjasama</label>
                            <input
                              type="text"
                              class="form-control"
                              name="code_ro"
                              value="wqwq"
                            />
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Media Penawaran</label>
                            <input
                              type="text"
                              class="form-control"
                              name="code_ro"
                              value="wqwq"
                            />
                          </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
    </div>
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Form 3</h5>
              <small class="text-muted float-end">Form 3</small>
            </div>
            <div class="card-body">
              <form action="{{ route('kunjunganropost') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                      <div class="mb-3">
                        <label class="form-label">Perkiraan Waktu Kerjasama</label>
                        <input type="text" class="form-control flatpickr-input" name="dt_kerjasama" placeholder="YYYY-MM-DD" id="dt_kerjasama" readonly="readonly" value="{{date('Y-m-d')}}">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Legalitas Perusahaan</label>
                        <input
                          type="text"
                          class="form-control"
                          name="code_ro"
                          value="wqwq"
                        />
                      </div>
                      <div class="mb-3">
                        <label for="formFile" class="form-label">AANWIJZING</label>
                        <input class="form-control" type="file" id="formFile" />
                      </div>
                      <div class="mb-3">
                        <label for="formFile" class="form-label">Penawaran Harga/Tender</label>
                        <input class="form-control" type="file" id="formFile" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Penawaran Harga Tender</label>
                        <input
                          type="text"
                          class="form-control"
                          name="code_ro"
                          value="wqwq"
                        />
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Prakiraan Nilai Kerjasama</label>
                        <input
                          type="text"
                          class="form-control"
                          name="code_ro"
                          value="wqwq"
                        />
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Komite/Non Komite</label>
                        <input
                          type="text"
                          class="form-control"
                          name="code_ro"
                          value="wqwq"
                        />
                      </div>
                      <div class="mb-3">
                        <label class="form-label">TOP</label>
                        <input
                          type="text"
                          class="form-control"
                          name="code_ro"
                          value="wqwq"
                        />
                      </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                          <label class="form-label">Note Pertemuan 1</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Note Pertemuan 2</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Note Pertemuan 3</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Note Pertemuan 4</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Note Pertemuan 5</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                        </div>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
    <div class="row pt-4 pb-4">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary" style="width: 100%">
                Simpan
              </button>
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
        $("#name_kacab").select2({
            placeholder : 'Select Nama Kacab',
        });
        $("#jbtn_pemasar").select2({
            placeholder : 'Select Jabatan Pemasar',
        });
        $("#job").select2({
            placeholder : 'Select Job',
        });
        $("#bid_usaha").select2({
            placeholder : 'Select Bid. Usaha',
        });
        $("#kepemilkan").select2({
            placeholder : 'Select Kepemilikan',
        });
        $("#kab").select2({
            placeholder : 'Select Kab/Kota',
        });
        $('#dt_kunjungan').flatpickr({
        // monthSelectorType: "static"
        })
        $('#dt_kerjasama').flatpickr({
        // monthSelectorType: "static"
        })
    })
</script>
@endsection
