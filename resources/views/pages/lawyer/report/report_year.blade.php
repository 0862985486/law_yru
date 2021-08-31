<html>
<header>
<title>{{$page_title}}</title>
<meta http-equiv="Content-Language" content="th" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
body {
font-family: 'sarabun_new', sans-serif;
font-size: 20px;
}
p{
    font-family: 'sarabun_new', sans-serif;
    font-size: 19px;
    font-weight: bold;
    line-height: 18pt;
    /* letter-spacing: 8px; */
}
table, th, td {
  border: 1px solid rgb(73, 72, 72);
  border-collapse: collapse;
}
/* th {
  padding-top: 3rem;
  padding-bottom: 3rem;
  text-align: center;
} */
th,td {
  padding: 5px;
  text-align: center;
}


/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 70%;
  /* Should be removed. Only for demonstration */
}
 .square{
     width: 160px;
     height: 80px;
     padding: 1px;
     background: white;
     border: 1px solid black;
 }
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>
</header>
<body>
    <div class="container">
       <div class="row">
        <div class="col">
             <h4 style="text-align: center;">สรุปข้อมูลกฎหมาย  {{$year+543}} เสนอ : {{$offer??"ทั้งหมด"}}   ประเภท : {{$type_name??"ทุกประเภท"}}</h4>
             @foreach ($user as $row1)
                <h4 style="display: inline;color: rgb(8, 5, 5); text-align: center;">หน่วยงาน {{$row1->department}} </h4>
             @endforeach
          <table style="width:100%">
          <tr>
          <th title="Field #2">เสนอ</th>
          <th title="Field #3">ประเภท</th>
          <th title="Field #4">เรื่อง</th>
          <th title="Field #6">วันที่เพยแพร่</th>
          <th title="Field #7">สถานะ</th>
        </tr>
      </thead>
      <tbody>
              @foreach ($law as $row)
              <tr>

                    <td >{{$row->offer}}</td>
                    <td >{{$row->name_type}}</td>
                    <td style="text-align: left; width: 700px;">{{$row->law_name}}</td>
                    <td style="text-align: left; width: 100px;">{{thaidate(' j M Y', $row->date_announce)}}</td>
                    @if($row->stutas=='1')
                        <td><h4 style="background-color:#66FF66; width: 80px;">เผยแพร่</h4></td>
                    @else()
                        <td ><h4 style="background-color:#FF3300;width: 80px; ">ยกเลิก</h4></td>
                    @endif
             </tr>
              @endforeach

            </table>

          </div>
        </div>

        <div class="row">
            <div style="float: left;width: 100%;">

            </div>
        </div>
      </div>
</body>
</html>
