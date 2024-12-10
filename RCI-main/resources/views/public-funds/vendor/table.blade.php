@if (count($fund_vendors) > 0)
    @foreach ($fund_vendors as $key => $fund_vendor)
        <tr>
            <td> {{ ($fund_vendors->currentPage()-1) * $fund_vendors->perPage() + $loop->index + 1 }}</td>
            <td>{{ $fund_vendor->f_name ?? 'N/A'}} {{  $fund_vendor->l_name ?? 'N/A'}}</td>
            <td>{{ $fund_vendor->email ?? 'N/A'}}</td>
            <td>{{ $fund_vendor->phone ?? 'N/A'}}</td>
            <td><span class="{{ ($fund_vendor->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($fund_vendor->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('fund-vendors.edit', $fund_vendor->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('quarters.delete', $quarter->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $fund_vendors->firstItem() }} – {{ $fund_vendors->lastItem() }} Vendors of
                    {{$fund_vendors->total() }} Vendors)
                </div>
                <div>{!! $fund_vendors->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No Vendors Found</td>
    </tr>
@endif
