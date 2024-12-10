@if (count($paymentCategories) > 0)
    @foreach ($paymentCategories as $key => $paymentCategory)
        <tr>
            <td> {{ ($paymentCategories->currentPage()-1) * $paymentCategories->perPage() + $loop->index + 1 }}</td>
            <td>{{ $paymentCategory->name ?? 'N/A'}}</td>
            <td><span class="{{ ($paymentCategory->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($paymentCategory->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('payment-categories.edit', $paymentCategory->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('payment-categories.delete', $paymentCategory->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $paymentCategories->firstItem() }} – {{ $paymentCategories->lastItem() }} Payment Categories of
                    {{$paymentCategories->total() }} Payment Categories)
                </div>
                <div>{!! $paymentCategories->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No Payment Category Found</td>
    </tr>
@endif
