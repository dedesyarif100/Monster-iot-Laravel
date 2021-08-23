@extends('layouts.main')

{{-- META --}}
@section('meta')

@endsection

{{-- CSS --}}
@section('css')
    <style>
        .sparepart {
            position: relative;
            z-index: 1030;
        }

        .wheel, .door {
            position: absolute;
            background-color: rgba(34, 255, 67, 0.9);
        }

        .wheel.open, .door.open {
            background-color: rgba(255, 34, 34, 0.9);
        }

        .wheel {
            height: 17px;
            width: 130px;
            border-radius: 10px;
        }

        .wheel.front-right,
        .wheel.middle-right,
        .wheel.rear-right {
            top: 22px;
        }

        .wheel.front-left,
        .wheel.middle-left,
        .wheel.rear-left {
            top: 262px;
        }

        .wheel.front-right,
        .wheel.front-left {
            left: 105px;
        }

        .wheel.middle-right,
        .wheel.middle-left {
            left: 450px;
        }

        .wheel.rear-right,
        .wheel.rear-left {
            left: 620px;
        }

        .door {
            height: 10px;
            width: 130px;
            border-radius: 10px;
        }

        .door.front-right, .door.front-left {
            left: 70px;
        }

        .door.front-right {
            top: 45px;
        }

        .door.front-left {
            top: 245px;
        }
    </style>
@endsection

{{-- TITLE --}}
@section('title', 'RFID')

{{-- TITLE CONTENT --}}
@section('title-content', 'RFID')

{{-- CONTENT --}}
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('images/tire.png') }}" class="img-fluid rounded-start" alt="Tire">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">RFID 1</h5>
                            <strong id="rfid1" class="text-success fs-5 d-block">Detected</strong>
                            <p id="status1">Masuk</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('images/tire.png') }}" class="img-fluid rounded-start" alt="Tire">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">RFID 2</h5>
                            <strong id="rfid2" class="text-success fs-5 d-block">Detected</strong>
                            <p id="status2">Masuk</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('images/tire.png') }}" class="img-fluid rounded-start" alt="Tire">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">RFID 3</h5>
                            <strong id="rfid3" class="text-success fs-5 d-block">Detected</strong>
                            <p id="status3">Masuk</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('images/tire.png') }}" class="img-fluid rounded-start" alt="Tire">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">RFID 4</h5>
                            <strong id="rfid4" class="text-success fs-5 d-block">Detected</strong>
                            <p id="status4">Masuk</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center py-5">
        <div class="col-auto">
            <div class="sparepart">
                <div class="wheel front-right"></div>
                <div class="wheel front-left"></div>
                {{-- <div class="wheel middle-right"></div>
                <div class="wheel middle-left"></div> --}}
                <div class="wheel rear-right"></div>
                <div class="wheel rear-left"></div>
                {{-- <div class="door front-right"></div>
                <div class="door front-left"></div> --}}
            </div>
            <img src="{{ asset('images/truck.png') }}" alt="Truck" class="img-fluid border">
        </div>
    </div>
@endsection

{{-- MODAL --}}
@section('modal')

@endsection

{{-- JS --}}
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
    <script src="{{ asset('js/sub.js') }}"></script>
    <script>
        MQTTconnect();
    </script>
@endsection
