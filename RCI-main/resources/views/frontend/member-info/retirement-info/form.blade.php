@if (isset($edit))
    <form action="{{ route('member-retirement.update', $retirementInfo->id) }}" method="POST" id="retirement-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Member Name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="" id="member_id" disabled>
                                    <option value="">Select Member</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}" {{ ($member->id == $retirementInfo->member_id) ? 'selected' : '' }}>{{ $member->name }}</option>
                                    @endforeach
                                </select>

                                <input type="hidden"  name="member_id" value={{ $retirementInfo->member_id ?? '' }}>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Retirement Age</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" min="1" class="form-control" name="retirement_age" id="retirement_age" placeholder="" value="{{ $retirementInfo->retirement_age }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Retirement Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="retirement_date" id="retirement_date" placeholder="" value="{{ $retirementInfo->retirement_date }}" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Retirement Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="retirement_type" id="retirement_type">
                                    <option value="">Select Retirement Type</option>
                                    <option value="normal" {{ ($retirementInfo->retirement_type == 'normal') ? 'selected' : '' }}>Normal</option>
                                    <option value="voluntary" {{ ($retirementInfo->retirement_type == 'voluntary') ? 'selected' : '' }}>Voluntary</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Days (EL)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="el_days" id="el_days" placeholder="" value="{{ $retirementInfo->el_days }}" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Days (HPL)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="hpl_days" id="hpl_days" placeholder="" value="{{ $retirementInfo->hpl_days }}" >
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
    <form action="{{ route('member-retirement.store') }}" method="POST" id="retirement-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Member Name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select search-select-box" name="member_id" id="member_id">
                                    <option value="">Select Member</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Retirement Age</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" min="1"  class="form-control" name="retirement_age" id="retirement_age" placeholder="" value="60">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Retirement Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="retirement_date" id="retirement_date" placeholder="" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Retirement Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="retirement_type" id="retirement_type">
                                    <option value="">Select Retirement Type</option>
                                    <option value="normal">Normal</option>
                                    <option value="voluntary">Voluntary</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Days (EL)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="el_days" id="el_days" placeholder="" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Days (HPL)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="hpl_days" id="hpl_days" placeholder="" >
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
