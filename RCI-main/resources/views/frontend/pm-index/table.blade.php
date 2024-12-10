@if (count($pm_indices) > 0)
    @foreach ($pm_indices as $key => $pm_index)
        <tr>
            <td> {{ ($pm_indices->currentPage()-1) * $pm_indices->perPage() + $loop->index + 1 }}</td>
            <td>{{ $pm_index->pmLevel->value ?? 'N/A'}}</td>
            <td>{{ $pm_index->value ?? 'N/A'}}</td>
            <td><span class="{{ ($pm_index->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($pm_index->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('pm-index.edit', $pm_index->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('pm-index.delete', $pm_index->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $pm_indices->firstItem() }} – {{ $pm_indices->lastItem() }} PM Index of
                    {{$pm_indices->total() }} PM Index)
                </div>
                <div>{!! $pm_indices->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No PM Index Found</td>
    </tr>
@endif
