<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
</head>
<body>
<h1>Hello and welcome</h1>

<p>User <span style="font-weight: bold;">{{$user->name}}{{$user->lastName}}</span> has added you to his/her e-mail list.
    <br>: You can write to him/her on the following e-mail: <span style="font-weight: bold;">{{$user->email}}</span></p>
<p>All the best!!!</p>

</body>
</html>
