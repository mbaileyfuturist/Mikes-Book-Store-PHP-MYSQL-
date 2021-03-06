<?php 
        //If form has been submitted.
        if(isset($_POST['submit'])){  
            
            //Establish connection to database.
            include('../config/db_connect.php');

            $bookTitle = mysqli_real_escape_string($conn, $_POST['title']);

            //Query to fetch all books.
            $sql = "SELECT * FROM books WHERE title = '$bookTitle'";
    
            //Make query and get result.
            $result = mysqli_query($conn, $sql);

            //Fetch result as associative array.
            $book = mysqli_fetch_assoc($result);

            //Free results from memory.
            mysqli_free_result($result);
 
            //Close Connection.
            mysqli_close($conn);
        }

        //If remove button has been clicked.
        if(isset($_POST['delete'])){
            //Establish connection to database.
            include('../config/db_connect.php');

            $book_to_delete = mysqli_real_escape_string($conn, $_POST['book_to_delete']);

            $sql = "DELETE FROM books WHERE title = '$book_to_delete'";

            if(mysqli_query($conn, $sql)){
                header('Location: index.php');
            }else{
                echo 'query error: ' . mysqli_error($conn);
            }
        }
?>
<!DOCTYPE <!DOCTYPE html>
<html>


        <?php include('header.php') ?>


        <!--Navigation bar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Remove Book</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="purchase.php">Make Purchase</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="addbook.php">Add Book</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Remove Book <span class="sr-only">(current)</a>
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

        <form action="removebook.php" method="POST">
            <div class="d-flex justify-content-center form-row">
                <div class="form-group col-md-6 mt-5">
                        <input type="text" size="5" class="form-control form-control-lg" name="title" placeholder="enter book title">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a href="removebook.php"><button type="submit" name="submit" class="btn btn-outline-dark">Search Book</button></a>
                <a href="index.php"><button type="button" name="cancel-btn" class="ml-2 btn btn-dark">Cancel</button></a>
            </div>
        </form>

        <?php 
            if(isset($_POST['submit'])){  
                echo "<div class=\"container mt-5\">";
                echo    "<div class=\"row\">";
                echo        "<div class=\"col-lg-4\">";
                echo            "<h4 class=\"text-white\">Title: {$book['title']}</h4>";
                echo        "</div>";
                echo        "<div class=\"col-lg-4\">";
                echo            "<h4 class=\" text-white ml-5\">Author: {$book['author']}</h4>";        
                echo        "</div>";
                echo    "</div>";

                echo    "<div class=\"row mt-5\">";
                echo        "<div class=\"col-lg-4\">";
                echo            "<h4 class=\"text-white\">Publisher: {$book['publisher']}</h4>";
                echo        "</div>";
                echo        "<div class=\"col-lg-4\">";
                echo            "<h4 class=\" text-white ml-5\">Genre: {$book['genre']}</h4>";        
                echo        "</div>";
                echo    "</div>";

                echo    "<div class=\"row mt-5\">";
                echo        "<div class=\"col-lg-4\">";
                echo            "<h4 class=\"text-white\">Wholesale: {$book['wholesale']}</h4>";
                echo        "</div>";
                echo        "<div class=\"col-lg-4\">";
                echo            "<h4 class=\" text-white ml-5\">Retail: {$book['retail']}</h4>";        
                echo        "</div>";
                echo    "</div>";
                
                echo    "<form class=\"form-inline mt-5\" action=\"removebook.php\" method=\"POST\">";
                echo      "<div class=\"form-group mb-2\">";
                echo         "<label class=\"text-white h4\">Are you sure wish to remove {$book['title']}? </label>";
                echo            "<input type=\"hidden\" name=\"book_to_delete\" value=\"{$book['title']}\">";
                echo     "</div>";
                echo        "<button name=\"delete\" type=\"submit\" class=\"btn btn-dark mb-2 ml-4\">Remove Books</button>";
                echo        "</form>";
                echo "</div>";
            }
            
        ?>
        <?php include('footer.php') ?>
</html>