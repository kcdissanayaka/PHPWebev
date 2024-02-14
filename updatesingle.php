<?php 
    $title ="Exercise 7: Update Data - Kasun ";
include 'header.php';
include 'db.php';
$a = $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM TOUR_PLAN_CARDS WHERE id= '$a'");
$row= mysqli_fetch_array($result); ?>

        <section id="plan">
            <div class="tourPlan text-center">
                <div class="row">
                    <div class="col">
                        <h1>EXERCISE 7- Update Data</h1>
                    </div>
                </div>
                <div class="container text-left">
                    <div class="row tourPlanCards">
                        <div class="col-md-12">
                        <h2>Update Travel packages:</h2>
                        <form name= "form1" method="post" action="">
                            <div class="row">
                                <div class="col">
                                    <label for="fname">First Name:</label>
                                    <input type="text" class="form-control" placeholder="First name" name="fname" required value="<?php echo $row['first_name']; ?>">
                                </div>
                                <div class="col">
                                    <label for="lname">Last Name:</label>
                                    <input type="text" class="form-control" placeholder="Last name" name="lname" required value="<?php echo $row['last_name']; ?>" >
                                </div>
                                <div class=" col-md-4 pb-4">
                                    <label for="tourPlnTitle" class="form-label">Plan Name</label>
                                    <input type="text" class="form-control"  name="tourPlnTitle" id="tourPlnTitle" required value = "<?php echo $row['TOUR_PLN_TITLE']; ?>">
                                </div>
                                <div class=" col-md-4 pb-4">
                                    <label for="plnDays" class="form-label">Number of Days</label>
                                    <input type="number" class="form-control" name="plnDays" id="plnDays" required value =  "<?php echo $row['TOUR_PLN_DAYS']; ?>">
                                </div>
                                <div class=" col-md-4 pb-4">
                                    <label for="plnprice" class="form-label">Price</label>
                                    <input type="number" class="form-control" name="plnprice" id="plnprice" required value =  "<?php echo $row['TOUR_PLN_PERSON_PRICE']; ?>">
                                </div>
                                <div class="col-md-12 pb-4">
                                    <label for="plnSummary" class="form-label">Tour Plan Summary</label>
                                    <textarea class="form-control" name="plnSummary" rows="3" id="plnSummary"  required value =  "<?php echo $row['TOUR_PLN_DESCRIPTION']; ?>"></textarea>
                                </div>
                                </div>
                       
                                    <div class="input-group col-md-12 pb-4">
                                    <input type="file" class="form-control" name="image" aria-describedby="submit" aria-label="Upload" id="image" required value =  "<?php echo $row['TOUR_PLN_IMAGE'];?>">
                                    
                                </div>
                                <div class="col-md-12 pb-4">
                                    <label for="imageText" class="form-label">Image Description</label>
                                    <textarea class="form-control" name="imageText" rows="3" id="imageText" required value = "<?php echo $row['TOUR_PLN_IMG_TEXT'];?>"></textarea> 
                                    
                                </div>
                                
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                <label for="city">City:</label>
                                <input type="text" class="form-control" placeholder="City" name="city" required value="<?php echo $row['city']; ?>">
                                </div>

                                <div class="col">
                                <label for="groupid">Group ID:</label>
                                <!--<input type="text" class="form-control" placeholder="City" name="city" required value="<?php echo $row['groupId']; ?>"> -->
                                <select class="form-control" id="groupid" name="groupid">
                                    <option value="BBCAP19">BBCAP19</option>
                                    <option value="BBCAP20">BBCAP20</option>
                                    <option value="BBCAP21">BBCAP21</option>
                                    <option value="BBCAP22">BBCAP22</option>
                                    <option value="Others">Others</option>
                                </select>   
                                </div>

                            </div>
                            <br>
                            <div class="row">
                            <div class="col"><button type="submit" class="btn btn-primary" name="submit">Update your Information</button></div>
                            <div class="col"><button type="submit" class="btn btn-primary" name="delete">Delete your Information</button></div>
                            </div>
                            </form>
                            <?php 
                            /* 
                            The isset() function is used to check if a variable is set and not NULL.
                            In this case, it's checking if the $_POST['submit'] 
                            value is set and not NULL. If the form has been submitted, the value of $_POST['submit'] will be set,
                            and the code inside the if block will be executed. If the form has not been submitted, 
                            the value of $_POST['submit'] will not be set, and the code inside the if block will not be executed.
                            */
                            if (isset($_POST['submit'])){
                                
                                $fname = $_POST['fname'];
                                $lname = $_POST['lname'];
                                $query = mysqli_query($conn,"UPDATE TOUR_PLAN_CARDS set first_name='$fname', last_name='$lname' where id='$a'");
                                if($query){
                                    echo "<h2>Your information is updated Successfully</h2>";
                                    // if you want to redirect to update page after updating
                                }
                                else { echo "Record Not modified";}
                                }

                                if (isset($_POST['delete'])){
                                    $query = mysqli_query($conn,"DELETE FROM TOUR_PLAN_CARDS where id='$a'");
                                    if($query){
                                        echo "Record Deleted with id: $a <br>";
                                        // if you want to redirect to update page after updating
                                        //header("location: update.php");
                                    }
                                    else { echo "Record Not Deleted";}
                                    }

                            $conn->close();

                            ?>
                        


                        <form name = "ManageTourPlan" id="myForm" class="row text-left mx-auto" method="post" action="processTurpkg.php" enctype="multipart/form-data">
                       
                       <div class=" col-md-4 pb-4">
                           <label for="tourPlnTitle" class="form-label">Plan Name</label>
                           <input type="text" class="form-control"  name="tourPlnTitle" id="tourPlnTitle" required>
                       </div>
                       <div class=" col-md-4 pb-4">
                           <label for="plnDays" class="form-label">Number of Days</label>
                           <input type="number" class="form-control" name="plnDays" id="plnDays" required>
                       </div>
                       <div class=" col-md-4 pb-4">
                           <label for="plnprice" class="form-label">Price</label>
                           <input type="number" class="form-control" name="plnprice" id="plnprice" required>
                       </div>
                                           
                       <div class="col-md-12 pb-4">
                           <label for="plnSummary" class="form-label">Tour Plan Summary</label>
                           <textarea class="form-control" name="plnSummary" rows="3" id="plnSummary"  required></textarea>
                       </div>
                       
                           <div class="input-group col-md-12 pb-4">
                           <input type="file" class="form-control" name="image" aria-describedby="submit" aria-label="Upload" id="image" required>
                           
                       </div>
                        <div class="col-md-12 pb-4">
                           <label for="imageText" class="form-label">Image Description</label>
                           <textarea class="form-control" name="imageText" rows="3" id="imageText" required></textarea>
                           
                       </div>

                       <div class=" col-md-4 pb-4">
                           <label for="plnstatus" class="form-label">Status</label>
                           <select class="form-control" id="plnstatus" name="plnstatus" required>
                                       <option value="A">ACTIVE</option>
                                       <option value="I">INACTIVE</option>

                           </select>
                        </div>
                       <div class= "col-mb-12 pb-4" >

                           <button type="submit" name ="submit" class="btn btn-warning mt-2 mr-2">Update Plan</button>
                           <button type="submit" name ="submit" class="btn btn-danger mt-2 mr-2">Delete Plan</button>
                           <button type="button" name ="clear" value="Submit"  id ="clear" onclick="resetform()" class="btn btn-primary  mr-2 mt-2">Clear Form</button>
                       </div>
                           
                       
               </form>
           </div>

                             
       </div> <!--Services-->
   </section>

                                   

                            </div>
                        </div>
                    </div> <!--newsletter-->
<?php include 'footer.php'; ?>