 <!--Retreive books from database.-->
 <?php 

//Database connection.
include('../config/db_connect.php');

//Query to fetch all books.
 $sql = "SELECT * FROM books ORDER BY title";

 //Make query and get result.
 $result = mysqli_query($conn, $sql);

 //Fetch the resulting rows as an array.
 $books = mysqli_fetch_all($result, MYSQLI_ASSOC);

 //Free results from memory.
 mysqli_free_result($result);

 //Close Connection.
 mysqli_close($conn);

?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mikes Book Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
</head>
<body class="body">

    <!--Navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Bookstore Inventory</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
            </thead>
            <tbody>

            <!--Retrieve data from database and display into a table.-->
            <?php foreach($books as $book){ ?>
                <tr class="text-center">
                    <td><?php echo htmlspecialchars($book['title']); ?></td>
                    <td><?php echo htmlspecialchars($book['author']); ?></td>
                    <td><?php echo htmlspecialchars($book['publisher']); ?></td>
                    <td><?php echo htmlspecialchars($book['genre']); ?></td>
                    <td><?php echo htmlspecialchars($book['isbn']); ?></td>
                    <td><?php echo htmlspecialchars($book['wholesale']); ?></td>
                    <td><?php echo htmlspecialchars($book['retail']); ?></td>
                </tr>
            <?php } ?>
                
                
                <!--New books will be inserted here.-->
                <tr class="text-center" id="empty-row"></tr>
            </tbody>
        </table>
    </div>

        
    <div class="d-flex justify-content-center">
        <a href="removebook.php"><button type="button" class="btn btn-outline-dark">Remove Book</button></a>
        <a href="addbook.php"><button type="button" class="ml-2 btn btn-dark">Add Book</button></a>
    </div>

    <!--Scripts for Bootstrap.-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>