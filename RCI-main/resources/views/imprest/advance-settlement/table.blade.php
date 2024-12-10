

@if (count($advance_settlements) > 0)
    @foreach ($advance_settlements as $key => $advance_settlement)
        <tr>
            
            <td>{{ $advance_settlement->adv_no }}</td>
            <td>{{ $advance_settlement->adv_date }}</td>
            <td>{{ $advance_settlement->adv_amount }}</td>
            <td>{{ $advance_settlement->project->name }}</td>
            <td>{{ $advance_settlement->var_no }}</td>
            <td>{{ $advance_settlement->var_date }}</td>
            <td class="sepharate"><a  href="{{route('advance-settlement.edit', $advance_settlement->id)}}" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="advance-sttl-delete" class="delete" data-route="{{ route('advance-settlement.delete', $advance_settlement->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $advance_settlements->firstItem() }} – {{ $advance_settlements->lastItem() }} Advance Settlement of
                    {{$advance_settlements->total() }} Advance Settlement)
                </div>
                <div>{!! $advance_settlements->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No Advance Settlement Found</td>
    </tr>
@endif