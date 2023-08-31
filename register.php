<?php 
session_start();
include 'config.php';
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$firstname = $_POST['firstname'];
	$middlename = $_POST['middlename'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$dateofbirth = $_POST['dateofbirth'];
	$place = $_POST['place'];
	$gender = $_POST['gender'];
	$mothername = $_POST['mothername'];
	$caste = $_POST['caste'];
	$pincode = $_POST['pincode'];
	$height = $_POST['height'];
	$weight = $_POST['weight'];
	$participated = isset($_POST['participated']) ? $_POST['participated'] : [];
	$participated = implode(",", $participated);
	$bloodgroup = $_POST['bloodgroup'];
	$spectacles = $_POST['spectacles'];
	$minority = $_POST['minority'];
	$vaccinated = $_POST['vaccinated'];
	$aadharcardno = $_POST['aadharcardno'];
	$electioncardno = $_POST['electioncardno'];
	$languages = isset($_POST['languages']) ? $_POST['languages'] : [];
    $languages = implode(",", $languages);
    $Activity = isset($_POST['Activity']) ? $_POST['Activity'] : [];
    $Activity = implode(",", $Activity);
	$skills = isset($_POST['skills']) ? $_POST['skills'] : [];
	$skills = implode(",", $skills);
    if(empty($Activity and $participated and $languages and $skills)){
        echo "<script>alert('Choose any one of them.');</script>";
    }
    $sql = "SELECT * FROM users WHERE email = '".$email."' ";
	$result = $conn->query($sql);
	if ($result->num_rows>0) {
		echo "Email already exists";
		header('location: index.php');
        exit;
	}
	else {
		$stmt = $conn->prepare("INSERT INTO users(firstname, middlename, lastname, email, dateofbirth, place, gender, mothername, caste, pincode, height, weight, participated, bloodgroup, spectacles, minority, vaccinated, aadharcardno, electioncardno, languages, Activity, skills) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param("ssssssssssssssssssssss", $firstname, $middlename, $lastname, $email, $dateofbirth, $place, $gender, $mothername, $caste, $pincode, $height, $weight, $participated, $bloodgroup, $spectacles, $minority, $vaccinated, $aadharcardno, $electioncardno, $languages, $Activity, $skills);
		$stmt->execute();
		if ($stmt) {
			echo "Successfully inserted";
		}
		else {
			echo "datanot inserted Successfully";
		}
	}
   
	ob_start();
    ?>
	<style type="text/css">
		table, td{
			
			border: 1px solid black;
  			border-collapse: collapse;	
		}
		td{
			width: 50%;
		}
	</style>
	<table>

	<tr ><td><img src="assets/img/NSS-symbol.jpeg" width="100px" alt=""></td><td><h3>National Service Scheme(NSS) Enrollement Form</h3></td></tr>
 	
    <tr><td>firstname:</td><td><?php echo $firstname;?></td></tr>
    <tr><td>Middlename:</td><td><?php echo $middlename;?></td></tr>
	<tr><td>Lastname:</td><td><?php echo $lastname;?></td></tr>
	<tr><td>Email:</td><td><?php echo $email;?></td></tr>
	<tr><td>Dateofbirth:</td><td><?php echo $dateofbirth;?></td></tr>
	<tr><td>Birthplace:</td><td><?php echo $place;?></td></tr>
	<tr><td>Gender:</td><td><?php echo $gender;?></td></tr>
	<tr><td>Mothername:</td><td><?php echo $mothername;?></td></tr>
	<tr><td>Caste:</td><td><?php echo $caste;?></td></tr>
	<tr><td>Pincode:</td><td><?php echo $pincode;?></td></tr>
	<tr><td>Height:</td><td><?php echo $height;?></td></tr>
	<tr><td>Particiapted:</td><td><?php echo $participated;?></td></tr>
	<tr><td>Bloodgroup:</td><td><?php echo $bloodgroup;?></td></tr>
	<tr><td>Spectacles:</td><td><?php echo $spectacles;?></td></tr>
	<tr><td>Minority:</td><td><?php echo $minority;?></td></tr>
	<tr><td>Vaccinated:</td><td><?php echo $vaccinated;?></td></tr>
	<tr><td>Aadharcardno:</td><td><?php echo $aadharcardno;?></td></tr>
	<tr><td>Electioncadno:</td><td><?php echo $electioncardno;?></td></tr>
	<tr><td>Language:</td><td><?php echo $languages;?></td></tr>
	<tr><td>Activities:</td><td><?php echo $Activity;?></td></tr>
	<tr><td>SkillsKnowns:</td><td><?php echo $skills;?></td></tr>

	</table>
    <?php

	$body = ob_get_clean();

	$body = iconv("UTF-8","UTF-8//IGNORE",$body);

	require_once  __DIR__.'/vendor/autoload.php';
	$mpdf = new \Mpdf\Mpdf();

	$mpdf->WriteHTML($body);
	$mpdf->Output('Registrationform.pdf','D');
    // Set a success message
    $successMessage = "PDF generated successfully. Your registration has been completed.";
    
    // Redirect to register.php with a success message
    header("Location: register.php?message=" . urlencode($successMessage));
    exit;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/2dd5f1c1c7.js" crossorigin="anonymous"></script>
    <title>Register</title>
    <title>MGM-National service Scheme</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="style.css" rel="stylesheet">
    <style>
        body {
            background-color: #703c19;
            font-family: 'Poppins', monospace;
        }
        .form-container {
            width: 100%;
            height: auto;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            position: absolute;
            top: 10px;
            color: white;
        }
        .form-group {
            position: relative;
            margin-bottom: 10px;
            border: none;
            outline: none;
            border-style: none;
        }
        .form-group label {
            position: absolute;
            margin-top: 30px;
            left: 10px;
            font-size: 18px;
            color: #666;
            pointer-events: none;
            transition: all 0.3s ease;
        }
        .form-group input {
            width: 100%;
            margin-top: 20px;
            top: 10px;
            padding: 10px;
            border: 1px solid #666;
            border-radius: 4px;
            z-index: 2;
        }
        .form-group input:focus + label,
        .form-group input:not(:placeholder-shown) + label {
            top: -28px;
            font-size: 14px;
            color: #703c19;
        }
        .form-group input:not(:focus):not(:placeholder-shown) + label {
            top: -28px;
            font-size: 14px;
            color: #703c19;
        }
        .btn-submit{
            color: white;
        }
        .btn-submit:hover {
            color: white;
            background-color: #703c19;

        }
        select {
            width: 400px;
            height: auto;
            border-radius: 8px;
            border: none;
        }
        @media (max-width: 760px) {
            .form-container {
                width: 100%;
                height: auto;
            }
            select {
                width: 100px;
                height: auto;
                border-radius: 8px;
                font-size: 12px;
                display: flex;
                align-items: flex-start;
            }
            
        }
        .next-btn {
            color: white;
        }
        .next-btn:hover {
            color: white;
            background-color: #703c19;
        }
        .next-btn::selection {
            color: white;
            background-color: #703c19;
        }
        .prev-btn {
            color: white;
        }
        .prev-btn:hover {
            color: white;
            background-color: #703c19;
        }
        .doblabel {
            top: 0px;
            margin-left: 0px;
        }
        .dateinput {
            margin-left: 140px;
        }
        .progress {
            width: 100%;
            border-radius: 8px;
            border: none;
        }
        .progress {
            margin-top: 20px;
            height: 30px;
        }
        .progress-bar {
            font-size: 12px;
            line-height: 30px;
            text-align: center;
            background-color: #007bff;
            color: white;
            transition: width 0.3s;
        }
    </style>
</head>
<body>  
    
      <!-- ======= Header ======= -->

    <div class="container mt-5">
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <form id="multi-stage-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="stage form-container" data-stage="1">
                <h2>Enrollement Form</h2>
                <div class="form-group">
                    <input type="text" id="firstname" name="firstname" required>
                    <label for="firstname">FirstName</label>
                </div>
                <div class="form-group">
                    <input type="text" id="middlename" name="middlename" required>
                    <label for="middlename">Middle Name</label>
                </div>
                <div class="form-group">
                    <input type="text" class="datetype" id="lastname" name="lastname" required>
                    <label for="lastname">Last Name</label>
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-group">
                    <label for="dob" class="doblabel">Date of Birth</label>
                    <input type="date" id="dob" name="dateofbirth" required style="width: 20%;" class="dateinput">
                </div>
                <div class="form-group">
                    <input type="text" id="place" name="place" required>
                    <label for="place">Place</label>
                </div>
                <div class="form-group">
                    <input type="text" id="mothername" name="mothername" required>
                    <label for="mothername">Mother Name</label>
                </div>
                <button class="btn btn-default next-btn">Next</button>
            </div>
            <div class="stage form-container" data-stage="2" style="display: none;">
                <h2>Personal Info.</h2>
                <div class="col-md-6 form-group option-group">
                    <div class="row">
                        <div class="col-md-6">
                            <select name="gender" id="gender">
                                <option selected>Select Gender</option>
                                <option value="male">Male</options>
                                <option value="female">Female</option>
                                <option value="prefer not to say">Prefer not to say</option>
                            </select>
                        </div>
                        <div class="col-md-6 ">
                            <select name="bloodgroup" id="bloodgroup" style="margin-left: 10rem;">
                                <option selected>Select Group</option>
                                <option value="A">A</option>
                                <option value="AB positive">AB positive</option>
                                <option value="O negative">O negative</option>
                                <option value="O positive">O positive</option>
                                <option value="AB negative">AB negative</option>
                                <option value="B positive">B positive</option>
                                <option value="B negative">B negative</option>
                                <option value="AB">AB</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <select name="spectacles" id="spectacles">
                                <option selected>Select Spectales</option>
                                <option value="fullframe">Full Frame</option>
                                <option value="frameless">Frame Less</option>
                                <option value="semi-rimless">Semi-Rimless</option>
                                <option value="no spectacles">No spectacles</option>
                            </select>
                        </div>
                        <div class="col-md-6 ">
                            <select name="minority" id="minority" style="margin-left: 10rem;">
                                <option selected>Select Minority Status</option>
                                <option value="yes">YES</option>
                                <option value="no">NO</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <select name="vaccinated" id="vaccinated">
                        <option selected>Select Vaccinated or not</option>
                        <option value="yes">YES</option>
                        <option value="no">NO</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="caste" id="caste" required>
                    <label for="caste">Caste</label>
                </div>
                <div class="form-group">
                    <input type="text" name="pincode" id="pincode" required>
                    <label for="pincode">Pincode</label>
                </div>
                <div class="form-group">
                    <input type="text" name="aadharcardno" id="aadhar">
                    <label for="aadhar">Aadhar Card no</label>
                </div>
                <div class="form-group">
                    <input type="text" id="election" name="electioncardno">
                    <label for="election">Election Card no</label>
                </div>
                <div class="form-group">
                    <input type="text" id="hgt" name="height">
                    <label for="hgt">Height (in cm)</label>
                </div>
                <div class="form-group">
                    <input type="text" id="wght" name="weight">
                    <label for="weight">Weight (in kg)</label>
                </div> 
                <!-- Form fields for step 2 -->
                <button class="btn btn-default prev-btn">Previous</button>
                <button class="btn btn-default next-btn">Next</button>
            </div>
            <style>
                .checkbox-container {
                    display: flex;
                    justify-content: space-between;
                }
                .checkbox-column {
                    flex: 1;
                    padding: 0 15px;
                }
                @media (max-width: 768px) {
                    .checkbox-container {
                        display: flex;
                        justify-content: center;
                    }
                    .checkbox-column {
                        padding: 0 5px;
                    }
                    
                }
            </style>
            <div class="container">
                <div class="stage form-container" data-stage="3" style="display: none;">
                    <h2>Extra-Curricular</h2>
                    <style>
                    </style>
                    <div class="checkbox-container">
                        <div class="checkbox-column">
                            <div class="col-md-6 form-groups">
                                <h4>Languages Known</h4>
                                <div class="form-check">
                                    <input class="" type="checkbox" value="English" id="english" name="languages[]">
                                    <label class="" for="english">English</label>    
                                </div>
                                <div class="form-check">
                                    <input class="" type="checkbox" value="Hindi" id="hindi" name="languages[]">
                                    <label class="" for="hindi">Hindi</label>
                                </div>
                                <div class="form-check">
                                    <input class="" type="checkbox" value="Marathi" id="marathi" name="languages[]">
                                    <label class="" for="marathi">Marathi</label>
                                </div>
                                    
                                <div class="form-check">
                                    <input class="" type="checkbox" value="Bengali" id="bengali" name="languages[]">
                                    <label class="" for="bengali">Bengali</label>
                                </div>
                                <div class="form-check">
                                    <input class="" type="checkbox" value="Tamil" id="tamil" name="languages[]">
                                    <label class="" for="tamil">Tamil</label>
                                </div>
                                <div class="form-check">
                                    <input class="" type="checkbox" value="Telgu" id="telgu" name="languages[]">
                                    <label class="" for="telgu">Telgu</label>
                                </div>
                                <div class="form-check">
                                    <input class="" type="checkbox" value="Urdu" id="urdu" name="languages[]">
                                    <label class="" for="urdu">Urdu</label>
                                </div>
                                <div class="form-check">
                                    <input class="" type="checkbox" value="French" id="french" name="languages[]">
                                    <label class="" for="french">French</label>
                                </div>
                            </div>
                        </div>
                        <div class="checkbox-column">
                            <h4>Participated In:</h4>
                            <div class="col-md-6 form-groups">
                            <div class="form-check">
                                <input class="" type="checkbox" value="Hiking" name="participated[]" id="hiking">
                                <label class="" for="hiking">
                                    Hiking
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="" type="checkbox" value="RSP" name="participated[]" id="rsp">
                                <label class="" for="rsp">
                                    RSP
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="" type="checkbox" value="Civil Defence" name="participated[]" id="civil">
                                <label class="" for="civil">Civil Defence
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="" type="checkbox" value="First Aid" name="participated[]" id="first aid">
                                <label class="" for="first aid">
                                    First Aid
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="" type="checkbox" value="sports" name="participated[]" id="sports">
                                <label class="" for="sports">
                                    Sports
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="" type="checkbox" value="MCC/NCC" name="participated[]" id="mcc">
                                <label class="" for="mcc">
                                    MCC/NCC
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="" type="checkbox" value="Scout/guide" name="participated[]" id="scout">
                                <label class="" for="scout">
                                    Scout/Guide
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="" type="checkbox" value="Trekking" name="participated[]" id="trekking">
                                <label class="" for="trekking">
                                    Trekking
                                </label>
                            </div>
                        </div>
                        </div>
                    </div>
                    <br/>
                    <div class="checkbox-container">
                        <div class="checkbox-column">
                            <h4>Participated in Activity</h4>
                            <div class="col-md-6 form-groups">
                            <div class="form-check">
                                <input type="checkbox" value="pre SRD" name="Activity[]" id="pre srd">
                                <label for="pre srd">
                                    pre SRD
                                </label>
                             </div>
                             <div class="form-check">
                                <input type="checkbox" value="pre NRD" name="Activity[]" id="pre nrd">
                                <label for="pre nrd">
                                    pre NRD
                                </label>
                             </div>
                             <div class="form-check">
                                <input type="checkbox" value="SRD" name="Activity[]" id="srd">
                                <label for="srd">
                                    SRD
                                </label>
                             </div>
                             <div class="form-check">
                                <input type="checkbox" value="NRD" name="Activity[]" id="nrd">
                                <label for="nrd">
                                    NRD
                                </label>
                             </div>
                             <div class="form-check">
                                <input type="checkbox" value="Adventure Camp" name="Activity[]" id="adventure">
                                <label for="adventure">Adven Camp
                                </label>
                             </div>
                             <div class="form-check">
                                <input type="checkbox" value="MegaCamp" name="Activity[]" id="mega">
                                <label for="mega">
                                    Mega Camp
                                </label>
                             </div>
                             <div class="form-check">
                                <input type="checkbox" value="Youth Festival" name="Activity[]" id="youth">
                                <label for="youth">
                                    Youth Festival
                                </label>
                             </div>
                             <div class="form-check">
                                <input type="checkbox" value="Utkarsha" name="Activity[]" id="utkarsha">
                                <label for="utkarsha">
                                    Utkarsha
                                </label>
                             </div>
                             </div>
                        </div>
                        <div class="checkbox-column">
                            <h4>Skills Known</h4>
                            <div class="col-md-6 form-groups">
                            <div class="form-check">
                                <input type="checkbox" value="Driving" name="skills[]" id="driving">
                                <label for="driving">
                                    Driving
                                </label>
                            </div>
                                
                            <div class="form-check">
                                <input type="checkbox" value="Swimming" name="skills[]" id="swim">
                                <label for="swim">
                                    Swimming
                                </label>
                            </div>
                                
                            <div class="form-check">
                                <input type="checkbox" value="Cooking" name="skills[]" id="cooking">
                                <label for="cooking">
                                    Cooking
                                </label>
                            </div>
                                
                            <div class="form-check">
                                <input type="checkbox" value="Photography" name="skills[]" id="photo">
                                <label for="photo">
                                    Photography
                                </label>
                            </div>
                                
                            <div class="form-check">
                                <input type="checkbox" value="Report Writing" name="skills[]" id="report">
                                <label for="report">
                                    Report Writing
                                </label>
                            </div>
                                
                            <div class="form-check">
                                <input type="checkbox" value="Fire Fighting" name="skills[]" id="fire">
                                <label for="fire">
                                    Fire Fighting
                                </label>
                            </div>
                            </div>
                            <br/>
                        </div>
                    </div>
                    
                    <br/>
                    <button class="btn btn-default prev-btn">Previous</button>
                    <button class="btn btn-default btn-submit" name="submit" id="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>