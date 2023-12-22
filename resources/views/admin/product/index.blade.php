@extends('admin.layouts.master')

@section('content')
    <section class="section">
      <div class="section-header">
        <h1>Product</h1>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Simple Table</h4>
                <div class="card-header-action">
                    <a href="{{route('admin.products.create')}}" class="btn btn-primary"> <i class="fas fa-plus"></i> create new</a>
                </div>
              </div>
              <div class="card-body">
                {{$dataTable->table()}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection
@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
