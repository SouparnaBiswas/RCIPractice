<!DOCTYPE html>
<html lang="en">
  <title>RCI</title>
  <meta charset="utf-8" />
  

  <style>
        .page-break {
            page-break-before: always;
        }
  </style>

  <body style="background: #fff">
    <table
      width="100%"
      border="0"
      cellpadding="0"
      cellspacing="0"
      bgcolor="#ffffff"
      style="border-radius: 0px; margin: 0 auto; text-align: center"
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
                    "
                  >
                    Claim on Accounts of Children Education Allowance in <br />
                    Respect of CHESS
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
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
              <thead>
                <tr>
                  <th
                    style="
                      width: 50px;
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: none;
                    "
                  >
                    Sr No.
                  </th>
                  <th
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: none;
                    "
                  >
                    Emp Name<br />
                    Emp Code<br />
                    Rank <br />
                    GPFNO/PRAN
                  </th>
                  <th
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: none;
                    "
                  >
                    Child Name<br />
                    Child DOB
                  </th>
                  <th
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: none;
                    "
                  >
                    School Name<br />
                    Class Name <br />
                    Academic Year
                  </th>
                  <th
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: none;
                    "
                  >
                    Amt(Rs.)
                  </th>
                  <th
                    style="
                      font-size: 10px;
                      line-height: 14px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: none;
                    "
                  >
                    Total
                  </th>
                </tr>
              </thead>
              <tr><td style="height: 10px;"></td></tr>
              <tbody>
                @foreach($children as $key => $child)
              
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
                    border: none;
                  "
                >
                {{ $key +1 }}
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
                    border: none;
                  "
                >   {{ $member_detail->name ?? 'N/A'}}<br />
                    {{ $member_detail->emp_id ?? 'N/A'}}<br />
                    {{ $member_detail->desigs->designation ?? 'N/A'}}<br />
                    {{ $member_detail->gpf_number ?? $member_detail->pran_number ?? 'N/A'}} <br /></td>
                <td
                  style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    border: none;
                  "
                >  
                {{ $child['child_name'] ?? 'N/A'}}<br />
                {{ $child['child_dob'] ?? 'N/A'}}<br /></td>
                <td
                  style="
                    font-size: 10px;
                    line-height: 14px;
                    font-weight: 400;
                    color: #000;
                    text-align: left;
                    padding: 0px 5px !important;
                    margin: 0px 0px !important;
                    border: none;
                  "
                >
                {{ $child['child_scll_name'] ?? 'N/A'}}<br />
                {{ $child['child_class'] ?? 'N/A'}}<br />
                {{ $child['child_academic'] ?? 'N/A'}}<br />
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
                    border: none;
                  "
                >
                {{ $child['child_amount'] ?? 0}}
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
                    border: none;
                  "
                >
                {{ $child['child_amount'] ?? 0}}
                </td>
                </tr>
                @endforeach

                
              </tbody>
            </table>
          </td>
        </tr>
        <tr style="height: 20px"></tr>
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
                    "
                  >
                    Net Amount Payable RS. {{$total ?? 0}}
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
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    The Income Tax on the Bill will be consolidated along with
                    income tax of other Bills and the same will be recoverd
                    subsequently remaining regular pay hills of this financial
                    year.
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
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    {{ $accountant ?? 'N/A' }}<br />
                    ACCOUNTS OFFICER<br />
                    ForDirector
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


