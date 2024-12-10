@if (count($tptas) > 0)
    @foreach ($tptas as $key => $tpta)
        <tr>
            <td> {{ ($tptas->currentPage()-1) * $tptas->perPage() + $loop->index + 1 }}</td>
            @if($tpta->pay_level_id != null)
                @foreach($payLevels as $payLevel)
                    @if($payLevel->id == $tpta->pay_level_id)
                        <td>{{ $payLevel->value ?? 'N/A'}}</td>
                    @endif
                @endforeach
            @else
                <td>N/A</td>
            @endif
            <td>{{ $tpta->tpt_type ?? 'N/A'}}</td>
            <td>{{ $tpta->tpt_allowance ?? 'N/A'}}</td>
            <td>{{ $tpta->tpt_da ?? 'N/A'}}</td>
            <td><span class="{{ ($tpta->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($tpta->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('tptas.edit', $tpta->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('tptas.delete', $tpta->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $tptas->firstItem() }} – {{ $tptas->lastItem() }} tpta of
                    {{$tptas->total() }} tptas)
                </div>
                <div>{!! $tptas->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No tpta Found</td>
    </tr>
@endif
