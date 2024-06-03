<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <title>Esercizio 11.4</title>
        <meta name="author" content="Paolo Rossi" >
        <link rel="stylesheet" type="text/css" href="../lab11_style.css">
    </head>
    
    <body>
        <h1>Auto nuove</h1>
        <?php
            $err = false;
            $almenoUnElementoMaggioreDiZero = false;
            
            if(isset($_REQUEST['quantita']))
            {
                /* Controllo valori numerici */
                foreach($_REQUEST['quantita'] as $v) {
                    if(!preg_match("/^\d+$/",trim($v))) {
                        $err = true;
                    }
                    if(trim($v) > 0) {
                    	$almenoUnElementoMaggioreDiZero = true;
                    }
                }
                
                if($err) {
                    echo "<p>Errore - Formato dati non corretto!</p>\n";
                } else if (!$almenoUnElementoMaggioreDiZero) {
                	echo "<p>Errore - Almeno un prodotto deve avere una quantita' maggiore di zero</p>\n";
                } else
                {
                    $costo_totale = 0;
                            
                    $con = mysqli_connect("172.17.0.5", "uReadOnly", "posso_solo_leggere", "automobili");
                             
                    if (mysqli_connect_errno()) 
                        echo "<p>Errore connessione al DBMS: ".mysqli_connect_error()."</p>\n";
                    else
                    {  
        ?>
                    <table>
                        <caption>Riepilogo auto selezionate</caption>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Costo unitario</th>
                            <th>Quantit&agrave;</th>
                            <th>Costo Parziale</th>
                        </tr>
                        <?php                             
                            $query = "SELECT * FROM auto_nuove";
                                                    
                            $result = mysqli_query($con, $query);
                                                    
                            if(!$result)
                                echo "<tr>\n<td colspan='5'>Errore query fallita: ".mysqli_error($con)."</td>\n</tr>\n";
                            else
                            {
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    $quantita = intval(trim($_REQUEST['quantita'][$row['ID']]));
                                    
                                    if($quantita > 0)
                                    {
                                        $costo_parziale = $row['COSTO']*$quantita;
                                        
                                        echo "<tr>\n<td>$row[ID]</td>\n<td>$row[NOME]</td>\n<td>&euro; ".number_format($row['COSTO'],2,',','.')."</td>\n<td>$quantita</td>\n<td>&euro; ".number_format($costo_parziale,2,',','.')."</td>\n</tr>\n";
                                    
                                        $costo_totale += $costo_parziale;
                                    }
                                }
                                
                                mysqli_free_result($result);
                            }                    
                
                            mysqli_close($con);
                        ?>
                        <tr>
                            <td colspan='5'>Costo totale: <?php echo number_format($costo_totale,2,',','.')." &euro;";?></td>
                        </tr>
                    </table>
        <?php
                    }
                }
            }
            else
                echo "<p>Errore - Dati mancanti.</p>\n";
        ?>          
        <p class="move"><a href='LAB11_4A.php'>Torna alla pagina precedente.</a></p>
    </body>
    
</html>
