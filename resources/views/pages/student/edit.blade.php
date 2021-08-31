{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')

<div class="card card-custom card-sticky" id="kt_page_sticky_card">
  <!--begin::Form-->
  <div class="card-header">
    <div class="card-title">
      <h3 class="card-label">
        เพิ่มข้อมูลนักศึกษา<i class="mr-2"></i>
      </h3>
    </div>
    <div class="card-toolbar">
      <a href="{{route('student.index')}}" class="btn btn-light-primary font-weight-bolder mr-2">
        <i class="ki ki-long-arrow-back icon-sm"></i>
        ยกเลิก
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
    <form class="form" id="kt_form" action="{{action('StudentController@update',$id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-xl-10">
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
            <div class="form-group row">
                <label class="col-2 col-col-form-label">รหัสนักศึกษา</label>
                <div class="col-5">
                <input class="form-control" type="text" name="s_ID" value="{{$student->s_ID}}" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class=" col-2 col-form-label">คำนำหน้า</label>
                <div class="col-2">
                <input class="form-control" type="text" value="{{$student->s_title}}" name="s_title" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ชื่อ</label>
                <div class="col-4">
                <input class="form-control" type="text"  name="s_Name_th" value="{{$student->s_Name_th}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">นามสกุล</label>
                <div class="col-4">
                <input class="form-control" type="text"  name="s_Lname_th" value="{{$student->s_Lname_th}}" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ชื่อภาษาอังกฤษ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="s_Name_en"  value="{{$student->s_Name_en}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">สกุลภาษาอังกฤษ</label>
                <div class="col-4">
                <input class="form-control" type="text" value="{{$student->s_Lname_en}}"  name="s_Lname_en" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">เลขบัตร ปปช</label>
                <div class="col-4">
                <input class="form-control" type="text"  name="s_p_ID" value="{{$student->s_p_ID}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">เบอร์โทร</label>
                <div class="col-4">
                <input class="form-control" type="text" name="s_tel" value="{{$student->s_tel}}" id="example-text-input">
                </div>
            </div>
          </div>



          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">สัญชาติ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="nationality"  value="{{$student->nationality}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">เชื้อชาติ</label>
                <div class="col-4">
                <input class="form-control" type="text"  name="race" value="{{$student->race}}" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ศาสนา</label>
                <div class="col-4">
                <input class="form-control" type="text"  name="religion" value="{{$student->religion}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">กรุ๊ปเลือด</label>
                <div class="col-4">
                <input class="form-control" type="text" name="blood_type"  value="{{$student->blood_type}}" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ความพิการ</label>
                <div class="col-4">
                <input class="form-control" type="text"  name="disability" value="{{$student->disability}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">ที่อยู่ตามบัตร ปปช</label>
                <div class="col-4">
                <input class="form-control" type="text"  name="addr_birthplace" value="{{$student->addr_birthplace}}" id="example-text-input">
                </div>
            </div>
          </div>


          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ตำบลตามบัตร ปปช</label>
                <div class="col-4">
                <input class="form-control" type="text"  name="addr_b_t" value="{{$student->addr_b_t}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">อำเภอตามบัตร ปปช</label>
                <div class="col-4">
                <input class="form-control" type="text"  name="addr_b_city" value="{{$student->addr_b_city}}" id="example-text-input">
                </div>
            </div>
          </div>


          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">จังหวัดตามบัตร ปปช</label>
                <div class="col-4">
                <input class="form-control" type="text" name="addr_b_prov"  value="{{$student->addr_b_prov}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">รหัสไปรษณีย์ ปปช</label>
                <div class="col-4">
                <input class="form-control" type="text" name="addr_b_post"  value="{{$student->addr_b_post}}" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ที่อยู่ปัจจุบัน</label>
                <div class="col-4">
                <input class="form-control" type="text" name="addr_cerrent"  value="{{$student->addr_cerrent}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">ตำบลปัจจุบัน</label>
                <div class="col-4">
                <input class="form-control" type="text "name="addr_c_t" value="{{$student->addr_c_t}}" id="example-text-input">
                </div>
            </div>
          </div>


          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">อำเภอปัจจุบัน</label>
                <div class="col-4">
                <input class="form-control" type="text" name="addr_c_city" value="{{$student->addr_c_city}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">จังหวัดปัจจุบัน</label>
                <div class="col-4">
                <input class="form-control" type="text" name="addr_c_prov" value="{{$student->addr_c_prov}}" id="example-text-input">
                </div>
            </div>
          </div>


          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">รหัสไปรษณีย์ปัจจุบัน</label>
                <div class="col-4">
                <input class="form-control" type="text" name="addr_c_post" value="{{$student->addr_c_post}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">ระดับการศึกษา</label>
                <div class="col-4">
                <input class="form-control" type="text" name="degree" value="{{$student->degree}}" id="example-text-input">
                </div>
            </div>
          </div>


          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">รหัสสาขาวิชา</label>
                <div class="col-4">
                <input class="form-control" type="text" name="majorID" value="{{$student->majorID}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">ปีการศึกษา</label>
                <div class="col-4">
                <input class="form-control" type="text" name="year_edu" value="{{$student->year_edu}}" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">โรงเรียนที่จบ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="old_school_name" value="{{$student->old_school_name}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">สาขาที่จบ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="old_major" value="{{$student->old_major}}" id="example-text-input">
                </div>
            </div>
          </div>


          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ระดับการศึกษา</label>
                <div class="col-4">
                <input class="form-control" type="text" name="old_degree" value="{{$student->old_degree}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">ที่อยู่โรงเรียนเดิม</label>
                <div class="col-4">
                <input class="form-control" type="text" name="old_school_add" value="{{$student->old_school_add}}" id="example-text-input">
                </div>
            </div>
          </div>


          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ตำบลปัจจุบัน</label>
                <div class="col-4">
                <input class="form-control" type="text" name="old_school_t" value="{{$student->old_school_t}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">อำเภอปัจจุบัน</label>
                <div class="col-4">
                <input class="form-control" type="text" name="old_school_city" value="{{$student->old_school_city}}" id="example-text-input">
                </div>
            </div>
          </div>


          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">จังหวัดปัจจุบัน</label>
                <div class="col-4">
                <input class="form-control" type="text" name="old_school_prov" value="{{$student->old_school_prov}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">รหัสไปรษณีย์ปัจจุบัน</label>
                <div class="col-4">
                <input class="form-control" type="text" name="old_school_post" value="{{$student->old_school_post}}" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">รหัส ปปช พ่อ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="father_pID" value="{{$student->father_pID}}" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class=" col-2 col-form-label">คำนำหน้า</label>
                <div class="col-2">
                <input class="form-control" type="text" name="father_title" value="{{$student->father_title}}" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ชื่อ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="father_name" value="{{$student->father_name}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">นามสกุล</label>
                <div class="col-4">
                <input class="form-control" type="text" name="father_lname" value="{{$student->father_lname}}" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">อาชีพ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="father_opt" value="{{$student->father_opt}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">รายได้</label>
                <div class="col-4">
                <input class="form-control" type="text" name="father_income" value="{{$student->father_income}}" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">เบอร์โทร</label>
                <div class="col-4">
                <input class="form-control" type="text" name="father_tel"  value="{{$student->father_tel}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">สถาณะภาพ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="father_status" value="{{$student->father_status}}" id="example-text-input">
                </div>
            </div>
          </div>


          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">รหัส ปปช แม่</label>
                <div class="col-4">
                <input class="form-control" type="text" name="mother_pID" value="{{$student->mother_pID}}" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class=" col-2 col-form-label">คำนำหน้า</label>
                <div class="col-2">
                <input class="form-control" type="text" name="mother_title" value="{{$student->mother_title}}" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ชื่อ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="mother_name" value="{{$student->mother_name}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">นามสกุล</label>
                <div class="col-4">
                <input class="form-control" type="text" name="mother_lname" value="{{$student->mother_lname}}" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">อาชีพ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="mother_opt" value="{{$student->mother_opt}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">รายได้</label>
                <div class="col-4">
                <input class="form-control" type="text" name="mother_income" value="{{$student->mother_income}}" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">เบอร์โทร</label>
                <div class="col-4">
                <input class="form-control" type="text" name="mother_tel" value="{{$student->mother_tel}}" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">สถาณะภาพ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="mother_status" value="{{$student->s_ID}}" id="example-text-input">
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
