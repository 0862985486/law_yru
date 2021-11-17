


<?php
use Illuminate\Support\Facades\DB;
?>
@if($num=="1")
    <table class="table">

        <tbody>
            @foreach ($name as $key => $row1)
            <tr class='content'>
                    <td>
                        <div style="width:1000px; word-wrap: break-word;" class="pointer">
                            <h6 style="color:blue">{{$row1->name_id}}</h6>
                        </div>
                        <?php
                                $law1=DB::table('laws')
                                ->where('laws.deleted_at','=',null)
                                ->where('laws.name_id','=',$row1->name_id)
                                ->whereBetween('stutas', ['1', '2'])
                                ->orderByDesc('date_out')
                                ->paginate(5,['*'],"law_page_{$key}");
                        ?>
                        <table class="table" id="form1" >
                                <tbody>
                                    @foreach ($law1 as $row)
                                        @if($row1->name_id==$row->name_id)
                                            @if($row->stutas==1)
                                                <tr class="target" id="aaa">
                                                    <td
                                                        style="padding-left:5%; width:910px; color:#778899;">
                                                        <a style="color:black;" target ="_blank" href="{{asset('@laravel/storage/app/public/law/'.$row->file_law)}}">{{$row->law_name}}</a>
                                                        [ประกาศใช้ เมื่อ{{thaidate(' j F Y', $row->date_out)}}]
                                                    </td>
                                                </tr>
                                            @else
                                                <tr class="target" id="aaa">
                                                    <td
                                                        style="color:red; padding-left:5%; width:910px;">
                                                        <a style="color:black;" target ="_blank" href="{{asset('@laravel/storage/app/public/law/'.$row->file_law)}}">{{$row->law_name}}</a>
                                                        [ยกเลิก เมื่อ{{thaidate(' j F Y', $row->date_out)}}]
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                        </table>
                        {{$law1->appends(request()->all())->links()}}

                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="padding-left:90%;">
        <div>{{$name->appends(request()->all())->links('pagination::bootstrap-4')}}</div>
    </div>
@else
    <table class="table">

        <tbody>
            @foreach ($name as $row1)
            <tr class='content'>
                    <td>
                        <div style="width:1000px; word-wrap: break-word;" class="pointer">
                            <h6 style="color:blue">{{$row1->name_id}}</h6>
                        </div>

                        <table class="table" id="form1" >
                                <tbody>
                                    @foreach($law as $row)
                                        @if($row1->name_id == $row->name_id )
                                            @if($row->stutas==1)
                                                <tr class="target" id="aaa">
                                                    <td
                                                        style="padding-left:5%; width:910px; color:#778899;">
                                                        <a style="color:black;" target ="_blank" href="{{asset('@laravel/storage/app/public/law/'.$row->file_law)}}">{{$row->law_name}}</a>
                                                        [ประกาศใช้ เมื่อ{{thaidate(' j F Y', $row->date_out)}}]
                                                    </td>
                                                </tr>
                                            @else
                                                <tr class="target" id="aaa">
                                                    <td
                                                        style="color:red; padding-left:5%; width:910px;">
                                                        <a style="color:black;" target ="_blank" href="{{asset('@laravel/storage/app/public/law/'.$row->file_law)}}">{{$row->law_name}}</a>
                                                        [ยกเลิก เมื่อ{{thaidate(' j F Y', $row->date_out)}}]
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                        </table>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endif


