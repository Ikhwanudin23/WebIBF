@extends('index')
@section('content')
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">Data Ketinggian Debit Tumpah</h4>
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
                                <th>Waktu</th>
                                <th>Ketinggian</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            @foreach($debittumpah as $dbt)

                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$dbt->created_at->format('d-m-Y')}}</td>
                                <td>{{$dbt->created_at->format('h:i')}}</td>
                                <td>{{$dbt->debittumpah}} cm</td>

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