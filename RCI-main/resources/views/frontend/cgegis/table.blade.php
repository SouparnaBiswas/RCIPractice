@if (count($cgeGis) > 0)
    @foreach ($cgeGis as $key => $cge)
        <tr>
            <td> {{ ($cgeGis->currentPage()-1) * $cgeGis->perPage() + $loop->index + 1 }}</td>
            <td>{{ $cge->group->value ?? 'N/A'}}</td>
            <td>{{ number_format($cge->value ?? 0, 0) }}</td>
            <td><span class="{{ ($cge->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($cge->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('cgegis.edit', $cge->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('cgegis.delete', $cge->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="5" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $cgeGis->firstItem() }} – {{ $cgeGis->lastItem() }} CGEGIS of
                    {{$cgeGis->total() }} CGEGIS)
                </div>
                <div>{!! $cgeGis->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="5" class="text-center">No CGEGIS Found</td>
    </tr>
@endif
