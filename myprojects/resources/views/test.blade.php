<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}" />
    <link rel="stylesheet" href="css/style.css" />
    <title>CSS T</title>
  </head>
  <body>
    @foreach ($collection as $item)
        <div class="product">
            <h1>
                {{$item->name}}
            </h1>
            <span>
                {{$item->price}}
            </span>
        </div>
    @endforeach
    <script src="main.js"></script>
  </body>
</html>
