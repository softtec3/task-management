<?php 
    include_once("../php/config.php");
    $prev_data = $conn->query("SELECT * FROM employees WHERE id=1");
    $fetched_data = $prev_data->fetchAll();
    // if($fetched_data){
    //     echo "<pre>";
    //     print_r($fetched_data);
    // }
// File upload function
// upload file and get name
  function upload_file_get_name($name){
   if($_FILES["$name"]){
    $path = "../uploads/".$_FILES["$name"]["name"];
    $file_name = $_FILES["$name"]["name"];
    move_uploaded_file($_FILES["$name"]["tmp_name"], $path);
    return $file_name;
  }else{
    echo "Something went Wrong";
  };
  };
    // Update Personal Details
    if(isset($_POST["fullName"])){
        $full_name =  $_POST["fullName"];
        $fathers_name = $_POST["fathersName"];
        $present_address = $_POST["presentAddress"];
        $permanent_address = $_POST["permanentAddress"];
        $contact_no = $_POST["contactNumber"];
        $profile_photo  = upload_file_get_name("profileImage");

        $update_info = $conn->prepare("UPDATE employees SET full_name='$full_name', fathers_name='$fathers_name', present_address='$present_address', permanent_address='$permanent_address', contact_no='$contact_no', photo='$profile_photo' WHERE id=1");
        $updated_personal_details = $update_info->execute();
        if($updated_personal_details){
            header("Location: index.php");
        }else{
            echo "Something went wrong";
        };
    };
