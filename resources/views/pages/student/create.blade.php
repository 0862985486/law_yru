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
    <form class="form" id="kt_form" action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
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
                <input class="form-control" type="text" name="s_ID" value="" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class=" col-2 col-form-label">คำนำหน้า</label>
                <div class="col-2">
                    <select class="form-control form-control" name="s_title">
                        <option value="">คำนำหน้า</option>
                        <option value="นาย">นาย</option>
                        <option value="นาย">นาง</option>
                        <option value="นาย">นางสาว</option>
                    </select>
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ชื่อ</label>
                <div class="col-4">
                <input class="form-control" type="text"  name="s_Name_th" value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">นามสกุล</label>
                <div class="col-4">
                <input class="form-control" type="text"  name="s_Lname_th" value="" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ชื่อภาษาอังกฤษ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="s_Name_en"  value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">สกุลภาษาอังกฤษ</label>
                <div class="col-4">
                <input class="form-control" type="text" value=""  name="s_Lname_en" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">เลขบัตรประจำตัวประชาชน</label>
                <div class="col-4">
                <input class="form-control" type="text"  name="s_p_ID" value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">เบอร์โทร</label>
                <div class="col-4">
                <input class="form-control" type="text" name="s_tel" value="" id="example-text-input">
                </div>
            </div>
          </div>



          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">สัญชาติ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="nationality"  value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">เชื้อชาติ</label>
                <div class="col-4">
                <input class="form-control" type="text"  name="race" value="" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ศาสนา</label>
                <div class="col-4">
                  <select class="form-control form-control" name="religion">
                    <option value="">เลือกศาสนา</option>
                    <option value="อิสลาม">อิสลาม</option>
                    <option value="B">พุทธ</option>
                    <option value="O">คริสต์</option>
                    <option value="AB">พราหมณ์-ฮินดู </option>
                </select>
                </div>
                <label class="col-2 col-form-label">กรุ๊ปเลือด</label>
                <div class="col-4">
                    <select class="form-control form-control" name="blood_type">
                        <option value="">เลือกกรุ๊ปเลือด</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="O">O</option>
                        <option value="AB">AB</option>
                    </select>
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ความพิการ</label>
                <div class="col-4">
                  <select class="form-control form-control" name="disability">
                    <option value="">เลือกความพิการ</option>
                    <option value="ไม่มี">ไม่มี</option></option>
                    <option value="ทางการเห็น">ทางการเห็น</option>
                    <option value="การได้ยิน">การได้ยิน</option>
                    <option value="ทางร่างกาย">ทางร่างกาย</option>
                    <option value="ทางการเรียนรู้">ทางการเรียนรู้</option>
                    <option value="ทางการพูด และภาษา">ทางการพูด และภาษา</option>
                    <option value="ทางพฤติกรรม หรืออารมณ์">ทางพฤติกรรม หรืออารมณ์</option>
                    <option value="ออทิสติก">ออทิสติก</option>
                </select>
                </div>
                <label class="col-2 col-form-label">ที่อยู่ตามบัตร ปปช</label>
                <div class="col-4">
                <input class="form-control" type="text"  name="addr_birthplace" value="" id="example-text-input">
                </div>
            </div>
          </div>


          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ตำบลตามบัตรประจำตัวประชาชน</label>
                <div class="col-4">
                <input class="form-control" type="text"  name="addr_b_t" value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">อำเภอตามบัตร ปปช</label>
                <div class="col-4">
                <input class="form-control" type="text"  name="addr_b_city" value="" id="example-text-input">
                </div>
            </div>
          </div>


          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">จังหวัดตามบัตรประจำตัวประชาชน</label>
                <div class="col-4">
                <input class="form-control" type="text" name="addr_b_prov"  value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">รหัสไปรษณีย์ ปปช</label>
                <div class="col-4">
                <input class="form-control" type="text" name="addr_b_post"  value="" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ที่อยู่ปัจจุบัน</label>
                <div class="col-4">
                <input class="form-control" type="text" name="addr_cerrent"  value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">ตำบลปัจจุบัน</label>
                <div class="col-4">
                <input class="form-control" type="text "name="addr_c_t" value="" id="example-text-input">
                </div>
            </div>
          </div>


          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">อำเภอปัจจุบัน</label>
                <div class="col-4">
                <input class="form-control" type="text" name="addr_c_city" value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">จังหวัดปัจจุบัน</label>
                <div class="col-4">
                <input class="form-control" type="text" name="addr_c_prov" value="" id="example-text-input">
                </div>
            </div>
          </div>


          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">รหัสไปรษณีย์ปัจจุบัน</label>
                <div class="col-4">
                <input class="form-control" type="text" name="addr_c_post" value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">ระดับการศึกษา</label>
                <div class="col-4">
                <input class="form-control" type="text" name="degree" value="" id="example-text-input">
                </div>
            </div>
          </div>


          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">รหัสสาขาวิชา</label>
                <div class="col-4">
                <input class="form-control" type="text" name="majorID" value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">ปีการศึกษา</label>
                <div class="col-4">
                <input class="form-control" type="text" name="year_edu" value="" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">โรงเรียนที่จบ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="old_school_name" value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">สาขาที่จบ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="old_major" value="" id="example-text-input">
                </div>
            </div>
          </div>


          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ระดับการศึกษา</label>
                <div class="col-4">
                <input class="form-control" type="text" name="old_degree" value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">ที่อยู่โรงเรียนเดิม</label>
                <div class="col-4">
                <input class="form-control" type="text" name="old_school_add" value="" id="example-text-input">
                </div>
            </div>
          </div>


          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ตำบลปัจจุบัน</label>
                <div class="col-4">
                <input class="form-control" type="text" name="old_school_t" value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">อำเภอปัจจุบัน</label>
                <div class="col-4">
                <input class="form-control" type="text" name="old_school_city" value="" id="example-text-input">
                </div>
            </div>
          </div>


          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">จังหวัดปัจจุบัน</label>
                <div class="col-4">
                <input class="form-control" type="text" name="old_school_prov" value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">รหัสไปรษณีย์ปัจจุบัน</label>
                <div class="col-4">
                <input class="form-control" type="text" name="old_school_post" value="" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">เลขบัตรประจำตัวประชาชนบิดา</label>
                <div class="col-4">
                <input class="form-control" type="text" name="father_pID" value="" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class=" col-2 col-form-label">คำนำหน้า</label>
                <div class="col-2">
                    <select class="form-control form-control" name="father_title">
                        <option value="">คำนำหน้า</option>
                        <option value="นาย">นาย</option>
                        <option value="นาย">นาง</option>
                        <option value="นาย">นางสาว</option>
                    </select>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ชื่อ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="father_name" value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">นามสกุล</label>
                <div class="col-4">
                <input class="form-control" type="text" name="father_lname" value="" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">อาชีพ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="father_opt" value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">รายได้</label>
                <div class="col-4">
                <input class="form-control" type="text" name="father_income" value="" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">เบอร์โทร</label>
                <div class="col-4">
                <input class="form-control" type="text" name="father_tel"  value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">สถาณะภาพ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="father_status" value="" id="example-text-input">
                </div>
            </div>
          </div>


          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">เลขบัตรประจำตัวประชาชนมารดา</label>
                <div class="col-4">
                <input class="form-control" type="text" name="mother_pID" value="" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class=" col-2 col-form-label">คำนำหน้า</label>
                <div class="col-2">
                <select class="form-control form-control" name="mother_title">
                    <option value="">คำนำหน้า</option>
                    <option value="นาย">นาย</option>
                    <option value="นาย">นาง</option>
                    <option value="นาย">นางสาว</option>
                </select>
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">ชื่อ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="mother_name" value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">นามสกุล</label>
                <div class="col-4">
                <input class="form-control" type="text" name="mother_lname" value="" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">อาชีพ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="mother_opt" value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">รายได้</label>
                <div class="col-4">
                <input class="form-control" type="text" name="mother_income" value="" id="example-text-input">
                </div>
            </div>
          </div>

          <div class="my-5">
            <div class="form-group row">
                <label class="col-2 col-form-label">เบอร์โทร</label>
                <div class="col-4">
                <input class="form-control" type="text" name="mother_tel" value="" id="example-text-input">
                </div>
                <label class="col-2 col-form-label">สถาณะภาพ</label>
                <div class="col-4">
                <input class="form-control" type="text" name="mother_status" value="" id="example-text-input">
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
    $('#save_form').on('click', function() {
       $('#kt_form').submit();
    });
    $('.select2').select2();
    FormValidation.formValidation(
      document.getElementById('kt_form'), {
        fields: {


          s_ID: {
            validators: {
              notEmpty: {
                message: ' กรุณากรอกรหัสนักศึกษา '
              }
            }
          },

          s_title: {
            validators: {
              notEmpty: {
                message: ' เลือกคำนำหน้า '
              }
            }
          },

          s_Name_th: {
            validators: {
              notEmpty: {
                message: ' กรุณากรอกชื่อ '
              }
            }
          },

          s_Lname_th: {
            validators: {
              notEmpty: {
                message: ' กรุณากรอกนามสกุล '
              }
            }
          },


          s_Name_en: {
            validators: {
              notEmpty: {
                message: 'กรุณากรอกนามชื่อภาษาอังกฤษ '
              }
            }
          },

          s_Lname_en: {
            validators: {
              notEmpty: {
                message: ' กรณากรอกนามสกุลภาษาอังกฤษ '
              }
            }
          },


          s_p_ID: {
            validators: {
              notEmpty: {
                message: ' กรุณากรอกเลขประจำตัวประชาชน '
              }
            }
          },

          s_tel: {
            validators: {
              notEmpty: {
                message: ' กรุณากรอกเบอร์โทรศัพท์ '
              }
            }
          },

          nationality: {
            validators: {
              notEmpty: {
                message: ' กรุณรากรอกสัญชาติ '
              }
            }
          },

          race: {
            validators: {
              notEmpty: {
                message: ' กรุณากรอกสัญชาติ '
              }
            }
          },

          religion: {
            validators: {
              notEmpty: {
                message: ' เลือกศาสนา '
              }
            }
          },

          blood_type: {
            validators: {
              notEmpty: {
                message: ' เลือกกรุ๊ปเลือด '
              }
            }
          },

          disability: {
            validators: {
              notEmpty: {
                message: ' เลือกความพิการ '
              }
            }
          },

          addr_birthplace: {
            validators: {
              notEmpty: {
                message: ' เพิ่มที่อยู่ตามบัตรประชาชน '
              }
            }
          },

          addr_birthplace: {
            validators: {
              notEmpty: {
                message: ' เพิ่มที่อยู่ตามบัตรประชาชน '
              }
            }
          },


          addr_b_t: {
            validators: {
              notEmpty: {
                message: ' เพิ่มตำบลตามบัตรประชาชน '
              }
            }
          },

          addr_b_city: {
            validators: {
              notEmpty: {
                message: ' เพิ่มอำเภอตามบัตรประชาชน '
              }
            }
          },

          addr_b_prov: {
            validators: {
              notEmpty: {
                message: ' เพิ่มจังหวัดตามบัตรประชาชน '
              }
            }
          },

          addr_b_prov: {
            validators: {
              notEmpty: {
                message: ' เพิ่มจังหวัดตามบัตรประชาชน '
              }
            }
          },

          addr_c_post: {
            validators: {
              notEmpty: {
                message: ' เพิ่มรหัสไปรษณีย์ตามบัตรประชาชน '
              }
            }
          },

          addr_cerrent: {
            validators: {
              notEmpty: {
                message: ' เพิ่มที่อยู่ปัจจุบัน '
              }
            }
          },

          addr_c_t: {
            validators: {
              notEmpty: {
                message: ' เพิ่มที่ตำบลปัจจุบัน '
              }
            }
          },

          addr_c_city: {
            validators: {
              notEmpty: {
                message: ' เพิ่มอำเภอปัจจุบัน '
              }
            }
          },

          addr_c_prov: {
            validators: {
              notEmpty: {
                message: ' เพิ่มจังหวัดปัจจุบัน '
              }
            }
          },

          addr_c_post: {
            validators: {
              notEmpty: {
                message: ' เพิ่มไปรษณีย์ปัจจุบัน '
              }
            }
          },

          degree: {
            validators: {
              notEmpty: {
                message: ' ระดัการศึกษา '
              }
            }
          },

          majorID: {
            validators: {
              notEmpty: {
                message: ' รหัสสาขาวิชา '
              }
            }
          },

          majorID: {
            validators: {
              notEmpty: {
                message: ' รหัสสาขาวิชา '
              }
            }
          },

          year_edu: {
            validators: {
              notEmpty: {
                message: ' ปีการศึกษา '
              }
            }
          },

          year_edu: {
            validators: {
              notEmpty: {
                message: ' เพิ่มปีการศึกษา '
              }
            }
          },

          old_school_name: {
            validators: {
              notEmpty: {
                message: ' เพิ่มโรงเรียนที่จบ '
              }
            }
          },


          old_major: {
            validators: {
              notEmpty: {
                message: ' เพิ่มสาขาที่จบ '
              }
            }
          },


          old_degree: {
            validators: {
              notEmpty: {
                message: ' ระดับการศึกษา '
              }
            }
          },

          old_school_add: {
            validators: {
              notEmpty: {
                message: ' เพิ่มที่อยู่โรงเรียนเดิม '
              }
            }
          },

          old_school_t: {
            validators: {
              notEmpty: {
                message: ' เพิ่มตำบลโรงเรียนเดิม '
              }
            }
          },

          old_school_city: {
            validators: {
              notEmpty: {
                message: ' เพิ่มอำเภอโรงเรียนเดิม '
              }
            }
          },

          old_school_prov: {
            validators: {
              notEmpty: {
                message: ' เพิ่มจังหวัดโรงเรียนเดิม '
              }
            }
          },

          old_school_post: {
            validators: {
              notEmpty: {
                message: ' เพิ่มรหัสไปรษณีโรงเรียนเดิม '
              }
            }
          },

          father_pID: {
            validators: {
              notEmpty: {
                message: ' เพิ่มรหัสประจำตัวประชาชนบิดา '
              }
            }
          },

          father_title: {
            validators: {
              notEmpty: {
                message: ' เลือกคำนำหน้า '
              }
            }
          },

          father_name: {
            validators: {
              notEmpty: {
                message: ' เพิ่มชื่อบิดา '
              }
            }
          },

          father_lname: {
            validators: {
              notEmpty: {
                message: ' เพิ่มนามสกุลบิดา '
              }
            }
          },

          father_opt: {
            validators: {
              notEmpty: {
                message: ' เลือกอาชีพบิดา '
              }
            }
          },

          father_income: {
            validators: {
              notEmpty: {
                message: 'เลือกรายได้ '
              }
            }
          },

          father_income: {
            validators: {
              notEmpty: {
                message: 'เลือกรายได้ '
              }
            }
          },

          father_tel: {
            validators: {
              notEmpty: {
                message: 'เพิ่มเบอร์โทรศัพท์ '
              }
            }
          },

          father_status: {
            validators: {
              notEmpty: {
                message: 'เลือกสถานะภาพบิดา '
              }
            }
          },

          mother_pID: {
            validators: {
              notEmpty: {
                message: 'เพิ่มรหัสประจำตัวประชาชนมารดา '
              }
            }
          },

          mother_title: {
            validators: {
              notEmpty: {
                message: 'เลือกคำนำหน้า '
              }
            }
          },

          mother_name: {
            validators: {
              notEmpty: {
                message: 'เพิ่มชื่อมารดา '
              }
            }
          },

          mother_lname: {
            validators: {
              notEmpty: {
                message: 'เพิ่มนามสกุลมารดา '
              }
            }
          },

          mother_opt: {
            validators: {
              notEmpty: {
                message: 'เลือกอาชีพมารดา '
              }
            }
          },

          mother_income: {
            validators: {
              notEmpty: {
                message: 'เลือกรายได้มารดา '
              }
            }
          },

          mother_tel: {
            validators: {
              notEmpty: {
                message: ' เพิ่มเบอร์โทรศัพท์มารดา '
              }
            }
          },

          mother_status: {
            validators: {
              notEmpty: {
                message: ' เลือกสถานะภาพมารดา '
              }
            }
          },

        },

        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          // Bootstrap Framework Integration
          bootstrap: new FormValidation.plugins.Bootstrap(),
          // Validate fields when clicking the Submit button
          submitButton: new FormValidation.plugins.SubmitButton(),
          // Submit the form when all fields are valid
          defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
        }
      }
    );
  });
</script>
@endsection
