@extends('layouts.main')

{{-- META --}}
@section('meta')

@endsection

{{-- CSS --}}
@section('css')
    <style>
        .vh-75 {
            height: 75vh !important;
        }
    </style>
@endsection

{{-- TITLE --}}
@section('title', 'Dashboard')

{{-- TITLE CONTENT --}}
@section('title-content', 'Dashboard')

{{-- CONTENT --}}
@section('content')
    <div class="row justify-content-around">
        {{-- maps --}}
        <div class="col-md-6 vh-75 border">
            <x-maps-leaflet
                :centerPoint="['lat' => -7.315018, 'long' => 112.790827]"
                :zoomLevel="18"
                :markers="[
                    ['lat' => -7.315018, 'long' => 112.790827, 'icon' => asset('images/truck.png'), 'iconSizeX' => 60, 'iconSizeY' => 25 ],
                ]"
                class="vh-75">
            </x-maps-leaflet>
        </div>
        <div class="col-md-5 overflow-auto vh-75 border">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Pintu 1</h5>
                            <p id="SP1" class="fs-5 text-end">Terbuka</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Pintu 2</h5>
                            <p id="SP2" class="fs-5 text-end">Terbuka</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Kunci Pintu</h5>
                            <p id="MAG" class="fs-5 text-end">Terkunci</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Berat Kontainer</h5>
                            <p id="LC" class="fs-5 text-end">3.245</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Proximity</h5>
                            <p id="PROX" class="fs-5 text-end">Aman</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Emergency Button</h5>
                            <p id="PB" class="fs-5 text-end">Aman</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Kondisi Mesin</h5>
                            <p id="RS" class="fs-5 text-end">Menyala</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Driving Behaviour</h5>
                            <p id="DRI" class="fs-5 text-end">Stabil</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Latitude</h5>
                            <p id="LAT" class="fs-5 text-end">-7.315018</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Longitude</h5>
                            <p id="LON" class="fs-5 text-end">112.790827</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Drowsiness</h5>
                            <p id="DRO" class="fs-5 text-end">Mengantuk</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row p-3">
        <div class="col-auto border p-3 me-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="toggleMesin" checked>
                <label class="form-check-label" for="toggleMesin">Mesin <span class="badge bg-success" id="stateMesin">Menyala</span></label>
            </div>
        </div>
        <div class="col-auto border p-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="togglePintu" checked>
                <label class="form-check-label" for="togglePintu">Pintu <span class="badge bg-success" id="statePintu">Terbuka</span></label>
            </div>
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
        (function () {
            /* =============================
             *  DOM Section
             * =============================
             */

            const toggleMesin = document.querySelector('#toggleMesin');
            const stateMesin = document.querySelector('#stateMesin');

            /* =============================
             *  End DOM Section
             * =============================
             */




            /* =============================
             *  Global Variable Section
             * =============================
             */

            /* =============================
             *  End Global Variable Section
             * =============================
             */



            /* =============================
             *  Event Section
             * =============================
             */

            toggleMesin.addEventListener('click', function () {
                if (this.checked) {
                    engineOnpub();
                    stateMesin.innerHTML = "Menyala";
                    stateMesin.classList.remove('bg-danger');
                    stateMesin.classList.add('bg-success');
                }
                else {
                    engineOffpub();
                    stateMesin.innerHTML = "Mati";
                    stateMesin.classList.remove('bg-success');
                    stateMesin.classList.add('bg-danger');
                }
            });

            togglePintu.addEventListener('click', function () {
                if (this.checked) {
                    unlockPintu();
                    statePintu.innerHTML = "Terbuka";
                    statePintu.classList.remove('bg-danger');
                    statePintu.classList.add('bg-success');
                }
                else {
                    lockPintu();
                    statePintu.innerHTML = "Tertutup";
                    statePintu.classList.remove('bg-success');
                    statePintu.classList.add('bg-danger');
                }
            });

            /* =============================
             *  End Event Section
             * =============================
             */
        })();
    </script>
@endsection
