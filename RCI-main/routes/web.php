<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\DesignationController;
use App\Http\Controllers\Frontend\DesignationTypeController;
use App\Http\Controllers\Frontend\PaybandController;
use App\Http\Controllers\Frontend\PaybandTypeController;
use App\Http\Controllers\Frontend\PayscaleController;
use App\Http\Controllers\Frontend\PayscaleTypeController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\LogoController;
use App\Http\Controllers\Frontend\PmLevelController;
use App\Http\Controllers\Frontend\PmIndexController;
use App\Http\Controllers\Frontend\DesigController;
use App\Http\Controllers\Frontend\DivisionController;
use App\Http\Controllers\Frontend\GroupController;
use App\Http\Controllers\Frontend\CadreController;
use App\Http\Controllers\Frontend\FundTypeController;
use App\Http\Controllers\Frontend\QuaterController;
use App\Http\Controllers\Frontend\ExServiceController;
use App\Http\Controllers\Frontend\PgController;
use App\Http\Controllers\Frontend\CgegisController;
use App\Http\Controllers\Frontend\IncomeTaxController;
use App\Http\Controllers\Frontend\BankController;
use App\Http\Controllers\Frontend\LoanController;
use App\Http\Controllers\Frontend\ResetEmployeeIdController;
use App\Http\Controllers\Frontend\PolicyController;
use App\Http\Controllers\Frontend\MemberController;
use App\Http\Controllers\Frontend\PublicFundController;
use App\Http\Controllers\Frontend\ChequePaymentController;
use App\Http\Controllers\Frontend\CashPaymentController;
use App\Http\Controllers\Frontend\PaymentCategoryController;
use App\Http\Controllers\Frontend\ResetVoucherController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\PayCommissionController;
use App\Http\Controllers\Frontend\DearnessAllowancePercentageController;
use App\Http\Controllers\Frontend\HraController;
use App\Http\Controllers\Frontend\ReportController;
use App\Http\Controllers\Frontend\CityController;
use App\Http\Controllers\Frontend\GpfController;
use App\Http\Controllers\Frontend\GradePayController;
use App\Http\Controllers\Frontend\TptaController;
use App\Http\Controllers\Frontend\CghsController;
use App\Http\Controllers\Frontend\SectionController;
use App\Http\Controllers\Frontend\RuleController;
use App\Http\Controllers\Frontend\NewspaperAllowanceController;
use App\Http\Controllers\Frontend\LandlineAllowanceController;
use App\Http\Controllers\Frontend\BagPurseAllowanceController;
use App\Http\Controllers\Frontend\PayMatrixRowController;
use App\Http\Controllers\Frontend\PayMatrixBasicController;

//manik's works
use App\Http\Controllers\Frontend\TaDaController;


// member info
use App\Http\Controllers\Frontend\MemberInfo\MemberIncomeTaxController;
use App\Http\Controllers\Frontend\MemberInfo\LeaveTypeController;
use App\Http\Controllers\Frontend\MemberInfo\MemberAllotedLeaveController;
use App\Http\Controllers\Frontend\MemberInfo\MemberLeaveController;
use App\Http\Controllers\Frontend\MemberInfo\AttendanceController;
use App\Http\Controllers\Frontend\MemberInfo\PenalInterestController;
use App\Http\Controllers\Frontend\MemberInfo\MemberGpfController;
use App\Http\Controllers\Frontend\MemberInfo\PensionController;
use App\Http\Controllers\Frontend\MemberInfo\PensionRateController;
use App\Http\Controllers\Frontend\MemberInfo\MemberFamilyController;
use App\Http\Controllers\Frontend\MemberInfo\MemberRetirementInfoController as MemberRetirementController;
use App\Http\Controllers\MemberInfo\ProfessionalUpdateAllowanceController;
use App\Http\Controllers\Frontend\MemberInfo\MemberNewspaperAllowanceController;
use App\Http\Controllers\Frontend\MemberInfo\MemberBagAllowanceController;
use App\Http\Controllers\Frontend\MemberInfo\MemberChildAllowanceController;

//manik routes
use App\Http\Controllers\Frontend\MemberInfo\TaDaAdvanceController;
use App\Http\Controllers\Frontend\MemberInfo\TadaPlusClaimController;
use App\Http\Controllers\Frontend\MemberInfo\TadaJourneyDetailController;

// inventory
use App\Http\Controllers\Inventory\InventoryTypeController;
use App\Http\Controllers\Inventory\ItemCodeController;
use App\Http\Controllers\Inventory\CreditVoucherController;
use App\Http\Controllers\Inventory\DebitVoucherController;
use App\Http\Controllers\Inventory\InventoryProjectController;
use App\Http\Controllers\Inventory\InventoryNumberController;
use App\Http\Controllers\Inventory\ResetItemCodeController;
use App\Http\Controllers\Inventory\GatePassController;
use App\Http\Controllers\Inventory\ConversionVoucherController;
use App\Http\Controllers\Inventory\ExternalIssueVoucherController;
use App\Http\Controllers\Inventory\ItemCodeTypeController;
use App\Http\Controllers\Inventory\SupplyOrderController;
use App\Http\Controllers\Inventory\CreditVoucherNumberController;
use App\Http\Controllers\Inventory\CertificateIssueVoucherController;
use App\Http\Controllers\Inventory\TransferVoucherController;
use App\Http\Controllers\Inventory\RinController;
use App\Http\Controllers\Inventory\UomController;
use App\Http\Controllers\Inventory\VendorController;
use App\Http\Controllers\Inventory\DashbaordController as InventoryDashbaordController;
use App\Http\Controllers\Inventory\ReportController as InventoryReportController;
use App\Http\Controllers\Inventory\GstController;
use App\Http\Controllers\Inventory\InventorySirController;
use App\Http\Controllers\Inventory\InventoryLoanController;
use App\Http\Controllers\Inventory\StoreInwardController;

// imprest
use App\Http\Controllers\Imprest\CdaReceiptDetailController;
use App\Http\Controllers\Imprest\ImprestResetVoucherController;
use App\Http\Controllers\Imprest\VariableTypeController;
use App\Http\Controllers\Imprest\ProjectController;
use App\Http\Controllers\Imprest\CdaReceiptController;
use App\Http\Controllers\Imprest\CdaBillAuditTeamController;
use App\Http\Controllers\Imprest\CashWithdrawalController;
use App\Http\Controllers\Imprest\AdvanceSettlementController;
use App\Http\Controllers\Imprest\AdvanceFundController;
use App\Http\Controllers\Imprest\ImprestReportController;

use App\Http\Controllers\IncomeTax\ArrearsController;
use App\Http\Controllers\IncomeTax\RentController;
use App\Http\Controllers\Inventory\SecurityGateStoresController;
use App\Http\Controllers\Inventory\TrafficControlController;
use App\Http\Controllers\Inventory\TransportController;
use App\Http\Controllers\PublicFund\PublicFundVendorController;
use App\Http\Controllers\PublicFund\ReceiptController;
use App\Http\Controllers\PublicFund\PublicFundBankController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login-check', [AuthController::class, 'loginCheck'])->name('login-check');

