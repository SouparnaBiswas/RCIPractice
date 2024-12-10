@if (count($storeInward) > 0)
    @foreach ($storeInward as $key => $storesInward)
        <tr>
            <td> {{ ($storeInward->currentPage()-1) * $storeInward->perPage() + $loop->index + 1 }}</td>
            <td>{{ $storesInward->tcr_number ?? 'N/A'}}</td>
            <td>{{ $storesInward->dc_invoice_bill_voucher_no ?? 'N/A'}}  & {{ $storesInward->dc_invoice_bill_voucher_date ? date('d-m-Y', strtotime($storesInward->dc_invoice_bill_voucher_date)) : 'N/A'}}</td>

            <td>{{ $storesInward->date_of_receipt }}</td>
            <td>
                {{$storesInward->vendor ? $storesInward->vendor->name : 'N/A'}}
            </td>
            <td>
                {{$storesInward->supplyOrder ? $storesInward->supplyOrder->order_number : 'N/A'}} & {{ $storesInward->supplyOrder ? date('d-m-Y', strtotime($storesInward->supplyOrder->date)) : 'N/A'}}
            </td>

            <td>{{ $storesInward->qty_received ?? 'N/A'}}</td>
            {{-- amount --}}
            <td>
                {{ $storesInward->rin_no ?? 'N/A' }} &
                {{ $storesInward->rin_date ? date('d-m-Y', strtotime($storesInward->rin_date)) : 'N/A' }}
            </td>


            {{-- remarks show 10 word --}}
            <td>{{ \Illuminate\Support\Str::limit($storesInward->nomenclature, 10) ?? 'N/A' }}</td>
            <td>{{ \Illuminate\Support\Str::limit($storesInward->remarks, 10) ?? 'N/A' }}</td>
            <td class="sepharate"><a data-route="{{route('store-inward.edit', $storesInward->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('inventory-projects.delete', $storesInward->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="12" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $storeInward->firstItem() }} – {{ $storeInward->lastItem() }} Store Inward of
                    {{$storeInward->total() }} Store Inward)
                </div>
                <div>{!! $storeInward->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="12" class="text-center">No Security Gates Store Found</td>
    </tr>
@endif
