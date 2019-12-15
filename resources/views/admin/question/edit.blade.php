@extends('admin.layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>UBAH SOAL</h2>
                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{ route('question.update', ['question' => $question->id]) }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group" style="margin-bottom: 10px;">
                                    <label>Gambar Soal<span class="small"> ( jika ada )</span></label><br>
                                    <input type="hidden" id="gambar_lama" name="gambar_lama" value="{{ $question->gambar }}">
                                    <input type="hidden" id="gambar_baru" name="gambar_baru" value="{{ $question->gambar }}">
                                    <div id="error_format" class="alert alert-danger" style="display:none" role="alert"  align="center">Format file harus PNG/JPG/JPEG.</div>
                                    <div id="error_size" class="alert alert-danger" style="display:none" role="alert" align="center">Ukuran file lebih dari 1MB.</div>
                                    <div class="form-group">
                                        <input type="file" id="gambar_soal" name="gambar_soal" accept="image/*" onchange="preview_ubah_gambar(event)">
                                        <div class="help-info">Format PNG/JPG/JPEG ukuran max 1MB</div>
                                    </div>
                                    <div id="preview_lampiran" style="display:none" align="center">
                                        <div class="preview-card">
                                            <div class="image-middle">
                                                <img id="gambar_lampiran" style="max-height:240px" width="100%" height="auto">
                                            </div>
                                        </div>
                                        <button type="button" class="btn bg-pink waves-effect" onclick="del_preview_ubah()"><i class="material-icons">delete</i></button>
                                    </div>
                                    <div id="preview_lampiran_lama" align="center">
                                        <?php if($question->gambar != ''){?>
                                            <div class="preview-card">
                                                <div class="image-middle">
                                                    <img src="{{ asset('assets/image/soal').'/'.$question->gambar }}" style="max-height:240px" width="100%" height="auto">
                                                </div>
                                            </div>
                                            <button type="button" class="btn bg-pink waves-effect" onclick="del_preview_lama()"><i class="material-icons">delete</i></button>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pertanyaan</label><br>
                                    <div class="form-line">
                                        <textarea id="pertanyaan" name="pertanyaan" rows="5" class="form-control no-resize" placeholder="Pertanyaan" required>{{ $question->pertanyaan }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jawaban Benar</label><br>
                                    <div class="form-line">
                                        <textarea id="jawaban_benar" name="jawaban_benar" rows="1" class="form-control no-resize" placeholder="Jawaban Benar" required>{{ $question->jawaban_benar }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jawaban Salah - 1</label><br>
                                    <div class="form-line">
                                        <textarea id="jawaban_salah1" name="jawaban_salah1" rows="1" class="form-control no-resize" placeholder="Jawaban Salah - 1" required>{{ $question->jawaban_salah1 }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jawaban Salah - 2</label><br>
                                    <div class="form-line">
                                        <textarea id="jawaban_salah2" name="jawaban_salah2" rows="1" class="form-control no-resize" placeholder="Jawaban Salah - 2" required>{{ $question->jawaban_salah2 }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jawaban Salah - 3</label><br>
                                    <div class="form-line">
                                        <textarea id="jawaban_salah3" name="jawaban_salah3" rows="1" class="form-control no-resize" placeholder="Jawaban Salah - 3" required>{{ $question->jawaban_salah3 }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 5%;" align="right">
                                    <a href="{{ route('question.index') }}"><button type="button" class="btn btn-default waves-effect">KEMBALI</button></a>
                                    <input type="submit" class="btn bg-pink waves-effect" style="margin-left: 5px;" value="UBAH SOAL">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection