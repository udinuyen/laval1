<html>
    <head>
        <title>Laravel</title>
    </head>
    <body>
        @yield('test')

        @section('sidebar')
            <h1>Sidebar</h1>
        @show
        
        @yield('content', View::make('home'))
    </body>
</html>
