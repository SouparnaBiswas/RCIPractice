@if (count($penalInterests) > 0)
    @foreach ($penalInterests as $key => $penalInterest)
        <tr>
            <td> {{ ($penalInterests->currentPage()-1) * $penalInterests->perPage() + $loop->index + 1 }}</td>
            @if($penalInterest->member_id != null)
                @foreach($memberloans as $member)
                    @if($member->member_id == $penalInterest->member_id)
                        <td>{{ $member->member->name ?? 'N/A'}}</td>
                    @endif
                @endforeach
            @else
                <td>N/A</td>
            @endif
            @if($penalInterest->loan_id != null)
                @foreach($memberloans as $loan)
                    @if($loan->loan_id == $penalInterest->loan_id)
                        <td>{{ $loan->loan_name ?? 'N/A'}}</td>
                    @endif
                @endforeach
            @else
                <td>N/A</td>
            @endif
            <td>{{ $penalInterest->penal_interest ?? 'N/A' }}</td>
            {{-- <td class="sepharate"><a data-route="{{route('leave-type.edit', $penalInterest->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a> --}}
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('pm-index.delete', $penalInterest->id)}}"><i class="ti ti-trash"></i></a> --}}
            {{-- </td> --}}
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $penalInterests->firstItem() }} – {{ $penalInterests->lastItem() }} Penal Interests of
                    {{$penalInterests->total() }} Penal Interests)
                </div>
                <div>{!! $penalInterests->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No Penal Interests Found</td>
    </tr>
@endif
