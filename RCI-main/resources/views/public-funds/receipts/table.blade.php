@if (count($receipts) > 0)
    @foreach ($receipts as $key => $receipt)
        <tr>
            <td> {{ ($receipts->currentPage()-1) * $receipts->perPage() + $loop->index + 1 }}</td>
            <td>{{ $receipt->receipt_no ?? 'N/A'}}</td>
            <td>{{ $receipt->receipt_type ?? 'N/A'}}</td>
            <td>{{ $receipt->vr_no ?? 'N/A'}}</td>
            <td>{{ $receipt->vr_date ?? 'N/A'}}</td>
            <td>{{ $receipt->amount ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('receipts.edit', $receipt->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('quarters.delete', $quarter->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $receipts->firstItem() }} – {{ $receipts->lastItem() }} Receipts of
                    {{$receipts->total() }} Receipts)
                </div>
                <div>{!! $receipts->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No Receipts Found</td>
    </tr>
@endif
