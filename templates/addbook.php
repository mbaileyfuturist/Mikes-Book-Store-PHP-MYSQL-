<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="addbookbody">
    <?php 
        //Connect to the database.
        include('../config/db_connect.php');
        
        //If form has been submitted.
        if(isset($_POST['submit'])){

            //Protection from SQLInjection.
            $bookTitle = mysqli_real_escape_string($conn, $_POST['title']);
            $bookAuthor = mysqli_real_escape_string($conn, $_POST['author']);
            $bookPublisher = mysqli_real_escape_string($conn, $_POST['publisher']);
            $bookWholesale = mysqli_real_escape_string($conn, $_POST['wholesale']);
            $bookRetail = mysqli_real_escape_string($conn, $_POST['retail']);
            $bookQuantity = mysqli_real_escape_string($conn, $_POST['quantity']);
        

            //sql insert
            $sql = "INSERT INTO books(title, author, publisher, wholesale, retail, quantity) VALUES('$bookTitle', '$bookAuthor', '$bookPublisher', '$bookWholesale', '$bookRetail', '$bookQuantity')";

            //Save to db and check.
            if(mysqli_query($conn, $sql)){
                header("Location: index.php");
            }else{
                echo "query error ".mysqli_error($conn);
            }

        }
   ?>
    <h1 class="display-3 text-center">Add Book</h1>
    
    <!--Form for adding book information.-->
    <form action="addbook.php" method="POST">
        <div class="form-row">
            <div class="form-group col-md-6 mt-5">
            <input type="text" size="5" class="form-control form-control-lg" name="title" placeholder="Title">
            </div>
            <div class="form-group col-md-6 mt-5">
            <input type="text" class="form-control form-control-lg" name="author" placeholder="Author">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6 mt-5">
            <input type="text" class="form-control form-control-lg" name="publisher" placeholder="Publisher">
            </div>
            <div class="form-group col-md-6 mt-5">
            <input type="text" class="form-control form-control-lg" name="wholesale" placeholder="Wholesale">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6 mt-5">
            <input type="text" class="form-control form-control-lg" name="retail" placeholder="Retail">
            </div>
            <div class="form-group col-md-6 mt-5">
            <input type="text" class="form-control form-control-lg" name="quantity" placeholder="Quantity">
            </div>
        </div>
        
        
        <div class="d-flex justify-content-center mt-5">
        <button type="submit" name="submit" class="btn btn-dark">Add Book</button>
        <a href="index.php"><button type="button" name="cancel-btn" class="ml-2 btn btn-dark">cancel</button></a>
        </div>
    </form>

    <!--Scripts for bootstrap.-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>