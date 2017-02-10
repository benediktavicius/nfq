<?php
include("../global/connect.php");
include("../global/scripts.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>
  </title>
</head>
<body>
  <?php
  include("../global/header.php");

  if(isset($_GET['page']))
  {
    $page = $_GET['page'];
    if($page==1)
    {
      $page1 = 0;
    }
    else
    {
      $page1 = ($page*10)-10;
    }
  }
  else
  {
    $page1=0;
  }
  

  $sql="SELECT * FROM books ORDER BY book_year DESC LIMIT $page1,10";
  $result=mysqli_query($connect,$sql);
  ?>
  <div class="container">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Name<a href="../sort/asc_name.php" class="glyphicon glyphicon-triangle-bottom"></a><a href="../sort/desc_name.php" class="glyphicon glyphicon-triangle-top"></a></th>
          <th>Author<a href="../sort/asc_author.php" class="glyphicon glyphicon-triangle-bottom"></a><a href="../sort/desc_author.php" class="glyphicon glyphicon-triangle-top"></a></th>
          <th>Year<a href="../sort/desc_year.php" class="glyphicon glyphicon-triangle-bottom text-muted"></a><a href="../sort/asc_year.php" class="glyphicon glyphicon-triangle-top"></a></th>
        </tr>
      </thead>
      <tbody>
        <?php         
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td><a href=../main/preview.php?book_id=".$row["book_id"] . ">" . $row["book_name"]. "</a></td><td>".$row["book_author"]."</td><td>".$row["book_year"]."</td></tr>";
        }
        ?>
      </tbody>
    </table>

    <div class="pagination">
      <?php 
      $sql_all="SELECT * FROM books";
      $result_all = mysqli_query($connect,$sql_all);
      $count=mysqli_num_rows($result_all);
      $a=ceil($count/10);

      for($b=1;$b<=$a;$b++)
      {
        ?><a href="desc_year.php?page=<?php echo $b; ?>"><?php echo $b . " "; ?></a><?php
      }

      ?>
    </div>
  </div>
</body>
</html>