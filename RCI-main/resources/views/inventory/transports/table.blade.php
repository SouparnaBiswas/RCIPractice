@if (count($transports) > 0)
    @foreach ($transports as $key => $transport)
        <tr>
            <td> {{ ($transports->currentPage()-1) * $transports->perPage() + $loop->index + 1 }}</td>
            <td>{{ $transport->name ?? 'N/A'}}</td>
            <td>{{ $transport->email ?? 'N/A'}}</td>
            <td>{{ $transport->address ?? 'N/A'}}</td>
            <td><span class="{{ ($transport->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($transport->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('transports.edit', $transport->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('item-code-types.delete', $transport->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="8" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $transports->firstItem() }} – {{ $transports->lastItem() }} Transports of
                    {{$transports->total() }} Transports)
                </div>
                <div>{!! $transports->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="8" class="text-center">No Transports Found</td>
    </tr>
@endif
