
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
  <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
    <tbody>
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
            <tbody>
              <tr>
                <td></td>
                <td></td>

                <td style="font-size: 14px; text-align: right; font-weight: bold;">DRDO.SM.13</td>
              </tr>
              <tr>
                <td style="font-size: 14px"></td>
                <td style="
                      text-align: center;
                      font-weight: bold;
                      font-size: 14px;
                      width: 100%;
                    ">
                  CENTER FOR HIGH ENERGY SYSTEM & SCIENCES, Hyderabad<br />
                  INVENTORY LOAN REGISTER <br>
                </td>
                <td style="font-size: 14px; text-align: right"></td>
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
                <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Sl. No.</th>
                <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Date of Issue</th>
                <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">ICC No</th>
                <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Item code</th>
                <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Nomenclature</th>
                <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Qty. Issued</th>
                <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Cost
                </th>
              <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Name of borrower</th>
              <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Sig. of borrower</th>

              <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Date of Return</th>

              <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Name & Signature of <br> Inventory/ICC Holder</th>
              <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Remarks</th>

              </tr>

              @foreach($inventory_loans as $key => $inventory_loan)
              <tr>
                <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $key+1 }}</td>
                <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $inventory_loan->date_of_issue ?? '' }}</td>
                <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $inventory_loan->itemCode->code ?? ''}}</td>
                <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $inventory_loan->inventory->number ?? '' }}</td>
                <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $inventory_loan->nomenclature ?? '' }}</td>
                <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $inventory_loan->quantity_issue ?? '' }}</td>

                <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $inventory_loan->cost ?? '' }}</td>
                <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $inventory_loan->name_of_borrower ?? '' }}</td>
                <td style="border: 1px solid #000; padding: 5px; text-align: center;"></td>
                <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $inventory_loan->date_of_return ?? '' }}</td>
                <td style="border: 1px solid #000; padding: 5px; text-align: center;"></td>
                <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $inventory_loan->remarks ?? '' }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </td>
      </tr>
      {{-- <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="margin-top: 2rem">
            <tbody>
              <tr>

                


              </tr>


              <tr>
                



              </tr>
            </tbody>
          </table>
        </td>
      </tr> --}}

    </tbody>
  </table>
</body>

</html>
