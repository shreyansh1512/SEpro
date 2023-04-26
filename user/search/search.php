<?php
require ('../../authenticate/connect.php');
$search = mysqli_real_escape_string($conn, $_POST['search']);
$query = "SELECT * FROM logindetails WHERE role = 'student' AND (username LIKE '$search%' OR name LIKE '$search%') ORDER BY (CASE WHEN username LIKE '$search%' THEN 0 ELSE 1 END), username ASC";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
    
    echo "<div class style='background-color: #fff; padding: 10px; margin: 10px 0; border-radius:10px';>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<p style='cursor: pointer; color:black;'' onclick='selectResult(\"".$row['username']."\")'>" .$row['name']. ' ('  .$row['username']. ')' ."<p>";    
    }
    echo "</div>";

} else{
    echo "<div style='background-color: #fff; padding: 10px; margin: 10px 0; border-radius:10px';'> <p>No results found</p> </div>";
}

?>

<script>
function selectResult(name) {
    document.getElementById("search").value = name;
    $("#results").empty();
    document.getElementById('search').focus();
}
</script>
