@if (count($payscale_types) > 0)
    @foreach ($payscale_types as $key => $payscale_type)
        <tr>
            <td> {{ ($payscale_types->currentPage()-1) * $payscale_types->perPage() + $loop->index + 1 }}</td>
            <td>{{ $payscale_type->payscale_type ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('payscale-types.edit', $payscale_type->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('payscale-types.delete', $payscale_type->id)}}"><i class="ti ti-trash"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="3" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $payscale_types->firstItem() }} – {{ $payscale_types->lastItem() }} payscale types of
                    {{$payscale_types->total() }} payscale types)
                </div>
                <div>{!! $payscale_types->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="3" class="text-center">No payscale type Found</td>
    </tr>
@endif
