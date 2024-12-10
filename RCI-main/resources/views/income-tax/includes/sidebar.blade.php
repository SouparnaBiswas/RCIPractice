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
                        {{-- <a class="sidebar-link {{ Request::is('income-tax/arrears*') ? 'active' : '' }}"  href="{{ route('arrears.index') }}" >
                            <span>
                                <i class="ti ti-brand-cashapp"></i>
                            </span>
                            <span class="hide-menu">Arrears</span>
                        </a> --}}
                        {{-- <ul class="collapse {{ Request::is('income-tax/cda-receipts*') ? 'show' : '' }}" id="collapseExample">
                            <li class="sidebar-item">
                                <a class="sidebar-link {{ Request::is('income-tax/cda-receipts*') ? 'active' : '' }}" href="{{ route('cda-receipts.index') }}"  aria-expanded="false">
                                    <span>
                                        <i class="ti ti-cash-banknote"></i>
                                    </span>
                                    <span class="hide-menu">List</span>
                                </a>
                            </li>
                        </ul> --}}
                    </li>


                </ul>

        </nav>

        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
