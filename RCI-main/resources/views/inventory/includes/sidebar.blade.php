@php
use App\Helpers\Helper;
@endphp


<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            @if (!isset(Helper::logo()->logo))
            <a href="#" class="text-nowrap logo-img">
                <img src="{{ asset('frontend_assets/images/logo.png') }}" class="dark-logo" alt="">
            </a>
            @else
                <a href="#" class="text-nowrap logo-img">
                    <img src="{{ Storage::url(Helper::logo()->logo) }}" class="dark-logo" alt="">
                </a>
            @endif
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8 text-muted"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
               
            <ul id="sidebarnav">
                <!-- =================== -->
                <!-- Dashboard -->
                <!-- =================== -->
                <!-- <li class="sidebar-item">
                    <a class="sidebar-link" href="index.html" aria-expanded="false">
                    <span>
                        <i class="ti ti-aperture"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                    </a>
                </li> -->
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link {{Request::is('dashboard*') ? 'active' : ''}}" href="{{route('dashboard')}}" aria-expanded="false">
                    <span>
                        <i class="ti ti-aperture"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                    </a>
                </li>  --}}
                
                <li class="sidebar-item">
                    <a class="sidebar-link {{Request::is('inventory/item-codes*') ? 'active' : ''}}" href="{{route('item-codes.index')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-code"></i>
                        </span>
                       
                        <span class="hide-menu">Item Codes</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{Request::is('inventory/credit-vouchers*') ? 'active' : ''}}" href="{{route('credit-vouchers.index')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-box"></i>
                        </span>
                        <span class="hide-menu">Credit Vouchers</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{Request::is('inventory/debit-vouchers*') ? 'active' : ''}}" href="{{route('debit-vouchers.index')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-cube-send"></i>
                        </span>
                        <span class="hide-menu">Debit Vouchers</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{Request::is('inventory/transfer-vouchers*') ? 'active' : ''}}" href="{{route('transfer-vouchers.index')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-transfer-out"></i>
                        </span>
                        <span class="hide-menu">Transfer Vouchers</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{Request::is('inventory/conversion-vouchers*') ? 'active' : ''}}" href="{{route('conversion-vouchers.index')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-box-multiple-2"></i>
                        </span>
                        <span class="hide-menu">Conversion Vouchers</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{Request::is('inventory/external-issue-vouchers*') ? 'active' : ''}}" href="{{route('external-issue-vouchers.index')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-box"></i>
                        </span>
                        <span class="hide-menu">External Issue Vouchers</span>
                    </a>
                </li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link {{Request::is('inventory/certificate-issue-vouchers*') ? 'active' : ''}}" href="{{route('certificate-issue-vouchers.index')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-box"></i>
                        </span>
                        <span class="hide-menu">Certificate Issue Vouchers</span>
                    </a>
                </li>
            </ul>

            
            
        </nav>

        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
