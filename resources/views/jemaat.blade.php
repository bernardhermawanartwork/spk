@auth
    @extends('layout.main')
    @section('content')
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>{{ $page_title }}</h1>
                            <span>{{ $page_description }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Form Tambah Penerima</h5>
                            </div>
                            <div class="card-body">
                                <div class="example-container">
                                    <div class="example-content">
                                        <form action="/jemaat/tambah" method="POST">
                                            
                                                @if(session()->has('message'))
                                                <div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
                                                    <div class="alert-content">
                                                        <span class="alert-title">Sukses!</span>
                                                        <span class="alert-text">{{ session('message') }}</span>
                                                    </div>                                                
                                                 </div>
                                                @endif
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="form-floating mb-3">
                                                    <input type="username" class="form-control form-control-material"
                                                        id="floatingInput" placeholder="Nama Jemaat" name="nama" required>
                                                    <label for="floatingInput">Nama Calon Penerima</label>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control form-control-material"
                                                        id="floatingInput" placeholder="" name="pekerjaan" required>
                                                    <label for="floatingInput">Pekerjaan</label>
                                                </div>
                                            </div>
                                            <fieldset class="row mb-3">
                                                <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                                <div class="col-sm-10">
                                                    <input class="form-check-input" type="radio" name="status"
                                                        id="gridRadios1" value="1" checked>
                                                    <label class="form-check-label" for="gridRadios1">
                                                        Kawin
                                                    </label>&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="status"
                                                        id="gridRadios2" value="0" required>
                                                    <label class="form-check-label" for="gridRadios2">
                                                        Janda/Duda
                                                    </label>

                                                </div>
                                            </fieldset>
                                            <fieldset class="row mb-3">
                                                <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                                <div class="col-sm-10">
                                                    <input class="form-check-input" type="radio" name="status_keaktifan"
                                                        id="gridRadios1" value="1" checked>
                                                    <label class="form-check-label" for="gridRadios1">
                                                        Pelayan
                                                    </label>&nbsp;&nbsp;
                                                    <input class="form-check-input" type="radio" name="status_keaktifan"
                                                        id="gridRadios2" value="0" required>
                                                    <label class="form-check-label" for="gridRadios2">
                                                        Bukan Pelayan
                                                    </label>

                                                </div>
                                            </fieldset>
                                            <div class="row mb-3">
                                                <div class="form-floating mb-3 col-md-4">
                                                    <input type="number" class="form-control form-control-material"
                                                        id="floatingInput" placeholder="" name="usia" required>
                                                    <label for="floatingInput">Usia</label>
                                                </div>
                                                <div class="form-floating mb-3 col-md-8">
                                                    <input type="number" class="form-control form-control-material"
                                                        id="floatingInput" placeholder="" name="pendapatan" required>
                                                    <label for="floatingInput">Pendapatan (Rp)</label>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control form-control-material" id="floatingInput" placeholder="" name="alamat" required></textarea>
                                                    <label for="floatingInput">Alamat</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-default">Bersihkan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-primary">
                                        <i class="material-icons-outlined">groups</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Jumlah Calon Penerima Aktif Pelayanan</span>
                                        <span class="widget-stats-amount">{{ $jumlah_data }}</span>
                                        <span class="widget-stats-info">dari {{ $jumlah_data }} jemaat keseluruhan</span>
                                    </div>
                                    <div class="widget-stats-indicator widget-stats-indicator-negative align-self-start" hidden>
                                        <i class="material-icons">keyboard_arrow_down</i> 4%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Data {{ $page_title }}</h5>
                            </div>
                            <div class="card-body">
                                <table id="datatable1" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Pekerjaan</th>
                                            <th>Status</th>
                                            <th>Usia</th>
                                            <th>Pendapatan</th>
                                            <th>Alamat</th>
                                            <th>Keaktifan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $data)
                                            <tr>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->pekerjaan }}</td>
                                                <td>@if($data->status == "1") Kawin @else Lajang @endif</td>
                                                <td>{{ $data->usia }} </td>
                                                <td>{{ $data->pendapatan }}</td>
                                                <td>{{ $data->alamat }}</td>
                                                <td>@if($data->status == "1") Pelayan @else Bukan Pelayan @endif</td>
                                                <td class="d-flex justify-content-center">


                                                    <a href="{{ route('cetak_qr_code',['id'=>$data->id]) }}" class="btn btn-success mr-3" style="margin-right:5px;min-width:120px">Cetak QR</a>
                                                    <button class="btn btn-primary " data-bs-toggle="modal"
                                                        data-bs-target="#modal_{{ $data->id }}"><i
                                                            class="fas fa-edit"></i>Edit</button>&nbsp;
                                                    <a class="btn btn-danger float-left"
                                                        href="/jemaat/{{ $data->id }}/delete"
                                                        onclick="return confirm('Anda yakin akan menghapus data ini?')"><i
                                                            class="fas fa-edit"></i>Hapus</a>
                                                </td>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modal_{{ $data->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit
                                                                    {{ $page_title }}</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/jemaat/{{ $data->id }}/edit"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="row mb-3">
                                                                        <div class="form-floating mb-3">
                                                                            <input type="username" class="form-control"
                                                                                id="floatingInput"
                                                                                value="{{ $data->nama }}" name="nama">
                                                                            <label for="floatingInput">Nama Jemaat</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="form-floating mb-3">
                                                                            <input type="text" class="form-control"
                                                                                id="floatingInput"
                                                                                value="{{ $data->pekerjaan }}"
                                                                                name="pekerjaan">
                                                                            <label for="floatingInput">Pekerjaan</label>
                                                                        </div>
                                                                    </div>
                                                                    <fieldset class="row mb-3">
                                                                        <legend class="col-form-label col-sm-2 pt-0">Status
                                                                        </legend>
                                                                        <div class="col-sm-10">

                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="status" id="gridRadios1"
                                                                                    value="1"
                                                                                    @if ($data->status == 1) checked @endif>
                                                                                <label class="form-check-label"
                                                                                    for="gridRadios1">
                                                                                    Kawin
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="status" id="gridRadios2"
                                                                                    value="0"
                                                                                    @if ($data->status == 0) checked @endif>
                                                                                <label class="form-check-label"
                                                                                    for="gridRadios2">
                                                                                    Janda/Duda
                                                                                </label>
                                                                            </div>

                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="row mb-3">
                                                                        <legend class="col-form-label col-sm-2 pt-0">Status
                                                                        </legend>
                                                                        <div class="col-sm-10">

                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="status_keaktifan" id="gridRadios1"
                                                                                    value="1"
                                                                                    @if ($data->status_keaktifan == 1) checked @endif>
                                                                                <label class="form-check-label"
                                                                                    for="gridRadios1">
                                                                                    Kawin
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio"
                                                                                    name="status_keaktifan" id="gridRadios2"
                                                                                    value="0"
                                                                                    @if ($data->status_keaktifan == 0) checked @endif>
                                                                                <label class="form-check-label"
                                                                                    for="gridRadios2">
                                                                                    Janda/Duda
                                                                                </label>
                                                                            </div>

                                                                        </div>
                                                                    </fieldset>
                                                                    <div class="row mb-3">
                                                                        <div class="form-floating mb-3">
                                                                            <input type="number" class="form-control"
                                                                                id="floatingInput"
                                                                                value="{{ $data->usia }}" name="usia">
                                                                            <label for="floatingInput">Usia</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="form-floating mb-3">
                                                                            <input type="number" class="form-control"
                                                                                id="floatingInput"
                                                                                value="{{ $data->pendapatan }}"
                                                                                name="pendapatan">
                                                                            <label for="floatingInput">Pendapatan (Rp)</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="form-floating mb-3">
                                                                            <textarea class="form-control" id="floatingInput" placeholder="" name="alamat">{{ $data->alamat }}</textarea>
                                                                            <label for="floatingInput">Alamat</label>
                                                                        </div>
                                                                    </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endauth
