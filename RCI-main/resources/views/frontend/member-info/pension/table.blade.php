@if (count($pensions) > 0)
    @foreach ($pensions as $key => $pension)
        <tr>
            <td> {{ ($pensions->currentPage()-1) * $pensions->perPage() + $loop->index + 1 }}</td>
            @if($pension->user_id != null)
                @foreach($members as $member)
                    @if($member->id == $pension->user_id)
                        <td>{{ $member->name ?? 'N/A'}}</td>
                    @endif
                @endforeach
            @else
                <td>N/A</td>
            @endif
            <td>{{ $pension->npsc_sub_amt ?? 'N/A' }}</td>
            <td>{{ $pension->npsg_sub_amt ?? 'N/A' }}</td>
            <td>{{ $pension->npsc_eol_amt ?? 'N/A' }}</td>
            <td>{{ $pension->npsg_eol_amt ?? 'N/A' }}</td>
            <td>{{ $pension->npsc_hpl_amt ?? 'N/A' }}</td>
            <td>{{ $pension->npsg_hpl_amt ?? 'N/A' }}</td>
            <td>{{ $pension->year ?? 'N/A' }}</td>
            <td>{{ $pension->month ?? 'N/A' }}</td>
            <td class="sepharate"><a data-route="{{route('member-pension.edit', $pension->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('pm-index.delete', $pension->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="11" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $pensions->firstItem() }} – {{ $pensions->lastItem() }} Pensions of
                    {{$pensions->total() }} Pensions)
                </div>
                <div>{!! $pensions->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="11" class="text-center">No Pensions Found</td>
    </tr>
@endif
