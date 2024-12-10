@if (count($securityGates) > 0)
    @foreach ($securityGates as $key => $securityGate)
        <tr>
            <td> {{ ($securityGates->currentPage()-1) * $securityGates->perPage() + $loop->index + 1 }}</td>
            <td>{{ $securityGate->entry_time ? date('d-m-Y h:i A', strtotime($securityGate->entry_time)) : 'N/A'}}</td>
            <td>{{ $securityGate->dc_invoice_bill_voucher_no ?? 'N/A'}}  & {{ $securityGate->dc_invoice_bill_voucher_date ? date('d-m-Y', strtotime($securityGate->dc_invoice_bill_voucher_date)) : 'N/A'}}</td>

            <td>
                {{$securityGate->vendor ? $securityGate->vendor->name : 'N/A'}} &  {{$securityGate->vendor ? $securityGate->vendor->address : 'N/A'}}
            </td>
            <td>
                {{$securityGate->supplyOrder ? $securityGate->supplyOrder->order_number : 'N/A'}} & {{ $securityGate->supplyOrder ? date('d-m-Y', strtotime($securityGate->supplyOrder->date)) : 'N/A'}}
            </td>

            <td>{{ $securityGate->no_of_package ?? 'N/A'}}</td>
            {{-- amount --}}
            <td>{{ $securityGate->vehicle_no ?? 'N/A'}}</td>
            {{-- remarks show 10 word --}}
            <td>{{ \Illuminate\Support\Str::limit($securityGate->remarks, 10) ?? 'N/A' }}</td>
            <td class="sepharate"><a data-route="{{route('security-gate-stores.edit', $securityGate->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('inventory-projects.delete', $securityGate->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="12" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $securityGates->firstItem() }} – {{ $securityGates->lastItem() }} Security Gates Store of
                    {{$securityGates->total() }} Security Gates Store)
                </div>
                <div>{!! $securityGates->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="12" class="text-center">No Security Gates Store Found</td>
    </tr>
@endif
