
<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<style>
    @page {
        size: 29.7cm 42cm
    }
</style>

<body style="background: #fff">
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
                    PAGE NUMBER - 1
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
                DA Arrears @ {{ $da_percentage_diff_heading }} % W.E For {{ \Carbon\Carbon::parse($start_date)->format('M-Y') }}  To {{ \Carbon\Carbon::parse($end_date)->format('M-Y') }} in R/o NIE
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
              {{ $due_da_percentage_for_heading->percenntage }}%
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
              @foreach ($report as $data)
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
                ">
                {{ $data['Sl_No'] }}
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
                {{ $data['Emp_ID'] }}
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
             {{ $data['Name'] }} , {{ $data['Desig'] }}
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
              @php $month = $data['Month']; @endphp
                {{ \Carbon\Carbon::parse($month)->format('M') }}    
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
              ">
                {{ $data['Basic'] }}
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
              ">
                {{ $data['GPAY'] }}
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
              ">
                {{ $data['Due'] }}
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
                border-top: 1px solid #000;
              ">
                 {{ $data['Drawn'] }}
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
              ">
                 {{ $data['Diff'] }}
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
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-top: 1px solid #000;
              ">
                  {{ $data['NPS'] }}
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
                 {{ $data['EOl'] }}
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
              ">
                   {{ $data['TPT_Due'] }}
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
                border-top: 1px solid #000;
              ">
                 {{ $data['TPT_Drawn'] }}
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
              ">
               {{ $data['TPT_Diff'] }}    
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
              @endforeach
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
                font-weight: 400;
                color: #000;
                text-align: right;
                padding: 0px 5px !important;
                margin: 0px 0px !important;
                height: 20px;
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
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
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
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
              ">

                </td>
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
                border-right: 1px solid #000;
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
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
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