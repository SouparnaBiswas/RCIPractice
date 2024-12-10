
<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />

<style>
      .page-break {
            page-break-before: always;
        }
    </style>

<body style="background: #fff">

    @foreach($groupedData as $key => $inventoryNumbers)

    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto">

        <tbody>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr style=" padding: 0px 0px 20px 0px; text-align: right; font-weight: 600;">
                                <td> DRDO.SM.11
                                </td>
                            </tr>

                            <tr>
                                <td style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 0px 0px 10px 0px;
                                ">

                                CENTER FOR HIGH ENERGY SYSTEM & SCIENCES, Hyderabad


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

                                    REGISTER FOR RECORD OF INVENTORIES (ICC)


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
                                <th style=" border: 1px solid black; padding: 5px;">Sl. No.</th>
                                <th style=" border: 1px solid black; padding: 5px;">Inventory (ICC) No.</th>
                                <th style=" border: 1px solid black; padding: 5px;">Inventory Creation Date</th>
                                <th style=" border: 1px solid black; padding: 5px;">Name of the Inventory Holder</th>
                                <th style=" border: 1px solid black; padding: 5px;">Date taken over</th>
                                <th style=" border: 1px solid black; padding: 5px;">Signature of Inventory/ ICC Holder</th>
                                <th style=" border: 1px solid black; padding: 5px;">Signature of O i/c Ledger Section</th>
                                <th style=" border: 1px solid black; padding: 5px;">Remarks</th>
                            </tr>
                            @foreach($inventoryNumbers as $keyval => $inventoryNumber)
                            <tr>
                                <td style=" border: 1px solid black; padding: 5px;">{{ $keyval + 1 }}</td>
                                <td style=" border: 1px solid black; padding: 5px;">{{ $inventoryNumber['number'] ?? '' }}</td>
                                <td style=" border: 1px solid black; padding: 5px;">{{ $inventoryNumber['created_at'] ?? '' }}</td>
                                <td style=" border: 1px solid black; padding: 5px;">{{ $inventoryNumber['member']['user_name'] ?? '' }}</td>
                                <td style=" border: 1px solid black; padding: 5px;"></td>
                                <td style=" border: 1px solid black; padding: 5px;"></td>
                                <td style=" border: 1px solid black; padding: 5px;"></td>
                                <td style=" border: 1px solid black; padding: 5px;">{{ $inventoryNumber['remarks'] ?? '' }}</td>
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
