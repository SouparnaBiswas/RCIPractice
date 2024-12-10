@if (count($itemCodeTypes) > 0)
    @foreach ($itemCodeTypes as $key => $itemCodeType)
        <tr>
            <td> {{ ($itemCodeTypes->currentPage()-1) * $itemCodeTypes->perPage() + $loop->index + 1 }}</td>
            <td>{{ $itemCodeType->code_type_no ?? 'N/A'}}</td>
            <td>{{ $itemCodeType->code_type_name ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('item-code-types.edit', $itemCodeType->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('item-code-types.delete', $itemCodeType->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $itemCodeTypes->firstItem() }} – {{ $itemCodeTypes->lastItem() }} Item Code Classification of
                    {{$itemCodeTypes->total() }} Item Code Classifications)
                </div>
                <div>{!! $itemCodeTypes->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No Item Code Classifications Found</td>
    </tr>
@endif
