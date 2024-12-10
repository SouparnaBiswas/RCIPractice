@if (count($member_newspapers) > 0)
    @foreach ($member_newspapers as $key => $member_newspaper)
        <tr>
            <td> {{ ($member_newspapers->currentPage()-1) * $member_newspapers->perPage() + $loop->index + 1 }}</td>
            <td>{{ $member_newspaper->member->name ?? 'N/A'}}</td>
            <td>{{ $member_newspaper->amount ?? 'N/A'}}</td>
            <td>{{ $member_newspaper->year ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('member-newspaper-allowance.edit', $member_newspaper->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('loans.delete', $loan->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="6" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $member_newspapers->firstItem() }} – {{ $member_newspapers->lastItem() }} Member Newspaper of
                    {{$member_newspapers->total() }} Member Newspaper)
                </div>
                <div>{!! $member_newspapers->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="6" class="text-center">No Member Newspaper Amount Found</td>
    </tr>
@endif
