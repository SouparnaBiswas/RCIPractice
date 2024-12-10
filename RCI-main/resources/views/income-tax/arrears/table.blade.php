@if (count($arrears) > 0)
    @foreach ($arrears as $key => $arrear)
        <tr id="update-{{$arrear->id}}">
            @include('income-tax.arrears.table-td', ['arrear' => $arrear])
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="8" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $arrears->firstItem() }} – {{ $arrears->lastItem() }} Section of
                    {{$arrears->total() }} Section)
                </div>
                <div>{{ $arrears->links() }}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="8" class="text-center">No Data Found</td>
    </tr>
@endif
