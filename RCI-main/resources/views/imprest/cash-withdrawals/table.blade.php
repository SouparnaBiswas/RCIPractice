@if (count($cashWithdrawals) > 0)
    @foreach ($cashWithdrawals as $key => $cashWithdrawal)
        <tr>
            <td>{{ $cashWithdrawal->vr_no ?? 'N/A'}}</td>
            <td>{{ $cashWithdrawal->vr_date ?? 'N/A'}}</td>
            <td>{{ $cashWithdrawal->chq_no ?? 'N/A'}}</td>
            <td>{{ $cashWithdrawal->chq_date ?? 'N/A'}}</td>
            <td>{{ $cashWithdrawal->amount ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('cash-withdrawals.edit', $cashWithdrawal->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('cash-withdrawals.delete', $cashWithdrawal->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="9" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $cashWithdrawals->firstItem() }} – {{ $cashWithdrawals->lastItem() }} CDA Bills of
                    {{$cashWithdrawals->total() }} CDA Bills)
                </div>
                <div>{!! $cashWithdrawals->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="9" class="text-center">No CDA Bills Found</td>
    </tr>
@endif
