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

@php
    use App\Helpers\Helper;
@endphp


<body style="background: #fff">

    @foreach($chunkedMembers as $members)

    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto">

        <tbody>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>

                            <tr>
                                <th style=" font-size: 16px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 0px 0px 10px 0px;
                                ">


                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 10px 0px 10px 0px;
                                ">

                                    ANNEXURE-II (NEW PENSION SCHEME) RECOVERY OF
                                    MONTHLY CONTRIBUTION <br>
                                    NPS Schedule For the Month of {{ $month_name ?? '' }}-{{ $year ?? '' }}
                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000; width: 33.33%;
                                text-align: right;
                                padding: 0px 0px 10px 0px;
                                ">

                                    15/07/2024 4:17:34 PM
                                </th>
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
                                <td style="font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: left; padding-bottom: 30px;">Category: <br>
                                    OFFICE: DRDO <br>
                                    DDO/Unit Code-330000110 <br>
                                    FIN-Year: {{  $financial_year ?? 'N/A' }} <br>
                                    DA Rate: {{  $da ?? 'N/A' }}%
                                </td>
                                <td style="font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: right; padding-left: 10px;">UNIT: CHESS, Hyderabad <br>
                                    PAO-CODE: 2000025 <br>
                                    Month: {{ $month_name ?? '' }}-{{ $year ?? '' }} <br>
                                    NPA Rate: NIL
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
                                <th style=" border: 1px solid black; border-bottom: 0; border-bottom: 0; border-left: 0px; border-right: 0;">SL.No </th>
                                <th style=" border: 1px solid black; border-bottom: 0; border-left: 0px; border-right: 0;">Emp No </th>
                                <th style=" border: 1px solid black; border-bottom: 0; border-left: 0px; border-right: 0;">Name</th>
                                <th style=" border: 1px solid black; border-bottom: 0; border-left: 0px; border-right: 0;">Desig</th>
                                <th style=" border: 1px solid black; border-bottom: 0; border-left: 0px; border-right: 0;">Pay in <br> PB
                                </th>
                                <th style=" border: 1px solid black; border-bottom: 0; border-left: 0px; border-right: 0;">Grade <br> Pay
                                </th>
                                <th style=" border: 1px solid black; border-bottom: 0; border-left: 0px; border-right: 0;">DA</th>
                                <th style=" border: 1px solid black; border-bottom: 0; border-left: 0px; border-right: 0;">Tot Sal</th>
                                <th style=" border: 1px solid black; border-bottom: 0; border-left: 0px; border-right: 0;">PRAN</th>
                                <th style=" border: 1px solid black; border-bottom: 0; border-left: 0px; border-right: 0;">TIER 1<br>
                                    (Sub)</th>
                                <th style=" border: 1px solid black; border-bottom: 0; border-left: 0px; border-right: 0;">TIER 1<br>
                                    (Arr)</th>
                                <th style=" border: 1px solid black; border-bottom: 0; border-left: 0px; border-right: 0;">TIER 2</th>
                                <th style=" border: 1px solid black; border-bottom: 0; border-left: 0px; border-right: 0;">Govt. <br> Cont
                                </th>
                                <th style=" border: 1px solid black; border-bottom: 0; border-left: 0px; border-right: 0;">Total</th>
                            </tr>

                            @foreach($members as $key => $member)

                            @php
                                $total_sal = optional(Helper::getCreditDetails($member->id, $month, $year))->pay + optional(Helper::getCreditDetails($member->id, $month, $year))->g_pay;
                                $total = optional(Helper::pensionInfo($member->id, $month, $year))->npsc_sub_amt + optional(Helper::pensionInfo($member->id, $month, $year))->npsg_sub_amt;
                            @endphp
                            <tr>
                                <td style=" border: 1px solid black; border-left: 0px; padding: 0px 5px 0px 5px; border-right: 0; text-align: center;">{{ $key + 1 }}</td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px;  border-right: 0; ">{{  $member->emp_id ?? 'N/A' }}</td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px; border-right: 0; text-align: center;">{{  $member->name ?? 'N/A' }}
                                </td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px; border-right: 0; text-align: center;">{{  $member->desigs->designation ?? 'N/A' }} {{  $member->groups->value ?? 'N/A' }}
                                </td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px; border-right: 0; text-align: center;">{{ optional(Helper::getCreditDetails($member->id, $month, $year))->pay ?? 'N/A' }}
                                </td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px; border-right: 0; ">{{ optional(Helper::getCreditDetails($member->id, $month, $year))->g_pay ?? 'N/A' }}
                                </td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px; text-align: center; border-right: 0; ">
                                    {{ optional(Helper::getCreditDetails($member->id, $month, $year))->da ?? 'N/A' }}</td>
                                <td
                                    style=" border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px; border-right: 0;  text-align: center;">
                                    {{ $total_sal ?? 'N/A' }}</td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px; border-right: 0; ">{{  $member->pran_number ?? 'N/A' }}</td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px; border-right: 0; ">{{ optional(Helper::pensionInfo($member->id, $month, $year))->npsc_sub_amt ?? 'N/A' }}</td>
                                <td
                                    style=" border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px; border-right: 0;  text-align: center">
                                    0</td>
                                <td
                                    style=" border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px; border-right: 0;  text-align: center">
                                    0</td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px; border-right: 0; ">{{ optional(Helper::pensionInfo($member->id, $month, $year))->npsg_sub_amt ?? '0' }}</td>
                                <td style=" border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px; border-right: 0; ">{{  $total ?? 0 }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </td>
            </tr>

        </tbody>

    </table>

    @if (!$loop->last)
    <div class="page-break"></div>
    @endif
    @endforeach


</body>

</html>