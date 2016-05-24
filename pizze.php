
<?php

  $idmiofile = fopen("pizze.txt", "r");
  if (!$idmiofile)
    echo "Errore di accesso";

  echo "<form action='#' method='post'>";

  while(!feof($idmiofile)) {
    $letta = fgets($idmiofile);
    $dati = explode(";;",$letta);
    $dati[0] = strtoupper($dati[0]);
    if(!empty($dati[0])) {
    echo "<div class='elemento'>
            <img src='$dati[3]'>
            <div>
              <div class='descrizione'>
                <h2>$dati[0]</h2>
                <p>$dati[2]</p>
              </div>
              <div class='prezzo'>
                <p>$dati[1]$</p>
                <input name='$dati[0]' type='number' value='0' />
              </div>
            </div>
          </div>";
    }
  }

  echo "<div class='domicilio'>
          Consegna a domicilio?  
            Si<input type='radio' name='consegna' value='true' />
            No<input type='radio' name='consegna' value='false' />

          <input class='submit' type='submit' value='ACQUISTA' />
        </div>

        </form>";

  include('calcola.php');

?>
