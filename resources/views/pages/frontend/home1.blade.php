@extends('pages.frontend.home')

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-md-12">
            <table class="table" >
                <tbody>
                    @foreach ($name as $key => $row1)
                            <tr class='content'>
                                @if($row1->name_id==$row1->name_id)
                                <td>
                                    <div  style="width:1000px; word-wrap: break-word;" class="pointer">
                                        <a onclick="myFunction{{$key}}()" style="color:blue"><i class="fa fa-folder" style="font-size:20px"></i>{{$row1->name_id}}</a>
                                    </div>
                                    <table class="table" id="form1" >
                                        <tbody id="contenrif{{$key}}">
                                            @foreach ($law as $row)
                                                @if($row1->name_id==$row->name_id)
                                                    @if($row->stutas==1)
                                                    <tr>
                                                        <td style="padding-left:5%; width:910px; color:#778899;"><a style="color:black;" target ="_blank" href="{{asset('@laravel/storage/app/public/law/'.$row->file_law)}}">{{$row->law_name}}</a>(ประกาศใช้ เมื่อ{{thaidate(' j F Y', $row->created_at)}})</td>

                                                    </tr>
                                                    @else
                                                    <tr>
                                                        <td style="color:red; padding-left:5%; width:910px;"><a style="color:black;" target ="_blank" href="{{asset('@laravel/storage/app/public/law/'.$row->file_law)}}">{{$row->law_name}}</a>(ยกเลิก เมื่อ{{thaidate(' j F Y', $row->updated_at)}})</td>
                                                    </tr>
                                                    @endif
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
<div style="padding-left:90%;">
    <div>{{$name->links()}}</div>
</div>



@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
@endsection


