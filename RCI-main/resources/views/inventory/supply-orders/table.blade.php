@if (count($supplyOrders) > 0)
    @foreach ($supplyOrders as $key => $supplyOrder)
        <tr>
            <td> {{ ($supplyOrders->currentPage()-1) * $supplyOrders->perPage() + $loop->index + 1 }}</td>
            <td>{{ $supplyOrder->order_number ?? 'N/A'}}</td>
            {{-- date --}}
            <td>{{ $supplyOrder->date ? date('d-m-Y', strtotime($supplyOrder->date)) : 'N/A'}}</td>
            {{-- status --}}
            <td><span class="{{ ($supplyOrder->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($supplyOrder->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('supply-orders.edit', $supplyOrder->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('inventory-projects.delete', $supplyOrder->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $supplyOrders->firstItem() }} – {{ $supplyOrders->lastItem() }} Supply Orders of
                    {{$supplyOrders->total() }} Supply Orders)
                </div>
                <div>{!! $supplyOrders->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No Supply Order Found</td>
    </tr>
@endif
