@if (count($users) > 0)
    @foreach ($users as $key => $user)
        <tr>
            <td> {{ ($users->currentPage()-1) * $users->perPage() + $loop->index + 1 }}</td>
            <td>{{ $user->first_name .' '. $user->last_name ?? 'N/A'}}</td>
            <td>{{ $user->email ?? 'N/A'}}</td>
            <td>{{ $user->phone ?? 'N/A'}}</td>
            <td>{{ $user->roles->first()->name ?? 'N/A'}}</td>
            <td><span class="{{ ($user->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($user->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('users.edit', $user->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('users.delete', $user->id)}}"><i class="ti ti-trash"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $users->firstItem() }} – {{ $users->lastItem() }} User of
                    {{$users->total() }} Users)
                </div>
                <div>{!! $users->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No User Found</td>
    </tr>
@endif
