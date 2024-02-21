<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Plugin css file -->
    <link rel="stylesheet" href="css/filters.min.css" />
    <!-- Custom styles -->

</head>

<body>
    <div>
        {{-- NavBar begin --}}
        @yield('navlink')


        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarExample01"
                    aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{ asset('https://mdbecommerce.com/') }}">
                    <i class="fab fa-mdb fa-2x" alt="mdb logo"></i>
                </a>
                <div class="collapse navbar-collapse ml-auto" id="navbarExample01">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item my-auto">
                            <a class="nav-link active" aria-current="page" href="{{ route('cart.index') }}"><i
                                    class="fas fa-shopping-cart"></i></a>
                        </li>

                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link active" aria-current="page" href="{{ route('product.index') }}">Shop</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link active" aria-current="page" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link active" aria-current="page" href="{{ route('contact') }}">Contact us</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Sign in</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link active" aria-current="page" href="{{ route('product.favorite') }}">Favorite product</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    {{-- Footer begin --}}
    @yield('footer')
    <div class="container">
        <footer class="py-5">
            <div class="row">




                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                    <p>&copy; 2023 Company, Inc. All rights reserved.</p>
                    <ul class="list-unstyled d-flex">
                        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi"
                                    width="24" height="24">
                                    <use xlink:href="#twitter" />
                                </svg></a></li>
                        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi"
                                    width="24" height="24">
                                    <use xlink:href="#instagram" />
                                </svg></a></li>
                        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi"
                                    width="24" height="24">
                                    <use xlink:href="#facebook" />
                                </svg></a></li>
                    </ul>
                </div>
        </footer>
    </div>
    @yield('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleButton = document.getElementById('toggleFilters');
            const filtersSection = document.getElementById('filters');

            toggleButton.addEventListener('click', function() {
                if (filtersSection.style.display === 'none' || filtersSection.style.display === '') {
                    filtersSection.style.display = 'block';
                    toggleButton.textContent = 'Скрыть фильтры';
                } else {
                    filtersSection.style.display = 'none';
                    toggleButton.textContent = 'Показать фильтры';
                }
            });
        });
    </script>

</body>

</html>
