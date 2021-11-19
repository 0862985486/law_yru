{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<form class="form" id="kt_form" action="{{ route('law.store') }}" method="POST" enctype="multipart/form-data">
<div class="card card-custom card-sticky" id="kt_page_sticky_card">
  <!--begin::Form-->
  <div class="card-header">
    <div class="card-title">
      <h3 class="card-label">
        เพิ่มกฎหมายใหม่<i class="mr-2"></i>
      </h3>
    </div>
    <div class="card-toolbar">
      <a href="{{route('law.index')}}" class="btn btn-light-primary font-weight-bolder mr-2">
        <i class="ki ki-long-arrow-back icon-sm"></i>
        กลับ
      </a>
      <div class="btn-group">
        <button type="submit" id="save_form" class="btn btn-primary font-weight-bolder">
          <i class="ki ki-check icon-sm"></i>
          บันทึก
        </button>
      </div>
    </div>
  </div>
  <div class="card-body">
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
            <h3 class=" text-dark font-weight-bold mb-10"></h3>
            <div class="form-group row">
              <label class="col-3">กฎหมายที่ออกโดย</label>
              <div class="col-9">
              <select class="form-control form-control-solid" name="offer" required >
                  <option value="">เลือกเสนอ</option>
                  <option value="เสนอสภามหาวิทยาลัย">สภามหาวิทยาลัย</option>
                  <option value="เสนอมหาวิทยาลัย">มหาวิทยาลัย</option>
                  <option value="คณะกรรมการอื่นๆ">คณะกรรมการอื่นๆ</option>
              </select>
              </div>
              </button>
            </div>
          </div>
          <div class="my-5">
            <h3 class=" text-dark font-weight-bold mb-10"></h3>
            <div class="form-group row">
              <label class="col-3">ประเภท</label>
              <div class="col-9">
              <select class="form-control form-control-solid" name="type" required>
                  <option value="">เลือกประเภท</option>
                  @foreach($type as $row)
                  <option value="{{$row->t_id}}">{{$row->name_type}}</option>
                  @endforeach
              </select>
              </div>
            </div>
          </div>

          <div class="my-5">
            <h3 class=" text-dark font-weight-bold mb-10"></h3>
            <div class="form-group row">
              <label class="col-3">เรื่อง</label>
              <div class="col-9">
              <input list="browsers" class="form-control form-control-solid" id="browser" name="name_id" required>
              <datalist id="browsers" >
                @foreach($name as $row)
                <option value="{{$row->name_id}}">
                @endforeach
            </datalist>
              </div>
            </div>
          </div>

          <div class="my-5">
            <h3 class=" text-dark font-weight-bold mb-10"></h3>
            <div class="form-group row">
              <label class="col-3">ชื่อ</label>
              <div class="col-9">
                <input class="form-control form-control-solid" name="law_name" type="text" value="" required />
              </div>
            </div>
          </div>
          <div class="my-5">
            <h3 class=" text-dark font-weight-bold mb-10"></h3>
            <div class="form-group row">
              <label class="col-3">ไฟล์กฎหมาย</label>
              <div class="col-9">
              <input type="file" class="form-control form-control-solid" id="test" name="file_law" accept="application/msword,text/plain, application/pdf" required/>
              </div>
            </div>
          </div>

          <div class="my-5">
            <h3 class=" text-dark font-weight-bold mb-10"></h3>
            <div class="form-group row">
              <label class="col-3">ปีของกฎหมาย</label>
              <div class="col-9">
                <select name="year" id="year" class="form-control form-control-solid" required>
                    <option value="">เลือกปี</option>
                    <?php for ($i = 0; $i <= 30; $i++) {?>
                    <option value="<?php echo date("Y") - $i + 543; ?>"><?php echo date("Y") - $i + 543; ?></option>
                    <?php }?>
                </select>
              </div>
            </div>
          </div>

          <div class="my-5">
            <h3 class=" text-dark font-weight-bold mb-10"></h3>
            <div class="form-group row">
              <label class="col-3">วันที่ประกาศ</label>
              <div class="col-9">
                <input type="date" class="form-control form-control-solid" name="date_out" value="" required>
              </div>
            </div>
          </div>


          <div class="separator separator-dashed my-10"></div>

        </div>
        <div class="col-xl-2"></div>
        <!--end::Form-->

  </div>


</div>

</div>
</form>






@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
  $(document).ready(function() {
    $('.select2').select2();
    $('#save_form').on('click', function() {
      // window.location = "/purchase-order";
      //$('#kt_form').submit();
    });
  });
  var avatar1 = new KTImageInput('kt_image_1');
</script>
@endsection
