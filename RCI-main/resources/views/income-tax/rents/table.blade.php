@if (count($rents) > 0)
    @foreach ($rents as $key => $rent)
        <tr id="update-{{$rent->id}}">
            @include('income-tax.rents.table-td', ['rent' => $rent])
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="8" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $rents->firstItem() }} – {{ $rents->lastItem() }} Section of
                    {{$rents->total() }} Section)
                </div>
                <div>{{ $rents->links() }}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="8" class="text-center">No Data Found</td>
    </tr>
@endif
