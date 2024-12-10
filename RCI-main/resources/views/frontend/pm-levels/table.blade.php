@if (count($pm_levels) > 0)
    @foreach ($pm_levels as $key => $pm_level)
        <tr>
            <td> {{ ($pm_levels->currentPage()-1) * $pm_levels->perPage() + $loop->index + 1 }}</td>
            <td>{{ $pm_level->value ?? 'N/A'}}</td>
            <td>{{ $pm_level->entry_pay ?? 'N/A'}}</td>
            <td>{{ $pm_level->year ?? 'N/A'}}</td>
            <td><span class="{{ ($pm_level->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($pm_level->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('pm-levels.edit', $pm_level->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('pm-levels.delete', $pm_level->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $pm_levels->firstItem() }} – {{ $pm_levels->lastItem() }} PM Level of
                    {{$pm_levels->total() }} PM Level)
                </div>
                <div>{!! $pm_levels->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No PM Level Found</td>
    </tr>
@endif
