@extends('admin.layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>EDIT PENGGUNA</h2>
                        </div>
                        <div class="body">
                            @if ($errors->has('nik_pria') && $errors->has('nik_wanita'))
                                <div class="alert bg-red" role="alert" align="center">
                                    NIK pria dan NIK wanita tidak boleh sama.
                                </div>
                            @endif
                            @if ($errors->has('nik_pria') && !$errors->has('nik_wanita'))
                                <div class="alert bg-red" role="alert" align="center">
                                    NIK pria sudah terdaftar.
                                </div>
                            @endif
                            @if (!$errors->has('nik_pria') && $errors->has('nik_wanita'))
                                <div class="alert bg-red" role="alert" align="center">
                                    NIK wanita sudah terdaftar.
                                </div>
                            @endif
                            <form id="form_advanced_validation" method="POST" action="{{ route('user.update', ['user' => $user->id]) }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label>Email</label><br>
                                    <div class="form-line disabled">
                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email" maxlength="255" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama Pria</label><br>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama_pria" value="{{ $user->nama_pria }}" placeholder="Nama Pria" maxlength="255" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama Wanita</label><br>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama_wanita" value="{{ $user->nama_wanita }}" placeholder="Nama Wanita" maxlength="255" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>NIK Pria</label><br>
                                    <div class="form-line disabled">
                                        <input type="text" class="form-control" name="nik_pria" value="{{ $user->nik_pria }}" placeholder="NIK Pria" maxlength="16" onkeypress="return onlyNumber(event)" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>NIK Wanita</label><br>
                                    <div class="form-line disabled">
                                        <input type="text" class="form-control" name="nik_wanita" value="{{ $user->nik_wanita }}" placeholder="NIK Wanita" maxlength="16" onkeypress="return onlyNumber(event)" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir Pria</label><br>
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="tanggal_lahir_pria" value="{{ $user->tanggal_lahir_pria }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir Wanita</label><br>
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="tanggal_lahir_wanita" value="{{ $user->tanggal_lahir_wanita }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>No HP</label><br>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="no_hp" value="{{ $user->no_hp }}" placeholder="Nomor HP" maxlength="12" onkeypress="return onlyNumber(event)" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label><br>
                                    <select class="form-control show-tick" name="kecamatan">
                                        <option value="">{{ $user->kecamatan }}</option>
                                        <?php foreach ($kecamatan as $item): ?>
                                            <option value="{{ $item->Kecamatan }}">{{ $item->Kecamatan }}</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Desa</label><br>
                                    <select class="form-control show-tick"name="desa">
                                        <option value="">{{ $user->desa }}</option>
                                        <?php foreach ($desa as $item): ?>
                                            <option value="{{ $item->Desa }}">{{ $item->Desa }}</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Puskesmas</label><br>
                                    <select class="form-control show-tick" name="puskesmas">
                                        <option value="">{{ $old_puskesmas->Puskesmas }}</option>
                                        <?php foreach ($puskesmas as $item): ?>
                                            <option value="{{ $item->Kode }}">{{ $item->Puskesmas }}</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group" style="margin-top: 5%;" align="right">
                                    <a href="{{ route('user.index') }}"><button type="button" class="btn btn-default waves-effect">KEMBALI</button></a>
                                    <input type="submit" class="btn bg-pink waves-effect" style="margin-left: 5px;" value="UBAH PENGGUNA">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection                                    