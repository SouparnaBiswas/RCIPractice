@if (count($vendors) > 0)
    @foreach ($vendors as $key => $vendor)
        <tr>
            <td> {{ ($vendors->currentPage()-1) * $vendors->perPage() + $loop->index + 1 }}</td>
            <td>{{ $vendor->name ?? 'N/A'}}</td>
            <td>{{ $vendor->email ?? 'N/A'}}</td>
            <td>{{ $vendor->address ?? 'N/A'}}</td>
            <td><span class="{{ ($vendor->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($vendor->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('vendors.edit', $vendor->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('item-code-types.delete', $vendor->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="8" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $vendors->firstItem() }} – {{ $vendors->lastItem() }} Vendors of
                    {{$vendors->total() }} Vendors)
                </div>
                <div>{!! $vendors->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="8" class="text-center">No Vendors Found</td>
    </tr>
@endif
