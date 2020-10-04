<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wall Street Reading List</title>
    <link rel="shortcut icon" href="{{ asset('media/frontend/images/favicon.png') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>

        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

        body {
            font-family: 'Open Sans', sans-serif;
            background: #222D32;
            color: #3a3c47;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        h1 {
            margin-top: 48px;
            color: #55D3Ac;
        }

        form {
            background: #1A2226;
            max-width: 360px;
            width: 100%;
            padding: 58px 44px;
            border-radius: 4px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
            transition: all 0.3s ease;
        }

        .row {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .row label {
            font-size: 13px;
            color: #8086a9;
        }

        .row input {
            background-color: transparent;
            flex: 1;
            padding: 13px;
            border: 0px;
            border-bottom: 1px solid #55D3Ac;
            font-size: 16px;
            transition: all 0.2s ease-out;
            color: #F6F6F6;
        }

        .row input:focus {
            outline: none;
            box-shadow: inset 2px 2px 5px 0 rgba(42, 45, 48, 0.12);
        }

        .row input::placeholder {
            color: #C8CDDF;
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            background: #15C39A;
            color: #fff;
            border: none;
            border-radius: 100px;
            cursor: pointer;
            font-family: 'Open Sans', sans-serif;
            margin-top: 15px;
            transition: background 0.2s ease-out;
        }

        button:hover {
            background: #55D3AC;
        }

    </style>
    
</head>
<body>

    @if (session('error'))
            <div class="alert alert-danger w-100" style="margin: 50px 0px;">
                <button type="button" class="close" data-dismiss="alert" style="margin-left: 10px;">&times;</button>
                <strong>Error!</strong> {{ session('error') }}
            </div>
    @endif

    <h1>Admin Panel</h1>

    <form method="POST" action="{{ url('/admin/login') }}">
        @csrf
        <div class="row">
            <label for="email">Email</label>
            <input type="email" name="email" autocomplete="off" placeholder="email@example.com" required autofocus>
        </div>
        <div class="row">
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>

</body>
</html>