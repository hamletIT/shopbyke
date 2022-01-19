<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@foreach ($data as $data)
    <h1>
        {{ $data->name }}
        {{ $data->surname }}
        {{ $data->age }}
        {{ $data->email }}
    </h1>
    
@endforeach
    
</body>
</html>