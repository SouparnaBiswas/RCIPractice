@if (isset($edit))
    <form  action="{{ route('tada-plus.update', $data->id) }}" method="POST" id="tada-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Claimed Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="claim_amount" id="claim_amount" value="{{$data->claim_amount}}"/>
                                <span class="text-danger"></span>
                            </div>

                        </div>
                    </div>

                   <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Pass Adv. Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="pass_amount" id="pass_amount" value="{{$data->pass_amount}}"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>MRO</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="mro" id="mro" value="{{$data->mro}}"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Due Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="due_amount" id="due_amount" value="{{$data->due_amount}}"/>
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

@endif


