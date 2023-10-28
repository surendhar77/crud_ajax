<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2 class="text-center">User Login</h2>
        <form action="{{route('Admin.index')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" autocomplete="off" placeholder="Enter Email" name="email">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn btn-block btn-lg">Submit</button>
            </div>

            <div class="signin text-center">
                <p>Don't have an account? <a href="/register">Sign Up</a>.</p>
            </div>

        </form>
    </div>

</body>

</html>



<style>
    .container {
        width: 40%;
        padding: 4%;
        
    }

    .form-control {
        padding: 5%;
    }
</style>