<div class="page-break"></div>


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
      style="border-radius: 0px; margin: 0 auto; text-align: center"
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
                    "
                  >
                    Center For High Energy Systems and Science
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
                    "
                  >
                    Unit Code: 3300000110
                  </td>
                </tr>
                <tr>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                    "
                  >
                    {{ $member_detail->emp_id ?? 'N/A'}}
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
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 400;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      text-transform: uppercase;
                    "
                  >
                    To<br />
                    CDA<br />
                    HYDRABAD<br />
                    HYDRABAD<br />
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
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
                      width: 100px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Total Rupees
                  </td>
                  <td
                    style="
                      width: 100px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Rs. {{ $total ?? 0 }} / -
                  </td>
                  <td colspan="4">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                      <tbody>
                        <tr>
                          <td colspan="4" style="font-size: 14px; line-height: 18px; font-weight: 600; color: #000; text-align: left; padding: 0px 5px !important;      margin: 0px 0px !important; border: 1px solid #000;">
                            Claim on Account of Reimbursement of Children Education
                            Allowance in Respect of
                          </td>
                        </tr>
                  <tr>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Emp Name
                  </td>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Child Name
                  </td>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    GPF/PRAN
                  </td>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Academic Year
                  </td>
                </tr>
                @foreach($children as $key => $child)
                <tr>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >{{ $member_detail->name ?? 'N/A' }}</td>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >{{ $child['child_name'] ?? 'N/A'}}</td>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                 {{ $member_detail->pran_number ?? $member_detail->gpf_number ?? 'N/A' }}
                  </td>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                  {{ $child['child_academic'] ?? 'N/A'}}<br />
                  </td>
                </tr>
                @endforeach
                
                      </tbody>
                    </table>
                  </td>
                  
                </tr>
                
                <tr>
                  <td
                    colspan="2"
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                   
                  </td>
                  <td
                    colspan="4"
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Bill No : {{ $bill_no ?? 0 }} Date : {{ $today ?? 'N/A' }}
                  </td>
                </tr>
                <tr>
                  <td
                    colspan="2"
                    style="
                      height: 100px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Cheque may be issued in favour of officers
                  </td>
                  <td
                    colspan="4"
                    style="
                      height: 100px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: right;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Signature
                  </td>
                </tr>
                <tr>
                  <td
                    colspan="6"
                    style="
                      height: 100px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-top: 1px solid #000;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    "
                  >
                    For the use of CDA HYDERABAD Office
                  </td>
                </tr>
                <tr>
                  <td
                    colspan="6"
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    "
                  >
                    Bill is passed for Rs.
                  </td>
                </tr>
                <tr>
                  <td
                    colspan="6"
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                    "
                  >
                    Rupees
                  </td>
                </tr>
                <tr>
                  <td
                    colspan="6"
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-left: 1px solid #000;
                      border-right: 1px solid #000;
                      border-bottom: 1px solid #000;
                    "
                  >
                    for payment as under.
                  </td>
                </tr>
                <tr>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Treasury
                  </td>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Name of Payee
                  </td>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Amount of cheque
                  </td>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Name & date of cheque
                  </td>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Initial of SO (A) I Supdt 'D' Section
                  </td>
                  <td
                    style="
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  >
                    Initials of Officer I/o 'D' Section
                  </td>
                </tr>
                <tr>
                  <td
                    style="
                      height: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  ></td>
                  <td
                    style="
                      height: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  ></td>
                  <td
                    style="
                      height: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  ></td>
                  <td
                    style="
                      height: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  ></td>
                  <td
                    style="
                      height: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  ></td>
                  <td
                    style="
                      height: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: left;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border: 1px solid #000;
                    "
                  ></td>
                </tr>
                <tr>
                  <td
                    colspan="2"
                    style="
                      height: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-bottom: 1px solid #000;
                      border-left: 1px solid #000;
                    "
                  >
                    Sr. Auditor
                  </td>
                  <td
                    colspan="2"
                    style="
                      height: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-bottom: 1px solid #000;
                    "
                  >
                    SO (A) AA0
                  </td>
                  <td
                    colspan="2"
                    style="
                      height: 50px;
                      font-size: 14px;
                      line-height: 18px;
                      font-weight: 600;
                      color: #000;
                      text-align: center;
                      padding: 0px 5px !important;
                      margin: 0px 0px !important;
                      border-bottom: 1px solid #000;
                      border-right: 1px solid #000;
                    "
                  >
                    AO / Sr. AO
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


