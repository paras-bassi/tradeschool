<!DOCTYPE html>
<html>

<head>
    <?php include 'head.php'; ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        
        <?php include 'nav.php';?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Video Upload
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- <div class="callout callout-info">
                    <h4>Note:</h4>
                    <p>Image size should be less than : ???</p>
                </div> -->
                <!-- Default box -->
                <div class="box">
                    <div class="box-body">
                        <form action="#">
                            <div class="form-group">
                                <input type="text" id="title" class="form-control youtube-input" placeholder="Title">
                                <img src="../asset/youtube.png" class="youtube-img">
                                <input type="text"  class="form-control youtube-link" placeholder="https://www.youtube.com/">
                            </div>
                            <a href="#" class="myButton-upload">Upload</a>
                            <a href="#" class="myButton-cancel">Cancel</a>
                        </form>
                    </div>
                </div>
                <!-- /.box -->
                <!-- You Tube DataTable -->
                <section class="content">
                        <div class="row">
                          <div class="col-xs-12">
                            <div class="box">
                              <!-- /.box-header -->
                              <div class="box-body">
                                <table id="example2" class="table table-bordered table-striped">
                                  <thead>
                                    <tr>
                                      <th>Title</th>
                                      <th>Link</th>
                                      <th></th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td style="width: 20%;" id="title-youtube">
                                        <input type="text" disabled="disabled" class="disabled-textBox" value="test"/>
                                      </td>
                                      <td>
                                          <a>Link</a>
                                      </td>
                                      <td><i class="fa fa-edit" style="color: #3c8dbc; margin-top: 6px;font-size: 25px;"></i></td>
                                      <td><i class="fa fa-trash" style="color: red; margin-top: 6px; font-size: 25px;" aria-hidden="true"></i></td>
                                    </tr>
                                  </tbody>
                                  </tfoot>
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
                <!-- /.You Tube DataTable -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <?php include 'script.php'; ?>
    <script>
        $(function () {
            $("#example2").DataTable();
            $("#example2").updateValue();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });

        function testFunc() {
            alert("Test Successfull");
        }
    </script>
</body>

</html>