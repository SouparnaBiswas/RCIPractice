
<!doctype html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<body style="background: #fff;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto; text-align: center;">
        <tbody>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td colspan="3"
                                    style="font-size: 14px; line-height: 18px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                    Form 16 (Part B)
                                    <span style="font-size: 10px; line-height: 14px; font-weight: 400; text-transform: lowercase;">[see rule 31 (1) (a)]</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: 1px solid #000;">
                                   Certificate u/s 203 of the Income Tax Act, 1961 for TDS on Salary
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: 1px solid #000;">
                                    Name and Address of the Employer<br>
                                    <span style="font-weight: 400;">Director: CHESS, Vigyanakancha, Hyd-69</span>
                                </td>
                                <td colspan="2"
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: 1px solid #000;">
                                    Name and Designation of the Employee<br>
                                    <span style="font-weight: 400;">{{ $member->name?? '' }}, {{ $member->desigs->designation ?? '' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                    Tan No:
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000; border-right: none; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                    Pan <span style="font-weight: 400;">{{ $member_core_info->pan_no ?? '' }}</span>
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-right: 1px solid #000; border-left: none;
                                border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                    Emp Id  <span style="font-weight: 400;">{{ $member->emp_id ?? '' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000; border-right: none; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                    Pan No:
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border-left: 1px solid #000;  border-right: none;
                                border-top: 1px solid #000;border-bottom: 1px solid #000;">
                                    Period<br>
                                    {{ $assessment_year ?? '' }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;  border-right: 1px solid #000;
                                border-top: 1px solid #000; border-bottom: 1px solid #000;">
                                    Assessment Year<br>
                                    {{ $current_financial_year ?? '' }}
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
                                    style="font-size: 14px; line-height: 18px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: none">
                                    Details of salary paid and any other income and tax deducted
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
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: 1px solid #000; border-bottom: none; width: 50px;">
                                    1.
                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none; border-top: 1px solid #000; border-bottom: none;">
                                    Gross salary
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: 1px solid #000; border-bottom: none;">
                                
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: 1px solid #000; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: 1px solid #000; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (a) Salary as per pros ision contained in section 17(1)
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                   {{ $member_credit_data->tot_credits ?? 0 }} 
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (b) Value of perquisites under section 17(2) (as per Form No.12BA. wherever applicable
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{ $prerequisite172 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (c) Profits in lieu of salar■ under section 17(3) (as per Form No.12BA. wherever applicable
                                    
                                    
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{ $profits_in_lieu }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (d) Total
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                @php $gross_salary = ($member_credit_data->tot_credits ?? 0) + $prerequisite172 + $profits_in_lieu; @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $gross_salary }} 
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (e) Reported total amount of salary received from other employers
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                    {{ $total_from_other_employer }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    2.
                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none; border-top: none; border-bottom: none;">
                                  Less: Allowances to the Extent Exempt Under Section 10
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (a) Travel concession or assistance under section 10(5)/ Transport allowance (TPT)
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{ $member_credit_data->tpt ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (b) House Rent Allowance under section 10(13A)
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{ $member_credit_data->hra ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (c)	Professional Update Allowance
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{ $member_credit_data->pua ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (d)	u/s 10(A), 10(B)
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{ $amt10a + $amt10b }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (e) Any Other exemption u/s 10
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{ $exemption10 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                  border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                @php $total_exemption_10 = ($member_credit_data->tpt ?? 0) + ($member_credit_data->hra ?? 0) + ($member_credit_data->pua ?? 0) + $amt10a + $amt10b + $exemption10; @endphp
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (f) Total amount of exemption u/s 10
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                    {{ $total_exemption_10 }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    3.
                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    Total Amount of Salary received from current employer [1(d) — 2(f)]
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                @php
                                    $salary_current_employer = $gross_salary - $total_exemption_10;
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                    {{ $salary_current_employer }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    4.
                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    Less: Deductions Under Section 16
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (a)	Standard Deduction u/s 16(ia)
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{ $standard_deduction_16 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  (b)Entertainment Allowance u/s 16(ii)
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{ $entertainment_allow }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    (c) Tax on Employment u/s l6(iii) (Profession Tax)
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{ $profession_tax }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                </td>
                            </tr>
                            <tr>
                                @php $total_deduction_16 = $standard_deduction_16 + $entertainment_allow + $profession_tax; @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    5.
                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    Total Amount of Deductions Under Section 16 4|(a) to (c)]
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $total_deduction_16 }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    6.
                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   Income Chargeable Under the Head Salaries (3+1(e)-5) 
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                @php $income_chargeable = ($salary_current_employer + $total_from_other_employer) - $total_deduction_16; @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                    {{ $income_chargeable }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    7.
                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    Add: Any other income reported by the employee as per section 192 (2B)
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   (a) Income ( or admissible loss) from House Property reported and Ofered for TDS
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                    {{ $income_from_house_property ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   (b) Income Under the Head Other Sources Offered for TDS
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                   {{ $income_from_other_sources ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                @php $total_from_other_employer = $income_from_house_property + $income_from_other_sources; @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    8.
                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   Total Amount of Other Income Reported by the Employee
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $total_from_other_employer }} 
                                </td>
                            </tr>
                            <tr>
                                @php $gross_total_income = $income_chargeable + $total_from_other_employer; @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    9.
                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   Gross Total Income (6+ 8) 
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                  {{ $gross_total_income }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                    10.
                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    Deductions: Under Chapter VI-A 
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none; text-transform: uppercase;">
                                    Gross
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                    quilifying
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                    Deductable
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td colspan="2" style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none; text-transform: uppercase;">
                                    Amount
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                    Amount
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                    Amount
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   a) Contribution to Life Insurance Premium / Provident Fund etc u/s 80C 
                                </td>
                                @php 
                                    $total_80c = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*c\b/i', $it_exemption['section']))
                                        {
                                            $total_80c += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                 {{  $total_80c ?? 0 }}
                                  
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    b) Contributions to Certain Pension Funds u/s 80CCC
                                </td>
                                @php 
                                    $total_80ccc = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*c{3}\b/i', $it_exemption['section']))
                                        {
                                            $total_80ccc += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  {{  $total_80ccc ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  c) Contribution by Tax Payer to Pension Scheme u/s 80CCD(1) 
                                </td>
                                @php 
                                    $total_80ccd1 = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*c{2}d\(1\)\b/i', $it_exemption['section']))
                                        {
                                            $total_80ccd1 += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    } 
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    {{ $total_80ccd1 ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   d) Total Deduction u/s 80C, 80 CCC & 80 CCD(1)
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                              
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                @php $total_80c_deduction = $total_80c ?? 0 + $total_80ccc ?? 0 + $total_80ccd1 ?? 0; @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   -{{  $total_80c_deduction }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   e) Amount Paid/Deposited u/s 80 CCD(IB)
                                </td>
                                @php 
                                    $total_80ccd1b = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*c{2}d\(1\)\b/i', $it_exemption['section']))
                                        {
                                            $total_80ccd1b += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  {{ $total_80ccd1b ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                  {{ $total_80ccd1b ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    f) Contribution by Employer to Pension Scheme u/s 80CCD(2)
                                </td>
                                @php 
                                    $total_80ccd2 = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*c{2}d\(2\)\b/i', $it_exemption['section']))
                                        {
                                            $total_80ccd2 += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  {{  $total_80ccd2 ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   {{  $total_80ccd2 ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  g) Health lnsurance Premia / Medical Insurance - u/s 80D 
                                </td>
                                @php 
                                    $total_80d = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*d\b/i', $it_exemption['section']))
                                        {
                                            $total_80d += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                {{ $total_80d ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   {{  $total_80d ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   h) Interest on Higher Education Loan - 80E 
                                </td>
                                @php 
                                    $total_80e = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*e\b/i', $it_exemption['section']))
                                        {
                                            $total_80e += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                    {{  $total_80e ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   {{  $total_80e ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   i) Donations to Certen Funds / Charitable Institutions u/s 80G
                                </td>
                                @php 
                                    $total_80g = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*g\b/i', $it_exemption['section']))
                                        {
                                            $total_80g += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                              {{  $total_80g ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                 {{  $total_80g ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                   j) Interest on Deposits in savings Account u/s 8OTTA
                                </td>
                                @php 
                                    $total_80tta = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*t{2}a\b/i', $it_exemption['section']))
                                        {
                                            $total_80tta += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                {{  $total_80tta ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   {{  $total_80tta ?? 0 }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  k) Amount Deductable Under Any Other Provisions of Chapter VI-A
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                              
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                &nbsp;  &nbsp; i) Expenditure on Medical Treatment - u/s 80DDB
                                </td>
                                @php 
                                    $total_80ddb = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*ddb\b/i', $it_exemption['section']))
                                        {
                                            $total_80ddb += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  {{ $total_80ddb ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                &nbsp;  &nbsp; ii) Self/ Dependent Physically Handicapped - u/s 80DD
                                </td>
                                @php 
                                    $total_80dd = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*dd\b/i', $it_exemption['section']))
                                        {
                                            $total_80dd += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  {{  $total_80dd ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                &nbsp;  &nbsp; iii)  u/s 8ODDB
                                </td>
                                @php
                                    $total_80ddb = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*ddb\b/i', $it_exemption['section']))
                                        {
                                            $total_80ddb += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  {{ $total_80ddb ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                &nbsp;  &nbsp; iv)  u/s 8OCCG
                                </td>
                                @php 
                                    $total_80ccg = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b80\s*ccg\b/i', $it_exemption['section']))
                                        {
                                            $total_80ccg += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  {{  $total_80ccg ?? 0 }}
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">

                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                &nbsp;  I) Total Amount Deductable Under Any Other Provisions of Chapter VI-A 
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                 
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   {{ $other_deduction_via }}
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">

                                </td>
                            </tr>
                            <tr>
                                @php 
                                    $total_deduction = ($total_80c ?? 0 + $total_80ccc ?? 0 + $total_80ccd ?? 0 + $total_80cce ?? 0 + $total_80d ?? 0 + $total_80e ?? 0 + $total_80g ?? 0 + $total_80tta ?? 0 + $total_80ddb ?? 0 + $total_80dd ?? 0 + $total_80ccg ?? 0 + $other_deduction_via ?? 0) - $total_80c_deduction ?? 0; @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  11.
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Aggregate of Deductable Amount under Chapter VI-A [10(a) to 10(I)] 
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                              
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $total_deduction }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  12. 
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Total Taxable Income (9-11) 
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                              
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   
                                </td>
                                @php 
                                    $total_taxable_income = $gross_total_income - $total_deduction;
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                  {{ $total_taxable_income }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  13.
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Tax on Total Income
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                              
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   
                                </td>
                                @php
                                    // Tax Calculation
                                    $tax = 0;
                                    $educessRate = $incometaxRate[0]->edu_cess_rate ?? 0;

                                    foreach($incometaxRate as $rate) {
                                        $lowerSlabAmount = $rate->lower_slab_amount;
                                        $higherSlabAmount = $rate->higher_slab_amount;
                                        $taxRate = $rate->tax_rate;

                                        // tax calculation for current slab
                                        if ($total_taxable_income > $lowerSlabAmount) {
                                            $currentSlabTaxableIncome = min($total_taxable_income, $higherSlabAmount) - $lowerSlabAmount;
                                            $tax += $currentSlabTaxableIncome * ($taxRate / 100);
                                        }
                                    }
                                    // $added87aTax = $tax + $relief87A;

                                    $educess = $tax * ($educessRate / 100);

                                    // $total_tax = $added87aTax + $educess;
                                    
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $tax }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  14.
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Rebate u/s 87A , if Applicable 
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                              
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   
                                </td>
                                @php 
                                    $total_87a = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b87\s*a\b/i', $it_exemption['section']))
                                        {
                                            $total_87a += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $total_87a }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  15.
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Surcharge, Wherever Applicable 
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                              
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $surcharge }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  16.
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Health and Education Cess 
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                              
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                  {{ $educess }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  17.
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Tax Payable [ 13 + 15 + 16 - 14 ]
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                              
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   
                                </td>
                                @php 
                                    $total_tax_payable = ($tax + $surcharge + $educess) - $total_87a;
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $total_tax_payable }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  18.
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  Less: Relief u/s 89 (Attach details)
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                              
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   
                                </td>
                                @php 
                                    $total_89 = 0;
                                    foreach($member_it_exemption as $it_exemption)
                                    {
                                        if (preg_match('/\b89\s*\b/i', $it_exemption['section']))
                                        {
                                            $total_89 += $it_exemption['member_deduction'] ?? 0;
                                        }
                                    }
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $total_89 }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; width: 50px;">
                                  19.
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                                  TDS
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: none;">
                              
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: none;text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-top: none; border-bottom: none;">
                                   {{ $total_tax_payable }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: 1px solid #000; width: 50px;">
                                  20.
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: 1px solid #000;">
                                  Net Tax Payable / Refundable (17-(18+19))
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; border-left: none;
                                 border-right: none;border-top: none; border-bottom: 1px solid #000;">
                              
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: 1px solid #000; text-transform: uppercase;">
                                   
                                </td>
                                <td style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px;border-left: 1px solid #000;
                                 border-right: none; border-top: none; border-bottom: 1px solid #000; text-transform: uppercase;">
                                   
                                </td>
                                @php 
                                    $net_tax_payable = $total_tax_payable - ($total_89 + $total_tax_payable);
                                @endphp
                                <td style="font-size: 10px; line-height: 14px; font-weight: 600; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; width: 50px; border-left: 1px solid #000;
                                 border-right: 1px solid #000; border-bottom: 1px solid #000;">
                                   {{ $net_tax_payable }}
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
                                <td colspan="2"
                                    style="font-size: 14px; line-height: 18px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: none; text-decoration: underline;">
                                    Verification
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                   I, ..........................................................working in the capacity of SAO-I do hereby certify that information given above is true, complete and correct and is based on the books of account, documents, TDS statements, TDS certificates, and other available records.
                                </td>
                            </tr>
                            <tr>
                                <td style="height: 20px;"></td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; border: none; ">
                                    Place: Kochi<br>
                                    Date: {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                                </td>
                                <td style="font-size: 10px; line-height: 10px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; border: none;">
                                  (Signature of the person responsible for deduction of tax)<br>
                                  Full Name:<br>
                                  Designation:
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