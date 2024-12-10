<!doctype html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<style>
    @page {
        size: 29.7cm 42cm
    }
</style>

<body style="background: #fff;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto; text-align: center;">
        <tbody>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    Centre for High Energy Systems Sciences, Hyderabad<br>
                                    <span style="text-decoration: uppercase; font-weight: 400;">PAY & ALLOWANCES AND
                                        STATEMENT SHOWING
                                        INCOME TAX CALCULATION FOR THE YEAR {{ $year }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                    PC No: <span style="font-weight:600!important;">CH0051</span>
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                    EMP-ID:
                                    <span style="font-weight:600!important;">{{ $member_data->emp_id }}</span>
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                    PAN NO: <span
                                        style="font-weight:600!important;">{{ $member_core_info->pan_no ?? '' }}</span>
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                    Name & Designation: <span
                                        style="font-weight:600!important;">{{ $member_data->name }},{{ $member_data->desigs->designation ?? '' }} </span>
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important;
                                  margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                    Pay Bill Si No:198
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <thead>
                            <tr>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    Month</th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important;border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    B PAY</th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    G Pay</th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    S PAY</th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    F PAY</th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    2 Incr</th>

                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    V Incr
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                        margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    DA
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                  margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    HRA</th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
            margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    TPT</th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
      margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    WASH</th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    MISC
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                        margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    OT
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                  margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    TOTAL
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
            margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    GPF
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
      margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    CGEGIS
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    CGHS
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                        margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    P TAX
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                  margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    HBA
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
            margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    PLI
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
      margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    LIC
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    EOL
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                        margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    HDFC
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                  margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    MISC
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
            margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000; text-transform: uppercase;">
                                    I TAX
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $month => $data)
                                <tr>

                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                            margin: 0px 0px !important; border-bottom: 1px solid #000;">

                                        {{ $month }}

                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['credit']['basic_pay'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                            margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['credit']['g_pay'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['credit']['s_pay'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['credit']['f_pay'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                            margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['credit']['add_inc2'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['credit']['var_incr'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                            margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['credit']['da'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['credit']['hra'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['credit']['tpt'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                            margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['credit']['wash_alw'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['credit']['misc2'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                            margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['credit']['ot'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">

                                        {{ $data['credit']['total'] }}
                                    </td>

                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['debit']['gpf'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                            margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['debit']['cgegis'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['debit']['cghs'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                            margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['debit']['ptax'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['debit']['hba'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['debit']['pli'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['policy']['amount'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['debit']['eol'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['debit']['hdfc'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['debit']['misc1'] }}
                                    </td>
                                    <td
                                        style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                        margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                        {{ $data['debit']['i_tax'] }}
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    Total
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_credit['basic_pay'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_credit['g_pay'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_credit['s_pay'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_credit['f_pay'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_credit['add_inc2'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_credit['var_incr'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_credit['da'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_credit['hra'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_credit['tpt'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_credit['wash_alw'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_credit['misc2'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_credit['ot'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_credit['total'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_debit['gpf'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_debit['cgegis'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_debit['cghs'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_debit['ptax'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_debit['hba'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_debit['pli'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_policy }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_debit['eol'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                          margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_debit['hdfc'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_debit['misc1'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                             margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                    {{ $total_debit['i_tax'] }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    Add Arrears Paid
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important;">
                                    0
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                              margin: 0px 0px !important;">
                                    CGHS Recovered from Supplimentary Bills
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important;">
                                    0
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important;
                                  margin: 0px 0px !important;">
                                    Income Tax Recovered Other than Pay
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                  margin: 0px 0px !important;">

                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    Less HRA/EOL/HPL/ TOTAL
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important;">
                                    0
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                              margin: 0px 0px !important;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                  margin: 0px 0px !important;">
                                    Income Tax Recovered From Arrears
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                  margin: 0px 0px !important;">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    Add Govt Subscription to the NPS
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important;">
                                    0
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                              margin: 0px 0px !important;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                  margin: 0px 0px !important;">
                                    Income Tax Recovered From OT Bill
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                  margin: 0px 0px !important;">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    FINAL TOTAL
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                margin: 0px 0px !important;">
                                    {{ $total_credit['total'] }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                              margin: 0px 0px !important;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                  margin: 0px 0px !important;">
                                    Challan Amt
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                  margin: 0px 0px !important;">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                              margin: 0px 0px !important;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                  margin: 0px 0px !important;">
                                    NPS/CPS Recovered from Arrears
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important;
                                  margin: 0px 0px !important;">
                                    0
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important; border-top: 1px solid #000;  border-bottom: 1px solid #000;">
                                    Arrear Details: DA ARR - 0 ,ELEC - 0 ,BONUS - 0 ,DA ARR - 0 ,
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0 0px;">
                    <table width="100%" border="1">
                        <tr>
                            <td width="50%">
                                <table width="100%" border="1">
                                    <tbody>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                1. Pay and Allowances (Including HRA, Tuition Fee etc)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; border-right: 1px solid #000; 
                                    margin: 0px 0px !important;">
                                                {{ $total_credit['total'] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                2. Exemptions
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                a. Elements of HRA exempted<br>
                                                (Actual amount of HRA paid per annum Rs.{{ $total_credit['hra'] }}/-
                                                Total Rent paid Rs.0/-)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                0
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                b. Standard Deduction + Transport Allowance Excemption for Selected PH
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                {{ $standard_deduction }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                c. Professional Update Allowance
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                {{ $professional_update_allowance }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                {{ $standard_deduction + $professional_update_allowance }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                3. Pay & Allowances after Exemptions (1 - 2)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">
                                                @php $pay_allowances_after_exemptions = $total_credit['total'] - ($standard_deduction + $professional_update_allowance) @endphp
                                                {{ $pay_allowances_after_exemptions }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                4. Deductions
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                a. Professional Tax
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                {{ $total_debit['ptax'] }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                b. Accrued Interest on HBA (Self Occupied House)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                {{ $hbaInterest }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                c. Med Insurance / CGHS / Preventive Health Check (80 D) (25,000 /
                                                50,000)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                @foreach ($exemption_result as $exemption)
                                                    @if (preg_match('/\b80\s*d\b/i', $exemption['section']))
                                                        {{ $exemption['member_deduction'] }}
                                                    @endif
                                                    
                                                @endforeach
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                d. Expenditure on Medical Treatment (80 DD) (75,000 / 1,25,000)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                @foreach ($exemption_result as $exemption)
                                                    @if (preg_match('/\b80\s*d{2}\b/i', $exemption['section']))
                                                        {{ $exemption['member_deduction'] }}
                                                    @endif
                                                    
                                                @endforeach
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                e. Exp on Treatment for Specified Disease like Cancer/ AIDS (80 DDB)
                                                (40,000 / 1L)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                @foreach ($exemption_result as $exemption)
                                                    @if (preg_match('/\b80\s*ddb\b/i', $exemption['section']))
                                                        {{ $exemption['member_deduction'] }}
                                                    @endif
                                                    
                                                @endforeach
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                f. Self/Dependent Physically Handicapped (80 U) (75,000 / 1,25,000)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                @foreach ($exemption_result as $exemption)
                                                    @if (preg_match('/\b80\s*u\b/i', $exemption['section']))
                                                        {{ $exemption['member_deduction'] }}
                                                    @endif
                                                    
                                                @endforeach
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                g. Interest on Education Loan (80 E)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                @foreach ($exemption_result as $exemption)
                                                    @if (preg_match('/\b80\s*e\b/i', $exemption['section']))
                                                        {{ $exemption['member_deduction'] }}
                                                    @endif
                                                    
                                                @endforeach
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                h. Any Donations to Specified Funds (80 G) (25,000)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                @foreach ($exemption_result as $exemption)
                                                    @if (preg_match('/\b80\s*g\b/i', $exemption['section']))
                                                        {{ $exemption['member_deduction'] }}
                                                    @endif
                                                    
                                                @endforeach
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                i. Interest Earned on deposits in savings A/c (80 TTA) (10,000)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                @foreach ($exemption_result as $exemption)
                                                    @if (preg_match('/\b80\s*tta\b/i', $exemption['section']))
                                                        {{ $exemption['member_deduction'] }}
                                                    @endif
                                                    
                                                @endforeach
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                j. Equity Saving Scheme (80 CC G)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                @foreach ($exemption_result as $exemption)
                                                    @if (preg_match('/\b80\s*cc\s*g\b/i', $exemption['section']))
                                                        {{ $exemption['member_deduction'] }}
                                                    @endif
                                                    
                                                @endforeach
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                k. HBA Interest Exemption (80 EE)(50,000)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                 @foreach ($exemption_result as $exemption)
                                                    @if (preg_match('/\b80\s*ee\b/i', $exemption['section']))
                                                        {{ $exemption['member_deduction'] }}
                                                    @endif
                                                    
                                                @endforeach
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                I. CEA u/s 10(14)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                {{ $ceaus }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                @php $memberExemption = $total_exemption + $hbaInterest + $total_debit['ptax'] + $ceaus; @endphp
                                                {{ $memberExemption }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                5. Pay & Allowances after Deductions (3 - 4)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">
                                                @php
                                                    $pay_allowances_after_deductions = $pay_allowances_after_exemptions - $memberExemption;
                                                @endphp
                                                {{ $pay_allowances_after_deductions }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                6. Income from Other Sources
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; 
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                a. Interest on Fixed Deposits
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                {{ $fixed_deposit }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                b. Interest on NSC
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                {{ $nsc }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                c. Income/Loss on Let-out Property
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                {{ $letOutProperty }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                d. Income from pension
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                {{ $pensionIncome }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                e. Income from Interest on Savings A/c
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px; border-right: 1px solid #000;
                                    margin: 0px 0px !important;">
                                                {{ $savingsInterest }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                @php $income_from_other_sources = $fixed_deposit + $nsc + $letOutProperty + $pensionIncome + $savingsInterest; @endphp
                                                {{ $income_from_other_sources }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                7. Total Income (5 + 6)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important; border-right: 1px solid #000;">
                                    @php
                                        $total_income = $pay_allowances_after_deductions + $income_from_other_sources;
                                    @endphp
                                                {{ $total_income }}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                            <td width="50%">
                                <table width="100%" border="1">

                                    <tbody>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                8a. Savings (80C + 80CCC + 80CCD(1))
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; 
                                    margin: 0px 0px !important;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                PPF
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                {{ $ppf }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                ICICl/IDBI or Other Bonds
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                {{ $otherBonds }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                GPF Subscription / CPS
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                {{ $total_debit['gpf'] }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                NSC / CTD
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                {{ $nsc_ctd }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                CGEIS
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                {{ $total_debit['cgegis'] }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                HBA Loan Refund
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                {{ $hbaRefund }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                PLI
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                {{  $total_debit['pli'] }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                Jeevan Suraksha / Jeevan Dhara
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                {{ $jeevanSuraksha }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                LIC
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                {{  $total_policy }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                ULIP
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                {{ $ulip }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                TUTION FEE
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                {{ $tutionFee }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                Any Other
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                {{ $otherSavings }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                Total of (8a)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">
                                                0
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                (Restricted to a Max of 1,50,000)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                @php
                                                    $total_savings = $ppf + $otherBonds + $total_debit['gpf'] + $nsc_ctd + $total_debit['cgegis'] + $hbaRefund + $total_debit['pli'] + $jeevanSuraksha + $total_policy + $ulip + $tutionFee + $otherSavings;

                                                    $max_savings = null; $savings_total = 0;
                                                    foreach ($exemption_result as $exemption_section) {
                                                        if(preg_match('/\b80\s*c(?:c{2}|cd\(1\))?\b/i', $exemption_section['section'])) {
                                                            $max_savings = $exemption_section['max_deduction'];
                                                        
                                                        }
                                                    }
                                                    if($total_savings > $max_savings) {
                                                        $savings_total = $max_savings;
                                                    } else {
                                                        $savings_total = $total_savings;
                                                    }
                                                @endphp
                                                {{ $savings_total }}
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                8b Govt. Subs to CPS - 80CCD(2)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                @php 
                                                    $total_ccd2 = 0; 
                                                    foreach ($exemption_result as $exemption) {
                                                        if (preg_match('/\b80\s*ccd\(2\)\b/i', $exemption['section'])) {
                                                            $total_ccd2 = $exemption['member_deduction'] ?? 0;
                                                        }
                                                    }
                                                @endphp  
                                                {{ $total_ccd2 }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                8c U/s - 80CCD(1b) through NSDL
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                @php 
                                                    $total_ccd1b = 0; 
                                                    foreach ($exemption_result as $exemption) {
                                                        if (preg_match('/\b80\s*ccd\(1b\)\b/i', $exemption['section'])) {
                                                            $total_ccd1b = $exemption['member_deduction'] ?? 0;
                                                        }
                                                    }
                                                @endphp  
                                                {{ $total_ccd1b }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                Total Savings - (8a+8b+8c)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            @php
                                                $totalSaving = $savings_total + $total_ccd2 + $total_ccd1b;
                                            @endphp
                                                {{ $totalSaving }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                9. Taxable Income (7 - 8)
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                @php
                                                    $taxable_income = $total_income - $totalSaving;
                                                @endphp
                                                {{ $taxable_income }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                10. Taxable Income rounded off to nearest ten Rupee
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                @php
                                                    $taxable_income_rounded = round($taxable_income, -1);
                                                @endphp
                                                {{ $taxable_income_rounded }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                11. Total Income Tax
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                @php
                                                    // Tax Calculation
                                                    $tax = 0;
                                                    $educessRate = $incometaxRate[0]->edu_cess_rate ?? 0;

                                                    foreach($incometaxRate as $rate) {
                                                        $lowerSlabAmount = $rate->lower_slab_amount;
                                                        $higherSlabAmount = $rate->higher_slab_amount;
                                                        $taxRate = $rate->tax_rate;

                                                        // tax calculation for current slab
                                                        if ($taxable_income_rounded > $lowerSlabAmount) {
                                                            $currentSlabTaxableIncome = min($taxable_income_rounded, $higherSlabAmount) - $lowerSlabAmount;
                                                            $tax += $currentSlabTaxableIncome * ($taxRate / 100);
                                                        }
                                                    }
                                                    $added87aTax = $tax + $relief87A;

                                                    $educess = $added87aTax * ($educessRate / 100);

                                                    $total_tax = $added87aTax + $educess;
                                                    
                                                @endphp
                                                {{ $tax }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                12. Relief u/s 87 A
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                {{  $relief87A ?? 0 }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                {{ $added87aTax ?? 0}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                13. Add {{ $educessRate ?? 0 }}% Edu Cess to Income Tax
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                {{ $educess ?? 0}}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                {{ $total_tax ?? 0 }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                14. Relief u/s 89
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                {{ $relief89 ?? 0 }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                15. Amt of IT rec from Pay & other Bills
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                {{  $total_debit['i_tax'] ?? 0}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                16. Balance to be recovered in the remaining months
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">
                                                {{ $total_tax - $total_debit['i_tax'] ?? 0 }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                Aug -> 0 ; Sep -> 0 ; Oct -> 0 ; Nov -> 0
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 6400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                                Dec -> 0 ; Jan -> 0 ; Feb -> 0
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; height: 10px;
                                    margin: 0px 0px !important;">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td rowspan="2" style="font-size: 12px; line-height: 16px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important; height: 20px;">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr> -->
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td rowspan="2"
                                    style="font-size: 12px; line-height: 16px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; height: 40px;
                                    margin: 0px 0px !important; border-top: 1px solid #000;">
                                    TAX SLABS
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; border-top: 1px solid #000; 
                                    margin: 0px 0px !important;">
                                    A) where the Taxable Income <= Rs 2,50,000/- , 3,00,000 for Sr.Citizen is Nil </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; border-top: 1px solid #000;
                                margin: 0px 0px !important;">
                                    B) Rs (2,50,001 / 3,00,001)/- to 5,00,000/- : 5% of amount exceeding (2,50,000 /
                                    3,00,000)/-
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                    margin: 0px 0px !important;">
                                    C) Rs 5,00,001/- to 10,00,000/- : Rs (12,500 / 10,000)/- plus 20% of amount exceding
                                    5,00,000)/- </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important;
                                margin: 0px 0px !important;">
                                    D) Rs 10,00,001/- & above : Rs (1,12,500 / I,10,000)/- plus 30% of amount exceeding
                                    10,00,000/-
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
