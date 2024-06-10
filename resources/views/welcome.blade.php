<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body class="antialiased">
    <!-- <div class="container py-5"> -->
        <div class="row justify-content-center align-items-center">
            <div class="col-11">
                <div class="text-center mb-4">
                    <svg width="200" height="200" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <!-- Shield -->
                        <path d="M50 2 L70 10 L70 40 Q50 90 30 40 L30 10 Z" fill="#2c3e50" stroke="#34495e" stroke-width="2" />
                        <!-- Heart -->
                        <path d="M50 30 
                                C35 20, 20 35, 50 60
                                C80 35, 65 20, 50 30
                                Z" fill="#e74c3c" />
                        <!-- Cross -->
                        <rect x="45" y="38" width="10" height="25" fill="white" />
                        <rect x="38" y="45" width="25" height="10" fill="white" />
                    </svg>
                </div>
                <div class="bg-white shadow-lg p-4 rounded">
                    <h2 class="mt-3 mb-2 text-center text-dark">CareShield Health Insurance</h2>
                    <p class="lead mb-4 text-center">Your trusted partner in health insurance.</p>
                    <p class="text-muted text-center mb-4">
                        At CareShield, we prioritize your health and well-being. Our comprehensive insurance plans ensure you and your loved ones are always protected.
                    </p>
                    <livewire:user-records/>
                </div>
        </div>
        </div>
<!-- </div> -->


       
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
