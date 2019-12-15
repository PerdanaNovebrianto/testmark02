@extends('admin.layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>DASHBOARD</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="info-box bg-pink hover-expand-effect">
                                        <div class="icon">
                                            <i class="material-icons">person</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">JUMLAH PENGGUNA</div>
                                            <div class="number">{{ $users }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="info-box bg-pink hover-expand-effect">
                                        <div class="icon">
                                            <i class="material-icons">assignment</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">JUMLAH PERTANYAAN ASSESMENT</div>
                                            <div class="number">{{ $assesments }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="info-box bg-pink hover-expand-effect">
                                        <div class="icon">
                                            <i class="material-icons">create</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">JUMLAH PERTANYAAN QUIS</div>
                                            <div class="number">{{ $questions }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection