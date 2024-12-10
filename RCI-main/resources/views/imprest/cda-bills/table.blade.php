@if (count($cdaBills) > 0)
    @foreach ($cdaBills as $key => $cdaBill)
        <tr>
            <td>{{ $cdaBill->adv_no ?? 'N/A'}}</td>
            <td>{{ $cdaBill->adv_date ?? 'N/A'}}</td>
            <td>{{ $cdaBill->adv_amount ?? 'N/A'}}</td>
            <td>{{ $cdaBill->project->name ?? 'N/A'}}</td>
            <td>{{ $cdaBill->var_no ?? 'N/A'}}</td>
            <td>{{ $cdaBill->var_date ?? 'N/A'}}</td>
            <td>{{ $cdaBill->var_amount ?? 'N/A'}}</td>
            <td>{{ $cdaBill->crv_no ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('cda-bills.edit', $cdaBill->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('cda-bills.delete', $cdaBill->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="9" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $cdaBills->firstItem() }} – {{ $cdaBills->lastItem() }} CDA Bills of
                    {{$cdaBills->total() }} CDA Bills)
                </div>
                <div>{!! $cdaBills->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="9" class="text-center">No CDA Bills Found</td>
    </tr>
@endif
