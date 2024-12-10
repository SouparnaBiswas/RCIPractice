@if (count($memberIncomeTaxes) > 0)
    @foreach ($memberIncomeTaxes as $key => $memberIncomeTax)
        <tr>
            <td> {{ ($memberIncomeTaxes->currentPage()-1) * $memberIncomeTaxes->perPage() + $loop->index + 1 }}</td>
            @if($memberIncomeTax->member_id != null)
                @foreach($members as $member)
                    @if($member->id == $memberIncomeTax->member_id)
                        <td>{{ $member->name ?? 'N/A'}}</td>
                    @endif
                @endforeach
            @else
                <td>N/A</td>
            @endif
            <td>{{ $memberIncomeTax->section ?? 'N/A'}}</td>
            <td>{{ $memberIncomeTax->description ?? 'N/A'}}</td>
            <td>{{ $memberIncomeTax->max_deduction ?? 'N/A'}}</td>
            <td>{{ $memberIncomeTax->member_deduction ?? 'N/A'}}</td>
            <td>{{ $memberIncomeTax->financial_year ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('member-income-taxes.edit', $memberIncomeTax->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('income-taxes.delete', $incomeTax->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="8" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $memberIncomeTaxes->firstItem() }} – {{ $memberIncomeTaxes->lastItem() }} income Tax  exemption of
                    {{$memberIncomeTaxes->total() }} income Tax exemptions)
                </div>
                <div>{!! $memberIncomeTaxes->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="8" class="text-center">No income Tax exemption Found</td>
    </tr>
@endif
