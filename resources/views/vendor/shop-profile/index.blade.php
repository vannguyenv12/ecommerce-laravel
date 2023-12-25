@extends('vendor.layouts.master')

@section('title')
{{$settings->site_name}} || Shop Profile
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
      @include('vendor.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Shop Profile</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <form action="{{route('vendor.shop-profile.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Preview</label>
                        <br>
                        <img width="200px" src="{{asset($profile->banner)}}" alt="" />
                    </div>
                    <div class="form-group wsus__input">
                        <label for="">Banner</label>
                        <input type="file" class="form-control" name="banner">
                    </div>
                    <div class="form-group wsus__input">
                        <label for="">Shop Name</label>
                        <input type="text" class="form-control" name="shop_name" value="{{$profile->shop_name}}">
                    </div>
                    <div class="form-group wsus__input">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{$profile->phone}}">
                    </div>
                    <div class="form-group wsus__input">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="{{$profile->email}}">
                    </div>
                    <div class="form-group wsus__input">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" value="{{$profile->address}}">
                    </div>
                    <div class="form-group wsus__input">
                        <label for="">Description</label>
                        <textarea class="summernote" name="description">{{$profile->description}}</textarea>
                    </div>
                    <div class="form-group wsus__input">
                        <label for="">Facebook</label>
                        <input type="text" class="form-control" name="fb_link" value="{{$profile->fb_link}}">
                    </div>
                    <div class="form-group wsus__input">
                        <label for="">Twitter</label>
                        <input type="text" class="form-control" name="tw_link" value="{{$profile->tw_link}}">
                    </div>
                    <div class="form-group wsus__input">
                        <label for="">Instagram</label>
                        <input type="text" class="form-control" name="insta_link" value="{{$profile->insta_link}}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
