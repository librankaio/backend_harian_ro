<div class="row">
    <div class="card">
      <h5 class="card-header">Daftar Harian RO</h5>
      <div class="table-responsive text-nowrap mb-4">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Lokasi</th>
              <th>To-Do</th>
              <th>Nama Client</th>
              <th>Outstandings</th>
              <th>Note</th>
              <th>Foto</th>
              <th>Prioritas</th>
              <th>Approval</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @php 
              $no = 0;
            @endphp
            @foreach ($results as $item)
            @php $no++; @endphp
            <tr>
              <td>
                {{ $no}}
              </td>
              <td>{{ $item->code_mlokasi_ro }}</td>
              <td>{{ $item->todo }}</td>
              <td>{{ $item->nama_mclient }}</td>
              <td>Rp.500.000,-</td>
              <td>{{ $item->note }}</td>
              <td>
                @if($item->foto == null)
                <td>N/A</td>
                @else
                <img
                src="/bukti_kunjungan/pic1.png"
                alt=""
                  style="width:160px"
                  class="rounded"
                />
                @endif
              </td>
              <td>{{ $item->disposisi }}</td>
              <td>
                <span class="badge bg-label-primary me-1">Active</span>
              </td>
              <td>
                <div class="dropdown">
                  <button
                    type="button"
                    class="btn p-0 dropdown-toggle hide-arrow"
                    data-bs-toggle="dropdown"
                  >
                    <img
                      src="../assets/img/icons/boxicons/dots-vertical-rounded-regular-24.png"
                      alt="dots-vertical"
                    />
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);">
                      <img
                        src="../assets/img/icons/boxicons/edit-alt-regular-24.png"
                        alt="edit-icon"
                      />
                      Edit
                    </a>
                    <a class="dropdown-item" href="javascript:void(0);">
                      <img
                        src="../assets/img/icons/boxicons/trash-regular-24.png"
                        alt="delete-icon"
                      />
                      Delete
                    </a>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>