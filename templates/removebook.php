<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Remove Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="removebookbody">

       
    <?php 
    //Database connection.
    include('../config/db_connect.php');

        //If form has been submitted.
        if(isset($_POST['submit'])){  
            

            $bookTitle = mysqli_real_escape_string($conn, $_POST['title']);

            //Query to fetch all books.
            $sql = "SELECT * FROM books WHERE Title = '$bookTitle'";
    
            //Make query and get result.
            $result = mysqli_query($conn, $sql);

            //Fetch result as associative array.
            $book = mysqli_fetch_assoc($result);

            //Free results from memory.
            mysqli_free_result($result);
 
            //Close Connection.
            mysqli_close($conn);

            //Print book attributes.
            print_r($book); 
        }
    ?>

        <h1 class="display-3 text-center">Remove Book</h1>
        
        <form action="removebook.php" method="POST">
            <div class="d-flex justify-content-center form-row">
                <div class="form-group col-md-6 mt-5">
                        <input type="text" size="5" class="form-control form-control-lg" name="title" placeholder="enter book title">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a href="removebook.php"><button type="submit" name="submit" class="btn btn-dark">Search Book</button></a>
                <a href="index.php"><button type="button" name="cancel-btn" class="ml-2 btn btn-dark">cancel</button></a>
            </div>
        </form>
 
    <!--Scripts for Bootstrap.-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>