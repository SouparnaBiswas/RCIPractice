@extends('inventory.layouts.master')
@section('title')
Inventory Report Generate
@endsection

@push('styles')
<style>

</style>
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
                <h3>Inventory</h3>
                <ul class="breadcome-menu mb-0">
                    <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                    <li><span class="bread-blod">Inventory / Reports</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!--  Row 1 -->


    <div class="">

        <div class="card-wrap">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('traffic-controls.index') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Traffic Control Register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('security-gate-stores.index') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Security Gate Store Register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('store-inward.index') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Stores inward Register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('reports.rin-controller') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Rin Control Register</h5>
                            </div>
                        </div>
                    </a>

                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.certificate-receipt-voucher')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Certificate receipt voucher</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.ledger-sheet')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Ledger Sheet</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('reports.bin-card') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Bin Card</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.register-for-inventories')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Register for inventories</h5>
                            </div>
                        </div>
                    </a>

                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.stock-sheet')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Stock sheet</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.inventory-loan-register')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Inventory Loan register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('reports.discrepancy-report') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Discrepancy</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.internal-demand-issue-voucher')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Internal demand & issue voucher</h5>
                            </div>
                        </div>
                    </a>

                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.internal-return-receipt-voucher')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Internal return & receipt voucher</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.trial-store-gate-pass')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Trial store gate pass</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('reports.armaments-ammunition-register') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Armaments and Ammunition register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.disposal-item-report')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Disposal Item</h5>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.statement-of-damaged')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Statement of damaged</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.cash-purchase-control-register')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Cash purchase control register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('reports.stores-outward-register') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Stores outward register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.record-of-transaction')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Record of transaction</h5>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.loan-out-ledger-register')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Loan out ledger register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.loan-in-ledger-register')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Loan in ledger register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('reports.cprv-control-register') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CPRV control register</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.cpiv-control-register')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">CPIV control register</h5>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.contingent-bill')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Contingent bill</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.contractors-bill')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Contractor's bill</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('reports.certified-issue-voucher') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Certified issue voucher</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.expendable-store-issue-voucher')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Expendable store issue voucher</h5>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <a href="{{route('reports.fitment-voucher')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Fitment Voucher</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('reports.lvp-list') }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">LVP List</h5>
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

@push('scripts')

@endpush
