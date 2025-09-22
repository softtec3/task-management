<?php
    
?>
<!-- Login page -->

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
        <!-- login form -->
        <form action="" method="post" class="loginForm">
            <h1>Login</h1>
            <div class="formContainer">
                <div>
                    <label for="employee_id">Employee id</label>
                    <input type="text" name="employee_id" placeholder="Enter your employee id">
                </div>
                <div>
                    <label for="password">Password</label>
                    <div class="passField">
                        <input type="password" name="password" placeholder="Enter your password" id="passField">
                        <span id="eyeIcon"><i class="fa-solid fa-eye"></i></span>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn">Login</button>
                </div>
            </div>
        </form>
    </section>
    <script>
        const passField =document.getElementById("passField");
        const eyeIcon = document.getElementById("eyeIcon");
        eyeIcon.addEventListener("click",()=>{
              if (passField.type === "password") {
                passField.type = "text";
              } else {
                 passField.type = "password";
            }
        })
    </script>
</body>
</html>