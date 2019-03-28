<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" type="image/png" href="/images/favicon.ico" />


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.5/css/mdb.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Assistant:400,600|Roboto+Slab:700" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">


    <title>Game Radar</title>
</head>

<body>

    @include('layouts._navbar')

    @yield('content')

    @include('layouts._footer')



    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.5/js/mdb.min.js">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js">
    </script>

    <script>
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD HH:mm'
            });
        });

        $(function () {
            $('#datetimepicker4').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        });

        $(function () {
            let searchElm = document.querySelector('.search');
            searchElm.addEventListener('keyup', e => {
                if (e.target.value.length > 3) {

                    fetch('/games/filter?search=' + e.target.value)
                        .then(function (response) {
                            return response.json();
                        })
                        .then(function (myGames) {


                            let searchResult = document.querySelector('#search_results');
                            searchResult.innerHTML = '';

                            myGames.forEach((game) => {
                                console.log(game);

                                let anchor = document.createElement('a');
                                anchor.href = '/games/' + game.id;
                                anchor.innerHTML = game.name;

                                searchResult.appendChild(anchor);

                            })



                            console.log(myGames);


                        });
                }
            });
        });

    </script>
    @yield('scripts')

</body>


</html>
