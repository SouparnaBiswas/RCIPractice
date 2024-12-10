
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
                            <tr style=" padding: 0px 0px 20px 0px; text-align: right;">
                                <td> ADM/GP6.3 BFG.03 FM-02
                                </td>

                            </tr>
                            <tr style=" padding: 0px 0px 20px 0px; text-align: center;">
                                <td> <img style="width: 70px; height: 70px; padding: 0px 0px 10px 0px;"
                                        src="https://excellis.co.in/rci//frontend_assets/images/drdo-logo.png"
                                        alt=""></td>

                            </tr>
                            <tr>
                                <td style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 0px 0px 10px 0px;
                                ">

                                    Center For High Energy Systems and Science


                                </td>
                            </tr>
                            <tr>
                                <td style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 0px 5px 30px 5px;
                                margin: 0px 0px 30px 0px; ">

                                    OLD RCI UTILITY BUILDING, RCI CAMPUS, PO <br> VIGYANAKANCHA


                                </td>
                            </tr>

                            <tr>
                                <td style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 400;
                                color: #000;
                                text-align: center;
                                padding: 0px 5px 10px 5px;">

                                    Calculation Statement Showing The Recovery Made Towards GPF <br> Subscription &
                                    Advance
                                    For the Period
                                    From {{ \Carbon\Carbon::parse($start_date)->format('M') }}, {{ \Carbon\Carbon::parse($start_date)->format('Y') }} To
                                    {{ \Carbon\Carbon::parse($end_date)->format('M') }}, {{ \Carbon\Carbon::parse($end_date)->format('Y') }}
                                </td>
                            </tr>
                            <tr>
                                <td style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                text-transform: uppercase; ">
                                    CHESS OLD RCI UTILITY BUILDING, RCI CAMPUS, PO VIGYANAKANCHA
                                </td>
                            </tr>
                            <tr>
                                <td style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 400;
                                color: #000;
                                text-align: center; ">
                                    In Respect Of <strong>{{ $member->name ?? '' }} {{ $member->desigs->designation ?? '' }}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 400;
                                color: #000;
                                text-align: center;  padding: 0px 5px 30px 5px;">
                                    GPF NO: <strong>{{ $member->gpf_number ?? $member->pran_number ??  '' }}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr style=" border: 1px solid black;">
                                <th style=" border: 1px solid black;">SR.NO.</th>
                                <th style=" border: 1px solid black;">Month/Year</th>
                                <th style=" border: 1px solid black;">Subscription</th>
                                <th style=" border: 1px solid black;">Refund of Advance</th>
                            </tr>
                            @foreach ($totalGpfDetails as $gpfdetail)
                            <tr>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px;">{{ $loop->iteration }}</td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px;">{{ \Carbon\Carbon::parse($gpfdetail->created_at)->format('mY') }}</td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px;">{{ $gpfdetail->monthly_subscription ?? '' }}</td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px;">{{ $gpfdetail->refund ?? '' }}</td>
                            </tr>
                            @endforeach
                            
                            
                            <tr>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px;"></td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px;"><strong>TOTAL</strong>
                                </td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px;"><strong>{{ $total_sub_amt ?? 0 }}</strong>
                                </td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px;"><strong>{{ $total_refund ?? 0 }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table width="60%" border="0" cellpadding="0" cellspacing="0" align="left"
                        style="padding-top: 20px;">
                        <tbody>
                            <tr>
                                <td style="font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: right;">Credit Balance as per CCO-9:
                                </td>
                                <td style="font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: left; padding-left: 10px;">Rs. {{ $gpfData->closing_balance ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: right;">
                                    Grand Total:
                                </td>
                                <td style="font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: left; padding-left: 10px;">
                                @php $total_amt = ($gpfData->closing_balance ?? 0) + $total_sub_amt; @endphp
                                    Rs. {{ $total_amt ?? 0 }} /-
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: right;">
                                    Less Adv/FW taken:
                                </td>
                                <td style="font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: left; padding-left: 10px;">
                                    Rs. {{ $total_refund ?? 0 }} /-
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: right;">
                                    Net Credit as on date:
                                </td>
                                <td style="font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: left; padding-left: 10px;">
                                @php $net_amt = $total_amt - $total_refund; @endphp
                                    Rs. {{ $net_amt ?? 0 }} /-
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            @php
                    use App\Helpers\Helper;

                    $words = Helper::convert($net_amt);
            @endphp
            <tr>
                <td style="font-size: 16px;
                line-height: 18px;
                font-weight: 600;
                color: #000;
                text-align: center;
                padding: 30px 5px 0px 5px
                ">
                    (Rupees: <span style="text-decoration: underline;">{{$words}}</span>)
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding-top: 20px;">
                        <tbody>
                            <tr>
                                <td style="font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;">Center For High Energy Systems and Science <br>
                                    OLD RCI UTILITY BUILDING, RCI CAMPUS, PO <br> VIGYANAKANCHA <br>
                                    Date: {{ \Carbon\Carbon::now()->format('d-M-Y') }}
                                </td>
                                <td style="font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: right; padding-left: 10px;">{{ $accountant ?? '' }}<br>Accounts Officer<br>For
                                    Director
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