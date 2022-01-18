@extends('layouts.back')

@section('title', 'Ubah Profil')

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

@section('subhead', 'Ubah Profil')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="about-row row">
                <div class="image-col col-md-2">
                    <hr><img src="{{ asset('/img/klinik.png') }}" alt=""><hr>
                </div>
                <div class="detail-col col-md-8">
                    <form method="POST" enctype="multipart/form-data" action={{ route('adm_update_profil', $admins->user_id) }}>
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="info-list">
                                <div class="form-group">
                                <ul>
                                    <li>
                                        <label class="font-weight-bold text-primary" for="">Nama</label>
                                        <input type="text" name="nama" class="form-control" value="{{ $admins->nama }}">
                                    </li>
                                    <li>
                                        <label class="font-weight-bold text-primary" for="">Tanggal lahir</label>
                                        <input type="date" name="tgl_lhr" class="form-control" value="{{ $admins->tgl_lhr }}">
                                    </li>
                                    <li>
                                        <label class="font-weight-bold text-primary" for="">Tempat lahir</label>
                                        <input type="text" name="tempat_lhr" class="form-control" value="{{ $admins->tempat_lhr }}">
                                    </li>
                                    <li>
                                        <label class="font-weight-bold text-primary" for="">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="{{ $admins->alamat }}">
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="info-list">
                                <div class="form-group">
                                <ul>
                                    <li>
                                        <label class="font-weight-bold text-primary" for="">Umur</label>
                                        <input type="text" class="form-control" value="{{ $age }}" disabled>
                                    </li>
                                    <li>
                                        <label class="font-weight-bold text-primary" for="">No. Hp</label>
                                        <input type="text" name="no_hp" class="form-control" value="{{ $admins->no_hp }}">
                                    </li>
                                    <li>
                                        <label class="font-weight-bold text-primary" for="">Jenis Kelamin</label>
                                        <select class="form-control" name="jk" id="jk">
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-icon-split btn-sm">
                        <span>
                            <i class="fas fa-check"></i>
                        </span>    
                        <span class="text">Simpan</span>
                    </button>&nbsp;
                    <a href={{ route('adm_profil', Auth::user()->id) }} class="btn btn-secondary btn-icon-split btn-sm">
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
@endsection