
<form action='calcola.php' method='post'>
  <?php

    include('configure.php');

    $result = mysql_query("SELECT * FROM pizze");
    while($row = mysql_fetch_array($result, MYSQL_ASSOC))
     {
      echo "<div class='elemento'>
               <img src='./assets/images/".$row['image']."'>
               <div>
                 <div class='descrizione'>
                   <h2>".$row['name']."</h2>
                   <p>".$row['description']."</p>
                 </div>
                 <div class='prezzo'>
                   <p>".$row['price']."</p>
                   <input name='".$row['name']."' type='number' value='0' />
                 </div>
               </div>
             </div>";
     }

  ?>
  <div class='domicilio'>
    Consegna a domicilio?
      Si<input type='radio' name='consegna' value='true' />
      No<input type='radio' name='consegna' value='false' />

    <input class='submit' type='submit' value='ACQUISTA' />
  </div>

</form>
