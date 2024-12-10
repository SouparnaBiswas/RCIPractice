<!DOCTYPE html>
<html lang="en">
<title>RCI</title>
<meta charset="utf-8" />
<head>

</head>

<body style="background: #fff">

    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto">

        <tbody>
            <tr>
                <td style="padding: 0 0px">
                    <table width="100%" cellpadding="0" cellspacing="0" align="center"
                        style="border-bottom: 1px solid #000;">
                        <tbody>
                            <tr>
                                <td style="width: 25%; text-align: left; padding-right: 70px;"> <img
                                        style="width: 35%; padding: 0px 0px 10px 0px;"
                                        src="https://excellis.co.in/rci//public/storage/logo/vdwXoIX2O0liZAlBvYhJBzcLPgg4qYLlrLnmk3Yu.png"
                                        alt=""></td>
                                <td style=" font-size: 16px;
                                line-height: 18px; width: 50%;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 0px 10px 0px;
                                ">
                                    Center For High Energy Systems and Science CHESS
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td style="padding: 20px 0px 0 0">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="top">
                        <tbody>
                            <tr valign="top">
                                <th style=" font-size: 16px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 0px 10px 0px;
                                ">
                                    No.<br>
                                    CDA HYDERABAD, <br>
                                    HYDERABAD
                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 0px 0px 10px 0px;
                                ">

                                    PRIORITY
                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000; width: 33.33%;
                                text-align: left;
                                padding: 0px 0px 10px 0px;
                                ">

                                    Unit Code : 330000110 <br>
                                    Proj. Name : {{$project->name}} <br>
                                    Bill No : {{$tadaAdv->bill_no}}<br>
                                    Indent No: 20{{time()}} <br>
                                    MO No: BUO20{{time()}} <br>
                                    Date {{date('jS F, Y')}}
                                </th>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td style="font-size: 16px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 30px 5px 0px 5px
                ">
                    Requisition for Advance
                </td>
            </tr>
            <tr>
                <td style="font-size: 16px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 30px 5px 0px 5px
                ">
                    Received from the Jt. controller of defence accounts, the sum of <span
                        style="text-decoration: underline;">Rs. {{$tadaAdv->amount_allowed}} {{\App\Helpers\Helper::convert($tadaAdv->amount_allowed)}}
                    </span> on account of TA/DA in respect of Designation {{$member['desigs']->designation}} while proceeding on
                    temporary duty to @if($data->count() > 0) {{ $data[0]->from_location }} @endif ete vide this establishment movement order No./ BUO20{{time()}} Dt.
                    {{date('jS F,Y',strtotime($tadaAdv->bill_date))}}
                </td>
            </tr>
            <tr>
                <td style="font-size: 16px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: left;
                padding: 10px 5px 0px 5px
                ">
                    (Copy attached with calculation statement) Dept Date: {{date('jS F,Y',strtotime($tadaAdv->dept_date))}} , Dep Time: {{date('jS F,Y',strtotime($tadaAdv->dept_date))}}
                </td>
            </tr>

            <tr>
                <td style="padding: 20px 0px 0 0">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="top">
                        <tbody>
                            <tr valign="top">
                                <th style=" font-size: 16px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: left;
                                padding: 0px 0px 10px 0px;
                                ">
                                    Employee Bank Details:<br>
                                    @if($memberInfo)
                                        @php
                                            $bank = DB::table('banks')->where('id',$memberInfo->bank)->get()->first();
                                        @endphp
                                        Bank Name:  @if(isset($bank)) {{$bank->bank_name}} @endif <br>
                                    @endif

                                    Bank IFSC Code: @if($memberInfo) {{$memberInfo->ifsc}} @endif<br>
                                    Account Number: @if($memberInfo) {{$memberInfo->bank_acc_no}} @endif
                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000; width: 33.33%;
                                text-align: right;
                                padding: 0px 0px 10px 0px;
                                ">

                                    Signature <br>
                                    (PIS NO: 2004AC1214) <br>
                                    {{$member['desigs']->designation}}<br>
                                    Pay Level: @if($memberPerInfo) {{$memberPerInfo->pm_level}} @endif <br>
                                    PAN Νo.: @if($memberInfo) {{$memberInfo->pan_no}} @endif <br>

                                </th>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>

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


                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 10px 0px 10px 0px;
                                ">
                                    Countersigned. <br>
                                    Mr. D. MADHU SUDAN REDDY <br>
                                    ACCOUNTS OFFICER <br>

                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000; width: 33.33%;
                                text-align: center;
                                padding: 0px 0px 10px 0px;
                                ">


                                </th>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
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


                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px; width: 33.33%;
                                font-weight: 600;
                                color: #000;
                                text-align: center;
                                padding: 10px 0px 10px 0px;
                                ">
                                    Advance for temporary duty in respect of {{$member->name}} {{$member['desigs']->designation}}

                                </th>
                                <th style=" font-size: 16px;
                                line-height: 18px;
                                font-weight: 600;
                                color: #000; width: 33.33%;
                                text-align: center;
                                padding: 0px 0px 10px 0px;
                                ">


                                </th>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td style="font-size: 16px;
                line-height: 18px;
                font-weight: 400;
                color: #000;
                text-align: center;
                padding: 30px 5px 0px 5px
                ">
                    Details of Expenditure
                </td>
            </tr>

            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr style=" border: 1px solid black;">
                                <th style=" border: 1px solid black; text-align: left; padding: 0 10px;">Recoupment bill on account TA/DA advance in R/O
                                    <br>
                                    {{$member->name}}
                                    {{$member['desigs']->designation}}
                                    alongwith movement order is submitted <br>
                                    herewith as per details given below:
                                </th>
                                <th style=" border: 1px solid black;">Food Details</th>
                                <th style=" border: 1px solid black;">Hotel Details.</th>
                                <th style=" border: 1px solid black;">Total DA</th>
                                <th style=" border: 1px solid black;">Ticket Amount</th>
                            </tr>
                            @php
                                $totalDA = 0;
                            @endphp
                            @if($data)
                                @foreach ( $data as $val)

                                @php
                                    $totalDA= $totalDA+$val->total_da;
                                @endphp
                                <tr>
                                    <td style=" border: 1px solid black; padding: 0 10px;">{{$val->from_location}} TO {{$val->to_location}}
                                    </td>
                                    <td style=" border: 1px solid black; padding: 0px 5px 0px 5px;">{{$val->food_day}} DAYS@ {{$val->food_amount}}</td>
                                    <td style=" border: 1px solid black; padding: 0px 5px 0px 5px;">{{$val->hotel_day}} DAYS@ {{$val->hotel_amount}}</td>
                                    <td style=" border: 1px solid black; padding: 0px 5px 0px 5px;">{{$val->total_da}}</td>
                                    <td style=" border: 1px solid black; padding: 0px 5px 0px 5px;">{{$val->total_da}}</td>
                                </tr>
                                @endforeach
                            @endif



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
                                text-align: left;">Total DA: {{$totalDA}} Total TA: {{$tadaAdv->amount_allowed}} <br> <br>
                                Total: (DA+TA) Rs. {{$tadaAdv->amount_allowed}} <br>


                                Grand Total: Rs. {{$tadaAdv->amount_allowed}} <br>
                                Amount in words: {{\App\Helpers\Helper::convert($tadaAdv->amount_allowed)}} <br> <br>
                                End:
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
