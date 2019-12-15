@extends('admin.layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>TAMBAH ASSESMENT</h2>
                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" method="POST" action="{{ route('assesment.store') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Pertanyaan</label><br>
                                    <div class="form-line">
                                        <textarea id="pertanyaan" name="pertanyaan" rows="5" class="form-control no-resize" placeholder="Pertanyaan" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 5%;" align="right">
                                    <input type="submit" class="btn bg-pink waves-effect" value="TAMBAH ASSESMENT">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection