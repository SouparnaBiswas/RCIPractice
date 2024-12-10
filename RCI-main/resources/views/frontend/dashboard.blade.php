
@extends('frontend.layouts.master')
@section('title')
    Dashboard
@endsection

@push('styles')
@endpush

@section('content')
    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <div class="container-fluid">
        <div class="breadcome-list">
            <div class="d-flex">
                <div class="arrow_left"><a href="" class="text-white"><i class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Dashboard</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Dashboard</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->


    <div class="">

            <div class="card-wrap">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6">
                        <a href="{{route('receipts.index')}}">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Public Fund</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{route('cda-receipts.index')}}">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Imprest</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- <div class="col-lg-3 col-md-6">
                        <a href="{{ route('item-codes.index') }}">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Material Management</h5>
                                </div>
                            </div>
                        </a>
                    </div> --}}
                    <div class="col-lg-3 col-md-6">
                        <a href="{{route('arrears.index')}}">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Income tax</h5>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
            <!-- Add more cards as needed -->
        </div>

    </div>

@endsection
