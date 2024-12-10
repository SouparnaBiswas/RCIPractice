@if (count($inventoryProjects) > 0)
    @foreach ($inventoryProjects as $key => $inventoryProject)
        <tr>
            <td>{{ ($inventoryProjects->currentPage()-1) * $inventoryProjects->perPage() + $loop->index + 1 }}</td>
            <td>{{ $inventoryProject->project_name ?? 'N/A'}}</td>
            <td>{{ $inventoryProject->sanction_amount ?? 'N/A'}}</td>
            <td>{{ $inventoryProject->sanctionAuthority->name ?? 'N/A'}}</td>
            <td>{{ $inventoryProject->pdc ?? 'N/A'}}</td>
            <td><span class="{{ ($inventoryProject->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($inventoryProject->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('inventory-projects.edit', $inventoryProject->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('inventory-projects.delete', $inventoryProject->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $inventoryProjects->firstItem() }} – {{ $inventoryProjects->lastItem() }} Inventory Projects of
                    {{$inventoryProjects->total() }} Inventory Projects)
                </div>
                <div>{!! $inventoryProjects->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No Inventory Projects Found</td>
    </tr>
@endif
