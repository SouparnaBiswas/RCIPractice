@if (count($exServices) > 0)
    @foreach ($exServices as $key => $exService)
        <tr>
            <td> {{ ($exServices->currentPage()-1) * $exServices->perPage() + $loop->index + 1 }}</td>
            <td>{{ $exService->value ?? 'N/A'}}</td>
            <td><span class="{{ ($exService->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($exService->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('ex-services.edit', $exService->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('ex-services.delete', $exService->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $exServices->firstItem() }} – {{ $exServices->lastItem() }} Ex Services of
                    {{$exServices->total() }} Ex Service)
                </div>
                <div>{!! $exServices->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No Ex Services Found</td>
    </tr>
@endif
