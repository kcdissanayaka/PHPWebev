<?php
// what to with the data goes here

if(isset($_POST["submit"])){

    $plnname = $_POST['tourPlnTitle'];
    $plnummary = $_POST['plnSummary'];
    $plndays = $_POST['plnDays'];
    $plnprice  = $_POST['plnprice'];
    $plnimageText = $_POST['imageText'];
    $plnimage = $_FILES['image']["name"];
    $plnstatus = $_POST['plnstatus'];

    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "./assets/images/trip-plans-card-img/" . $plnimage;
    

    // Connect to the dabase server

include 'dbkcd.php';
 // wirte SqL to insert data to the relvant table

   /* Define an SQL query to insert data into the 'studentsinfo' table
   //$sql = "INSERT INTO studentsinfo (first_name, last_name, city, groupId)
   VALUES ('$fname', '$lname', '$city', '$grpid')";*/
   $sql= "INSERT INTO TOUR_PLAN_CARDS (tour_pln_title,tour_pln_description,tour_pln_image,tour_pln_days,tour_pln_person_price,
   tour_pln_created_by,tour_pln_created_date,tour_pln_modified_by,tour_pln_modified_date,tour_pln_row_id,tour_pln_status,TOUR_PLN_IMG_TEXT) 
   VALUES('$plnname','$plnummary','$plnimage','$plndays','$plnprice',1,NOW(),null,null,null,'$plnstatus','$plnimageText')";

   // Execute the SQL query using the database connection
    if ($conn->query($sql)===TRUE) {
// If the query was successful, display a success message
        echo "New record added";
    } 
    else {
// If there was an error in the query, display an error message
        echo "Error: " .$sql . "<br>" . $conn->error;

        
    }

// Close the database connection

$conn->close();

   
}
?>