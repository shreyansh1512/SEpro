<?php
require ('../authenticate/connect.php');
$search = mysqli_real_escape_string($conn, $_POST['search']);
$query = "SELECT * FROM logindetails WHERE role = 'student' AND (name LIKE '$search%' OR name LIKE '$search%') ORDER BY (CASE WHEN name LIKE '$search%' THEN 0 ELSE 1 END), name ASC";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
    
    echo "<div style='background-color: #f0f0f0; padding: 10px; margin: 10px 0;'>";
    while($row = mysqli_fetch_assoc($result)){
        echo  "<p>".$row['name']."</p>";
    }
    echo "</div>";

} else{
    echo "<p>No results found</p>";
}

?>
