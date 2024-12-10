
    @if($dataPriority)
            @foreach ($dataPriority as $key=>$val)


                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$val->from_location}}</td>
                    <td>{{$val->to_location}}</td>
                    <td>{{$val->food_day}}DAY@ &#8377;{{$val->food_amount}}</td>
                    <td>{{$val->hotel_day}}DAY@ &#8377;{{$val->hotel_amount}}</td>
                    <td>&#8377;{{$val->total_da}}</td>
                    <td class="sepharate">
                       <a href="javascript:void(0);" id="delete" class="delete" data-route="{{URL::to('/member-info/tada-advance/tada-priority-remove/'.$val->id.'/'.$tadaAdv->id)}}"><i class="ti ti-trash"></i></a>
                    </td>
                </tr>
            @endforeach

    @else
        <tr>
            <td colspan="7" class="text-center">No Data Found</td>
        </tr>
    @endif

