{{-- Extends layout --}}
@extends('layout.lawyer')

{{-- Content --}}
@section('content')
@foreach ($law as $row)
<form class="form" id="kt_form" action="{{action('LawyerController@update',$row->law_id)}}" method="POST" enctype="multipart/form-data">
<div class="card card-custom card-sticky" id="kt_page_sticky_card">
  <!--begin::Form-->
  <div class="card-header">
    <div class="card-title">
      <h3 class="card-label">
        ตรวจสอบกฎหมาย<i class="mr-2"></i>
      </h3>
    </div>
    <div class="card-toolbar">
      <!-- <a href="{{route('law.index')}}" class="btn btn-light-primary font-weight-bolder mr-2">
        <i class="ki ki-long-arrow-back icon-sm"></i>
        กลับ
      </a> -->
      <!-- <div class="btn-group">
        <button type="submit" id="save_form" class="btn btn-primary font-weight-bolder">
          <i class="ki ki-check icon-sm"></i>
          บันทึก
        </button>
      </div> -->
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
              <label class="col-3">ความเห็น</label>
              <div class="col-9">
              <textarea  class="form-control form-control-solid"  name="commet"  disabled>{{$row->comment}}</textarea>
              </div>
            </div>
          </div>

          <div class="my-5">
            <h3 class=" text-dark font-weight-bold mb-10"></h3>
            <div class="form-group row">
              <label class="col-3">กฎหมายที่ออกโดย</label>
              <div class="col-9">
              <select class="form-control form-control-solid" name="offer">
                  <option value="{{$row->offer}}">{{$row->offer}}</option>
                  <option value="เสนอสภามหาวิทยลัย">สภามหาวิทยาลัย</option>
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
              <select class="form-control form-control-solid" name="type">
                  <option value="{{$row->t_id}}">{{$row->name_type}}</option>
                  @foreach($type as $row1)
                  <option value="{{$row1->t_id}}">{{$row1->name_type}}</option>
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
              <textarea  class="form-control form-control-solid"  name="name_id" required>{{$row->name_id}}</textarea>
              </div>
            </div>
          </div>

          <div class="my-5">
            <h3 class=" text-dark font-weight-bold mb-10"></h3>
            <div class="form-group row">
              <label class="col-3">ชื่อ</label>
              <div class="col-9">
              <textarea  class="form-control form-control-solid"  name="law_name" required>{{$row->law_name}}</textarea>
              </div>
            </div>
          </div>

          <div class="my-5">
            <h3 class=" text-dark font-weight-bold mb-10"></h3>
            <div class="form-group row">
              <label class="col-3">ไฟล์กฎหมาย</label>
              <div class="col-9">
              <input type="file" class="form-control form-control-solid" id="test" name="file_law" accept="application/msword,text/plain, application/pdf"/>
              </div>
            </div>
          </div>


          <div class="my-5">
            <h3 class=" text-dark font-weight-bold mb-10"></h3>
            <div class="form-group row">
              <label class="col-3">ปีของกฎหมาย</label>
              <div class="col-9">
                <select name="year" id="year" class="form-control form-control-solid" required>
                    <option value="{{$row->year}}">{{$row->year}}</option>
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
                <input class="form-control form-control-solid" name="date_out" type="date" value="{{$row->date_out}}"  required/>
              </div>
            </div>
          </div>

          <input type="hidden" name="stutas" value="3"/>

          <input type="hidden" name="_method" value="PATCH"/>

           <div class="my-5">
            <h3 class=" text-dark font-weight-bold mb-10"></h3>
            <div class="form-group row">
            <label class="col-5"></label>
              <button
              type="submit" id="save_form" class="btn btn-danger font-weight-bolder"><i class="ki ki-check icon-sm"></i>แก้ใข
              </button>
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
    @endforeach






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
