@if (count($variableTypes) > 0)
    @foreach ($variableTypes as $key => $variableType)
        <tr>
            <td> {{ (($variableTypes->currentPage()-1) * $variableTypes->perPage() + $loop->index + 1) ?? 0 }}</td>
            <td>{{ $variableType->name ?? 'N/A'}}</td>
            <td><span class="{{ ($variableType->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($variableType->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate">
                <a data-route="{{route('variable-type.edit', $variableType->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('variable-type.delete', $variableType->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $variableTypes->firstItem() }} – {{ $variableTypes->lastItem() }} variable Types of
                    {{$variableTypes->total() }} variable Types)
                </div>
                <div>{!! $variableTypes->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No variable Type Found</td>
    </tr>
@endif
