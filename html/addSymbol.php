<!DOCTYPE html>
<html>

<head>
  <?php include 'head.php'; ?>
  <link rel="stylesheet" href="../plugins/select2/select2.min.css">
  <style>
    .btn-selected{  
      width: 100%;
      background-color: #222d32;
      color: white;
      border-radius: 0px;
    }

    .btn-dormant{
      width: 100%;
      color: #222d32;
      background-color: white;
      border-radius: 0px;
    }
    
    [type="radio"]:checked,
    [type="radio"]:not(:checked) {
        position: absolute;
        left: -9999px;
    }
    [type="radio"]:checked + label,
    [type="radio"]:not(:checked) + label
    {
        position: relative;
        padding-left: 28px;
        cursor: pointer;
        line-height: 20px;
        display: inline-block;
        color: #666;
    }
    [type="radio"]:checked + label:before,
    [type="radio"]:not(:checked) + label:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 18px;
        height: 18px;
        border: 2px solid #222d32;
        border-radius: 100%;
        background: #fff;
    }
    input[type=radio][disabled] + label:before{
        border: 2px solid #8080809c;
    }
    input[type=radio][disabled] + label
    {
        color: #8080809c;
    }
    [type="radio"]:checked + label:after,
    [type="radio"]:not(:checked) + label:after {
        content: '';
        width: 12px;
        height: 12px;
        background: #222d32;
        position: absolute;
        top: 3px;
        left: 3px;
        border-radius: 100%;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }

    
    [type="radio"]:not(:checked) + label:after {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }
    [type="radio"]:checked + label:after {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
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
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-6" style="padding : 0px; border: 2px solid">
                        <input type="button" id="nse" value="NSE" class="btn btn-selected" name="">
                      </div>
                      <div class="col-md-6" style="padding:  0px;border: 2px solid">
                        <input type="button" id="mcx" value="MCX" class="btn btn-dormant" name="" style="width:100%">
                      </div>
                    </div>
                  </div>
              </div>

              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box" id="segment" style="margin-top: 20px">
              <div class="box-header">
                <h3>Segment</h3>
              </div>
              <div class="box-body">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="radio col-md-6">
                        
                          <input  type="radio" id="equities" value="equities" name="segment" checked>
                        <label for="equities">
                          Equities
                          </label>
                      </div>
                      <div class="radio col-md-6">
                        
                          <input  type="radio" id="derivative" value="derivative" name="segment">
                        <label for="derivative">
                          Derivative
                          </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="radio col-md-6">
                        
                          <input  type="radio" id="currency" value="currency" name="segment">
                        <label for="currency">
                          Currency
                          </label>
                      </div>
                      <div class="radio col-md-6">
                        
                          <input  type="radio" id="commodity" value="commodity" name="segment" disabled="">
                        <label for="commodity">
                          Commodity
                          </label>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            

            <div class="box" id="symbol" style="margin-top: 20px">
              <div class="box-header">
                <h3>Symbol</h3>
              </div>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Symbol</label>
                    <select class="form-control select2 js-data-example-ajax" style="width: 100%;">
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="box" id="instrument" style="margin-top: 20px;display: none">
              <div class="box-header">
                <h3>Instrument</h3>
              </div>
              <div class="box-body">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="radio col-md-6">
                        
                          <input  type="radio" id="future" value="future" name="instrument" checked>
                        <label for="future">
                          Future
                          </label>
                      </div>
                      <div class="radio col-md-6">
                        
                          <input  type="radio" id="option" value="option" name="instrument">
                        <label for="option">
                          Option
                          </label>
                      </div>
                    </div>
                </div>
              </div>
            </div>

            <div class="box" id="exp" style="margin-top: 20px;display: none">
              <div class="box-body">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="form-group">
                        <label>Expiry Date</label>
                        <select id="ed" class="form-control" style="width: 100%;">
                          <option selected="selected">Alabama</option>
                        </select>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            
            <div class="box" id="option_type" style="margin-top: 20px;display: none">
              <div class="box-header">
                <h3>Option Type</h3>
              </div>
              <div class="box-body">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="radio col-md-6">
                        
                          <input  type="radio" id="ce" value="ce" name="instrument" checked>
                        <label for="future">
                          CE (Call European)
                          </label>
                      </div>
                      <div class="radio col-md-6">
                        
                          <input  type="radio" id="pe" value="pe" name="instrument">
                        <label for="pe">
                          PE (Pull European)
                          </label>
                      </div>
                    </div>
                </div>
              </div>
            </div>

            <div class="box" id="ed_sp" style="margin-top: 20px;display: none">
              <div class="box-body">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Expiry Date</label>
                            <select id="ed" class="form-control" style="width: 100%;">
                              <option selected="selected">Alabama</option>
                            </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Strike Price</label>
                            <select id="sp" class="form-control" style="width: 100%;">
                              <option selected="selected">Alabama</option>
                            </select>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
 
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
<script src="../plugins/select2/select2.full.min.js"></script>
<script src="../dist/js/underscore.js"></script>
<script src="../dist/js/addSymbol.js"></script>
<script>
  </script>
</body>

</html>