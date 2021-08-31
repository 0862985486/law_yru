{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom card-sticky" id="kt_page_sticky_card">
  <!--begin::Form-->
  <div class="card-header">
    <div class="card-title">
      <h3 class="card-label">
        Create New Purchase Request <i class="mr-2"></i>
      </h3>
    </div>
    <div class="card-toolbar">
      <a href="{{route('purchase-order.index')}}" class="btn btn-light-primary font-weight-bolder mr-2">
        <i class="ki ki-long-arrow-back icon-sm"></i>
        Back
      </a>
      <div class="btn-group">
        <button type="submit" id="save_form" class="btn btn-primary font-weight-bolder">
          <i class="ki ki-check icon-sm"></i>
          Submit Form
        </button>
      </div>
    </div>
  </div>
  <div class="card-body">
    <form class="form" id="kt_form" action="{{ route('purchase-order.store') }}" method="POST" enctype="multipart/form-data">
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
            <h3 class=" text-dark font-weight-bold mb-10">PR Desciption:</h3>
            <div class="form-group row">
              <label class="col-3">Title</label>
              <div class="col-9">
                <input class="form-control form-control-solid" name="title" type="text" value="" />
              </div>
            </div>
            <div class="form-group row">
              <label class="col-3">Purpose</label>
              <div class="col-9">
                <textarea rows="5" name="purpose" class="form-control form-control-solid"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-3">Department</label>
              <div class="col-9">
                <select class="form-control form-control-solid" name="department_id">
                  <option value="">Select DepartMent</option>
                  @foreach ($department as $val)
                  <option value="{{$val->id}}">{{$val->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-3">Branch</label>
              <div class="col-9">
                <select class="form-control form-control-solid" name="branch_id">
                  <option value="">Select Branch</option>
                  @foreach ($branch as $val)
                  <option value="{{$val->id}}">{{$val->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-3">Company For Accounting</label>
              <div class="col-9">
                <select class="form-control form-control-solid" name="company_id">
                  <option value="">Select Company</option>
                  @foreach ($company as $val)
                  <option value="{{$val->id}}">{{$val->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-3">Department</label>
              <div class="col-9">
                <select class="form-control form-control-solid">
                  <option value="AF">Select DepartMent</option>
                  <option value="AF">Production</option>
                  <option value="AX">Accounting</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-3">Branch</label>
              <div class="col-9">
                <select class="form-control form-control-solid">
                  <option value="AF">Select Branch</option>
                  <option value="AF">Center(BKK)</option>
                  <option value="AX">South(Nara)</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-3">Company For Accounting</label>
              <div class="col-9">
                <select class="form-control form-control-solid">
                  <option value="AF">Select Company</option>
                  <option value="AF">Muslim For Peace</option>
                  <option value="AX">TND Multimedia</option>
                </select>
              </div>
            </div>
          </div>
          <div class="separator separator-dashed my-10"></div>
          <div class="my-5">
            <h3 class=" text-dark font-weight-bold mb-10">Products:</h3>
            <div class="form-group row">
              <label class="col-3">Product</label>
              <div class="col-9">
                <input class="form-control form-control-solid" name="product" type="text" value="" />
              </div>
            </div>
            <div class="form-group row">
              <label class="col-3">Product Image</label>
              <div class="col-9">
                <div class="image-input image-input-outline" id="kt_image_1">
                  <div class="image-input-wrapper" style="background-image: url(assets/media/users/blank.png)"></div>

                  <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
                    <i class="fa fa-pen icon-sm text-muted"></i>
                    <input type="file" accept=".png, .jpg, .jpeg" name="product_img" />
                    <input type="hidden" name="product_img_remove" />
                  </label>

                  <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel Image">
                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                  </span>
                </div>
              </div>
            </div>

          </div>
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