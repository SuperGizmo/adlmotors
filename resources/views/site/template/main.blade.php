<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

    <!-- Bootstrap & custom CSS -->
    <link rel="stylesheet" href="css/app.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@yield('background')
<div class="graident">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 blueBar">ADL motors Ltd - Servicing, MOT and Mechanical Repairs.</div>
        </div>
        <div class="row">
            <div class="col-xs-12 topBar">ADL motors Ltd</div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @include('site.template.nav')
        </div>
        <div class="row mainContent">
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <div class="row">
                    <div class="col-xs-12">
                        @yield('content')
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12" style="padding-bottom: 20px;">
                        <h1>MOT Reminder</h1>
                        <form action="/postMOT" method="post" >
                            <div class="form-group col-xs-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="number">Number</label>
                                <input type="text" class="form-control" required name="number" id="number">
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" required name="email" id="email">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="day">Day</label>
                                <select name="day" class="form-control">
                                    @for ($day = 1; $day <= 31; $day++)
                                        <option value="{!! $day !!}">{!! $day !!}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="month">Month</label>
                                <select name="month" class="form-control">
                                    @for ($month = 1; $month <= 12; $month++)
                                        <option value="{!! $month !!}">{!! $month !!}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success col-xs-12">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                @yield('contactForm')
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 blueBar">Coded by <a href="http://www.rawrsome.co.uk">Rawrsome</a></div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">

    function slideSwitch() {
        var $active = $('#slideshow IMG.active');

        if ($active.length == 0)
            $active = $('#slideshow IMG:last');

        // use this to pull the images in the order they appear in the markup
        var $next = $active.next().length ? $active.next()
                : $('#slideshow IMG:first');

        // uncomment the 3 lines below to pull the images in random order

        // var $sibs  = $active.siblings();
        // var rndNum = Math.floor(Math.random() * $sibs.length );
        // var $next  = $( $sibs[ rndNum ] );


        $active.addClass('last-active');

        $next.css({opacity: 0.0})
                .addClass('active')
                .animate({opacity: 1.0}, 1000, function() {
                    $active.removeClass('active last-active');
                });
    }

    $(function() {
        setInterval("slideSwitch()", 5000);
    });

</script>
</body>
</html>