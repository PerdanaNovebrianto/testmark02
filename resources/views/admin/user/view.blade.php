@extends('admin.layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>MANAJEMEN PENGGUNA</h2>
                        </div>
                        <div class="body">
                            @if (session('message'))
                                <div class="alert bg-pink" role="alert" align="center">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Nama Pria</th>
                                            <th>Nama Wanita</th>
                                            <th>NIK Pria</th>
                                            <th>NIK Wanita</th>
                                            <th>Tanggal Lahir Pria</th>
                                            <th>Tanggal Lahir Wanita</th>
                                            <th>Nomor HP</th>
                                            <th>Kecamatan</th>
                                            <th>Desa</th>
                                            <th>Puskesmas</th>
                                            <th>Status Assesment</th>
                                            <th>Status Kelulusan</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->nama_pria }}</td>
                                                <td>{{ $user->nama_wanita }}</td>
                                                <td>{{ $user->nik_pria }}</td>
                                                <td>{{ $user->nik_wanita }}</td>
                                                <td>{{ $user->tanggal_lahir_pria }}</td>
                                                <td>{{ $user->tanggal_lahir_wanita }}</td>
                                                <td>{{ $user->no_hp }}</td>
                                                <td>{{ $user->kecamatan }}</td>
                                                <td>{{ $user->desa }}</td>
                                                <td>{{ $user->puskesmas }}</td>
                                                @if($user->status_assesment === 'true')
                                                    <td>Sudah</td>
                                                @elseif($user->status_assesment === 'false')
                                                    <td>Belum</td>
                                                @else
                                                    <td>-</td>
                                                @endif
                                                @if($user->status_kelulusan === 'true')
                                                    <td>Sudah</td>
                                                @elseif($user->status_kelulusan === 'false')
                                                    <td>Belum</td>
                                                @else
                                                    <td>-</td>
                                                @endif
                                                <td>{{ $user->role }}</td>
                                                <td align="center">
                                                    @if($user->role !== 'admin')
                                                        @if($user->status_assesment === 'true')
                                                            <a href="{{ route('admin.assesment_detail', ['id' => $user->id]) }}">
                                                                <button type="button" class="btn bg-pink waves-effect" style="margin:2px;"><i class="material-icons">assignment_ind</i></button>
                                                            </a>
                                                        @endif
                                                        <a href="{{ route('user.edit', ['user' => $user->id]) }}">
                                                            <button type="button" class="btn bg-pink waves-effect" style="margin:2px;"><i class="material-icons">create</i></button>
                                                        </a>
                                                        <button type="button" class="btn bg-pink waves-effect" style="margin:2px;" data-toggle="modal" data-target="#hapusPengguna{{ $user->id }}"><i class="material-icons">delete</i></button>
                                                    @endif
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="hapusPengguna{{ $user->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-pink">
                                                            <h4 class="modal-title" id="largeModalLabel">HAPUS PENGGUNA</h4>
                                                        </div>
                                                        <form id="form_advanced_validation" method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <div class="modal-body" align="center">
                                                                <h5>Apakah anda yakin ingin menghapus pengguna <span style="color: #4CAF50;">{{ $user->nama }}</span>?</h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">TUTUP</button>
                                                                <input type="submit" class="btn bg-pink waves-effect" value="HAPUS PENGGUNA">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection