<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mikes Book Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
</head>
<body class="body">

    <?php 
        if(isset($_POST['submit'])){
            echo "<script language='javascript' type='text/javascript'>";
            echo "document.getElementById('empty-row').innerHTML =";
            echo "<td>{$_POST['title']}</td>";
            echo "<td>{$_POST['author']}</td>";
            echo "<td>{$_POST['publisher']}</td>";
            echo "<td>{$_POST['wholesale']}</td>";
            echo "<td>{$_POST['retail']}</td>";
            echo "<td>{$_POST['quantity']}</td>'";
            echo "</script>";
        }
    ?>

    <h1 class="display-3 text-center">Main Dashboard</h1>

    <table class="table table-bordered table-dark">
        <thead>
            <tr class="text-center">
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Publisher</th>
            <th scope="col">Wholesale</th>
            <th scope="col">Retail</th>
            <th scope="col">Quantity</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td>Harry Potter</td>
                <td>J.K Rowling</td>
                <td>Bloomsbury Publishing</td>
                <td>5.99</td>
                <td>12.99</td>
                <td>10</td>
            </tr>
            <tr class="text-center">
                <td>The 7 Habits of Highly Effective People</td>
                <td>Stephen R. Covey</td>
                <td>Free Press</td>
                <td>8.99</td>
                <td>17.99</td>
                <td>8</td>
            </tr>
            <tr class="text-center">
                <td>The Talent Code</td>
                <td>Daniel Coyle</td>
                <td>Bantam</td>
                <td>9.99</td>
                <td>19.99</td>
                <td>15</td>
            </tr>
            <tr class="text-center" id=empty-row>
               
            </tr>
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
    <a href="addbook.php"><button type="button" class="btn btn-dark">Add Book</button></a>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>