@extends('layouts2.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Order</h6>
                </div>
                <div class="card-body px-2 pt-0 pb-2">
                    <form method="post" action="{{ route('orders.update', ['id' => $order->id]) }}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="nama_muatan">Nama Muatan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama_muatan" name="nama_muatan"
                                placeholder="Nama Muatan" value="{{ $order->nama_muatan }}" required>
                        </div>
                        <div class="form-group">
                            <label for="berat_muatan">Berat Muatan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="berat_muatan" name="berat_muatan"
                                placeholder="Berat Muatan" value="{{ $order->berat_muatan }}" required>
                        </div>
                        <div class="form-group">
                            <label for="muat_alamat">Alamat Muat <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="muat_alamat" name="muat_alamat"
                                placeholder="Alamat Muat" value="{{ $order->muat_alamat }}" required>
                        </div>
                        <div class="form-group">
                            <label for="bongkar_alamat">Alamat Bongkar <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="bongkar_alamat" name="bongkar_alamat"
                                placeholder="Alamat Bongkar" value="{{ $order->bongkar_alamat }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
