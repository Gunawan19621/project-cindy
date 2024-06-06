@extends('layouts2.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Tambah Armada</h6>
            </div>
            <div class="card-body px-2 pt-0 pb-2">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('store.armada')}} "  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="max_weight">Max Weight</label>
                        <input name="max_weight" type="text" class="form-control" id="max_weight" placeholder="Max Weight">
                    </div>
                    <div class="form-group">
                        <label for="length">Length</label>
                        <input type="text" class="form-control" id="length" name="length" placeholder="Length">
                    </div>
                    <div class="form-group">
                        <label for="width">Width</label>
                        <input name="width" type="text" class="form-control" id="width" placeholder="Width">
                    </div>
                    <div class="form-group">
                        <label for="height">Height</label>
                        <input name="height" type="text" class="form-control" id="height" placeholder="Height">
                    </div>
                    <div class="form-group">
                        <label for="height">Pictures</label>
                        <input name="files[]" type="file" class="form-control" multiple id="height" placeholder="Height">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('armada.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
