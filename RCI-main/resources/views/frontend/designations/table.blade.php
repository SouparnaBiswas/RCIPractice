@if (count($designations) > 0)
    @foreach ($designations as $key => $designation)
        <tr>
            <td>{{ $designation->designation  ?? 'N/A'}}</td>
            <td>
                {{ $designation->full_name ?? 'N/A' }}
            </td>
            <td>
                {{ $designation->order ?? 'N/A' }}
            </td>
            <td>
                {{ $designation->group->value ?? 'N/A' }}
            </td>
            <td>
                {{ $designation->type ?? 'N/A' }}
            </td>
            <td>
                {{ $designation->payLevel->value ?? 'N/A' }}
            </td>
            
            <td class="sepharate"><a data-route="{{route('designations.edit', $designation->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('designations.delete', $designation->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="8" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $designations->firstItem() }} – {{ $designations->lastItem() }} designations of
                    {{$designations->total() }} designations)
                </div>
                <div>{!! $designations->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="8" class="text-center">No designation Found</td>
    </tr>
@endif
