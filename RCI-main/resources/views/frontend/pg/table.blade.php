@if (count($pgs) > 0)
    @foreach ($pgs as $key => $pg)
        <tr>
            <td> {{ ($pgs->currentPage()-1) * $pgs->perPage() + $loop->index + 1 }}</td>
            <td>{{ $pg->value ?? 'N/A'}}</td>
            <td><span class="{{ ($pg->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($pg->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('pgs.edit', $pg->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('pgs.delete', $pg->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $pgs->firstItem() }} – {{ $pgs->lastItem() }} PGs of
                    {{$pgs->total() }} PG)
                </div>
                <div>{!! $pgs->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No PG Found</td>
    </tr>
@endif
