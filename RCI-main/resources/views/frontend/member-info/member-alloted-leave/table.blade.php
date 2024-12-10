@if (count($allotedLeaves) > 0)
    @foreach ($allotedLeaves as $key => $allotedLeave)
        <tr>
            <td> {{ ($allotedLeaves->currentPage()-1) * $allotedLeaves->perPage() + $loop->index + 1 }}</td>
            @if($allotedLeave->member_id != null)
                @foreach($members as $member)
                    @if($member->id == $allotedLeave->member_id)
                        <td>{{ $member->name ?? 'N/A'}}</td>
                    @endif
                @endforeach
            @else
                <td>N/A</td>
            @endif
            @if($allotedLeave->leave_type_id != null)
                @foreach($leaveTypes as $leaveType)
                    @if($leaveType->id == $allotedLeave->leave_type_id)
                        <td>{{ Str::upper($leaveType->leave_type_abbr) ?? 'N/A'}}</td>
                    @endif
                @endforeach
            @else
                <td>N/A</td>
            @endif
            <td>{{ $allotedLeave->alloted_leaves ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('member-alloted-leave.edit', $allotedLeave->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('income-taxes.delete', $incomeTax->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="8" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $allotedLeaves->firstItem() }} – {{ $allotedLeaves->lastItem() }} alloted leaves of
                    {{$allotedLeaves->total() }} alloted leaves)
                </div>
                <div>{!! $allotedLeaves->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="8" class="text-center">No Alloted Leave Found</td>
    </tr>
@endif
