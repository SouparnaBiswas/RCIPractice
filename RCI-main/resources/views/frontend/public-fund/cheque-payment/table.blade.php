

@if (count($cheque_receipt_nos) > 0)
    @foreach ($cheque_receipt_nos as $key => $receipt_no)
        <tr>
            <td>{{ $receipt_no->receipt_no ?? 'N/A'}}</td>
            <td>{{ $receipt_no->amount ?? 'N/A'}}</td>
            <td>{{ $receipt_no->sr_no ?? 'N/A'}}</td>
            <td>{{ $receipt_no->fundVendor->f_name ?? 'N/A'}} {{ $receipt_no->fundVendor->l_name ?? 'N/A'}}</td>
           
            <td class="sepharate"><a data-route="{{route('cheque-payments.edit', $receipt_no->id)}}"  class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('cash-payments.delete', $cashPayment->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="5" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $cheque_receipt_nos->firstItem() }} – {{ $cheque_receipt_nos->lastItem() }} Receipt No of
                    {{$cheque_receipt_nos->total() }} Receipt No)
                </div>
                <div>{!! $cheque_receipt_nos->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="5" class="text-center">No Receipt No Found</td>
    </tr>
@endif