Route::middleware('permssions')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    // change password
    Route::prefix('password')->group(function () {
        Route::get('/', [ProfileController::class, 'password'])->name('password'); // password change
        Route::post('/update', [ProfileController::class, 'passwordUpdate'])->name('password.update'); // password update
    });

    Route::prefix('logo')->group(function () {
        Route::get('/', [LogoController::class, 'dashboardLogo'])->name('logo.dashboard');
        Route::post('/update',  [LogoController::class, 'logoUpdate'])->name('logo.update');
    });

    Route::resources([
        'categories' => CategoryController::class,
        'payband-types' => PaybandTypeController::class,
        'payscale-types' => PayscaleTypeController::class,
        'payscales' => PayscaleController::class,
        'paybands' => PaybandController::class,
        'sections' => SectionController::class,
        'designation-types' => DesignationTypeController::class,
        'designations' => DesignationController::class,
        'pm-levels' => PmLevelController::class,
        'pm-index' => PmIndexController::class,
        'divisions' => DivisionController::class,
        'groups' => GroupController::class,
        'cadres' => CadreController::class,
        'fund-types' => FundTypeController::class,
        'quarters' => QuaterController::class,
        'ex-services' => ExServiceController::class,
        'pgs' => PgController::class,
        'cgegis' => CgegisController::class,
        'banks' => BankController::class,
        'policy' => PolicyController::class,
        'members' => MemberController::class,
        'public-funds' => PublicFundController::class,
        'fund-vendors' => PublicFundVendorController::class,
        'cash-payments' => CashPaymentController::class,
        'cheque-payments' => ChequePaymentController::class,
        'payment-categories' => PaymentCategoryController::class,
        'reset-voucher' => ResetVoucherController::class,
        'loans' => LoanController::class,
        'reset-employee-ids' => ResetEmployeeIdController::class,
        'users' => UserController::class,
        'pay-commissions' => PayCommissionController::class,
        'dearness-allowance-percentages' => DearnessAllowancePercentageController::class,
        'hras' => HraController::class,
        'cities' => CityController::class,
        'grade-pays' => GradePayController::class,
        'tptas' => TptaController::class,
        'income-taxes' => IncomeTaxController::class,
        'gpfs'=> GpfController::class,
        'member-income-taxes' => MemberIncomeTaxController::class,
        'cghs' => CghsController::class,
        'rules' => RuleController::class,
        'member-family' => MemberFamilyController::class,
        'newspaper-allowance' => NewspaperAllowanceController::class,
        'landline-allowance' => LandlineAllowanceController::class,
        'bag-allowance' => BagPurseAllowanceController::class,
        'mobile-allowance' => LandlineAllowanceController::class,
        'child-allowance' => MemberChildAllowanceController::class,
        'pay-matrix-rows' => PayMatrixRowController::class,
        'pay-matrix-basics' => PayMatrixBasicController::class,
        'bank-details' => PublicFundBankController::class,

        //manik routes
        'tada-advance' => TadaAdvanceController::class,
        'tada' => TaDaController::class,
        'tada-plus' => TadaPlusClaimController::class,
        'tada-journey' => TadaJourneyDetailController::class

    ]);

    Route::get('/get-pay-bands', [PmLevelController::class, 'getPayBands'])->name('pm-levels.get-pay-bands');

    Route::get('/child-allowance-fetch', [MemberChildAllowanceController::class, 'childallowancefetch'])->name('child-allowance.fetch-data');
    //child list fetch
    Route::get('/member-family-child-fetch', [MemberChildAllowanceController::class, 'memberChildDataFetch'])->name('child-allowance.member-children');

    // bank details
    Route::get('/bank-detail-fetch', [PublicFundBankController::class, 'fetchBankDetails'])->name('bank-details.fetch-data');

    // child delete
    Route::post('/member-family-child-delete', [MemberFamilyController::class, 'memberChildDelete'])->name('member-family.delete-child');

    // public funcd fetch
    Route::get('/public-fund-vendors-fetchData', [PublicFundVendorController::class, 'fetchData'])->name('public-fund-vendors.fetch-data');

    // Route::get('/public-fund-bank-detail', [PublicFundBankController::class, 'getBankDetails'])->name('public-fund.bank-details');
    // Route::post('/bank-detail-update', [PublicFundBankController::class, 'getBankDetailsUpdate'])->name('public-fund.bank-details-update');

    //receipts routes
    Route::resources([
        'receipts' => ReceiptController::class
    ]);

    Route::get('/receipts-vendor-desig', [ReceiptController::class, 'getVendorDesig'])->name('receipts.get-vendor-desig');

    Route::get('/receipts-fetch-data', [ReceiptController::class, 'fetchData'])->name('receipts.fetch-data');

    //bag purse report
    Route::resource('bag-purse-allowance', BagPurseAllowanceController::class);
    Route::get('/bag-purse-allowance',[BagPurseAllowanceController::class, 'fetchData'])->name('bag-allowance.fetch-data');

    //ltc routes
    Route::get('/reports-ltc-advance', [ReportController::class, 'ltcAdvance'])->name('reports.ltc-advance');
    Route::get('/reports-ltc-advance-settlement', [ReportController::class, 'ltcAdvanceSettlement'])->name('reports.ltc-advance-settlement');

    Route::get('/ltc-advance', [ReportController::class, 'ltcAdvanceReport'])->name('ltc-advance');
    Route::get('/ltc-advance-settlement', [ReportController::class, 'ltcAdvanceSettlementReport'])->name('ltc-advance-settlement');
    Route::post('/get-member-leave-count', [ReportController::class, 'getMemberLeave'])->name('get-member-total-leave');

    Route::post('/ltc-advance-report', [ReportController::class, 'ltcAdvanceReportGenerate'])->name('ltc-advance-report-generate');

    //landline fetch
    Route::get('/landline-allowance-fetch-data', [LandlineAllowanceController::class, 'fetchData'])->name('landline-allowance.fetch-data');
    // newspaper allowance fetch
    Route::get('/newspaper-allowance-fetch-data', [NewspaperAllowanceController::class, 'fetchData'])->name('newspaper-allowance.fetch-data');
    Route::get('/newspaper-allowance-get-designation', [NewspaperAllowanceController::class, 'newspaperGroupDesignation'])->name('newspaper-allowance.get-designation');
    // family member
    Route::get('/member-family-fetch-data', [MemberFamilyController::class, 'fetchData'])->name('member-family.fetch-data');

    Route::get('/reports-pay-matrix', [ReportController::class, 'payMatrixReport'])->name('reports.pay-matrix');
    Route::post('/reports-pay-matrix-generate', [ReportController::class, 'payMatrixReportGenerate'])->name('reports.pay-matrix-report-generate');

    //payslip
    Route::get('/reports-payslip', [ReportController::class, 'payslip'])->name('reports.payslip');
    Route::post('/reports-payslip-generate', [ReportController::class, 'payslipGenerate'])->name('reports.payslip-generate');
    Route::get('/generate-payslip', [ReportController::class, 'downloadPayslip'])->name('reports.download-payslip');

    // cgegis reports
    Route::get('/reports-cgegis',[ReportController::class, 'cgegisReport'])->name('reports.cgegis');
    route::post('/reports-cgegis-generate',[ReportController::class, 'cgegisReportGenerate'])->name('reports.cgegis-report-generate');

    //cghs reports
    Route::get('/reports-cghs',[ReportController::class, 'cghsReport'])->name('reports.cghs');
    route::post('/reports-cghs-generate',[ReportController::class, 'cghsReportGenerate'])->name('reports.cghs-report-generate');

    // hba reports
    Route::get('/reports-hba',[ReportController::class, 'hbaReport'])->name('reports.hba');
    Route::post('/reports-hba-generate',[ReportController::class, 'hbaReportGenerate'])->name('reports.hba-report-generate');

    //i-tax reports
    Route::get('/reports-i-tax',[ReportController::class, 'iTaxRecovery'])->name('reports.i-tax');
    Route::post('/reports-i-tax-generate',[ReportController::class, 'iTaxReportGenerate'])->name('reports.i-tax-report-generate');

    Route::get('/reports-nps',[ReportController::class, 'npsReport'])->name('reports.nps');
    Route::post('/reports-nps-generate',[ReportController::class, 'npsReportGenerate'])->name('reports.nps-report-generate');
    Route::get('/get-da-percent-nps',[ReportController::class, 'getDaPercentNps'])->name('reports.get-da-percent-nps');

    // lf reports
    Route::get('/reports-lf-changes',[ReportController::class, 'lfChanges'])->name('reports.lf-changes');
    Route::post('/reports-lf-generate',[ReportController::class, 'lfReportGenerate'])->name('reports.lf-report-generate');

    // misc reports
    Route::get('/reports-misc',[ReportController::class, 'miscReport'])->name('reports.misc');
    Route::post('/reports-misc-generate',[ReportController::class, 'miscReportGenerate'])->name('reports.msc-report-generate');
       // annual income tax report
    Route::get('/annual-income-tax-report', [ReportController::class, 'annualIncomeTaxReport'])->name('reports.annual-income-tax-report');
    Route::post('/annual-income-tax-report-generate', [ReportController::class, 'annualIncomeTaxReportGenerate'])->name('reports.annual-income-tax-report-generate');

    Route::get('/bag-purse-allowance-report', [ReportController::class, 'bagPurseAllowanceReport'])->name('reports.bag-purse-allowance');
    Route::post('/bag-purse-allowance-report-generate', [ReportController::class, 'bagPurseAllowanceReportGenerate'])->name('reports.bag-allowance-generate');
       // paybill
    Route::get('/reports-paybill', [ReportController::class, 'paybill'])->name('reports.paybill');
    Route::post('/reports-paybill-generate', [ReportController::class, 'paybillGenerate'])->name('reports.paybill-generate');

    Route::get('/generate-children-allowance', [ReportController::class, 'cildrenAllowance'])->name('reports.children-allowance');
    Route::post('/reports-children-allowanc-generate', [ReportController::class, 'cildrenAllowanceGenerate'])->name('reports.children-allowance-generate');

    Route::get('/generate-group-children-allowance', [ReportController::class, 'groupChildrenAllowance'])->name('reports.group-children-allowance');
    Route::post('/reports-group-children-allowanc-generate', [ReportController::class, 'groupChildrenAllowanceGenerate'])->name('reports.group-children-allowance-generate');

    Route::get('/reports-newspaper', [ReportController::class,'newspaperAllowance'])->name('reports.newspaper-allowance');
    Route::post('/generate-newspaper-report',[ReportController::class, 'newspaperReportGenerate'])->name('reports.newspaper-allowance-generate');
    Route::post('get-member-newspaper-allocation',[ReportController::class, 'getMemberNewspaperAllocation'])->name('reports.member-newspaper-allocation');

    Route::get('/group-newspaper-report',[ReportController::class, 'groupNewspaperAllocation'])->name('reports.group-newspaper-allowance');
    Route::post('/group-newspaper-report-generate',[ReportController::class, 'groupNewspaperReportGenerate'])->name('reports.group-newspaper-allowance-generate');

    Route::get('/reports-landline',[ReportController::class, 'landlineAllocation'])->name('reports.landline-mobile-allowance');
    Route::post('/generate-landline-report',[ReportController::class, 'landlineReportGenerate'])->name('reports.landline-allowance-generate');

    Route::post('/get-member-children', [ReportController::class, 'getMemberChildren'])->name('reports.get-member-children');

    //payroll
    Route::get('/reports-payroll', [ReportController::class, 'payroll'])->name('reports.payroll');
    Route::post('/reports-payroll-generate', [ReportController::class, 'payrollGenerate'])->name('reports.payroll-generate');
       // salary certificate
    Route::get('/reports-salary-certificate', [ReportController::class, 'salaryCertificate'])->name('reports.salary-certificate');
    Route::post('/reports-salary-certificate-generate', [ReportController::class, 'salaryCertificateGenerate'])->name('reports.salary-certificate-generate');
        // bonus schedule
    Route::get('/reports-bonus-schedule', [ReportController::class, 'bonusSchedule'])->name('reports.bonus-schedule');
    Route::post('/reports-bonus-schedule-generate', [ReportController::class, 'bonusScheduleGenerate'])->name('reports.bonus-schedule-generate');
        // last pay certificate
    Route::get('/reports-last-pay-certificate', [ReportController::class, 'lastPayCertificate'])->name('reports.last-pay-certificate');
    Route::post('/reports-last-pay-certificate-generate', [ReportController::class, 'lastPayCertificateGenerate'])->name('reports.last-pay-certificate-generate');

    // payslip get member info
    Route::post('/get-member-info', [ReportController::class, 'getMemberInfo'])->name('reports.get-all-members');
    Route::post('/get-nps-member-info', [ReportController::class, 'getNpsMemberInfo'])->name('reports.get-nps-members');
    Route::post('/get-member-gpf', [ReportController::class, 'getMemberGpf'])->name('reports.get-all-gpf-members');

        // professional Update allowance
    Route::get('/reports-professional-update-allowance', [ReportController::class, 'professionalUpdateAllowance'])->name('reports.professional-update-allowance');
    Route::post('/reports-professional-update-allowance-generate', [ReportController::class, 'professionalUpdateAllowanceGenerate'])->name('reports.professional-update-allowance-generate');

        // gpf withdrawal report
    Route::get('/reports-gpf-withdrawal', [ReportController::class, 'gpfWithdrawal'])->name('reports.gpf-withdrawal');
    Route::post('/reports-gpf-withdrawal-generate', [ReportController::class, 'gpfWithdrawalGenerate'])->name('reports.gpf-withdrawal-generate');

        // gpf subscription report
    Route::get('/reports-gpf-subscription', [ReportController::class, 'gpfSubscription'])->name('reports.gpf-subscription');
    Route::post('/reports-gpf-subscription-generate', [ReportController::class, 'gpfSubscriptionGenerate'])->name('reports.gpf-subscription-generate');

        // terminal benefits report
    Route::get('reports-terminal-benefits', [ReportController::class, 'terminalBenefits'])->name('reports.terminal-benefits');
    Route::post('reports-terminal-benefits-generate', [ReportController::class, 'terminalBenefitsGenerate'])->name('reports.terminal-benefits-generate');

        // form 16 b
    Route::get('reports-form-16b', [ReportController::class, 'formSixteenB'])->name('reports.form-16b');
    Route::post('reports-form-16b-generate', [ReportController::class, 'formSixteenBGenerate'])->name('reports.form-16b-generate');

        // form 16
    Route::get('reports-form-16', [ReportController::class, 'formSixteen'])->name('reports.form-16');
    Route::post('reports-form-16-generate', [ReportController::class, 'formSixteenGenerate'])->name('reports.form-16-generate');

        // form 16 a
    Route::get('reports-form-16a', [ReportController::class, 'formSixteenA'])->name('reports.form-16a');
    Route::post('reports-form-16a-generate', [ReportController::class, 'formSixteenAGenerate'])->name('reports.form-16a-generate');

        // da arrears report
    Route::get('reports-da-arrears', [ReportController::class, 'daArrears'])->name('reports.da-arrears');
    Route::post('reports-da-arrears-generate', [ReportController::class, 'daArrearsGenerate'])->name('reports.da-arrears-generate');

        // pay fixation arrears report
    Route::get('reports-pay-fixation-arrears', [ReportController::class, 'payFixationArrears'])->name('reports.pay-fixation-arrears');
    Route::post('reports-pay-fixation-arrears-generate', [ReportController::class, 'payFixationArrearsGenerate'])->name('reports.pay-fixation-arrears-generate');

    // form 12 bb
    Route::get('/reports-crv', [ReportController::class, 'crv'])->name('reports.crv');
    Route::get('/reports-pl-withdrawl', [ReportController::class, 'plWithdrawl'])->name('reports.pl-withdrawl');

    // Quaterly TDS Report
    Route::get('/reports-quaterly-tds', [ReportController::class, 'quaterlyTds'])->name('reports.quaterly-tds');
    Route::post('/reports-quaterly-tds-generate', [ReportController::class, 'quaterlyTdsGenerate'])->name('reports.quaterly-tds-generate');


    //user routes
    Route::get('/users-delete/{id}', [UserController::class, 'delete'])->name('users.delete');
    Route::get('/users-fetch-data', [UserController::class, 'fetchData'])->name('users.fetch-data');

    Route::get('/section-fetch-data', [SectionController::class, 'fetchData'])->name('sections.fetch-data');

    // reset employee ids
    Route::prefix('reset-employee-ids')->group(function () {
        Route::get('/reset-employee-ids-delete/{id}', [ResetEmployeeIdController::class, 'delete'])->name('reset-employee-ids.delete');
    });
    Route::get('/reset-employee-ids-fetch-data', [ResetEmployeeIdController::class, 'fetchData'])->name('reset-employee-ids.fetch-data');

    // category
    Route::prefix('categories')->group(function () {
        Route::get('/categories-delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    });
    Route::get('/categories-fetch-data', [CategoryController::class, 'fetchData'])->name('categories.fetch-data');

    // Payband Type
    Route::prefix('payband-types')->group(function () {
        Route::get('/payband-types-delete/{id}', [PaybandTypeController::class, 'delete'])->name('payband-types.delete');
    });
    Route::get('/payband-types-fetch-data', [PaybandTypeController::class, 'fetchData'])->name('payband-types.fetch-data');

    // Payscale Type
    Route::prefix('payscale-types')->group(function () {
        Route::get('/payscale-types-delete/{id}', [PayscaleTypeController::class, 'delete'])->name('payscale-types.delete');
    });
    Route::get('/payscale-types-fetch-data', [PayscaleTypeController::class, 'fetchData'])->name('payscale-types.fetch-data');

    // Payscale
    Route::prefix('payscales')->group(function () {
        Route::get('/payscales-delete/{id}', [PayscaleController::class, 'delete'])->name('payscales.delete');
    });
    Route::get('/payscales-fetch-data', [PayscaleController::class, 'fetchData'])->name('payscales.fetch-data');

    // Payband
    Route::prefix('paybands')->group(function () {
        Route::get('/paybands-delete/{id}', [PaybandController::class, 'delete'])->name('paybands.delete');
    });
    Route::get('/paybands-fetch-data', [PaybandController::class, 'fetchData'])->name('paybands.fetch-data');

    //rule management
    Route::get('/rules-fetch-data', [RuleController::class, 'fetchData'])->name('rules.fetch-data');

    // Pay matrix row
    Route::get('/pay-matrix-row-fetch-data', [PayMatrixRowController::class, 'fetchData'])->name('pay-matrix-rows.fetch-data');

    // Pay matrix basic
    Route::get('/pay-matrix-basic-fetch-data', [PayMatrixBasicController::class, 'fetchData'])->name('pay-matrix-basics.fetch-data');


    // Designation Type
    Route::prefix('designation-types')->group(function () {
        Route::get('/designation-types-delete/{id}', [DesignationTypeController::class, 'delete'])->name('designation-types.delete');
    });
    Route::get('/designation-types-fetch-data', [DesignationTypeController::class, 'fetchData'])->name('designation-types.fetch-data');

    // Designation
    Route::prefix('designations')->group(function () {
        Route::get('/designations-delete/{id}', [DesignationController::class, 'delete'])->name('designations.delete');
    });
    Route::get('/designations-fetch-data', [DesignationController::class, 'fetchData'])->name('designations.fetch-data');
    Route::get('/get-payscale-type', [DesignationController::class, 'getPayscaleType'])->name('designations.get-payscale-type');

    // PM Level
    Route::prefix('pm-levels')->group(function () {
        Route::get('/pm-levels-delete/{id}', [PmLevelController::class, 'delete'])->name('pm-levels.delete');
    });
    Route::get('/pm-levels-fetch-data', [PmLevelController::class, 'fetchData'])->name('pm-levels.fetch-data');

    //PM Index
    Route::prefix('pm-index')->group(function () {
        Route::get('/pm-index-delete/{id}', [PmIndexController::class, 'delete'])->name('pm-index.delete');
    });
    Route::get('/pm-index-fetch-data', [PmIndexController::class, 'fetchData'])->name('pm-index.fetch-data');


    //division
    Route::prefix('divisions')->group(function () {
        Route::get('/divisions-delete/{id}', [DivisionController::class, 'delete'])->name('divisions.delete');
    });
    Route::get('/divisions-fetch-data', [DivisionController::class, 'fetchData'])->name('divisions.fetch-data');

    //group
    Route::prefix('groups')->group(function () {
        Route::get('/groups-delete/{id}', [GroupController::class, 'delete'])->name('groups.delete');
    });
    Route::get('/groups-fetch-data', [GroupController::class, 'fetchData'])->name('groups.fetch-data');

    //cadres
    Route::prefix('cadres')->group(function () {
        Route::get('/cadres-delete/{id}', [CadreController::class, 'delete'])->name('cadres.delete');
    });
    Route::get('/cadres-fetch-data', [CadreController::class, 'fetchData'])->name('cadres.fetch-data');

    //fund types
    Route::prefix('fund-types')->group(function () {
        Route::get('/fund-types-delete/{id}', [FundTypeController::class, 'delete'])->name('fund-types.delete');
    });
    Route::get('/fund-types-fetch-data', [FundTypeController::class, 'fetchData'])->name('fund-types.fetch-data');

    //quarters
    Route::prefix('quarters')->group(function () {
        Route::get('/quarters-delete/{id}', [QuaterController::class, 'delete'])->name('quarters.delete');
    });
    Route::get('/quarters-fetch-data', [QuaterController::class, 'fetchData'])->name('quarters.fetch-data');

    //ex-service
    Route::prefix('ex-services')->group(function () {
        Route::get('/ex-services-delete/{id}', [ExServiceController::class, 'delete'])->name('ex-services.delete');
    });
    Route::get('/ex-services-fetch-data', [ExServiceController::class, 'fetchData'])->name('ex-services.fetch-data');

    //pg
    Route::prefix('pgs')->group(function () {
        Route::get('/pgs-delete/{id}', [PgController::class, 'delete'])->name('pgs.delete');
    });
    Route::get('/pgs-fetch-data', [PgController::class, 'fetchData'])->name('pgs.fetch-data');

    //cgegis
    Route::prefix('cgegis')->group(function () {
        Route::get('/cgegis-delete/{id}', [CgegisController::class, 'delete'])->name('cgegis.delete');
    });
    Route::get('/cgegis-fetch-data', [CgegisController::class, 'fetchData'])->name('cgegis.fetch-data');

    // cghs
    Route::prefix('cghs')->group(function () {
        Route::get('/cghs-delete/{id}', [CghsController::class, 'delete'])->name('cghs.delete');
    });
    Route::get('/cghs-fetch-data', [CghsController::class, 'fetchData'])->name('cghs.fetch-data');

    //bank route
    Route::prefix('banks')->group(function () {
        Route::get('/banks-delete/{id}', [BankController::class, 'delete'])->name('banks.delete');
    });
    Route::get('/banks-fetch-data', [BankController::class, 'fetchData'])->name('banks.fetch-data');

    //loans route
    Route::prefix('loans')->group(function () {
        Route::get('/loans-delete/{id}', [LoanController::class, 'delete'])->name('loans.delete');
    });
    Route::get('/loans-fetch-data', [LoanController::class, 'fetchData'])->name('loans.fetch-data');

    // policy route
    Route::prefix('policy')->group(function () {
        Route::get('/policy-delete/{id}', [PolicyController::class, 'deletePolicy'])->name('policy.delete');
    });
    Route::get('/policy-fetch-data',[PolicyController::class, 'fetchData'])->name('policy.fetch-data');

    //city routes
    Route::prefix('cities')->group(function () {
        Route::get('/cities-delete/{id}', [CityController::class, 'delete'])->name('cities.delete');
    });
    Route::get('/cities-fetch-data', [CityController::class, 'fetchData'])->name('cities.fetch-data');

    Route::get('/gpfs-fetch-data', [GpfController::class, 'fetchData'])->name('gpfs.fetch-data');

    // memeber route
    Route::get('/members-delete/{id}', [MemberController::class, 'deleteMember'])->name('members.delete');
    Route::get('/members-fetch-data', [MemberController::class, 'fetchData'])->name('members.fetch-data');
    //member credit update
    Route::post('/members-credit-update',[MemberController::class,'memberCreditUpdate'])->name('members.credit.update');
    Route::post('/members-credit-da-percentage',[MemberController::class,'memberCreditDaPercentage'])->name('members.credit.da-percentage');
    //member debit update
    Route::post('/members-debit-update',[MemberController::class,'memberDebitUpdate'])->name('members.debit.update');
    Route::post('/members-debit-edu-cess',[MemberController::class,'memberDebitEducationCess'])->name('members.debit.get-edu-cess');
    Route::post('/eol-hpl', [MemberController::class, 'checkEolHplCcl'])->name('members.eol-hpl');
    //member recovery update
    Route::post('/members-recovery-update',[MemberController::class,'memberRecoveryUpdate'])->name('members.recovery.update');
    Route::delete('/members-recovery-delete/{id}',[MemberController::class, 'memberRecoveryDelete'])->name('members.recovery-delete');

    Route::get('/member-loans-emi-info',[MemberController::class,'memberLoanEmiInfo'])->name('members-loan.emi-info');
    Route::post('/members-loan-list',[MemberController::class,'memberLoanList'])->name('members.get-loan-from-member');
    Route::post('/members-loan-emi-submit',[MemberController::class,'memberLoanEmiSubmit'])->name('members.loans-emi-submit');
    Route::post('/loan-emi-list', [MemberController::class, 'fetchEmiList'])->name('members.loan-emi-list');


    //member check credit availability
    Route::post('/members-check-credit-availability',[MemberController::class,'memberCheckCreditAvailability'])->name('members.check-credit-available');

    //member recovery original route
    Route::post('/members-recovery-original-update',[MemberController::class,'memberRecoveryOriginalUpdate'])->name('members.recovery-original.update');
    // members.loan.get-loan

    //member expectation route
    Route::post('/members-expectation-store',[MemberController::class,'memberExpectationStore'])->name('members.expectation.store');
    Route::get('/members-expectation-edit/{id}',[MemberController::class,'memberExpectationEdit'])->name('members.expectation.edit');
    Route::post('/members-expectation-update',[MemberController::class,'memberExpectationUpdate'])->name('members.expectation.update');
    Route::post('/members-get-rule-detail',[MemberController::class, 'memberExpRuleDetail'])->name('members.expectation.get-rule-detail');
    Route::delete('/members-expectation-delete/{id}',[MemberController::class, 'memberExpectationDelete'])->name('members.expectation-delete');
    //member core-info update
    Route::post('/members-core-info-update',[MemberController::class,'memberCoreInfoUpdate'])->name('members.core-info.update');
    Route::post('/members-core-info-ifsc',[MemberController::class,'memberBankIfsc'])->name('members.core-info.get-ifsc');

    Route::post('/get-members-grade-pay',[MemberController::class,'getMemberGradePay'])->name('members.grade-pay');
    Route::post('/get-members-cgegis-value',[MemberController::class,'getmemberCgegisvalue'])->name('members.get-cgegis-value');
    Route::post('/get-members-category-value',[MemberController::class,'getmemberCategoryValue'])->name('members.get-category-value');


    //member loan info
    Route::post('/members-loan-info-store',[MemberController::class,'memberLoanInfoStore'])->name('members.loan.store');
    //member loan edit
    Route::get('/members-loan-edit/{id}',[MemberController::class,'memberLoanEdit'])->name('members.loan.edit');

    //member personal info
    Route::post('/members-policy-info-store',[MemberController::class,'memberPolicyInfoStore'])->name('members.policy-info.submit');
    Route::get('/members-policy-info-edit/{id}',[MemberController::class,'memberPolicyInfoEdit'])->name('members.policy-info.edit');
    Route::post('/members-policy-info-update',[MemberController::class,'memberPolicyInfoUpdate'])->name('members.policy-info.update');
    Route::delete('/members-policy-info-delete/{id}',[MemberController::class, 'memberPolicyInfoDelete'])->name('members.policy-info.delete');
    //member personal update
    Route::post('/members-loan-update',[MemberController::class,'memberLoanUpdate'])->name('members.loan.update');
    Route::delete('/members-loan-delete/{id}',[MemberController::class, 'memberLoanDelete'])->name('members.loan.delete');
    Route::post('/members-personal-update',[MemberController::class,'memberPersonalUpdate'])->name('members.personal.update');

    //member income tax
    Route::prefix('member-income-taxes')->group(function () {
        Route::get('/member-income-taxes-delete/{id}', [MemberIncomeTaxController::class, 'delete'])->name('member-income-taxes.delete');
    });
    Route::get('/member-income-taxes-fetch-data', [MemberIncomeTaxController::class, 'fetchData'])->name('member-income-taxes.fetch-data');

    // pay commission
    Route::prefix('pay-commissions')->group(function () {
        Route::get('/pay-commissions-delete/{id}', [PayCommissionController::class, 'delete'])->name('pay-commissions.delete');
    });
    Route::get('/pay-commissions-fetch-data', [PayCommissionController::class, 'fetchData'])->name('pay-commissions.fetch-data');

    //dearness allowance percentage
    Route::prefix('dearness-allowance-percentages')->group(function () {
        Route::get('/dearness-allowance-percentages-delete/{id}', [DearnessAllowancePercentageController::class, 'delete'])->name('dearness-allowance-percentages.delete');
    });
    Route::get('/dearness-allowance-percentages-fetch-data', [DearnessAllowancePercentageController::class, 'fetchData'])->name('dearness-allowance-percentages.fetch-data');

    //hra
    Route::prefix('hras')->group(function () {
        Route::get('/hras-delete/{id}', [HraController::class, 'delete'])->name('hras.delete');
    });
    Route::get('/hras-fetch-data', [HraController::class, 'fetchData'])->name('hras.fetch-data');

    //tpta
    Route::prefix('tptas')->group(function () {
        Route::get('/tptas-delete/{id}', [TptaController::class, 'delete'])->name('tptas.delete');
    });
    Route::get('/tptas-fetch-data', [TptaController::class, 'fetchData'])->name('tptas.fetch-data');
    Route::post('/tptas-da-percentage', [TptaController::class, 'daPercentageCalculation'])->name('tptas.da-percentage');

    //income tax
    Route::prefix('income-taxes')->group(function () {
        Route::get('/income-taxes-delete/{id}', [IncomeTaxController::class, 'delete'])->name('income-taxes.delete');
    });
    Route::get('/income-taxes-fetch-data', [IncomeTaxController::class, 'fetchData'])->name('income-taxes.fetch-data');

    //payment category
    Route::prefix('payment-categories')->group(function () {
        Route::get('/payment-categories-delete/{id}', [PaymentCategoryController::class, 'delete'])->name('payment-categories.delete');
    });
    Route::get('/payment-categories-fetch-data', [PaymentCategoryController::class, 'fetchData'])->name('payment-categories.fetch-data');

    //cash payment
    Route::prefix('cash-payments')->group(function () {
        Route::get('/cash-payments-delete/{id}', [CashPaymentController::class, 'delete'])->name('cash-payments.delete');
    });
    Route::get('/cash-payments-fetch-data', [CashPaymentController::class, 'fetchData'])->name('cash-payments.fetch-data');
    Route::get('/cash-payments-get-details', [CashPaymentController::class, 'getRctNoDetail'])->name('cash-payments.get-details');
    //cheque payment
    Route::prefix('cheque-payments')->group(function () {
        Route::get('/cheque-payments-delete/{id}', [ChequePaymentController::class, 'delete'])->name('cheque-payments.delete');

    });
    Route::get('/cheque-payments-fetch-data', [ChequePaymentController::class, 'fetchData'])->name('cheque-payments.fetch-data');
    Route::post('/cheque-payments-member-desig', [ChequePaymentController::class, 'fetchMemberDesig'])->name('cheque-payments.get-member-desig');
    Route::get('/cheque-payments-rct-details', [ChequePaymentController::class, 'getReceiptNoDetail'])->name('cheque-payments.get-rct-details');

    //reset voucher
    Route::prefix('reset-voucher')->group(function () {
        Route::get('/reset-voucher-delete/{id}', [ResetVoucherController::class, 'delete'])->name('reset-voucher.delete');
    });

    Route::get('/reset-voucher-fetch-data', [ResetVoucherController::class, 'fetchData'])->name('reset-voucher.fetch-data');
    Route::get('/edit-member',[MemberController::class,'editMember'])->name('edit.member');
    // Route::get('/income-tax',[IncomeTaxController::class,'index'])->name('income-tax');

     // manik routes
     Route::prefix('tada')->group(function () {
        Route::get('/tada-delete/{id}', [TaDaController::class, 'delete'])->name('tada.delete');
    });
    Route::get('/tada-fetch-data', [TaDaController::class, 'fetchData'])->name('tada.fetch-data');

    //tada Advance
    Route::prefix('/member-info/tada-advance')->group(function () {
        Route::get('/tada-advance-delete/{id}', [TadaAdvanceController::class, 'delete'])->name('tada-advance.delete');
        Route::get('/tada-advance-fetch-data', [TadaAdvanceController::class, 'fetchData'])->name('tada-advance.fetch-data');
        Route::get('/report/{id}', [TadaAdvanceController::class, 'report'])->name('tada-advance.report');
        Route::get('/tada-priority-table/{id}', [TadaAdvanceController::class, 'priority_list'])->name('tada-priority.list');
        Route::post('/tada-priority-add', [TadaAdvanceController::class, 'store_priority'])->name('tada-priority.add');
        Route::get('/tada-priority-remove/{id}/{tada_adv_id}', [TadaAdvanceController::class, 'delete_priority']);
        Route::get('/report-priority/{id}', [TadaAdvanceController::class, 'report_priority']);

        Route::get('/tada-journey-table/{id}', [TadaJourneyDetailController::class, 'index'])->name('tada-journey.list');
        Route::post('/tada-journey-add', [TadaJourneyDetailController::class, 'store'])->name('tada-journey.add');
        Route::get('/tada-journey-remove/{id}/{tada_adv_id}', [TadaJourneyDetailController::class, 'delete']);
        Route::get('/report-journey/{id}', [TadaJourneyDetailController::class, 'report']);
    });

    //tada Plus
    Route::prefix('/member-info/tada-plus')->group(function () {
        Route::get('/report/{id}', [TadaPlusClaimController::class, 'report'])->name('tada-plus.report-plus');
    });

    // member info routes
    Route::prefix('member-info')->group(function () {
        Route::resources([
            'leave-type' => LeaveTypeController::class,
            'member-alloted-leave' => MemberAllotedLeaveController::class,
            'member-leaves' => MemberLeaveController::class,
            'attendances' => AttendanceController::class,
            'penal-interest' => PenalInterestController::class,
            'member-gpf' => MemberGpfController::class,
            'pension-rate' => PensionRateController::class,
            'member-pension' => PensionController::class,
            'member-retirement' => MemberRetirementController::class,
            'member-newspaper-allowance' => MemberNewspaperAllowanceController::class,
            'member-bag-allowance' => MemberBagAllowanceController::class,
        ]);

        Route::get('/member-newspaper-fetch',[MemberNewspaperAllowanceController::class,'fetchData'])->name('member-newspaper-allowance.fetch-data');
        Route::get('/member-bag-fetch',[MemberBagAllowanceController::class, 'fetchData'])->name('member-bag-allowance.fetch-data');
        Route::post('/member-bag-allotment-fetch',[MemberBagAllowanceController::class, 'fetchBagAllotment'])->name('get-member-bag-allowance');
        // leave type
        Route::prefix('leave-type')->group(function () {
            Route::get('/leave-type-delete/{id}', [LeaveTypeController::class, 'delete'])->name('leave-type.delete');
        });
        Route::get('/leave-type-fetch-data', [LeaveTypeController::class, 'fetchData'])->name('leave-type.fetch-data');

        // member alloted leave
        Route::prefix('member-alloted-leave')->group(function () {
            Route::get('/member-alloted-leave-delete/{id}', [MemberAllotedLeaveController::class, 'delete'])->name('member-alloted-leave.delete');
        });
        Route::get('/member-alloted-leave-fetch-data', [MemberAllotedLeaveController::class, 'fetchData'])->name('member-alloted-leave.fetch-data');


        //member gpf
        Route::post('/member-gpf-check-subscription', [MemberGpfController::class, 'memberGpfCheckSubscription'])->name('member-info.gpf.check-amount');

        // member leaves
        Route::prefix('member-leaves')->group(function () {
            Route::get('/member-leaves-delete/{id}', [MemberLeaveController::class, 'delete'])->name('member-leaves.delete');
        });
        Route::get('/member-leaves-fetch-data', [MemberLeaveController::class, 'fetchData'])->name('member-leaves.fetch-data');
        Route::post('/member-leaves-year-search', [MemberLeaveController::class, 'yearSearch'])->name('member-leaves.year-search');
        Route::get('/get-alloted-leaves', [MemberLeaveController::class, 'getAllotedLeaves'])->name('member-leaves.get-alloted-leaves');
        Route::get('/leave-fetch-data', [MemberLeaveController::class, 'leaveFetchData'])->name('member-leaves.leave-fetch-data');
        Route::get('/leave-list', [MemberLeaveController::class, 'memberLeaves'])->name('member-leaves.leave-list');

        // attendance
        Route::prefix('attendances')->group(function () {
            Route::get('/attendances-delete/{id}', [AttendanceController::class, 'delete'])->name('attendances.delete');
        });
        Route::get('/attendances-fetch-data', [AttendanceController::class, 'fetchData'])->name('attendances.fetch-data');
        Route::post('/member-attendances', [AttendanceController::class, 'memberAttendances'])->name('attendances.member-attendances');

        // penal interest
        Route::post('/get-member-loan-info', [PenalInterestController::class, 'getMemberLoanInfo'])->name('penal-interest.get-member-loan-info');
        Route::post('/get-loan-info', [PenalInterestController::class, 'getLoanInfo'])->name('penal-interest.get-loan-info');

        // pension
        Route::post('/get-member-salary-detail', [PensionController::class, 'getMemberSalaryDetail'])->name('member-pension.get-member-salary-detail');

        // retirement
        Route::get('/member-retirement-fetch-data', [MemberRetirementController::class, 'fetchData'])->name('member-retirement.fetch-data');

    });

    // Income Tax
    Route::prefix('income-tax')->group(function () {
        Route::resources([
            'arrears' => ArrearsController::class,
            'rents' => RentController::class
        ]);

        Route::post('/arrears-member-details', [ArrearsController::class, 'memberDetails'])->name('arrears.member-details');
        Route::get('/arrears-fetch-data', [ArrearsController::class, 'fetchData'])->name('arrears.fetch-data');

        Route::post('/rent-member-details', [RentController::class, 'memberDetails'])->name('rents.member-details');
        Route::get('/rent-fetch-data', [RentController::class, 'fetchData'])->name('rents.fetch-data');
    });

    // imprest routes
    Route::prefix('imprest')->group(function () {
        Route::resources([
            'cda-receipt-details' => CdaReceiptDetailController::class,
            'imprest-reset-voucher' => ImprestResetVoucherController::class,
            'variable-type' => VariableTypeController::class,
            'project' => ProjectController::class,
            'cda-receipts' => CdaReceiptController::class,
            'cda-bills' => CdaBillAuditTeamController::class,
            'cash-withdrawals' => CashWithdrawalController::class,
            'advance-settlement' => AdvanceSettlementController::class,
            'advance-funds' => AdvanceFundController::class,
        ]);

        Route::get('/report-imprest', [ImprestReportController::class, 'imprestReport'])->name('imprest-report');
        Route::post('/report-imprest-generate', [ImprestReportController::class, 'imprestReportGenerate'])->name('generate.imprest-report');

        // cda receipt details
        Route::prefix('cda-receipt-details')->group(function () {
            Route::get('/cda-receipt-details-delete/{id}', [CdaReceiptDetailController::class, 'delete'])->name('cda-receipt-details.delete');
        });
        Route::get('/cda-receipt-details-fetch-data', [CdaReceiptDetailController::class, 'fetchData'])->name('cda-receipt-details.fetch-data');

        // imprest reset voucher
        Route::prefix('imprest-reset-voucher')->group(function () {
            Route::get('/imprest-reset-voucher-delete/{id}', [ImprestResetVoucherController::class, 'delete'])->name('imprest-reset-voucher.delete');
        });
        Route::get('/imprest-reset-voucher-fetch-data', [ImprestResetVoucherController::class, 'fetchData'])->name('imprest-reset-voucher.fetch-data');

        // variable type
        Route::prefix('variable-type')->group(function () {
            Route::get('/variable-type-delete/{id}', [VariableTypeController::class, 'delete'])->name('variable-type.delete');
        });
        Route::get('/variable-type-fetch-data', [VariableTypeController::class, 'fetchData'])->name('variable-type.fetch-data');

        // project
        Route::prefix('project')->group(function () {
            Route::get('/project-delete/{id}', [ProjectController::class, 'delete'])->name('project.delete');
        });
        Route::get('/project-fetch-data', [ProjectController::class, 'fetchData'])->name('project.fetch-data');

        // cda receipt
        Route::prefix('cda-receipts')->group(function () {
            Route::get('/cda-receipts-delete/{id}', [CdaReceiptController::class, 'delete'])->name('cda-receipts.delete');
        });
        Route::get('/cda-receipts-fetch-data', [CdaReceiptController::class, 'fetchData'])->name('cda-receipts.fetch-data');

        //cda bills
        Route::prefix('cda-bills')->group(function () {
            Route::get('/cda-bills-delete/{id}', [CdaBillAuditTeamController::class, 'delete'])->name('cda-bills.delete');
        });
        Route::get('/cda-bills-fetch-data', [CdaBillAuditTeamController::class, 'fetchData'])->name('cda-bills.fetch-data');

        //cash withdrawal
        Route::prefix('cash-withdrawals')->group(function () {
            Route::get('/cash-withdrawals-delete/{id}', [CashWithdrawalController::class, 'delete'])->name('cash-withdrawals.delete');
        });

        Route::get('/cash-withdrawals-fetch-data', [CashWithdrawalController::class, 'fetchData'])->name('cash-withdrawals.fetch-data');

        //advance fund
        Route::prefix('advance-funds')->group(function () {
            Route::get('/advance-funds-delete/{id}', [AdvanceFundController::class, 'delete'])->name('advance-funds.delete');
        });
        Route::get('/advance-funds-fetch-data', [AdvanceFundController::class, 'fetchData'])->name('advance-funds.fetch-data');
        Route::get('/advance-funds-employee', [AdvanceFundController::class, 'fetchEmployeeData'])->name('advance-funds.fetch-employee');

        //advance settlement
        Route::prefix('advance-settlement')->group(function () {
            Route::get('/advance-settlement-delete/{id}', [AdvanceSettlementController::class, 'delete'])->name('advance-settlement.delete');
        });

        Route::get('/advance-settlement-fetch-data', [AdvanceSettlementController::class, 'fetchData'])->name('advance-settlement.fetch-data');

        Route::post('/advance-settlement-bill-store', [AdvanceSettlementController::class, 'storeAdvanceSettleBill'])->name('advance-settle-bills.store');
        Route::get('/advance-settlement-bills-edit/{id}', [AdvanceSettlementController::class, 'editAdvanceSettlementBill'])->name('advance-settlement-bills.edit');
        Route::post('/advance-settlement-bill-update', [AdvanceSettlementController::class, 'updateAdvanceSettleBill'])->name('advance-settle-bills.update');
        //delete advance settylement
        Route::get('/advance-settlement-bill-delete/{id}', [AdvanceSettlementController::class, 'deleteAdvanceSettleBill'])->name('advance-settle-bills.delete');

    });

    //grade pay routes
    Route::get('/grade-pays-fetch-data', [GradePayController::class, 'fetchData'])->name('grade-pays.fetch-data');


    // inventory routes
    Route::prefix('inventory')->group(function () {
        Route::group(['middleware' => 'material'], function () {
            Route::resources([
                'item-codes' => ItemCodeController::class,
                'inventory-types' => InventoryTypeController::class,
                'inventory-projects' => InventoryProjectController::class,
                'inventory-numbers' => InventoryNumberController::class,
                'inventory-loans' => InventoryLoanController::class,
                'credit-vouchers' => CreditVoucherController::class,
                'debit-vouchers' => DebitVoucherController::class,
                'reset-codes' => ResetItemCodeController::class,
                'gate-passes' => GatePassController::class,
                'conversion-vouchers' => ConversionVoucherController::class,
                'external-issue-vouchers' => ExternalIssueVoucherController::class,
                'transfer-vouchers' => TransferVoucherController::class,
                'item-code-types' => ItemCodeTypeController::class,
                'rins' => RinController::class,
                'supply-orders' => SupplyOrderController::class,
                'credit-voucher-numbers' => CreditVoucherNumberController::class,
                'certificate-issue-vouchers' => CertificateIssueVoucherController::class,
                'uom' => UomController::class,
                'vendors' => VendorController::class,
                'transports' => TransportController::class,
                'gst' => GstController::class,
                'sirs' => InventorySirController::class,
                'traffic-controls' => TrafficControlController::class,
                'security-gate-stores' => SecurityGateStoresController::class,
                'store-inward' => StoreInwardController::class,
            ]);

            Route::get('/inventory-loan-fetch-data', [InventoryLoanController::class, 'inventoryLoanFetchData'])->name('inventory-loans.fetch-data');
            Route::post('/inventory-loans-get-data',[InventoryLoanController::class, 'inventoryLoanItemData'])->name('inventory-loans.get-item-detail');

            Route::get('/conversion-get-item-details', [ConversionVoucherController::class, 'conversionGetItemDetails'])->name('conversions.item.details');
            Route::post('/inventory-holder', [CertificateIssueVoucherController::class, 'getInventoryHolder'])->name('certificate-issue-vouchers.get-inventory-holder');
            Route::get('/security-gate-stores-fetch-data', [SecurityGateStoresController::class, 'fetchData'])->name('security-gate-stores.fetch-data');
            Route::get('/report-generate',[InventoryReportController::class, 'inventoryReportGenerate'])->name('inventory.reports');
            Route::get('/traffic-control-reports',[InventoryReportController::class, 'trafficControlReport'])->name('reports.traffic-control');
            Route::get('/reports-security-gate-store',[InventoryReportController::class, 'securityGateReport'])->name('reports.security-gate');
            Route::get('/reports-store-inward',[InventoryReportController::class, 'storeInwardReport'])->name('reports.store-inward');
            Route::get('/store-inward-fetch-data', [StoreInwardController::class, 'fetchData'])->name('store-inward.fetch-data');
            Route::get('/reports-rin-controller',[InventoryReportController::class, 'rinControllerReport'])->name('reports.rin-controller');
            Route::get('/reports-certificate-receipt',[InventoryReportController::class, 'certificateReceiptVoucher'])->name('reports.certificate-receipt-voucher');

            // Ledger Sheet Report
            Route::get('/ledger-sheet-report',[InventoryReportController::class, 'ledgerSheetReport'])->name('reports.ledger-sheet');
            // Bin Card Report
            Route::get('/bin-card-report',[InventoryReportController::class, 'binCardReport'])->name('reports.bin-card');
            //Register for inventories report
            Route::get('/register-for-inventories',[InventoryReportController::class, 'registerForInventories'])->name('reports.register-for-inventories');
            //Stock sheet
            Route::get('/reports-stock-sheet',[InventoryReportController::class, 'stockSheetReport'])->name('reports.stock-sheet');
            //Inventory Loan register report
            Route::get('/inventory-loan-register',[InventoryReportController::class, 'inventoryLoanRegister'])->name('reports.inventory-loan-register');
            //Discrepancy report
            Route::get('/discrepancy-report',[InventoryReportController::class, 'discrepancyReport'])->name('reports.discrepancy-report');
            //Internal demand & issue voucher report
            Route::get('/internal-demand-issue-voucher',[InventoryReportController::class, 'internalDemandIssueVoucher'])->name('reports.internal-demand-issue-voucher');
            // Internal return & receipt voucher report
            Route::get('/internal-return-receipt-voucher',[InventoryReportController::class, 'internalReturnReceiptVoucher'])->name('reports.internal-return-receipt-voucher');
            // Trial store gate pass report
            Route::get('/trial-store-gate-pass',[InventoryReportController::class, 'trialStoreGatePass'])->name('reports.trial-store-gate-pass');
            //Armaments and Ammunition register report
            Route::get('/armaments-ammunition-register',[InventoryReportController::class, 'armamentsAmmunitionRegister'])->name('reports.armaments-ammunition-register');
            //Disposal Item report
            Route::get('/disposal-item-report',[InventoryReportController::class, 'disposalItemReport'])->name('reports.disposal-item-report');
            //Statement of damaged report
            Route::get('/statement-of-damaged',[InventoryReportController::class, 'statementOfDamaged'])->name('reports.statement-of-damaged');
            //Cash purchase control register report
            Route::get('/cash-purchase-control-register',[InventoryReportController::class, 'cashPurchaseControlRegister'])->name('reports.cash-purchase-control-register');
            //Stores outward register report
            Route::get('/stores-outward-register',[InventoryReportController::class, 'storesOutwardRegister'])->name('reports.stores-outward-register');
            // Record of transaction report
            Route::get('/record-of-transaction',[InventoryReportController::class, 'recordOfTransaction'])->name('reports.record-of-transaction');
            //Loan out ledger register report
            Route::get('/loan-out-ledger-register',[InventoryReportController::class, 'loanOutLedgerRegister'])->name('reports.loan-out-ledger-register');
            //Loan in ledger register report
            Route::get('/loan-in-ledger-register',[InventoryReportController::class, 'loanInLedgerRegister'])->name('reports.loan-in-ledger-register');
            //CPRV control register
            Route::get('/cprv-control-register',[InventoryReportController::class, 'cprvControlRegister'])->name('reports.cprv-control-register');
            // CPIV control register report
            Route::get('/cpiv-control-register',[InventoryReportController::class, 'cpivControlRegister'])->name('reports.cpiv-control-register');
            //Contingent bill report
            Route::get('/contingent-bill',[InventoryReportController::class, 'contingentBill'])->name('reports.contingent-bill');
            // Contractor's bill report
            Route::get('/contractors-bill',[InventoryReportController::class, 'contractorsBill'])->name('reports.contractors-bill');
            // Certified issue voucher report
            Route::get('/certified-issue-voucher',[InventoryReportController::class, 'certifiedIssueVoucher'])->name('reports.certified-issue-voucher');
            //Expendable store issue voucher report
            Route::get('/expendable-store-issue-voucher',[InventoryReportController::class, 'expendableStoreIssueVoucher'])->name('reports.expendable-store-issue-voucher');
            //Fitment Voucher report
            Route::get('/fitment-voucher',[InventoryReportController::class, 'fitmentVoucher'])->name('reports.fitment-voucher');


            //rins routes
            Route::get('/rins-reports/{id}', [InventoryReportController::class, 'rinsReport'])->name('rins.report');



            //gate pass report
            Route::get('/gate-pass-report/{id}', [InventoryReportController::class, 'gatePassReport'])->name('gate-passes.report');

            // report routes
                // credit voucher
            Route::post('/reports-credit-voucher', [InventoryReportController::class, 'creditVoucherGenerate'])->name('reports.credit-voucher');
                // debit voucher
            Route::post('/reports-debit-voucher', [InventoryReportController::class, 'debitVoucherGenerate'])->name('reports.debit-voucher');
                // transfer voucher
            Route::post('/reports-transfer-voucher', [InventoryReportController::class, 'transferVoucherGenerate'])->name('reports.transfer-voucher');
                // conversion voucher
            Route::post('/reports-conversion-voucher', [InventoryReportController::class, 'conversionVoucherGenerate'])->name('reports.conversion-voucher');
                // external issue voucher
            Route::post('/reports-external-issue-voucher', [InventoryReportController::class, 'externalIssueVoucherGenerate'])->name('reports.external-issue-voucher');
                // certificate issue voucher
            Route::post('/reports-certificate-issue-voucher', [InventoryReportController::class, 'certificateIssueVoucherGenerate'])->name('reports.certificate-issue-voucher');
                // lvp list
            Route::get('/reports-lvp-list', [InventoryReportController::class, 'lvpList'])->name('reports.lvp-list');
            Route::post('/reports-lvp-list-generate', [InventoryReportController::class, 'lvpListGenerate'])->name('reports.lvp-list-generate');


            //reset item codes
            Route::prefix('reset-codes')->group(function () {
                Route::get('/delete/{id}', [ResetItemCodeController::class, 'delete'])->name('reset-codes.delete');
            });
            Route::get('/reset-codes-fetch-data', [ResetItemCodeController::class, 'fetchData'])->name('reset-codes.fetch-data');

            //item-codes
            Route::get('/item-codes-fetch-data', [ItemCodeController::class, 'fetchData'])->name('item-codes.fetch-data');
            Route::prefix('item-codes')->group(function () {
                Route::get('/delete/{id}', [ItemCodeController::class, 'delete'])->name('item-codes.delete');
            });

            Route::get('/inventory-types-fetch-data',[InventoryTypeController::class, 'fetchData'])->name('inventory-types.fetch-data');
            Route::prefix('inventory-types')->group(function () {
                Route::get('/delete/{id}', [InventoryTypeController::class, 'delete'])->name('inventory-types.delete');
            });

            Route::get('/inventory-projects-fetch-data', [InventoryProjectController::class, 'fetchData'])->name('inventory-projects.fetch-data');
            Route::prefix('inventory-projects')->group(function () {
                Route::get('/delete/{id}', [InventoryProjectController::class, 'delete'])->name('inventory-projects.delete');
            });

            Route::get('/inventory-numbers-fetch-data', [InventoryNumberController::class, 'fetchData'])->name('inventory-numbers.fetch-data');
            Route::prefix('inventory-numbers')->group(function () {
                Route::get('/delete/{id}', [InventoryNumberController::class, 'delete'])->name('inventory-numbers.delete');
            });

            //credit-vouchers
            Route::get('/credit-vouchers-fetch-data', [CreditVoucherController::class, 'fetchData'])->name('credit-vouchers.fetch-data');
            Route::get('/credit-vouchers-delete/{id}', [CreditVoucherController::class, 'delete'])->name('credit-vouchers.delete');
            Route::post('/get-item-type', [CreditVoucherController::class, 'getItemType'])->name('credit-vouchers.get-item-type');

            // credit-vouchers.get-rin-details
            Route::post('/credit-vouchers.get-rin-details', [CreditVoucherController::class, 'getRinDetails'])->name('credit-vouchers.get-rin-details');

            //debit-vouchers
            Route::get('/debit-vouchers-fetch-data', [DebitVoucherController::class, 'fetchData'])->name('debit-vouchers.fetch-data');
            Route::get('/debit-vouchers-delete/{id}', [DebitVoucherController::class, 'delete'])->name('debit-vouchers.delete');
            Route::post('/get-item-quantity', [DebitVoucherController::class, 'getItemQuantity'])->name('debit-vouchers.get-item-quantity');
            Route::post('/get-items-by-inv-no', [DebitVoucherController::class, 'getItemsByInvNo'])->name('debit-vouchers.get-items-by-inv-no');

            //gate-passes
            Route::get('/gate-passes-fetch-data', [GatePassController::class, 'fetchData'])->name('gate-passes.fetch-data');
            Route::get('/gate-passes-delete/{id}', [GatePassController::class, 'delete'])->name('gate-passes.delete');

            //conversion-vouchers
            Route::get('/conversion-vouchers-fetch-data', [ConversionVoucherController::class, 'fetchData'])->name('conversion-vouchers.fetch-data');
            Route::post('/conversion-vouchers-item-quant', [ConversionVoucherController::class, 'getItemQuantity'])->name('conversion-vouchers.get-item-quantity');
            Route::post('/conversion-vouchers-quantity-validation', [ConversionVoucherController::class, 'getItemQuantityValidation'])->name('conversion-vouchers.quantity-validation');
            Route::get('/conversion-vouchers-delete/{id}', [ConversionVoucherController::class, 'deleteConversionVoucher'])->name('conversion-vouchers.delete');

            //transfer voucher
            Route::get('/transfer-vouchers-fetch-data', [TransferVoucherController::class, 'fetchData'])->name('transfer-vouchers.fetch-data');
            Route::get('/transfer-vouchers-delete/{id}', [TransferVoucherController::class, 'delete'])->name('transfer-vouchers.delete');

            //external-issue-vouchers
            Route::get('/external-issue-vouchers-fetch-data', [ExternalIssueVoucherController::class, 'fetchData'])->name('external-issue-vouchers.fetch-data');
            Route::get('/external-issue-vouchers-delete/{id}', [ExternalIssueVoucherController::class, 'delete'])->name('external-issue-vouchers.delete');

            //item-code-types
            Route::get('/item-code-types-fetch-data', [ItemCodeTypeController::class, 'fetchData'])->name('item-code-types.fetch-data');
            Route::prefix('item-code-types')->group(function () {
                Route::get('/delete/{id}', [ItemCodeTypeController::class, 'delete'])->name('item-code-types.delete');
            });



            //rins
            Route::get('/rins-fetch-data', [RinController::class, 'fetchData'])->name('rins.fetch-data');
            Route::prefix('rins')->group(function () {
                Route::get('/delete/{id}', [RinController::class, 'delete'])->name('rins.delete');
            });
            Route::post('/get-item-description', [RinController::class, 'getItemDescription'])->name('rins.get-item-description');

            Route::post('/rins-total-reports/{id}', [RinController::class, 'rinsTotalValue'])->name('rins.get-total-amount');

            //supply-orders
            Route::get('/supply-orders-fetch-data', [SupplyOrderController::class, 'fetchData'])->name('supply-orders.fetch-data');
            Route::prefix('supply-orders')->group(function () {
                Route::get('/delete/{id}', [SupplyOrderController::class, 'delete'])->name('supply-orders.delete');
            });

            // traffic-controls
            Route::get('/traffic-controls-fetch-data', [TrafficControlController::class, 'fetchData'])->name('traffic-controls.fetch-data');
            Route::prefix('traffic-controls')->group(function () {
                Route::get('/delete/{id}', [TrafficControlController::class, 'delete'])->name('traffic-controls.delete');
            });


            //credit-voucher-numbers
            Route::get('/credit-voucher-numbers-fetch-data', [CreditVoucherNumberController::class, 'fetchData'])->name('credit-voucher-numbers.fetch-data');
            Route::prefix('credit-voucher-numbers')->group(function () {
                Route::get('/delete/{id}', [CreditVoucherNumberController::class, 'delete'])->name('credit-voucher-numbers.delete');
            });

            //certificate-issue-vouchers
            Route::get('/certificate-issue-vouchers-fetch-data', [CertificateIssueVoucherController::class, 'fetchData'])->name('certificate-issue-vouchers.fetch-data');
            Route::prefix('certificate-issue-vouchers')->group(function () {
                Route::get('/delete/{id}', [CertificateIssueVoucherController::class, 'delete'])->name('certificate-issue-vouchers.delete');
            });
            Route::get('/get-item-type', [CertificateIssueVoucherController::class, 'getItemDetail'])->name('certificate-issue-vouchers.get-item-type');

            // uoms
            Route::get('/uom-fetch-data', [UomController::class, 'fetchData'])->name('uom.fetch-data');

            // vendors
            Route::get('/vendors-fetch-data', [VendorController::class, 'fetchData'])->name('vendors.fetch-data');

            // transports
            Route::get('/transports-fetch-data', [TransportController::class, 'fetchData'])->name('transports.fetch-data');

            // gst
            Route::get('/gst-fetch-data', [GstController::class, 'fetchData'])->name('gst.fetch-data');
            Route::prefix('gst')->group(function () {
                Route::get('/delete/{id}', [GstController::class, 'delete'])->name('gst.delete');
            });
        });

    });

});
