@if (count($memberLeaves) > 0)
    @foreach ($memberLeaves as $key => $memberLeave)
        <tr>
            <td> {{ ($memberLeaves->currentPage()-1) * $memberLeaves->perPage() + $loop->index + 1 }}</td>
            @if($memberLeave->member_id != null)
                @foreach($members as $member)
                    @if($member->id == $memberLeave->member_id)
                        <td>{{ $member->name ?? 'N/A'}}</td>
                    @endif
                @endforeach
            @else
                <td>N/A</td>
            @endif
            @if($memberLeave->leave_type_id != null)
                @foreach($leaveTypes as $leaveType)
                    @if($leaveType->id == $memberLeave->leave_type_id)
                        <td>{{ Str::upper($leaveType->leave_type_abbr) ?? 'N/A'}}</td>
                    @endif
                @endforeach
            @else
                <td>N/A</td>
            @endif
            <td>{{ $memberLeave->start_date ?? 'N/A'}}</td>
            <td>{{ $memberLeave->end_date ?? 'N/A'}}</td>
            <td>{{ $memberLeave->no_of_days ?? 'N/A'}}</td>
            <td>{{ ($memberLeave->status == 1) ? 'Approved' : (($memberLeave->status == 2) ? 'Rejected' : 'Pending') }}</td>
            <td>{{ $memberLeave->year ?? 'N/A'}}</td>
            @if($memberLeave->status != 2)
                <td class="sepharate"><a data-route="{{route('member-leaves.edit', $memberLeave->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                    {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('income-taxes.delete', $incomeTax->id)}}"><i class="ti ti-trash"></i></a> --}}
                </td>
            @endif
            {{-- <td class="sepharate"><a data-route="{{route('member-leaves.edit', $memberLeave->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a> --}}
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('income-taxes.delete', $incomeTax->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="9" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $memberLeaves->firstItem() }} – {{ $memberLeaves->lastItem() }} Leave Entry of
                    {{$memberLeaves->total() }} Leave Entry)
                </div>
                <div>{!! $memberLeaves->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="9" class="text-center">No Leave Entry Found</td>
    </tr>
@endif
