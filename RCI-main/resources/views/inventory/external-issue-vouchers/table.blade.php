@if (count($externalIssueVouchers) > 0)
    @foreach ($externalIssueVouchers as $key => $externalIssueVoucher)
        <tr>
            <td> {{ ($externalIssueVouchers->currentPage()-1) * $externalIssueVouchers->perPage() + $loop->index + 1 }}</td>
            <td>{{ $externalIssueVoucher->voucher_no ?? 'N/A'}}</td>
            <td>{{ $externalIssueVoucher->voucher_date ?? 'N/A'}}</td>
            @if($externalIssueVoucher->inv_no != null)
                @foreach($inventoryNumbers as $inventoryNumber)
                    @if($inventoryNumber->id == $externalIssueVoucher->inv_no)
                        <td>{{ $inventoryNumber->number ?? 'N/A'}}</td>
                    @endif
                @endforeach
            @else
                <td>N/A</td>
            @endif
           
           
            <td class="sepharate">
                {{-- <a data-route="{{route('external-issue-vouchers.edit', $externalIssueVoucher->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a> --}}
                <a href="javascript:void(0);" class="edit_pencil edit-route print-route print-btn" id="print_id" data-id="{{ $externalIssueVoucher->id }}"><i class="fa fa-print"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('external-issue-vouchers.delete', $externalIssueVoucher->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="8" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $externalIssueVouchers->firstItem() }} – {{ $externalIssueVouchers->lastItem() }} External Issue Vouchers of
                    {{$externalIssueVouchers->total() }} External Issue Vouchers)
                </div>
                <div>{!! $externalIssueVouchers->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="8" class="text-center">No External Issue Vouchers Found</td>
    </tr>
@endif
