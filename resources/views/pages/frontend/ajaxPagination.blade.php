@extends('pages.frontend.home')

{{-- Content --}}
@section('content')

    <input type="text"  class="form-control"  placeholder="ค้นหา..."  id="search" >

            <div class="card-body" id="tag_container">
                   @include('pages.frontend.presult')
            </div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
    });

    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();

            $('li').removeClass('active');
            $(this).parent('li').addClass('active');

            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            console.log(myurl);
            console.log('page');
            console.log(page);

            getData(page);
        });

        $( "#search" ).keyup(function(){
            var search= $(this).val();

           getData(1,search);
        });

    });



    function getData(page,search=""){
        $.ajax(
        {
            url: '?page=' + page +'&keyword='+search,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#tag_container").empty().html(data);
            location.hash = page;
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }


    $("#Search").on("keyup", function () {
        val = $(this).val().toLowerCase();
        $('tr').each(function () {
            $(this).toggle($(this).text().toLowerCase().includes(val));
        });
    });

</script>

@endsection


