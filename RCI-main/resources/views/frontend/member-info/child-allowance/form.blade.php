@if (isset($edit))
    <form action="{{ route('child-allowance.update', $member_id)}}" method="POST" id="member-child-allowance-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Member</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text"  name="member_id" value="{{ $member_id }}" hidden>
                                <select class="form-select" name="member" id="member_id" disabled>
                                    <option value="">Select Member</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}" {{ $member_id == $member->id ? 'selected':''}}>{{ $member->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label> Year</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="year" id="year">
                                    <option value="">Select Year</option>
                                    @foreach(range(date('Y'), 1958) as $year)
                                        <option value="{{ $year }}" {{ $edit_year == $year ? 'selected' : ''}}>{{ $year }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="children-form">
                        @include('frontend.member-info.child-allowance.child-form')
                    </div>
                    
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Update</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('child-allowance.store') }}" method="POST" id="member-child-allowance-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Member</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select search-select-box" name="member_id" id="member_id">
                                    <option value="">Select Member</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label> Year</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="year" id="year">
                                    <option value="">Select Year</option>
                                    @foreach(range(date('Y'), 1958) as $year)
                                        <option value="{{ $year }}" >{{ $year }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="row" id="children-form">
                    @include('frontend.member-info.child-allowance.child-form')
                </div>
                   
            </div>
            <div class="col-md-2">
                <div class="row justify-content-end">
                    <div class="form-group col-md-6 mb-2">
                        <button type="submit" class="listing_add">Generate</button>
                    </div>
                    
                    {{-- <div class="form-group col-md-6 mb-2">
                        <button type="submit" class="listing_exit">Cancel</button>
                    </div> --}}
                </div>
            </div>
        </div>
    </form>
@endif
