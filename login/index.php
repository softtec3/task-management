<?php
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <!-- FontAwesome cdn -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Task Management</title>
</head>
<body>
    <section id="loginContainer">
        <form action="" method="post" class="loginForm">
            <h1>Login</h1>
            <div class="formContainer">
                <div>
                    <label for="user_id">User Id</label>
                    <input type="text" name="user_id" placeholder="Enter your user id">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                </div>
                <div>
                    <button type="submit" class="btn">Login</button>
                </div>
            </div>
        </form>
    </section>
</body>
</html>