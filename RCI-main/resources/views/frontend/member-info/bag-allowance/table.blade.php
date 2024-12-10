@if (count($member_bag_purses) > 0)
    @foreach ($member_bag_purses as $key => $member_bag_purse)
        <tr>
            <td> {{ ($member_bag_purses->currentPage()-1) * $member_bag_purses->perPage() + $loop->index + 1 }}</td>
            <td>{{ $member_bag_purse->member->name ?? 'N/A'}}</td>
            <td>{{ $member_bag_purse->year ?? 'N/A'}}</td>
            <td>{{ $member_bag_purse->entitle_amount ?? 'N/A'}}</td>
            <td>{{ $member_bag_purse->bill_amount ?? 'N/A'}}</td>
            <td>{{ $member_bag_purse->net_amount ?? 'N/A'}}</td>
            <td>{{ $member_bag_purse->remarks ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('member-bag-allowance.edit', $member_bag_purse->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('loans.delete', $loan->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="8" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $member_bag_purses->firstItem() }} – {{ $member_bag_purses->lastItem() }} Member Newspaper of
                    {{$member_bag_purses->total() }} Member Newspaper)
                </div>
                <div>{!! $member_bag_purses->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="8" class="text-center">No Member Newspaper Amount Found</td>
    </tr>
@endif
