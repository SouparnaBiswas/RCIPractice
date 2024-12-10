@if (count($rows) > 0)
    @foreach ($rows as $key => $row)
        <tr>
            <td> {{ ($rows->currentPage()-1) * $rows->perPage() + $loop->index + 1 }}</td>
            <td>{{ $row->row_name ?? 'N/A'}}</td>
            <td><span class="{{ ($row->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($row->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('pay-matrix-rows.edit', $row->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('pm-index.delete', $row->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $rows->firstItem() }} – {{ $rows->lastItem() }} Row of
                    {{$rows->total() }} Row)
                </div>
                <div>{!! $rows->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No Row Found</td>
    </tr>
@endif
