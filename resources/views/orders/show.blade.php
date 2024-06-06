@extends('layouts2.master')

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                <div class="row">
                    <div class="col-md-6">
                    <h6 class="mb-0">Orders Detail</h6>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <i class="far fa-calendar-alt me-2"></i>
                    <small>{{ $order->waktu_muat}}</small>
                    </div>
                </div>
                </div>
                <div class="card-body pt-4 p-3">
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                        <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Customer</h6>
                        <span class="text-xs">{{ $order->customer->name }}</span>
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                        <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Berat Muatan</h6>
                        <span class="text-xs">{{ $order->berat_muatan }} Kg</span>
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                        <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Nama Muatan</h6>
                        <span class="text-xs">{{ $order->nama_muatan }}</span>
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                        <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Alamat Muatan</h6>
                        <span class="text-xs">{{ $order->muatkelurahan->name }}, {{ $order->muat_alamat }}</span>
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                        <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Alamat Bongkar</h6>
                        <span class="text-xs">{{ $order->bongkarkelurahan->name }}, {{ $order->bongkar_alamat }}</span>
                        </div>
                    </div>
                    </li>
                </ul>
            </div>
            </div>
        </div>
    

    <div class="col-6">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Status</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        @foreach($order->statuses()->orderBy('order_status.tanggal','DESC')->get() as $status)
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">{{ $status->nama }}</h6>
                                    <span class="mb-2 text-xs">Description<span class="text-dark font-weight-bold ms-sm-2">{{ $status->description}}</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <i class="fas fa-calendar text-dark me-2" aria-hidden="true"></i>{{ $status->pivot->tanggal }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection



