@extends('layouts2.master')



@section('content')
    <!-- Tampilkan notifikasi jika ada -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tampilkan notifikasi jika ada kesalahan -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h1 class="h3 mb-2 text-gray-800">Informasi Detail Menu</h1>

                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th>Menu ID:</th>
                                <td>{{ $menu->id_menu }}</td>
                            </tr>
                            <tr>
                                <th>Nama Menu:</th>
                                <td>{{ $menu->menu_name }}</td>
                            </tr>
                            <tr>
                                <th>Link Menu:</th>
                                <td>{{ $menu->menu_link }}</td>
                            </tr>
                            <tr>
                                <th>Kategori Menu:</th>
                                <td>{{ $menu->menu_category }}</td>
                            </tr>
                            <tr>
                                <th>Sub Menu:</th>
                                <td>
                                    @if ($menu->menu_category == 'sub menu' && $menu->masterMenu)
                                        {{ $menu->masterMenu->menu_name }}
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Posisi Menu:</th>
                                <td>{{ $menu->menu_position }}</td>
                            </tr>
                            <!-- Add other menu details here based on your data structure -->
                        </table>
                        <!-- <a href="{{ route('menu.edit', $menu->id_menu) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('menu.destroy', $menu->id_menu) }}" method="POST" style="display: inline-block" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form> -->
                        <a href="{{ route('menu.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    @parent
    <style>
        /* Gaya untuk konten detail menu */
        .card {
            border: 2px solid #333;
            border-radius: 15px;
            background-color: #f9f9f9;
            padding: 20px;
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.10); /* Bayangan lebih mencolok */
            transition: all 0.3s ease-in-out;
            opacity: 1;
        }

        .card:hover {
            transform: scale(1.05);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        /* Gaya untuk tombol "Edit", "Hapus", dan "Kembali" */
        .btn-warning, .btn-danger, .btn-secondary {
            margin-top: 10px;
        }
    </style>
@endsection

@section('scripts')
    <!-- Add specific JavaScript scripts for the menu detail page if needed -->
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus data menu ini?');
        }
    </script>
@endsection
