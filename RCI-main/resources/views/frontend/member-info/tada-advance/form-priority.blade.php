<form  action="{{ route('tada-priority.add') }}" method="POST" id="tada-create-form">
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
                                <label>Days for Food</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="food_day" id="food_day"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount for Food</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="food_amount" id="food_amount"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Days for Hotel</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="hotel_day" id="hotel_day"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount for Hotel</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="hotel_amount" id="hotel_amount"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total DA</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="total_da" id="total_da"/>
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


