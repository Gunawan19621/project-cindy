@extends('layouts2.master')

@section('content')
<div class="container-fluid">
    <!-- Begin Page Content -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Customers</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Customer</h6>
            <a href="/customers/create" class="btn btn-primary btn-sm float-right">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                            <tr>
                                <th style="color: #4B527E;">Name</th>
                                <th style="color: #4B527E;">Email</th>
                                <th style="color: #4B527E;">Phone</th>
                                <th style="color: #4B527E;">Address</th>
                                <th style="color: #4B527E;">Actions</th>
                            </tr>
                        </thead>
                    <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>
                                        <a href="/customers/{{ $customer->id }}/edit" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Ubah
                                        </a>
                                        <form action="/customers/{{ $customer->id }}" method="POST">
                                            @method("DELETE")
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>      
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
