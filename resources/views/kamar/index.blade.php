@extends('admin.index')

@section('admin_content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kamar</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('kamar') }}">Kamar</a>
                        </li>
                        <li class="breadcrumb-item active">Index</li>
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

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('kamar.create') }}" class="btn btn-md btn-success mb-3">TAMBAH
                                    KAMAR</a>
                                <form action="{{ route('kamar.index') }}" method="get" class="form-inline my-2 my-lg-0">
                                    <input type="search" class="form-control mr-sm-2" placeholder="Cari Kamar"
                                        aria-label="Nama Kamar" name="keyword">
                                    <button class="btn btn-info" type="submit">Cari</button>
                                </form>
                            </div>




                            {{-- <a href="{{ route('kamar.create') }}" class="btn btn-md btn-success mb-3">TAMBAH
                                SEASON</a> --}}


                            <div class="table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Jenis
                                                Kamar</th>
                                            <th class="text-center">Tipe
                                                Tempat Tidur</th>
                                            <th class="text-center">Tarif
                                                Awal</th>
                                            <th class="text-center">Ukuran
                                                Kamar</th>
                                            <th class="text-center">Kapasitas
                                                Kamar</th>
                                            <th class="text-center">Rincian
                                                Kamar</th>
                                            <th class="text-center">Detail
                                                Kamar</th>
                                            <th class="text-center">Tarif
                                                Promo</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($kamar as $item)
                                            <tr>
                                                <td class="text-center">{{ $item->jenis_kamar }}</td>
                                                <td class="text-center">{{ $item->tipe_tempat_tidur }}</td>
                                                <td class="text-center">{{ $item->tarif_awal }}</td>
                                                <td class="text-center">{{ $item->ukuran_kamar }}</td>
                                                <td class="text-center">{{ $item->kapasitas_kamar }}</td>
                                                <td class="text-center">{{ $item->rincian_kamar }}</td>
                                                <td class="text-center">{{ $item->detail_kamar }}</td>
                                                <td class="text-center">{{ $item->tarifs->tarif_terpasang }}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('kamar.destroy', $item->id) }}" method="POST">
                                                        <a href="{{ route('kamar.edit', $item->id) }}"
                                                            class="btn btn-sm btn-primary">EDIT</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>

                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Kamar belum tersedia
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">{{ $kamar->links() }}</div>
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
