@if (count($rules) > 0)
    @foreach ($rules as $key => $rule)
        <tr>
            <td> {{ ($rules->currentPage()-1) * $rules->perPage() + $loop->index + 1 }}</td>
            <td>{{ $rule->rule_name ?? 'N/A'}}</td>
            <td>{{ $rule->month ?? 'N/A' }}, {{ $rule->year ?: 'N/A' }}</td>
            <td>{{ $rule->f_basic ?? 'N/A'}}</td>
            <td>{{ $rule->t_basic ?? 'N/A'}}</td>
            <td>{{ $rule->percent ?? 'N/A'}}</td>
            <td>{{ $rule->amount ?? 'N/A'}}</td>
            <td>{{ $rule->f_scale ?? 'N/A'}}</td>
            <td>{{ $rule->t_scale ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('rules.edit', $rule->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('pm-levels.delete', $pm_level->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="10" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $rules->firstItem() }} – {{ $rules->lastItem() }} Rule of
                    {{$rules->total() }} Rule)
                </div>
                <div>{!! $rules->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="10" class="text-center">No Rule Found</td>
    </tr>
@endif
