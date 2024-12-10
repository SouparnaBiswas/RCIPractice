@if (count($transferVouchers) > 0)
    @foreach ($transferVouchers as $key => $transferVoucher)
        <tr>
            <td>{{ ($transferVouchers->currentPage()-1) * $transferVouchers->perPage() + $loop->index + 1 }}</td>
            <td>{{ $transferVoucher->voucher_no ?? 'N/A'}}</td>
            <td>{{ $transferVoucher->voucher_date ?? 'N/A'}}</td>
            <td>{{ $transferVoucher->fromInvNo->number ?? 'N/A'}}</td>
            <td>{{ $transferVoucher->toInvNo->number ?? 'N/A'}}</td>
            
            <td class="sepharate">
                {{-- <a data-route="{{route('transfer-vouchers.edit', $transferVoucher->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a> --}}
                <a href="javascript:void(0);" class="edit_pencil edit-route print-route print-btn" id="print_id" data-id="{{ $transferVoucher->id }}"><i class="fa fa-print"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('transfer-vouchers.delete', $transferVoucher->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="6" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $transferVouchers->firstItem() }} – {{ $transferVouchers->lastItem() }} Transfer Voucher  of
                    {{$transferVouchers->total() }}Transfer Vouchers )
                </div>
                <div>{!! $transferVouchers->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="6" class="text-center">No Transfer Voucher Found</td>
    </tr>
@endif
