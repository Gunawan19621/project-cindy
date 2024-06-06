@extends('layouts2.master')

@section('content')
<div class="container-fluid">
    <!-- Begin Page Content -->
    <h1 class="h3 mb-2 text-gray-800">Tables Menu</h1>
    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Menu</h6>
    <a href="{{ route('menu.create') }}" class="btn btn-primary btn-sm float-right">
        <i class="fas fa-plus"></i> Tambah
    </a>
</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="color: #4B527E;">Menu ID</th>
                            <th style="color: #4B527E;">Nama Menu</th>
                            <th style="color: #4B527E;">Link Menu</th>
                            <th style="color: #4B527E;">Kategori Menu</th>
                            <th style="color: #4B527E;">Sub Menu</th>
                            <th style="color: #4B527E;">Posisi Menu</th>
                            <th style="color: #4B527E;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $key => $menu)
                        <tr class="{{ $key % 2 == 0 ? 'even-row' : 'odd-row' }}">
                            <td>{{ $menu->id_menu }}</td>
                            <td>{{ $menu->menu_name }}</td>
                            <td>{{ $menu->menu_link }}</td>
                            <td>{{ $menu->menu_category }}</td>
                            <td>
                                @if ($menu->menu_category == 'sub menu' && $menu->masterMenu)
                                    {{ $menu->masterMenu->menu_name }} <!-- Menampilkan nama Master Menu -->
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $menu->menu_position }}</td>
                            <td>
                                <a href="{{ route('menu.show', $menu->id_menu) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                                <a href="{{ route('menu.edit', $menu->id_menu) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Ubah
                                </a>
                                <form action="{{ route('menu.destroy', $menu->id_menu) }}" method="POST" style="display: inline-block" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
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
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center">
            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
    <ul class="pagination justify-content-end">
        @if ($menus->onFirstPage())
            <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                <span class="page-link">Previous</span>
            </li>
        @else
            <li class="paginate_button page-item" id="dataTable_previous">
                <a href="{{ $menus->previousPageUrl() }}" class="page-link">Previous</a>
            </li>
        @endif

        @foreach ($menus->getUrlRange(1, $menus->lastPage()) as $page => $url)
            <li class="paginate_button page-item {{ $menus->currentPage() == $page ? 'active' : '' }}">
                <a href="{{ $url }}" class="page-link">{{ $page }}</a>
            </li>
        @endforeach

        @if ($menus->hasMorePages())
            <li class="paginate_button page-item" id="dataTable_next">
                <a href="{{ $menus->nextPageUrl() }}" class="page-link">Next</a>
            </li>
        @else
            <li class="paginate_button page-item next disabled" id="dataTable_next">
                <span class="page-link">Next</span>
            </li>
        @endif
    </ul>
</div>

            </div>
        </div>
    </div>
    <!-- End of DataTales Example -->
</div>
<!-- End of Page Content -->
@endsection
<script>
    
    $('#dataTable').DataTable({
    "lengthMenu": [10, 25, 50, 100],
    "pageLength": 10,
    "language": {
        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    }
});


</script>
@section('scripts')
@parent
<script>
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus data menu ini?');
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


