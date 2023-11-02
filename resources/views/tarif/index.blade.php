@extends('sm.index')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tarif</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('tarif') }}">Tarif</a>
                        </li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div> <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">




                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('tarif.create') }}" class="btn btn-md btn-success mb-3">TAMBAH
                                    TARIF</a>
                                <form action="{{ route('tarif.index') }}" method="get" class="form-inline my-2 my-lg-0">
                                    <input type="search" class="form-control mr-sm-2" placeholder="Cari Tarif"
                                        aria-label="Tarif Terpasang" name="keyword">
                                    <button class="btn btn-info" type="submit">Cari</button>
                                </form>
                            </div>


                            <div class="table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Tarif
                                                Terpasang</th>
                                            <th class="text-center">Nama
                                                Season</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tarif as $item)
                                            <tr>
                                                <td class="text-center">{{ $item->tarif_terpasang }}</td>
                                                <td class="text-center">{{ $item->seasons->nama_season }}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return
confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('tarif.destroy', $item->id) }}" method="POST">
                                                        <a href="{{ route('tarif.edit', $item->id) }}"
                                                            class="btn btn-sm btn-primary">EDIT</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Tarif belum tersedia
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">{{ $tarif->links() }}</div>
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
