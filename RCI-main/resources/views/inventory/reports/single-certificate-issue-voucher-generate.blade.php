
<!DOCTYPE html>
<html lang="en">
<title>RCI-Certificate Issue Voucher</title>
<meta charset="utf-8" />

<body style="background: #fff">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
    <tbody>
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
            <tbody>
              <tr>
                <td></td>

                <td style="font-size: 12px; text-align: right; font-weight: bold;">DRDO.SM.36
                </td>
              </tr>
              <tr>
                <td style="font-size: 12px"></td>
                <td style="
                      text-align: center;
                      font-weight: bold;
                      font-size: 12px;
                      width: 100%;
                    ">
                  (CENTER FOR HIGH ENERGY SYSTEM & SCIENCES) <br>
                  Certified Issue Voucher (CIV)
                </td>
                <td style="font-size: 12px; text-align: right"></td>
              </tr>

            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding-top: 20px;">
            <tbody>
              <tr>
                <td style="font-size: 12px;  width: 70%;
                        line-height: 16px;
                        font-weight: 400;
                        color: #000; padding-bottom: 10px;
                        text-align: left;">Group/Division :......... <br> <br>
                  Date: {{ $certificateIssueVoucher->voucher_date ? date('d-m-Y', strtotime($certificateIssueVoucher->voucher_date)) : '' }}
                </td>
                <td valign="top" style="font-size: 12px; width: 30%;
                        line-height: 16px; 
                        font-weight: 400;
                        color: #000;
                        text-align: left; padding-left: 10px; padding-bottom: 10px;">
                  Voucher No.{{  $certificateIssueVoucher->voucher_no ?? '' }}  <br>
                  ICC No.:  {{  $certificateIssueVoucher->inventory->number ?? '' }}
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>

      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="margin-top: 2rem">
            <tbody>
              <tr>
                <th valign="top"
                  style="border: 1px solid #000; padding: 5px; font-size: 12px; text-align: left; font-weight: 600;">
                  S.No
                </th>
                <th valign="top"
                  style="border: 1px solid #000; padding: 5px; font-size: 12px; text-align: left; font-weight: 600;">
                  Item Code
                </th>
                <th valign="top"
                  style="border: 1px solid #000; padding: 5px; font-size: 12px; text-align: left; font-weight: 600;">
                  Nomenclature
                </th>
                <th valign="top"
                  style="border: 1px solid #000; padding: 5px; font-size: 12px; text-align: left; font-weight: 600;">
                  A/U
                </th>
                <th valign="top"
                  style="border: 1px solid #000; padding: 5px; font-size: 12px; text-align: left; font-weight: 600;">
                  Quantity <br> Issued
                </th>
                <th valign="top"
                  style="border: 1px solid #000; padding: 5px; font-size: 12px; text-align: left; font-weight: 600;">
                  Total Cost <br> (Including Tax)
                </th>
                <th valign="top"
                  style="border: 1px solid #000; padding: 5px; font-size: 12px; text-align: left; font-weight: 600;">
                  Ledger & <br> Page No.
                </th>
                <th valign="top"
                  style="border: 1px solid #000; padding: 5px; font-size: 12px; text-align: left; font-weight: 600;">
                  Remarks
                </th>

              </tr>
              @foreach($certificateIssuevoucherDetails as $certificateIssuevoucherDetail)
              <tr>

                <td valign="top" style="border: 1px solid black; padding: 10px 5px 10px 5px; font-size: 10px;">
                 {{ $loop->iteration }}
                </td>
                <td valign="top" style="border: 1px solid black; padding: 10px 5px 10px 5px; font-size: 10px;">
                    {{ $certificateIssuevoucherDetail->item->code ?? '' }}
                </td>
                <td valign="top" style="border: 1px solid black; padding: 10px 5px 10px 5px; font-size: 10px;">
                    {{ $certificateIssuevoucherDetail->item->description ?? '' }}
                </td>
                <td valign="top" style="border: 1px solid black; padding: 10px 5px 10px 5px; font-size: 10px;">
                  {{  $certificateIssuevoucherDetail->au_status ?? '' }}
                </td>
                <td valign="top" style="border: 1px solid black; padding: 10px 5px 10px 5px; font-size: 10px;">
                  {{  $certificateIssuevoucherDetail->quantity ?? '' }}
                </td>
                <td valign="top" style="border: 1px solid black; padding: 10px 5px 10px 5px; font-size: 10px;">
                  {{  $certificateIssuevoucherDetail->total_price ?? '' }}
                </td>
                <td valign="top" style="border: 1px solid black; padding: 10px 5px 10px 5px; font-size: 10px;">
                  {{  $certificateIssueVoucher->inventory->number ?? '' }}
                </td>
                <td valign="top" style="border: 1px solid black; padding: 10px 5px 10px 5px; font-size: 10px;">
                  {{  $certificateIssuevoucherDetail->remarks ?? '' }}
                </td>

              </tr>
              @endforeach
              
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding-top: 20px;">
            <tbody>
              <tr>
                <td style="font-size: 12px;
                        line-height: 16px; width: 50%;
                        font-weight: 400;
                        color: #000;
                        text-align: left; padding-left: 10px; padding-bottom: 80px;">This is certified that the items mentioned above have
                  been issued to authorized employees as per the enclosed list (if applicable as per provisions of
                  13.4.2 of SMG 2023)
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding-top: 20px;">
            <tbody>
              <tr>
                <td  style="font-size: 12px;
                        line-height: 16px; width: 50%;
                        font-weight: 400;
                        color: #000;
                        text-align: left; padding-left: 10px;">Signature & Name of Inventory/ICC Holder
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding-top: 20px;">
            <tbody>
              <tr>
                <td style="font-size: 12px;
                        line-height: 16px; width: 33%;
                        font-weight: 400;
                        color: #000;
                        text-align: left; padding-left: 10px;">
                </td>
                <td valign="top" style="font-size: 12px;
                        line-height: 16px; width: 33%;
                        font-weight: 400;
                        color: #000;
                        text-align: center; padding-left: 10px;">Signature of Head MMG
                </td>
                <td valign="top" style="font-size: 12px; width: 33%;
                line-height: 16px; font-weight: 400;                
                padding: 10px 30px 30px 30px;
                color: #000;
                text-align: left; padding-left: 10px; border: 1px solid #000; height: 80px;">
                  Item(s) strike off charge from issuing ledger (s).
                  <br><br><br><br>
                  <span style="text-align: right; display: block; font-size: 12px;">O/IC Ledger Section</span>
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