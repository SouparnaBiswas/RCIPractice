@if (count($attendances) > 0)
    @foreach ($members as $key => $member)
        <tr>
            <td>{{ ($attendances->currentPage()-1) * $attendances->perPage() + $loop->index + 1 }}</td>
            <td>{{ $member->name ?? 'N/A'}}</td>
            <td>{{ $member->desigs->designation ?? 'N/A'}}</td>
            <td>{{ $member->emp_id ?? 'N/A'}}</td>
            <td>{{ ($attendances->where('member_id', $member->id)->where('attendance_status', 'present')->count()) ?? 0}}</td>
            <td>{{ ($attendances->where('member_id', $member->id)->where('attendance_status', 'absent')->count()) ?? 0}}</td>
            <td class="sepharate"><a data-route="{{route('attendance-attendances.edit', $leave->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('income-taxes.delete', $incomeTax->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
        
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $attendances->firstItem() }} – {{ $attendances->lastItem() }} attendances of
                    {{$attendances->total() }} attendances)
                </div>
                <div>{!! $attendances->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No attendances Found</td>
    </tr>
@endif
