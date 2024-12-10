@if (count($reset_item_codes) > 0)
    @foreach ($reset_item_codes as $key => $reset_item_code)
        <tr>
            <td> {{ (($reset_item_codes->currentPage()-1) * $reset_item_codes->perPage() + $loop->index + 1) ?? 0 }}</td>
            <td>{{ $reset_employee_id->employee_id_text ?? 'N/A'}}</td>
            <td><span class="{{ ($reset_employee_id->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($reset_employee_id->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate">
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('reset-employee-ids.delete', $reset_employee_id->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="6" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $reset_item_codes->firstItem() }} – {{ $reset_item_codes->lastItem() }} Reset item Codes of
                    {{$reset_item_codes->total() }} Reset item Codes)
                </div>
                <div>{!! $reset_item_codes->links() !!}</div>
            </div>
        </td>
    </tr>

@else
    <tr>
        <td colspan="6" class="text-center">No Reset item Codes Found</td>
    </tr>
@endif
