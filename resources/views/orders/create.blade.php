@extends('layouts2.master')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tambah Orders</h6>
                </div>
                <div class="card-body px-2 pt-0 pb-2">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('store.order') }}">
                        @csrf

                        <div class="form-group">
                            <label for="nama_muatan">Nama Muatan <span class="text-danger">*</span></label>
                            <input name="nama_muatan" type="text" class="form-control" id="nama_muatan"
                                placeholder="Nama Muatan" required>
                        </div>

                        <div class="form-group">
                            <label for="customer_id">Customer <span class="text-danger">*</span></label>
                            <select class="form-control" name="customer_id" id="customer_id" required>
                                <option value="" disabled selected>Pilih Customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="customer_id">Armada <span class="text-danger">*</span></label>
                            <select class="form-control" name="armada_id" id="armada_id" required>
                                <option value="" disabled selected>Pilih Armada</option>
                                @foreach ($armada as $arm)
                                    <option value="{{ $arm->id }}">{{ $arm->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="selectKelurahanMuat">Kelurahan Muat Barang <span
                                    class="text-danger">*</span></label>
                            <select name="muat_kelurahan_id" class="form-control selectKelurahanMuat" required></select>
                        </div>

                        <div class="form-group">
                            <label for="alamatMuat">Alamat Lengkap Muat Barang <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="muat_alamat" id="alamatMuat" cols="30" rows="5" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="selectKelurahanBongkar">Kelurahan Bongkar Barang <span
                                    class="text-danger">*</span></label>
                            <select name="bongkar_kelurahan_id" class="form-control selectKelurahanBongkar"
                                required></select>
                        </div>

                        <div class="form-group">
                            <label for="alamatBongkar">Alamat Lengkap Bongkar Barang <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" name="bongkar_alamat" id="alamatBongkar" cols="30" rows="5" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="nama_muatan">Waktu Muat <span class="text-danger">*</span></label>
                            <input name="waktu_muat" type="datetime-local" class="form-control" id="nama_muatan"
                                placeholder="Nama Muatan" required>
                        </div>

                        <div class="form-group">
                            <label for="nama_muatan">Berat Muatan <span class="text-danger">*</span></label>
                            <input name="berat_muatan" type="number" class="form-control" id="nama_muatan"
                                placeholder="Nama Muatan" required>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.selectKelurahanMuat, .selectKelurahanBongkar').select2({
                minimumInputLength: 3,
                ajax: {
                    url: '/search-kelurahan',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term,
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.results,
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
@endpush
