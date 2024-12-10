@if (count($payCommissions) > 0)
    @foreach ($payCommissions as $key => $payCommission)
        <tr>
            <td> {{ ($payCommissions->currentPage()-1) * $payCommissions->perPage() + $loop->index + 1 }}</td>
            <td>{{ $payCommission->name ?? 'N/A'}}</td>
            <td>{{ $payCommission->year ?? 'N/A'}}</td>
            <td><span class="{{ ($payCommission->is_active == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($payCommission->is_active == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('pay-commissions.edit', $payCommission->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('pay-commissions.delete', $payCommission->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="5" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $payCommissions->firstItem() }} – {{ $payCommissions->lastItem() }} Pay Commissions of
                    {{$payCommissions->total() }} Pay Commissions)
                </div>
                <div>{!! $payCommissions->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="5" class="text-center">No Pay Commissions Found</td>
    </tr>
@endif
