@if (count($pensionRates) > 0)
@foreach ($pensionRates as $key => $pensionRate)
    <tr>
        <td> {{ ($pensionRates->currentPage()-1) * $pensionRates->perPage() + $loop->index + 1 }}</td>
        <td>{{ $pensionRate->npsc_credit_rate ?? 'N/A' }}</td>
        <td>{{ $pensionRate->npsg_credit_rate ?? 'N/A' }}</td>
        <td>{{ $pensionRate->npsc_debit_rate ?? 'N/A' }}</td>
        <td>{{ $pensionRate->npsg_debit_rate ?? 'N/A' }}</td>
        <td>{{ $pensionRate->year ?? 'N/A' }}</td>
        <td class="sepharate"><a data-route="{{route('pension-rate.edit', $pensionRate->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
            {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('pm-index.delete', $pensionRate->id)}}"><i class="ti ti-trash"></i></a> --}}
        </td>
    </tr>
@endforeach
<tr class="toxic">
    <td colspan="7" class="text-left">
        <div class="d-flex justify-content-between">
            <div class="">
                 (Showing {{ $pensionRates->firstItem() }} – {{ $pensionRates->lastItem() }} Pension Rates of
                {{$pensionRates->total() }} Pension Rates)
            </div>
            <div>{!! $pensionRates->links() !!}</div>
        </div>
    </td>
</tr>
@else
<tr>
    <td colspan="7" class="text-center">No Pension Rates Found</td>
</tr>
@endif
