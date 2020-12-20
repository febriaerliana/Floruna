@extends('layouts.app')
@section('title','Profile')
@section('parent','Profile')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body p-0" id="div-table">
                <div class="card author-box card-primary">
                    <div class="card-body">
                        <div class="author-box-left">
                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                 class="rounded-circle author-box-picture">
                            <div class="clearfix"></div>
                            <a href="#" class="btn btn-primary mt-3" data-toggle="modal"
                               data-target="#exampleModal">Edit</a>
                        </div>
                        <div class="author-box-details">
                            <div class="author-box-name">
                                <a href="#">{{ Auth::user()->name}}</a>
                            </div>
                            <div class="author-box-job">{{ Auth::user()->email .' / ' . Auth::user()->phone }}</div>
                            <div class="author-box-description">
                                <p>{{ Auth::user()->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('dashboard.profile.update',Auth::user()->isA('admin') ? 'admin' : 'user') }}"
                          id="edit-form"
                          enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}"
                                       required/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}"
                                       required/>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="gender" class="form-control">
                                    <option {{ Auth::user()->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                    </option>
                                    <option {{ Auth::user()->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="address"
                                       value="{{ Auth::user()->address }}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label>No Hp</label>
                                <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}"
                                       required>
                            </div>
                        </div>
                        @csrf
                        @method('put')
                    </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"
                            onclick="event.preventDefault(); document.getElementById('edit-form').submit();">Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
