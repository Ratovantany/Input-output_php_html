<!-- Lauma Gailite 221RDB389 2. grupa -->
<!DOCTYPE html>
<head>
<?php
    $sDati = []; 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $vards = $_POST['username']; 
        $parole = $_POST['password'];
        $epasts = $_POST['email'];
        $info = "Vards: $vards, Parole: $parole, E-pasts: $epasts\n";
        $fails = fopen("3uzd_Gailite.txt", "a"); // atversana

        if ($fails) { // faila ierakstu pievienosana
            fwrite($fails, $info); 
            fclose($fails); 
            }
        }
    //faila nolasisana, saglabasana
    if (file_exists("3uzd_Gailite.txt")) {$sDati = file("3uzd_Gailite.txt");}
?>

    <title>MD 3</title>
    <style>
        body{
            margin: 5 auto; 
            text-align: center;
            background-color: #ece8f2;
            }
        input{padding: 5px;}
        table {
            margin: 0 auto; 
            width: 80%;
            padding-top: 20px;
            }
        th, td {
            text-align: center;
            border: 2px solid gray;
            padding: 15px;
            }
        th {background-color: #d2c8d7;}
    </style>
</head>
<body>
<form method="POST" action=""> 
    <!-- ja katram no laukiem rakstitu gala "required",
    tad bez pareizas ievades nevaretu iesniegt datus, soreiz so opciju neizmantoju.  -->
    <input type="text" name="username" placeholder="Vards">
    <input type="password" name="password" placeholder="Parole">
    <input type="email" name="email" placeholder="E-pasts"><br><br>
    <input type="submit" value="Nosutit"> 
</form>

<table>
    <thead>
        <tr>
            <th>Vārds</th>
            <th>Parole</th>
            <th>E-pasts</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sDati as $rinda): ?>
            <?php
            list($vards, $parole, $epasts) = explode(", ", $rinda); // aiz epasta tiek atdalita rinda un parnesta jaunaa
            $vards = str_replace("Vārds: ", "", $vards);
            $parole = str_replace("Parole: ", "", $parole);
            $epasts = str_replace("E-pasts: ", "", $epasts);?>
            <tr> <!--Nepieciesams, lai teksts paraditos tabulaa index failaa: -->
                <td><?php echo $vards; ?></td>
                <td><?php echo $parole; ?></td>
                <td><?php echo $epasts; ?></td>
            </tr>
        <?php endforeach; ?> <!--bez si netiek noslegts cikls un lapa neiet -->
    </tbody>
</table>

</body>
</html>
