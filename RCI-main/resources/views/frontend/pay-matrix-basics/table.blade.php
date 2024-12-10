@if (count($basics) > 0)
    @foreach ($basics as $key => $basic)
        <tr>
            <td> {{ ($basics->currentPage()-1) * $basics->perPage() + $loop->index + 1 }}</td>
            <td>{{ $basic->pmLevel->value ?? 'N/A'}}</td>
            <td>{{ $basic->payMatrixRow->row_name ?? 'N/A'}}</td>
            <td>{{ $basic->basic_pay ?? 'N/A'}}</td>
            <td><span class="{{ ($basic->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($basic->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('pay-matrix-basics.edit', $basic->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('pm-index.delete', $basic->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="6" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $basics->firstItem() }} – {{ $basics->lastItem() }} PM Basic of
                    {{$basics->total() }} PM Basic)
                </div>
                <div>{!! $basics->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="6" class="text-center">No PM Basic Found</td>
    </tr>
@endif
