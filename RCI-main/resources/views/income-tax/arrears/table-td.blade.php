<td>
    {{ ($arrear->date) ? date('d-m-Y', strtotime($arrear->date)) : 'N/A' }}
  </td>
  <td>
    {{$arrear->name ? $arrear->name : 'N/A'}}
  </td>
    <td>
        {{$arrear->amt ? number_format($arrear->amt, 2) : 'N/A'}}
    </td>
    <td>
        {{$arrear->cps ? $arrear->cps : 'N/A'}}
    </td>
    <td>
        {{$arrear->i_tax ? $arrear->i_tax : 'N/A'}}
    </td>
    <td>
        {{$arrear->cghs ? $arrear->cghs : 'N/A'}}
    </td>
    <td>
        {{$arrear->gmc ? $arrear->gmc : 'N/A'}}
    </td>
    <td>
        {{-- edit --}}
        <a href="javascript:void(0);" data-route="{{ route('arrears.edit', $arrear->id) }}" data-member="{{$member_id}}"  class="btn btn-sm btn-primary edit-route">
            <i class="ti ti-pencil"></i>
        </a>
    </td>
