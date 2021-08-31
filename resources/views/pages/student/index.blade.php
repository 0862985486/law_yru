
{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom">
  <div class="card-header flex-wrap border-0 pt-6 pb-0">
    <div class="card-title">
      <h2 class="card-label">ข้อมูลนักศึกษา
        <div class="text-muted pt-2 font-size-sm"></div>
      </h2>
    </div>
    <div class="card-toolbar">
      <!--begin::Button-->
      <a href="{{route('student.create')}}" class="btn btn-primary font-weight-bolder">
        <span class="svg-icon svg-icon-md">
          <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <rect x="0" y="0" width="24" height="24" />
              <circle fill="#000000" cx="9" cy="15" r="6" />
              <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
            </g>
          </svg>
          <!--end::Svg Icon-->
        </span>เพิ่มข้อมูลนักศึกษา</a>
      <!--end::Button-->
    </div>
  </div>
  <div class="card-body">
    <!--begin: Search Form-->
    <!--begin::Search Form-->
    <div class="mb-7">
      <div class="row align-items-center">
        <div class="col-lg-9 col-xl-8">
          <div class="row align-items-center">
            <div class="col-md-4 my-2 my-md-0">
              <div class="input-icon">
                <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                <span>
                  <i class="flaticon2-search-1 text-muted"></i>
                </span>
              </div>
            </div>
            <div class="col-md-4 my-2 my-md-0">
              <div class="d-flex align-items-center">
                <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                <select class="form-control" id="kt_datatable_search_status">
                  <option value="">All</option>
                  <option value="1">Active</option>
                  <option value="2">Inactive</option>
                </select>
              </div>
            </div>

          </div>
        </div>
        <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
          <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
        </div>
      </div>
    </div>
    <!--end::Search Form-->
    <!--end: Search Form-->
    <!--begin: Datatable-->
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif
    <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
      <thead>
        <tr>
          <th title="Field #1">รหัสนักศึกษา</th>
          <th title="Field #2">ชื่อ-สกุล</th>
          <th title="Field #2">ชั้นปี</th>
          <th title="Field #2">เลขบัตรประชาชน</th>
          <th title="Field #4">option</th>
          <th title="Field #5"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($student as $row)
        <tr>
        <td>{{$row['s_ID']}}</td>
        <td>{{$row['s_Name_th']}}  {{$row['s_Lname_th']}}</td>
        <td>3</td>
        <td>{{$row['s_p_ID']}}</td>

        <td>
        <span class="d-flex" style="width: 500px;/* display: flex; */">
            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">ดูเพิ่มเติม</button> --}}
            <a href="{{action('StudentController@edit',$row['id'])}}" class="btn btn-warning ml-2">แก้ใข</a>
            <form method="post" class="delete_form" action="{{action('StudentController@destroy',$row['id'])}}"><input type="hidden" name="_token" value="4reWQ07VzQTkF26nKceSK1dtJb5W4mOy8xW84fWU">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger ml-2" onclick="return confirm('คุณตั้งใจจะลบข้อมูลหรือไม่ ?');">ลบ</button>
            </form></span>
        </td>
        @endforeach
      </tbody>
    </table>
    <!--end: Datatable-->
  </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="form" id="kt_form" action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
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
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>

                <div class="my-5">
                  <div class="form-group row">
                      <label class=" col-2 col-form-label">คำนำหน้า</label>
                      <div class="col-2">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>

                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">ชื่อ</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">นามสกุล</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>

                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">ชื่อภาษาอังกฤษ</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">สกุลภาษาอังกฤษ</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>

                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">เลขบัตร ปปช</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">เบอร์โทร</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>



                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">สัญชาติ</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">เชื้อชาติ</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>

                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">ศาสนา</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">กรุ๊ปเลือด</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>

                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">ความพิการ</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">ที่อยู่ตามบัตร ปปช</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>


                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">ตำบลตามบัตร ปปช</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">อำเภอตามบัตร ปปช</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>


                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">จังหวัดตามบัตร ปปช</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">รหัสไปรษณีย์ ปปช</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>

                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">ที่อยู่ปัจจุบัน</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">ตำบลปัจจุบัน</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>


                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">อำเภอปัจจุบัน</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">จังหวัดปัจจุบัน</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>


                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">รหัสไปรษณีย์ปัจจุบัน</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">ระดับการศึกษา</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>


                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">รหัสสาขาวิชา</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">ปีการศึกษา</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>

                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">โรงเรียนที่จบ</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">สาขาที่จบ</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>


                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">ระดับการศึกษา</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">ที่อยู่โรงเรียนเดิม</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>


                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">ตำบลปัจจุบัน</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">อำเภอปัจจุบัน</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>


                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">จังหวัดปัจจุบัน</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">รหัสไปรษณีย์ปัจจุบัน</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>

                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">รหัส ปปช พ่อ</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>

                <div class="my-5">
                  <div class="form-group row">
                      <label class=" col-2 col-form-label">คำนำหน้า</label>
                      <div class="col-2">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>

                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">ชื่อ</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">นามสกุล</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>

                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">อาชีพ</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">รายได้</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>

                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">เบอร์โทร</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">สถาณะภาพ</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>


                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">รหัส ปปช แม่</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>

                <div class="my-5">
                  <div class="form-group row">
                      <label class=" col-2 col-form-label">คำนำหน้า</label>
                      <div class="col-2">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>

                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">ชื่อ</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">นามสกุล</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>

                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">อาชีพ</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">รายได้</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                  </div>
                </div>

                <div class="my-5">
                  <div class="form-group row">
                      <label class="col-2 col-form-label">เบอร์โทร</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
                      </div>
                      <label class="col-2 col-form-label">สถาณะภาพ</label>
                      <div class="col-4">
                      <input class="form-control" type="text" value="" id="example-text-input">
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

{{-- Styles Section --}}
@section('styles')

@endsection

{{-- Scripts Section --}}
@section('scripts')

<script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>

@endsection
