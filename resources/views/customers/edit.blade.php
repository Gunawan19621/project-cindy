@extends('layouts2.master')

@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 class="h3 mb-2 text-gray-800">Edit Customer</h1>
            <form method="post" action="{{ route('update.customer', ['id' => $customer->id]) }}">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Name" value="{{ $customer->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" value="{{ $customer->email }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp" placeholder="Phone" value="{{ $customer->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp" placeholder="Address" value="{{ $customer->address }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('customer.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
        </div>
    </div>
</div>
@endsection
