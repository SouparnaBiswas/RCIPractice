@if (isset($member_policies) && count($member_policies) > 0)
    @foreach ($member_policies as $member_policy)
        <tr class="edit-route-policy" data-id="{{ $member_policy->id }}" data-route="{{ route('members.policy-info.edit', $member_policy->id) }}">
            <td>{{ $member_policy->policy_name ?? 'N/A' }}</td>
            <td>{{ $member_policy->policy_no ?? 'N/A' }}</td>
            <td>{{ $member_policy->amount ?? 'N/A' }}</td>
            <td>{{ $member_policy->rec_stop ?? 'N/A' }}</td>
        </tr>
    @endforeach
@else
    <tr id="no-policy">
        <td colspan="4" class="text-center">No Policy Info Found</td>
    </tr>

@endif
