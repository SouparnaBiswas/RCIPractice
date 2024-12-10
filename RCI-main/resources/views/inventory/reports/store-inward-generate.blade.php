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
      align="center"
    >
      <tbody>
        <tr>
          <td>
            <table
              width="100%"
              border="0"
              cellpadding="0"
              cellspacing="0"
              align="center"
            >
              <tbody>
                <tr>
                  <td></td>
                  <td></td>

                  <td style="font-size: 14px; text-align: right; font-weight: bold;">DRDO.SM.03</td>
                </tr>
                <tr>
                  <td style="font-size: 14px"></td>
                  <td
                    style="
                      text-align: center;
                      font-weight: bold;
                      font-size: 14px;
                      width: 100%;
                    "
                  >
                  CENTER FOR HIGH ENERGY SYSTEM & SCIENCES, Hyderabad<br />
                  STORES INWARD REGISTER (SIR)
                  </td>
                  <td style="font-size: 14px; text-align: right"></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>


        <tr>
            <td>
              <table
                width="100%"
                border="0"
                cellpadding="0"
                cellspacing="0"
                align="center"
                style="margin-top: 1rem"
              >
                <tbody>
                  <tr>
                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">SI. No</th>
                    <th   style="border: 1px solid #000; padding: 5px; font-size: 14px;">DC/ Invoice No. & Date</th>
                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">SO/Contract No. / Authority No. & Date</th>
                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">TCR No & Date (If applicable)</th>
                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Nomenclature</th>
                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Name of Consignor</th>
                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Qty Received</th>
                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Date of Receipt</th>
                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Name & Sig. of O/IC CRDS</th>
                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Remarks</th>
                    <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">RIN No & Date</th>


                  </tr>


                  @if (count($storeInward) > 0)
                  @foreach ($storeInward as $key => $storesInward)
                      <tr>
                          <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{$key + 1}}</td>
                          <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $storesInward->dc_invoice_bill_voucher_no ?? '-'}}  & {{ $storesInward->dc_invoice_bill_voucher_date ? date('d-m-Y', strtotime($storesInward->dc_invoice_bill_voucher_date)) : '-'}}</td>
                          <td style="border: 1px solid #000; padding: 5px; text-align: center;"> {{$storesInward->supplyOrder ? $storesInward->supplyOrder->order_number : '-'}} & {{ $storesInward->supplyOrder ? date('d-m-Y', strtotime($storesInward->supplyOrder->date)) : '-'}}</td>
                          <td style="border: 1px solid #000; padding: 5px; text-align: center;"> {{$storesInward->tcr_number ?? '' }} </td>
                          <td style="border: 1px solid #000; padding: 5px; text-align: center;"> {{$storesInward->nomenclature ?? '' }} </td>
                          <td style="border: 1px solid #000; padding: 5px; text-align: center;"> {{$storesInward->vendor ? $storesInward->vendor->name : '-'}} </td>
                          <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $storesInward->qty_received ?? ''}}</td>
                          <td style="border: 1px solid #000; padding: 5px; text-align: center;"> {{$storesInward->date_of_receipt ?? '' }} </td>
                          <td style="border: 1px solid #000; padding: 5px; text-align: center;"></td>
                          <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $storesInward->remarks ?? '' }}</td>
                          <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $storesInward->rin_no ?? ''}} & {{ $storesInward->rin_date ? date('d-m-Y', strtotime($storesInward->rin_date)) : 'N/A' }}</td>

                      </tr>
                      @endforeach
                  @else
                      <tr>
                          <td colspan="9"
                              style="border: 1px solid #000; padding: 5px; text-align: center;">No Data
                          </td>
                      </tr>
                  @endif
                </tbody>
              </table>
            </td>
          </tr>


      </tbody>
    </table>
  </body>
</html>