?>

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
        <div class="topBar">
            <h2>Welcome Mr Tahmid Alam</h2>
            <h3>Status: Review</h3>
        </div>
        <div class="warningContainer">
            <p class="warning"><i class="fa-solid fa-triangle-exclamation"></i>
                This page of our system is governed by local state government.  Your information maybe accessed by the local government at any time for verification or necessity.
                <br>
                Please provide all your information accurately. Otherwise, your account maybe rejected.
            </p>
        </div>
        <main class="main">
            <!-- Personal Details -->
            <div class="detailsForm">
                <div class="headingDiv">
                    <h3>Personal Details</h3>
                    <p>Status: <span id="infoStatus" style="color: green;">Approved</span></p>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="profileImageUpload">
                        <img id="imgPreview" src="./placeholder.jpg" alt="">
                    <div class="formField">
                        <label for="profileImage">Upload Your Photo <span class="required">*</span></label>
                        <input id="imgPreviewInput" type="file" name="profileImage" required accept="image/*">
                    </div>
                    </div>
                    <div class="formField">
                        <label for="fullName">Full Name <span class="required">*</span></label>
                        <input type="text" name="fullName" required value="<?php
                        echo $fetched_data[0]["full_name"];
                         ?>">
                    </div>
                    <div class="formField">
                        <label for="fathersName">Father's Name <span class="required">*</span></label>
                        <input type="text" name="fathersName" required value="<?php
                        echo $fetched_data[0]["fathers_name"];
                         ?>">
                    </div>
                    <div class="formField">
                        <label for="presentAddress">Present Address <span class="required">*</span></label>
                        <input id="presentAddress" type="text" name="presentAddress" required value="<?php
                        echo $fetched_data[0]["present_address"];
                         ?>">
                    </div>
                    <div class="sameAs">
                        <input id="sameAsPresent" type="checkbox" name="sameAsPresent">
                        <label for="sameAsPresent">Same as present address </label>
                    </div>
                    <div class="formField">
                        <label for="permanentAddress">Permanent Address <span class="required">*</span></label>
                        <input id="permanentAddress" type="text" name="permanentAddress" required value="<?php
                        echo $fetched_data[0]["permanent_address"];
                         ?>">
                    </div>
                    <div class="formField">
                        <label for="contactNumber">Contact No <span class="required">*</span></label>
                        <input type="text" name="contactNumber" required value="<?php
                        echo $fetched_data[0]["contact_no"];
                         ?>">
                    </div>
                    <div class="formField">
                        <button type="submit" class="saveChangesBtn">Update</button>
                    </div>
                </form>
            </div>
            <!-- Essential Documents -->
            <div class="detailsForm">
            <div class="headingDiv">
                <h3>Essential Documents</h3>
                <p>Status: <span id="infoStatus" style="color: green;">Approved</span></p>
            </div>
            <form action="">
                <div class="formField">
                <label for="addMore">Add More Document </label>
                <select name="documentType" id="documentType" required>
                    <option style="display: none;" value="">Select Type</option>
                    <option value="nid">nid</option>
                    <option value="passport">passport</option>
                    <option value="drivingLicense">driving License</option>
                    <option value="voterCard">Voter Card</option>
                </select>
                </div>
                <div id="nidContainer">
                <div class="formField">
                <label for="nidNo">NID No</label>
                <input type="text" name="nidNo" required>
                </div>
                <div class="formField">
                <label for="nidPhoto">Photo of NID</label>
                <input type="file" name="nidPhoto" accept="image/*" required>
                </div>
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
                <div class="formField">
                <label for="drivingLicensePhoto">Photo of Driving License</label>
                <input type="file" name="drivingLicensePhoto" accept="image/*">
                </div>
                </div>

                <div id="voterIdCardContainer">
                <div class="formField">
                <label for="voterCardNo">Voter Card No</label>
                <input type="text" name="voterCardNo">
                </div>
                <div class="formField">
                <label for="voterCardPhoto">Photo of Voter Card</label>
                <input type="file" name="voterCardPhoto" accept="image/*">
                </div>
                </div>
               
                <div class="formField">
                <label for="ssnNo">SSN No <span class="required">*</span></label>
                <input type="text" name="ssnNo" required>
                </div>
                <div class="formField">
                <label for="ssnPhoto">Photo of SSN Card <span class="required">*</span></label>
                <input type="file" name="ssnPhoto" accept="image/*" required>
                </div>

               
                <div class="formField">
                <label for="itinNo">ITIN No</label>
                <input type="text" name="itinNo">
                </div>
                <div class="formField">
                <label for="itinPhoto">Photo of ITIN Letter</label>
                <input type="file" name="itinPhoto" accept="image/*">
                </div>

               
                <div class="formField">
                <label for="tinNo">TIN No</label>
                <input type="text" name="tinNo">
                </div>
                <div class="formField">
                <label for="tinPhoto">Photo of TIN Certificate</label>
                <input type="file" name="tinPhoto" accept="image/*">
                </div>
                <div class="formField">
                        <button type="submit" class="saveChangesBtn">Update</button>
                </div>
            </form>
            </div>
            <!-- Emergency Contact -->
            <div class="detailsForm">
            <div class="headingDiv">
                    <h3>Emergency Contact</h3>
                    <p>Status: <span id="infoStatus" style="color: green;">Approved</span></p>
            </div>
            <form action="">
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
            console.log(url);
            imgPreview.src = url;
        })
        // Container
        const documentType = document.getElementById("documentType");
        const nidContainer = document.getElementById("nidContainer");
        const passportContainer = document.getElementById("passportContainer");
        const drivingLicenseContainer = document.getElementById("drivingLicenseContainer");
        const voterIdCardContainer = document.getElementById("voterIdCardContainer");

        documentType.addEventListener("change",(e)=>{
        // reset all first
        [nidContainer, passportContainer, drivingLicenseContainer, voterIdCardContainer].forEach(container => {
            container.style.display = "none";
            container.querySelectorAll("input").forEach(input => input.required = false);
        });

        const value = e.target.value;

        if(value === "nid"){
            nidContainer.style.display = "block";
            nidContainer.querySelectorAll("input").forEach(input => input.required = true);
        } 
        else if(value === "passport"){
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
        const presentAddress = document.getElementById("presentAddress");

        sameAsPresent.addEventListener("change", (e)=>{
            permanentAddress.value = presentAddress.value;
        });
        
    </script>
</body>
</html>