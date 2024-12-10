@if (count($gradePays) > 0)
    @foreach ($gradePays as $key => $gradePay)
        <tr>
            <td> {{ ($gradePays->currentPage()-1) * $gradePays->perPage() + $loop->index + 1 }}</td>
            <td>{{ $gradePay->pmLevel->value ?? 'N/A'}}</td>
            <td>{{ $gradePay->amount ?? 'N/A'}}</td>
            <td><span class="{{ ($gradePay->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($gradePay->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('grade-pays.edit', $gradePay->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('grade-pays.delete', $gradePay->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="5" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $gradePays->firstItem() }} – {{ $gradePays->lastItem() }} Grade pay of
                    {{$gradePays->total() }} Grade pay)
                </div>
                <div>{!! $gradePays->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="5" class="text-center">No Grade pay Found</td>
    </tr>
@endif
