@if (count($members) > 0)
    @foreach ($members as $key => $member)
        <tr>
            <td>{{$member->name ?? 'N/A'}}</td>
            <td>{{$member->emp_id ?? 'N/A'}}</td>
            <td>{{$member->gender ?? 'N/A'}}</td>
            <td>{{$member->pers_no ?? 'N/A'}}</td>
            <td>{{ $member->designation->designation_type ?? 'N/A' }}</td>
            <td class="sepharate"><a  href="{{ route('members.edit', $member->id)}}" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('members.delete', $member->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="6" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $members->firstItem() }} – {{ $members->lastItem() }} Members of
                    {{$members->total() }} Members)
                </div>
                <div>{!! $members->links() !!}</div>
            </div>
        </td>
    </tr>

@else
    <tr>
        <td colspan="6" class="text-center">No Members Found</td>
    </tr>
@endif
