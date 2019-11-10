<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                            @foreach ($obrolans as $obrolan)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                            	<label for="nama">{{ $obrolan->isipesan }}</label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
