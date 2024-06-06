@extends('layouts2.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Edit Armada</h6>
            </div>
            <div class="card-body px-2 pt-0 pb-2">
                <form method="post" action="{{ route('update.armada', ['id' => $armada->id]) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $armada->name }}">
                    </div>
                    <div class="form-group">
                        <label for="max_weight">Max Weight</label>
                        <input type="text" class="form-control" id="max_weight" name="max_weight" placeholder="Max Weight" value="{{ $armada->max_weight }}">
                    </div>
                    <div class="form-group">
                        <label for="length">Length</label>
                        <input type="text" class="form-control" id="length" name="length" placeholder="Length" value="{{ $armada->length }}">
                    </div>
                    <div class="form-group">
                        <label for="width">Width</label>
                        <input type="text" class="form-control" id="width" name="width" placeholder="Width" value="{{ $armada->width }}">
                    </div>
                    <div class="form-group">
                        <label for="height">Height</label>
                        <input type="text" class="form-control" id="height" name="height" placeholder="Height" value="{{ $armada->height }}">
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
