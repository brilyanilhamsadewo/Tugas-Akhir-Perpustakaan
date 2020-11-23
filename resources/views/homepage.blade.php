<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo">Perpustakaan</a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="#">Login</a></li>
            <li><a href="#">Register</a></li>
          </ul>
        </div>
    </nav>
    
    <ul class="sidenav" id="mobile-demo">
    <li><a href="#">Login</a></li>
    <li><a href="#">Register</a></li>
    </ul>

    <div class="container">
        {{-- content --}}
        <h2>Koleksi Buku</h2>
        <blockquote><p class="flow-text">
            Koleksi Buku yang bisa kamu baca & pinjam
        </p></blockquote>
        <div class="row">
            @for ($i = 0; $i < 10; $i++)
            <div class="col s12 m6">
                <div class="card horizontal hoverable">
                    <div class="card-image">
                      <img src="https://lorempixel.com/100/190/nature/6">
                    </div>
                    <div class="card-stacked">
                      <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information.</p>
                      </div>
                      <div class="card-action">
                        <a href="#">This is a link</a>
                      </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>

        {{-- pagination --}}
        <ul class="pagination center">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </div>
    
             

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        M.AutoInit();
    </script>
</body>
</html>