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
    <h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
        <h6><a target="_blank" href="#">www.malasngoding.com</a></h5>
</center>

<table class='table table-bordered'>
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

</body>
</html>