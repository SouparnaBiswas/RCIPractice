@if (count($hras) > 0)
    @foreach ($hras as $key => $hra)
        <tr>
            <td> {{ ($hras->currentPage()-1) * $hras->perPage() + $loop->index + 1 }}</td>
            <td>{{ $hra->percentage ?? 'N/A'}}</td>
            <td>{{ $hra->city_category ?? 'N/A'}}</td>
            @if($hra->pay_commission_id != null)
                @foreach($paycommissions as $payCommission)
                    @if($payCommission->id == $hra->pay_commission_id)
                        <td>{{ $payCommission->name ?? 'N/A'}}</td>
                    @endif
                @endforeach
            @else
                <td>N/A</td>
            @endif
            <td><span class="{{ ($hra->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($hra->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('hras.edit', $hra->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('hras.delete', $hra->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $hras->firstItem() }} – {{ $hras->lastItem() }} HRA of
                    {{$hras->total() }} HRAs)
                </div>
                <div>{!! $hras->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No HRA Found</td>
    </tr>
@endif
