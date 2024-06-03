<!DOCTYPE html>
<html lang="it">   
    <head>
        <meta charset="utf-8">
        <title>Esercizio 11.4</title>
        <meta name="author" content="Paolo Aimar" >
        <link rel="stylesheet" type="text/css" href="../lab11_style.css">
        <script>
            "use strict";
            function checkInt(form)
            {
                regex = /^\d+$/;
                almenoUnElementoMaggioreDiZero = false;
                
                for(i = 0; i<form.length; ++i) {
                    if(form.elements[i].type != 'submit' && form.elements[i].type != 'reset' ) {
                        if(!regex.test(form.elements[i].value))
                        {
                            alert("Errore - Formato dati non corretto, attesi numeri interi positivi naturali");
                            return false;
                        }
                        if(form.elements[i].value > 0)
                        {
                        	almenoUnElementoMaggioreDiZero = true;
                        }
                    }
                }
                
                if(!almenoUnElementoMaggioreDiZero) 
                {
                	alert("Errore - Almeno un prodotto deve avere una quantita' maggiore di zero");
                  return false;
                }    
                return true;
            }
        </script>
    </head>  
    <body>
        <h1>Auto nuove</h1>
        <?php
            $con = mysqli_connect("172.17.0.5", "uReadOnly", "posso_solo_leggere", "automobili");
             
                if (mysqli_connect_errno()) 
                    echo "<p>Errore connessione al DBMS: ".mysqli_connect_error()."</p>\n";
                else
                {
        ?>
                    <form name="f" action="LAB11_4B.php" method="POST" onSubmit="return checkInt(this);">
                        <table>
                            <caption>Parco Auto</caption>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Costo</th>
                                <th>Quantit&agrave;</th>
                            </tr>
                            <?php
                                $query = "SELECT * FROM auto_nuove";
                                                        
                                $result = mysqli_query($con, $query);
                                                        
                                if(!$result)
                                    echo "<tr>\n<td colspan='4'>Errore query fallita: ".mysqli_error($con)."</td>\n</tr>\n";
                                else
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                        echo "<tr>\n<td>$row[ID]</td>\n<td>$row[NOME]</td>\n<td>&euro; ".number_format($row['COSTO'],2,',','.')."</td>\n<td><input type='text' name='quantita[$row[ID]]' value='0'></td>\n</tr>\n";
                                     
                                    mysqli_free_result($result);
                                }                    
                    
                                mysqli_close($con);
                            ?>
                            <tr>
                                <td colspan="4"><input type="submit" value="Acquista"></td>
                            </tr>
                        </table>
                    </form>
        <?php
             }
        ?>  
    </body>    
</html>
