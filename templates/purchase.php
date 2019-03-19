<?php 
        //If form has been submitted.
        if(isset($_POST['submit'])){  
            
            //Establish connection to database.
            include('../config/db_connect.php');

            $bookISBN = mysqli_real_escape_string($conn, $_POST['isbn']);

            //Query to fetch all books.
            $sql = "SELECT * FROM books WHERE isbn = '$bookISBN'";
    
            //Make query and get result.
            $result = mysqli_query($conn, $sql);

            //Fetch result as associative array.
            $book = mysqli_fetch_assoc($result);

            //Free results from memory.
            mysqli_free_result($result);
 
            //Close Connection.
            mysqli_close($conn);
        }
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Make Purchase</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href=" ../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
      <!--Navigation bar-->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Remove Book</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home </span></a>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="purchase.php">Make Purchase  <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="addbook.php">Add Book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="removebook.php">Remove Book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Edit Book</a>
            </li>
            </ul>
        </div>
        <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Book Title" aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>
        </nav>

        <form action="purchase.php" method="POST">
            <div class="d-flex justify-content-center form-row">
                <div class="form-group col-md-6 mt-5">
                        <input type="text" size="5" class="form-control form-control-lg" name="isbn" placeholder="isbn #">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a href="removebook.php"><button type="submit" name="submit" class="btn btn-outline-dark">Scan</button></a>
                <a href="index.php"><button type="button" name="cancel-btn" class="ml-2 btn btn-dark">Cancel</button></a>
            </div>
        </form>

        <!--Table Header-->
    <div class="d-flex justify-content-center">
        <table class="table table-bordered table-striped bg-white table-hover">
            <thead class="bg-dark text-white">
                <tr class="text-center">
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Publisher</th>
                <th scope="col">Genre</th>
                <th scope="col">ISBN</th>
                <th scope="col">Wholesale</th>
                <th scope="col">Retail</th>
                </tr>
                <tr class="bg-light text-center text-dark">
                <td scope="col" colspan="6">$0.00</th>
                <td scope="col">Sub Total</th>
                </tr>
                <tr class="bg-light text-center text-dark">
                <td scope="col" colspan="6">$0.00</th>
                <td scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                
                
            </tbody>
        </table>
    </div>

          <!--Scripts for Bootstrap.-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>