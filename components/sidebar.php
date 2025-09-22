<!-- This is sidebar -->
<aside class="sidebar">
    <!-- Profile section -->
           <div class="profile">
            <div class="proImg">
                <img src='./placeholder.jpg'>
            </div>
            <div class="proDesc">
                <table>
                    <tr>
                        <th>ID:</th>
                        <td>101</td>
                    </tr>
                    <tr>
                        <th>Name:</th>
                        <td>Name here</td>
                    </tr>
                    <tr>
                        <th>Department:</th>
                        <td>Development</td>
                    </tr>
                </table>
                <button id="loginBtn" class="loginBtn">Profile Login</button>
            </div>
           </div>
           <!-- navigation links -->
           <div class="links">
            <a href="/task-management"><i class="fas fa-house"></i> Home</a>
            <a href="/task-management/new-tasks"><i class="fas fa-plus-circle"></i> New Tasks</a>
            <a href="/task-management/completed-tasks"><i class="fas fa-check-circle"></i> Completed Tasks</a>
            <a href="/task-management/started-tasks"><i class="fas fa-play-circle"></i> Started Tasks</a>
            <a href="/task-management/pending-tasks"><i class="fas fa-hourglass-half"></i> Pending Tasks</a>
           </div>
            <!-- Profile login popup -->
           <div id="loginPopup" style="display:none">
            <div class="loginPopupContainer">
            <span id="loginPopupCloseBtn"><i class="fa-solid fa-xmark"></i></span>
            <!-- Profile login form -->
                <div id="loginDefault" class="loginDefault">
                    <p> <i class="fa-solid fa-triangle-exclamation" style="color: red;"></i> Your profile page contains very important and confidential information. So, Don't share your profile passkey with others.</p>
                    <form action="" method="post" class="passkeyContainer">
                        <label for="passkey">Passkey</label>
                        <div class="inputField">
                            <input type="text" name="passkey" placeholder="5 Digits" required maxlength="5" id="onlyNumber">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                    <button id="changePasskeyBtn" class="btn changePasskeyBtn">Change Passkey</button>
                </div>
                <!-- Change passkey form -->
                <form action="" method="post" id="changePasskey" class="changePasskey">
                    <h3>Set New Passkey</h3>
                    <div class="cpDiv">
                        <label for="currentPasskey">Current Passkey</label>
                        <input type="password" name="currentPasskey" required>
                    </div>
                    <div class="cpDiv">
                        <label for="newPasskey">New Passkey</label>
                        <input type="password" name="newPasskey" id="newPasskey" required>
                    </div>
                    <div class="cpDiv">
                        <label for="confirmNewPasskey">Confirm New Passkey</label>
                        <input type="password" name="confirmNewPasskey" id="confirmNewPasskey" required>
                    </div>
                    <span id="errorSpan"></span>
                    <div class="cpActionsBtns">
                        <button type="submit" id="changeBtn" class="btn">Change</button>
                        <button type="button" id="cancelBtn" class="btn">Cancel</button>
                    </div>
                </form>
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

    // newPasskey and confirmNewPasskey matched
    const newPasskey = document.getElementById("newPasskey");
    const confirmNewPasskey = document.getElementById("confirmNewPasskey");
    const errorSpan = document.getElementById("errorSpan");
    const changeBtn = document.getElementById("changeBtn");
   
    confirmNewPasskey.addEventListener("input",(e)=>{
        let value = e.target.value;
        if(value !== newPasskey.value){
            changeBtn.disabled = true;
            errorSpan.innerText = "Confirm password not matched with new password"
        }else{
            errorSpan.innerText = "";
            changeBtn.disabled = false;
        }
    })
    // number
    const input = document.getElementById("onlyNumber");
    input.addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9]/g, "");
    });
    
</script>