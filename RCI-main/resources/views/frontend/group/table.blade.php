@if (count($groups) > 0)
    @foreach ($groups as $key => $group)
        <tr>
            <td> {{ ($groups->currentPage()-1) * $groups->perPage() + $loop->index + 1 }}</td>
            <td>{{ $group->value ?? 'N/A'}}</td>
            <td><span class="{{ ($group->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($group->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('groups.edit', $group->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('groups.delete', $group->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $groups->firstItem() }} – {{ $groups->lastItem() }} Group of
                    {{$groups->total() }} Group)
                </div>
                <div>{!! $groups->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No Group Found</td>
    </tr>
@endif
