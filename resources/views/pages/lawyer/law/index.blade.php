{{-- Extends layout --}}
@extends('layout.lawyer')

{{-- Content --}}
@section('content')

<div class="card card-custom">
  <div class="card-header flex-wrap border-0 pt-6 pb-0">
    <div class="card-title">
      <h3 class="card-label"><h1>รวมกฎหมาย</h1>
        <div class="text-muted pt-2 font-size-sm"></div>
      </h3>
    </div>
    <div class="card-toolbar">

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
          <th title="Field #2">เสนอ</th>
          <th title="Field #3">ประเภท</th>
          <th title="Field #4">เรื่อง</th>
          <th title="Field #4">ปีของกฎหมาย</th>
          <th title="Field #6">วันที่เยพแพร่</th>
          <th title="Field #6">วันที่ประกาศใช้</th>
          <th title="Field #7">สถานะ</th>
          <th title="Field #8">option</th>
          <th title="Field #5"></th>
        </tr>
      </thead>
      <tbody>
              @foreach ($law as $row)
              <tr>

                    <td >{{$row->offer}}</td>
                    <td >{{$row->name_type}}</td>
                    <td >{{$row->law_name}}</td>
                    <td >{{$row->year}}</td>
                    <td >{{$row->date_announce}}</td>
                    <td >{{$row->date_out}}</td>
                    @if($row->stutas=='1')
                        <td><h4 style="background-color:#66FF66; width: 80px;">เผยแพร่</h4></td>
                    @elseif($row->stutas=='3')
                        <td ><h4 style="background-color:#ffbf00;width: 80px; ">รอตรวจ</h4></td>
                        <td>
                        <div style="display:flex; flex-direction: row;">
                            <a href="{{action('LawyerController@edit',$row->law_id)}}" class="btn btn-warning btn-sm"><i class='far fa-edit'></i></a>
                            <a target ="_blank" href="{{asset('@laravel/storage/app/public/law/'.$row->file_law)}}" class="btn btn-success btn-sm"><i class='far fa-file' style='font-size:20px'></i></a>
                            <form method="post" class="delete_form" action="{{action('LawyerController@destroy',$row->law_id)}}">{{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE"/>
                                <button type="submit" class="btn btn-danger btn-sm"  onclick="return confirm('คุณตั้งใจจะลบข้อมูลหรือไม่ ?');"><i class='fas fa-trash-alt' style='font-size:20px'></i></button>
                            </form>
                        </div>
                        </td>
                        @elseif($row->stutas=='4')
                        <td ><h4 style="background-color:#ff0000;width: 80px; ">แก้ใข</h4></td>
                        <td>
                        <div style="display:flex; flex-direction: row;">
                            <a href="{{action('LawyerController@show',$row->law_id)}}" class="btn btn-warning btn-sm"><i class='far fa-edit'></i></a>
                        </div>
                    </td>

                    @else()
                        <td ><h4 style="background-color:#FF3300;width: 80px; ">ยกเลิก</h4></td>
                    @endif

             </tr>
              @endforeach

      </tbody>
    </table>
    <!--end: Datatable-->
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
