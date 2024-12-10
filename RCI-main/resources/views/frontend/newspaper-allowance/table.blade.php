@if (count($newspaper_allows) > 0)
    @foreach ($newspaper_allows as $key => $newspaper_allow)
        <tr>
            <td> {{ ($newspaper_allows->currentPage()-1) * $newspaper_allows->perPage() + $loop->index + 1 }}</td>
            <td>{{ $newspaper_allow->duration == 'half_yearly' ? 'Half Yearly' : 'Yearly' }}</td>
            <td>{{ $newspaper_allow->category->category ?? 'N/A'}}</td>
            <td>{{ $newspaper_allow->max_allocation_amount ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('newspaper-allowance.edit', $newspaper_allow->id)}}" href="javascript:void(0);" class="edit_pencil edit-route-loan"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('loans.delete', $loan->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="5" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $newspaper_allows->firstItem() }} – {{ $newspaper_allows->lastItem() }} Newspaper Allowance of
                    {{$newspaper_allows->total() }} Newspaper Allowance)
                </div>
                <div>{!! $newspaper_allows->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="5" class="text-center">No Newspaper Allowance Found</td>
    </tr>
@endif
