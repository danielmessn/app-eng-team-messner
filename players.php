<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>My team manager</title>
  <meta name="description" content="Soccer team manager">
  <meta name="author" content="Daniel Messner, Manuel Messner">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="wrapper">
  <header>
    <h1>My team manager</h1>
  </header>
  <div id="nav">
    <div class="asideLink"><a href="index.php">Home</a></div>
    <div class="asideLink"><a href="players.php">Players</a><br></div>
  
  </div>
  <div id="tableplayers">
    <h2>Players</h2>
    <table class="table">
    <thead>
        <tr>
          <th scope="col">First name</th>
          <th scope="col">Last name</th>
          <th scope="col">Trikot Nr.</th>
          <th scope="col">Birthdate</th>
        </tr>
    </thead>
    <tbody>

    <?php

      /* Database connection.*/
      require_once('config.php');
      
      /* Query */
      $query = "SELECT * FROM player";

      /* Execute the query */
      $result = mysqli_query($link, $query);

      /* Check for errors */
      if (!$result)
      {
        echo 'Query error: ' . mysqli_error($link);
        die();
      }

      /* Iterate through the result set */
      while ($row = mysqli_fetch_assoc($result))
      {
        echo "<tr><td>" . $row['plyr_firstname'] . "</td><td>" . $row['plyr_lastname'] . "</td><td>" . 
              $row['plyr_trikotnr'] . "</td><td>" . $row['plyr_birthdate'] . "</td><td><button class=\"btn btn-default\">Edit</button></td>" . 
              "<td><button class=\"btn btn-danger\">Delete</button></td>";
      }

    ?>

    </tbody>
    </table>

    <a class="btn btn-default" href="addplayer.php">Add player</a>
  </div>
</div>
</body>
</html>