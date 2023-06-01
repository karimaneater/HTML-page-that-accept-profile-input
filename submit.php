<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "propelrr_db";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}

// Function to validate Philippine mobile number format
function validateMobileNumber($number) {
  // Regex pattern for Philippine mobile numbers
  $pattern = '/^(09|\+639)\d{9}$/';

  return preg_match($pattern, $number);
}


// Initialize response array
$response = array('success' => false, 'message' => '');

// Validate form inputs

  $name = isset($_POST['name']) ? $_POST['name'] : null;
  $email = isset($_POST['email']) ? $_POST['email'] : null;
  $contact = isset($_POST['contact']) ? $_POST['contact'] : null;
  $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : null;
  $age = isset($_POST['age']) ? $_POST['age'] : null;
  $gender = isset($_POST['gender']) ? $_POST['gender'] : null;

    if (empty($name) || empty($email) || empty($contact) || empty($birthday) || empty($age) || empty($gender)) {
        $response['message'] = 'All fields are required.';
    } 
    
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = 'Invalid email format.';
    } 
    
    elseif (!validateMobileNumber($contact)) {
        $response['message'] = 'Invalid mobile number format. Please enter a valid Philippine mobile number.';
    } 
    else  {
      $validate_email = "SELECT COUNT(*) FROM profile WHERE email = :email";
      $stmt = $conn->prepare($validate_email);
      $stmt->bindParam(':email', $email);
      $stmt->execute();

      $email_res = $stmt->fetchColumn();

      // if ($email_res > 0) {
      //     $response['message'] = "Email already exists in the database.";
      // } 

      $validate_contact = "SELECT COUNT(*) FROM profile WHERE contact = :contact";
      $stmt = $conn->prepare($validate_contact);
      $stmt->bindParam(':contact', $contact);
      $stmt->execute();

      $contact_res = $stmt->fetchColumn();

      // if ($contact_res > 0) {
      //     $response['message'] = "Email already exists in the database.";
      // } 

        try {
            $stmt = $conn->prepare("INSERT INTO profile (name, email, contact, birthday, age, gender) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$name, $email, $contact, $birthday, $age, $gender]);
            $response['success'] = true;
            $response['message'] = 'Form submitted successfully.';
        } catch(PDOException $e) {
            $errorMessage = $e->getMessage();
            $startPos = strpos($errorMessage, "Duplicate entry '") + strlen("Duplicate entry '");
            $endPos = strpos($errorMessage, "' for key");
            $duplicateEntry = 'Duplicate entry' . substr($errorMessage, $startPos, $endPos - $startPos);
            $response['message'] = 'Error submitting form: ' . $duplicateEntry;
        }
    }
    
  

 
// Send JSON response
echo json_encode($response);
?>