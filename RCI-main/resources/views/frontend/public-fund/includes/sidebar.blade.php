
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
            <!-- Sidebar Menu-->
            <ul id="sidebarnav">
                
                <li class="sidebar-item">
                    <a class="sidebar-link {{Request::is('dashboard*') ? 'active' : ''}}" href="{{route('dashboard')}}" aria-expanded="false">
                    <span>
                        <i class="ti ti-aperture"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                    </a>
                </li> 

                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('receipts*') ? 'active' : '' }}"
                        href="{{ route('receipts.index') }}" >
                        <span>
                            <i class="ti ti-cash"></i>
                        </span>
                        <span class="hide-menu">Receipt</span>
                    </a>

                    {{-- <li class="nav-item dropdown-hover d-none d-lg-block">
                        <a class="nav-link" href="{{ route('receipts.index') }}">Receipt</a>
                    </li> --}}

                    <a class="sidebar-link {{ Request::is('cash-payments*') ? 'active' : '' }}"
                        href="{{ route('cash-payments.index') }}" >
                        <span>
                            <i class="ti ti-cash"></i>
                        </span>
                        <span class="hide-menu">Cash Payment</span>
                    </a>
                    {{-- <ul class="collapse" id="collapseExample">
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Request::is('cash-payments*') ? 'active' : '' }}"
                                href="{{ route('cash-payments.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-cash-banknote"></i>
                                </span>
                                <span class="hide-menu">List</span>
                            </a>
                        </li>
                        
                    </ul> --}}
                </li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('cheque-payments*') ? 'active' : '' }}"
                         href="{{ route('cheque-payments.index') }}" >
                        <span>
                            <i class="ti ti-receipt"></i>
                        </span>
                        <span class="hide-menu">Cheque Payment</span>
                    </a>
                    
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('bank-detail*') ? 'active' : '' }}"
                            href="{{ route('bank-details.index') }}" >
                        <span>
                            <i class="ti ti-cash"></i>
                        </span>
                        <span class="hide-menu">Bank Detail</span>
                    </a>
                </li>
            </ul>

        </nav>

        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
