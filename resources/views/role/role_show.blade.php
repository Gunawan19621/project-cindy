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
                <h1 class="h3 mb-2 text-gray-800">Informasi Detail Role</h1>

                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th>Role ID:</th>
                                <td>{{ $role->id }}</td>
                            </tr>
                            <tr>
                                <th>Nama Role:</th>
                                <td>{{ $role->role_name }}</td>
                            </tr>
                            <tr>
                                <th>Menu Terkait:</th>
                                <td>
                                    @foreach($role->menus as $menu)
                                        {{ $menu->menu_name }}<br>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Dibuat:</th>
                                <td>{{ $role->created_at }}</td>
                            </tr>
                            <!-- Add other role details here based on your data structure -->
                        </table>
                        <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <!-- <form action="{{ route('role.destroy', $role->id) }}" method="POST" style="display: inline-block" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form> -->
                        <a href="{{ route('role.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <!-- Add specific CSS styles for the role detail page if needed -->
    <style>
        /* Gaya untuk kotak detail role */
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
            color: blue;
            font-size: 24px;
        }

        .btn-warning, .btn-danger, .btn-secondary {
            margin-top: 10px;
        }
    </style>
@endsection

@section('scripts')
    <!-- Add specific JavaScript scripts for the role detail page if needed -->
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus data role ini?');
        }
    </script>
@endsection
