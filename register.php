<?php 
// Create connection
$conn = new mysqli('localhost', 'root', '', 'registration');

// Check connection
if ($conn->connect_error) {
    die('Connection failed:' . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = trim($_POST["name"]);       
    $age = trim($_POST["age"]);         
    $email = trim($_POST["email"]);     
    $address = trim($_POST["address"]); 
    $college = trim($_POST["college"]); 

//validate email
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);//T OR F
}
//check for duplicate email
function isDuplicateEmail($email, $conn) {
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    return $stmt->num_rows > 0;
}

$errors = [];//Validation
    
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (empty($age) || !is_numeric($age)) {
        $errors[] = "Valid age is required.";
    }
    if (empty($email) || !isValidEmail($email)) {
        $errors[] = "Valid email is required.";
    }
    if (empty($address)) {
        $errors[] = "Address is required.";
    }
    if (empty($college)) {
        $errors[] = "College is required.";
    }
  
    if (empty($errors) && isDuplicateEmail($email, $conn)) {
        $errors[] = "Email already exists.";
    }
    
    if (empty($errors)) {//is everything Valid or no
       $stmt = $conn->prepare("INSERT INTO users (name, age, email, address, college) VALUES (?, ?, ?, ?, ?)");
       $stmt->bind_param("sisss", $name, $age, $email, $address, $college);//link
        
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
    }
}

$conn->close();
?>
