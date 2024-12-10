@if (count($trafficControls) > 0)
    @foreach ($trafficControls as $key => $trafficControl)
        <tr>
            <td> {{ ($trafficControls->currentPage()-1) * $trafficControls->perPage() + $loop->index + 1 }}</td>
            <td>{{ $trafficControl->tcr_number ?? 'N/A'}}</td>
            {{-- lr_rr_awb_bl_app_rpp_number --}}
            <td>{{ $trafficControl->lr_rr_awb_bl_app_rpp_number ?? 'N/A'}}</td>
            {{-- lr_rr_awb_bl_app_rpp_date --}}
            <td>{{ $trafficControl->lr_rr_awb_bl_app_rpp_date ? date('d-m-Y', strtotime($trafficControl->lr_rr_awb_bl_app_rpp_date)) : 'N/A'}}</td>

            <td>
                {{$trafficControl->vendor ? $trafficControl->vendor->name : 'N/A'}}
            </td>
            <td>
                {{$trafficControl->transport ? $trafficControl->transport->name : 'N/A'}}
            </td>
            <td>
                {{$trafficControl->supplyOrder ? $trafficControl->supplyOrder->order_number : 'N/A'}} & {{ $trafficControl->supplyOrder ? date('d-m-Y', strtotime($trafficControl->supplyOrder->date)) : 'N/A'}}
            </td>
           {{-- date_of_collection_of_stores --}}
            <td>{{ $trafficControl->date_of_collection_of_stores ? date('d-m-Y', strtotime($trafficControl->date_of_collection_of_stores)) : 'N/A'}}</td>
            {{-- no_of_package & gross_weight --}}
            <td>{{ $trafficControl->no_of_package ?? 'N/A'}} & {{ $trafficControl->gross_weight ?? 'N/A'}}</td>
            {{-- condition_of_package --}}
            <td>{{ $trafficControl->condition_of_package ?? 'N/A'}}</td>
            {{-- amount --}}
            <td>{{ $trafficControl->amount ?? 'N/A'}}</td>
            {{-- remarks show 10 word --}}
            <td>{{ \Illuminate\Support\Str::limit($trafficControl->remarks, 10) ?? 'N/A' }}</td>
            <td class="sepharate"><a data-route="{{route('traffic-controls.edit', $trafficControl->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('inventory-projects.delete', $trafficControl->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="12" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $trafficControls->firstItem() }} – {{ $trafficControls->lastItem() }} Traffic Control of
                    {{$trafficControls->total() }} Traffic Control)
                </div>
                <div>{!! $trafficControls->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="12" class="text-center">No Traffic Control Found</td>
    </tr>
@endif
