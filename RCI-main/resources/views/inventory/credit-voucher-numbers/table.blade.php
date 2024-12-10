@if (count($voucherNumbers) > 0)
    @foreach ($voucherNumbers as $key => $voucherNumber)
        <tr>
            <td> {{ ($voucherNumbers->currentPage()-1) * $voucherNumbers->perPage() + $loop->index + 1 }}</td>
            <td>{{ $voucherNumber->voucher_number ?? 'N/A'}}</td>
            <td><span class="{{ ($voucherNumber->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($voucherNumber->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('credit-voucher-numbers.edit', $voucherNumber->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('inventory-projects.delete', $voucherNumber->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $voucherNumbers->firstItem() }} – {{ $voucherNumbers->lastItem() }} Credit Voucher Numbers of
                    {{$voucherNumbers->total() }} Credit Voucher Numbers)
                </div>
                <div>{!! $voucherNumbers->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No Credit Voucher Found</td>
    </tr>
@endif
