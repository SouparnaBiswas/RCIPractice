@extends('frontend.layouts.master')
@section('title')
    logo
@endsection

@push('styles')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="breadcome-list">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h3>Logo</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="javascript:void(0);">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Change Logo</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="profile-container">
                    <form action="{{ route('logo.update') }}" method="POST" enctype="multipart/form-data">
                        <div class="row  mb-0">
                            <div class="col-lg-12">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-md-5 mb-3">
                                        <div class="row align-items-center">
                                            <label>Logo</label>
                                            <input type="file" class="form-control" value="{{old('logo')}}" name="logo" id="logo">
                                            @if ($errors->has('logo'))
                                                <span class="text-danger">{{ $errors->first('logo') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-7 mb-3">
                                        <label>Preview</label>
                                        @if (!isset($logo->logo))
                                                <a href="{{ asset('frontend_assets/images/logo.png') }}" target="_blank">
                                                    <img src="{{ asset('frontend_assets/images/logo.png') }}"
                                                         width="200px" height="180px"
                                                        alt="" id="image_preview" /></a>
                                        @else
                                            <a href="{{ Storage::url($logo->logo) }}" target="_blank">
                                                <img src="{{ Storage::url($logo->logo) }}"  id="image_preview"
                                                width="200px" height="180px" alt=""></a>
                                        @endif
                                    </div>
                                    
                                </div>
                                <div class="w-100 text-end">
                                    <button class="print_btn" type="submit">Update</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

<script>
    $(document).ready(function (e) {
        $('#logo').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#image_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>

@endpush
