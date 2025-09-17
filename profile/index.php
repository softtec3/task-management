<?php 
    session_start();
    if(!isset($_SESSION["verify_user"])){
        header("Location: /task-management");
        exit();
    }
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
    if(isset($_POST["firstName"])){
        // Profile Information
        $profile_image = upload_file_get_name("profileImage");
        $first_name = $_POST["firstName"];
        $last_name = $_POST["lastName"];
        $fathers_name = $_POST["fathersName"];

        // Present Address
        $present_address_street_one = $_POST["presentAddressStreetOne"];
        $present_address_street_two = $_POST["presentAddressStreetTwo"];
        $present_city = $_POST["city"];
        $present_state = $_POST["state"];
        $present_zipcode = $_POST["zipcode"];
        $present_country = $_POST["country"]; // default "USA"

        // Permanent Address
        $permanent_address_street_one = $_POST["permanentAddressStreetOne"];
        $permanent_address_street_two = $_POST["permanentAddressStreetTwo"];
        $permanent_city = $_POST["permanentCity"];
        $permanent_state = $_POST["permanentState"];
        $permanent_zipcode = $_POST["permanentZipcode"];
        $permanent_country = $_POST["country"];

        // Contact Info
        $contact_number = $_POST["contactNumber"];
        $update_info = $conn->prepare("UPDATE employees SET 
        profile_image = '$profile_image',
        first_name = '$first_name',
        last_name = '$last_name',
        fathers_name = '$fathers_name',
        present_street1 = '$present_address_street_one',
        present_street2 = '$present_address_street_two',
        present_city = '$present_city',
        present_state = '$present_state',
        present_zipcode = '$present_zipcode',
        present_country = '$present_country',
        permanent_street1 = '$permanent_address_street_one',
        permanent_street2 = '$permanent_address_street_two',
        permanent_city = '$permanent_city',
        permanent_state = '$present_state',
        permanent_zipcode = '$permanent_zipcode',
        permanent_country = '$permanent_country',
        contact_number = '$contact_number'
        WHERE id = 1
        ");
        $updated_personal_details = $update_info->execute();
        if($updated_personal_details){
            header("Location: index.php");
        }else{
            return null;
        };
    };
    // Update Emergency contact
    if(isset($_POST["emergencyName1"])){
        $e_full_name_one = $_POST["emergencyName1"];
        $e_full_relation_one = $_POST["emergencyRelation1"];
        $e_full_contact_one = $_POST["emergencyPhone1"];
        $e_full_name_two = $_POST["emergencyName2"];
        $e_full_relation_two = $_POST["emergencyRelation2"];
        $e_full_contact_two = $_POST["emergencyPhone2"];
        $e_full_name_three = $_POST["emergencyName3"];
        $e_full_relation_three = $_POST["emergencyRelation3"];
        $e_full_contact_three = $_POST["emergencyPhone3"];

        $update_emergency_contact = $conn->prepare("UPDATE employees SET e_full_name_one='$e_full_name_one', e_full_relation_one='$e_full_relation_one', e_full_contact_one='$e_full_contact_one', e_full_name_two='$e_full_name_two', e_full_relation_two='$e_full_relation_two', e_full_contact_two='$e_full_contact_two', e_full_name_three='$e_full_name_three',  e_full_relation_three='$e_full_relation_three', e_full_contact_three='$e_full_contact_three' WHERE id=1");
        
        $updated_emergency_contact = $update_emergency_contact->execute();
        if($updated_emergency_contact){
            header("Location: index.php");
        }else{
            echo "Something went wrong";
        };
    };
    // Update Essential Documents
    if(isset($_POST["essential"])){
    // essential Documents
    $passport_no  = $_POST["passportNo"];
    $driving_license_no = $_POST["drivingLicenseNo"];
    $voter_id_no = $_POST["voterCardNo"];
    $ssn_no = $_POST["ssnNo"];
    $itin_no = $_POST["itinNo"];
    if($passport_no && $_FILES["passportPhoto"]){
        $passport_photo = upload_file_get_name("passportPhoto");
        $update_passport = $conn->prepare("UPDATE employees SET passport_no='$passport_no', passport_photo='$passport_photo' WHERE id=1");
        $updated_passport = $update_passport->execute();
        if($updated_passport){
            header("Location: index.php");
        }else{
            return null;
        };
    };

    if($driving_license_no){
    $driving_license_front_photo = upload_file_get_name("drivingLicenseFrontPhoto");
    $driving_license_back_photo  = upload_file_get_name("drivingLicenseBackPhoto");

    $update_driving_license = $conn->prepare("UPDATE employees SET driving_license_no='$driving_license_no', driving_license_front='$driving_license_front_photo',
    driving_license_back='$driving_license_back_photo'
    WHERE id=1");
        $updated_driving_license = $update_driving_license->execute();
        if($updated_driving_license){
            header("Location: index.php");
        }else{
            return null;
        };
    };
    if($voter_id_no){
    $voter_card_front_photo = upload_file_get_name("voterCardFrontPhoto");
    $voter_card_back_photo  = upload_file_get_name("voterCardBackPhoto");

    $update_voter_card = $conn->prepare("UPDATE employees SET voter_card_no='$voter_id_no', voter_card_front='$voter_card_front_photo',
    voter_card_back='$voter_card_back_photo'
    WHERE id=1");
        $updated_voter_card = $update_voter_card->execute();
        if($updated_voter_card){
            header("Location: index.php");
        }else{
            return null;
        };

    };
    if($ssn_no){
        echo "SSN";
    $ssn_photo = upload_file_get_name("ssnPhoto");

    $update_ssn = $conn->prepare("UPDATE employees SET ssn_no='$ssn_no', ssn_photo='$ssn_photo' WHERE id=1");

        $updated_ssn = $update_ssn->execute();
        if($updated_ssn){
            header("Location: index.php");
        }else{
            return null;
        };
    };
    if($itin_no){
    $itin_photo = upload_file_get_name("itinPhoto");

    $update_itin = $conn->prepare("UPDATE employees SET itin_no='$itin_no', itin_photo='$itin_photo'
    WHERE id=1");
        $updated_itin = $update_itin->execute();
        if($updated_itin){
            header("Location: index.php");
        }else{
            return null;
        };
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
                        <div class="profileImageContainer">
                            <?php 
                            if($fetched_data[0]["profile_image"]){
                            $url = "../uploads/". $fetched_data[0]['profile_image'];
                              echo "<img id='imgPreview' src='$url'>";
                            }else{
                                 echo "<img id='imgPreview' src='./placeholder.jpg'>";
                            }
                            ?>
                        </div>
                    <div class="formField">
                        <label for="profileImage">Upload Your Photo <span class="required">*</span></label>
                        <input id="imgPreviewInput" type="file" name="profileImage" required accept="image/*">
                    </div>
                    </div>
                    <div class="formFlex">
                        <div class="formField">
                            <label for="firstName">First Name <span class="required">*</span></label>
                            <input type="text" name="firstName" required value="<?php echo $fetched_data[0]['first_name']?>">
                        </div>
                        <div class="formField">
                            <label for="lastName">Last Name <span class="required">*</span></label>
                            <input type="text" name="lastName" required value="<?php echo $fetched_data[0]['last_name']?>">
                        </div>                        
                    </div>

                    <div class="formField">
                        <label for="fathersName">Father's Name <span class="required">*</span></label>
                        <input type="text" name="fathersName" required value="<?php
                        echo $fetched_data[0]["fathers_name"];
                         ?>">
                    </div>

                    <div class="presentAddressContainer">
                        <h4>Present Address</h4>
                    <div class="formFlex">
                    <div class="formField">
                        <label for="presentAddressStreetOne">Street Address 1 <span class="required">*</span></label>
                        <input id="presentAddressStreetOne" type="text" name="presentAddressStreetOne" required value="<?php echo $fetched_data[0]['present_street1']?>">
                    </div>                        
                    <div class="formField">
                        <label for="presentAddressStreetTwo">Street Address 2 (Optional)</label>
                        <input id="presentAddressStreetTwo" type="text" name="presentAddressStreetTwo" value="<?php echo $fetched_data[0]['present_street2']?>" >
                    </div>                        
                    </div>
                    <div class="formFlex">
                        <div class="formField">
                        <label for="city">City <span class="required">*</span></label>
                        <input id="city" type="text" name="city"  required value="<?php echo $fetched_data[0]['present_city']?>">
                        </div>   
                        <div class="formField">
                        <label for="state">State <span class="required">*</span></label>
                        <input id="state" type="text" name="state" required value="<?php echo $fetched_data[0]['present_state']?>">
                        </div>   
                        <div class="formField">
                        <label for="zipcode">Zipcode <span class="required">*</span></label>
                        <input id="zipcode" type="text" name="zipcode" required value="<?php echo $fetched_data[0]['present_zipcode']?>">
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
                        <input id="permanentAddressStreetOne" type="text" name="permanentAddressStreetOne" required value="<?php echo $fetched_data[0]['permanent_street1']?>">
                    </div>                        
                    <div class="formField">
                        <label for="permanentAddressStreetTwo">Street Address 2 (Optional)</label>
                        <input id="permanentAddressStreetTwo" type="text" name="permanentAddressStreetTwo" value="<?php echo $fetched_data[0]['permanent_street2']?>">
                    </div>                        
                    </div>
                    <div class="formFlex">
                        <div class="formField">
                        <label for="permanentCity">City <span class="required">*</span></label>
                        <input id="permanentCity" type="text" name="permanentCity"  required value="<?php echo $fetched_data[0]['permanent_city']?>">
                        </div>   
                        <div class="formField">
                        <label for="permanentState">State <span class="required">*</span></label>
                        <input id="permanentState" type="text" name="permanentState" required value="<?php echo $fetched_data[0]['permanent_state']?>">
                        </div>   
                        <div class="formField">
                        <label for="permanentZipcode">Zipcode <span class="required">*</span></label>
                        <input id="permanentZipcode" type="text" name="permanentZipcode" required value="<?php echo $fetched_data[0]['permanent_zipcode']?>">
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
                    <input type="text" id="contactNumber" name="contactNumber" value="+1" required value="<?php echo $fetched_data[0]['contact_number']?>">
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
                <input type="text" name="passportNo" value="<?php
                        echo $fetched_data[0]["passport_no"];
                         ?>">
                </div>
                <div class="formField">
                <label for="passportPhoto">Photo of Passport</label>
                <input type="file" name="passportPhoto" accept="image/*">
                </div>
                </div>

               <div id="drivingLicenseContainer">
                <div class="formField">
                <label for="drivingLicenseNo">Driving License No</label>
                <input type="text" name="drivingLicenseNo" value="<?php
                        echo $fetched_data[0]["driving_license_no"];
                         ?>">
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
            <!-- Emergency Contact -->
            <div class="detailsForm">
            <div class="headingDiv">
                    <h3>Emergency Contact</h3>
                    <p>Status: <span id="infoStatus" style="color: green;">Approved</span></p>
            </div>
            <form action="" method="post">
                <!-- Contact 1 -->
                <h4>Contact 1</h4>
                <div class="formField">
                <label for="emergencyName1">Full Name <span class="required">*</span></label>
                <input type="text" name="emergencyName1" required value="<?php
                        echo $fetched_data[0]["e_full_name_one"];
                         ?>">
                </div>
                <div class="formField">
                <label for="emergencyRelation1">Relationship <span class="required">*</span></label>
                <input type="text" name="emergencyRelation1" required value="<?php
                        echo $fetched_data[0]["e_full_relation_one"];
                         ?>">
                </div>
                <div class="formField">
                <label for="emergencyPhone1">Contact Number <span class="required">*</span></label>
                <input type="text" name="emergencyPhone1" required value="<?php
                        echo $fetched_data[0]["e_full_contact_one"];
                         ?>">
                </div>

                <!-- Contact 2 -->
                <h4>Contact 2</h4>
                <div class="formField">
                <label for="emergencyName2">Full Name</label>
                <input type="text" name="emergencyName2" value="<?php
                        echo $fetched_data[0]["e_full_name_two"];
                         ?>">
                </div>
                <div class="formField">
                <label for="emergencyRelation2">Relationship</label>
                <input type="text" name="emergencyRelation2" value="<?php
                        echo $fetched_data[0]["e_full_relation_two"];
                         ?>">
                </div>
                <div class="formField">
                <label for="emergencyPhone2">Contact Number</label>
                <input type="text" name="emergencyPhone2" value="<?php
                        echo $fetched_data[0]["e_full_contact_two"];
                         ?>">
                </div>

                <!-- Contact 3 -->
                <h4>Contact 3</h4>
                <div class="formField">
                <label for="emergencyName3">Full Name</label>
                <input type="text" name="emergencyName3" value="<?php
                        echo $fetched_data[0]["e_full_name_three"];
                         ?>">
                </div>
                <div class="formField">
                <label for="emergencyRelation3">Relationship</label>
                <input type="text" name="emergencyRelation3" value="<?php
                        echo $fetched_data[0]["e_full_relation_three"];
                         ?>">
                </div>
                <div class="formField">
                <label for="emergencyPhone3">Contact Number</label>
                <input type="text" name="emergencyPhone3" value="<?php
                        echo $fetched_data[0]["e_full_contact_three"];
                         ?>">
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
            // [permanentAddressStreetOne, permanentAddressStreetTwo, permanentCity, permanentState, permanentZipcode].forEach((elem)=>{
            //     elem.disabled = true;
            // });
            permanentAddressStreetOne.value = presentAddressStreetOne.value;
            permanentAddressStreetTwo.value = presentAddressStreetTwo.value;
            permanentCity.value = city.value;
            permanentState.value = state.value;
            permanentZipcode.value = zipcode.value;
        } else {
            //     [permanentAddressStreetOne, permanentAddressStreetTwo, permanentCity, permanentState, permanentZipcode].forEach((elem)=>{
            //     elem.disabled = false;
            // });
        }
        };
        // // Personal Identification
        // const personalIdType = document.getElementById("personalIdType");
        // const ssnContainer = document.getElementById("ssnContainer");
        // const itinContainer = document.getElementById("itinContainer");
        // // const tinContainer = document.getElementById("tinContainer");

        // personalIdType.addEventListener("change",(e)=>{
        //     // Hide all first
        //     [ssnContainer, itinContainer].forEach(container => {
        //         container.style.display = "none";
        //         container.querySelectorAll("input").forEach(input => input.required = false);
        //     });

        //     const value = e.target.value;

        //     if(value === "ssn"){
        //         ssnContainer.style.display = "block";
        //         ssnContainer.querySelectorAll("input").forEach(input => input.required = true);
        //     }
        //     else if(value === "itin"){
        //         itinContainer.style.display = "block";
        //         itinContainer.querySelectorAll("input").forEach(input => input.required = true);
        //     }
        //     // else if(value === "tin"){
        //     //     tinContainer.style.display = "block";
        //     //     tinContainer.querySelectorAll("input").forEach(input => input.required = true);
        //     // }
        // });
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

    setTimeout(() => {
        window.location.href = "/task-management/logoutFromProfile.php";
    }, 3 * 60 * 60 * 1000);
    </script>
</body>
</html>