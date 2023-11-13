@extends('admin.index')

@section('admin_content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Kamar</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Kamar</a>
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
                            <form action="{{ route('kamar.update', $old->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Jenis Kamar</label>
                                        <input type="text"
                                            class="form-control @error('jenis_kamar') is-invalid @enderror"
                                            name="jenis_kamar" value="{{ $old->jenis_kamar }}"
                                            placeholder="Masukkan Jenis Kamar">
                                        @error('jenis_kamar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Tipe Tempat Tidur</label>
                                        <input type="text"
                                            class="form-control @error('tipe_tempat_tidur') is-invalid @enderror"
                                            name="tipe_tempat_tidur" value="{{ $old->tipe_tempat_tidur }}"
                                            placeholder="Masukkan Tipe Tempat Tidur">
                                        @error('tipe_tempat_tidur')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Tarif Promo</label>

                                        <select name="tarif_id"
                                            class="form-control @error('tarif_id') is-invalid @enderror">
                                            <option value="" selected disabled>
                                                Pilih Tarif
                                            </option>
                                            @foreach ($tarif as $tarif)
                                                <option value="{{ $tarif->id }}">{{ $tarif->tarif_terpasang }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('tarif_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Tarif Awal</label>
                                        <input type="text" class="form-control @error('tarif_awal') is-invalid @enderror"
                                            name="tarif_awal" value="{{ $old->tarif_awal }}"
                                            placeholder="Masukkan Tarif Awal">
                                        @error('tarif_awal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Ukuran Kamar</label>
                                        <input type="text"
                                            class="form-control @error('ukuran_kamar') is-invalid @enderror"
                                            name="ukuran_kamar" value="{{ $old->ukuran_kamar }}"
                                            placeholder="Masukkan Ukuran Kamar">
                                        @error('ukuran_kamar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Kapasitas Kamar</label>
                                        <input type="text"
                                            class="form-control @error('kapasitas_kamar') is-invalid @enderror"
                                            name="kapasitas_kamar" value="{{ $old->kapasitas_kamar }}"
                                            placeholder="Masukkan Kapasitas Kamar">
                                        @error('kapasitas_kamar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Rincian Kamar</label>
                                        <input type="text"
                                            class="form-control @error('rincian_kamar') is-invalid @enderror"
                                            name="rincian_kamar" value="{{ $old->rincian_kamar }}"
                                            placeholder="Masukkan Rincian Kamar">
                                        @error('rincian_kamar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Detail Kamar</label>
                                        <input type="text"
                                            class="form-control @error('detail_kamar') is-invalid @enderror"
                                            name="detail_kamar" value="{{ $old->detail_kamar }}"
                                            placeholder="Masukkan Detail Kamar">
                                        @error('detail_kamar')
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
