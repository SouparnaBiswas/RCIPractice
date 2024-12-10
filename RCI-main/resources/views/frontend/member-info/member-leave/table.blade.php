@if (count($leaves) > 0)
    @foreach ($members as $key => $member)
        <tr>
            <td> {{ ($leaves->currentPage()-1) * $leaves->perPage() + $loop->index + 1 }}</td>
            <td>{{ $member->name ?? 'N/A'}}</td>
            <td>
                Allotted
                <hr />
                Taken
                <hr />
                Remaining
            </td>
            @foreach($leaveTypes as $leaveType)
            <td>
                {{ $allotedLeaves->where('member_id', $member->id)->where('leave_type_id', $leaveType->id)->first()->alloted_leaves ?? 0 }}
                <hr />
                {{ $leaves->where('member_id', $member->id)->where('leave_type_id', $leaveType->id)->where('status', 1)->sum('no_of_days') ?? 0 }}
                <hr />
                {{ (($allotedLeaves->where('member_id', $member->id)->where('leave_type_id', $leaveType->id)->first()->alloted_leaves ?? 0) - ($leaves->where('member_id', $member->id)->where('leave_type_id', $leaveType->id)->where('status', 1)->sum('no_of_days') ?? 0)) ?? 0 }}
            </td>
            @endforeach
            <td>{{ $leaves->where('member_id', $member->id)->where('status', 1)->sum('no_of_days') ?? 0 }}</td>
            {{-- <td class="sepharate"><a data-route="{{route('member-leaves.edit', $leave->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a> --}}
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('income-taxes.delete', $incomeTax->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    
        
    @endforeach
    <tr class="toxic">
        <td colspan="8" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $leaves->firstItem() }} – {{ $leaves->lastItem() }} leaves of
                    {{$leaves->total() }} leaves)
                </div>
                <div>{!! $leaves->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="8" class="text-center">No leaves Found</td>
    </tr>
@endif
