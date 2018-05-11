<div class="hidden">
    <div class="col-12"><a data-fancybox-group="portfolio" class="banner" href="{{base_url() . $img_banner['src']}}"><img class="thumb" src="{{base_url() . $img_banner['src']}}" alt="Banner"></a></div>
</div>
<script>
    $(document).ready(function () {
        $(".banner").fancybox({
            padding: 10,
            helpers: {
                overlay: {
                    locked: false
                }
            }
        }).trigger('click');
    })
</script>