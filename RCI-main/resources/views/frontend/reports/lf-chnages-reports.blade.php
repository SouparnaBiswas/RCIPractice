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


<body style="background: #fff">


    @php
    $grandTotal = [
    'rent' => 0,
    'elec' => 0,
    'water' => 0,
    'furn' => 0,
    'rent_arr' => 0,
    'elec_arr' => 0,
    'water_arr' => 0,
    'furn_arr' => 0,
    'cr_rent' => 0,
    'cr_elec' => 0,
    'cr_water' => 0,
    'total' => 0
    ];
    @endphp

    @foreach($chunkedMembers as $chunkIndex => $chunk)

    
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
                                    Category: {{  $category->category ?? 'N/A' }}

                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 10px 0px 10px 0px;
                                ">

                                    Center for High Energy Systems & Sciences, Hyderabad <br>
                                    LF Changes Schedule For the
                                    Month of {{  $month_name ?? 'N/A' }}-{{  $year ?? 'N/A' }}
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
                                    Q.NO
                                </th>
                                <th
                                    style="  border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Rent
                                </th>
                                <th
                                    style="  text-align: right; border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Elec</th>
                                <th
                                    style="  text-align: right; border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Water</th>
                                <th
                                    style="  text-align: right; border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Furn</th>
                                <th
                                    style="  text-align: right; border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Rent <br> Arr</th>
                                <th
                                    style="  text-align: right; border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Elee <br> Arr</th>
                                <th
                                    style="  text-align: right; border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Water <br> Arr</th>
                                <th
                                    style="  text-align: right; border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Furn <br> Arr</th>
                                <th
                                    style="  text-align: right; border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Cr <br> Arr</th>
                                <th
                                    style="  text-align: right; border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Cr <br> Elee</th>
                                <th
                                    style="  text-align: right; border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Cr <br> Water</th>
                                <th
                                    style="  text-align: right; border-bottom: 0; border: 1px solid black; border-left: 0px; border-right: 0;">
                                    Total</th>
                            </tr>


                            
                            @php
                            $pageTotal = [
                            'rent' => 0,
                            'elec' => 0,
                            'water' => 0,
                            'furn' => 0,
                            'rent_arr' => 0,
                            'elec_arr' => 0,
                            'water_arr' => 0,
                            'furn_arr' => 0,
                            'cr_rent' => 0,
                            'cr_elec' => 0,
                            'cr_water' => 0,
                            'total' => 0
                            ];
                            @endphp

                            @foreach($chunk as $key => $member)
                            @php
                            // Fetch member details, credits, and debits
                            $member_details = $member;
                            $member_credit = $member->pay ?? 0;
                            
                            $member_debit = $member->debit ?? 0;

                            // Calculate totals for this member
                            $rent = $member_debit->rent ?? 0;
                            $elec = $member_debit->elec ?? 0;
                            $water = $member_debit->water ?? 0;
                            $furn = $member_debit->furn ?? 0;
                            $rent_arr = $member_debit->rent_arr ?? 0;
                            $elec_arr = $member_debit->elec_arr ?? 0;
                            $water_arr = $member_debit->water_arr ?? 0;
                            $furn_arr = $member_debit->furn_arr ?? 0;
                            $cr_rent = $member_credit->cr_rent ?? 0;
                            $cr_elec = $member_credit->cr_elec ?? 0;
                            $cr_water = 0;
                            $total = $rent + $elec + $water + $furn + $rent_arr + $elec_arr + $water_arr + $furn_arr +
                            $cr_rent + $cr_elec + $cr_water;

                            // Update page totals
                            $pageTotal['rent'] += $rent;
                            $pageTotal['elec'] += $elec;
                            $pageTotal['water'] += $water;
                            $pageTotal['furn'] += $furn;
                            $pageTotal['rent_arr'] += $rent_arr;
                            $pageTotal['elec_arr'] += $elec_arr;
                            $pageTotal['water_arr'] += $water_arr;
                            $pageTotal['furn_arr'] += $furn_arr;
                            $pageTotal['cr_rent'] += $cr_rent;
                            $pageTotal['cr_elec'] += $cr_elec;
                            $pageTotal['cr_water'] += $cr_water;
                            $pageTotal['total'] += $total;

                            

                            // Update grand totals
                            $grandTotal['rent'] += $rent;
                            $grandTotal['elec'] += $elec;
                            $grandTotal['water'] += $water;
                            $grandTotal['furn'] += $furn;
                            $grandTotal['rent_arr'] += $rent_arr;
                            $grandTotal['elec_arr'] += $elec_arr;
                            $grandTotal['water_arr'] += $water_arr;
                            $grandTotal['furn_arr'] += $furn_arr;
                            $grandTotal['cr_rent'] += $cr_rent;
                            $grandTotal['cr_elec'] += $cr_elec;
                            $grandTotal['cr_water'] += $cr_water;
                            $grandTotal['total'] += $total;
                            @endphp
                            <tr>
                                <td
                                    style="  border-left: 0px; border-bottom: 0px; border-bottom: 0px; padding: 0px 5px 0px 5px; border-right: 0; text-align: left;">
                                    {{ $loop->iteration  }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px;  border-right: 0; ">
                                    {{ $member_details->emp_id ?? 'N/A'  }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;">
                                    {{ $member_details->name ?? 'N/A'  }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;">
                                    {{ $member_details->desigs->designation ?? 'N/A'  }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;">
                                    {{ $member_details->quater_no ?? 'No'  }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; text-align: center; border-left: 0px; border-right: 0; ">
                                {{ $rent ?? 0 }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: right;">
                                    {{ $elec ?? 0 }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;">
                                    {{ $water ?? 0 }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; text-align: center; border-left: 0px; border-right: 0; ">
                                    {{ $furn ?? 0 }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: right;">
                                    {{ $rent_arr ?? 0 }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: center;">
                                    {{ $elec_arr ?? 0 }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; text-align: center; border-left: 0px; border-right: 0; ">
                                {{  $water_arr ?? 0 }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: right;">
                                    {{  $furn_arr ?? 0 }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: right;">
                                    {{  $cr_rent ?? 0 }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: right;">
                                    {{  $cr_elec ?? 0 }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: right;">
                                    {{  $cr_water ?? 0 }}
                                </td>
                                <td
                                    style="  padding: 0px 5px 0px 5px; border-bottom: 0px; border-left: 0px; border-right: 0; text-align: right;">
                                    {{  $total ?? 0 }}
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
                                    {{  $pageTotal['rent'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-bottom: 0; border-right: 0; border-left: 0px;">
                                    {{  $pageTotal['elec'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-bottom: 0; border-right: 0; border-left: 0px;">
                                    {{  $pageTotal['water'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-bottom: 0; border-right: 0; border-left: 0px;">
                                    {{  $pageTotal['furn'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-bottom: 0; border-right: 0; border-left: 0px;">
                                    {{  $pageTotal['rent_arr'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-bottom: 0; border-right: 0; border-left: 0px;">
                                    {{  $pageTotal['elec_arr'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-bottom: 0; border-right: 0; border-left: 0px;">
                                    {{  $pageTotal['water_arr'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-bottom: 0; border-right: 0; border-left: 0px;">
                                    {{  $pageTotal['furn_arr'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-bottom: 0; border-right: 0; border-left: 0px;">
                                    {{  $pageTotal['cr_rent'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-bottom: 0; border-right: 0; border-left: 0px;">
                                    {{  $pageTotal['cr_elec'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-bottom: 0; border-right: 0; border-left: 0px;">
                                    {{  $pageTotal['cr_water'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-bottom: 0; border-right: 0; border-left: 0px;">
                                    {{  $pageTotal['total'] ?? 0 }}
                                </td>

                            </tr>

                           

                            <tr>
                                <td colspan="5"
                                    style=" border: 1px solid black; padding: 0px 5px 0px 5px; border-left: 0px;  border-right: 0; ">
                                    Grand Total
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">
                                    {{  $grandTotal['rent'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">
                                    {{  $grandTotal['elec'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">
                                    {{  $grandTotal['water'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">
                                    {{  $grandTotal['furn'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">
                                    {{  $grandTotal['rent_arr'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">
                                    {{  $grandTotal['elec_arr'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">
                                    {{  $grandTotal['water_arr'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">
                                    {{  $grandTotal['furn_arr'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">
                                    {{  $grandTotal['cr_rent'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">
                                    {{  $grandTotal['cr_elec'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">
                                    {{  $grandTotal['cr_water'] ?? 0 }}
                                </td>
                                <td
                                    style="text-align: right; border-right: 0; border: 1px solid black; border-right: 0; border-left: 0px;">
                                    {{  $grandTotal['total'] ?? 0 }}
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
                                text-align: right; padding-left: 10px;">({{ $accountant ?? '' }}) <br> Accounts Officer
                                    <br> For Director, CHESS <br>Vignyanakancha, Hyd-69
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