@extends('frontend.layouts.master')
@section('title')
    Public Fund List
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
                    <h3>Public Fund Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Public Fund Listing</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->

        <div class="row">
            <div class="col-md-12 text-end mb-3">
                <a class="print_btn" href="{{ route('public-funds.create') }}">Add Public Fund</a>
              </div>
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row justify-content-end">
                                    <div class="col-md-5 col-lg-3 mb-2">
                                        <div class="position-relative">
                                            <input type="text" class="form-control search_table" value=""
                                                id="search" placeholder="Search">
                                            <span class="table_search_icon"><i class="fa fa-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive rounded-2">
                                    <table class="table customize-table mb-0 align-middle bg_tbody">
                                        <thead class="text-white fs-4 bg_blue">
                                            <tr>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="name"
                                                    style="cursor: pointer">SR.NO<span id="name_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="emp_id"
                                                    style="cursor: pointer">VR.NO<span id="emp_id_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="gender"
                                                    style="cursor: pointer">VR.DATE<span id="gender_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="pers_no"
                                                style="cursor: pointer">AMT<span id="pers_no_icon"><i
                                                    class="fa fa-arrow-down"></i></span> </th>
                                                <th>NAME</th>
                                                <th>DESIG</th>
                                                <th>BILL REF</th>
                                                <th>CHQ.NO</th>
                                                <th>DV.NO</th>
                                                <th>CT.NO</th>
                                                <th>CAT</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            <tr>
                                                <td>15</td>
                                                <td>14</td>
                                                <td>08/04/2024</td>
                                                <td>55561</td>
                                                <td>M/S. LASER SCIEN</td>
                                                <td>ICICI BANK</td>
                                                <td>SECURITY DEPOSIT</td>
                                                <td>0</td>
                                                <td>7268/1/24</td>
                                                <td></td>
                                                <td>X</td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>14</td>
                                                <td>08/04/2024</td>
                                                <td>55561</td>
                                                <td>M/S. LASER SCIEN</td>
                                                <td>ICICI BANK</td>
                                                <td>SECURITY DEPOSIT</td>
                                                <td>0</td>
                                                <td>7268/1/24</td>
                                                <td></td>
                                                <td>X</td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>14</td>
                                                <td>08/04/2024</td>
                                                <td>55561</td>
                                                <td>M/S. LASER SCIEN</td>
                                                <td>ICICI BANK</td>
                                                <td>SECURITY DEPOSIT</td>
                                                <td>0</td>
                                                <td>7268/1/24</td>
                                                <td></td>
                                                <td>X</td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>14</td>
                                                <td>08/04/2024</td>
                                                <td>55561</td>
                                                <td>M/S. LASER SCIEN</td>
                                                <td>ICICI BANK</td>
                                                <td>SECURITY DEPOSIT</td>
                                                <td>0</td>
                                                <td>7268/1/24</td>
                                                <td></td>
                                                <td>X</td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>14</td>
                                                <td>08/04/2024</td>
                                                <td>55561</td>
                                                <td>M/S. LASER SCIEN</td>
                                                <td>ICICI BANK</td>
                                                <td>SECURITY DEPOSIT</td>
                                                <td>0</td>
                                                <td>7268/1/24</td>
                                                <td></td>
                                                <td>X</td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>14</td>
                                                <td>08/04/2024</td>
                                                <td>55561</td>
                                                <td>M/S. LASER SCIEN</td>
                                                <td>ICICI BANK</td>
                                                <td>SECURITY DEPOSIT</td>
                                                <td>0</td>
                                                <td>7268/1/24</td>
                                                <td></td>
                                                <td>X</td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>14</td>
                                                <td>08/04/2024</td>
                                                <td>55561</td>
                                                <td>M/S. LASER SCIEN</td>
                                                <td>ICICI BANK</td>
                                                <td>SECURITY DEPOSIT</td>
                                                <td>0</td>
                                                <td>7268/1/24</td>
                                                <td></td>
                                                <td>X</td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>14</td>
                                                <td>08/04/2024</td>
                                                <td>55561</td>
                                                <td>M/S. LASER SCIEN</td>
                                                <td>ICICI BANK</td>
                                                <td>SECURITY DEPOSIT</td>
                                                <td>0</td>
                                                <td>7268/1/24</td>
                                                <td></td>
                                                <td>X</td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>14</td>
                                                <td>08/04/2024</td>
                                                <td>55561</td>
                                                <td>M/S. LASER SCIEN</td>
                                                <td>ICICI BANK</td>
                                                <td>SECURITY DEPOSIT</td>
                                                <td>0</td>
                                                <td>7268/1/24</td>
                                                <td></td>
                                                <td>X</td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>14</td>
                                                <td>08/04/2024</td>
                                                <td>55561</td>
                                                <td>M/S. LASER SCIEN</td>
                                                <td>ICICI BANK</td>
                                                <td>SECURITY DEPOSIT</td>
                                                <td>0</td>
                                                <td>7268/1/24</td>
                                                <td></td>
                                                <td>X</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                                    <input type="hidden" name="hidden_column_name" id="hidden_column_name"
                                        value="id" />
                                    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="desc" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
@endsection