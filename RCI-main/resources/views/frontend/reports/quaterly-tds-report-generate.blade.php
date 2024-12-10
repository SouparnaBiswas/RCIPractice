<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />
@php
    use App\Helpers\Helper;
@endphp

<body style="background: #fff">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
        <tbody>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td style="font-size: 14px; width: 30%;"></td>
                                <td style=" text-align: center; font-weight: bold; font-size: 18px; width: 40%;">
                                    {{ isset($report_quarter) ? $report_quarter : '' }} BIN
                                    DETAILS IN R/O FINANCIAL YEAR {{ isset($report_year) ? $report_year : '' }}</td>
                                <td style="font-size: 14px; text-align: right; width: 30%;">

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center"
                        style="margin-top: 1rem;">
                        <tbody>
                            <tr>
                                <th style="border: 1px solid #000; padding: 5px; font-weight: bold;" rowspan="2">Sl.
                                    No</th>
                                <th style="border: 1px solid #000; padding: 5px; font-weight: bold;" rowspan="2">Name
                                    (S/Shri)</th>
                                <th style="border: 1px solid #000; padding: 5px; font-weight: bold;" rowspan="2">PAN
                                    NO</th>
                                @if (isset($months))
                                    @foreach ($months as $month)
                                        <th style="border: 1px solid #000; padding: 5px; font-weight: bold;">
                                            {{ $month }} - {{ substr($year, 2, 4) }}</th>
                                    @endforeach
                                @else
                                    <th style="border: 1px solid #000; padding: 5px; font-weight: bold;">-</th>
                                    <th style="border: 1px solid #000; padding: 5px; font-weight: bold;">-</th>
                                    <th style="border: 1px solid #000; padding: 5px; font-weight: bold;">-</th>
                                @endif
                                @if (isset($cap_months))
                                    @foreach ($cap_months as $month)
                                        <th style="border: 1px solid #000; padding: 5px; font-weight: bold;"
                                            colspan="2">
                                            {{ $month }}</th>
                                    @endforeach
                                @else
                                    <th style="border: 1px solid #000; padding: 5px; font-weight: bold;">-</th>
                                    <th style="border: 1px solid #000; padding: 5px; font-weight: bold;">-</th>
                                    <th style="border: 1px solid #000; padding: 5px; font-weight: bold;">-</th>
                                @endif
                            </tr>
                            <tr>
                                <td
                                    style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:16px; text-align:center; font-weight: bold;">
                                    GROSS</td>
                                <td
                                    style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:16px; text-align:center; font-weight: bold;">
                                    GROSS</td>
                                <td
                                    style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:16px; text-align:center; padding:  5px 5px; font-weight: bold;">
                                    GROSS</td>
                                <td
                                    style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:16px; text-align:center; padding:  5px 5px; font-weight: bold;">
                                    IT</td>
                                <td
                                    style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:16px; text-align:center; padding:  5px 5px; font-weight: bold;">
                                    E.Cess</td>
                                <td
                                    style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:16px; text-align:center; padding:  5px 5px; font-weight: bold;">
                                    IT</td>

                                <td
                                    style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:16px; text-align:center; padding:  5px 5px; font-weight: bold;">
                                    E.Cess</td>
                                <td
                                    style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:16px; text-align:center; padding:  5px 5px; font-weight: bold;">
                                    IT</td>
                                <td
                                    style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:16px; text-align:center; padding:  5px 5px; font-weight: bold;">
                                    E.Cess</td>



                            </tr>
                            @if (count($members) > 0)
                                @foreach ($members as $member)
                                    <tr>
                                        <td
                                            style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:14px; text-align:center; padding:  12px 5px;">
                                            {{ $loop->iteration }}</td>
                                        <td
                                            style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:14px; text-align:center; padding:  5px 5px;">
                                            {{ $member->name }}</td>
                                        <td
                                            style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:14px; text-align:left; padding:  5px 5px;">
                                            {{ isset($member->memberCoreInfo->pan_no) ? $member->memberCoreInfo->pan_no : '' }}
                                        </td>

                                        @if (isset($number_months))
                                            @foreach ($number_months as $month)
                                                <td
                                                    style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:14px; text-align:left;">
                                                    {{ isset(Helper::getTdsDetails($member->id, $month, $year)->tot_credits) ? Helper::getTdsDetails($member->id, $month, $year)->tot_credits : '-' }}
                                                </td>
                                            @endforeach
                                        @else
                                            <td
                                                style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:14px; text-align:left;">
                                            </td>
                                            <td
                                                style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:14px; text-align:right; padding:  5px 5px;">
                                            </td>
                                            <td
                                                style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:14px; text-align:center;">
                                            </td>
                                        @endif

                                        @if (isset($number_months))
                                        @foreach ($number_months as $month)
                                        <td
                                            style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:14px; text-align:center;">
                                            {{ isset(Helper::getDebitDetails($member->id, $month, $year)->i_tax) ? Helper::getDebitDetails($member->id, $month, $year)->i_tax : '-' }}
                                        </td>
                                        <td
                                            style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:14px; text-align:center;">
                                            {{ isset(Helper::getDebitDetails($member->id, $month, $year)->ecess) ? Helper::getDebitDetails($member->id, $month, $year)->ecess : '-' }}
                                        </td>
                                        @endforeach
                                    @else
                                    <td
                                    style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:14px; text-align:center;">
                                </td>
                                <td
                                    style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:14px; text-align:center;">
                                </td>
                                        <td
                                            style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:14px; text-align:center;">
                                        </td>
                                        <td
                                            style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:14px; text-align:center;">
                                        </td>
                                        <td
                                            style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:14px; text-align:right; padding:  5px 5px;">
                                        </td>
                                        <td
                                            style="border: 1px solid #000; padding: 0 5px 0 5px; font-size:14px; text-align:center;">
                                        </td>
                                        @endif

                                    </tr>
                                @endforeach

                            @else
                                <tr>
                                    <td colspan="12" style="text-align: center;">No data found</td>
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
