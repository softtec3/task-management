<?php
    include("./php/config.php");
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
?>

<aside class="sidebar">
           <div class="profile">
            <div class="proImg">
                <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bWFufGVufDB8fDB8fHww" alt="">
            </div>
            <div class="proDesc">
                <p>101</p>
                <p>Tahmid Alam</p>
                <p>Development</p>
                <button id="loginBtn" class="loginBtn">Profile Login</button>
            </div>
           </div>
           <div class="links">
            <a href="/task-management"><i class="fas fa-house"></i> Home</a>
            <a href="/task-management/new-tasks"><i class="fas fa-plus-circle"></i> New Tasks</a>
            <a href="/task-management/completed-tasks"><i class="fas fa-check-circle"></i> Completed Tasks</a>
            <a href="/task-management/started-tasks"><i class="fas fa-play-circle"></i> Started Tasks</a>
            <a href="/task-management/pending-tasks"><i class="fas fa-hourglass-half"></i> Pending Tasks</a>
           </div>

           <div id="loginPopup">
            <div class="loginPopupContainer">
            <span id="loginPopupCloseBtn"><i class="fa-solid fa-xmark"></i></span>
                <div id="loginDefault" class="loginDefault">
                    <p> <i class="fa-solid fa-triangle-exclamation" style="color: red;"></i> Your profile page contains very important and confidential information. So, Don't share your profile passkey with others.</p>
                    <form action="" method="post" class="passkeyContainer">
                        <label for="passkey">Passkey</label>
                        <div class="inputField">
                            <input type="number" name="passkey" placeholder="5 Digits" maxlength="5">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                    <button id="changePasskeyBtn" class="btn changePasskeyBtn">Change Passkey</button>
                </div>

                <div id="changePasskey" class="changePasskey">
                    <h3>Set New Passkey</h3>
                    <div class="cpDiv">
                        <label for="currentPasskey">Current Passkey</label>
                        <input type="text" name="current">
                    </div>
                    <div class="cpDiv">
                        <label for="newPasskey">New Passkey</label>
                        <input type="text" name="new">
                    </div>
                    <div class="cpDiv">
                        <label for="confirmNewPasskey">Confirm New Passkey</label>
                        <input type="text" name="confirmNewPasskey">
                    </div>
                    <div class="cpActionsBtns">
                        <button  class="btn">Change</button>
                        <button id="cancelBtn" class="btn">Cancel</button>
                    </div>
                </div>
            </div>
           </div>
</aside>

<script>
    const loginPopup = document.getElementById("loginPopup");
    const loginPopupCloseBtn = document.getElementById("loginPopupCloseBtn")
    const loginBtn = document.getElementById("loginBtn");
    const loginDefault = document.getElementById("loginDefault");
    const changePasskey = document.getElementById("changePasskey");
    const changePasskeyBtn = document.getElementById("changePasskeyBtn");
    const cancelBtn = document.getElementById("cancelBtn")
    changePasskeyBtn.addEventListener("click",()=>{
        loginDefault.style.display = "none";
        changePasskey.style.display = "flex"
    })
    cancelBtn.addEventListener("click",()=>{
        loginDefault.style.display = "block";
        changePasskey.style.display = "none"
    })
    loginPopupCloseBtn.addEventListener("click",()=>{
        loginPopup.style.display = "none";
    })
    loginBtn.addEventListener("click",()=>{
        loginPopup.style.display = "flex";
    })
    
</script>