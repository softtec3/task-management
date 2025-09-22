<?php

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
             <!-- Running Task container -->
            <div class="newTasksContainer">
                <div class="runningTask">
                    <h3>Running Task:</h3>
                    <p>Employee Management Development</p>
                </div>
                <!-- New Tasks table -->
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
                <!-- Task view popup -->
                <div id="taskViewPopup">
                    <div class="taskViewContainer">
                        <span id="taskViewCloseBtn"><i class="fa-solid fa-xmark"></i></span>
                        <p>hello</p>
                    </div>
                </div>
            </div>
        </main>
    </section>
    <!-- Js codes for popup open and close -->
    <script>
        const viewButtons = document.querySelectorAll(".viewButton");
        const taskViewPopup = document.getElementById("taskViewPopup");
        const taskViewCloseBtn = document.getElementById("taskViewCloseBtn");

        viewButtons.forEach(button => {
        button.addEventListener("click", () => {
            taskViewPopup.style.display = "flex";
        });
        });

        taskViewCloseBtn.addEventListener("click", () => {
        taskViewPopup.style.display = "none";
        });
    </script>
</body>
</html>