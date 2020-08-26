<?php 
        //Connect to the database.
        include('../config/db_connect.php');
        
        //If form has been submitted.
        if(isset($_POST['submit'])){

            //Protection from SQLInjection.
            $bookTitle = mysqli_real_escape_string($conn, $_POST['title']);
            $bookAuthor = mysqli_real_escape_string($conn, $_POST['author']);
            $bookPublisher = mysqli_real_escape_string($conn, $_POST['publisher']);
            $bookgenre = mysqli_real_escape_string($conn, $_POST['genre']);
            $bookisbn = mysqli_real_escape_string($conn, $_POST['isbn']);
            $bookWholesale = mysqli_real_escape_string($conn, $_POST['wholesale']);
            $bookRetail = mysqli_real_escape_string($conn, $_POST['retail']);
        

            //sql insert
            $sql = "INSERT INTO books(title, author, publisher, genre, isbn, wholesale, retail) VALUES('$bookTitle', '$bookAuthor', '$bookPublisher', '$bookgenre', '$bookisbn', '$bookWholesale', '$bookRetail')";

            //Save to db and check.
            if(mysqli_query($conn, $sql)){
                header("Location: index.php");
            }else{
                echo "query error ".mysqli_error($conn);
            }

        }
?>

<!DOCTYPE <!DOCTYPE html>
<html>

    <?php include('header.php') ?>
   
    <!--Navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Add Book</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="purchase.php">Make Purchase  <span class="sr-only">(current)</span></a>
            </li>
        <li class="nav-item active">
                <a class="nav-link" href="#">Add Book <span class="sr-only">(current)</span></a>
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
    
    <!--Form for adding book information.-->
    <div class="addbook-form">
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
            <input type="text" class="form-control form-control-lg" name="genre" placeholder="Genre">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6 mt-5">
            <input type="text" class="form-control form-control-lg" name="wholesale" placeholder="Wholesale">
            </div>
            <div class="form-group col-md-6 mt-5">
            <input type="text" class="form-control form-control-lg" name="retail" placeholder="Retail">
            </div>
        </div>
        
        <div class="form-row d-flex justify-content-center">
            <div class="form-group col-md-6 mt-5">
            <input type="text" class="form-control form-control-lg" name="isbn" placeholder="isbn">
            </div>
        </div>
        
        <div class="d-flex justify-content-center mt-5">
        <button type="submit" name="submit" class="btn btn-outline-dark">Add Book</button>
        <a href="index.php"><button type="button" name="cancel-btn" class="ml-2 btn btn-dark">Cancel</button></a>
        </div>
    </form>
    </div>
   

    <?php include('footer.php') ?>
</html>