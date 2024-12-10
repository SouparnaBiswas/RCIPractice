@if (count($retirementInfos) > 0)
    @foreach ($retirementInfos as $key => $retirementInfo)
        <tr>
            <td> {{ ($retirementInfos->currentPage()-1) * $retirementInfos->perPage() + $loop->index + 1 }}</td>
            @if($retirementInfo->member_id != null)
                @foreach($members as $member)
                    @if($member->id == $retirementInfo->member_id)
                        <td>{{ $member->name ?? 'N/A'}}</td>
                    @endif
                @endforeach
            @else
                <td>N/A</td>
            @endif
            <td>{{ $retirementInfo->retirement_age ?? 'N/A' }}</td>
            <td>{{ $retirementInfo->retirement_date ?? 'N/A' }}</td>
            <td>{{ Str::ucfirst($retirementInfo->retirement_type) ?? 'N/A' }}</td>
            <td class="sepharate"><a data-route="{{route('member-retirement.edit', $retirementInfo->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('pm-index.delete', $retirementInfos->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="6" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $retirementInfos->firstItem() }} – {{ $retirementInfos->lastItem() }} Retirement Infos of
                    {{$retirementInfos->total() }} Retirement Infos)
                </div>
                <div>{!! $retirementInfos->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="6" class="text-center">No Retirement Info Found</td>
    </tr>
@endif
