<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visitor Information</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #C9F1AA;
        }
    </style>
</head>
<body>
<div class="container my-5 custom-background">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('guest.survey.store') }}">
                @csrf

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-warning">
                        {{ session('error') }}
                    </div>
                @endif

                @include('survey::standard', ['survey' => $survey])
            </form>
        </div>
    </div>
</div>

</body>
</html>
