<?php
    include("./php/config.php");
    session_start();
    if (!isset($_SESSION["user_id"])) {
        header("Location: /task-management/login");
        exit();
    };
    // Checking for profile page
    $user_id =  $_SESSION["user_id"];
    if(isset($_POST["passkey"])){
        $passkey = $_POST["passkey"];
        $find_user = $conn->query("SELECT * FROM passkey_log WHERE employee_id='$user_id'");
        $get_user = $find_user->fetch();
        if($get_user){
            if($get_user["passkey"] == $passkey){
                $_SESSION["verify_user"] = $get_user["employee_id"];
                header("Location: /task-management/profile");
                exit();
            }else{
                echo "Password not matched";
            }
        }else{
            echo "User not found";
        }
    }
    // Passkey change
    $changed = false;
    if(isset($_POST['currentPasskey'])){
        $current_passkey = $_POST["currentPasskey"];
        $new_passkey = $_POST["newPasskey"];
        $get_user_data = $conn->query("SELECT * FROM passkey_log WHERE employee_id='$user_id'");
        $user_data = $get_user_data->fetch();
        if($user_data){
            if($user_data["passkey"] == $current_passkey){
                $change_passkey = $conn->prepare("UPDATE passkey_log SET passkey='$new_passkey' WHERE employee_id='$user_id'");
                $changed_passkey = $change_passkey->execute();
                if($changed_passkey){
                    echo "Passkey Changed. Please Login";
                    unset($_SESSION["verify_user"]);
                    $changed = true;
                }else{
                    echo "Something went wrong";
                }
            }else{
               echo "Invalid current passkey"; 
            }
        }else{
            echo "User not found";
        };
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <!-- FontAwesome cdn -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Task Management</title>
</head>
<body>
    <section id="container">
        <!-- Sidebar -->
        <?php include_once("./components/sidebar.php")?>
        <main class="main">
             <?php include_once("./components/topbar.php")?>
            <div class="newTasksContainer">
                <div class="runningTask">
                    <h3>Running Task:</h3>
                    <p>Employee Management Development</p>
                </div>
                <div class="givenTasks">
                    <h2>New Tasks</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Assign Date</th>
                                <th>Details</th>
                                <th>Schedule</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Singles task -->
                            <!-- <tr>
                                <td>01</td>
                                <td>9/16/2025 | 11:00 AM</td>
                                <td>Employee management website... <span class="viewButton">view</span></td>
                                <td>9/16/2025 To 9/30/2025</td>
                                <td>
                                    <select name="status" id="status">
                                        <option value="pending">pending</option>
                                        <option value="started">started</option>
                                        <option value="paused">paused</option>
                                        <option value="complete">complete</option>
                                    </select>
                                </td>
                            </tr> -->
                            <!-- Singles task -->
                            <!-- <tr>
                                <td>02</td>
                                <td>9/16/2025 | 11:00 AM</td>
                                <td>Employee management website... <span class="viewButton">view</span></td>
                                <td>9/16/2025 To 9/30/2025</td>
                                <td>
                                    <select name="status" id="status">
                                        <option value="pending">pending</option>
                                        <option value="started">started</option>
                                        <option value="paused">paused</option>
                                        <option value="complete">complete</option>
                                    </select>
                                </td>
                            </tr> -->
                            <tr>
                                <td colspan="5">Task Not Found</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="taskViewPopup">
                    <div class="taskViewContainer">
                        <span id="taskViewCloseBtn"><i class="fa-solid fa-xmark"></i></span>
                        <p>hello</p>
                    </div>
                </div>
            </div>
        </main>
    </section>
    <script>
        const viewButtons = document.querySelectorAll(".viewButton");
        const taskViewPopup = document.getElementById("taskViewPopup");
        const taskViewCloseBtn = document.getElementById("taskViewCloseBtn");

        viewButtons.forEach(button => {
        button.addEventListener("click", () => {
            taskViewPopup.style.display = "flex";
            console.log("Clicked");
        });
        });

        taskViewCloseBtn.addEventListener("click", () => {
        taskViewPopup.style.display = "none";
        console.log("Clicked Close");
        });
    </script>
</body>
</html>