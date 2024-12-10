@if (count($landline_allowances) > 0)
    @foreach ($landline_allowances as $key => $landline_allowance)
        <tr>
            <td> {{ ($landline_allowances->currentPage()-1) * $landline_allowances->perPage() + $loop->index + 1 }}</td>
            <td>{{ $landline_allowance->category->category ?? 'N/A'}}</td>
            <td>{{ $landline_allowance->mobile_max_allo ?? 'N/A'}}</td>
            <td>{{ $landline_allowance->landline_max_allo ?? 'N/A' }}</td>
            <td>{{ $landline_allowance->broad_band_max_allo ?? 'N/A' }}</td>
            <td>{{ $landline_allowance->total_amount_allo ?? 'N/A' }}</td>
            <td class="sepharate"><a data-route="{{route('landline-allowance.edit', $landline_allowance->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('hras.delete', $hra->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $landline_allowances->firstItem() }} – {{ $landline_allowances->lastItem() }} Landline allowance  of
                    {{$landline_allowances->total() }} Landline allowance )
                </div>
                <div>{!! $landline_allowances->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No Landline allowance Found</td>
    </tr>
@endif
