<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
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
                                <td></td>

                                <td style="font-size: 14px; text-align: right; font-weight: bold;">DRDO.SM.02</td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px"></td>
                                <td
                                    style="
                      text-align: center;
                      font-weight: bold;
                      font-size: 14px;
                      width: 100%;
                    ">
                                    CENTER FOR HIGH ENERGY SYSTEM & SCIENCES, Hyderabad<br />
                                    SECURITY GATE STORES ENTRY REGISTER*
                                </td>
                                <td style="font-size: 14px; text-align: right"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>


            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center"
                        style="margin-top: 1rem">
                        <tbody>
                            <tr>
                                <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">SL. No</th>
                                <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Date & Time of entry
                                </th>
                                <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">DC/Invoice/Bill
                                    /Voucher No.& Date</th>
                                <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Supply
                                    Order/Contract/Authority / Cash Purchase Authorization No.& Date</th>
                                <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Name and address of
                                    Consignor</th>

                                <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">No. of Package/Items
                                </th>
                                <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Vehicle No. (If
                                    Applicable)</th>
                                <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Remarks</th>

                                <th style="border: 1px solid #000; padding: 5px; font-size: 14px;">Signature of Security
                                    Asst</th>


                            </tr>

                            @if (count($securityGates) > 0)
                                @foreach ($securityGates as $key => $securityGate)
                                    <tr>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{$key + 1}}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $securityGate->entry_time ? date('d-m-Y h:i A', strtotime($securityGate->entry_time)) : '-'}}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $securityGate->dc_invoice_bill_voucher_no ?? '-'}}  & {{ $securityGate->dc_invoice_bill_voucher_date ? date('d-m-Y', strtotime($securityGate->dc_invoice_bill_voucher_date)) : '-'}}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;"> {{$securityGate->vendor ? $securityGate->vendor->name : '-'}} &  {{$securityGate->vendor ? $securityGate->vendor->address : '-'}}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;"> {{$securityGate->supplyOrder ? $securityGate->supplyOrder->order_number : '-'}} & {{ $securityGate->supplyOrder ? date('d-m-Y', strtotime($securityGate->supplyOrder->date)) : '-'}}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $securityGate->no_of_package ?? ''}}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $securityGate->vehicle_no ?? ''}}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $securityGate->remarks ?? '' }}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;"></td>
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
            <tr>
                <td>
                    <table style="margin-top: 8rem;" width="100%" border="0" cellpadding="0" cellspacing="0"
                        align="center">
                        <tbody>
                            <tr>


                                <td style="font-size: 14px; text-align: left; font-weight: bold;">* To be maintained by
                                    Security Personnel</td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>

        </tbody>
    </table>
</body>

</html>
