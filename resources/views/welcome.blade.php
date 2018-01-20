<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
    app()->setLocale($locale);;
  ?>
  <h1 name="title"> English {{ $locale }}</h1>
<p name="par"> Hello world</p>
{{trans('lang.msg') }}
{{ trans('lang.Hello') }}
</body>
</html>