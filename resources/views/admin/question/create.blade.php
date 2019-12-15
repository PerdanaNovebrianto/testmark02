@extends('admin.layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>TAMBAH SOAL</h2>
                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{ route('question.store') }}">
                                {{ csrf_field() }}
                                <div class="form-group" style="margin-bottom: 10px;">
                                    <label>Gambar Soal<span class="small"> ( jika ada )</span></label><br>
                                    <div id="error_format" class="alert bg-red" style="display:none" role="alert" align="center">Format file harus PNG/JPG/JPEG.</div>
                                    <div id="error_size" class="alert bg-red" style="display:none" role="alert" align="center">Ukuran file lebih dari 1MB.</div>
                                    <div class="form-group">
                                        <input type="file" id="gambar_soal" name="gambar_soal" accept="image/*" onchange="preview_gambar(event)">
                                        <div class="help-info">Format PNG/JPG/JPEG ukuran max 1MB.</div>
                                    </div>
                                    <div id="preview_lampiran" style="display:none" align="center">
                                        <div class="preview-card">
                                            <div class="image-middle">
                                                <img id="gambar_lampiran" style="max-height:240px" width="100%" height="auto">
                                            </div>
                                        </div>
                                        <button type="button" class="btn bg-pink waves-effect" onclick="del_preview()">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pertanyaan</label><br>
                                    <div class="form-line">
                                        <textarea id="pertanyaan" name="pertanyaan" rows="5" class="form-control no-resize" placeholder="Pertanyaan" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jawaban Benar</label><br>
                                    <div class="form-line">
                                        <textarea id="jawaban_benar" name="jawaban_benar" rows="1" class="form-control no-resize" placeholder="Jawaban Benar" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jawaban Salah - 1</label><br>
                                    <div class="form-line">
                                        <textarea id="jawaban_salah1" name="jawaban_salah1" rows="1" class="form-control no-resize" placeholder="Jawaban Salah - 1" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jawaban Salah - 2</label><br>
                                    <div class="form-line">
                                        <textarea id="jawaban_salah2" name="jawaban_salah2" rows="1" class="form-control no-resize" placeholder="Jawaban Salah - 2" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jawaban Salah - 3</label><br>
                                    <div class="form-line">
                                        <textarea id="jawaban_salah3" name="jawaban_salah3" rows="1" class="form-control no-resize" placeholder="Jawaban Salah - 3" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 5%;" align="right">
                                    <input type="submit" class="btn bg-pink waves-effect" value="TAMBAH SOAL">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection