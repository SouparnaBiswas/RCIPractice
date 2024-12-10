@if (count($cghs) > 0)
    @foreach ($cghs as $key => $cgh)
        <tr>
            <td> {{ ($cghs->currentPage()-1) * $cghs->perPage() + $loop->index + 1 }}</td>
            <td>{{ $cgh->payLevel->value ?? 'N/A'}}</td>
            <td>{{ number_format($cgh->contribution ?? 0, 0) }}</td>
            <td><span class="{{ ($cgh->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($cgh->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('cghs.edit', $cgh->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('cghs.delete', $cgh->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="5" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $cghs->firstItem() }} – {{ $cghs->lastItem() }} cghs of
                    {{$cghs->total() }} cghs)
                </div>
                <div>{!! $cghs->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="5" class="text-center">No cghs Found</td>
    </tr>
@endif
