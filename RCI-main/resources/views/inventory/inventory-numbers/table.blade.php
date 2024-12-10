@if (count($inventoryNumbers) > 0)
    @foreach ($inventoryNumbers as $key => $inventoryNumber)
        <tr>
            <td> {{ ($inventoryNumbers->currentPage()-1) * $inventoryNumbers->perPage() + $loop->index + 1 }}</td>
            <td>{{ $inventoryNumber->inventory_type ?? 'N/A'}}</td>
            <td>{{ $inventoryNumber->member->user_name ?? 'N/A'}}</td>
            <td>{{ $inventoryNumber->number ?? 'N/A'}}</td>
            <td><span class="{{ ($inventoryNumber->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($inventoryNumber->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('inventory-numbers.edit', $inventoryNumber->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('inventory-numbers.delete', $inventoryNumber->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="6" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $inventoryNumbers->firstItem() }} – {{ $inventoryNumbers->lastItem() }} Item Numbers of
                    {{$inventoryNumbers->total() }} Item Numbers)
                </div>
                <div>{!! $inventoryNumbers->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="6" class="text-center">No Inventory Number Found</td>
    </tr>
@endif
