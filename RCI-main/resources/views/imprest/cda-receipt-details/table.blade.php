@if (count($cdaReceiptDetails) > 0)
    @foreach ($cdaReceiptDetails as $key => $cdaReceiptDetail)
        <tr>
            <td> {{ ($cdaReceiptDetails->currentPage()-1) * $cdaReceiptDetails->perPage() + $loop->index + 1 }}</td>
            <td>{{ $cdaReceiptDetail->details ?? 'N/A'}}</td>
            <td><span class="{{ ($cdaReceiptDetail->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($cdaReceiptDetail->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('cda-receipt-details.edit', $cdaReceiptDetail->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('cda-receipt-details.delete', $cdaReceiptDetail->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $cdaReceiptDetails->firstItem() }} – {{ $cdaReceiptDetails->lastItem() }} Receipt Details of
                    {{$cdaReceiptDetails->total() }} Receipt Details)
                </div>
                <div>{!! $cdaReceiptDetails->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No Receipt Details Found</td>
    </tr>
@endif
