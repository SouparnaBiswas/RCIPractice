<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav quick-links d-none d-lg-flex">
            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Administration<span
                        class="mt-1"><i class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="position-relative p-7 h-100">
                        <ul class="">
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('rules.index') }}">Rule Updation</a>
                            </li>
                            {{-- <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Exception</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Backup</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">CD Backup</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Installment Update</a>
                            </li> --}}

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('sections.index') }}">Section</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('designation-types.index') }}">Designation Type</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('categories.index') }}">Category Update</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('payscale-types.index') }}">PayScale Type</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('payscales.index') }}">PayScale Update</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('payband-types.index') }}">PayBand Type</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('paybands.index') }}">PayBand Update</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('designations.index') }}">Desig Update</a>
                            </li>
                            {{-- <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Pers Update</a>
                            </li> --}}
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('users.index') }}">New User</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('password') }}">Password Change</a>
                            </li>
                            {{-- <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Permission</a>
                            </li> --}}
                            {{-- <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Clear Remarks</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Signature Authority</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">CCS</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">BILLNO</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Annual Increment</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">PostAutharisation</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Association</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </li>
            {{-- <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Updations<span
                        class="mt-1"><i class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="position-relative p-7 h-100">
                        <ul class="">
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Individual</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Negative Payment</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Attendence</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">QtrInfo</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li> --}}
            {{-- <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Computations<span
                        class="mt-1"><i class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="position-relative p-7 h-100">
                        <ul class="">
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Group Updation</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Pay Computation</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li> --}}
            {{-- <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Floppy<span
                        class="mt-1"><i class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="position-relative p-7 h-100">
                        <ul class="">
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Bank</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Bank Loan</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">LIC</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">ITAV</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">CDA Loan</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">CDA</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li> --}}
            {{-- <li class="nav-item dropdown-hover d-none d-lg-block">
                <a class="nav-link" href="">PayCertificate</a>
            </li> --}}

            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Reports<span class="mt-1"><i
                            class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="position-relative p-7 h-100">
                        <ul class="">
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.payslip') }}">Payslip</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.annual-income-tax-report') }}">Annual Income Tax</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.paybill') }}">Paybill</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.payroll') }}">Payroll</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.children-allowance') }}">Children Allowance</a>
                            </li>

                            {{-- <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                href="{{ route('reports.group-children-allowance')}}" >Children Group Allowance</a>
                            </li> --}}
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.newspaper-allowance') }}">Newspaper Allowance</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.landline-mobile-allowance') }}">Landline/Mobile
                                    Allowance</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.bag-purse-allowance') }}">Bag/Ladies Purse</a>
                            </li>
                            {{-- <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                href="{{ route('reports.group-newspaper-allowance')}}" >Group Newspaper Allowance</a>
                            </li> --}}
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.salary-certificate') }}">Salary Certificate</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.bonus-schedule') }}">Bonus & Dress Allowance</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.last-pay-certificate') }}">Last Pay Certificate</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.professional-update-allowance') }}">Professional Update
                                    Allowance</a>
                            </li>
                            {{-- <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.crv')}}" >CRV</a>
                            </li> --}}
                            {{-- <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.pl-withdrawl')}}" >PL Withdrawl</a>
                            </li> --}}

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.quaterly-tds') }}">Quaterly TDS Report</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.gpf-withdrawal') }}">GPF Withdrawal</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.gpf-subscription') }}">GPF Subscription</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.terminal-benefits') }}">Terminal Benefit</a>
                            </li>

                            {{-- <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.form-16') }}">Form 16 </a>
                            </li> --}}

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.form-16') }}">Form 16 (Part A)</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.form-16b') }}">Form 16 (Part B)</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.da-arrears') }}">DA Arrears</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.pay-matrix') }}">Pay Matrix</a>
                            </li>
                            
                            {{-- <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.ltc-advance')}}">Ltc Advance</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.ltc-advance-settlement')}}">Ltc Advance Settlement</a>
                            </li> --}}

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('ltc-advance') }}">Ltc Advance</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.nps') }}">NPS</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.hba') }}">HBA</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.cghs') }}">CGHS</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.cgegis') }}">CGEGIS</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.i-tax') }}">I-Tax</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.lf-changes') }}">LF Changes</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.misc') }}">Misc 1</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reports.pay-fixation-arrears') }}">Pay Fixation Arrear</a>
                            </li> 

                            {{-- <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('ltc-advance-settlement')}}">Ltc Advance Settlement</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </li>


            {{-- <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Pages<span
                        class="mt-1"><i class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="position-relative p-7 h-100">
                        <ul class="">
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('income-tax') }}">Income Tax</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </li>  --}}

            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Member Management<span
                        class="mt-1"><i class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="position-relative p-7 h-100">
                        <ul class="">
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('pay-commissions.index') }}">Pay Commissions</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('pm-levels.index') }}">PM Level</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('pm-index.index') }}">PM Index</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('pay-matrix-rows.index') }}">PM Rows</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('pay-matrix-basics.index') }}">PM Basics</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('divisions.index') }}">Divisions</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('groups.index') }}">Groups</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('cadres.index') }}">Cadres</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('fund-types.index') }}">Fund Types</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('grade-pays.index') }}">Grade Pay</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('quarters.index') }}">Quarters charge</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('ex-services.index') }}">Ex-Services</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('pgs.index') }}">Pgs</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('cgegis.index') }}">CGEGIS</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('cghs.index') }}">CGHS</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('banks.index') }}">Bank</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('policy.index') }}">Policy</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('loans.index') }}">Loans</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('dearness-allowance-percentages.index') }}">DA Percentages</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('hras.index') }}">HRA </a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('reset-employee-ids.index') }}">Reset Employee-Id</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('cities.index') }}">City</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('tptas.index') }}">TPT</a>
                            </li>
                            
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('income-taxes.index') }}">Income Tax</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('gpfs.index') }}">GPF</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('newspaper-allowance.index') }}">Newspaper Allowance</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('landline-allowance.index') }}">Landline Allowance</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('bag-allowance.index') }}">Bag/Ladies-Purse Allowance</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('pension-rate.index') }}">Pension Rates</a>
                            </li>

                            {{-- manik's work --}}

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('tada.index') }}">TA/DA Categorial Allowance</a>
                            </li>


                        </ul>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Member Info<span
                        class="mt-1"><i class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="position-relative p-7 h-100">
                        <ul class="">
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('member-income-taxes.index') }}">Member IT Exemption</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('leave-type.index') }}">Leave Type</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('member-alloted-leave.index') }}">Member Alloted Leave</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('member-leaves.index') }}">Member Leave</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('member-newspaper-allowance.index') }}">Member Newspaper
                                    Allowance</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('member-bag-allowance.index') }}" >Member Purse
                                    Allowance</a>
                            </li>
                           
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('member-family.index') }}">Member Family info</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('child-allowance.index') }}">Member Child Allowance</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('penal-interest.index') }}">Penal Interest</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('member-gpf.index') }}">GPF Management</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('member-retirement.index') }}">Retirement Info</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('mobile-allowance.index') }}">Mobile/Landline Allowance</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('member-pension.index') }}">Member Pension</a>
                            </li>

                            {{-- manik's work --}}
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('tada-advance.index') }}">TA/DA Advance</a>
                            </li>
                           <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('tada-plus.index') }}">TA/DA Final Settlement</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            {{-- <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Pay & Allowance<span
                        class="mt-1"><i class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="position-relative p-7 h-100">
                        <ul class="">
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{route('cash-payments.index')}}">Public Fund</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{route('cda-receipts.index')}}">Imprest</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('item-codes.index') }}">Material Management</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="#">Income Tax</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li> --}}

            {{-- <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Material Management<span
                        class="mt-1"><i class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="position-relative p-7 h-100">
                        <ul class="">
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Inventory Numbers</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Item Code Generation</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Voucher</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Report Generation</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </li> --}}

        </ul>

        <div class="d-block d-lg-none">
            <img src="{{ asset('frontend_assets/images/logo.png') }}" class="dark-logo" width=""
                alt="">
        </div>

        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
            {{-- <li class="nav-item">
                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none d-none d-md-block"
                    href="javascript:void(0)">
                    <i class="ti ti-settings fs-4"></i> Settings
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="fw-semibold bg-hover-primary text-decoration-none text-deger ps-3 d-none d-md-block"
                    href="{{ route('logout') }}">
                    <i class="ti ti-logout fs-4"></i> Logout
                </a>
            </li>
            {{-- <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-bell-ringing"></i>
                    <div class="notification bg-primary rounded-circle"></div>
                </a>
                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                    aria-labelledby="drop2">
                    <div class="d-flex align-items-center justify-content-between py-3 px-7">
                        <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                        <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
                    </div>
                    <div class="message-body" data-simplebar="">
                        <a href="javascript:void(0)"
                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                            <span class="me-3">
                                <img src="images/user-1.jpg" alt="user" class="rounded-circle"
                                    width="48" height="48">
                            </span>
                            <div class="w-75 d-inline-block v-middle">
                                <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                                <span class="d-block">Congratulate him</span>
                            </div>
                        </a>
                        <a href="javascript:void(0)"
                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                            <span class="me-3">
                                <img src="images/user-2.jpg" alt="user" class="rounded-circle"
                                    width="48" height="48">
                            </span>
                            <div class="w-75 d-inline-block v-middle">
                                <h6 class="mb-1 fw-semibold">New message</h6>
                                <span class="d-block">Salma sent you new message</span>
                            </div>
                        </a>
                        <a href="javascript:void(0)"
                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                            <span class="me-3">
                                <img src="images/user-3.jpg" alt="user" class="rounded-circle"
                                    width="48" height="48">
                            </span>
                            <div class="w-75 d-inline-block v-middle">
                                <h6 class="mb-1 fw-semibold">Bianca sent payment</h6>
                                <span class="d-block">Check your earnings</span>
                            </div>
                        </a>
                        <a href="javascript:void(0)"
                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                            <span class="me-3">
                                <img src="images/user-4.jpg" alt="user" class="rounded-circle"
                                    width="48" height="48">
                            </span>
                            <div class="w-75 d-inline-block v-middle">
                                <h6 class="mb-1 fw-semibold">Jolly completed tasks</h6>
                                <span class="d-block">Assign her new tasks</span>
                            </div>
                        </a>
                        <a href="javascript:void(0)"
                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                            <span class="me-3">
                                <img src="images/user-5.jpg" alt="user" class="rounded-circle"
                                    width="48" height="48">
                            </span>
                            <div class="w-75 d-inline-block v-middle">
                                <h6 class="mb-1 fw-semibold">John received payment</h6>
                                <span class="d-block">$230 deducted from account</span>
                            </div>
                        </a>
                        <a href="javascript:void(0)"
                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                            <span class="me-3">
                                <img src="images/user-1.jpg" alt="user" class="rounded-circle"
                                    width="48" height="48">
                            </span>
                            <div class="w-75 d-inline-block v-middle">
                                <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                                <span class="d-block">Congratulate him</span>
                            </div>
                        </a>
                    </div>
                    <div class="py-6 px-7 mb-1">
                        <button class="btn btn-outline-primary w-100"> See All Notifications </button>
                    </div>
                </div>
            </li> --}}
            <li class="nav-item dropdown">
                <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="user-profile-img">
                            @if (Auth::user()->profile_picture)
                                <img src="{{ Storage::url(Auth::user()->profile_picture) }}" alt="user"
                                    class="rounded-circle" width="35" height="35" alt="">
                            @else
                                <img src="{{ asset('frontend_assets/images/user-1.jpg') }}" class="rounded-circle"
                                    width="35" height="35" alt="">
                            @endif

                        </div>
                    </div>
                </a>
                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                    aria-labelledby="drop1">
                    <div class="profile-dropdown position-relative" data-simplebar="">
                        <div class="py-3 px-7 pb-0">
                            <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                        </div>
                        <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                            @if (Auth::user()->profile_picture)
                                <img src="{{ Storage::url(Auth::user()->profile_picture) }}" alt="user"
                                    class="rounded-circle" width="80" height="80">
                            @else
                                <img src="{{ asset('frontend_assets/images/user-1.jpg') }}" class="rounded-circle"
                                    width="80" height="80" alt="">
                            @endif
                            <div class="ms-3">
                                <h5 class="mb-1 fs-3">{{ Auth::user()->full_name }}</h5>
                                <span class="mb-1 d-block text-dark">User</span>
                                <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                    <i class="ti ti-mail fs-4"></i> {{ Auth::user()->email }}
                                </p>
                            </div>
                        </div>
                        <div class="message-body">
                            <a href="{{ route('profile') }}" class="py-8 px-7 mt-8 d-flex align-items-center">
                                <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                    <img src="{{ asset('frontend_assets/images/icon-account.svg') }}" alt=""
                                        width="24" height="24">
                                </span>
                                <div class="w-75 d-inline-block v-middle ps-3">
                                    <h6 class="mb-1 bg-hover-primary fw-semibold"> My Profile </h6>
                                    <span class="d-block text-dark">Account Settings</span>
                                </div>
                            </a>
                        </div>
                        <div class="message-body">
                            <a href="{{ route('password') }}" class="py-8 px-7 mt-8 d-flex align-items-center">
                                <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                    <img src="{{ asset('frontend_assets/images/icon-inbox.svg') }}" alt=""
                                        width="24" height="24">
                                </span>
                                <div class="w-75 d-inline-block v-middle ps-3">
                                    <h6 class="mb-1 bg-hover-primary fw-semibold"> Change Password </h6>
                                    {{-- <span class="d-block text-dark">Account Settings</span> --}}
                                </div>
                            </a>
                        </div>


                        @if (Auth::check() && Auth::user()->hasRole('ADMIN'))
                            <a href="{{ route('logo.dashboard') }}" class="py-8 px-7 mt-8 d-flex align-items-center">
                                <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                    <img src="{{ asset('frontend_assets/images/icon-inbox.svg') }}" alt="" width="24" height="24">
                                </span>
                                <div class="w-75 d-inline-block v-middle ps-3">
                                    <h6 class="mb-1 bg-hover-primary fw-semibold"> Change Logo </h6>
                                    {{-- <span class="d-block text-dark">Account Settings</span> --}}
                                </div>
                            </a>
                        @endif

                        <div class="d-grid py-4 px-7 pt-8">
                            <a href="{{ route('logout') }}" class="btn btn-outline-primary">Log Out</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

    </nav>
</header>
