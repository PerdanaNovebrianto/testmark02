@extends('admin.layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>DETAIL ASSESMENT</h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                        <th>Jawaban</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($assesments as $assesment): ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td>{{ $assesment->pertanyaan }}</td>
                                            <td>{{ $assesment->jawaban }}</td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="form-group" style="margin-top: 30px;" align="right">
                                <a href="{{ route('user.index') }}"><button type="button" class="btn btn-default waves-effect">KEMBALI</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection