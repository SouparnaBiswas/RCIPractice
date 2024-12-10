@if (count($gstpercentages) > 0)
    @foreach ($gstpercentages as $key => $gstpercentage)
        <tr>
            <td> {{ ($gstpercentages->currentPage()-1) * $gstpercentages->perPage() + $loop->index + 1 }}</td>
            <td>{{ $gstpercentage->gst_percent ?? 'N/A'}}</td>
            <td>{{ $gstpercentage->gst_desc ?? 'N/A'}}</td>
            <td><span class="{{ ($gstpercentage->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($gstpercentage->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('gst.edit', $gstpercentage->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('item-code-types.delete', $gstpercentage->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="5" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $gstpercentages->firstItem() }} – {{ $gstpercentages->lastItem() }} GSTs of
                    {{$gstpercentages->total() }} GSTs)
                </div>
                <div>{!! $gstpercentages->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="5" class="text-center">No GSTs Found</td>
    </tr>
@endif
