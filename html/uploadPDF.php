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
                    PDF Upload
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="callout callout-info">
                    <h4>Note:</h4>
                    <p>Image size should be less than : ???</p>
                </div>
                <!-- Default box -->
                <div class="box" style="height: 84px;">
                <form id="frm" method="post" enctype="multipart/form-data"> 
                    <div class="box-body">
                        <div class="form-group" style="display: inline;">
                            <input type="text" name="title" style="margin-top: 1%;" class="form-control youtube-input" placeholder="Title">
                        </div>
                        <div class="panel-body" style="display: inline;">
                            <div class="input-group" style="margin-left: 16%; margin-top: -33px;">
                                <input id="uploadFile" class="form-control" placeholder="Upload Image" disabled="disabled">
                                <div class="input-group-btn">
                                    <div class="fileUpload btn btn-primary">
                                        <span><i class="fa fa-image"></i> &nbsp;Image</span>
                                        <input id="uploadBtn" name="imagename" type="file" class="upload" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body" style="display: inline;">
                            <div class="input-group" style="margin-left: 46%; margin-top: -53px;">
                                <input id="uploadFile" class="form-control" placeholder="Upload Pdf" disabled="disabled">
                                <div class="input-group-btn">
                                    <div class="fileUpload btn btn-primary">
                                        <span><i class="fa fa-file-pdf-o"></i> &nbsp; PDF</span>
                                        <input id="uploadBtn" name="pdfname" type="file" class="upload" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#!" id="uploadButton" class="myButton-upload" style="display: inline; margin-top: -50px;">Upload</a>
                        <input type="reset" class="myButton-cancel" style="display: inline; margin-top: -50px;" value="Cancel" />
                        </form>
                        
                    </div>
                </div>
                <!-- /.box -->
                <!-- Pdf table content -->
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
                                                <th>Image</th>
                                                <th>PDF</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="width: 20%;" id="title-youtube">
                                                    <input type="text" disabled="disabled" class="disabled-textBox"
                                                        value="test" />
                                                </td>
                                                <td>
                                                    <a>Image</a>
                                                </td>
                                                <td>
                                                    <a>PDF</a>
                                                </td>
                                                <td><i class="fa fa-edit" style="color: #3c8dbc; margin-top: 6px;font-size: 25px;"></i></td>
                                                <td><i class="fa fa-trash" style="color: red; margin-top: 6px; font-size: 25px;"
                                                        aria-hidden="true"></i></td>
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
                <!-- /.Pdf table content -->
            </section>


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    </div>
    <!-- ./wrapper -->

   <?php include 'script.php'; ?>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });

        $("#uploadButton").click(function(){
            var form = $("#frm");
            // you can't pass Jquery form it has to be javascript form object
            var formData = new FormData(form[0]);

            $.ajax({
                type: "POST",
                url: "ajaxCalls/insertPdf.php",
                data: formData,
                contentType: false, //this is requireded please see answers above
                processData: false, //this is requireded please see answers above
                success : function(data){
                    
                }
            });
        });
    </script>
</body>

</html>