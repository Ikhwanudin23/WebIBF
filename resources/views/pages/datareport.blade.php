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
                        <form action="{{route('search')}}" method="post" class="row">
                            @csrf
                           <div class="form-group col-md-4">
                               <label> Bulan </label>
                               <select class="form-control" name="bulan">
                                   <option value="1"{{$bulan == '1' ? 'selected' : ''}}>Januari</option>
                                   <option value="2"{{$bulan == '2' ? 'selected' : ''}}>Februari</option>
                                   <option value="3"{{$bulan == '3' ? 'selected' : ''}}>Maret</option>
                                   <option value="4"{{$bulan == '4' ? 'selected' : ''}}>April</option>
                                   <option value="5"{{$bulan == '5' ? 'selected' : ''}}>Mei</option>
                                   <option value="6"{{$bulan == '6' ? 'selected' : ''}}>Juni</option>
                                   <option value="7"{{$bulan == '7' ? 'selected' : ''}}>Juli</option>
                                   <option value="8"{{$bulan == '8' ? 'selected' : ''}}>Agustus</option>
                                   <option value="9"{{$bulan == '9' ? 'selected' : ''}}>September</option>
                                   <option value="10"{{$bulan == '10' ? 'selected' : ''}}>Oktober</option>
                                   <option value="11"{{$bulan == '11' ? 'selected' : ''}}>November</option>
                                   <option value="12"{{$bulan == '12' ? 'selected' : ''}}>Desember</option>
                               </select>
                           </div>
                            <div class="col-md-4 mt-4">
                                <button type="submit" class="btn btn-success">cari</button>
                            </div>
                        </form>
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
                                <td>{{$rp->created_at}}</td>
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