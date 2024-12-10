
    @if($data)
            @foreach ($data as $key=>$val)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$val->from_location}}</td>
                    <td>{{$val->to_location}}</td>
                    <td>{{date('jS F, Y h:ia',strtotime($val->dep_datetime))}}</td>
                    <td>{{$val->distance}}</td>
                    <td>{{$val->con_mode}}</td>
                    <td>{{date('jS F, Y h:ia',strtotime($val->arrival_datetime))}}</td>
                    <td>{{$val->amount}}</td>
                    <td class="sepharate">
                       <a href="javascript:void(0);" id="delete" class="delete" data-route="{{URL::to('/member-info/tada-advance/tada-journey-remove/'.$val->id.'/'.$tadaAdv->id)}}"><i class="ti ti-trash"></i></a>
                    </td>
                </tr>
            @endforeach

    @else
        <tr>
            <td colspan="7" class="text-center">No Data Found</td>
        </tr>
    @endif

