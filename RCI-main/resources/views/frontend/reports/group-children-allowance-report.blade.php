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
                @foreach ($members_data as $data)
                @php
                    $member = $data['member'];
                    $children = $data['children'];
                @endphp
    
                @foreach ($children as $child)
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
                  {{ $loop->iteration }}
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
                >   {{ $member->name ?? 'N/A'}}<br />
                    {{ $member->emp_id ?? 'N/A'}}<br />
                    {{ $member->desigs->designation ?? 'N/A'}}<br />
                    {{ $member->gpf_number ?? $member->pran_number ?? 'N/A'}} <br /></td>
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
                {{ $child->child_name ?? 'N/A' }}<br />
                {{ $child->child_dob ?? 'N/A'}}<br /></td>
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
                {{ $child->child_school ?? 'N/A'}}<br />
                {{ $child->child_class ?? 'N/A'}}<br />
                {{ $child->academic_year ?? 'N/A'}}<br />
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
                {{ $child->allowance_amount ?? 0}}
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
                {{ $child->allowance_amount ?? 0}}
                </td>
                </tr>
                <tr><td style="height: 10px;"></td></tr>
                @endforeach
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
                    {{ $accountant ?? ''}}<br />
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







