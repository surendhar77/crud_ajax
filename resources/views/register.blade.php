<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container mt-2">
        <h2 class="text-center">Registration Here!</h2>
        <form action="{{route('user.register')}}" method="post">
            @csrf
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                </div>
            @endif
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" autocomplete="off" placeholder="Enter Name"
                    name="name" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="tel" class="form-control" id="mobile" placeholder="Enter Mobile Number"
                    name="mobile" required>
                @error('mobile')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" placeholder="Enter Confirm Password"
                    name="confirm_password" required>
                @error('confirm_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn btn-block btn-lg">Submit</button>
            </div>

            <div class="signin text-center">
                <p>Already have an account? <a href="/login">Sign In</a>.</p>
            </div>

        </form>
    </div>

</body>

</html>



<style>
    .container {
        width: 40%;
        padding: 4%;
        background-color: #F5F5F5;
        margin-top:5%;
    }

    .form-control {
        padding: 5%;
    }
</style>
