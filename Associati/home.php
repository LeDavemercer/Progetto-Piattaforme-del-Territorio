<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    
    $query = "SELECT * FROM `tbl_location` WHERE CONCAT(`id`, `location`, `password`, `city`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `tbl_location`";
    $search_result = filterTable($query);
}

function filterTable($query)
{
    $connect = mysqli_connect("localhost", "davemercer", "", "my_davemercer");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
echo "Il mio nome è " . $address;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search location</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="home.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th>Id</th>
                    <th>Location</th>
                    <th>City</th>
                </tr>

                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['location'];?></td>
                    <td><?php echo $row['city'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
            <hr>
            <a href="addressfinder.php">address finder</a>
        </form>
        
    </body>
</html>
