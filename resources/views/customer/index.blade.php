@extends('sm.index')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customer</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('customer') }}">Customer</a>
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
                                <a href="{{ route('customer.create') }}" class="btn btn-md btn-success mb-3">TAMBAH
                                    CUSTOMER</a>
                                <form action="{{ route('customer.index') }}" method="get"
                                    class="form-inline my-2 my-lg-0">
                                    <input type="search" class="form-control mr-sm-2" placeholder="Cari Customer"
                                        aria-label="Nama Customer" name="keyword">
                                    <button class="btn btn-info" type="submit">Cari</button>
                                </form>
                            </div>

                            {{-- <a href="{{ route('customer.create') }}" class="btn btn-md btn-success mb-3">TAMBAH
                                SEASON</a> --}}


                            <div class="table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama
                                                Customer</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">No Identitas</th>
                                            <th class="text-center">Nomor Telepon</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Nama Institusi</th>
                                            <th class="text-center">Password</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($customer as $item)
                                            <tr>
                                                <td class="text-center">{{ $item->nama_customer }}</td>
                                                <td class="text-center">{{ $item->email }}</td>
                                                <td class="text-center">{{ $item->no_identitas }}</td>
                                                <td class="text-center">{{ $item->nomor_telepon }}</td>
                                                <td class="text-center">{{ $item->alamat }}</td>
                                                <td class="text-center">{{ $item->nama_institusi }}</td>
                                                <td class="text-center">{{ $item->password }}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('customer.destroy', $item->id) }}" method="POST">
                                                        <a href="{{ route('customer.edit', $item->id) }}"
                                                            class="btn btn-sm btn-primary">EDIT</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>

                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Customer belum tersedia
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">{{ $customer->links() }}</div>
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
