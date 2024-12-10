@if (count($sirs) > 0)
    @foreach ($sirs as $key => $sir)
        <tr>
            <td> {{ ($sirs->currentPage()-1) * $sirs->perPage() + $loop->index + 1 }}</td>
            <td>{{ $sir->sir_no ?? 'N/A'}}</td>
            <td>{{ $sir->sir_date ?? 'N/A'}}</td>
            <td><span class="{{ ($sir->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($sir->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('sirs.edit', $sir->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="5" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $sirs->firstItem() }} – {{ $sirs->lastItem() }} SIRs of
                    {{$sirs->total() }} SIRs)
                </div>
                <div>{!! $sirs->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="5" class="text-center">No SIRs Found</td>
    </tr>
@endif
