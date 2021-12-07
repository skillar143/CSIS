<?php 
session_start();

if (isset($_SESSION['user_id'])) {
 
    include "../teacherlayout/head.tlayout.php"; ?>
       <!-- content here -->
       <h5 class="h3 mb-5 text-gray-800 mr-auto">Change Password</h5>
       <?php if (isset($_GET['error'])) { ?>
    <div class="alert alert-danger text-center">
  <strong>Error!</strong> <?php echo $_GET['error']; ?>
</div>
<?php }elseif(isset($_GET['success'])){ ?> <div class="alert alert-success text-center">
  <strong>Success!</strong> <?php echo $_GET['success'];?> </div> <?php } ?>
            <!-- end of modal header -->
            <form action="../../database/changepass/teacherpass.db.php" method="post">
                <!-- modal body -->
                <div class="body w-75 m-auto">
                    <!-- text box student id -->
                    <div class="form-group">
                        <input type="text" class="form-control"  value="<?php echo $_SESSION['user_id'];  ?>" disabled >
                        
                        <input type="hidden" name="teacherid" value="<?php echo $_SESSION['user_id'];  ?>">
                    </div>
                    <!-- end student id -->
                    
                     <!-- text box old-password -->
                     <div class="form-group">
                        <input type="password" class="form-control" name="pass" autocomplete="off"
                            placeholder="Current-Password" required>
                    </div>
                    <!-- end old-password -->

                    <!-- text box password name -->
                    <div class="form-group">
                        <input type="password" class="form-control" name="npass" autocomplete="off"
                            placeholder="New-password" required>
                    </div>
                    <!-- end password name -->

                    <!-- text box con-password name -->
                    <div class="form-group">
                        <input type="password" class="form-control" name="cpass" autocomplete="off"
                            placeholder="Confirm-Password" required>
                    </div>
                    <!-- end con-password name -->
                    <div class="form-group ml-auto">
                    <button class="btn btn-sm btn-outline-success ml-auto" name="submit" type="submit">Save</button>
                    </div>
                    
                </div>
            </form>
       <!-- end of content here -->
       <?php include "../teacherlayout/footer.tlayout.php";
    }else{
        header("Location: ../../canossa/master.blade.php");
        exit();
   }
?>
