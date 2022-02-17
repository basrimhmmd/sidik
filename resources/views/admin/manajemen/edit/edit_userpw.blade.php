@extends('layouts.back')

@section('title', 'Ubah Username dan Password')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
@endsection

@section('menu')
@include('layouts.nav_admin')
@endsection

@section('subhead', 'Ubah Username dan Password')

@section('foto')
@include('layouts.foto_profil_admin')
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="about-row row">
                <div class="detail-col col-md-12">
                    <form method="POST" action={{ route('adm_update_userpw', $admins->id) }}>
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <div class="info-list">
                                <ul>
                                    <li>
                                        <label class="font-weight-bold text-primary">Username:</label>
                                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ $admins->username }}" required>
                                        <div class="invalid-feedback">
                                            @error('username')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="info-list">
                                <ul>
                                    <li>
                                        <label class="font-weight-bold text-primary">Password Lama:</label>
                                        <input id="password-lama" type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" autocomplete="current_password" required>
                                        <div class="invalid-feedback" role="alert">
                                            @error('current_password')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="info-list">
                                <ul>
                                    <li>
                                        <label class="font-weight-bold text-primary">Password Baru:</label>
                                        <input id="password-baru" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                        <div class="invalid-feedback" role="alert">
                                            @error('password')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="info-list">
                                <ul>
                                    <li>
                                        <label class="font-weight-bold text-primary">Konfirmasi Password Baru:</label>
                                        <input id="password-baru-confirm" type="password" name="password_confirmation" class="form-control" required>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="checkbox" class="form-control-input" onclick="showPassword()"> Tampilkan password
                        </div>
                        <div class="col-md-3">
                            <input type="checkbox" class="form-control-input" onclick="updateOnlyUsername()"> Hanya ganti <b>username</b>
                        </div>
                    </div><br>
                    <button type="submit" class="btn btn-success btn-sm">
                        <span>
                            <i class="fas fa-check"></i>
                        </span>    
                        <span class="text">Simpan</span>
                    </button>&nbsp;
                    <a href="{{ route('adm_profil', $admins->id) }}" class="btn btn-secondary btn-sm">
                        <span>
                            <i class="fas fa-times"></i>
                        </span>    
                        <span class="text">Batal</span>
                    </a>
                    </form>
                </div>                    
            </div>
        </div>
    </div>
</div>
<script>
    function showPassword() {
        var x = document.getElementById('password-lama');
        var y = document.getElementById('password-baru');
        var z = document.getElementById('password-baru-confirm');
        if (x.type == "password" || y.type == "password" || z.type == "password") {
            x.type = "text";
            y.type = "text";
            z.type = "text";
        }
        else {
            x.type = "password";
            y.type = "password";
            z.type = "password";
        }
    }

    function updateOnlyUsername() {
        var y = document.getElementById('password-baru');
        var z = document.getElementById('password-baru-confirm');
        
        if(y.disabled == false) {
            y.disabled = true;
            z.disabled = true;
        }
        else {
            y.disabled = false;
            z.disabled = false;
        }
        
    }
</script>
@endsection