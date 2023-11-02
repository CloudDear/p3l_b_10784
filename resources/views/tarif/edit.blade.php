@extends('sm.index')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Tarif</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Tarif</a>
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
                            <form action="{{ route('tarif.update', $old->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Tarif Terpasang</label>

                                        <input type="text"
                                            class="form-control @error('tarif_terpasang') is-invalid @enderror"
                                            name="tarif_terpasang" value="{{ $old->tarif_terpasang }}"
                                            placeholder="Masukkan Tarif Terpasang">

                                        @error('tarif_terpasang')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Nama Season</label>

                                        <select name="season_id"
                                            class="form-control @error('season_id') is-invalid @enderror">
                                            <option value="" selected disabled>
                                                Pilih Season
                                            </option>
                                            @foreach ($season as $season)
                                                <option value="{{ $season->id }}">{{ $season->nama_season }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('season_id')
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
