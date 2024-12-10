@if (count($banks) > 0)
    @foreach ($banks as $key => $bank)
        <tr>banks
            <td> {{ ($banks->currentPage()-1) * $banks->perPage() + $loop->index + 1 }}</td>
            <td>{{ $bank->bank_name ?? 'N/A'}}</td>
            <td>{{ $bank->ifsc ?? 'N/A'}}</td>
            <td><span class="{{ ($bank->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($bank->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('banks.edit', $bank->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('banks.delete', $bank->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="5" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $banks->firstItem() }} – {{ $banks->lastItem() }} Banks of
                    {{$banks->total() }} banks)
                </div>
                <div>{!! $banks->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="5" class="text-center">No Banks Found</td>
    </tr>
@endif
