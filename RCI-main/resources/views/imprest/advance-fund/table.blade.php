@if (count($advance_funds) > 0)
    @foreach ($advance_funds as $key => $advance_fund)
        <tr>
            <td>{{ $advance_fund->adv_no ?? 'N/A'}}</td>
            <td>{{ $advance_fund->adv_date ?? 'N/A'}}</td>
            <td>{{ $advance_fund->adv_amount ?? 'N/A'}}</td>
            <td>{{ $advance_fund->project->name ?? 'N/A'}}</td>
            <td>{{ $advance_fund->chq_no ?? 'N/A'}}</td>
            <td>{{ $advance_fund->chq_date ?? 'N/A'}}</td>
            <td>{{ $advance_fund->variableType->name ?? 'N/A'}}</td>
           
            <td class="sepharate"><a data-route="{{route('advance-funds.edit', $advance_fund->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('advance-funds.delete', $advance_fund->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="9" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $advance_funds->firstItem() }} – {{ $advance_funds->lastItem() }} Advance fund of
                    {{$advance_funds->total() }}Advance fund)
                </div>
                <div>{!! $advance_funds->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="9" class="text-center">No Advance funds Found</td>
    </tr>
@endif
