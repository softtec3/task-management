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
                    <div class="passkeyContainer">
                        <label for="passkey">Passkey</label>
                        <div class="inputField">
                            <input type="number" placeholder="5 Digits">
                            <button>Submit</button>
                        </div>
                    </div>
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