@if (count($incomeTaxes) > 0)
    @foreach ($incomeTaxes as $key => $incomeTax)
        <tr>
            <td> {{ ($incomeTaxes->currentPage()-1) * $incomeTaxes->perPage() + $loop->index + 1 }}</td>
            @if($incomeTax->regime != null)
                <td>{{ $incomeTax->regime }}</td>
            @else
                <td>N/A</td>
            @endif
            <td>{{ $incomeTax->lower_slab_amount ?? 'N/A'}}</td>
            <td>{{ $incomeTax->higher_slab_amount ?? 'N/A'}}</td>
            <td>{{ $incomeTax->tax_rate ?? 'N/A'}}</td>
            <td>{{ $incomeTax->edu_cess_rate ?? 'N/A'}}</td>
            <td>{{ $incomeTax->financial_year ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('income-taxes.edit', $incomeTax->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('income-taxes.delete', $incomeTax->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="6" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $incomeTaxes->firstItem() }} – {{ $incomeTaxes->lastItem() }} income Tax  slab of
                    {{$incomeTaxes->total() }} income Tax slabs)
                </div>
                <div>{!! $incomeTaxes->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="6" class="text-center">No income Tax slab Found</td>
    </tr>
@endif
