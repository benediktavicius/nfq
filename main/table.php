<?php
$sql='SELECT * FROM books';
$result=mysqli_query($connect,$sql);
?>

<div class="container">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name<a href="sort/asc_name.php" class="glyphicon glyphicon-triangle-bottom"></a><a href="sort/desc_name.php" class="glyphicon glyphicon-triangle-top"></a></th>
        <th>Author<a href="sort/asc_author.php" class="glyphicon glyphicon-triangle-bottom"></a><a href="sort/desc_author.php" class="glyphicon glyphicon-triangle-top"></a></th>
        <th>Year<a href="sort/desc_year.php" class="glyphicon glyphicon-triangle-bottom"></a><a href="sort/asc_year.php" class="glyphicon glyphicon-triangle-top"></a></th>
      </tr>
    </thead>
    <tbody>
      <?php 
      if (mysqli_num_rows($result) > 0) {
      // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          //echo(var_dump($row));
          echo "<tr><td><a href=preview.php?book_id=".$row["book_id"] . ">" . $row["book_name"]. "</a></td><td>".$row["book_author"]."</td><td>".$row["book_year"]."</td></tr>";
        }
      } else {
        echo "0 results";
      } 
      ?>
    </tbody>
  </table>
</div>
