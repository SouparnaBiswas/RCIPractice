@if (count($paybands) > 0)
    @foreach ($paybands as $key => $payband)
        <tr>
            <td>{{$payband->paybandType->payband_type ?? 'N/A'}}</td>
            <td>{{$payband->high_band ?? 'N/A'}}</td>
            <td>{{$payband->low_band ?? 'N/A'}}</td>
            <td>{{$payband->year ?? 'N/A'}}</td>
            {{-- <td>{{$payband->grade_pay ?? 'N/A'}}</td> --}}
            <td class="sepharate"><a data-route="{{route('paybands.edit', $payband->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('paybands.delete', $payband->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $paybands->firstItem() }} – {{ $paybands->lastItem() }} paybands of
                    {{$paybands->total() }} paybands)
                </div>
                <div>{!! $paybands->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No payband Found</td>
    </tr>
@endif
