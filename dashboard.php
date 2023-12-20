

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    
    <script src="https://kit.fontawesome.com/ca7101e501.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
     <script defer src="./js/analytics.js"></script>
    
   
</head>
<body>
<?php 
    include('./components/header.php')
?>

    <div class="container my-4">

 
    <h2 class= "my-4">Dashboard</h2 class= "my-4">

    <div class="row ">
  <div class="col-sm-6 mb-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title" class= "text-large">Total Registered Users</h5>
        <h1 class="card-text" id="total-users"></h1>
        <a href="#" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Total Photos</h5>
        <h1 class="card-text" id="total-photos"></h1>
        <a href="#" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
</div>
    
    

    
    
<h3 class="my-4">Registered Users</h3>
<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Date Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="all-users">
        </tbody>
        <!-- <tfoot>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Date Created</th>
                <th>Actions</th>
            </tr>
        </tfoot> -->
    </table>

        
    
        
    </div>

    <?php 
    include('./components/footer.php')
?>
    

</body>
</html>