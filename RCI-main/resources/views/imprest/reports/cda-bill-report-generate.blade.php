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
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    ">
                  Bills at CDA as on {{ $report_date ?? '' }}
                </td>
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
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                  Sr No
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                  PC No
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                  Project
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                  ADV No
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                  ADV Date
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                  ADV Amt
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
                  Sett. Vr No
                </td>
                <td style="
          font-size: 10px;
          line-height: 14px;
          font-weight: 400;
          color: #000;
          text-align: left;
          padding: 0px 5px !important;
          margin: 0px 0px !important;
          border: 1px solid #000;
          height: 5px;
        ">
                  Sett. Date
                </td>
                <td style="
          font-size: 10px;
          line-height: 14px;
          font-weight: 400;
          color: #000;
          text-align: left;
          padding: 0px 5px !important;
          margin: 0px 0px !important;
          border: 1px solid #000;
          height: 5px;
        ">
                  Sett. Amt
                </td>
                <td style="
          font-size: 10px;
          line-height: 14px;
          font-weight: 400;
          color: #000;
          text-align: left;
          padding: 0px 5px !important;
          margin: 0px 0px !important;
          border: 1px solid #000;
          height: 5px;
        ">
                 CRV No
                </td>
                <td style="
          font-size: 10px;
          line-height: 14px;
          font-weight: 400;
          color: #000;
          text-align: left;
          padding: 0px 5px !important;
          margin: 0px 0px !important;
          border: 1px solid #000;
          height: 5px;
        ">
                 Firm Name
                </td>
                <td style="
          font-size: 10px;
          line-height: 14px;
          font-weight: 400;
          color: #000;
          text-align: left;
          padding: 0px 5px !important;
          margin: 0px 0px !important;
          border: 1px solid #000;
          height: 5px;
        ">
                CDA Bill No
                </td>
                <td style="
          font-size: 10px;
          line-height: 14px;
          font-weight: 400;
          color: #000;
          text-align: left;
          padding: 0px 5px !important;
          margin: 0px 0px !important;
          border: 1px solid #000;
          height: 5px;
        ">
                 CDA Bill Date
                </td>
                <td style="
          font-size: 10px;
          line-height: 14px;
          font-weight: 400;
          color: #000;
          text-align: left;
          padding: 0px 5px !important;
          margin: 0px 0px !important;
          border: 1px solid #000;
          height: 5px;
        ">
                 CDA Bill Amt
                </td>
              </tr>
            </thead>
            <tbody>
              @foreach($cda_at_bills as $key => $cda_at_bill)
              <tr>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                  1
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                  {{ $cda_at_bill->pc_no ?? '' }}
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                  {{ $cda_at_bill->project->name ?? '' }}
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                   {{ $cda_at_bill->adv_no ?? '' }}
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                   {{ $cda_at_bill->adv_date ?? '' }}
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                  {{ $cda_at_bill->adv_amount ?? '' }}
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              "> {{ $cda_at_bill->var_no ?? '' }}
                
                </td>
                <td style="
          font-size: 10px;
          line-height: 14px;
          font-weight: 400;
          color: #000;
          text-align: left;
          padding: 0px 5px !important;
          margin: 0px 0px !important;
          border: 1px solid #000;
          height: 5px;
        ">
                {{ $cda_at_bill->var_date ?? '' }}
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
                    {{ $cda_at_bill->var_amount ?? '' }}
              </td>
              <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
                {{ $cda_at_bill->crv_no ?? '' }}
              </td>
              <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
                   {{ $cda_at_bill->firm_name ?? '' }}
              </td>
              <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
                   {{ $cda_at_bill->cda_bill_no ?? '' }}
              </td>
              <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
                  {{ $cda_at_bill->cda_bill_date ?? '' }}
              </td>
              <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">{{ $cda_at_bill->cda_bill_amount ?? '' }}

              </td>
              </tr>
              @endforeach

              <tr>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
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
                      border: 1px solid #000;
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
                      border: 1px solid #000;
                      height: 5px;
                    ">
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
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
                      border: 1px solid #000;
                      height: 5px;
                    ">
                </td>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                      height: 5px;
                    ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
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
          border: 1px solid #000;
          height: 5px;
        ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
                   
              </td>
              <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">

              </td>
              <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">
                  
              </td>
              <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
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
                border: 1px solid #000;
                height: 5px;
              ">
                 Total
              </td>
              <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                border: 1px solid #000;
                height: 5px;
              ">{{ $total ?? 0}}

              </td>
              </tr>
             
    </tbody>
  </table>
</body>

</html>