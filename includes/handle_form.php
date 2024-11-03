<?php 
    require_once './conn.php';
    require_once './send_email.php'; 
    
    if(isset($_POST['submit'])) {
        // print_r($_POST);
    
        $name = $_POST['name'];
        $skill = $_POST['skill'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $query = "INSERT INTO recommendee (name, skill, email, phone) VALUES (:name, :skill, :email, :phone)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':skill', $skill);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);

 
        $stmt->execute();


        //Redirect to avoid resubmission on refresh
        // header("Location: " . $_SERVER['PHP_SELF']);

        sendRecommendationEmail($name, $skill, $phone, $email);

        // echo "Data inserted successfully";
        // exit();    

        // After successful processing
        header('Location: ../index.php?success=1');
        exit();
    }

?>