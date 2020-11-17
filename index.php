<!doctype html>
<html lang="en">
  <head>
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Dipti Gyawali</title>
  </head>
  <body>

    <?php include('process.php'); ?>

     <!--  <?php echo $name; ?>
 -->


    <div class = "container">


    <?php

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'crud';

    $connection = new mysqli($server, $user, $password, $dbname) or die(mysqli_error($connection));

    $result = $connection->query("SELECT * FROM data") or die($connection->error);

    ?>

  <div class="row justify-content-center">

      <table class = "table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Location</th>
            <th colspan = "2"> Action </th>
          </tr>
        </thead>

        <?php
            while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td> <?php echo $row['name']; ?> </td>
                <td> <?php echo $row['location']; ?></td> <td>
                   <a href="index.php?edit=<?php echo $row ['id']; ?>"
                    class="btn btn-info">Edit</a>

                  <a href="process.php?delete=<?php echo $row ['id']; ?>"
                    class="btn btn-danger"> Delete</a>

                 </td> 
              </tr>
        
        <?php endwhile; ?>
      </table>


    </div>

    <?php

      function pre_r( $array ) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
      }

    ?>

    <div class = "row justify-content-center">
        <form action= "process.php" method="POST">
          <input type = "hidden" name="id" value = "<?php echo $id; ?>">
          <div class = "form-group">
            <label>Name</label>
            <input type="text" name="name" class = "form-control" value="<?php echo $name; ?>"placeholder="Enter your name" >
          </div>

          <div class = "form-group">
            <label>Location</label>
            <input type="text" name="location" class = "form-control" value= "<?php echo $location;?>"placeholder="Enter your location" > 
          </div>

          <div class = form-group>
            <?php
              if($update == true):
            ?>

            <button type="submit" class="btn btn-info"  name="update">Update</button>

           <?php else: ?>   

            <button type="submit" class="btn btn-primary"  name="save">Save</button>

            <?php endif; ?> 
          
          </div>
        </form>
  </div>

</div>


    


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>