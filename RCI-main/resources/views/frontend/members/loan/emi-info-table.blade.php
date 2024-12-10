
@if(isset($emiInfo))
@if(isset($loan_emi_list) && count($loan_emi_list) > 0)
    @foreach($loan_emi_list as $key => $emi_list)
        <tr class="edit-route-loan" data-id="{{ $emi_list->id }}" data-route="{{ route('members.loan.edit', $emi_list->id) }}">
            <td>{{ $key + 1 }}</td>
            <td>{{ $emi_list->member->name ?? 'N/A' }}</td>
            <td>{{ $emi_list->loan->loan_name ?? 'N/A' }}</td>
            <td>{{ $emi_list->interest_rate ?? 'N/A' }}</td>
            <td>{{ isset($emi_list->emi_amount) ? number_format($emi_list->emi_amount, 2) : 'N/A' }}</td>
            <td>{{ isset($emi_list->interest_amount) ? number_format($emi_list->interest_amount, 2) : 'N/A' }}</td>
            <td>{{ $emi_list->penal_interest ?? 'N/A'}}</td>
            <td>{{ $emi_list->emi_date ?? 'N/A' }}</td>
            <td><span style="color: {{ $emi_list->status == 0 ? 'red' : 'green' }}">
                {{ $emi_list->status == 0 ? 'Due' : 'Paid' }}
            </span></td>
        </tr>
    @endforeach

    <tr class="toxic">
        <td colspan="9" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $loan_emi_list->firstItem() }} – {{ $loan_emi_list->lastItem() }} Emi of
                    {{$loan_emi_list->total() }} Emis)
                </div>
                <div>{!! $loan_emi_list->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="9" class="text-center">No Emi Found</td>
    </tr>
@endif
@endif
