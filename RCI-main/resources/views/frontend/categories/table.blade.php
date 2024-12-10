@if (count($categories) > 0)
    @foreach ($categories as $key => $category)
        <tr>
            <td>{{ $category->category ?? 'N/A'}}</td>
            <td>{{ ($category->gazetted == false) ? 'NON-Gazetted' : 'Gazetted' }}</td>
            <td>{{ $category->designationType->designation_type ?? 'N/A'}}</td>
            <td><span class="{{ ($category->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($category->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('categories.edit', $category->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('categories.delete', $category->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="6" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $categories->firstItem() }} – {{ $categories->lastItem() }} categories of
                    {{$categories->total() }} categories)
                </div>
                <div>{!! $categories->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="6" class="text-center">No category Found</td>
    </tr>
@endif
