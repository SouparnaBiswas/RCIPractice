@if (count($divisions) > 0)
    @foreach ($divisions as $key => $division)
        <tr>
            <td> {{ ($divisions->currentPage()-1) * $divisions->perPage() + $loop->index + 1 }}</td>
            <td>{{ $division->value ?? 'N/A'}}</td>
            <td><span class="{{ ($division->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($division->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('divisions.edit', $division->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('divisions.delete', $division->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $divisions->firstItem() }} – {{ $divisions->lastItem() }} Division of
                    {{$divisions->total() }} Division)
                </div>
                <div>{!! $divisions->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No Division Found</td>
    </tr>
@endif
