

@if (count($advance_settlement_bills) > 0)
    @foreach ($advance_settlement_bills as $key => $advance_settlement_bill)
        <tr class="edit-route-advance-bill" data-id="{{ $advance_settlement_bill->id }}" data-route="{{ route('advance-settlement-bills.edit', $advance_settlement_bill->id) }}">
            <td>{{ $advance_settlement_bill->firm }}</td>
            <td>{{ $advance_settlement_bill->bill_amount }}</td>
            <td>{{ $advance_settlement_bill->balance }}</td>
        </tr>
    @endforeach
    <tr id="pagination-advance-bill">
        <td colspan="3" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $advance_settlement_bills->firstItem() }} – {{ $advance_settlement_bills->lastItem() }} Advance Settlement of
                    {{$advance_settlement_bills->total() }} Advance Settlement)
                </div>
                <div>{!! $advance_settlement_bills->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr id="no-advance-bill">
        <td colspan="3" class="text-center">No Advance Settlement Bill Found</td>
    </tr>
@endif