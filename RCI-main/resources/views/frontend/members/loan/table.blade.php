@if(isset($members_loans_info) && count($members_loans_info) > 0)
    @foreach($members_loans_info as $loan_info)
        <tr class="edit-route-loan" data-id="{{ $loan_info->id }}" data-route="{{ route('members.loan.edit', $loan_info->id) }}">
            <td>{{ $loan_info->loan_name ?? 'N/A' }}</td>
            <td>{{ $loan_info->inst_rate ?? 'N/A' }}</td>
            <td>{{ $loan_info->total_amount ?? 'N/A' }}</td>
            <td>{{ date('d-m-Y', strtotime($loan_info->start_date)) ?? 'N/A'}}</td>
            <td>{{ $loan_info->remark ?? 'N/A' }}</td>
        </tr>
    @endforeach

@endif
