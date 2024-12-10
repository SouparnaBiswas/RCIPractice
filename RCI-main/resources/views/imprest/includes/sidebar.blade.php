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
                        <a class="sidebar-link {{ Request::is('imprest/cash-withdrawals*') ? 'active' : '' }}"  href="{{ route('cash-withdrawals.index') }}" >
                            <span>
                                <i class="ti ti-currency-rupee"></i>
                            </span>
                            <span class="hide-menu">Cash Withdrawal</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link {{ Request::is('imprest/advance-settlement*') ? 'active' : '' }}"  href="{{ route('advance-settlement.index') }}" >
                            <span>
                                <i class="ti ti-cash"></i>
                            </span>
                            <span class="hide-menu">Advance Settlement</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link {{ Request::is('imprest/advance-funds*') ? 'active' : '' }}"  href="{{ route('advance-funds.index') }}" >
                            <span>
                                <i class="ti ti-package"></i>
                            </span>
                            <span class="hide-menu">Advance Fund</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link {{ Request::is('imprest/cda-bills*') ? 'active' : '' }}"  href="{{ route('cda-bills.index') }}" >
                            <span>
                                <i class="ti ti-menu"></i>
                            </span>
                            <span class="hide-menu">CDA Bill</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-item">
                        <a class="sidebar-link {{ Request::is('imprest/cda-receipts*') ? 'active' : '' }}"  href="{{ route('cda-receipts.index') }}" >
                            <span>
                                <i class="ti ti-currency-rupee"></i>
                            </span>
                            <span class="hide-menu">CDA Receipt</span>
                        </a>
                    </li>
    
                </ul>
            
        </nav>

        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
