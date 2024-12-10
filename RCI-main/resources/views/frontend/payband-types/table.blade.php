@if (count($payband_types) > 0)
    @foreach ($payband_types as $key => $payband_type)
        <tr>
            <td> {{ ($payband_types->currentPage()-1) * $payband_types->perPage() + $loop->index + 1 }}</td>
            <td>{{ $payband_type->payband_type ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('payband-types.edit', $payband_type->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('payband-types.delete', $payband_type->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="3" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $payband_types->firstItem() }} – {{ $payband_types->lastItem() }} payband types of
                    {{$payband_types->total() }} payband types)
                </div>
                <div>{!! $payband_types->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="3" class="text-center">No payband type Found</td>
    </tr>
@endif
