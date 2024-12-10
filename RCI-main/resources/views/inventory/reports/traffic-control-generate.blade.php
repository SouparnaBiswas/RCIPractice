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

                                <td style="font-size: 10px; text-align: right; font-weight: bold;">DRDO.SM.01</td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px"></td>
                                <td
                                    style="
                      text-align: center;
                      font-weight: bold;
                      font-size: 10px;
                      width: 100%;
                    ">
                                    CENTER FOR HIGH ENERGY SYSTEM & SCIENCES, Hyderabad<br />
                                    TRAFFIC CONTROL REGISTER (TCR)
                                </td>
                                <td style="font-size: 10px; text-align: right"></td>
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
                                <td></td>
                                <td style="padding-top: 20px; font-weight: bold; text-align: center; ">
                                    (For items to be collected by CRDS)
                                </td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

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
                                <th rowspan="2" style="border: 1px solid #000; padding: 5px; font-size: 10px;">TCR
                                    SI.No</th>
                                <th colspan="2" style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                    LR/RR/AWB/BL/ APP/RPP</th>
                                <th rowspan="2" style="border: 1px solid #000; padding: 5px; font-size: 10px;">Name
                                    of Consignor</th>
                                <th rowspan="2" style="border: 1px solid #000; padding: 5px; font-size: 10px;">Name
                                    of Transporter/ Carrier</th>
                                <th rowspan="2" style="border: 1px solid #000; padding: 5px; font-size: 10px;">Supply
                                    order No / Contract No. / Authority & Date</th>
                                <th rowspan="2" style="border: 1px solid #000; padding: 5px; font-size: 10px;">Date
                                    of Collection of Stores</th>
                                <th rowspan="2" style="border: 1px solid #000; padding: 5px; font-size: 10px;">No. of
                                    Packages &
                                    Gross
                                    Weight</th>
                                <th rowspan="2" style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                    Condition of Package
                                </th>
                                <th rowspan="2" style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                    Freight Pre Paid/ to
                                    Pay (Amount)</th>

                                <th rowspan="2" style="border: 1px solid #000; padding: 5px; font-size: 10px;">
                                    Remarks</th>

                                <th rowspan="2" style="border: 1px solid #000; padding: 5px; font-size: 10px;">Name &
                                    Sign. Of CRDS
                                    Officer</th>

                            </tr>

                            <tr>
                                <td style="border: 1px solid #000; padding: 5px; text-align: center;">No</td>
                                <td style="border: 1px solid #000; padding: 5px; text-align: center;">Date</td>
                            </tr>
                            @if (count($trafficControls) > 0)
                                @foreach ($trafficControls as $key => $trafficControl)
                                    <tr>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;"> {{ $trafficControl->tcr_number ?? '' }}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $trafficControl->lr_rr_awb_bl_app_rpp_number ?? ''}}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $trafficControl->lr_rr_awb_bl_app_rpp_date ? date('d-m-Y', strtotime($trafficControl->lr_rr_awb_bl_app_rpp_date)) : ''}}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;"> {{$trafficControl->vendor ? $trafficControl->vendor->name : ''}}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;"> {{$trafficControl->transport ? $trafficControl->transport->name : ''}}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">   {{$trafficControl->supplyOrder ? $trafficControl->supplyOrder->order_number : ''}} & {{ $trafficControl->supplyOrder ? date('d-m-Y', strtotime($trafficControl->supplyOrder->date)) : ''}}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $trafficControl->date_of_collection_of_stores ? date('d-m-Y', strtotime($trafficControl->date_of_collection_of_stores)) : ''}}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $trafficControl->no_of_package ?? ''}} & {{ $trafficControl->gross_weight ?? ''}}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $trafficControl->condition_of_package ?? ''}}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $trafficControl->amount ?? ''}}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;">{{ $trafficControl->remarks ?? '' }}</td>
                                        <td style="border: 1px solid #000; padding: 5px; text-align: center;"></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="12" class="text-center">No Data Found</td>
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
