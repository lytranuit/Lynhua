<meta charset="utf-8">
</meta>
<meta content="IE=edge" http-equiv="X-UA-Compatible">
</meta>
<meta content="" name="description">
</meta>
<meta content="width=device-width, initial-scale=1" name="viewport">
</meta>
<meta content="all,follow" name="robots">
</meta>
<link href="<?= base_url() ?>public/images/local/favicon.ico" rel="shortcut icon" type="image/x-icon">
</link>
<title>
    @section("title") 
    {{$project_name}}
    @show
</title>
<!-- core CSS -->
@foreach($stylesheet_tag as $url)
<link href="{{$url}}" rel="stylesheet">
</link>
@endforeach
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
@foreach($javascript_tag as $url)
<script src="{{$url}}">
</script>
@endforeach
