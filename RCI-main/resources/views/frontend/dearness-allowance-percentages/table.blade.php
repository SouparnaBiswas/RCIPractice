@if (count($dearnessAllowancePercentages) > 0)
    @foreach ($dearnessAllowancePercentages as $key => $dearnessAllowancePercentage)
        <tr>
            <td> {{ ($dearnessAllowancePercentages->currentPage()-1) * $dearnessAllowancePercentages->perPage() + $loop->index + 1 }}</td>
            <td>{{ $dearnessAllowancePercentage->percentage ?? 'N/A'}}</td>
            <td>{{ $dearnessAllowancePercentage->year ?? 'N/A'}}</td>
            <td>{{ ucfirst($dearnessAllowancePercentage->quarter) ?? 'N/A'}}</td>
            @if($dearnessAllowancePercentage->pay_commission_id != null)
                @foreach($payCommissions as $payCommission)
                    @if($payCommission->id == $dearnessAllowancePercentage->pay_commission_id)
                        <td>{{ $payCommission->name ?? 'N/A'}}</td>
                    @endif
                @endforeach
            @else
                <td>N/A</td>
            @endif
            <td><span class="{{ ($dearnessAllowancePercentage->is_active == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($dearnessAllowancePercentage->is_active == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('dearness-allowance-percentages.edit', $dearnessAllowancePercentage->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('dearness-allowance-percentages.delete', $dearnessAllowancePercentage->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $dearnessAllowancePercentages->firstItem() }} – {{ $dearnessAllowancePercentages->lastItem() }} DA Percentages of
                    {{$dearnessAllowancePercentages->total() }} DA Percentages)
                </div>
                <div>{!! $dearnessAllowancePercentages->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No DA Percentages Found</td>
    </tr>
@endif
