@if (count($uoms) > 0)
    @foreach ($uoms as $key => $uom)
        <tr>
            <td> {{ ($uoms->currentPage()-1) * $uoms->perPage() + $loop->index + 1 }}</td>
            <td>{{ $uom->name ?? 'N/A'}}</td>
            <td><span class="{{ ($uom->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($uom->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('uom.edit', $uom->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('item-code-types.delete', $uom->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $uoms->firstItem() }} – {{ $uoms->lastItem() }} UOMs of
                    {{$uoms->total() }} UOMs)
                </div>
                <div>{!! $uoms->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No UOMs Found</td>
    </tr>
@endif
