<td>
    {{ ($rent->month) ? date('M', strtotime($rent->month)) : 'N/A' }}
  </td>
  <td>
    {{$rent->year ? $rent->year : 'N/A'}}
  </td>

    <td>
        {{$rent->rent ? $rent->rent : 'N/A'}}
    </td>
    <td>
        {{-- edit --}}
        <a href="javascript:void(0);" data-route="{{ route('rents.edit', $rent->id) }}" data-member="{{$member_id}}"  class="btn btn-sm btn-primary edit-route">
            <i class="ti ti-pencil"></i>
        </a>
    </td>
