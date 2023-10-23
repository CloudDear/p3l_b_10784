@extends('dashboard')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Proyek</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Proyek</a>
                        </li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('proyek.update', $old->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Nama Proyek</label>

                                        <input type="text"
                                            class="form-control @error('nama_proyek') is-invalid @enderror"
                                            name="nama_proyek" value="{{ $old->nama_proyek }}"
                                            placeholder="Masukkan Nama Proyek">

                                        @error('nama_proyek')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Departemen</label>

                                        <select name="departemen_id"
                                            class="form-control @error('departemen_id') is-invalid @enderror">
                                            <option value="" selected disabled>
                                                Pilih Departemen
                                            </option>
                                            @foreach ($departemen as $departemen)
                                                <option value="{{ $departemen->id }}">{{ $departemen->nama_departemen }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('departemen_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Waktu Mulai</label>

                                        <input type="date"
                                            class="form-control @error('waktu_mulai') is-invalid @enderror"
                                            name="waktu_mulai" value="{{ $old->waktu_mulai }}"
                                            placeholder="Masukkan Waktu Mulai">
                                        @error('waktu_mulai')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Waktu Selesai</label>

                                        <input type="date"
                                            class="form-control @error('waktu_selesai') is-invalid @enderror"
                                            name="waktu_selesai" value="{{ $old->waktu_selesai }}"
                                            placeholder="Masukkan Waktu Selesai">
                                        @error('waktu_selesai')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Nilai Proyek</label>

                                        <input type="text"
                                            class="form-control @error('nilai_proyek') is-invalid @enderror"
                                            name="nilai_proyek" value="{{ $old->nilai_proyek }}"
                                            placeholder="Masukkan Nilai Proyek">

                                        @error('nilai_proyek')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Status</label>

                                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                                            <option value="" selected disabled>
                                                Pilih Status
                                            </option>
                                            <option value="0">
                                                Selesai
                                            </option>
                                            <option value="1">
                                                Berjalan
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
