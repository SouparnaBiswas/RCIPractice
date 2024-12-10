@if (isset($edit))
    <form action="{{ route('payscales.update', $payscale->id) }}" method="POST" id="payscale-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="form-group col-md-6 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Scale Type</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="payscale_type_id" id="payscale_type_id">
                                <option value="">Select Scale Type</option>
                                @foreach ($payscale_types as $scaleType)
                                    <option value="{{ $scaleType->id }}" {{ ($payscale->payscale_type_id == $scaleType->id) ? 'selected' : '' }}>{{ $scaleType->payscale_type }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="payscale_type_id-error"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Scale Number</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control payscale_number" name="payscale_number" id="payscale_number" value="{{ $payscale->payscale_number }}"
                                placeholder="xxxxx-xxx-xxxxx">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Basic 1</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="{{ $payscale->basic1 }}" name="basic1"
                                id="basic1" placeholder="">
                            <span class="text-danger" id="basic1-error"></span>
                        </div>
                    </div>
                </div>
               
                {{-- increment 1 --}}
                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Increment 1</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="{{ $payscale->increment1 }}" name="increment1"
                                id="increment1" placeholder="">
                            <span class="text-danger" id="increment1-error"></span>
                        </div>
                    </div>
                </div>
                {{-- increment 2 --}}
                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Increment 2</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="{{ $payscale->increment2 }}" name="increment2"
                                id="increment2" placeholder="">
                            <span class="text-danger" id="increment2-error"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <label></label>   
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
    <form action="{{ route('payscales.store') }}" method="POST" id="payscale-create-form">
        @csrf
        <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="form-group col-md-6 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Scale Type</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="payscale_type_id" id="payscale_type_id">
                                <option value="">Select Scale Type</option>
                                @foreach ($payscale_types as $scaleType)
                                    <option value="{{ $scaleType->id }}">{{ $scaleType->payscale_type }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Scale Number</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control payscale_number" name="payscale_number" id="payscale_number"
                                placeholder="xxxxx-xxx-xxxxx">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Basic 1</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  name="basic1"
                                id="basic1" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                
                {{-- increment 1 --}}
                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Increment 1</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  name="increment1"
                                id="increment1" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                {{-- increment 2 --}}
                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Increment 2</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  name="increment2"
                                id="increment2" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <label></label>   
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

