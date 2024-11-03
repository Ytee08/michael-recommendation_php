<?php 
    require_once '../includes/conn.php';

    if(isset($_GET['id'])){
        $id = $_GET['id']; 


        $query ="SELECT * FROM recommendee WHERE id= '$id' ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        // print_r($results["name"]);

        if(isset($_POST['submit'])){
           
            $name = $_POST['name'];
            $skill = $_POST['skill'];
            $email = $_POST['email'];            
            $phone = $_POST['phone'];
            $query = "UPDATE recommendee SET name= '$name', skill='$skill' , email= '$email' , phone= '$phone' WHERE id ='$id' ";
            $stmt = $conn->prepare($query);
            
            $stmt->execute();

            header('location: ./dashboard.php');

        }      
    }

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/update.css">
    <title>Document</title>
</head>
<body>
    <h1 class="table">EDIT RECOMMENDEE</h1>
    <!-- <h2 style="text-align: center;">Update</h2> -->
    <form  target = "" method="post" id="form">
        <label for="name">
        Name:
            <input name="name" id="name" value="<?php echo $results["name"]?>" type="text" >
        </label>

        <label for="skill">
            skill:
            <input name="skill" id="skill" value="<?php echo $results["skill"]?>" type="text">
        </label>

        <label for="email">
            email:
            <input name="email" id="email" value="<?php echo $results["email"]?>" type="email">
        
        </label>
        <label for="phone">
            phone:
            <input name="phone" id="phone" value="<?php echo $results["phone"]?>" type="phone">
        
        </label>



        <input name="submit" type="submit"  id="submit">
    </form>
    
</body>
</html>