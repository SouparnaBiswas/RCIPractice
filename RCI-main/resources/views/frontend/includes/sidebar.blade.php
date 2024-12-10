

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
                <li class="sidebar-item">
                    <a class="sidebar-link {{Request::is('dashboard*') ? 'active' : ''}}" href="{{route('dashboard')}}" aria-expanded="false">
                    <span>
                        <i class="ti ti-aperture"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                    </a>
                </li> 
                <li class="sidebar-item">
                    <a class="sidebar-link {{Request::is('members*') ? 'active' : ''}}" href="{{route('members.index')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Add Member</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link {{Request::is('public-funds*') ? 'active' : ''}}" href="{{route('public-funds.index')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Public fund</span>
                    </a>
                </li> --}}
                
                <li class="sidebar-item">
                    <a class="sidebar-link {{Request::is('attendances*') ? 'active' : ''}}" href="{{ route('attendances.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-notebook"></i>
                        </span>
                        <span class="hide-menu">Attendance</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ Route::currentRouteNamed('members-loan.emi-info') ? 'active' : '' }}" href="{{ route('members-loan.emi-info') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-notebook"></i>
                        </span>
                        <span class="hide-menu">Member Loan Emi</span>
                    </a>
                </li>

                {{-- <li class="sidebar-item">
                    <a class="sidebar-link" href="" aria-expanded="false">
                        <span>
                            <i class="ti ti-note"></i>
                        </span>
                        <span class="hide-menu">IND Update</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="" aria-expanded="false">
                        <span>
                            <i class="ti ti-cpu"></i>
                        </span>
                        <span class="hide-menu">GRP Update</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="" aria-expanded="false">
                        <span>
                            <i class="ti ti-checkup-list"></i>
                        </span>
                        <span class="hide-menu">Reports</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="" aria-expanded="false">
                        <span>
                            <i class="ti ti-checkup-list"></i>
                        </span>
                        <span class="hide-menu">OldReports</span>
                    </a>
                </li> --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="" aria-expanded="false">
                        <span>
                            <i class="ti ti-list-numbers"></i>
                        </span>
                        <span class="hide-menu">Bill No</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="" aria-expanded="false">
                        <span>
                            <i class="ti ti-playlist"></i>
                        </span>
                        <span class="hide-menu">Assoc</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="" aria-expanded="false">
                        <span>
                            <i class="ti ti-certificate"></i>
                        </span>
                        <span class="hide-menu">PayCertificate</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('password') ? 'active' : '' }}" href="{{ route('password') }}"
                        aria-expanded="false">
                        <span>
                            <i class="ti ti-password"></i>
                        </span>
                        <span class="hide-menu">Password Change</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('logout') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-logout"></i>
                        </span>
                        <span class="hide-menu">Exit</span>
                    </a>
                </li>
                </ul>
            
        </nav>

        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
