@if (count($creditVouchers) > 0)
    @foreach ($creditVouchers as $key => $creditVoucher)
        <tr>
            <td> {{ ($creditVouchers->currentPage()-1) * $creditVouchers->perPage() + $loop->index + 1 }}</td>
            
            <td>{{ $creditVoucher->voucher_no ?? 'N/A'}}</td>
            <td>{{ $creditVoucher->voucher_date ?? 'N/A'}}</td>
            {{-- <td>{{ $creditVoucher->total_price ?? 'N/A'}}</td>
            <td>{{ $creditVoucher->quantity ?? 'N/A'}}</td> --}}
            <td class="sepharate">
                {{-- <a data-route="{{route('credit-vouchers.edit', $creditVoucher->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a> --}}
                <a href="javascript:void(0);" class="edit_pencil edit-route print-route print-btn" id="print_id" data-id="{{ $creditVoucher->id }}"><i class="fa fa-print"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('credit-vouchers.delete', $creditVoucher->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $creditVouchers->firstItem() }} – {{ $creditVouchers->lastItem() }} Credit Vouchers of
                    {{$creditVouchers->total() }} Credit Vouchers)
                </div>
                <div>{!! $creditVouchers->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No Credit Vouchers Found</td>
    </tr>
@endif
