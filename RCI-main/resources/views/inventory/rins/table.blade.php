@if (count($rins) > 0)
    @foreach ($rins as $key => $rin)
        <tr>
           
            <td> {{ ($rins->currentPage()-1) * $rins->perPage() + $loop->index + 1 }}</td>
            <td>{{ $rin->rin_no ?? 'N/A'}}</td>
            {{-- @if ($rin->item_id != null)
                @foreach ($items as $item)
                    @if ($item->id == $rin->item_id)
                        <td>{{ $item->code }}</td>
                    @endif                    
                @endforeach
            @else
                <td>N/A</td>
            @endif
           
            <td>{{ $rin->received_quantity ?? 'N/A'}}</td>
            <td>{{ $rin->accepted_quantity ?? 'N/A'}}</td>
            <td>{{ $rin->rejected_quantity ?? 'N/A'}}</td>
            <td>{{ $rin->nc_status ?? 'N/A'}}</td>
            <td>{{ $rin->au_status ?? 'N/A'}}</td> --}}
            <td class="sepharate">
                {{-- <a data-route="{{route('rins.edit', $rin->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a> --}}
                <a href="{{ route('rins.report', $rin->id)}}" class="edit_pencil edit-route print-route print-btn" id="print_id" data-id="{{ $rin->id }}"><i class="fa fa-print"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('item-code-types.delete', $rin->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="3" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $rins->firstItem() }} – {{ $rins->lastItem() }} RINs of
                    {{$rins->total() }} RINs)
                </div>
                <div>{!! $rins->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="3" class="text-center">No RINs Found</td>
    </tr>
@endif
