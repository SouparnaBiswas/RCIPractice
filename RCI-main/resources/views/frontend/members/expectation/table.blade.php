@if(isset($member_expectations) && count($member_expectations) > 0)
    @foreach($member_expectations as $member_expectation)
        <tr class="edit-route-expectation" data-id='{{ $member_expectation->id }}' data-route="{{ route('members.expectation.edit', $member_expectation->id) }}">
            <td>{{ $member_expectation->rule_name ?? 'N/A' }}</td>
            <td>{{ $member_expectation->percent ?? 'N/A' }}</td>
            <td>{{ $member_expectation->amount ?? 'N/A' }}</td>
            <td>{!! Str::limit($member_expectation->remark ?? 'N/A', 50, ' ...') !!}</td> 
            
        </tr>
    @endforeach
  
@else
    <tr id="no-expectation">
        <td colspan="4" class="text-center">No Expectation Info Found</td>
    </tr>    

@endif
