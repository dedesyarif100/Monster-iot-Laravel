@extends('layouts.main')

{{-- META --}}
@section('meta')

@endsection

{{-- CSS --}}
@section('css')

@endsection

{{-- TITLE --}}
@section('title', 'Contact')

{{-- TITLE CONTENT --}}
@section('title-content', 'Contact')

{{-- CONTENT --}}
@section('content')
    <div class="row">
        <div class="col-md-4 mb-3 me-3">
            <h6 class="fw-bold">INDONESIA</h6>
            <table class="table table-borderless">
                <tr>
                    <td class="text-center"><i class="fas fa-map-marker-alt"></i></td>
                    <td>Jl. Aren No. 29 Tomang Jakarta, Indonesia 11430</td>
                </tr>
                <tr>
                    <td class="text-center"><i class="fas fa-phone"></i></td>
                    <td>
                        <p class="mb-0">+6221 22562887 <br> +62 856 868 7188</p>
                    </td>
                </tr>
                <tr>
                    <td class="text-center"><i class="fas fa-envelope"></i></td>
                    <td>info@tog.co.id</td>
                </tr>
            </table>
        </div>
        <div class="col-md-4">
            <h6 class="fw-bold">SINGAPORE</h6>
            <table class="table table-borderless">
                <tr>
                    <td class="text-center"><i class="fas fa-map-marker-alt"></i></td>
                    <td>81 Ubi Ave 4 #01-05 UB. One Singapore 408830</td>
                </tr>
                <tr>
                    <td class="text-center"><i class="fas fa-phone"></i></td>
                    <td>
                        <p class="mb-0">+65 65384074 <br> +65 8484 3836</p>
                    </td>
                </tr>
                <tr>
                    <td class="text-center"><i class="fas fa-envelope"></i></td>
                    <td>info@tog.sg</td>
                </tr>
            </table>
        </div>
    </div>
@endsection

{{-- MODAL --}}
@section('modal')

@endsection

{{-- JS --}}
@section('js')

@endsection
