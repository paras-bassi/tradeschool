<!DOCTYPE html>
<html>

<head>
  <?php include 'head.php'; ?>
  <style>
    /* 
    Max width before this PARTICULAR table gets nasty
    This query will take effect for any screen smaller than 760px
    and also iPads specifically.
    */
    @media 
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {

      /* Force table to not be like tables anymore */
      table, thead, tbody, th, td, tr { 
        display: block; 
      }
      
      /* Hide table headers (but not display: none;, for accessibility) */
      thead tr { 
        position: absolute;
        top: -9999px;
        left: -9999px;
      }
            
      td { 
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee; 
        position: relative;
        padding-left: 50%;
      }
      
      td:before { 
        /* Now like a table header */
        position: absolute;
        /* Top/left values mimic padding */
        top: 6px;
        left: 6px;
        width: 45%; 
        padding-right: 10px; 
        white-space: nowrap;
        text-align: left;
      }
      
      /*
      Label the data
      */
      td:nth-of-type(1):before { content: "SNo"; }
      td:nth-of-type(2):before { content: "User"; }
      td:nth-of-type(3):before { content: "Email"; }
      td:nth-of-type(4):before { content: "Contact Number"; }
      td:nth-of-type(5):before { content: "Perm 1"; }
      td:nth-of-type(6):before { content: "Perm 2"; }
      td:nth-of-type(7):before { content: "Perm 3"; }
      td:nth-of-type(8):before { content: "Delete"; }
    }
  </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'nav.php';?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">User Details</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-striped table-responsive">
                  <thead>
                    <tr>
                      <th>SNo</th>
                      <th>User</th>
                      <th>Email</th>
                      <th>Contact Number</th>
                      <th>Perm 1</th>
                      <th>Perm 2</th>
                      <th>Perm 3</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->
  <!-- page script -->
  <?php include 'script.php'; ?>

<script>
    $(function () {
      loadTable();
    });
    
    function loadTable(){
      $('#example2').DataTable({
        "ajax": "ajaxCalls/getUserData.php",
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "bDestroy": true,
        "responsive": true
      });
    }
    function updatePermission(id){
      var input = confirm('Are you sure you want to update permission');
      
      if(input == true){
        $.ajax({
        url     : "ajaxCalls/updatePermission.php",
        method  : "POST",
        data    : {"id" : id, "ischecked" : $("#"+id).is(':checked')},
        success : function(data){
          loadTable();
        }
      });
      }
      else{
        loadTable();
      }
    }

    function deleteUser(id){
      var input = confirm('Are you sure you want to delete user!!');
      
      if(input == true){
        $.ajax({
        url     : "ajaxCalls/deleteUser.php",
        method  : "POST",
        data    : {"id" : id},
        success : function(data){
          loadTable();
        }
      });
      }
      else{
        loadTable();
      }
    }
  </script>
</body>

</html>