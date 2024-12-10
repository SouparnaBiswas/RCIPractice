@if (isset($edit))
    <form action="{{ route('member-family.update', $member_fam_edit->id) }}" method="POST" id="member-family-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-10">
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
                                        <option value="{{ $member->id }}" {{ $member_fam_edit->member_id == $member->id ? 'selected':''}}>{{ $member->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>

                            <input type="hidden" name="member_id" value="{{ $member_fam_edit->member_id }}">
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Parents :</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="father_mother_name" id="father_mother_name" value="{{$member_fam_edit->father_mother_name ?? ''}}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Dob</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="parent_dob" id="dob" value="{{$member_fam_edit->parent_dob ?? ''}}"  placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Working status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="parent_work_status" id="work_status">
                                    <option value="Working" {{ $member_fam_edit->parent_work_status == 'Working' ? 'selected' :''}}>Working</option>
                                    <option value="Not-working" {{ $member_fam_edit->parent_work_status == 'Not-working' ? 'selected' :''}}>Not Working</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Spouse :</label>
                            </div>
                        </div>
                    </div>
               
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="wife_hus_name" id="wife_hus_name" value="{{$member_fam_edit->wife_hus_name ?? ''}}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Dob</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="dob" id="dob" value="{{$member_fam_edit->dob ?? ''}}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Working status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="work_status" id="work_status">
                                    <option value="">Select Status</option>
                                    <option value="Working" {{ $member_fam_edit->work_status == 'Working' ? 'selected' :''}}>Working</option>
                                    <option value="Not-working" {{ $member_fam_edit->work_status == 'Not-working' ? 'selected' :''}}>Not Working</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                @if($member_childrens->count() > 0)
                @foreach($member_childrens as $key => $child)
                    <div class="row child-row" id="child-row">
                        <div class="form-group col-md-3 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label> Child Details:</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-5 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="child_name[]" value="{{ $child->child_name ?? ''}}" id="child1_name" placeholder="">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Dob</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="date" class="form-control" name="child_dob[]" value="{{ $child->child_dob ?? ''}}" id="child1_dob" placeholder="">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-3 mb-2">
                        </div>

                        <div class="form-group col-md-5 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>School</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="{{ $child->child_school ?? ''}}" name="child_scll_name[]" id="child1_scll_name" placeholder="">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-2 mb-2 d-flex align-items-center justify-content">
                            <button type="button" class="btn btn-danger btn-sm remove-child" >✖</button>
                        </div>
                    </div>
                @endforeach
                @endif

                <div class="form-group col-md-2 mb-2">
                    <div class="col-md-12">
                        <label></label>
                    </div>
                    <div class="row align-items-center">
                        <button type="button" class="listing_add add_more">Add More</button>
                    </div>
                </div>
                

                <div class="row" >
                    <div id="family_member">
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
    <form action="{{ route('member-family.store') }}" method="POST" id="member-family-create-form">
        @csrf
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Member</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select select-box-drop" name="member_id" id="member_id">
                                    <option value="">Select Member</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Parents:</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="father_mother_name" id="father_mother_name" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Dob</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="parent_dob" id="dob"  placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Working status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="parent_work_status" id="work_status">
                                    <option value="Working" >Working</option>
                                    <option value="Not-working" >Not Working</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Spouse :</label>
                            </div>
                        </div>
                    </div>
               
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="wife_hus_name" id="wife_hus_name" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Dob</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="dob" id="dob" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Working status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="work_status" id="work_status">
                                    <option value="">Select Status</option>
                                    <option value="Working">Working</option>
                                    <option value="Not-working">Not Working</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label> Child Details:</label>
                            </div>
                        </div>
                    </div>
               
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="child_name[]" id="child1_name" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Dob</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="child_dob[]" id="child1_dob" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>School</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="child_scll_name[]" id="child1_scll_name" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-md-2 mb-2">
                        <div class="col-md-12">
                            <label></label>
                        </div>
                        <div class="row align-items-center">
                            <button type="button" class="listing_add add_more">Add More</button>
                        </div>
                    </div>
                </div>

                <div class="row" >
                    <div id="family_member">
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
