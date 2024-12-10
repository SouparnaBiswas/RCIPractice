@extends('imprest.layouts.master')
@section('title')
    Imprest Report Generate
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
                <div class="arrow_left"><a href="" class="text-white"><i
                            class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Report Generate</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod"> Imprest Report</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->


        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="form">
                            <form action="{{ route('generate.imprest-report')}}" method="POST" >
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group col-md-12 mb-2">
                                                    <div class="row align-items-center">
                                                              
                                                        <div class="form-group col-md-6 mb-2">
                                                            <div class="col-md-12">
                                                                <label>Report Date</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                               <input type="date" class="form-control" name="report_date" id="report_date" value="{{ old('report_date')}}">
                                                            </div>
                                                            {{-- validation  --}}
                                                            @error('report_date')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                            
                                                        </div>
                                                        <div class="form-group col-md-6 mb-2">
                                                            <div class="col-md-12">
                                                                <label>A/c Off Sign</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                               <select class="form-select" name="account_officer_sign" id="account_officer_sign">
                                                                    <option value="">Select Accountant</option>
                                                                    @foreach($accountants as $accountant)
                                                                        <option value="{{ $accountant->id }}">{{ $accountant->user_name }}</option>
                                                                    @endforeach
                                                               </select>
                                                            </div>
                                                            {{-- validation  --}}
                                                            @error('account_officer_sign')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-8 mb-2 boxed">
                                                            <h4>Bill Type</h4>
                                                            <div class="form-group col-md-12">
                                                                <div class="radio-container">
                                                                    <input type="radio" id="cash_book" name="bill_type" value="cash_book">
                                                                    <label for="cash_book">CASH BOOK</label>
                                                                </div>
                                                                <div class="radio-container">
                                                                    <input type="radio" id="out_stand" name="bill_type" value="out_standing">
                                                                    <label for="out_stand">OUT STANDING</label>
                                                                </div>
                                                                <div class="radio-container">
                                                                    <input type="radio" id="bill_hand" name="bill_type" value="bill_hand">
                                                                    <label for="bill_hand">BILLS IN HAND</label>
                                                                </div>
                                                                <div class="radio-container">
                                                                    <input type="radio" id="cda" name="bill_type" value="cda_bill">
                                                                    <label for="cda">BILLS AT CDA</label>
                                                                </div>

                                                                {{-- validation --}}
                                                                @error('bill_type')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                                 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- save cancel button design in right corner --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row justify-content-end">
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <button type="submit" class="listing_add">Generate</button>
                                                    </div>
                                                    
                                                    {{-- <div class="form-group col-md-6 mb-2">
                                                        <button type="submit" class="listing_exit">Cancel</button>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    
@endpush
