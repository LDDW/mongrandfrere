<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
</head>
<body>
    <h1>Vous avez reçu un message de {{ $customer['firstname'] }} {{ $customer['lastname'] }}</h1>
    <p>Voici son e-mail : {{ $customer['email'] }}</p>
    <p>Voici son message : {{ $customer['message'] }}</p>
</body>
</html>