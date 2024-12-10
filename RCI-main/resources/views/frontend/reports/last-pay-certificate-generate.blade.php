<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<body style="background: #fff">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto">
        <tbody>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center"
                        style="margin: 0 auto">
                        <tbody>
                            <tr>
                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      text-decoration: underline;
                    ">
                                    CENTER FOR HIGH ENERGY SYSTEMS & SCIENCES (CHESS)
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    In Lieu of I.A.F.A - 445
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      text-decoration: underline;
                    ">
                                    Last Pay Certificate
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="height: 10px"></td>
            </tr>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center"
                        style="margin: 0 auto">
                        <tbody>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    1. (a) Name
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    {{ $member_data->name }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    &nbsp; (b) DRDO PIN
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    {{ $drdoPin }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    &nbsp; (c) Designation
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    {{ $member_data->desigs->designation ?? 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    &nbsp; (d) Pay Level
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    {{ $member_data->payLevels->value ?? 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    2. Date of Birth
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    {{ \Carbon\Carbon::parse($member_data->dob)->format('d M Y') ?? 'dd Mon Year' }}.
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    3. Date of Appointment in DRDO
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    {{ \Carbon\Carbon::parse($member_data->doj_lab)->format('d M Y') ?? 'dd Mon Year' }}.
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    4. ESTT/LAB
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    chess, HYDERABAD
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    5. Proceeding From
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    chess, HYDERABAD
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    6. Proceeding to
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    O/o DG(Med & Cos), Delhi
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    7. Authority for Transfer & Date
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    DRDO HORS LETTER NO:<br />
                                    DOP/05(DRDS-111)/53162/DG(MED&CoS(/M/01(i), <br />
                                    DATED:
                                    {{ \Carbon\Carbon::parse($member_data->doj_service2)->format('d M Y') ?? 'dd Mon Year' }}.
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    8. Rate of Pay Drawn per Month
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    Basic Pay {{ $member_credit_data->pay ?? '0' }}/-
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    9. Rate of Allowances, if any
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    DA-{{ $member_credit_data->da ?? '0' }}/- TPT Allow:
                                    {{ $member_credit_data->tpt ?? '0' }}/-<br> DA on TPT-
                                    {{ $member_credit_data->da_on_tpt ?? '0' }}/- V.I-
                                    {{ $member_credit_data->var_incr ?? '0' }}/- HRA
                                    {{ $member_credit_data->hra ?? '0' }}/¬
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    10. Date upto and for which paid
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    @if ($member_credit_data)
                                        {{ \Carbon\Carbon::parse($member_credit_data->created_at)->format('d M Y') ?? 'dd Mon Year' }}.
                                    @else
                                        'dd Mon Year'
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    11. Date of Stuck of Strength
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    @if ($member_credit_data)
                                        {{ \Carbon\Carbon::parse($member_credit_data->created_at)->format('d M Y') ?? 'dd Mon Year' }}.
                                    @else
                                        'dd Mon Year'
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    12. Date of Next Increment
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    {{ \Carbon\Carbon::parse($member_data->next_inr)->format('d M Y') ?? 'dd Mon Year' }}.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="height: 20px"></td>
            </tr>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      text-decoration: underline;
                    ">
                                    MONTHLY DEDUCTION
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="height: 20px"></td>
            </tr>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px !important;
                    ">
                                    <span style="margin-right: 15px"> 1)</span> GPF :
                                    {{ $member_debit_data->gpa_sub ?? 0 }}/-
                                </td>
                                <td colspan="2"
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px !important;
                    ">
                                    <span style="margin-right: 15px">2)</span> CGEGIS :
                                    {{ $member_debit_data->cgegis ?? 0 }}/-
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px !important;
                    ">
                                    <span style="margin-right: 15px">3)</span> CGHS :
                                    {{ $member_debit_data->cghs ?? 0 }}/-
                                </td>
                                <td colspan="2"
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px !important;
                    ">
                                    <span style="margin-right: 15px">4)</span> P.T :
                                    {{ $member_debit_data->ptax ?? 0 }}/-
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px !important;
                    ">
                                    <span style="margin-right: 15px">5)</span> I.Tax :
                                    {{ $member_debit_data->i_tax ?? 0 }}/-
                                </td>
                                <td colspan="2"
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px !important;
                    ">
                                    <span style="margin-right: 15px">6)</span> E.Cess :
                                    {{ $member_debit_data->ecess ?? 0 }}/-
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px !important;
                    ">
                                    <span style="margin-right: 15px">7)</span> Welfare:
                                    {{ $member_recoveries_data->wel_sub ?? 0 }}/-
                                </td>
                                <td colspan="2"
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      padding: 0px 5px !important;
                      border: 1px solid #000;
                    ">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
              <td style="padding: 0 0px">
                  <table width="30%" border="0" cellpadding="0" cellspacing="0" align="center" style="margin: 0 auto">
                    <tbody>
                      <tr>
                        <td colspan="3" style="height: 40px"></td>
                      </tr>
                        <tr>
                            <td
                                style="
                  font-size: 10px;
                  line-height: 14px;
                  font-weight: 400;
                  color: #000;
                  text-align: left;
                   padding: 0px 15px !important;
                   margin: 0px 0px !important;
                  text-transform: uppercase;
                ">
                                GPF NO
                            </td>
                            <td
                                style="
                  font-size: 10px;
                  line-height: 14px;
                  font-weight: 400;
                  color: #000;
                  text-align: left;
                  margin: 0px 0px !important;
                  text-transform: uppercase;
                ">
                                : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>
                            <td
                                style="
                  font-size: 10px;
                  line-height: 14px;
                  font-weight: 400;
                  color: #000;
                  text-align: left;
                  margin: 0px 0px 0px 40px!important;
                  text-transform: uppercase;
                ">
                                {{ $member_core_info->gpf_acc_no ?? 'N/A' }}
                            </td>
                        </tr>
                        <tr>
                          <td
                              style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                 padding: 0px 15px !important;
                 margin: 0px 0px !important;
                text-transform: uppercase;
              ">
                              PAN No
                          </td>
                          <td
                              style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                margin: 0px 0px !important;
                text-transform: uppercase;
              ">
                                : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </td>
                          <td
                              style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                margin: 0px 0px !important;
                text-transform: uppercase;
              ">
                              {{ $member_core_info->pan_no ?? 'N/A' }}
                          </td>
                      </tr>
                      <tr>
                        <td
                            style="
              font-size: 10px;
              line-height: 14px;
              font-weight: 400;
              color: #000;
              text-align: left;
               padding: 0px 15px !important;
               margin: 0px 0px !important;
              text-transform: uppercase;
            ">
                            SBI A/C No
                        </td>
                        <td
                            style="
              font-size: 10px;
              line-height: 14px;
              font-weight: 400;
              color: #000;
              text-align: left;
              margin: 0px 0px !important;
              text-transform: uppercase;
            ">
                              : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td
                            style="
              font-size: 10px;
              line-height: 14px;
              font-weight: 400;
              color: #000;
              text-align: left;
              margin: 0px 0px !important;
              text-transform: uppercase;
            ">
                            {{ $member_core_info->bank_acc_no ?? 'N/A' }}
                        </td>
                    </tr>
                    </tbody>
                  </table>
                </td>
            </tr>
            <tr>
                <td style="height: 20px"></td>
            </tr>

            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      text-decoration: underline;
                    ">
                                    NOTE :
                                </td>
                            </tr>
                            <tr>
                              <td style="width: 5%"></td>
                              <td 
                                    style="
                       width: 5%;             
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                     i)
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                   Pay & Allowances
                                    up to 30th November 2023 has been claimed and paid by this
                                    Establishment.
                                </td>
                            </tr>
                            <tr>
                              <td style="width: 5%"></td>
                              <td 
                                    style="
                       width: 5%;             
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                     ii)
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    Professional
                                    Update Allowance for the financial year 2022-23 has been
                                    claimed and paid.
                                </td>
                            </tr>
                            <tr>
                              <td style="width: 5%"></td>
                              <td 
                                    style="
                       width: 5%;             
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                     iii)
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                     The Officer has been paid
                                    newspaper allowance upto 30/06/2023.
                                </td>
                            </tr>
                            <tr>
                              <td style="width: 5%"></td>
                              <td 
                                    style="
                       width: 5%;             
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                     iv)
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">              The Officer has
                                    claimed Telephone bill upto Sep 2023.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="height: 20px;"></td>
            </tr>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      text-decoration: underline;
                    ">
                                    Station <span style="margin-right: 15px"></span><span
                                        style="margin-right: 15px"></span>
                                </td>
                                <td
                                    style="
                      width: 5%;              
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">:
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    CHESS, RCI Campus,<br />
                                    Vigyanakancha, Hyderabad.
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    (D.Madhu Sudan Reddy)<br />
                                    Accounts Officer <br />
                                    For Director
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      text-decoration: underline;
                    ">
                                    Date<span style="margin-right: 15px"></span><span
                                        style="margin-right: 15px"></span> 
                                </td>
                                <td
                                style="
                  width: 5%;              
                  font-size: 10px;
                  line-height: 14px;
                  font-weight: 400;
                  color: #000;
                  text-align: left;
                  margin: 0px 0px !important;
                  text-transform: uppercase;
                ">:
                            </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    {{ \Carbon\Carbon::now()->format('d M Y') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    Countersigned
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 0 0px">
                    <table width="20%" border="0" cellpadding="0" cellspacing="0" align="left">
                        <tbody>
                            <tr>
                                <td
                                    style="
                      font-size: 16px;
                      line-height: 20px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px 0px 50px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 10px;
                    ">
                                    LPC<br />
                                    Steal
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center"
                        style="margin: 0 auto">
                        <tbody>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    PCDA(R&D) <br /> HYDERABAD
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center"
                        style="margin: 0 auto">
                        <tbody>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    Copy to:
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 10%"></td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                                    Director General,<br />
                                    MED & CoS,<br />
                                    R.N0.144/B, <br />
                                    DRDO Bhavan,<br />
                                    Rajaji Marg, <br />
                                    NEW DELHI 110011 <br />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
