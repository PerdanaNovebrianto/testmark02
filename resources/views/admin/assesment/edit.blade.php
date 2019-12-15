@extends('admin.layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>UBAH ASSESMENT</h2>
                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" method="POST" action="{{ route('assesment.update', ['assesment' => $assesment->id]) }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label>Pertanyaan</label><br>
                                    <div class="form-line">
                                        <textarea id="pertanyaan" name="pertanyaan" rows="5" class="form-control no-resize" placeholder="Pertanyaan" required>{{ $assesment->pertanyaan }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 5%;" align="right">
                                    <a href="{{ route('assesment.index') }}"><button type="button" class="btn btn-default waves-effect">KEMBALI</button></a>
                                    <input type="submit" class="btn bg-pink waves-effect" style="margin-left: 5px;" value="UBAH ASSESMENT">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection                                    