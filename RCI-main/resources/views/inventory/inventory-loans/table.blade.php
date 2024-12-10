@if (count($inventoryLoans) > 0)
    @foreach ($inventoryLoans as $key => $inventoryLoan)
        <tr>
            <td> {{ ($inventoryLoans->currentPage()-1) * $inventoryLoans->perPage() + $loop->index + 1 }}</td>
            <td>{{ $inventoryLoan->itemCode->code ?? 'N/A'}}</td>
            <td>{{ $inventoryLoan->inventory->number ?? 'N/A'}}</td>
            <td>{{ $inventoryLoan->quantity_issue ?? 'N/A'}}</td>
            <td>{{ $inventoryLoan->cost ?? 'N/A' }}</td>
            <td class="sepharate">
                <a data-route="{{route('inventory-loans.edit', $inventoryLoan->id)}}" href="javascript:void(0);" class="edit_pencil edit-route">
                    <i class="ti ti-pencil"></i>
                </a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="6" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $inventoryLoans->firstItem() }} – {{ $inventoryLoans->lastItem() }} Item Loans of
                    {{$inventoryLoans->total() }} Item Loans)
                </div>
                <div>{!! $inventoryLoans->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="6" class="text-center">No Inventory Loan Found</td>
    </tr>
@endif
