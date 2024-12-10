@if (isset($edit))
    <form action="{{ route('inventory-projects.update', $inventory_project->id) }}" method="POST" id="inventory-projects-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Project Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="project_name" id="project_name" value="{{ $inventory_project->project_name ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Sanction Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="sanction_amount" id="sanction_amount" value="{{ $inventory_project->sanction_amount ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Sanction Authority</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="sanction_authority" id="sanction_authority">
                                    <option value="">Select Authority</option>
                                    @foreach($sanction_authorities as $sanction_authority)
                                        <option value="{{ $sanction_authority->id }}" {{ ($inventory_project->sanction_authority == $sanction_authority->id) ? 'selected' : '' }}>{{ $sanction_authority->name }}</option>
                                    @endforeach
                                    </select>
                                    <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PDC(Prabable date of completion)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="pdc" id="pdc_edit"  min="{{ date('Y-m-d')}}"  value="{{ $inventory_project->pdc ?? '' }}"
                                    placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PD(Project Director)</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="project_director" id="project_director">
                                    <option value="">Select PD</option>
                                    @foreach($project_directors as $project_director)
                                        <option value="{{ $project_director->id }}" {{ ($inventory_project->project_director == $project_director->id) ? 'selected' : '' }}>{{ $project_director->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Entry Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="entry_date" id="entry_date" value="{{ $inventory_project->entry_date ?? '' }}"
                                    placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>End Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="end_date" id="end_date_edit" value="{{ $inventory_project->end_date ?? '' }}"
                                    placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="1" {{ ($inventory_project->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($inventory_project->status == 0) ? 'selected' : '' }}>Inactive</option>
                                </select>
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
    <form action="{{ route('inventory-projects.store') }}" method="POST" id="inventory-projects-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Project Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="project_name" id="project_name" value=" "
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Sanction Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="sanction_amount" id="sanction_amount" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Sanction Authority</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="sanction_authority" id="sanction_authority">
                                    <option value="">Select Authority</option>
                                    @foreach($sanction_authorities as $sanction_authority)
                                        <option value="{{ $sanction_authority->id }}" >{{ $sanction_authority->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PDC(Prabable date of completion)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="pdc" id="pdc" 
                                    placeholder="" min="{{ date('Y-m-d')}}" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PD(Project Director)</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="project_director" id="project_director">
                                    <option value="">Select PD</option>
                                    @foreach($project_directors as $project_director)
                                        <option value="{{ $project_director->id }}" >{{ $project_director->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                   
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>End Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="end_date" id="end_date" readonly
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="1" >Active</option>
                                    <option value="0" >Inactive</option>
                                </select>
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
