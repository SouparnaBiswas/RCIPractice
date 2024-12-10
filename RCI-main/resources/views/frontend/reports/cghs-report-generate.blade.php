<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<style>
    @page {
        size: 29.7cm 42cm
    }
    .page-break{
        page-break-after: always;
    }
</style>

@php
    use App\Helpers\Helper;
@endphp

<body style="background: #fff">
    @foreach($chunkedMembers as  $chunkIndex => $chunk) 

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
                                text-align: left;
                                padding: 0px 0px 10px 0px;
                                ">
                                    Category: {{ $category->category ?? '' }}

                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 10px 0px 10px 0px;
                                ">

                                    Center for High Energy Systems & Sciences, Hyderabad <br>
                                    CGEGIS Schedule For the
                                    Month of {{ $month_name ?? '' }}-{{ $year ?? '' }}
                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000; width: 33.33%;
                                text-align: right;
                                padding: 0px 0px 10px 0px;
                                ">

                                    15/07/7824-4 23:12 PM <br>
                                    Unit Code- 330000110
                                </th>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>



            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="start">
                        <tbody>
                            <tr style=" ">
                                <th
                                    style="text-align: left;  border: 1px solid black; border-left: 0px; border-right: 0;">
                                    SL.No </th>
                                <th
                                    style="text-align: left;  border: 1px solid black;  border-left: 0px; border-right: 0;">
                                    Emp <br> No </th>
                                <th
                                    style="text-align: left;  border: 1px solid black;  border-left: 0px; border-right: 0;">
                                    Name</th>
                                <th
                                    style="  border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Desig</th>
                                <th
                                    style="  border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    NPS A/e No
                                </th>
                                <th
                                    style="  border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Date of Birth
                                </th>
                                <th
                                    style="  text-align: right; border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    CGHS</th>
                            </tr>

                            @php
                                $total = 0;
                                $grand_total = 0;
                            @endphp
                            @foreach($chunk as $member)

                            @php
                                $total += optional(Helper::getDebitDetails($member->id, $month, $year))->cghs  ?? 0;
                                $grand_total += optional(Helper::getDebitDetails($member->id, $month, $year))->cghs  ?? 0;
                            @endphp

                            <tr>
                                <td
                                    style="  border-left: 0px; border-bottom: 0px; border-bottom: 0px; padding: 0px 5px 0px 5px; border-right: 0; text-align: left;">
                                {{ $loop->iteration }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px;  border-right: 0; ">
                                    {{ $member->emp_id ?? '' }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;">
                                    {{ $member->name ?? '' }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;">
                                    {{ $member->desigs->designation ?? '' }} {{ $member->groups->value ?? '' }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;">
                                   00
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; text-align: center; border-left: 0px; border-right: 0; ">
                                    {{ $member->dob ?? '' }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: right;">
                                    {{ optional(Helper::getDebitDetails($member->id, $month, $year))->cghs ?? 'N/A' }}
                                </td>
                            </tr>

                            @endforeach

                            <tr>
                                <td colspan="6"
                                    style=" border: 1px solid black; border-bottom: 0; border-left: 0px; padding: 0px 5px 0px 5px; border-right: 0; text-align: left;">
                                    Page  {{ $chunkIndex + 1 }} Total
                                </td>
                                <td style="text-align: right; border-right: 0; border: 1px solid black; border-bottom: 0; border-right: 0; border-left: 0px;"> {{  $total ?? 0 }}</td>

                            </tr>
                            <tr>
                                <td colspan="6"
                                    style=" border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px;  border-right: 0; ">
                                    Grand Total
                                </td>
                                <td
                                    style="text-align: right; border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px;  border-right: 0; ">
                                    {{ $grand_total ?? 0 }}
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
                                <td style="font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: left;">
                                </td>
                                <td style="font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: right; padding-left: 10px;">{{ $accountant ?? '' }}
                                </td>
                            </tr>
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