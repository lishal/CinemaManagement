<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{(url('css/style.css'))}}">
        <script src="{{(url('js/main.js'))}}"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        
        <title>Cinema Management System</title>
    </head>
    
       <header>
        @include('header.navbar')
        <section class="slideshow">
        @yield('slideshow')
        </section>
        </header>
        <body>
            <section class="cms-container" style= " background-color: #DFD9D5;">
                @yield('container')
            </section>
        </body>
        <footer>
            <section class="footer">
                @yield('footer')
            </section>
        </footer>
    
</html>