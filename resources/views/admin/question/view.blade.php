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
                                    <h2>MANAJEMEN SOAL</h2> 
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <a href="{{ route('question.create') }}">
                                        <button type="button" class="btn bg-pink waves-effect" style="width: 100%;">TAMBAH SOAL</button>
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
                                            <th>Gambar</th>
                                            <th>Pertanyaan</th>
                                            <th>Jawaban Benar</th>
                                            <th>Jawaban Salah - 1</th>
                                            <th>Jawaban Salah - 2</th>
                                            <th>Jawaban Salah - 3</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($questions as $question)
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                @if($question->gambar != '')
                                                    <td align="center">
                                                        <img src="{{ asset('assets/image/soal').'/'.$question->gambar }}" style="max-height: 75px;" width="auto" height="100%">
                                                    </td>
                                                @endif
                                                @if($question->gambar == '')
                                                    <td  align="center"></td>
                                                @endif
                                                <td>{{ $question->pertanyaan }}</td>
                                                <td>{{ $question->jawaban_benar }}</td>
                                                <td>{{ $question->jawaban_salah1 }}</td>
                                                <td>{{ $question->jawaban_salah2 }}</td>
                                                <td>{{ $question->jawaban_salah3 }}</td>
                                                <td align="center">
                                                    <a href="{{ route('question.edit', ['question' => $question->id]) }}">
                                                        <button type="button" class="btn bg-pink waves-effect" style="margin:2px;"><i class="material-icons">create</i></button>
                                                    </a>
                                                    <button type="button" class="btn bg-pink waves-effect" style="margin:2px;" data-toggle="modal" data-target="#hapusSoal{{ $question->id }}"><i class="material-icons">delete</i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="hapusSoal{{ $question->id }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-pink">
                                                            <h4 class="modal-title" id="largeModalLabel">HAPUS SOAL</h4>
                                                        </div>
                                                        <form id="form_advanced_validation" method="POST" action="{{ route('question.destroy', ['question' => $question->id]) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <div class="modal-body" align="center">
                                                                <h5>Apakah anda yakin ingin menghapus soal ini?</h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">TUTUP</button>
                                                                <input type="submit" class="btn bg-pink waves-effect" value="HAPUS SOAL">
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