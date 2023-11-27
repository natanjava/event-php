<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

       <!-- css da aplicação-->
        <link href="/css/style.css" rel="stylesheet">
        <script src="/js/script.js"></script>    
    </head>

    <body class="antialiased">
        
        <header>
            <nav class="navbar navbar-expand-lg navbar-light"> 
                <div class="collapse navbar-collapse" id="navbar">
                   <a href="/" class="navbar-brand">
                      <img src="/img/banner_integracao.jpg" alt="Events" >   
                   </a>  

                   <ul class="navbar-nav">
                        <li class="nav-item">  
                            <a href="/" class="nav-link">Events</a>
                        </li>
                        <li class="nav-item">  
                            <a href="/events/create" class="nav-link">Create Event</a>
                        </li>

                        @auth
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link">My events</a>
                            </li>
                            <li class="nav-item">
                                <form action="/logout" method="POST">
                                @csrf
                                <a href="/logout" 
                                    class="nav-link" 
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    Logout
                                </a>
                                </form>
                            </li>
                        @endauth

                        @guest
                            <li class="nav-item">  
                                <a href="/login" class="nav-link">Log in</a>
                            </li>
                            <li class="nav-item">  
                                <a href="/register" class="nav-link">Sign up</a>
                            </li>
                        @endguest
                    
                    
                   </ul>

                </div>
            </nav>
        </header>

        
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if (session('msg'))
                        <p class="msg"> {{ session('msg') }}</p>
                    @endif

                    
                    @yield('content')
                </div>
            </div>
        </main>



        <footer>
            <p> Events Managment &copy; 2023</p>
        </footer>


        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
