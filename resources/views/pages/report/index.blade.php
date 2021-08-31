{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}

@section('content')

<div class="card card-custom card-sticky" id="kt_page_sticky_card">
  <!--begin::Form-->
  <div class="card-header">
    <div class="card-title">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" >
              <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">PDF</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Exect</a>
            </li>
        </ul>
    </div>
  </div>
  <div class="card-body">
    @csrf
    <div class="row">
      <div class="col-xl-1"></div>
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

        <div class="tab-content">
            <div class="tab-pane fade in active show" id="profile" >
                <form class="form" id="kt_form" action="report/pdf" method="get" enctype="multipart/form-data"
                    target="_blank" >

                            <div class="my-12">
                                <h4>รายงานประจำปี</h4>
                                <br>
                                <div class="form-group row">
                                <label>กฎหมายที่ออกโดย</label>
                                <div class="col-3">
                                    <select class="form-control" name="offer" >
                                    <option value="">เลือกทั้งหมด</option>
                                    <option value="เสนอสภามหาวิทยลัย">สภามหาวิทยาลัย</option>
                                    <option value="เสนอมหาวิทยลัย">มหาวิทยาลัย</option>
                                    <option value="คณะกรรมการอื่นๆ">คณะกรรมการอื่นๆ</option>
                                    </select>
                                    <span class="text-danger form-error"></span>
                                </div>

                                <label>ประเภท</label>
                                <div class="col-3">
                                <select class="form-control" name="type"  >
                                <option value="">เลือกทั้งหมด</option>
                                @foreach($type as $row)
                                <option value="{{$row->t_id}}">{{$row->name_type}}</option>
                                @endforeach
                                </select>
                                    <span class="text-danger form-error"></span>
                                </div>


                                <label>ปี</label>
                                <div class="col-2">
                                    <select name="year" id="year" class="form-control" required>
                                    <option value="">เลือกปี</option>
                                    <?php for ($i = 0; $i <= 20; $i++) {?>
                                    <option value="<?php echo date("Y") - $i + 543; ?>"><?php echo date("Y") - $i + 543; ?></option>
                                    <?php }?>
                                    </select>
                                    <span class="text-danger form-error"></span>
                                </div>
                                <div class="btn-group">
                                    <button type="submit" id="save_form" class="btn btn-primary font-weight-bolder">
                                    ตกลง
                                    </button>
                                </div>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-10"></div>
                </form>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="buzz">
                <form class="form" id="kb_form" action="report/excel" method="GET" enctype="multipart/form-data"
                    target="">
                    <div class="my-12">
                                <h4>รายงานประจำปี</h4>
                                <br>
                                <div class="form-group row">
                                <label>กฎหมายที่ออกโดย</label>
                                <div class="col-3">
                                    <select class="form-control" name="offer"  >
                                    <option value="">เลือกทั้งหมด</option>
                                    <option value="เสนอสภามหาวิทยลัย">สภามหาวิทยาลัย</option>
                                    <option value="เสนอมหาวิทยลัย">มหาวิทยาลัย</option>
                                    <option value="คณะกรรมการอื่นๆ">คณะกรรมการอื่นๆ</option>
                                    </select>
                                    <span class="text-danger form-error"></span>
                                </div>

                                <label>ประเภท</label>
                                <div class="col-3">
                                <select class="form-control" name="type"  >
                                <option value="">เลือกทั้งหมด</option>
                                @foreach($type as $row)
                                <option value="{{$row->t_id}}">{{$row->name_type}}</option>
                                @endforeach
                                </select>
                                    <span class="text-danger form-error"></span>
                                </div>


                                <label>ปี</label>
                                <div class="col-2">
                                    <select name="year" id="year" class="form-control" required>
                                    <option value="">เลือกปี</option>
                                    <?php for ($i = 0; $i <= 20; $i++) {?>
                                    <option value="<?php echo date("Y") - $i + 543; ?>"><?php echo date("Y") - $i + 543; ?></option>
                                    <?php }?>
                                    </select>
                                    <span class="text-danger form-error"></span>
                                </div>
                                <div class="btn-group">
                                    <button type="submit" id="save_form" class="btn btn-primary font-weight-bolder">
                                    ตกลง
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="separator separator-dashed my-10"></div>
                </form>
            </div>










      </div>
    </div>
    <div class="col-xl-2"></div>
    <!--end::Form-->

    </div>
    </div>

    @endsection

    {{-- Scripts Section --}}
    @section('scripts')
    <script>
    $(document).ready(function() {
      $('#save_form').on('click', function() {
        // window.location = "/purchase-order";
        // $('#kt_form').submit();
      });
    });
    </script>


    @endsection
