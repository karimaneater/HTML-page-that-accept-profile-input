<?php include('submit.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
   
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <form id="myForm" action="submit.php" method="POST">
            
                <div class="form-floating mb-3">
                    <input type="text" id="name" class="form-control" id="floatingInput" maxlength="255" placeholder="Name" name="name" value="" required>
                    <label for="floatingInput">Name</label>
                    <div class="error" id="nameError"></div>
                    
                </div>
    
                <div class="form-floating mb-3">
                    <input type="email" id="email" class="form-control" id="floatingInput" maxlength="255" placeholder="Email" name="email" value="" required>
                    <label for="floatingInput">Email</label>
                    <div class="error" id="emailError"></div>
                </div>
    
                <div class="form-floating mb-3">
                    <input type="text" id="contact" class="form-control" id="floatingInput" placeholder="Contact" name="contact" value="09" maxlength="11" minlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                    <label for="floatingInput">Contact</label>
                    <div class="error" id="phoneError"></div>
                </div>
    
                <div class="form-floating mb-3">
                    <input type="date" id="birthday" class="form-control" placeholder="Birthday" name="birthday" value="" min="1930-01-01" max="2015-12-31" required>
                    <label for="floatingInput">Birthday</label>
                    <div class="error" id="birthdayError"></div>
                </div>
    
                <div class="form-floating mb-3">
                    <input type="number" id="age" class="form-control" id="age" placeholder="Age" name="age" value="" readonly >
                    <label for="floatingInput">Age</label>
                    <div class="error" id="ageError"></div>
                </div>
                
                <div class="mb-3">
                    <select name="" id="gender" class="form-control" required>
                        <option hidden selected value="">Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <div class="error" id="genderError"></div>
                </div>
                
                <button id="submit" type="submit" class="btn btn-primary">Submit</button>
              </form>
              <div class="text-center" id="submitted"></div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="js/submit.js"></script>
<script src="js/age.js"></script>
<script src="js/jbvalidator.js"></script>
<script src="js/customValidation.js"></script>
<script src="js/contactPrefix.js"></script>

</html>