
<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<style>
  @page {
      size: 29.7cm 42cm
  }
  .page-break {
     page-break-before: always;
 }
</style>

<body style="background: #fff">
  @php
    // Initialize grand totals outside of the loop
      $grand_total_due = 0;
      $grand_total_nps = 0;
      $grand_total_eol = 0;
      $grand_total_tpt_due = 0;
      $grand_final = 0;
  @endphp
  @foreach($report as $chunkIndex => $chunkReport)
  
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
    style="border-radius: 0px; margin: 0 auto; text-align: center">
    <tbody>
      <tr>
        <td style="padding: 0 0px">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
            <tbody>
              <tr>
                <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    ">
                    PAGE NUMBER - {{ $chunkIndex + 1 }}
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
                <td style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    ">
               Center for High Energy Systems & Sciences, Hyderabad<br>
               <span style="font-size: 10px !important;
               line-height: 14px !important;">
                DA Arrears @ {{ $da_percentage_diff_heading }} % W.E From {{ \Carbon\Carbon::parse($start_date)->format('M-Y') }} To {{ \Carbon\Carbon::parse($end_date)->format('M-Y') }} in R/o NIE
               </span>
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
            <thead>
              <tr>
                <th style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                 Sl No.
                </th>
                <th style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                   Emp ID
                </th>
                <th style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                   Name Desig
                </th>
                <th style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    ">
                   Month
                </th>
                <th style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-top: 1px solid #000;
                    ">
                   Basic
                </th>
                <th style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-right: 1px solid #000;
                      border-top: 1px solid #000;
                    ">
                   GPAY
                </th>
                <th style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;   
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      text-transform: uppercase;
                    ">
                   Due
                </th>
                <th style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      text-transform: uppercase;
                    ">
                   Drawn
                </th>
                <th style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-right: 1px solid #000;
                      text-transform: uppercase;
                    ">
                    Diff
                </th>
                <th style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      text-transform: uppercase;
                    ">
                   tot
                </th>
                <th style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      text-transform: uppercase;
                    ">
                    NPS
                </th>
                <th style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      text-transform: uppercase;
                    ">
                    EOl
                </th>
                <th colspan="3" style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      text-transform: uppercase;
                    ">
                    TPT
                </th>
                <th style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      text-transform: uppercase;
                    ">
                    Final
                </th>
                <th style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      text-transform: uppercase;
                    ">
                    Remarks
                </th>
              </tr>
              <tr>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 10px;
                border-bottom: 1px solid #000;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 10px;
                border-bottom: 1px solid #000;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 10px;
                border-bottom: 1px solid #000;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 10px;
                border-bottom: 1px solid #000;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 10px;
                border-bottom: 1px solid #000;
                border-left: 1px solid #000;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 10px;
                border-bottom: 1px solid #000;
                border-right: 1px solid #000;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 10px;
                border-bottom: 1px solid #000;
                border-left: 1px solid #000;
              ">
              {{ $due_da_percentage_for_heading->percentage }}%
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: center;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 10px;
                border-bottom: 1px solid #000;
              ">
              {{ $drawn_da_percentage_for_heading->percentage }}%
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 10px;
                border-bottom: 1px solid #000;
                border-right: 1px solid #000;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 10px;
                border-bottom: 1px solid #000;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
              ">
              (A)
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 10px;
                border-bottom: 1px solid #000;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
              ">
              (B)
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 10px;
                border-bottom: 1px solid #000;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
              ">
              (C)
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 10px;
                border-bottom: 1px solid #000;
                border-left: 1px solid #000;
              ">
               Due
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 10px;
                border-bottom: 1px solid #000;
              ">
               Drawn
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 10px;
                border-bottom: 1px solid #000;
                border-right: 1px solid #000;
              ">
               Diff (D)
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 10px;
                border-bottom: 1px solid #000;
                border-right: 1px solid #000;
                border-left: 1px solid #000;
              ">
               (A-B-C+D)
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 10px;
                border-bottom: 1px solid #000;
                border-right: 1px solid #000;
                border-left: 1px solid #000;
              ">
                </td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
              ">
                </td>
              </tr>
              @foreach($chunkReport as $memberData)
              <tr>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-top: 1px solid #000;
                vertical-align: top;
              ">
              {{ $loop->iteration }}
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-top: 1px solid #000;
                vertical-align: top;
              ">
              {{ $memberData['Emp_ID'] ?? '' }}
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-top: 1px solid #000;
                vertical-align: top;
              ">
                {{ $memberData['Name'] ?? '' }}, {{ $memberData['Desig'] ?? '' }}
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-top: 1px solid #000;
                vertical-align: top;
              ">
                <table style="width: 100%; border-collapse: collapse;">
                  @foreach($memberData['monthly_data'] as $data)
                  <tr>
                      <td style="
                          font-size: 10px;
                          line-height: 14px;
                          font-weight: 400;
                          color: #000;
                          text-align: left;
                          padding: 0px 5px !important;
                          margin: 0px 0px !important;
                          height: 20px;
                      ">
                          {{ \Carbon\Carbon::parse($data['Month'])->format('M-Y') ?? '' }}
                      </td>
                  </tr>
                  @endforeach
              </table>    
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-top: 1px solid #000;
                vertical-align: top;
              ">
                {{ $memberData['Basic'] ?? 0 }}
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-right: 1px solid #000;
                border-top: 1px solid #000;
                vertical-align: top;
              ">
                {{ $memberData['GPAY'] ?? 0 }}
                </td>
                  <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 20px;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      border-top: 1px solid #000;
                  ">
                      <table style="width: 100%; border-collapse: collapse;">
                          @foreach($memberData['monthly_data'] as $data)
                              <tr>
                                  <td style="
                                      font-size: 10px;
                                      line-height: 14px;
                                      font-weight: 400;
                                      color: #000;
                                      text-align: left;
                                      padding: 0px 5px !important;
                                      margin: 0px 0px !important;
                                      height: 20px;
                                  ">
                                      {{ $data['Due'] ?? '' }}
                                  </td>
                              </tr>
                          @endforeach
                      </table>
                  </td>
                  <td style="
                        font-size: 10px;
                        line-height: 14px;
                        font-weight: 400;
                        color: #000;
                        text-align: center;
                        padding: 0px 5px !important;
                        margin: 0px 0px !important;
                        height: 20px;
                        border-left: 1px solid #000;
                        border-right: 1px solid #000;
                        border-top: 1px solid #000;
                    ">
                        <table style="width: 100%; border-collapse: collapse;">
                            @foreach($memberData['monthly_data'] as $data1)
                                <tr>
                                    <td style="
                                        font-size: 10px;
                                        line-height: 14px;
                                        font-weight: 400;
                                        color: #000;
                                        text-align: center;
                                        padding: 0px 5px !important;
                                        margin: 0px 0px !important;
                                        height: 20px;
                                    ">
                                        {{ $data1['Drawn'] ?? '' }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                  <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 20px;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      border-top: 1px solid #000;
                  ">
                      <table style="width: 100%; border-collapse: collapse;">
                          @foreach($memberData['monthly_data'] as $data)
                              <tr>
                                  <td style="
                                      font-size: 10px;
                                      line-height: 14px;
                                      font-weight: 400;
                                      color: #000;
                                      text-align: right;
                                      padding: 0px 5px !important;
                                      margin: 0px 0px !important;
                                      height: 20px;
                                  ">
                                      {{ $data['Diff'] ?? '' }}
                                  </td>
                              </tr>
                          @endforeach
                      </table>
                  </td>
                  <td style="
                  font-size: 10px;
                  line-height: 14px;
                  font-weight: 400;
                  color: #000;
                  text-align: left;
                  padding: 0px 5px !important;
                  margin: 0px 0px !important;
                  height: 20px;
                  border-left: 1px solid #000;
                  border-right: 1px solid #000;
                  border-top: 1px solid #000;
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
                      height: 20px;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      border-top: 1px solid #000;
                  ">
                      <table style="width: 100%; border-collapse: collapse;">
                        <tbody>
                          @foreach($memberData['monthly_data'] as $data)
                              <tr>
                                  <td style="
                                      font-size: 10px;
                                      line-height: 14px;
                                      font-weight: 400;
                                      color: #000;
                                      text-align: left;
                                      padding: 0px 5px !important;
                                      margin: 0px 0px !important;
                                      height: 20px;
                                  ">
                                      {{ $data['NPS'] ?? '' }}
                                  </td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table>
                  </td>
                  <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 20px;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      border-top: 1px solid #000;
                  ">
                      <table style="width: 100%; border-collapse: collapse;">
                          @foreach($memberData['monthly_data'] as $data)
                              <tr>
                                  <td style="
                                      font-size: 10px;
                                      line-height: 14px;
                                      font-weight: 400;
                                      color: #000;
                                      text-align: right;
                                      padding: 0px 5px !important;
                                      margin: 0px 0px !important;
                                      height: 20px;
                                  ">
                                      {{ $data['EOl'] ?? '' }}
                                  </td>
                              </tr>
                          @endforeach
                      </table>
                  </td>
                  <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-right: 1px solid #000;
                    border-top: 1px solid #000;
                ">
                    <table style="width: 100%; border-collapse: collapse;">
                        @foreach($memberData['monthly_data'] as $data)
                            <tr>
                                <td style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 400;
                                    color: #000;
                                    text-align: left;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                ">
                                    {{ $data['TPT_Due'] ?? '' }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </td>
                  <td style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 400;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      height: 20px;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      border-top: 1px solid #000;
                  ">
                      <table style="width: 100%; border-collapse: collapse;">
                          @foreach($memberData['monthly_data'] as $data)
                              <tr>
                                  <td style="
                                      font-size: 10px;
                                      line-height: 14px;
                                      font-weight: 400;
                                      color: #000;
                                      text-align: center;
                                      padding: 0px 5px !important;
                                      margin: 0px 0px !important;
                                      height: 20px;
                                  ">
                                      {{ $data['TPT_Drawn'] ?? '' }}
                                  </td>
                              </tr>
                          @endforeach
                      </table>
                  </td>
                  <td style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: right;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    height: 20px;
                    border-left: 1px solid #000;
                    border-right: 1px solid #000;
                    border-top: 1px solid #000;
                ">
                    <table style="width: 100%; border-collapse: collapse;">
                        @foreach($memberData['monthly_data'] as $data)
                            <tr>
                                <td style="
                                    font-size: 10px;
                                    line-height: 14px;
                                    font-weight: 400;
                                    color: #000;
                                    text-align: right;
                                    padding: 0px 5px !important;
                                    margin: 0px 0px !important;
                                    height: 20px;
                                ">
                                    {{ $data['TPT_Diff'] ?? '' }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </td>
                  <td style="
                  font-size: 10px;
                  line-height: 14px;
                  font-weight: 400;
                  color: #000;
                  text-align: left;
                  padding: 0px 5px !important;
                  margin: 0px 0px !important;
                  height: 20px;
                  border-left: 1px solid #000;
                  border-right: 1px solid #000;
                  border-top: 1px solid #000;
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
                  height: 20px;
                  border-left: 1px solid #000;
                  border-right: 1px solid #000;
                  border-top: 1px solid #000;
                ">

                  </td>
                  
                
              </tr>

              <tr>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
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
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
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
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
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
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
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
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
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
                height: 20px;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
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
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
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
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                 
                </td>
                @php  

                  $total_due = array_sum(array_column($memberData['monthly_data'], 'Diff'));
                  $total_nps = array_sum(array_column($memberData['monthly_data'], 'NPS'));
                  $total_eol = array_sum(array_column($memberData['monthly_data'], 'Eol'));
                  $total_tpt_due = array_sum(array_column($memberData['monthly_data'], 'TPT_Diff')); 

                  $final = ($total_due - $total_nps - $total_eol) + $total_tpt_due;
                @endphp
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                 
                </td>
                @php  

                  $total_due = array_sum(array_column($memberData['monthly_data'], 'Diff'));
                  $total_nps = array_sum(array_column($memberData['monthly_data'], 'NPS'));
                  $total_eol = array_sum(array_column($memberData['monthly_data'], 'Eol'));
                  $total_tpt_due = array_sum(array_column($memberData['monthly_data'], 'TPT_Diff')); 

                  $final = ($total_due - $total_nps - $total_eol) + $total_tpt_due;
                @endphp
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
                border-top: 1px solid #000;
              ">
              {{  $total_due }}   
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
                border-top: 1px solid #000;
              ">
                  {{  $total_nps }}
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
                border-top: 1px solid #000;
              ">
                 {{ $total_eol }}
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
                border-top: 1px solid #000;
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
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
                border-top: 1px solid #000;
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
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
                border-top: 1px solid #000;
              ">
                {{ $total_tpt_due }}
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
                border-top: 1px solid #000;
              ">
                 {{ $final }}
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
                border-top: 1px solid #000;
              ">

                </td>
              </tr>
              @php 
                $grand_total_due += $total_due;
                $grand_total_nps += $total_nps;
                $grand_total_eol += $total_eol;
                $grand_total_tpt_due += $total_tpt_due;

                $grand_final = ($grand_total_due - $grand_total_nps - $grand_total_eol) + $grand_total_tpt_due;
              @endphp
              @endforeach
              {{-- <tr>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
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
                height: 20px;
                border-bottom: 1px solid #000;
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
                height: 20px;
                border-bottom: 1px solid #000;
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
                height: 20px;
                border-bottom: 1px solid #000;
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
                height: 20px;
                border-bottom: 1px solid #000;
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
                height: 20px;
                border-bottom: 1px solid #000;
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
                height: 20px;
                border-bottom: 1px solid #000;
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
                height: 20px;
                border-bottom: 1px solid #000;
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
                height: 20px;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                 
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
              6752   
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                  0
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                 0
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-bottom: 1px solid #000;
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
                height: 20px;
                border-bottom: 1px solid #000;
              ">
                 
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                576
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">
                 7328
                </td>
                <td style="
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">

                </td>
              </tr> --}}
            </tbody>
          </table>
        </td>
      </tr>
      
              @if (!$loop->last)
                  <div class="page-break"></div>
              @endif
              @endforeach
              <tr>
                <td>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
                    <tbody>
                      <tr>
                        <td style="
                        font-size: 10px;
                        line-height: 14px;
                        font-weight: 600;
                        color: #000;
                        text-align: left;
                        padding: 0px 5px !important;
                        margin: 0px 0px !important;
                        height: 20px;
                        border-left: 1px solid #000;
                        border-bottom: 1px solid #000;
                      ">
                      Grand Total
                        </td>
                        
                        <td style="
                        font-size: 10px;
                        line-height: 14px;
                        font-weight: 400;
                        color: #000;
                        text-align: left;
                        padding: 0px 5px !important;
                        margin: 0px 0px !important;
                        height: 20px;
                        border-bottom: 1px solid #000;
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
                        height: 20px;
                        border-bottom: 1px solid #000;
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
                        height: 20px;
                        border-bottom: 1px solid #000;
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
                        height: 20px;
                        border-bottom: 1px solid #000;
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
                        height: 20px;
                        border-bottom: 1px solid #000;
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
                        height: 20px;
                        border-bottom: 1px solid #000;
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
                        height: 20px;
                        border-bottom: 1px solid #000;
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
                        height: 20px;
                        border-right: 1px solid #000;
                        border-bottom: 1px solid #000;
                      ">
                        
                        </td>
                        <td style="
                        font-size: 10px;
                        line-height: 14px;
                        font-weight: 600;
                        color: #000;
                        text-align: right;
                        padding: 0px 5px !important;
                        margin: 0px 0px !important;
                        height: 20px;
                        border-left: 1px solid #000;
                        border-right: 1px solid #000;
                        border-bottom: 1px solid #000;
                        width:30px;
                      ">
                      {{  $grand_total_due }}   
                        </td>
                        <td style="
                        font-size: 10px;
                        line-height: 14px;
                        font-weight: 600;
                        color: #000;
                        text-align: right;
                        padding: 0px 5px !important;
                        margin: 0px 0px !important;
                        height: 20px;
                        border-left: 1px solid #000;
                        border-right: 1px solid #000;
                        border-bottom: 1px solid #000;
                        width:34px;
                      ">
                          {{ $grand_total_nps }}
                        </td>
                        <td style="
                        font-size: 10px;
                        line-height: 14px;
                        font-weight: 600;
                        color: #000;
                        text-align: right;
                        padding: 0px 5px !important;
                        margin: 0px 0px !important;
                        height: 20px;
                        border-left: 1px solid #000;
                        border-right: 1px solid #000;
                        border-bottom: 1px solid #000;
                        width:34px;
                      ">
                        {{ $grand_total_eol }}
                        </td>
                        <td style="
                        font-size: 10px;
                        line-height: 14px;
                        font-weight: 400;
                        color: #000;
                        text-align: left;
                        padding: 0px 5px !important;
                        margin: 0px 0px !important;
                        height: 20px;
                        border-left: 1px solid #000;
                        border-right: 1px solid #000;
                        border-bottom: 1px solid #000;
                        width:41px;
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
                        height: 20px;
                        border-right: 1px solid #000;
                        border-bottom: 1px solid #000;
                        width:41px;
                      ">
                        
                        </td>
                        <td style="
                        font-size: 10px;
                        line-height: 14px;
                        font-weight: 600;
                        color: #000;
                        text-align: right;
                        padding: 0px 5px !important;
                        margin: 0px 0px !important;
                        height: 20px;
                        border-right: 1px solid #000;
                        border-bottom: 1px solid #000;
                        width:44px;
                      ">
                        {{  $grand_total_tpt_due }}
                        </td>
                        <td style="
                        font-size: 10px;
                        line-height: 14px;
                        font-weight: 600;
                        color: #000;
                        text-align: right;
                        padding: 0px 5px !important;
                        margin: 0px 0px !important;
                        height: 20px;
                        border-left: 1px solid #000;
                        border-right: 1px solid #000;
                        border-bottom: 1px solid #000;
                        width:63px;
                      ">
                        {{  $grand_final }}
                        </td>
                        <td style="
                        font-size: 10px;
                        line-height: 14px;
                        font-weight: 400;
                        color: #000;
                        text-align: left;
                        padding: 0px 5px !important;
                        margin: 0px 0px !important;
                        height: 20px;
                        border-left: 1px solid #000;
                        border-right: 1px solid #000;
                        border-bottom: 1px solid #000;
                        width:67px;
                      ">

                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
      <tr>
        <td style="height: 40px;"></td>
      </tr>
      <tr>
        <td style="padding: 0 0px">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="right">
            <tbody>
              <tr>
                <td style="
                       font-size: 12px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    ">
                (D MADHU SUDAN REDDY) <br>
                Accounts Officer <br>
                For Director, CHESS <br>
                Vignyanakancha, Hyd-69 
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