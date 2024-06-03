<html lang="it">
    <head>
        <meta charset="UTF-8">
        <title>Pagina per acquistare i biglietti</title>
        <meta name="author" content="Paolo Aimar">
        <meta name="keywords" lang="it" content="html">
        <meta name="description" content="Pagina di acquisto dei biglietti">
        <meta http-equiv="refresh" content="600">
    </head>
    <body>
        <h1>Auto nuove</h1>
        <?php
            //per prima cosa mi prendo la connessione, inserendo il valore del localhost 172.17.0.5
            $con = mysqli_connect("172.17.0.5", "uReadWrite", "SuperPippo!!!", "auto");
          
         if (mysqli_connect_errno()) 
            echo "<p>Errore connessione al DBMS: ".mysqli_connect_error()."</p>\n";
         else
         {
        ?>
            <table>
                <caption>Parco Auto</caption>
                <tr>
                    <th>Nome</th>
                    <th>Quantit&agrave;</th>
                    <th>Costo</th>
                </tr>
                <?php
                    //scrivo la query ed estraggo dal database i valori 
                    $query = "SELECT * FROM auto_nuove";
                    $result = mysqli_query($con, $query);
                    if(!$result)
                            echo "<tr>\n<td>Errore query fallita: ".mysqli_error($con)."</td>\n</tr>\n";
                        else
                        {
                            while($row = mysqli_fetch_assoc($result))
                                echo "<tr>\n<td>$row[NOME]</td>\n<td>$row[QUANTITA]</td>\n<td>".number_format($row['COSTO'],2,',','.')." &euro;</td>\n</tr>\n";
                             
                            mysqli_free_result($result);
                        }                    
            
                        if(!mysqli_close($con)){
                            echo "<p>La connessione non si riesce a chiudere, errore.</p>";
                        }
                ?>
                
            </table> 
        <?php
            }
        ?>       
    </body>
</html>