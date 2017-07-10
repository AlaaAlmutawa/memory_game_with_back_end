<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sephora Memory Game!</title>

    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
</head>
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '1947835552159519',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.9'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
@yield('content')
<footer>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="/vendor/jquery-1.12.3.min.js" type="text/javascript"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!--<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/vendor/jquery.validate.min.js"></script>
<!--<script src="/js/script.js" type="text/javascript"></script>-->
</body>
</html>