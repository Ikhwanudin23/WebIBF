@extends('index')
@section('content')
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">Dashboard</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Welcome to IBF</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <img src="assets/images/services-icon/01.png" alt="">
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Debit</h5>
                            @foreach($debittumpah as $dbt)
                            <h4 id="debit" class="font-500">{{$dbt->ketinggian}} </h4>
                                <h5 id="status">Aman</h5>

                            @endforeach

                        </div>
                        <div class="pt-2">


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <img src="assets/images/services-icon/02.png" alt="">
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Sungai</h5>
                            @foreach($sungai as $sg)
                            <h4 id="sungai" class="font-500">{{$sg->ketinggian}}</h4>
                                <h5 id="status">Aman</h5>
                            @endforeach

                        </div>
                        <div class="pt-2">

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-10">Monthly Earning</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <div id="chart-with-area" class="ct-chart earning ct-golden-section"></div>
                                </div>
                            </div>

                        </div>
                        <!-- end row --></div>
                </div>
                <!-- end card --></div>
        </div>
        <!-- end row -->

        <!-- end row --></div>
    <!-- container-fluid -->

    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        // Pusher.logToConsole = true;
        const sungai = document.querySelector('#sungai');
       const debit = document.querySelector('#debit');

        const status = document.querySelector('#status');

        var pusher = new Pusher('362f1f8218cb607ebc5d', {
            cluster: 'ap1',
            // encrypted: true
        });

        var channel = pusher.subscribe('flood');
        channel.bind('App\\Events\\FloodEvent', function(data) {
            console.log(data);
            if(data.message.sungai !== undefined){
                sungai.innerHTML = data.message.sungai;
                //ketinggian.innerHTML = data.message.ketinggiand;
                if(data.message.status == 1){
                    status.innerHTML = 'Aman';
                }else if(data.message.status == 2){
                    status.innerHTML = 'Tidak aman';
                }else {
                    status.innerHTML = 'Bahaya';
                }
            }

            if(data.message.debit !== undefined){
                debit.innerHTML = data.message.debit;
                //ketinggian.innerHTML = data.message.ketinggiand;
                if(data.message.status == 1){
                    status.innerHTML = 'Aman';
                }else if(data.message.status == 2){
                    status.innerHTML = 'Tidak aman';
                }else {
                    status.innerHTML = 'Bahaya';
                }
            }
            // alert(JSON.stringify(data));
        });
    </script>
@endsection