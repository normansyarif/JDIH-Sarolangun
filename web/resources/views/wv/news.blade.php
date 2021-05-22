<?php

date_default_timezone_set("Asia/Jakarta");

?>

<html>

<head>
    <title>Informasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-grid.min.css') }}">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>

    <div class="row" style="--bs-gutter-x: 0">
        <div class="col-12 col-md-6 offset-md-3">
            <img style="width: 100%" src="{{ $item->image }}" alt="">

            <div style="padding: 5px 15px">
                <p style="margin-bottom: 8px; font-weight: bold; font-size: 1.2em">{{ $item->title }}</p>
                <div>
                    <img src="{{ url('images/clock.svg') }}" style="width: 20px; height: 20px; position: relative; top: 4px" alt="">
                    <span style="margin-left: 7px; color: #908a8a; font-size: .8em">{{ $item->date }}</span>
                </div>

                <div style="margin-top: 25px;text-align: justify; font-size: .9em">
                    {!! $item->content !!}
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pulltorefreshjs/0.1.22/index.umd.min.js" integrity="sha512-djmgTiVR15A/7fON+ojDzFYrRsfVkzQZu07ZVb0zLC1OhA2iISP39Lzs05GqSKF0vPjkLzL5hBC+am6po7dKpA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        const ptr = PullToRefresh.init({
          mainElement: 'body',
          onRefresh() {
            window.location.reload();
          }
        });
    </script>


</body>

</html>