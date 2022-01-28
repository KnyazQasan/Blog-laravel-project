<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact </title>
</head>
<body>
    
    <p><strong>Ad:</strong> {{$details['name']}}</p>
    <p> <strong>Soyad:</strong> {{$details['surname']}} </p>
    <p> <strong>Email:</strong> {{$details['email']}} </p>
    
    <p><strong>Mesaj:</strong></p>
    <p>{{$details['message']}}</p>
</body>
</html>