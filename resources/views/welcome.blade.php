<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="antialiased">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Check in</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('backpack.auth.login')}}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('backpack.auth.register')}}">Register</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <!-- Search Field -->
            <div class="input-group mt-3">
                <form id="searchForm" action="{{ route('search') }}" method="GET" class="w-100">
                    <input type="text" name="query" id="searchInput" class="form-control" placeholder="Enter a code" aria-label="Search" autocomplete="off">
                    <button type="submit" class="btn btn-outline-success mt-2 d-block mx-auto">Check-In</button>
                </form>
            </div>            
            <!-- End Search Field -->
            <div class="mt-3">            
                @if ($members->isNotEmpty() && request('query'))
                    <h2>Details</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Label</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td><strong>Full Name:</strong></td>
                                    <td>{{ $member->fullname }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Code:</strong></td>
                                    <td>{{ $member->code }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Check-in:</strong></td>
                                    <td>
                                        @if ($member->checkins->isNotEmpty())
                                            {{ $member->checkins->last()->checkin_time }}
                                        @else
                                            No Check-in Yet
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-end">
                        <a href="{{ route('search') }}">
                            <button class="btn btn-danger">Close</button>
                        </a>
                        
                    </div>
                    
                @else
                    <p>No details found.</p>
                @endif
            </div>
            
            
            
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="{{ asset('vendor/backpack/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>
