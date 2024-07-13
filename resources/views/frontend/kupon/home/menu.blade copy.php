<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/austria.css" rel="stylesheet">
    <link href="css/accordion.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <link rel='shortcut icon' href='favicon.ico' type='image/x-icon'>
    <title>Rakúsko.sk</title>
    @yield('styles')
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
            
            <img src="img/cropped-logo-sk.png" class="d-inline-block align-top d-none d-sm-block w-100" alt="Rakusko.sk">
            <img src="img/logo-sk-mob.png" class="d-inline-block align-top d-block d-sm-none w-100" alt="Rakusko.sk"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigaciaID" aria-controls="navigaciaID" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div class="collapse navbar-collapse" id="navigaciaID">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    


                    
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Nákupy</a>  <a class="nav-link active" aria-current="page" href="#">Nákupy</a> -
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Viedeň</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Aktivity</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Výlety</a></li>
                            <li><a class="dropdown-item" href="#">Cykloturistika</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Viedeň</a></li>
                        </ul>
                    </li>



                </ul>
                    <a class="btn btn-danger me-2" href="#" target="_blank" role="button">Zľavy a akcie</a>
                    <a class="btn btn-warning me-2" href="#" role="button">Súťaže</a>
                    <a class="btn btn-success me-2" href="https://www.profesia.sk/praca/rakusko/" target="_blank" role="button">Práca v Rakúsku</a>
            </div>
        </div>
    </nav>
    @yield('content')
 </html>