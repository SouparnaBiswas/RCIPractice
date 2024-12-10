@if (count($itemTypes) > 0)
    @foreach ($itemTypes as $key => $itemType)
        <tr>
            <td> {{ ($itemTypes->currentPage()-1) * $itemTypes->perPage() + $loop->index + 1 }}</td>
            <td>{{ $itemType->name ?? 'N/A'}}</td>
            <td><span class="{{ ($itemType->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($itemType->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('inventory-types.edit', $itemType->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('inventory-types.delete', $itemType->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $itemTypes->firstItem() }} – {{ $itemTypes->lastItem() }} Item Types of
                    {{$itemTypes->total() }} Item Types)
                </div>
                <div>{!! $itemTypes->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No Item Types Found</td>
    </tr>
@endif
