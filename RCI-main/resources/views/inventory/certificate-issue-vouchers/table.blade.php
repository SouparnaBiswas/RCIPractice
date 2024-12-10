@if (count($certificateIssueVouchers) > 0)
    @foreach ($certificateIssueVouchers as $key => $certificateIssueVoucher)
        <tr>
            <td> {{ ($certificateIssueVouchers->currentPage() - 1) * $certificateIssueVouchers->perPage() + $loop->index + 1 }}
            </td>
            <td>{{ $certificateIssueVoucher->voucher_no ?? 'N/A' }}</td>
            <td>{{ $certificateIssueVoucher->voucher_date ?? 'N/A' }}</td>
            <td>{{ $certificateIssueVoucher->inv_no ?? 'N/A' }}</td>
            <td>{{ $certificateIssueVoucher->inventory_holder ?? 'N/A' }}</td>
            
            <td class="sepharate">
                <!--<a data-route="{{ route('certificate-issue-vouchers.edit', $certificateIssueVoucher->id) }}"-->
                <!--    href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>-->
                <a href="javascript:void(0);" class="edit_pencil edit-route print-route print-btn" id="print_id" data-id="{{ $certificateIssueVoucher->id }}"><i class="fa fa-print"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="8" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                    (Showing {{ $certificateIssueVouchers->firstItem() }} – {{ $certificateIssueVouchers->lastItem() }}
                    Voucher of
                    {{ $certificateIssueVouchers->total() }} Vouchers)
                </div>
                <div>{!! $certificateIssueVouchers->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="8" class="text-center">No Vouchers Found</td>
    </tr>
@endif
