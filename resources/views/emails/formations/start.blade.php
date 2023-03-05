<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Bonjour a tous, <br>
    La formation {{ $formation->title }} sur la technologie
    {{ $formation->technology->name }} debut demain.
</body>
</html>