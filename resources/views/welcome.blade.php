<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/all.css">

        <link href="https://fonts.googleapis.com/css?family=Cinzel|Dancing+Script" rel="stylesheet">
    </head>
    <body>
    <main class="container-fluid text-center">
        <div id="title" class="page-header">
            <p>{{ config('app.name') }}</p>
        </div>

        <div id="description">
            <p><em>{{ config('app.name') }}</em> was a college standard entrepreneurship project, operational in Feb-March 2016.<br>
                <strong>This project is now archived</strong>, but you may have a tour. You can also <a href="https://github.com/rishianand9/project-foodcart.git">fork this project</a>, it is completely free.</p>
        </div>

        <hr>

        <div id="members">
            <p>Created by</p>
            <a href="https://www.facebook.com/profile.php?id=100004446401570"><img class="img-responsive img-thumbnail" src="images/members/wajid.jpg" alt="Wajid Ali" /></a>
            <a href="https://www.facebook.com/siidsingh1303?fref=ufi"><img class="img-responsive img-thumbnail" src="images/members/siddhant.jpg" alt="Siddhant Singh" /></a>
            <a href="https://www.facebook.com/shubh12310?fref=ufi"><img class="img-responsive img-thumbnail" src="images/members/shubham.jpg" alt="Shubham Singh" /></a>
            <a href="https://www.facebook.com/saiman.honey?fref=ufi"><img class="img-responsive img-thumbnail" src="images/members/saiman.jpg" alt="Saiman Paswan" /></a>
            <a href="https://www.facebook.com/profile.php?id=100004081866549&fref=ufi"><img class="img-responsive img-thumbnail" src="images/members/rohit.jpg" alt="Rohit Gupta" /></a>
            <a href="https://www.facebook.com/mayank.srivastava.378199"><img class="img-responsive img-thumbnail" src="images/members/mayank.jpg" alt="Mayank Srivastava" /></a>
            <a href="https://www.facebook.com/rishianand9"><img class="img-responsive img-thumbnail" src="images/members/rishi.jpg" alt="Rishi Anand" /></a>
        </div>

        <div id="continue-button">
            <a href="{{ url('/home') }}" class="btn btn-primary">Continue Tour <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
        </div>

    </main>
    <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>
