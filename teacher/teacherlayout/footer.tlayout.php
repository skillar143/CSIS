</div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <?php include "_footer.tlayout.php" ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Logout Modal-->
    <?php include "_logoutmodal.tlayout.php" ?>
      <!-- Bootstrap core JavaScript-->
      <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../assets/js/sb-admin-2.min.js"></script>
    

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<?php
                 
                    $tid = $_SESSION['user_id'];
                    $sql = "SELECT * from gradingstatus";
                    $result = $conn-> query($sql);
                    if($result-> num_rows > 0 ){
                        while($row = $result-> fetch_assoc()){
                            $status = $row['status'];
                        }
                    } 
                ?> 



<script>
var stat = "<?php echo $status; ?>";

if (stat == "open"){ 
        gradingBtn.removeAttribute('disabled');
    }else{
        gradingBtn.setAttribute('disabled', 'disabled');
    }

    if (stat == "open"){ 
        summaryBtn.removeAttribute('disabled');
    }else{
        summaryBtn.setAttribute('disabled', 'disabled');
    }


    $(document).ready(function() {
        $('#datatableid').DataTable( {
        "paging":   false,
        "order": [[1, "asc"]],
        "ordering": true,
        "columnDefs": [{
          "targets": [0,2],
          "orderable": false,
        }],
        "searching": false
    } 
    );
    });

    $(document).ready(function() {
        $('#studentlist').DataTable( {
        "paging":   false,
        "order": [[1, "asc"]],
        "info":     true,
        "ordering": true,
    } 
    );
    });

    (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

</script>
<!-- end of content -->

