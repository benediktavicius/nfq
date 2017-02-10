<?php

include("../global/scripts.php");

require_once '../global/connect.php';

if(isset($_GET['keywords'])) {
  $keywords = $connect->escape_string($_GET['keywords']);

  $query = $connect->query("SELECT * FROM books WHERE book_name LIKE '%{$keywords}%'");
}
include("../global/header.php");
?>

<div class="container">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Author</th>
        <th>Year</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      if (mysqli_num_rows($query) > 0) {
      // output data of each row
        while($row = mysqli_fetch_assoc($query)) {
          echo "<tr><td><a href=preview.php?book_id=".$row["book_id"] . ">" . $row["book_name"]. "</a></td><td>".$row["book_author"]."</td><td>".$row["book_year"]."</td></tr>";
        }
      } else {
        echo "0 results";
      } 
      ?>
    </tbody>
  </table>
</div>