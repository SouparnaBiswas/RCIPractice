
    @if($data)
            @foreach ($data as $key=>$val)

            @php
                $cat = DB::table('categories')->where('id',$val->category_id)->get()->first();
            @endphp
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$cat->category}}</td>
                    <td>{{$val->title}}</td>
                    <td>{{$val->purpose}}</td>
                    <td>@if($val->currency==1) &#8377;@else &#36;@endif{{$val->amount}}/- @if($val->currency==1) INR @else USD @endif  <strong>{{$val->payment_type}}</strong></td>
                    <td>
                        @if($val->status==1)
                        <span class="active_ss">Active</span>
                        @else
                        <span class="inactive_ss">Inactive</span>
                        @endif
                    </td>
                    <td class="sepharate"><a data-route="{{route('tada.edit', $val->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                        <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('tada.delete', $val->id)}}"><i class="ti ti-trash"></i></a>
                    </td>
                </tr>
            @endforeach


        <tr class="toxic">
            <td colspan="7" class="text-left">
                <div class="d-flex justify-content-between">
                    <div class="">
                        (Showing {{ $data->firstItem() }} – {{ $data->lastItem() }} TA/DA of
                        {{$data->total() }} TA/DA)
                    </div>
                    <div>{!! $data->links() !!}</div>
                </div>
            </td>
        </tr>
    @else
        <tr>
            <td colspan="7" class="text-center">No Data Found</td>
        </tr>
    @endif

