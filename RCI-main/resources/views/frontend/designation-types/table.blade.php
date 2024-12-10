@if (count($designation_types) > 0)
    @foreach ($designation_types as $key => $designation_type)
        <tr>
            <td> {{ ($designation_types->currentPage()-1) * $designation_types->perPage() + $loop->index + 1 }}</td>
            <td>{{ $designation_type->designation_type ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('designation-types.edit', $designation_type->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('designation-types.delete', $designation_type->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="3" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $designation_types->firstItem() }} – {{ $designation_types->lastItem() }} Designation Types of
                    {{$designation_types->total() }} Designation Types)
                </div>
                <div>{!! $designation_types->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="3" class="text-center">No Designation Type Found</td>
    </tr>
@endif
