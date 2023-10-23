@extends('dashboard')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Season</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('season') }}">Season</a>
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
                            <a href="{{ route('season.create') }}" class="btn btn-md btn-success mb-3">TAMBAH
                                SEASON</a>
                            <div class="table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama
                                                Season</th>
                                            <th class="text-center">Tanggal
                                                Mulai</th>
                                            <th class="text-center">Tanggal
                                                Berakhir</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($season as $item)
                                            <tr>
                                                <td class="text-center">{{ $item->nama_season }}</td>
                                                <td class="text-center">
                                                    {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d F Y') }}</td>
                                                <td class="text-center">
                                                    {{ \Carbon\Carbon::parse($item->tanggal_berakhir)->format('d F Y') }}
                                                </td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('season.destroy', $item->id) }}" method="POST">
                                                        <a href="{{ route('season.edit', $item->id) }}"
                                                            class="btn btn-sm btn-primary">EDIT</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>

                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Season belum tersedia
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">{{ $season->links() }}</div>
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
