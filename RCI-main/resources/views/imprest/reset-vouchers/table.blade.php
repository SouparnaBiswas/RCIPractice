@if (count($vouchers) > 0)
    @foreach ($vouchers as $key => $voucher)
        <tr>
            <td> {{ (($vouchers->currentPage()-1) * $vouchers->perPage() + $loop->index + 1) ?? 0 }}</td>
            <td>{{ $voucher->voucher_no_text ?? 'N/A'}}</td>
            <td><span class="{{ ($voucher->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($voucher->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td >
                <a data-route="{{route('imprest-reset-voucher.edit', $voucher->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
              
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $vouchers->firstItem() }} – {{ $vouchers->lastItem() }} Voucher Numbers of
                    {{$vouchers->total() }} Voucher Numbers)
                </div>
                <div>{!! $vouchers->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No Voucher Number Found</td>
    </tr>
@endif
