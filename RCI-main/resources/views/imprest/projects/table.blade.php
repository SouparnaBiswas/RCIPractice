@if (count($projects) > 0)
    @foreach ($projects as $key => $project)
        <tr>
            <td> {{ (($projects->currentPage()-1) * $projects->perPage() + $loop->index + 1) ?? 0 }}</td>
            <td>{{ $project->name ?? 'N/A'}}</td>
            <td><span class="{{ ($project->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($project->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate">
                <a data-route="{{route('project.edit', $project->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('project.delete', $project->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $projects->firstItem() }} – {{ $projects->lastItem() }} Projects of
                    {{$projects->total() }} Projects)
                </div>
                <div>{!! $projects->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No Project Found</td>
    </tr>
@endif
