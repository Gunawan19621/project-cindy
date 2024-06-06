@extends('layouts2.frontend.master')

@section('body')
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-text">
                        <h2>Tracking</h2>
                        <div class="div-dec"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-us-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h4>Masukkan No. Resi</h4>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="col-lg-10 offset-lg-1 alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        <p>{{ session("error") }}</p>
                    </div>
                @endif


                <div class="col-lg-10 offset-lg-1">
                    <form id="contact" action="/tracking" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="no_resi">Nomor Resi</label>
                                    <input type="text" name="no_resi" id="no_resi" placeholder="Nomor Resi" autocomplete="on" required value="{{ old('no_resi') }}">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="phone">4 Angka Terakhir No. Pengirim</label>
                                    <input type="text" name="phone" id="phone" placeholder="Masukkan 4 angka terakhir no. pengirim" autocomplete="on" required value="{{ old('phone') }}">
                                </fieldset>
                            </div>

                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="orange-button">Submit</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
