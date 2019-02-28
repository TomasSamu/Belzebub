<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Board Games Project</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <h1>Users</h1>

        <div class="card-deck">
                @foreach ($users as $user)
            <div class="card m-3 p-2" style="width: 10rem;">
              <img class="card-img-top" src="https://avataaars.io/?avatarStyle=Circle&topType=LongHairStraight&accessoriesType=Blank&hairColor=BrownDark&facialHairType=Blank&clotheType=BlazerShirt&eyeType=Default&eyebrowType=Default&mouthType=Default&skinColor=Light/10em" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{ $user->name}}</h5>
                <h6 class="card-text">{{ $user->gender}}</h6>
                <h5 class="card-text text-muted">{{ $user->city}}</h5>
                <p class="card-text h-6">This is a short introduction of the user.</p>
              </div>
            </div>
            @endforeach
        </div>
        </body>
        </html>