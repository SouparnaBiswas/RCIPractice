@if (count($member_gpfs) > 0)
    @foreach ($member_gpfs as $key => $member_gpf)
        <tr>
            <td>{{ ($member_gpfs->currentPage()-1) * $member_gpfs->perPage() + $loop->index + 1 }}</td>
            <td>{{ $member_gpf->member->name ?? 'N/A'}}</td>
            <td>{{ $member_gpf->month ?? 'N/A'}},{{ $member_gpf->year ?? 'N/A'}}</td>
            <td>{{ $member_gpf->monthly_subscription ?? 'N/A'}}</td>
            <td>{{ $member_gpf->openning_balance ?? 'N/A'}}</td>
            <td>{{ $member_gpf->closing_balance ?? 'N/A'}}</td>
            <td class="sepharate">
                <a data-route="{{route('member-gpf.edit', $member_gpf->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
            </td>
        </tr>
        
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $member_gpfs->firstItem() }} – {{ $member_gpfs->lastItem() }} attendances of
                    {{$member_gpfs->total() }} attendances)
                </div>
                <div>{!! $member_gpfs->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No attendances Found</td>
    </tr>
@endif
