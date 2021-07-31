<?php
$conn = "";
  
try {
    $servername = "localhost";
    $dbname = "bookstore";
    $username = "root";
    $password = "";
  
    $conn = new PDO(
        "mysql:host=$servername; dbname=bookstore",
        $username, $password
    );
     
   $conn->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
 
function test_input($data) {
     
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"]== "POST") {
     
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    $stmt = $conn->prepare("SELECT * FROM adminlogin");
    
    $stmt->execute();
    $admins = $stmt->fetchAll();
    $flg1=false;
    foreach($admins as $admin) {
         
        if(($admin['adminname'] == $username) &&
            ($admin['password'] == $password)) {
                header("Location:adminpage.php");
                $flg1=true;
        }
    }
    $stmt1 = $conn->prepare("SELECT * FROM information");
    $stmt1->execute();
    $users = $stmt1->fetchAll();
    $flg=false;
    foreach($users as $user) {
 
          if(($user['username'] == $username) &&
              ($user['password'] == $password)) {
                  header("Location:index1.php");
                  $flg=true;
        }
        
    }
    if($flg1==false&&$flg==false)
        header("Location:index.php");
}


?>
