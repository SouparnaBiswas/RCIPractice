
<!doctype html>
<html lang="en">

<title>RCI</title>


<meta charset="utf-8" />


@php
use App\Helpers\Helper;
@endphp
<style>
     .page-break {
        page-break-before: always;
    }
</style>

<body style="background: #fff; font-family: 'Noto Sans', sans-serif;">

    
    @foreach($member_data_collection as $data)

    @php
        $member_data = $data['member_data'];
        $member_credit_data = $data['member_credit_data'];
        $member_debit_data = $data['member_debit_data'];
        $member_core_info = $data['member_core_info'];
        $member_recoveries_data = $data['member_recoveries_data'];
        $member_quarter_charge = $data['member_quarter_charge'];
    @endphp

    
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto; text-align: center;">
        <tbody>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    भारत सरकार , रक्षा मंत्रालय 
                                    GOVT. OF INDIA , MINISTRY OF DEFENCE<br>
                                    उच्च ऊर्जा प्रणाली एबं विज्ञान केंद्र विग्रयान कांचा (डाकघर ), हैदराबाद - 500069<br>
                                    CENTER FOR HIGH ENERGY SYSTEMS AND SCIENCE CHESS, HYDERABAD-500069 <br>
                                    बेतन पर्ची PAY SLIP FOR THE MONTH OF : {{ $monthName }}-{{ $year }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="3" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left;  text-transform: uppercase; padding: 0px 0px !important;
                                    margin: 0px 0px !important;">
                                    कर्मचारी संकेत Ecode:<br>
                                    नाम Name:<br>
                                    पदनाम Rank(level)<br>
                                    Pan No<br>
                                    Soc.MNO:
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left;  text-transform: uppercase; padding: 0px 0px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_data->emp_id ?? '' }}<br>
                                    {{ $member_data->name ?? '' }} <br>
                                    {{ $member_data->desigs->designation ?? '' }}({{ $member_data->payLevels->value ?? '' }})<br>
                                    {{ $member_core_info->pan_no ?? '' }}<br>
                                </td>
                                <td>
                                    
                                    <img style="width: 50px; height: 50px; margin: 0 auto; padding: 0px 5px !important;" src="{{ storage_path('app/public/' . Helper::logo()->logo) }}" />
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left;  text-transform: uppercase; padding: 0px 0px !important;
                                    margin: 0px 0px !important;">
                                    भ. नि. नि. संख्या Gpfno:<br>
                                    bank name: <br>
                                    Account no:<br>
                                    ifsc no:
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left;  text-transform: uppercase; padding: 0px 0px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_data->gpf_number ?? $member_data->pran_number ?? '' }}<br>
                                    {{ $member_core_info->banks->bank_name ?? '' }} <br>
                                    {{ $member_core_info->bank_acc_no ?? '' }}<br>
                                    {{ $member_core_info->banks->ifsc ?? '' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="1" cellpadding="3" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <th colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    जमा / CREDITS</th>
                                <th colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    कटौती - १ / DEDUCTION - I </th>
                                <th colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    कटौती - २ / DEDUCTION - II</th>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    मूल बेतन / BASIC PAY
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->pay ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    सामान्य भबिष्य  निधि अभिदान / GPF SUB
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->gpa_sub ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    SOCIETY
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{  $member_debit_data->society ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    महंगाई भत्ता / DA
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->da  ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    सामान्य भबिष्य  निधि अग्रिम / GPF ADV
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->gpf_adv ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    MESS
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_recoveries_data->mess ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    मकान किराया भत्ता / HRA
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->hra ?? 0}}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    सा भ नि बकाया / GPF ARRS
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->gpf_arr ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    WELFARE
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{  $member_recoveries_data->wel_sub ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    परिबाहन भत्ता / Tpt allow
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->tpt ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    के स क सा बी यो / CGEGIS
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->cgegis ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    PTAX
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->ptax ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    परिबाहन महंगाई भत्ता / TPTDA
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->da_on_tpt ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                   केंद्रीय सरकारी स्वास्थ योजना / CGHS
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->cghs ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    ASSOCIATION STORES
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_recoveries_data->asso_fee ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    बिशेष बेतन / SPL PAY
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                   {{ $member_credit_data->s_pay ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    आबास भवन अग्रिम / HBA ADV
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->hba_adv ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    बिशेष प्रोत्साहन / SPL INCENT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->spl_incentive ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    आबास भवन अग्रिम / HBA INT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->hba_int ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    प्रोत्साहन भत्ता / INCENTIVE
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->incentive ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    बाहन अग्रिम / CAR ADV
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->car_adv ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    वर्दी भत्ता / DRESS ALLWN
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->dis_alw ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    बाहन अग्रिम / CAR INT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{  $member_debit_data->car_int ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    परिबर्ति राशि / VARIABLE AMT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->variable_amt ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    स्कूटर अग्रिम / SCO ADV
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->sco_adv ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    ARRS OF PAY & ALLOW
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->arrs_pay_alw ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    स्कूटर अग्रिम ब्याज / SCO INT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->sco_int ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    जोखिम भत्ता / RISK ALLWN
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->risk_alw ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    संगणक अग्रिम / COMP ADV
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{  $member_debit_data->comp_adv ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    बिबिध जमा (आयकर ) / MISC CREDIT (IT)
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->misc1 ?? 0}}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    संगणक अग्रिम ब्याज / COMP INT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->comp_int ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    बिबिध जमा / MISC CREDIT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->misc2 ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    त्योहार अग्रिम / FEST ADV
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->fadv ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    छुट्टी रियायत / LTC
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{  $member_debit_data->ltc ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    MED DEBIT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{  $member_debit_data->medi ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    बै. भ / या. भ  / TADA
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->tada ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    LEAVE REC
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->leave_rec ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    PENSION REC
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{  $member_debit_data->pension_rec ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    आयकर / INCOME TAX
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{  $member_debit_data->i_tax ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    EDU CESS
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{  $member_debit_data->ecess ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    PL INSUR
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->pli ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    बिबिध बकाया वसूली / MISC DEBIT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->misc1 ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    MISC DEBIT(IT)
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->misc2 ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    मकान वकाया / QUARTER CHARGES
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{  $member_quarter_charge ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    CGHS ARR
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    CGEIS ARR
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->cgeis_arr ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    PENAL INTR
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{  $member_debit_data->penal_intr ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    कुल / TOTAL
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_credit_data->tot_credits  ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    कुल / TOTAL
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{  $member_debit_data->tot_debits ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    कुल / TOTAL
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    @php
                                        $secondDeduction = ($member_debit_data->society ?? 0)  +  ($member_recoveries_data->mess ?? 0) + ($member_recoveries_data->wel_sub ?? 0) + ($member_debit_data->ptax ?? 0) + ($member_recoveries_data->asso_fee ?? 0);
                                    @endphp
                                    {{ $secondDeduction ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    कुल बेतन बिल / NET PAY BILL
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    @php
                                        $netPayBill = ($member_credit_data->tot_credits ?? 0) - ($member_debit_data->tot_debits ?? 0);
                                    @endphp
                                    {{ $netPayBill ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    कुल बेतन पर्ची / PAYSLIP NET
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $netPayBill - $secondDeduction }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="3" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left;  text-transform: uppercase; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    Note :
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left;  text-transform: uppercase; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    1 Unsigned Payslip, only for information<br>
                                    2 This is not a salary certificate for the purpose of grant of loan/advance by any
                                    agency.<br>
                                    3 Salary certificate if required, can be obtained from ADM group.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="1" cellpadding="3" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; height: 20px; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    कुल अग्रिम / tot adv
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    शेष अग्रिम / BAL adv
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    चालू / कुल हफ्ता / CI/TI
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    अनुज्ञप्ति / L.F
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important; width: 50px;">
                                    0
                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    भ. नि. नि. / GPF DETAILS
                                </td>

                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; height: 20px; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    भबिष्य निर्बाह / GPF
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->gpf_adv ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important; ">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    बिजली / ELECTRICITY
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->elec ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    आदि शेष / OBAL
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>

                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; height: 20px; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    बाहन / VEHICLE
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    पानी / WATER
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    {{ $member_debit_data->water ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    अंत शेष / CBAL
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    0
                                </td>

                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; height: 20px; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    गृह निर्माण भत्ता / HBA
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    फर्नीचर / FURNITURE
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                {{ $member_debit_data->furn ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>

                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; height: 20px; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    संगणक / COMP ADV/INT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    बिबिध मकान बकाया / MISC RENT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                 {{ $member_debit_data->misc1 ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>

                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; height: 20px; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    त्यौहार अग्रिम / FEST ADV/INT
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px;  padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000;  height: 20px; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    बिबिध बकाया वसूली शेष / LWFL BAL
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center;  text-transform: uppercase; border: 1px solid #000; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">

                                </td>

                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    @if(!$loop->last)
        <div class="page-break"></div>
    @endif
    @endforeach

    
</body>

</html>
