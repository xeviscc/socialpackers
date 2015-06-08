                                                                             <html>
  <head>
    <title><?php echo $title ?></title>
    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <style>
      * {
          margin: 0;
          padding: 0;
      }
      html, body {
          height: 100%;
      }
      #wrap {
          min-height: 100%;
      }
      #main {
          overflow: auto;
          padding-bottom: 40px;
      }
      #footer {
          clear: both;
          height: 40px;
          margin-top: -40px;
          position: relative;
      }
      body:before {
          content: "";
          float: left;
          height: 100%;
          margin-top: -32767px;
          width: 0;
      }
      .footer{
        padding-top:7px;
        border-top: 1px dotted #BDBDBD;
      }
      .footer li{
        display: inline;
        padding: 5px;
      }
      .header{
        height: 30px;
      }
    </style>
    <div id="wrap">
      <div id="main">
      <!-- Header -->
      <?php include 'application/views/common/header2.php'; ?>
      
      <div class="container-fluid">
        <!-- Content -->
        
      </div>
    </div>
  </div>

  <div id="footer">
  <!-- Footer -->
  <?php include 'application/views/common/footer2.php'; ?>
  
  </div>
</body>
</html>