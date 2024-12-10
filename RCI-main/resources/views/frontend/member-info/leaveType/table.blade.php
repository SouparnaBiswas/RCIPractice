@if (count($leaveTypes) > 0)
    @foreach ($leaveTypes as $key => $leaveType)
        <tr>
            <td> {{ ($leaveTypes->currentPage()-1) * $leaveTypes->perPage() + $loop->index + 1 }}</td>
            <td>{{ $leaveType->leave_type ?? 'N/A'}}</td>
            <td>{{ Str::upper($leaveType->leave_type_abbr) ?? 'N/A'}}</td>
            <td><span class="{{ ($leaveType->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($leaveType->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('leave-type.edit', $leaveType->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('pm-index.delete', $leaveType->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="5" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $leaveTypes->firstItem() }} – {{ $leaveTypes->lastItem() }} Leave Types of
                    {{$leaveTypes->total() }} Leave Types)
                </div>
                <div>{!! $leaveTypes->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="5" class="text-center">No Leave Type Found</td>
    </tr>
@endif
