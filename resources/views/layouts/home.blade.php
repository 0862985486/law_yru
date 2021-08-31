<!DOCTYPE html>
<html>
@include('pages.frontend.layout.head')
<body>
@include('pages.frontend.layout.header')

<div class="container my-5">
    <div class="row">
        @include('pages.frontend.layout.aside')
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-title">
                        <h2>กฎหมาย ระเบียบ คำสั่ง ประกาศ</h2>
                    </div><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                     <input type="text" class="form-control" placeholder="ค้นหา..." id="kt_datatable_search_query" />
                        <span>
                            <i class="flaticon2-search-1 text-muted"></i>
                        </span><bR>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</div>



<br><br><br><br><br><br><br><br><br><br><br><br><br>

@include('pages.frontend.layout.footer')



</div>

</body>
</html>


