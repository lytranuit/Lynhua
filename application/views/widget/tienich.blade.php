
<div class="container template2" style="margin-bottom: 60px;" id="tienich">
    <div class="row content-row">
        @foreach($tienich as $key =>$row)
        <div class="col-sm-4 col-xs-12 work-space onlyone" data-style='fadeInDown' style="animation-delay: <?= 0.2 * $key ?>s;margin: 10px 0px;" >
            <a data-fancybox-group="tienich" class="fancybox hover1" href="{{base_url() . $row['hinhanh']['src']}}" style="display:inline-block;">
                <div class="featured-img hover1">
                    <img class="img-responsive" src="{{base_url() . $row['hinhanh']['bg_src']}}" alt="{{$row['tieu_de']}}">
                </div> 
                <p style="position: absolute;
                   bottom: 0;
                   width: 100%;
                   background: rgba(80, 80, 80, 0.69);">{{$row['tieu_de']}}</p> 
            </a>
        </div>
        @endforeach
    </div>
</div>