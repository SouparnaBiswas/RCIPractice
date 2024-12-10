@if (count($debitVouchers) > 0)
    @foreach ($debitVouchers as $key => $debitVoucher)
        <tr>
            <td> {{ ($debitVouchers->currentPage()-1) * $debitVouchers->perPage() + $loop->index + 1 }}</td>
            <td>{{ $debitVoucher->voucher_no ?? 'N/A'}}</td>
            <td>{{ $debitVoucher->voucher_date ?? 'N/A'}}</td>
            <td>{{ $debitVoucher->voucher_type ?? 'N/A'}}</td>
            <td>{{ $debitVoucher->inventoryNumbers->number ?? 'N/A'}}</td>
            <td class="sepharate">
                {{-- <a data-route="{{route('debit-vouchers.edit', $debitVoucher->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a> --}}
                <a href="javascript:void(0);" class="edit_pencil edit-route print-route print-btn" id="print_id" data-id="{{ $debitVoucher->id }}"><i class="fa fa-print"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('debit-vouchers.delete', $debitVoucher->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $debitVouchers->firstItem() }} – {{ $debitVouchers->lastItem() }} Debit Vouchers of
                    {{$debitVouchers->total() }} Debit Vouchers)
                </div>
                <div>{!! $debitVouchers->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No Debit Vouchers Found</td>
    </tr>
@endif
