<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    <style>
        *{
            font-size: 20px;
        }
        a{
            color: unset;
            text-decoration: unset;
        }
        .x-list{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            margin: 30px 0;
        }
        .x-list > *{
            border: black solid 1px;
            margin: 5px;
            padding: 5px;
            width: 200px;
        }
        img{
            width: 100px; 
        }
        input, select{
            max-width: 100%;
        }
        button{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav>
        @include('partials.nav')
    </nav>
    <section>
        @include('partials.search')
    </section>
    <section>
        @include('partials.category')
    </section>
    <main>
        @include('partials.content')
    </main>
    <footer>
        @include('partials.footer')
    </footer>
    @yield('scripts')
</body>
</html>
