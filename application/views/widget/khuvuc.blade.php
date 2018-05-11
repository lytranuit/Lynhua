<div class="widget categories">
    <div class="title-news">
        <h3 class="title-hot" style="font-size: 14px;">Khu vực</h3>
        <span class="span-hot"></span>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <ul class="blog_category">
                @foreach($arr_khuvuc as $row)
                <li><a href="#">{{$row['ten_khuvuc']}}<span class="badge">{{$row['num_tin']}}</span></a></li>
                @endforeach
            </ul>
        </div>
    </div>                     
</div><!--/.categories-->