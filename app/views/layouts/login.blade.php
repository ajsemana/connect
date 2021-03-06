<?php date_default_timezone_set('Asia/Manila'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>blueConnect</title>

    {{ HTML::style('resources/bootstrap/css/bootstrap.css') }}
    {{ HTML::style('resources/bootstrap/css/dashboard.css') }}

    {{ HTML::script('resources/js/jquery-1.7.2.min.js') }}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">TBLSys</a>
        </div>
        <div class="navbar-collapse collapse">
          <p class="navbar-text navbar-right">{{ date('F d, Y') }}</p>
        </div>
      </div>
    </div>

    <div class="container-fluid">
        <div style="padding-top: 10px;">
              @if(Session::has('message'))
              <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{ Session::get('message') }}
              </div>
              @endif
                  
              @if(Session::has('success'))
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{ Session::get('success') }}
              </div>
              @endif
                  
              @if(Session::has('error'))
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{ Session::get('error') }}
              </div>
              @endif                
          </div>

        {{ $content }}
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    {{ HTML::script('resources/bootstrap/js/bootstrap.min.js') }}
    {{ HTML::script('resources/bootstrap/js/docs.min.js') }}
    {{ HTML::script('resources/bootstrap/js/ie10-viewport-bug-workaround.js') }}
  </body>
</html>
