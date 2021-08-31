<!-- benner -->
<div class="hero-image"><br>
@guest
    @php
        $http_build_query = http_build_query([
        'client_id' => env('OAUTH_CLIENT_ID'),
        'redirect_uri' => env('OAUTH_CLIENT_REDIRECT_URI'),
        'response_type' => 'code',
        'scope' => '*',
    ]);
        $URI = 'https://passport.yru.ac.th/oauth/authorize?'.$http_build_query;
@endphp
 <div class=" col-md-1 float-right"><a href="{{ $URI }}"  class="btn btn-secondary" role="button">เข้าสู่ระบบ</a></div>
 @else
 <div class="col-md-2 float-right">
    <li class="nav-item dropdown">
        <a class="btn btn-light  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{session('name')}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a target ="_blank" href="https://forms.gle/UaAPWHSkaUh2cYyo8"  class="dropdown-item" role="button">ขอเพิ่มสิทธิ์การใช้งาน</a>
        <a href="{{ route('auth.logout') }}"  class="dropdown-item" role="button">ออกจากระบบ</a>
        </div>
      </li>
</div>
 @endguest
 <div class=" col-md-1 "><img src="http://wb.yru.ac.th/retrieve/fb316831-6bb2-483d-b928-c2cce45cc932" class="img-rounded" alt="Cinque Terre" width="100" height="100"></div>

  <div class="hero-text">
    <h1 style="font-size:50px">ฐานข้อมูลกฎหมาย</h1>
    <p><h4>มหาวิทยาลัยราชภัฏยะลา</h4></p>
    <!-- <button>Hire me</button> -->
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #cbcbcb; height: 50px;"></nav>
