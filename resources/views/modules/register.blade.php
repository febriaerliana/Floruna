@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="../assets/img/floruna.png" alt="logo" width="100" height="100"
                             class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>Register</h4></div>
                        <div class="card-body">
                            @if(Session::has('failed'))
                            <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                            @endif
                            <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Nama</label>
                                    <input id="email" type="text" class="form-control" name="name" tabindex="1"
                                           required autofocus placeholder="Nama" value="{{ old('name') }}">
                                    <div class="invalid-feedback">
                                        Please fill in your name
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" class="form-control" name="email" tabindex="1"
                                           required autofocus placeholder="Email" value="{{ old('email') }}">
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password"
                                           tabindex="2" required placeholder="Password">
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Jenis Kelamin</label>
                                    </div>
                                    <select class="form-control" name="gender">
                                        <option {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Alamat</label>
                                    </div>
                                    <input id="password" type="text" class="form-control" name="address"
                                           tabindex="2" required placeholder="Alamat" value="{{ old('address') }}">
                                    <div class="invalid-feedback">
                                        please fill in your address
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">No HP</label>
                                    </div>
                                    <input id="password" type="number" class="form-control" name="phone" min="0"
                                           oninput="validity.valid||(value='');"
                                           value="{{ old('phone') }}"
                                           tabindex="2" required placeholder="No HP">
                                    <div class="invalid-feedback">
                                        please fill in your phone
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit"
                                            class="btn btn-primary btn-lg btn-block"
                                            tabindex="4">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
