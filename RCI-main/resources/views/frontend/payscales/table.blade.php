@if (count($payscales) > 0)
    @foreach ($payscales as $key => $payscale)
        <tr>
            <td>{{$payscale->payscaleType->payscale_type ?? 'N/A'}}</td>
             <td>{{$payscale->payscale_number ?? 'N/A'}}</td>
            <td>{{$payscale->basic1 ?? 'N/A'}}</td>
            <td>{{$payscale->increment1 ?? 'N/A'}}</td>
            <td>{{$payscale->increment2 ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('payscales.edit', $payscale->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('payscales.delete', $payscale->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="6" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $payscales->firstItem() }} – {{ $payscales->lastItem() }} payscales of
                    {{$payscales->total() }} payscales)
                </div>
                <div>{!! $payscales->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="6" class="text-center">No payscale Found</td>
    </tr>
@endif
