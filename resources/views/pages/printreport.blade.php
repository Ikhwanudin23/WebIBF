<!DOCTYPE html>
<html>
<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<style type="text/css">
    table tr td,
    table tr th{
        font-size: 9pt;
    }
</style>
<center>
    <h5>Laporan Debit Tumpah dan Sungai</h5>
</center>

<h1>Bulan : {{$nama_bulan}}</h1>

<table class='table table-bordered'>
    <thead>
    <tr>
        <th>Tanggal</th>
        <th>Sungai</th>
        <th>Debit Tumpah</th>
    </tr>
    </thead>
    <tbody>
    @for($i = 1; $i <= $tanggal; $i++)
        <tr>
            <td>{{$i}}</td>
            {{--<td>{{isset($reports[$i]) ? $reports[$i]["created_at"]->format('d-m-Y') : '-'}}</td>--}}
            <td>{{isset($reports[$i]) ? $reports[$i]["sungai"] : '-'}}</td>
            <td>{{isset($reports[$i]) ? $reports[$i]["debit_tumpah"] : '-'}}</td>
        </tr>
    @endfor
    </tbody>
</table>

</body>
</html>