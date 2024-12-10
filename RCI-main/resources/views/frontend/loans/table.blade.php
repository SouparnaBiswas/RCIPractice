@if (count($loans) > 0)
    @foreach ($loans as $key => $loan)
        <tr>
            <td> {{ ($loans->currentPage()-1) * $loans->perPage() + $loop->index + 1 }}</td>
            <td>{{ $loan->loan_name ?? 'N/A'}}</td>
            <td><span class="{{ ($loan->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($loan->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('loans.edit', $loan->id)}}" href="javascript:void(0);" class="edit_pencil edit-route-loan"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('loans.delete', $loan->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $loans->firstItem() }} – {{ $loans->lastItem() }} Loan of
                    {{$loans->total() }} Loan)
                </div>
                <div>{!! $loans->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No Loan Found</td>
    </tr>
@endif
