<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve name ,Email and message from POST request
    // $name = $_POST['name'];
    // $email = $_POST['email'];
    // $message =$_POST['message'];

    // //databse  connection
    // $conn = new mysqli('localhost','root','','','details');
    // if($conn->connect_error){
    //     die('Connection Failed : '.$conn->connect_error);
    // }else{
    //     $stmt = $conn->prepare("insert into information (name,email,message) values (?,?,?)");
    //     $stmt->bind_param("sss",$name,$email,$message);
    //     $stmt->execute();
    //     echo "Information saved successfully!";
    //     $stmt->close();
    //     $conn->close();

    // }
    // // Define the file to save the data
    // $file = 'user_data.txt';

    // // Format the data to be saved
    // $data = "name: $username, email: $email\n, message: $message\n";

    // // Save the data to the file
    // file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    // Redirect to a    thank you page or display a success message
//     echo "Information saved successfully!";
// } else {
//     echo "Invalid request method!";
// }
// ? >

<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'details');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO information (name, email, message) VALUES (?, ?, ?)");
    
    if ($stmt === false) {
        die('Prepare Failed: ' . $conn->error);
    }
    
    $bind = $stmt->bind_param("sss", $name, $email, $message);
    
    if ($bind === false) {
        die('Bind Failed: ' . $stmt->error);
    }
    
    $execute = $stmt->execute();
    
    if ($execute === false) {
        die('Execute Failed: ' . $stmt->error);
    } else {
        echo "Information saved successfully!";
    }
    
    $stmt->close();
    $conn->close();
}
?>

