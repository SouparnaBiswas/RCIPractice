<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<style>
    .page-break {
       page-break-before: always;
   }
</style>

@php
use App\Helpers\Helper;
@endphp

<body style="background: #fff">

    @foreach($chunkedMembers as $chunkIndex => $chunk)
    @php
        $total_itax = 0;
        $total_ecess = 0;
    @endphp

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
                                    Category: {{  $category->category ?? '' }}

                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 10px 0px 10px 0px;
                                ">
                                    Center for High Energy Systems & Sciences, Hyderabad <br>
                                    I.Tax Recovery Schedule For the
                                    Month of {{ $month_name ?? '' }}-{{ $year ?? 'N/A' }}
                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000; width: 33.33%;
                                text-align: right;
                                padding: 0px 0px 10px 0px;
                                ">

                                    15/07/7824-4 24:36 PM <br>
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
                                    style="text-align: left;  border: 1px solid black; border-left: 0px; border-right: 0;font-size: 16px;">
                                    SL.No </th>
                                <th
                                    style="text-align: left;  border: 1px solid black;  border-left: 0px; border-right: 0;font-size: 16px;">
                                    Emp <br> No </th>
                                <th
                                    style="text-align: left;  border: 1px solid black;  border-left: 0px; border-right: 0;font-size: 16px;">
                                    Name</th>
                                <th
                                    style="  border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;font-size: 16px;">
                                    Desig</th>
                                <th
                                    style="  border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;font-size: 16px;">
                                    PAN
                                </th>
                                <th
                                    style="  border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;font-size: 16px;">
                                    I.Tax
                                </th>
                                <th
                                    style="  text-align: right; border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;font-size: 16px;">
                                    E.Cess</th>
                            </tr>
                           

                            @foreach($chunk as $key => $member)
                            @php
                               
                                
                                $memberCoreInfo = Helper::getMemberCoreInfo($member->id, $month, $year);
                                $itax = $memberCoreInfo ? $memberCoreInfo->i_tax : 0;
                                $ecess = $memberCoreInfo ? $memberCoreInfo->ecess : 0;

                                $total_itax += $itax;
                                $total_ecess += $ecess;
                            @endphp
                            <tr>
                                <td
                                    style="  border-left: 0px; border-bottom: 0px; border-bottom: 0px; padding: 0px 5px 0px 5px; border-right: 0; text-align: left;font-size: 16px;">
                                    {{  $key + 1 }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px;  border-right: 0;font-size: 16px; ">
                                    {{ $member->emp_id ?? 'N/A' }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;font-size: 16px;">
                                    {{ $member->name ?? 'N/A' }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;font-size: 16px;">
                                    {{ $member->desigs->designation ?? 'N/A' }} {{ $member->groups->value ?? 'N/A' }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;font-size: 16px;">
                                    {{ optional(Helper::getMemberCoreInfo($member->id, $month, $year))->pan_no ?? '0' }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; text-align: center; border-left: 0px; border-right: 0; font-size: 16px;">
                                    {{ optional(Helper::getMemberCoreInfo($member->id, $month, $year))->i_tax ?? '0' }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: right;font-size: 16px;">
                                    {{ optional(Helper::getMemberCoreInfo($member->id, $month, $year))->ecess ?? '0' }}
                                </td>
                            </tr>
                            @endforeach
                            
                            <tr>
                                <td colspan="5"
                                    style=" border: 1px solid black; border-bottom: 0; border-left: 0px; padding: 0px 5px 0px 5px; border-right: 0; text-align: left;">
                                    Page {{ $chunkIndex + 1 }} Total
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-bottom: 0; border-right: 0; border-left: 0px;">
                                    {{ number_format($total_itax, 2) }}</td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-bottom: 0; border-right: 0; border-left: 0px;">
                                    {{ number_format($total_ecess, 2) }}</td>

                            </tr>

                            
                            <tr>
                                <td colspan="5"
                                    style=" border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px;  border-right: 0; ">
                                    Grand Total
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">
                                    {{ number_format($total_itax, 2) }}</td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">
                                    {{ number_format($total_ecess, 2) }}</td>

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
                                text-align: right; padding-left: 10px;">{{  $accountant ?? '' }}<br> Accounts Officer 
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