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
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
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
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      border-top: 1px solid #000;
                    ">
                                    CENTRE FOR HIGH ENERGY SYSTEMS & SCIENCES VIGVANANKANCIIA<br />
                                    HYDERABAD - 500 069
                                </td>
                            </tr>
                            <tr>
                              <td style="height: 20px; border-left: 1px solid;  border-right: 1px solid #000;"></td>
                          </tr>
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
                    border-left: 1px solid #000;
                    border-right: 1px solid #000;
                  ">
                                  SALARY CERTIFICATE
                              </td>
                          </tr>
                          <tr>
                            <td style="height: 20px; border-left: 1px solid;  border-right: 1px solid #000;"></td>
                        </tr>
                          <tr>
                            <td
                                style="
                  font-size: 14px;
                  line-height: 18px;
                  font-weight: 400;
                  color: #000;
                  text-align: left;
                  padding: 0px 5px !important;
                  margin: 0px 0px !important;
                   border-left: 1px solid #000;
                    border-right: 1px solid #000;
                ">
                                This is to certify that <span style="font-weight: 600 !important;">Sri/Smt {{ ucwords($member_data->name) ?? '' }},
                                {{ $member_data->desigs->designation ?? '' }}
                                ({{ $member_data->emp_id ?? '' }}) </span> is in receipt of the following Pay & Allowances for
                                the Month of {{ $month }} {{ $year }}
                            </td>
                        </tr>
                        <tr>
                          <td style="height: 20px; border-left: 1px solid;  border-right: 1px solid #000;"></td>
                      </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <thead>
                            <tr>
                                <th
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    Pay & Allowances
                                </th>
                                <th
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    Rs.
                                </th>
                                <th
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    Recoveries
                                </th>
                                <th
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    Rs.
                                </th>
                            </tr>
                        </thead>

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
                      padding: 0px 5px;
                    ">
                                    Basic
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    {{ $member_credit_data->pay ?? 0 }}
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
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    NPS Rec
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    {{ $member_debit_data->pension_rec ?? 0 }}
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
                      padding: 0px 5px;
                    ">
                                    Grade Pay
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    {{ $member_credit_data->g_pay ?? 0 }}
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
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    CGHS
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    {{ $member_debit_data->cghs ?? 0 }}
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
                      padding: 0px 5px;
                    ">
                                    Var Incr
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    {{ $member_credit_data->var_incr ?? 0 }}
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
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    CGEGIS
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    {{ $member_debit_data->cgegis ?? 0 }}
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
                      padding: 0px 5px;
                    ">
                                    DA
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    {{ $member_credit_data->da ?? 0 }}
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
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    P.Tax
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    {{ $member_debit_data->ptax ?? 0 }}
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
                      padding: 0px 5px;
                    ">
                                    HRA
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    {{ $member_credit_data->hra ?? 0 }}
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
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    I.Tax
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    {{ $member_debit_data->i_tax ?? 0 }}
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
                      padding: 0px 5px;
                    ">
                                    TPT
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    {{ $member_credit_data->tpt ?? 0 }}
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      height: 10px;
                      padding: 0px 5px;
                    ">
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
                      border: 1px solid #000;
                      height: 10px;
                      padding: 0px 5px;
                    ">
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    Gross
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      padding: 0px 5px;
                    ">
                                    @php
                                        $gross =
                                            ($member_credit_data->pay ?? 0) +
                                            ($member_credit_data->g_pay ?? 0) +
                                            ($member_credit_data->var_incr ?? 0) +
                                            ($member_credit_data->da ?? 0) +
                                            ($member_credit_data->hra ?? 0) +
                                            ($member_credit_data->tpt ?? 0);
                                    @endphp
                                    {{ $gross }}
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      height: 10px;
                      padding: 0px 5px;
                    ">
                                    Total
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                      border: 1px solid #000;
                      height: 10px;
                      padding: 0px 5px;
                    ">
                                    @php
                                        $total_recoveries =
                                            ($member_debit_data->pension_rec ?? 0) +
                                            ($member_debit_data->cghs ?? 0) +
                                            ($member_debit_data->cgegis ?? 0) +
                                            ($member_debit_data->ptax ?? 0) +
                                            ($member_debit_data->i_tax ?? 0);
                                    @endphp
                                    {{ $total_recoveries }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td style="height: 10px; border-left: 1px solid #000;"></td>
                                <td style="height: 10px; border-right: 1px solid #000;"></td>
                            </tr>
                            <tr>
                                <td
                                    style="
                      width: 50%;              
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                    ">
                                    Gross Pay
                                </td>
                                <td
                                    style="
                      width: 50%;  
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      text-transform: uppercase;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-right: 1px solid #000;
                    ">
                                    {{ $gross }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                       width: 50%;                   
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                        text-transform: uppercase;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                    ">
                                    Total Recoveries
                                </td>
                                <td
                                    style="
                       width: 50%;                   
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                        text-transform: uppercase;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-right: 1px solid #000;
                    ">
                                    {{ $total_recoveries }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="
                       width: 50%;                   
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                        text-transform: uppercase;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                     
                    ">
                                    Net Pay
                                </td>
                                <td
                                    style="
                       width: 50%;                   
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                        text-transform: uppercase;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-right: 1px solid #000;
                    ">
                                    @php
                                        $net_pay = $gross - $total_recoveries;
                                    @endphp
                                    {{ $net_pay }}
                                </td>
                            </tr>
                            <tr>
                              <td colspan="2"
                                  style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: center;
                    padding: 0px 5px 10px !important;
                    margin: 0px 0px !important;
                    border-left: 1px solid #000;
                    border-right: 1px solid #000;
                    border-bottom: 1px solid #000;
                  ">
                                  @php
                                      use App\Helpers\Helper;

                                      $words = Helper::convert($net_pay);
                                  @endphp
                                  ({{ $words }})
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
                            <td style="height: 20px;  border-left: 1px solid #000;"></td>
                            <td style="height: 20px; border-right: 1px solid #000;"></td>
                          </tr>
                            <tr>
                                <td colspan="2"
                                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 10px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                                    This Certificate is issued at the request of the individual
                                    as a statement of Pay & Allowances drawn for "". This
                                    laboratory does not undertake any responsibility for
                                    commitment, financial or otherwise entered into by the
                                    individual. Also this office will not take any
                                    responsibility for recovery / remittance of any loan
                                    installments.
                                </td>
                            </tr>
                            <tr>
                              <td style="height: 50px;  border-left: 1px solid #000;"></td>
                              <td style="height: 50px; border-right: 1px solid #000;"></td>
                            <tr>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 10px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-bottom: 1px solid #000;
                    ">
                                    Date:
                                </td>
                                <td
                                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 10px 5px !important;
                      margin: 0px 0px !important;
                      border-right: 1px solid #000;
                      border-bottom: 1px solid #000;
                    ">
                               <span style="font-size: 18px; line-height: 22px;">( {{ $accountant ?? '' }} )</span><br>
                                    Accounts Officer<br>
                                    For Director, CHESS <br>
                                    Vignyanakancha, Hyd-69<br>
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
