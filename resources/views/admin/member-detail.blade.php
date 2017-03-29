<div id="page-wrapper">
    <div class="row detailMember">
        <div class="col-lg-12">
          <button class="tutup" onclick="history.back(-1)">X</button>
          <div class="top-info">
            <div class="img-profile">
              <img src="{{ $member->avatar != null ? url('uploads/avatar/'.$member->avatar) : url('uploads/avatar/default.jpg') }}" alt="" />
            </div>
            <div class="info-user">
              <h3>{{ $member->prefix." ".$member->fullName.", ".$member->subfix }}</h3><span class="jabatan-desc">{{ $member->companyName }}</span>
              <ul class="info-user-list">
                <li>
                  <label>Nomor KTP</label>
                  <p>{{ $member->civilizationNo }}</p>
                </li>
                <li>
                  <label>Email</label>
                  <p>{{ $member->email }}</p>
                </li>
                <li>
                  <label>Phone</label>
                  <p>{{ $member->phone }}</p>
                </li>
              </ul>
            </div>
            <div class="clear"></div>
          </div>
          <div class="info-pencaker">
            <div class="info-pencaker-title">
              <h3>Informasi Utama</h3>
            </div>
            <div class="info-pencaker-body">
              <ul>
                <li>
                  <label>Jenis Kelamin</label>
                  <p>{!! config('umum.gender')[$member->gender] !!}</p>
                </li>
                <li>
                  <label>Tanggal Lahir</label>
                  <p>{{ Helpers::indonesian_date($member->birthDate, "l, d F Y","") }}</p>
                </li>
                <li>
                  <label>Tempat Lahir</label>
                  <p>{{ $member->birthPlace }}</p>
                </li>
                <li>
                  <label>Alamat</label>
                  <p>{{ $address }}</p>
                </li>
                <li>
                  <label>Nomor. Telepon Rumah</label>
                  <p>{{ $member->homePhone }}</p>
                </li>
                <li>
                  <label>Pendidikan terakhir</label>
                  <p>{{ $member->education }}</p>
                </li>
                <li>
                  <label>Sertifikasi</label>
                  <p>&nbsp;</p>
                  {!! implode("<p>",explode(";",$member->certificated)) !!}
                </li>
                <li>
                  <label>Tahun Memulai Berkarir di Dunia Higiene Industri</label>
                  <p>{{ $member->startYear }}</p>
                </li>
                <li>
                  <label>Perusahaan / Organisasi / Universitas</label>
                  <p>{{ $member->companyName }}</p>
                </li>
                <li>
                  <label>Jabatan / Posisi</label>
                  <p>{{ $member->position }}</p>
                </li>
                <li>
                  <label>Nomor Telepon Kantor</label>
                  <p>{{ $member->officePhone }}</p>
                </li>
              </ul>
            </div>
          </div>
          <div class="info-pencaker">
            <div class="info-pencaker-title">
              <h3>Informasi Pendidikan</h3>
            </div>
            <div class="info-pencaker-body table-popup">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th width="20%">Tahun</th>
                    <th width="25%">Nama Sekolah</th>
                    <th width="30%">Bidang Keahlian</th>
                    <th width="20%">Jenjang</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($education as $education)
                  <tr>
                    <td>{{ $education->eduYear."-".$education->eduGraduated }}</td>
                    <td>{{ $education->eduName }}</td>
                    <td>{{ $education->eduMayor }}</td>
                    <td>{{ $education->education }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
    </div>
  </div>
</div>