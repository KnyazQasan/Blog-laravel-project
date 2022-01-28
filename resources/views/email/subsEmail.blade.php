<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <title>Subscribers</title>
  </head>
  <body>
        <h3>Salam siz <b> {{$mySettings->name}}</b> saytına yeni xebeler üçün abonə olmusunuz. </h3>
        <p>Abonəliyinizi aktiv etmek ücün <a href="{{route('getSubs')}}">bura</a> daxil olun, yoxsa sizə mail gəlməyəcək :) </p>
        
        <p>Sizin kodunuz: <b>{{$details['code']}}</b></p>
       

   
  </body>
</html>