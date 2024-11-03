
<!-- This is used to delete the data from the database -->

<?php 

    
    require_once '../includes/conn.php'; // This is used to connect to the database
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        echo "Item id is = $id" ;
        $query = "DELETE from recommendee WHERE id ='$id'";// This is used to delete the data from the database
        $stmt = $conn->prepare($query);
        
        $stmt->execute();//

        
        header('location: ./dashboard.php');
        echo "Data deleted successfully";
    }

   

    
 
?>