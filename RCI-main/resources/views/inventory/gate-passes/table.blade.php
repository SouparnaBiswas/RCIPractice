@if (count($gatePasses) > 0)
    @foreach ($gatePasses as $key => $gatePass)
        <tr>
            <td> {{ ($gatePasses->currentPage()-1) * $gatePasses->perPage() + $loop->index + 1 }}</td>
            <td>{{ $gatePass->gate_pass_no ?? 'N/A'}}</td>
            <td>{{ $gatePass->gate_pass_date ?? 'N/A'}}</td>
            <td>{{ ucfirst($gatePass->gate_pass_type) ?? 'N/A'}}</td>
            <td class="sepharate">
                {{-- <a data-route="{{route('gate-passes.edit', $gatePass->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a> --}}
                <a href="{{ route('gate-passes.report', $gatePass->id)}}" class="edit_pencil edit-route print-route print-btn" id="print_id" data-id="{{ $gatePass->id }}"><i class="fa fa-print"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('gate-passes.delete', $gatePass->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="5" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $gatePasses->firstItem() }} – {{ $gatePasses->lastItem() }} Gate Passes of
                    {{$gatePasses->total() }} Gate Passes)
                </div>
                <div>{!! $gatePasses->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="5" class="text-center">No Gate Passes Found</td>
    </tr>
@endif
