@if (count($member_familys) > 0)
    @foreach ($member_familys as $key => $member_family)
        <tr>
            <td> {{ ($member_familys->currentPage()-1) * $member_familys->perPage() + $loop->index + 1 }}</td>
            <td>{{ $member_family->member->name ?? 'N/A'}}</td>
            <td>{{ $member_family->wife_hus_name ?? 'N/A'}}</td>
            <td>{{ $member_family->dob ?? 'N/A'}}</td>
            <td>{{ $member_family->work_status ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('member-family.edit', $member_family->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('loans.delete', $loan->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="6" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $member_familys->firstItem() }} – {{ $member_familys->lastItem() }} Member Family of
                    {{$member_familys->total() }} Member Family)
                </div>
                <div>{!! $member_familys->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="6" class="text-center">No Member Family Found</td>
    </tr>
@endif
