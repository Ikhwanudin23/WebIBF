@extends('index')
@section('content')
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">Data Ketinggian Sungai</h4>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Sungai</th>
                                <th>Debit Tumpah</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            @foreach($report as $rp)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$rp->created_at->format('d-m-Y')}}</td>
                                <td>{{$rp->sungai}}</td>
                                <td>{{$rp->debittumpah}}</td>

                            </tr>
                            <?php $no++ ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end row -->
        </div>
    </div>
    <!-- container-fluid -->
@endsection