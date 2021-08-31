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
                        <h2>{{$page_title}}</h2>
                    </div><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                     <input type="text" class="form-control" placeholder="ค้นหา..."  name="search" id='search' />
                        <span>
                            <i class="flaticon2-search-1 text-muted"></i>
                        </span><bR>
                </div>
            </div>
            <div class="row">
    <div class="col-md-12">
        <table class="table" id="example">
            <tbody>
                 @foreach ($name as $key => $row1)
                        <tr class='content'>
                            @if($row1->name_id==$row1->name_id)
                            <td>
                                <div  style="width:1100px; word-wrap: break-word; height:40px;" class="pointer">
                                    <a onclick="myFunction{{$key}}()" style="color:blue"><i class="fa fa-folder" style="font-size:20px"></i>{{$row1->name_id}}</a>
                                </div>
                                <table class="table" id="form1" >
                                    <tbody id="contenrif{{$key}}">
                                        @foreach ($law as $row)
                                            @if($row1->name_id==$row->name_id)
                                                <tr>
                                                    <td style="padding-left:5%; width:92%">{{$row->name}}</td>
                                                    <td><a style="color:blue; font-size:15px;"   target ="_blank" href="{{asset('storage/law/'.$row->file_law)}}">ดูเพิ่มเติม</a></td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            @endif
                        </tr>

                <script>
                    document.getElementById("contenrif{{$key}}").style.display = "none";
                    function myFunction{{$key}}(){
                        var x = document.getElementById('contenrif{{$key}}');
                        if (x.style.display === 'none') {
                            x.style.display = 'block';
                        } else {
                            x.style.display = 'none';
                        }
                    }

                </script>
                 @endforeach
            </tbody>
        </table>
    </div>
</div>
        </div>
    </div>
</div>

@yield('scripts')



<br><br><br><br><br><br><br><br><br>

@include('pages.frontend.layout.footer')



</div>

</body>
</html>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );

$(document).ready(function(){
 $('#search').keyup(function(){

  // Search text
  var text = $(this).val();

  // Hide all content class element
  $('.content').hide();

  // Search and show
  $('.content:contains("'+text+'")').show();

 });
});

$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>
