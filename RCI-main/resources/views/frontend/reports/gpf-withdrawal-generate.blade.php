
<!DOCTYPE html>
<html lang="en">
  <title>RCI</title>
  <meta charset="utf-8" />

  <body style="background: #fff">
    <table
      width="100%"
      border="0"
      cellpadding="0"
      cellspacing="0"
      bgcolor="#ffffff"
      style="border-radius: 0px; margin: 0 auto"
    >
      <tbody>
        <tr>
          <td style="padding: 0 0px">
            <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              align="center"
            >
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
                    "
                  >
                    CENTRE FOR HIGH ENERGY SYSTEMS & SCIENCES <br />
                    OLD RCI UTIl,17 Y BUILDING, RCI CAMPUS, PO <br />
                    VIGYANAKANCHA
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
            <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              align="center"
            >
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
                    "
                  >
                    Emp Code
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    {{ $member->emp_id ?? '' }}
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
                    "
                  >
                    Name of the Subscriber
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    {{ $member->name ?? '' }}
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
                    "
                  >
                    Account No
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    {{ $member_core_data->gpf_acc_no ?? '' }}
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
                    "
                  >
                    Designation
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    {{ $member->desigs->designation ?? '' }}
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
                    "
                  >
                    Pay in Pay Matrix
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    Rs. {{ $member_credit_data->tot_credits ?? '' }} /-
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
                    "
                  >
                    Date of Birth
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    {{ \Carbon\Carbon::parse($member->dob)->format('d M Y') ?? '' }}
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
                    "
                  >
                    Date of Appointment
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    {{ \Carbon\Carbon::parse($member->doj_lab)->format('d M Y') ?? '' }}
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
                    "
                  >
                    Date of Superannuation
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    {{ \Carbon\Carbon::parse($member->dob)->addYears(60)->format('d M Y') ?? '' }}
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
                    "
                  >
                    Balance at Credit of the Subscriber on the date of
                    application
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
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
                    "
                  >
                    i) Closing balance as per statement for the year {{  \Carbon\Carbon::now()->subYear()->format('Y') ?? '' }}
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    Rs. {{ $gpf_data->closing_balance ?? 0 }} /-
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
                    "
                  >
                    ii) Credit from <b>Mar {{ \Carbon\Carbon::parse($month)->format('Y') ?? '' }}</b> to <b>{{ \Carbon\Carbon::parse($month)->format('M Y') ?? '' }}</b> On account of monthly subscription
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    Rs. {{ $total_sub_amt ?? 0 }} /-
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
                    "
                  >
                    iii) Refund of Adv. from <b>MAR {{ \Carbon\Carbon::parse($month)->format('Y') ?? '' }}</b> to <b>{{ \Carbon\Carbon::parse($month)->format('M Y') ?? '' }}</b> @ Rs. p.m.
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    Rs. {{ $total_refund ?? 0 }} /-
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
                    "
                  >
                    iv) Net balance at credit on the date of application
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    Rs. {{ $total_refund + $total_sub_amt }} /-
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
                    "
                  >
                    Amount of withdrawal and purpose for which the withdrawal
                    was taken and when
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
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
                    "
                  >
                    i) Amount of withdrawal
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    Rs. {{ $received_amount ?? '' }} /-
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
                    "
                  >
                    ii )Purpose for which the withdrawal was required
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    {{ $reason ?? '' }}
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
                    "
                  >
                    iii)Date on which the withdrawal was applied
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    {{ \Carbon\Carbon::parse($apply_date)->format('d M Y') ?? '' }} By Director
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
                      height:20px;
                    "
                  >
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height:20px;
                    "
                  >
                  </td>
                </tr>

                <tr>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    Amount of withdrawal required
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    Rs. {{ $required_amount ?? '' }} /-
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
                    "
                  >
                    i )Purpose for which the withdrawal is required
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    {{ $reason ?? '' }}
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
                    "
                  >
                    ii)Date by which the withdrawal is required
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    {{ \Carbon\Carbon::parse($required_date)->format('d-M-Y') ?? '' }}
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td style="height:50px;"></td>
        </tr>
        <tr>
          <td style="padding: 0 0px">
            <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              align="center"
            >
              <tbody>
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
                    "
                  >
                    Date: {{ \Carbon\Carbon::now()->format('d-M-Y') ?? '' }}
                  </td>
                  <td
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 10px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    (Sign of the applicant) <br />
                    {{ $member->name ?? '' }} <br />
                    {{ $member->desigs->designation ?? '' }}
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
