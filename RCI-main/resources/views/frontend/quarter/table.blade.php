@if (count($quarters) > 0)
    @foreach ($quarters as $key => $quarter)
        <tr>
            <td> {{ ($quarters->currentPage()-1) * $quarters->perPage() + $loop->index + 1 }}</td>
            <td>{{ $quarter->grade_pay->amount ?? 'N/A'}}</td>
            <td>{{ $quarter->license_fee }}</td>
            <td>{{ $quarter->qrt_type}}</td>
            <td>{{ $quarter->qrt_charge}}</td>
            <td><span class="{{ ($quarter->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($quarter->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('quarters.edit', $quarter->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('quarters.delete', $quarter->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $quarters->firstItem() }} – {{ $quarters->lastItem() }} Quarter of
                    {{$quarters->total() }} Quarter)
                </div>
                <div>{!! $quarters->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No Quarter Found</td>
    </tr>
@endif
