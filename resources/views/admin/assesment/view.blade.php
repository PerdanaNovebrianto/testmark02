@extends('admin.layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="margin-bottom: 10px;">
                                    <h2>MANAJEMEN ASSESMENT</h2> 
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <a href="{{ route('assesment.create') }}">
                                        <button type="button" class="btn bg-pink waves-effect" style="width: 100%;">TAMBAH ASSESMENT</button>
                                    </a>
                                </div>
                            </div>
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
                                            <th>No</th>
                                            <th>Pertanyaan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($assesments as $assesment)
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td>{{ $assesment->pertanyaan }}</td>
                                                <td align="center">
                                                    <a href="{{ route('assesment.edit', ['assesment' => $assesment->id]) }}">
                                                        <button type="button" class="btn bg-pink waves-effect" style="margin:2px;"><i class="material-icons">create</i></button>
                                                    </a>
                                                    <button type="button" class="btn bg-pink waves-effect" style="margin:2px;" data-toggle="modal" data-target="#hapusAssesment{{ $assesment->id }}"><i class="material-icons">delete</i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="hapusAssesment{{ $assesment->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-pink">
                                                            <h4 class="modal-title" id="largeModalLabel">HAPUS ASSESMENT</h4>
                                                        </div>
                                                        <form id="form_advanced_validation" method="POST" action="{{ route('assesment.destroy', ['assesment' => $assesment->id]) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <div class="modal-body" align="center">
                                                                <h5>Apakah anda yakin ingin menghapus assesment ini?</h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">TUTUP</button>
                                                                <input type="submit" class="btn bg-pink waves-effect" value="HAPUS ASSESMENT">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $no++; ?>
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