@extends('layouts2.master')

@section('content')
<div class="container-fluid">
    <!-- Begin Page Content -->
    <h1 class="h3 mb-2 text-gray-800">Table Armada</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Armada</h6>
            <a href="/armada/create" class="btn btn-primary btn-sm float-right">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="color: #4B527E;">Name</th>
                            <th style="color: #4B527E;">Max Weight</th>
                            <th style="color: #4B527E;">Length</th>
                            <th style="color: #4B527E;">Width</th>
                            <th style="color: #4B527E;">Height</th>
                            <th style="color: #4B527E;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($armadas as $armada)
                        <tr>
                            @if($armada->pictures->isNotEmpty())
                            <td><img class="img-thumbnail" width="150" src="/uploads/{{ $armada->pictures->first()->filename }}" alt=""></td>
                            @endif
                            <td>{{ $armada->name }}</td>
                            <td>{{ $armada->max_weight }}</td>
                            <td>{{ $armada->length }}</td>
                            <td>{{ $armada->width }}</td>
                            <td>{{ $armada->height }}</td>
                            <td>
                                <a href="/armada/{{ $armada->id }}/edit" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Ubah
                                        </a>
                                <form action="/armada/{{ $armada->id }}" method="POST">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
@endsection
