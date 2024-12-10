<form  action="{{ route('tada-journey.add') }}" method="POST" id="tada-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>From</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="from_location" id="from_location"/>
                                <span class="text-danger"></span>
                            </div>

                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>To</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="to_location" id="to_location"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Dept. Date/Time</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="dep_datetime" id="dep_datetime"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Dist. in KM</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="distance" id="distance"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Conveyance Mode</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="con_mode" id="con_mode"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Arrival Date/Time</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="arrival_datetime" id="arrival_datetime"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="amount" id="amount"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remark</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="remark" id="remark"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <input type="hidden" name="tada_adv_id" value="{{$tadaAdv->id}}"/>
                    <button type="submit" class="listing_add">Add</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
</form>


