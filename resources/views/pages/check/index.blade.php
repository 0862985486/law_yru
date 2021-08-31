{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom">
  <div class="card-header flex-wrap border-0 pt-6 pb-0">
    <div class="card-title">
      <h3 class="card-label"><h1>กฎหมายรอการอนุมัติ</h1>
        <div class="text-muted pt-2 font-size-sm"></div>
      </h3>
    </div>
    <div class="card-toolbar">
      <!--begin::Button-->
      <a href="{{route('law.create')}}" class="btn btn-primary font-weight-bolder">
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
        </span>เพิ่มกฎหมายใหม่</a>
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
          <th title="Field #6">ชื่อผู้เสนอ</th>
          <th title="Field #6">หน่วยงาน</th>
          <th title="Field #2">เสนอ</th>
          <th title="Field #3">ประเภท</th>
          <th title="Field #4">เรื่อง</th>
          <th title="Field #6">วันที่เสนอ</th>
          <th title="Field #7">สถานะ</th>
          <th title="Field #8">option</th>
          <th title="Field #5"></th>
        </tr>
      </thead>
      <tbody>
              @foreach ($law as $row)
              <tr>

                    <td >{{$row->name}}</td>
                    <td >{{$row->department}}</td>
                    <td >{{$row->offer}}</td>
                    <td >{{$row->name_type}}</td>
                    <td >{{$row->law_name}}</td>
                    <td >{{thaidate(' j F Y', $row->created_at)}}</td>
                    <td ><h4 style="background-color:#ffbf00;width: 80px; ">รอตรวจ</h4></td>

                    <td>
                    <div style="display:flex; flex-direction: row;">
                            <a href="{{action('CheckController@edit',$row->law_id)}}" class="btn btn-success">ดูเพิ่มเติม</a>
                    </div>

                    </td>
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
