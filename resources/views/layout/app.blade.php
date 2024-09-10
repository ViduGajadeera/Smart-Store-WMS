<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
    <style>
       

        .sidebar {
            width: 250px;
          overflow:hidden;
          position: fixed;
           
        }
    </style>
   @yield('styles')
</head>
<body>
@extends('layout.preloader')

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-auto min-vh-100 bg-dark sidebar">
                <div class="pt-4 pb-1 px-2">
                    <a href="" class="text-white text-decoration-none">
                        <span class="fs-4 d-none d-sm-inline"><h4>Smart-Store WMS</h4></span>
                    </a>
                </div>
                <hr class="text-white">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="{{ route('Ahome') }}" class="nav-link {{ request()->is('Ahome') ? 'active' : '' }}">
                            <i class="fa-solid fa-home me-2"></i>
                            <div class="d-none d-sm-inline">Home</div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('mani') }}" class="nav-link {{ request()->is('uploadmani') ? 'active' : '' }}">
                            <i class="fa-solid fa-upload me-2"></i>
                            <div class="d-none d-sm-inline">Upload Manifest</div>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('sreg') }}" class="nav-link {{ request()->is('sreg') ? 'active' : '' }}">
                            <i class="fa-solid fa-user me-2"></i>
                            <div class="d-none d-sm-inline">Staff Registration</div>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('Creg') }}" class="nav-link {{ request()->is('Creg') ? 'active' : '' }}">
                            <i class="fa-solid fa-user me-2"></i>
                            <div class="d-none d-sm-inline">Consignee Registration</div>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col" id="app">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Add JavaScript at the bottom of the body -->
    <script>
      
        document.addEventListener('DOMContentLoaded', function () {
    var preloader = document.getElementById('preloader');

    function showPreloader() {
        preloader.style.visibility = 'visible';
    }

    function hidePreloader() {
        preloader.style.visibility = 'hidden';
    }

    // Show preloader when navigating away from the page
    window.addEventListener('beforeunload', function () {
        showPreloader();
    });

    // Hide preloader once the new page is fully loaded
    window.addEventListener('load', function () {
        hidePreloader();
    });

    // Hide preloader if the page is loaded from cache (e.g., using the back button)
    window.addEventListener('pageshow', function (event) {
        if (event.persisted) {
            hidePreloader();
        }
    });
});

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
