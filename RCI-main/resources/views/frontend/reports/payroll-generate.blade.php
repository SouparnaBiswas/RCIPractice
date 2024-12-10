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
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; text-transform: uppercase;">
                                    {{ $today ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 14px; line-height: 10px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; text-transform: uppercase;">
                                    Center for High Energy Systems & Science, Hydrabad
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
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; text-transform: uppercase;">
                                    Category: : {{ $category ?? '' }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; text-transform: uppercase;">
                                    Pay Roll for the Month of {{ $get_month_name ?? '' }}-{{ $year ?? ''}}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; text-transform: uppercase;">
                                    Unit Code -330000110
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; text-transform: uppercase;">
                                                    Total Earnings
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    Basic Pay
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    {{ $total['basic'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    Special Pay
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    {{ $total['special'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    2 Additional Increment
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    {{ $total['2incr'] ?? 0 }}
                                                </td>
                                            </tr>
                                             <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    Variable Increment
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    {{ $total['var_incr'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    Dearness Allowances
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    {{ $total['da'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    House Rent Allowances
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    {{ $total['house_rent'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    Transport Allowances
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    {{ $total['transport'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    Family Planning Allowances
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    0
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    Hindi Allowances
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    {{ $total['hindi'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    Deputation Allowances
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    {{ $total['deptn_alw'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    Disable Allowances
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    0
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    Washing Allowances
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    {{ $total['wash_alwn'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    Risk Allowances
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    {{ $total['risk_alwn'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    Non Practice Allowances
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    {{ $total['non_pract_alwn'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    Cr Rent
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    {{ $total['cr_rent'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    Cr Electricity
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    {{ $total['cr_elec'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    Cr Water
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    {{ $total['cr_water'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    Misc 2
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    {{ $total['misc2'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    Gross
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                                    {{ $total['gross'] ?? 0 }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td colspan="3" style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none; text-transform: uppercase;">
                                                   Total Deductions
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    19/015/0l
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    NPS Supscription
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                   00
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    NPS Refunds
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    0
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    01/371/01
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Rent
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['rent'] ?? 0 }}
                                                </td>
                                            </tr>
                                             <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    01/373/04
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Electricity
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['elec'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    01/373/05
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Water
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['water'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    01/371/02
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Furniture
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['furn'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Rent Arrears
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    0
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Electricity Arrears
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['elec_arr'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                     
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Water Arrears
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['water_arr'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Furniture Arrears
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['furn_arr'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    00/012/12
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Car Advance
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['car_adv'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    00/004/08
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Car Advance Interest
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['car_adv_intrst'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    00/012/13
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Scooter Advance
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    0
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    00/004/08
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Scooter Advance Interest
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['sctr_adv_intrst'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    00/012/09
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Cycle Advance
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    00/004/08
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Cycle Advance Interest
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    00/012/07
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    HBA Advance
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['hba_adv'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    00/004/07
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    HBA Advance Interest
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    0
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    00/024/00
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    PLI
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['pli'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                     00/015/60
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    CGEGIS
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['cgegis'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    01/854/00
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    CGHS
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['cghs'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    00/003/02
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    IT
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['it'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    00/003/09
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    E.Cess
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['ecess'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    IT Surcharge
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    01/855/01
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    TA/DA
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['tada'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    82/854/01
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    LTC
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['ltc'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Medical
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['medical'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    EOL/HPL
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['eol_hpl'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    00/012/15
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    PC Advance
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['pc_adv'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    00/044/19
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    PC Advance Interest
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    0
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    00/012/11
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Festival Advance Recovery
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['festival_adv_rec'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Professional Tax
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['professional_tx'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    01/380/30
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    HRA Rec
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['hra_rec'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    01/380/30
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    TPT Rec
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['tpt_rec'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    01/380/30
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Misc 1
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['misc1_debit'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    01/380/30
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Misc 2
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['misc2_debit'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    01/380/30
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Misc 3
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    {{ $total['misc3_debit'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                                    01/380/30
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    NPS Arrears
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    0
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none; height:30px;">
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Total Debits
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                                    {{ $total['total_debit'] ?? 0 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                                    Net Pay
                                                </td>
                                                <td
                                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-bottom: 1px solid #000;">
                                                    {{ $total['net_pay'] ?? 0 }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                    {{  \App\Helpers\Helper::convertToWords($total['net_pay'] ?? 0) }}
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