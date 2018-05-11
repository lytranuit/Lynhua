<script type="text/javascript" src="{{base_url()}}sliderengine/jquery.hislider.js"></script>

<!-- === MAIN Background === -->
<div class="slide story" id="slide-1" data-slide="1">
    <div id="effect" style="display: flex;align-items: center;position: absolute; width: 100%;height: 100%;min-height: 540px;" class='hidden-md-down'>
        <a href="#" style="margin: auto;z-index: 1000;">
            <img src="{{base_url()}}public/images/local/logo.png" alt="<?= config_item('hotline') ?>" style="width: 150px;" class="onlyone img-responsive" data-style='bounceInLeft'>
            <br>
            <span class="hotline onlyone" data-style="fadeIn" style="animation-delay: 1s;">
                <?= config_item('hotline') ?>
            </span>
        </a>
    </div>
    <div id='hislider1' style="max-width:2000px;  max-height:800px; margin: 0 auto;">
        <ul style="display: none;overflow: hidden; height: 0; visibility: hidden; opacity: 0;">
            @foreach($arr_slider as $key => $slider)
            <li>
                <div>
                    <img data-src="{{base_url(). $slider['hinhanh']}}" title="" alt="" data-content-type="image" data-content="" data-interval="-1"/>
                    <div data-type="effect" data-effect-type="Random"></div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
