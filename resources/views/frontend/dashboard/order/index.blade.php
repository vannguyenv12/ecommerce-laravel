@extends('frontend.dashboard.layouts.master')

@section('title')
{{$settings->site_name}} || Order
@endsection


@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
      @include('frontend.dashboard.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Orders</h3>

            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                {{$dataTable->table()}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script>
    $(document).ready(function() {
        $('body').on('click', '.change-status', function() {
            let isChecked = $(this).is(':checked');
            let id = $(this).data('id');

            $.ajax({
                url: "{{route('vendor.product.change-status')}}",
                method: 'PUT',
                data: {
                    status: isChecked,
                    id,
                },
                success: function(data) {
                    toastr.success(data.message);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            })
        })
    })
</script>
@endpush
