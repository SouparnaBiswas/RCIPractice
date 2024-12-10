@if (count($bag_purse_allowances) > 0)
    @foreach ($bag_purse_allowances as $key => $bag_purse_allowance)
        <tr>
            <td>{{ $bag_purse_allowance->category->category ?? 'N/A'}}</td>
            <td>{{ $bag_purse_allowance->entitle_amount ?? 'N/A' }}</td>
            <td>{{ $bag_purse_allowance->year ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('bag-allowance.edit', $bag_purse_allowance->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('categories.delete', $category->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="6" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $bag_purse_allowances->firstItem() }} – {{ $bag_purse_allowances->lastItem() }} bag purse allowances of
                    {{$bag_purse_allowances->total() }} bag purseallowances)
                </div>
                <div>{!! $bag_purse_allowances->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="6" class="text-center">No bag purse Found</td>
    </tr>
@endif
