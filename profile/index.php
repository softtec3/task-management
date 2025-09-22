<?php 
   
?>
<!-- Profile page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Profile</title>
</head>
<body>
    <section id="container">
        <!-- profile page top bar -->
        <div class="topBar">
            <h2>Welcome Mr Tahmid Alam</h2>
            <h3>Status: <span style="color: orange">Review</span></h3>
        </div>
        <!-- warning container -->
        <div class="warningContainer">
            <p class="warning"><i class="fa-solid fa-triangle-exclamation"></i>
                This page of our system is governed by local state government.  Your information maybe accessed by the local government at any time for verification or necessity.
                <br>
                Please provide all your information accurately. Otherwise, your account maybe rejected.
            </p>
        </div>
        <main class="main">
            <!-- Personal Details Form -->
            <div class="detailsForm">
                <div class="headingDiv">
                    <h3>Personal Details</h3>
                    <p>Status: <span id="infoStatus" style="color:orange">Review</span></p>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="profileImageUpload">
                        <div class="profileImageContainer">
                            <img id='imgPreview' src='./placeholder.jpg'>
                        </div>
                    <div class="formField">
                        <label for="profileImage">Upload Your Photo <span class="required">*</span></label>
                        <input id="imgPreviewInput" type="file" name="profileImage" required accept="image/*">
                    </div>
                    </div>
                    <div class="formFlex">
                        <div class="formField">
                            <label for="firstName">First Name <span class="required">*</span></label>
                            <input type="text" name="firstName" required>
                        </div>
                        <div class="formField">
                            <label for="lastName">Last Name <span class="required">*</span></label>
                            <input type="text" name="lastName" required>
                        </div>                        
                    </div>

                    <div class="formField">
                        <label for="fathersName">Father's Name <span class="required">*</span></label>
                        <input type="text" name="fathersName" required>
                    </div>

                    <div class="presentAddressContainer">
                        <h4>Present Address</h4>
                    <div class="formFlex">
                    <div class="formField">
                        <label for="presentAddressStreetOne">Street Address 1 <span class="required">*</span></label>
                        <input id="presentAddressStreetOne" type="text" name="presentAddressStreetOne" required>
                    </div>                        
                    <div class="formField">
                        <label for="presentAddressStreetTwo">Street Address 2 (Optional)</label>
                        <input id="presentAddressStreetTwo" type="text" name="presentAddressStreetTwo">
                    </div>                        
                    </div>
                    <div class="formFlex">
                        <div class="formField">
                        <label for="city">City <span class="required">*</span></label>
                        <input id="city" type="text" name="city"  required>
                        </div>   
                        <div class="formField">
                        <label for="state">State <span class="required">*</span></label>
                        <input id="state" type="text" name="state" required>
                        </div>   
                        <div class="formField">
                        <label for="zipcode">Zipcode <span class="required">*</span></label>
                        <input id="zipcode" type="text" name="zipcode" required>
                        </div>   
                    </div>
                    <div class="formField">
                        <label for="country">Country <span class="required">*</span></label>
                        <input id="country" type="text" name="country" value="USA" readonly>
                    </div>
                    </div>
                    <div class="sameAs">
                        <input id="sameAsPresent" type="checkbox" name="sameAsPresent" onchange="handleCheckbox(this)"> 
                        <label for="sameAsPresent">Same as present address </label>
                    </div>
                <!-- permanent address -->
                    <div class="permanentAddressContainer">
                        <h4>Permanent Address</h4>
                    <div class="formFlex">
                    <div class="formField">
                        <label for="permanentAddressStreetOne">Street Address 1 <span class="required">*</span></label>
                        <input id="permanentAddressStreetOne" type="text" name="permanentAddressStreetOne" required>
                    </div>                        
                    <div class="formField">
                        <label for="permanentAddressStreetTwo">Street Address 2 (Optional)</label>
                        <input id="permanentAddressStreetTwo" type="text" name="permanentAddressStreetTwo">
                    </div>                        
                    </div>
                    <div class="formFlex">
                        <div class="formField">
                        <label for="permanentCity">City <span class="required">*</span></label>
                        <input id="permanentCity" type="text" name="permanentCity"  required>
                        </div>   
                        <div class="formField">
                        <label for="permanentState">State <span class="required">*</span></label>
                        <input id="permanentState" type="text" name="permanentState" required>
                        </div>   
                        <div class="formField">
                        <label for="permanentZipcode">Zipcode <span class="required">*</span></label>
                        <input id="permanentZipcode" type="text" name="permanentZipcode" required>
                        </div>   
                    </div>
                    <div class="formField">
                        <label for="country">Country <span class="required">*</span></label>
                        <input id="country" type="text" name="country" value="USA" readonly>
                    </div>
                    </div>
                    <div class="formField">
                    <div id="numberCode">
                        <label for="contactNumber">Contact No</label>
                        <select name="numberType" id="numberType">
                            <option value="usa">USA +1</option>
                            <option value="bangladesh">Bangladesh +880</option>
                        </select>
                    </div>
                    <input type="text" id="contactNumber" name="contactNumber" value="+1" required>
                    </div>
                    <div class="formField">
                        <button type="submit" class="saveChangesBtn">Update</button>
                    </div>
                </form>
            </div>
            <!-- Essential Documents Form -->
            <div class="detailsForm">
            <div class="headingDiv">
                <h3>Essential Documents</h3>
                <p>Status: <span id="infoStatus" style="color: orange">Review</span></p>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="formField">
                <label for="addMore">Add More Document </label>
                <select name="documentType" id="documentType" required>
                    <option style="display: none;" value="">Select Type</option>
                    <option value="passport">passport</option>
                    <option value="drivingLicense">driving License</option>
                    <option value="voterCard">Voter Card</option>
                </select>
                </div>

               <div id="passportContainer">
                <div class="formField">
                <label for="passportNo">Passport No</label>
                <input type="text" name="passportNo">
                </div>
                <div class="formField">
                <label for="passportPhoto">Photo of Passport</label>
                <input type="file" name="passportPhoto" accept="image/*">
                </div>
                </div>

               <div id="drivingLicenseContainer">
                <div class="formField">
                <label for="drivingLicenseNo">Driving License No</label>
                <input type="text" name="drivingLicenseNo">
                </div>
                <div class="formFlex">
                <div class="formField">
                <label for="drivingLicenseFrontPhoto">Driving License Front Photo</label>
                <input type="file" name="drivingLicenseFrontPhoto" accept="image/*">
                </div>
                <div class="formField">
                <label for="drivingLicenseBackPhoto">Driving License Back Photo</label>
                <input type="file" name="drivingLicenseBackPhoto" accept="image/*">
                </div>                    
                </div>


                </div>

                <div id="voterIdCardContainer">
                <div class="formField">
                <label for="voterCardNo">Voter Card No</label>
                <input type="text" name="voterCardNo">
                </div>
                <div class="formFlex">
                <div class="formField">
                <label for="voterCardFrontPhoto">Voter Card Front Photo</label>
                <input type="file" name="voterCardFrontPhoto" accept="image/*">
                </div>
                <div class="formField">
                <label for="voterCardBackPhoto">Voter Card Back Photo</label>
                <input type="file" name="voterCardBackPhoto" accept="image/*">
                </div>                    
                </div>

                </div>

                <!-- SSN -->
                <div id="ssnContainer">
                    <div class="formField">
                        <label for="ssnNo">SSN No <span class="required">*</span></label>
                        <input type="text" name="ssnNo" required maxlength="9">
                    </div>
                    <div class="formField">
                        <label for="ssnPhoto">Photo of SSN Card <span class="required">*</span></label>
                        <input type="file" name="ssnPhoto" accept="image/*" required>
                    </div>
                </div>

                <!-- ITIN -->
                <div id="itinContainer">
                    <div class="formField">
                        <label for="itinNo">ITIN No</label>
                        <input type="text" name="itinNo" maxlength="9">
                    </div>
                    <div class="formField">
                        <label for="itinPhoto">Photo of ITIN Letter</label>
                        <input type="file" name="itinPhoto" accept="image/*">
                    </div>
                </div>
                <div class="formField">
                <button type="submit" name="essential" value="essential" class="saveChangesBtn">Update</button>
                </div>
            </form>
            </div>
            <!-- Emergency Contact Form -->
            <div class="detailsForm">
            <div class="headingDiv">
                    <h3>Emergency Contact</h3>
                    <p>Status: <span id="infoStatus" style="color:orange">Review</span></p>
            </div>
            <form action="" method="post">
                <!-- Contact 1 -->
                <h4>Contact 1</h4>
                <div class="formField">
                <label for="emergencyName1">Full Name <span class="required">*</span></label>
                <input type="text" name="emergencyName1" required>
                </div>
                <div class="formField">
                <label for="emergencyRelation1">Relationship <span class="required">*</span></label>
                <input type="text" name="emergencyRelation1" required>
                </div>
                <div class="formField">
                <label for="emergencyPhone1">Contact Number <span class="required">*</span></label>
                <input type="text" name="emergencyPhone1" required>
                </div>

                <!-- Contact 2 -->
                <h4>Contact 2</h4>
                <div class="formField">
                <label for="emergencyName2">Full Name</label>
                <input type="text" name="emergencyName2">
                </div>
                <div class="formField">
                <label for="emergencyRelation2">Relationship</label>
                <input type="text" name="emergencyRelation2">
                </div>
                <div class="formField">
                <label for="emergencyPhone2">Contact Number</label>
                <input type="text" name="emergencyPhone2">
                </div>

                <!-- Contact 3 -->
                <h4>Contact 3</h4>
                <div class="formField">
                <label for="emergencyName3">Full Name</label>
                <input type="text" name="emergencyName3">
                </div>
                <div class="formField">
                <label for="emergencyRelation3">Relationship</label>
                <input type="text" name="emergencyRelation3">
                </div>
                <div class="formField">
                <label for="emergencyPhone3">Contact Number</label>
                <input type="text" name="emergencyPhone3">
                </div>
                <div class="formField">
                        <button type="submit" class="saveChangesBtn">Update</button>
                </div>
            </form>
            </div>

        </main>
    </section>
    <script>
        const imgPreview = document.getElementById("imgPreview");
        const imgPreviewInput = document.getElementById("imgPreviewInput");
        imgPreviewInput.addEventListener("change",(e)=>{
            const url = URL.createObjectURL(e.target.files[0]);
            imgPreview.src = url;
        })
        // Container
        const documentType = document.getElementById("documentType");
        const passportContainer = document.getElementById("passportContainer");
        const drivingLicenseContainer = document.getElementById("drivingLicenseContainer");
        const voterIdCardContainer = document.getElementById("voterIdCardContainer");

        documentType.addEventListener("change",(e)=>{
        // reset all first
        [ passportContainer, drivingLicenseContainer, voterIdCardContainer].forEach(container => {
            container.style.display = "none";
            container.querySelectorAll("input").forEach(input => input.required = false);
        });

        const value = e.target.value;

        if(value === "passport"){
            passportContainer.style.display = "block";
            passportContainer.querySelectorAll("input").forEach(input => input.required = true);
        } 
        else if(value === "drivingLicense"){
            drivingLicenseContainer.style.display = "block";
            drivingLicenseContainer.querySelectorAll("input").forEach(input => input.required = true);
        } 
        else if(value === "voterCard"){
            voterIdCardContainer.style.display = "block";
            voterIdCardContainer.querySelectorAll("input").forEach(input => input.required = true);
        }
        });
        // permanent and present address
        const permanentAddress = document.getElementById("permanentAddress");
        const sameAsPresent = document.getElementById("sameAsPresent");
        // const presentAddress = document.getElementById("presentAddress");
        const permanentAddressStreetOne = document.getElementById("permanentAddressStreetOne");
        const permanentAddressStreetTwo = document.getElementById("permanentAddressStreetTwo");
        const permanentCity = document.getElementById("permanentCity");
        const permanentState = document.getElementById("permanentState");
        const permanentZipcode = document.getElementById("permanentZipcode");
        const presentAddressStreetOne = document.getElementById("presentAddressStreetOne");
        const presentAddressStreetTwo = document.getElementById("presentAddressStreetTwo");
        const city = document.getElementById("city");
        const state = document.getElementById("state");
        const zipcode = document.getElementById("zipcode");
        function handleCheckbox(checkbox) {
        if (checkbox.checked) {
            permanentAddressStreetOne.value = presentAddressStreetOne.value;
            permanentAddressStreetTwo.value = presentAddressStreetTwo.value;
            permanentCity.value = city.value;
            permanentState.value = state.value;
            permanentZipcode.value = zipcode.value;
        } 
        };
       
        const contactInput = document.getElementById("contactNumber");
        const numberType = document.getElementById("numberType");

        numberType.addEventListener("change",(e)=>{
            const value = e.target.value;
            if(value === "bangladesh"){
                contactInput.value = "+880";
            }else{
                contactInput.value = "+1"
            }

        })
    </script>
</body>
</html>