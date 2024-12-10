@if (count($policies) > 0)
    @foreach ($policies as $key => $policy)
        <tr>
            <td> {{ ($policies->currentPage()-1) * $policies->perPage() + $loop->index + 1 }}</td>
            <td>{{ $policy->policy_name ?? 'N/A'}}</td>
            <td>{{ $policy->policy_no ?? 'N/A'}}</td>
            <td><span class="{{ ($policy->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($policy->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('policy.edit', $policy->id)}}" href="javascript:void(0);" class="edit_pencil edit-route-policy"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('policy.delete', $policy->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="5" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $policies->firstItem() }} – {{ $policies->lastItem() }} Policy of
                    {{$policies->total() }} Policy)
                </div>
                <div>{!! $policies->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="5" class="text-center">No Policy Found</td>
    </tr>
@endif
