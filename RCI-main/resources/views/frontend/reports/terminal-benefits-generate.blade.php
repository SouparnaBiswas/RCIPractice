
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
                <td style="
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
                  CALCULATION OF EL/HPL ENCASHMENT IN R/0 {{ $member->name }}, {{ $member->desigs->designation }} RETIRED ON
                  {{ \Carbon\Carbon::parse($member_retirement_info->retirement_date)->format('d/m/Y') }} @if($member_retirement_info->retirement_type == 'voluntary') UNDER {{ $retirement_type }} @endif

                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td style="height: 10px;"></td>
      </tr>
      <tr>
        <td style="padding: 0 0px">
          <table width="50%" border="0" cellpadding="0" cellspacing="0" align="left">
            <tbody>
              <tr>
                <td colspan="2" style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 5px;
                    ">
                  I. EL Encashment
                </td>
              </tr>
              <tr>
                <td style="height: 10px;"></td>
              </tr>
              <tr>
                <td style="
                width: 10%;
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 5px;
              ">
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 5px;
                    ">
                  Basic Pay
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 5px;
                    ">
                  -
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 5px;
                    ">
                  {{ $member_credit_data->pay }}
                </td>
              </tr>
              <tr>
                <td style="
                width: 10%;
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 5px;
              ">
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 5px;
                    ">
                  DA ({{ $da_percentage->percentage }})
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 5px;
              ">
                  -
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 5px;
                    ">
                  {{ $member_credit_data->da }}
                </td>
              </tr>
              <tr>
                <td style="
                width: 10%;
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 5px;
              ">
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 5px;
                    ">
                  TOTAL
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 5px;
              ">
                  -
                </td>
                @php $total_el = $member_credit_data->pay + $member_credit_data->da; @endphp
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 5px;
                    ">
                  {{ $total_el }}
                </td>
              </tr>
              <tr>
                <td style="
                width: 10%;
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 5px;
              ">
                </td>
                <td colspan="2" style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 5px;
              ">
                  No. of Days of EL = {{ $member_retirement_info->el_days }} Days
                </td>
              </tr>
              <tr>
                <td style="
                width: 10%;
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 5px;
              ">
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 5px;
                    ">
                  {{ $total_el }} x {{ $member_retirement_info->el_days }}/30
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 5px;
              ">
                  :
                </td>
                @php $el_encashment = ($total_el * $member_retirement_info->el_days) / 30; @endphp
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 5px;
                    ">
                  Rs. {{ $el_encashment }}/-
                </td>
              </tr>
              <tr>
                <td style="height: 10px;"></td>
              </tr>
              <tr>
                <td colspan="2" style="
                    font-size: 14px;
                    line-height: 18px;
                    font-weight: 600;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 5px;
                  ">
                  II. HPL Encashment
                </td>
              </tr>
              <tr>
                <td style="height: 10px;"></td>
              </tr>
              <tr>
                <td style="
              width: 10%;
              font-size: 10px;
              line-height: 14px;
              font-weight: 400;
              color: #000;
              text-align: left;
              padding: 0px 5px !important;
              margin: 0px 0px !important;
              height: 5px;
            ">
                </td>
                <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 5px;
                  ">
                  Basic Pay
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 5px;
                    ">
                  -
                </td>
                <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 5px;
                  ">
                  {{ $member_credit_data->pay }}
                </td>
              </tr>
              <tr>
                <td style="
              width: 10%;
              font-size: 10px;
              line-height: 14px;
              font-weight: 400;
              color: #000;
              text-align: left;
              padding: 0px 5px !important;
              margin: 0px 0px !important;
              height: 5px;
            ">
                </td>
                <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 5px;
                  ">
                  Half of Basic Pay
                </td>
                @php $half_of_basic_pay = $member_credit_data->pay / 2; @endphp
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 5px;
                    ">
                  -
                </td>
                <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 5px;
                  ">
                  {{ $half_of_basic_pay }}
                </td>
              </tr>
              <tr>
                <td style="
              width: 10%;
              font-size: 10px;
              line-height: 14px;
              font-weight: 400;
              color: #000;
              text-align: left;
              padding: 0px 5px !important;
              margin: 0px 0px !important;
              height: 5px;
            ">
                </td>
                <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 5px;
                  ">
                  DA ({{ $da_percentage->percentage }})
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 5px;
                    ">
                  -
                </td>
                @php $da = ($half_of_basic_pay * $da_percentage->percentage) / 100; @endphp
                <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 5px;
                  ">
                  {{ $da }}
                </td>
              </tr>
              <tr>
                <td style="
              width: 10%;
              font-size: 10px;
              line-height: 14px;
              font-weight: 400;
              color: #000;
              text-align: left;
              padding: 0px 5px !important;
              margin: 0px 0px !important;
              height: 5px;
            ">
                </td>
                <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 5px;
                  ">
                  TOTAL
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 5px;
                    ">
                  -
                </td>
                @php $total_hpl = $half_of_basic_pay + $da; @endphp
                <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 5px;
                  ">
                  {{ $total_hpl }}
                </td>
              </tr>
              <tr>
                <td style="
              width: 10%;
              font-size: 10px;
              line-height: 14px;
              font-weight: 400;
              color: #000;
              text-align: left;
              padding: 0px 5px !important;
              margin: 0px 0px !important;
              height: 5px;
            ">
                </td>
                <td colspan="2" style="
              font-size: 10px;
              line-height: 14px;
              font-weight: 400;
              color: #000;
              text-align: left;
              padding: 0px 5px !important;
              margin: 0px 0px !important;
              height: 5px;
            ">
                  No. of Days of HPL = {{ $member_retirement_info->hpl_days }} Days
                </td>
              </tr>
              <tr>
                <td style="
              width: 10%;
              font-size: 10px;
              line-height: 14px;
              font-weight: 400;
              color: #000;
              text-align: left;
              padding: 0px 5px !important;
              margin: 0px 0px !important;
              height: 5px;
            ">
                </td>
                <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 5px;
                  ">
                  {{ $total_hpl }} x {{ $member_retirement_info->hpl_days }}/30
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 5px;
                    ">
                  :
                </td>
                @php $hpl_encashment = ($total_hpl * $member_retirement_info->hpl_days) / 30; @endphp
                <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 5px;
                  ">
                  Rs. {{ $hpl_encashment }}/-
                </td>
              </tr>
              <tr>
                <td style="
              width: 10%;
              font-size: 10px;
              line-height: 14px;
              font-weight: 400;
              color: #000;
              text-align: left;
              padding: 0px 5px !important;
              margin: 0px 0px !important;
              height: 5px;
            ">
                </td>
                <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 5px;
                  ">
                  TOTAL
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 5px;
                    ">
                  =
                </td>
                <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 5px;
                  ">
                  {{ $el_encashment }}/- + {{ $hpl_encashment }}
                </td>
              </tr>
              <tr>
                <td colspan="2" style="
              width: 10%;
              font-size: 10px;
              line-height: 14px;
              font-weight: 400;
              color: #000;
              text-align: left;
              padding: 0px 5px !important;
              margin: 0px 0px !important;
              height: 5px;
            ">
                </td>
                <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 5px;
                  ">
                  =
                </td>
                @php $total_encashment = $el_encashment + $hpl_encashment; @endphp
                <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 5px;
                  ">
                  Rs. {{ $total_encashment }}/-
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
                @php 
                    use App\Helpers\Helper;

                    $words = Helper::convert($total_encashment);
                @endphp
                <td style="
            font-size: 14px;
            line-height: 18px;
            font-weight: 600;
            color: #000;
            text-align: center;
            padding: 0px 5px !important;
            margin: 0px 0px !important;
            height: 5px;
          ">
                  ({{ $words }})
                </td>
              </tr>
              <tr>
                <td style="
            font-size: 10px;
            line-height: 14px;
            font-weight: 400;
            color: #000;
            text-align: right;
            padding: 0px 5px !important;
            margin: 0px 0px !important;
            height: 5px;
          ">
                 ({{ $accountant ?? '' }})<br>
                 Accounts Officer<br>
                 Director, CHESS
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