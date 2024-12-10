<!DOCTYPE html>
<html lang="en">

<style>
    @page {
        size: 29.7cm 42cm
    }
</style>

<body>
    <h2 style="
    font-size: 18px;
    line-height: 22px;
    font-weight: 600;
    color: #000;
    text-align: center;
    padding: 0px 5px !important;
    margin: 0px 0px !important;
    text-transform: uppercase;
  ">Table 5: Pay Matrix (Civilian Employees)</h2>
    <table style="width:100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
        <tr>
            <th style="border-top: 1px solid #000; border-left: 1px solid #000;border-right: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">Pay Band</th>
            @foreach($pay_bands as $pay_band)
            @php 
                $colspan = $pay_level_counts[$pay_band->id] ?? 1;
            @endphp
            <th colspan="{{ $colspan }}" style="border-top: 1px solid #000; border-right: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">  @if($pay_band->low_band !='') {{ $pay_band->low_band ?? 0}} - @endif {{ $pay_band->high_band ?? 0 }}</th>
            @endforeach
            {{-- <th colspan="5" style="border-top: 1px solid #000; border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">5200-20200</th>
            <th colspan="4" style="border-top: 1px solid #000; border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">9300-34800</th>
            <th colspan="3" style="border-top: 1px solid #000; border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">15600-39100</th>
            <th colspan="3" style="border-top: 1px solid #000; border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">37400-67000</th>
            <th style="border-top: 1px solid #000; border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">67000-79000</th>
            <th style="border-top: 1px solid #000; border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">75500-80000</th>
            <th style="border-top: 1px solid #000; border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">80000</th>
            <th style="border-top: 1px solid #000; border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">90000</th> --}}
        </tr>
        
        
        <tr>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">Grade Pay</th>
            @foreach($structuredArray['GradePay'] as $gradePay)
                <th style="border-left: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">{{ $gradePay ?? '' }}</th>
            @endforeach
            
        </tr>
        
        <tr>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">Entry Pay (EP)</th>
            @foreach($structuredArray['EntryPay'] as $entryPay)
                <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000;font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">{{ $entryPay ?? 0 }}</th>
            @endforeach
            
        </tr>
        
        
        <tr>
            <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">Level</th>
            @foreach($structuredArray['Level'] as $level)
                <th style="border-left: 1px solid #000;border-bottom: 1px solid #000; border-right: 1px solid #000;font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">{{ $level }}</th>
            @endforeach
        </tr>
        
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">Index</td>
            @foreach($structuredArray['PmIndex'] as $index)
                <td style="border-left: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000; font-size: 16px; padding:6px 5px; text-align:center; line-height: 18px; font-weight: 600; color: #000;">{{ $index }}</td>
            @endforeach
            
            
        </tr>
        <!-- Table rows start here -->
        @foreach($structuredArray['PmRow'] as $rowIndex => $pmRow)
        <tr>
            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">{{ $rowIndex + 1 }}</td>
            @foreach($pmRow as $value)
                <td style="border-left: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000; font-size: 14px; text-align:center; line-height: 16px; padding:2px; font-weight: 600; color: #000;">{{ $value }}</td>
            @endforeach
        </tr>
        @endforeach
    </table>
</body>