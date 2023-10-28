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
        <form action="<?php echo e(route('Admin.index')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" autocomplete="off" placeholder="Enter Email" name="email">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php /**PATH C:\xampp\htdocs\crud_ajax\resources\views/login.blade.php ENDPATH**/ ?>