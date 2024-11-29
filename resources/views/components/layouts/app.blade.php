<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @livewireStyles
</head>

<body style="background:lightgray;">
    <div class="container">
        <div class="row mt-2">
            <div class="col-4">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/category"><h3>Categories</h3></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/"><h3>Products</h3></a>
                    </li>
                </ul>
            </div>
            <hr>
        </div>        
        <div class="row">
            <div class="col-12">
                {{ $slot }}
            </div>
        </div>
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</body>

</html>
