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
                            <h4 id="debit" class="font-500"> </h4>
                                <h5 id="statusd"></h5>


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
                            <h4 id="sungai" class="font-500"></h4>
                                <h5 id="statuss"></h5>

                        </div>
                        <div class="pt-2">

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end row -->
        <div class="row">
            {{--<div class="col-xl-12">--}}
                {{--<div class="card">--}}
                    {{--<div class="card-body">--}}
                        {{--<h4 class="mt-0 header-title mb-10">Monthly Earning</h4>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-lg-12">--}}
                                {{--<div>--}}
                                    {{--<div id="chart-with-area" class="ct-chart earning ct-golden-section"></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                        {{--<!-- end row --></div>--}}
                {{--</div>--}}
                {{--<!-- end card --></div>--}}
        </div>
        <!-- end row -->

        <!-- end row --></div>
    <!-- container-fluid -->

    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-database.js"></script>
    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyBvtK_grzpMJFPd6HVhNVqLA9zf1xMYBGs",
            authDomain: "ibrebesf.firebaseapp.com",
            databaseURL: "https://ibrebesf.firebaseio.com",
            projectId: "ibrebesf",
            storageBucket: "ibrebesf.appspot.com",
            messagingSenderId: "463737117362",
            appId: "1:463737117362:web:2aaea7fd009c77b3b287ab",
            measurementId: "G-PVEEM9035Y"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        // const analityc = firebase.analytics();
        // console.log(analityc)
        var refirebase = firebase.database().ref('/Raspi3/');
        // console.log(refirebase)
        refirebase.on('value', function (snapshot) {
            const debit = document.querySelector('#debit');
            debit.innerText = snapshot.child('Debit/Ketinggian').val();

            const statusd = document.querySelector('#statusd');
            statusd.innerText = snapshot.child('Debit/Status').val();

            const sungai = document.querySelector('#sungai');
            sungai.innerText = snapshot.child('Sungai/Ketinggian').val();

            const statuss = document.querySelector('#statuss');
            statuss.innerText = snapshot.child('Sungai/Status').val();

        });
    </script>
@endsection