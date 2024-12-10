

@if (count($cdaReceipts) > 0)
    @foreach ($cdaReceipts as $key => $cdaReceipt)
        <tr>
            
            <td>{{ $cdaReceipt->voucher_no }}</td>
            <td>{{ date('d M, Y', strtotime($cdaReceipt->voucher_date)) }}</td>
            <td>{{ $cdaReceipt->cheq_no }}</td>
            <td>{{ date('d M, Y', strtotime($cdaReceipt->cheq_date)) }}</td>
            <td>{{ $cdaReceipt->amount }}</td>
            <td>{{ $cdaReceipt->cdaReceiptDetails->details }}</td>
            <td class="sepharate"><a data-route="{{route('cda-receipts.edit', $cdaReceipt->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('cda-receipts.delete', $cdaReceipt->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $cdaReceipts->firstItem() }} – {{ $cdaReceipts->lastItem() }} CDA Receipts of
                    {{$cdaReceipts->total() }} CDA Receipts)
                </div>
                <div>{!! $cdaReceipts->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No CDA Receipt Found</td>
    </tr>
@endif