
<!doctype html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<body style="background: #fff;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto;">
        <tbody>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase;">
                                   DRDO.SM II
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 14px; line-height: 18px; font-weight: 600; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; text-decoration: underline;">
                                    CENTER FOR HIGH ENERGY SYSTEM & SCIENCES (CHESS),<br> VIGNYAA KANCHA POST, HYDERABAD
                                    —500069 <br>
                                    EXPENSE VOUCHER
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="height: 20px;">
                </td>
            </tr>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="font-size: 14px; line-height: 18px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                    Voucher Type<span
                                        style="border: 1px solid #000; width: 100px; height: 20px; margin-left: 10px; text-align: left;display: inline-block;">{{ $result['voucher_type'] ?? 'N/A' }}</span>
                                </td>
                                <td
                                    style="font-size: 14px; line-height: 18px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important;">
                                    Holder / Inventory No<span
                                        style="border: 1px solid #000; width: 100px; height: 20px; margin-left: 10px; text-align: left;display: inline-block;">{{ $result['inv_no'] ?? 'N/A' }}</span>
                                    </span>
                                </td>
                                <td
                                    style="font-size: 14px; line-height: 18px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; ">
                                    No of Items in Voucher<span
                                        style="border: 1px solid #000; width: 100px; height: 20px; margin-left: 10px; text-align: left;display: inline-block;">{{ count($itemCodeCounts) }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="height: 10px;">

                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 14px; line-height: 18px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important;">
                                    Voucher No<span
                                        style="border: 1px solid #000; width: 100px; height: 20px; margin-left: 10px; text-align: left;display: inline-block;">{{ $result['voucher_no'] }}</span>
                                </td>
                                <td
                                    style="font-size: 14px; line-height: 18px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important;">
                                    Voucher Date<span
                                        style="border: 1px solid #000; width: 100px; height: 20px; margin-left: 10px; text-align: left;display: inline-block;">{{ $result['voucher_date'] }}
                                    </span>
                                </td>
                                <td
                                    style="font-size: 14px; line-height: 18px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; ">
                                    Cost Center Division<span
                                        style="border: 1px solid #000; width: 100px; height: 20px; margin-left: 10px; text-align: left;display: inline-block;">HYDERABAD </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="height: 20px;">
                </td>
            </tr>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <thead>
                            <tr>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                    S L.NO
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                    ITEM CODE
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                    CHDG
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                    DESCRIPTION
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                    RATE<br>
                                    (inRs.)
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                    UM
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                    QUANTITY
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                    VALUE<br>
                                    (inRs.)
                                </th>
                                <th
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                    Remarks
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $serialNumber = 1; @endphp
                            @foreach ($result as $voucherNo => $items)
                                @if(is_array($items))
                                    @foreach ($items as $item)
                                        <tr>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                                {{ $serialNumber++ }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                                {{ $item['item_code'] }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                                {{ ' ' }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                                {{  $item['description'] }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                                {{  $item['rate'] }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                                {{  $item['uom'] }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                                {{  $item['quantity'] }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                                {{  $item['total_cost'] }}
                                            </td>
                                            <td
                                                style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase; border: 1px solid #000;">
                                                {{  $item['remarks'] }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                            
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="height: 20px;"></td>
            </tr>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important;">
                                    Certified that the above mentioned items have been used/ expended during period from ______________ to ________________
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="height: 20px;"></td>
            </tr>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase;">
                                    
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase;">
                                    Inventory Holder
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: right; padding: 0px 5px !important; margin: 0px 0px !important;">
                                    Audit Cage
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase;">
                                   
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="height: 20px; border-bottom: 2px solid #000;"></td>
            </tr>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td style="height: 20px;"></td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase;">
                                    Entered in Budget Register
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td style="height: 20px;"></td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: left; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase;">
                                    Posted in Ledger
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: center; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase;">
                                    Ledger Keeper
                                </td>
                                <td
                                    style="font-size: 10px; line-height: 14px; font-weight: 400; color: #000; text-align: end; padding: 0px 5px !important; margin: 0px 0px !important; text-transform: uppercase;">
                                    I/ C Budget
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