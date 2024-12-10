@if (isset($edit))
    <form action="{{ route('member-newspaper-allowance.update', $member_newspaper->id) }}" method="POST" id="member-newspaper-edit-form">
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
                                <select class="form-select" name="" id="member_id" disabled>
                                    <option value="">Select Member</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}" {{ $member_newspaper->member_id == $member->id ? 'selected':''}}>{{ $member->name}}</option>
                                    @endforeach
                                </select>

                                <input type="hidden"  name="member_id" value="{{ $member_newspaper->member_id ?? ''}}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label> Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="amount" id="amount" value="{{ $member_newspaper->amount ?? ''}}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                                {{-- <input type="text" class="form-control" name="year" value="{{ $member_newspaper->year ?? ''}}" id="year" placeholder=""> --}}
                                <select class="form-select" name="year" id="year">
                                    <option value="">Select Year</option>
                                    @for($i = date('Y'); $i >= 1558; $i--)
                                        <option value="{{ $i }}" {{ $member_newspaper->year == $i ? 'selected':''}}>{{ $i }}</option>
                                    @endfor
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-8 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="remarks" value="{{ $member_newspaper->remarks ?? ''}}" id="remarks" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
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
    <form action="{{ route('member-newspaper-allowance.store') }}" method="POST" id="member-newspaper-create-form">
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
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label> Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="amount" id="amount" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="year" id="year">
                                    <option value="">Select Year</option>
                                    @for($i = date('Y'); $i >= 1558; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-8 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="remarks" id="remarks" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Add</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
@endif
