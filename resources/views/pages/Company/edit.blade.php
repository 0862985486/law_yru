{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom card-sticky" id="kt_page_sticky_card">
  <!--begin::Form-->
  <div class="card-header">
    <div class="card-title">
      <h3 class="card-label">
        Update Company<i class="mr-2"></i>
      </h3>
    </div>
    <div class="card-toolbar">
      <a href="{{route('company.index')}}" class="btn btn-light-primary font-weight-bolder mr-2">
        <i class="ki ki-long-arrow-back icon-sm"></i>
        Back
      </a>
      <div class="btn-group">
        <button type="submit" id="save_form" class="btn btn-primary font-weight-bolder">
          <i class="ki ki-check icon-sm"></i>
          Update
        </button>
      </div>
    </div>
  </div>
  <div class="card-body">
    <form class="form" id="kt_form" action="{{action('CompanyController@update',$id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
          @if ($errors->any())
          <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <div class="my-5">
            <h3 class=" text-dark font-weight-bold mb-10">Company :</h3>
            <div class="form-group row">
              <label class="col-3">Name</label>
              <div class="col-9">
                <input class="form-control form-control-solid" name="name" type="text" value="{{$company->name}}" />
              </div>
            </div>
          </div>
          <input type="hidden" name="_method" value="PATCH"/>
          <div class="separator separator-dashed my-10"></div>

        </div>
        <div class="col-xl-2"></div>
        <!--end::Form-->
    </form>
  </div>


</div>

</div>


@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
  $(document).ready(function() {
    $('.select2').select2();
    $('#save_form').on('click', function() {
      // window.location = "/purchase-order";
      $('#kt_form').submit();
    });
  });
  var avatar1 = new KTImageInput('kt_image_1');
</script>
@endsection
