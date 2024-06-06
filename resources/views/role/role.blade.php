@extends('layouts2.master')

@section('content')
<div class="container-fluid">
    <!-- Begin Page Content -->
    <h1 class="h3 mb-2 text-gray-800">Tablel Role</h1>
    <p class="mb-4">Role user & admin  <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Role</h6>
    <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm float-right">
        <i class="fas fa-plus"></i> Tambah
    </a>
</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="color: #4B527E;">Role ID</th>
                            <th style="color: #4B527E;">Nama Role</th>
                            <th style="color: #4B527E;">Menu</th>
                            <th style="color: #4B527E;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->role_name }}</td>
                            <!-- <td>
                                @foreach ($role->menus as $menu)
                                {{ $menu->menu_name }}<br>
                                @endforeach
                            </td> -->
                            <td>
                                @if ($role->menus->isEmpty())
                                    <p style="color: red;">tidak tersedia!!</p>
                                @else
                                    @foreach ($role->menus as $menu)
                                        {{ $menu->menu_name }}<br>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Ubah
                                </a>
                                <!-- <a href="{{ route('role.show', $role->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Lihat
                                </a> -->
                                <form action="{{ route('role.destroy', $role->id) }}" method="POST"
                                    style="display: inline-block" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <!-- <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button> -->
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center">

            </div>
        </div>
    </div>
    <!-- End of DataTales Example -->
</div>
<!-- End of Page Content -->
@endsection

@section('scripts')
@parent
<script>
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus data role ini?');
    }

    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endsection

@section('styles')
@parent
<style>
    /* Gaya CSS sesuai kebutuhan Anda */

    /* Apply gray background to even rows */
    .table-striped tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* Apply white background to odd rows */
    .table-striped tbody tr:nth-child(odd) {
        background-color: #ffffff;
    }
</style>
@endsection



