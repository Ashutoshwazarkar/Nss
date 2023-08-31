<?php 
session_start();
include 'config.php';
if (isset($_POST['submit'])) {
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
	$participated = $_POST['participated'];
	$participated = implode(",", $participated);
	$bloodgroup = $_POST['bloodgroup'];
	$spectacles = $_POST['spectacles'];
	$minority = $_POST['minority'];
	$vaccinated = $_POST['vaccinated'];
	$aadharcardno = $_POST['aadharcardno'];
	$electioncardno = $_POST['electioncardno'];
	$languages = $_POST['languages'];
	$Activity = $_POST['Activity'];
	$Activity = implode(",", $Activity);
	$skills = $_POST['skills'];
	$skills = implode(",", $skills);
	$sql = "SELECT * FROM users WHERE email = '".$email."' ";
	$result = $conn->query($sql);
	if ($result->num_rows>0) {
		echo "Email already exists";
		header('location: index.html');
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


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>  
<div class="container">
    <h1 class="well"> ENROLLEMENT FORM (NSS)</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>First Name:</label>
								<input type="text" class="form-control" name="firstname">
							</div>	
							<div class="col-sm-4 form-group">
								<label>Middle Name:</label>
								<input type="text" class="form-control" name="middlename">
							</div>	
							<div class="col-sm-4 form-group">
								<label>Last Name:</label>
								<input type="text" class="form-control" name="lastname">
							</div>
						</div>					
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>Email</label>
								<input type="text"  class="form-control" name="email">
							</div>	
							<div class="col-sm-4 form-group">
								<label>DateofBirth</label>
								<input type="date"  class="form-control" name="dateofbirth">
							</div>	
							<div class="col-sm-4 form-group">
								<label>PlaceofBirth:</label>
								<input type="text"  class="form-control" name="place">
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>Gender:</label>
								<select class="form-control"  name="gender">
                                    <option selected>select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Mother name:</label>
								<input type="text"  class="form-control" name="mothername">
							</div>	
							<div class="col-sm-4 form-group">
								<label>Caste:</label>
								<input type="text"  class="form-control" name="caste">
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>AreaPincode:</label>
								<input type="text"  class="form-control" name="pincode">
							</div>	
							<div class="col-sm-4 form-group">
								<label>Height(in cm):</label>
								<input type="text"  class="form-control" name="height">
							</div>	
							<div class="col-sm-4 form-group">
								<label>Weight(in KG):</label>
								<input type="text"  class="form-control" name="weight">
							</div>		
						</div>						
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>ParticipatedIn:</label>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Hiking" name="participated[]" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">
										Hiking
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="RSP" name="participated[]" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">
										RSP
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Civil Defence" name="participated[]" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">
										Civil Defence
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="First Aid" name="participated[]" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">
										First Aid
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="sports" name="participated[]" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">
										Sports
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="MCC/NCC" name="participated[]" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">
										MCC/NCC
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Scout/guide" name="participated[]" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">
										Scout/Guide
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Trekking" name="participated[]" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">
										Trekking
									</label>
								</div>
							</div>	
							<div class="col-sm-4 form-group">
								<label>ParticipatedActivity:</label>
							
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="pre SRD" name="Activity[]" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            pre SRD
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Pre NRD" name="Activity[]" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            pre NRD
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="SRD" name="Activity[]" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            SRD
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="NRD" name="Activity[]" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            NRD
                                        </label>
                                    </div>
									 <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Adhventure Camp" name="Activity[]" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Adhventure Camp
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Mega Camp" name="Activity[]" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Mega Camp
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Youth Festival" name="Activity[]" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Youth Festival
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Utkarsha" name="Activity[]" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Utkarsha
                                        </label>
                                    </div>
							</div>	
							<div class="col-sm-4 form-group">
								<label>SkillsKnown:</label>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Driving" name="skills[]" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">
										Driving
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Swiming" name="skills[]" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">
										Swimming
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Cooking" name="skills[]" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">
										Cooking
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Photography" name="skills[]" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">
										Photography
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="Report Writing" name="skills[]" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">
										Report Writing
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="firefighting" name="skills[]" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">
										firefighting
									</label>
								</div>
							</div>		
						</div>	
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>Bloodgroup:</label>
								<select class="form-control"  name="bloodgroup">
									<option selected>select Group</option>
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
							<div class="col-sm-4 form-group">
								<label>Spectacles:</label>
								<select class="form-control"  name="spectacles">
									<option selected>select Choice</option>
                                    <option value="Fullframe">Fullframe</option>
                                    <option value="semi-rimless">semi-rimless</option>
                                    <option value="rimless">rimless</option>
                                    <option value="no spectacles">no spectacles</option>
                                </select>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Whether belong to Minority?:</label>
								<select class="form-control"  name="minority">
									<option selected>select Choice</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>IsVaccinated (Covid-19)?</label>
								<select class="form-control"  name="vaccinated">
									<option selected>select Choice</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Aadhar Card no:</label>
								<input type="text"  class="form-control" name="aadharcardno">
							</div>	
							<div class="col-sm-4 form-group">
								<label>ElectionCard no:</label>
								<input type="text" class="form-control">
							</div>		
						</div>
					
							<div class="form-group">
								<label> LanguagesKnown:</label>
								<select class="form-control"  name="languages">
									<option selected>select Choice</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
							</div>					
					</div>
					<a href="register_a.php">
					<button type="button" class="btn btn-lg btn-info" name="submit" id="submit">Submit</button>
</a>
			</form> 
		</div>
	</div>
	</div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>