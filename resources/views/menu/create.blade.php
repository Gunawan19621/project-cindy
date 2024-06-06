@extends('layouts2.master')


@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h1 class="h3 mb-2 text-gray-800">Tambah Menu</h1>

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

                <form action="{{ route('menu.store') }}" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="menu_name" class="col-sm-2 col-form-label">Nama Menu</label>
                        <div class="col-sm-9">
                            <input type="text" name="menu_name" id="menu_name" class="form-control" value="{{ $menu->menu_name }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="menu_link" class="col-sm-2 col-form-label">Link Menu</label>
                        <div class="col-sm-9">
                            <input type="text" name="menu_link" id="menu_link" class="form-control" value="{{ $menu->menu_link }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="menu_category">Kategori Menu</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="menu_category" id="menu_category">
                            <option value="master menu" @if ($menu->menu_category == "master menu") selected @endif>Master Menu</option>
                            <option value="sub menu" @if ($menu->menu_category == "sub menu") selected @endif>Sub Menu</option>
                        </select>
                    </div>
                </div>

                <div id="hidden_div" style="display: none;">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="menu_sub">Sub Menu</label>
                        <div class="col-sm-9">
                            <select placeholder="Sub Menu" name="menu_sub" id="menu_sub" class="form-control">
                                <option value="">Pilih Master Menu</option>
                                @foreach ($masterMenus as $masterMenu)
                                    <option value="{{ $masterMenu->id_menu }}" @if ($masterMenu->id_menu == $menu->menu_sub) selected @endif>{{ $masterMenu->menu_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('menu_category').addEventListener('change', function() {
                        var selectedOption = this.options[this.selectedIndex].value;
                        var subMenuDiv = document.getElementById('hidden_div');

                        if (selectedOption === 'sub menu') {
                            subMenuDiv.style.display = 'block';
                        } else {
                            subMenuDiv.style.display = 'none';
                        }
                    });
                </script>



                    <div class="form-group row">
                        <label for="menu_position" class="col-sm-2 col-form-label">Posisi Menu</label>
                        <div class="col-sm-9">
                            <input type="number" name="menu_position" id="menu_position" class="form-control" value="{{ $menu->menu_position }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                            <a href="{{ route('menu.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
    document.getElementById('menu_category').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex].value;
        var subMenuDiv = document.getElementById('hidden_div');

        if (selectedOption === 'sub menu') {
            subMenuDiv.style.display = 'block';
        } else {
            subMenuDiv.style.display = 'none';
        }
    });
</script>


@endsection

@section('styles')
    <style>
        /* Gaya untuk kotak create menu */
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
