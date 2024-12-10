@if (count($cities) > 0)
    @foreach ($cities as $key => $city)
        <tr>
            <td> {{ ($cities->currentPage()-1) * $cities->perPage() + $loop->index + 1 }}</td>
            <td>{{ $city->name ?? 'N/A'}}</td>
            <td>{{ $city->city_type ?? 'N/A'}}</td>
            <td><span class="{{ ($city->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($city->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('cities.edit', $city->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('cities.delete', $city->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="5" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $cities->firstItem() }} – {{ $cities->lastItem() }} Cities of
                    {{$cities->total() }} City)
                </div>
                <div>{!! $cities->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="5" class="text-center">No Cities Found</td>
    </tr>
@endif
