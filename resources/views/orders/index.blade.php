@extends('layouts2.master')

@section('content')
    <div class="container-fluid">
        <!-- Begin Page Content -->
        <h1 class="h3 mb-2 text-gray-800">Tablel Orders</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Orders</h6>
                <a href="/orders/create" class="btn btn-primary btn-sm float-right">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="color: #4B527E;">No Order</th>
                                <th style="color: #4B527E;">Customer</th>
                                <th style="color: #4B527E;">Nama Muatan</th>
                                <th style="color: #4B527E;">Berat Muatan</th>
                                <th style="color: #4B527E;">Alamat Muat</th>
                                <th style="color: #4B527E;">Alamat Bongkar</th>
                                <th style="color: #4B527E;">Status</th>
                                <th style="color: #4B527E;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ optional($order->customer)->name }}</td>
                                    <td><a href="/orders/{{ $order->id }}">{{ $order->nama_muatan }}</a></td>
                                    <td>{{ $order->berat_muatan }} Kg</td>
                                    <!-- <td>
                                                                                                    {{ $order->muatkelurahan->name }}, {{ $order->muat_alamat }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    {{ $order->bongkarkelurahan->name }}, {{ $order->bongkar_alamat }}
                                                                                                </td> -->
                                    <td>{{ optional($order->muatkelurahan)->name }}, {{ $order->muat_alamat }}</td>
                                    <td>{{ optional($order->bongkarkelurahan)->name }}, {{ $order->bongkar_alamat }}</td>
                                    <td>
                                        @php
                                            $orderStatus = $order
                                                ->statuses()
                                                ->orderBy('order_status.tanggal', 'DESC')
                                                ->first();
                                        @endphp
                                        {{ $orderStatus ? $orderStatus->nama : '' }}
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <a class="pensil" type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" order-id="{{ $order->id }}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/orders/{{ $order->id }}/edit" class="btn btn-sm btn-info">Edit</a>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update status</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/orders/{{ $order->id }}/update-status" method="post"
                                                    id="formUpdate">
                                                    @method('put')
                                                    @csrf
                                                    <input type="hidden" name="order_id" id="order_id">
                                                    <select class="form-control" name="status_id" required>
                                                        @foreach ($statuses as $status)
                                                            <option value="{{ $status->id }}">{{ $status->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    <input style="margin-top:10px;" name="tanggal" type="datetime-local"
                                                        class="form-control" id="tanggal" placeholder="Nama Muatan"
                                                        required>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary"
                                                    id="btnUpdate">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    </div>
@endsection







@push('scripts')
    <script>
        $(document).ready(function() {
            $("#btnUpdate").click(function() {
                $("#formUpdate").submit();
            });

            $(".pensil").click(function() {
                var order_id = $(this).attr('order-id');
                $("#order_id").val(order_id); // Use ID selector instead of name attribute
            });
        });
    </script>
@endpush
