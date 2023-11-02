@extends('sm.index')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Layanan Kamar</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('layanan_kamar') }}">Layanan Kamar</a>
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
                                <a href="{{ route('layanan_kamar.create') }}" class="btn btn-md btn-success mb-3">TAMBAH
                                    LAYANAN KAMAR</a>
                                <form action="{{ route('layanan_kamar.index') }}" method="get"
                                    class="form-inline my-2 my-lg-0">
                                    <input type="search" class="form-control mr-sm-2" placeholder="Cari Layanan"
                                        aria-label="Nama Layanan" name="keyword">
                                    <button class="btn btn-info" type="submit">Cari</button>
                                </form>
                            </div>

                            <div class="table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama
                                                Layanan</th>
                                            <th class="text-center">Tarif
                                                Layanan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($layanan_kamar as $item)
                                            <tr>
                                                <td class="text-center">{{ $item->nama_layanan }}</td>
                                                <td class="text-center">{{ $item->tarif_layanan }}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('layanan_kamar.destroy', $item->id) }}"
                                                        method="POST">
                                                        <a href="{{ route('layanan_kamar.edit', $item->id) }}"
                                                            class="btn btn-sm btn-primary">EDIT</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>

                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Layanan Kamar belum tersedia
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">{{ $layanan_kamar->links() }}</div>
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
