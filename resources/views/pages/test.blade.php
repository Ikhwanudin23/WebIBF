<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Debit Air Pemali</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .table {
            font-size: 15px;
            border-collapse: collapse;
        }
        .table-laporan th,.table-laporan td {
            border: 1px solid #000;
        }
        .table tr,.table td {
            height: 22px;
            text-align: center;
        }
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th
        {
            padding:0;
        }
    </style>
</head>
{{--<div align="center">--}}
{{--<img src="{{asset('assets/images/logomin.png')}}">--}}
{{--</div>--}}
<div align="center">
    {{--<tr>--}}
    {{--<td>--}}
    <center>
        <font size="4">DINAS PEKERJAAN UMUM SUMBER DAYA AIR DAN PENATAAN RUANG</font><BR>
        <font size="5"><b>BALAI PENGELOLAAN SUMBER DAYA AIR PEMALI COMAL</b></font><BR>
        <font size="2">Jl. Dr.Sutomo No.53 Telp.(0283)-351011 Fax.0283-356259, Kode Pos 52113, Tegal</font><BR>
        <font size="2"><i>Email :  balai_psdapc@yahoo.co.id, Website : bpsda-pemali.jatengprov.go.id</i><BR></font>
    </center>
    {{--</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td colspan="2">--}}
    <hr style="height:1px;border:none;color:#333;background-color:#333;">
    {{--</td>--}}
    {{--</tr>--}}
</div>
<body>

<center>
    <font size="3"><b>Report Data Debit Air Sungai Pemali</b></font>
    <br>
    <font size="3"><b>Bulan : {{$nama_bulan}} </b></font>
</center>

<br>
<table id="example1"  class="table table-laporan"
       style="border-collapse: collapse; width: 100%;">
    <thead>
    <tr>
        <th>Tanggal</th>
        <th>Ketinggian Sungai</th>
        <th>Ketinggian Debit Tumpah</th>
    </tr>
    </thead>

    <tbody>
    @for($i = 1; $i <= $tanggal; $i++)
        <tr>
            <td><strong> {{$i}} </strong></td>
            {{--<td>{{isset($reports[$i]) ? $reports[$i]["created_at"]->format('d-m-Y') : '-'}}</td>--}}
            <td> <strong> {{isset($reports[$i]) ? $reports[$i]["sungai"].' cm' : '-'}} </strong></td>
            <td><strong> {{isset($reports[$i]) ? $reports[$i]["debit_tumpah"].' cm' : '-'}} </strong> </td>
        </tr>
    @endfor
    </tbody>
</table>
</body>
</html>
