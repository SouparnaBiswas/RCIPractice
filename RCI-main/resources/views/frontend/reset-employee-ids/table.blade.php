@if (count($reset_employee_ids) > 0)
    @foreach ($reset_employee_ids as $key => $reset_employee_id)
        <tr>
            <td> {{ (($reset_employee_ids->currentPage()-1) * $reset_employee_ids->perPage() + $loop->index + 1) ?? 0 }}</td>
            <td>{{ $reset_employee_id->employee_id_text ?? 'N/A'}}</td>
            <td><span class="{{ ($reset_employee_id->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($reset_employee_id->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate">
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('reset-employee-ids.delete', $reset_employee_id->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $reset_employee_ids->firstItem() }} – {{ $reset_employee_ids->lastItem() }} Employee-Id Name of
                    {{$reset_employee_ids->total() }} Employee-Id Name)
                </div>
                <div>{!! $reset_employee_ids->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No Employee-Id Name Found</td>
    </tr>
@endif
