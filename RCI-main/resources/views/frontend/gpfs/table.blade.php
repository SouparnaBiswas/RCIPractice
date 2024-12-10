@if (count($gpfs) > 0)
    @foreach ($gpfs as $key => $gpf)
        <tr>
            <td> {{ ($gpfs->currentPage()-1) * $gpfs->perPage() + $loop->index + 1 }}</td>
            <td>{{ $gpf->current_rate ?? 'N/A'}}</td>
            <td><span class="{{ ($gpf->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($gpf->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('gpfs.edit', $gpf->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $gpfs->firstItem() }} – {{ $gpfs->lastItem() }} GPF of
                    {{$gpfs->total() }} GPF)
                </div>
                <div>{!! $gpfs->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No GPF Found</td>
    </tr>
@endif
