@if (count($fundTypes) > 0)
    @foreach ($fundTypes as $key => $fundType)
        <tr>
            <td> {{ ($fundTypes->currentPage()-1) * $fundTypes->perPage() + $loop->index + 1 }}</td>
            <td>{{ $fundType->value ?? 'N/A'}}</td>
            <td><span class="{{ ($fundType->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($fundType->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('fund-types.edit', $fundType->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('fund-types.delete', $fundType->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $fundTypes->firstItem() }} – {{ $fundTypes->lastItem() }} Fund Type of
                    {{$fundTypes->total() }} Fund Type)
                </div>
                <div>{!! $fundTypes->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No Fund Type Found</td>
    </tr>
@endif
