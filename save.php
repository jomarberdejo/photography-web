

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photography</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
    <script src="https://kit.fontawesome.com/ca7101e501.js" crossorigin="anonymous"></script>

</head>
<body>
    <?php include('./components/header.php'); ?>
    <main>
    
        <section class="container mt-2 mx-auto">
        <h1 class="display-4">Favorites</h1>
            <div class="row" id="save-list-container">
                   
            </div>
        </section>
    </main>

    <div class="container mt-4">
    <?php include('./components/footer.php'); ?>
    </div>
     <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://www.facebook.com/jemax123">Jomar M. Berdejo</a>
  </div>
  <!-- Copyright -->

    <script src="./js/savelist.js"></script>
</body>
</html>
