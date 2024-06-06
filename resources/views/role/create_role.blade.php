@extends('layouts2.master')


@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h1 class="h3 mb-2 text-gray-800">Create Role</h1>
                <form action="{{ route('role.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="role_name">Role Name</label>
                        <input type="text" class="form-control" id="role_name" name="role_name" required>
                    </div>
                    <div class="form-group">
                        <label>Select Menu</label>
                        <br>
                        @foreach($menus as $menu)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="menu_{{ $menu->id_menu }}" name="menus[]" value="{{ $menu->id_menu }}">
                                <label class="form-check-label" for="menu_{{ $menu->id_menu }}">{{ $menu->menu_name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                            <a href="{{ route('role.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    /* Gaya untuk kotak create role */
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

    .btn-primary, .btn-secondary {
        margin-top: 10px;
    }
</style>
@endsection
