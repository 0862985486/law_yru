<nav class="navbar navbar-expand-lg " style="height: 80px; background-color: #C0C0C0;">
    <div class=" col-md-1">
        <img src="{{asset('media/logos/yru-logo.png') }}" class="img-rounded" alt="Cinque Terre" width="80" >
    </div>



    <div class="collapse navbar-collapse" >
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <h4 style="color: black;">ฐานข้อมูลกฎหมาย</h4>
        <h6 style="color: white;">มหาวิทยาลัยราชภัฏยะลา </h6>
        <h6 style="color: white;">Yala Rajabhat University</h6>
        </li>

        </ul>
    </div>




    <div class="form-inline my-2 my-lg-0">
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
                    <a href="{{$URI}}" ><img src="{{asset('media/logos/yru_passport.jpg') }}" class="img-rounded" alt="Cinque Terre" width="200" height="50"></a>&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-primary" target ="_blank" href="https://drive.google.com/file/d/10QiCNnqSIU0NvJfpwX-2TYa5caXM80wq/view?usp=sharing" >วิธีใช้งาน</a>

                    @elseif(session('stutas')=="")
                    <div class="col-md-2 float-right">

                        <a class="btn btn-light  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{session('name')}}{{session('stutas')}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a target ="_blank" href="https://forms.gle/UaAPWHSkaUh2cYyo8"  class="dropdown-item" role="button">ขอเพิ่มสิทธิ์การใช้งาน</a>
                            <a href="{{ route('auth.logout') }}"  class="dropdown-item" role="button">ออกจากระบบ</a>
                        </div>
                    </div>
                    @elseif(session('stutas')=="1")
                    <div class="col-md-2 float-right">
                        <a class="btn btn-light  dropdown-toggle" href="/law" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{session('name')}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a  href="/law"  class="dropdown-item" role="button">เข้าสู่ระบบนิติกร</a>
                            <a href="{{ route('auth.logout') }}"  class="dropdown-item" role="button">ออกจากระบบ</a>
                        </div>
                    </div>
                    @else
                <div class="col-md-2 float-right">
                    <a class="btn btn-light  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     {{session('name')}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a  href="/lawyer"  class="dropdown-item" role="button">เข้าสู่ระบบนนักกฎหมาย</a>
                        <a href="{{ route('auth.logout') }}"  class="dropdown-item" role="button">ออกจากระบบ</a>
                    </div>
                </div>
        @endguest
    </div>







</nav>


