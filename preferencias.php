<?php
$db = mysqli_connect("mysql2.000webhost.com","a4243734_alonso","Wanagow2","a4243734_gow2");
if (mysqli_connect_errno()) {
    printf("Can't connect to SQL Server. Error Code %s\n", mysqli_connect_error($db));
    exit;
}

$academica     = $_POST['academica'];
$area = $_POST['area'];
$congreso    = $_POST['congreso'];
$convencion  = $_POST['convencion'];
$seminario  = $_POST['seminario'];
$taller  = $_POST['taller'];
$diplomado  = $_POST['diplomado'];
$curso  = $_POST['curso'];
$conferencia  = $_POST['conferencia'];
$expo  = $_POST['expo'];

$cultural  = $_POST['cultural'];
$ballet  = $_POST['ballet'];
$teatro  = $_POST['teatro'];
$comedia  = $_POST['comedia'];
$drama  = $_POST['drama'];
$infantil  = $_POST['infantil'];
$musical  = $_POST['musical'];
$otrosT  = $_POST['otrosT'];
$circos  = $_POST['circos'];
$exposiciones  = $_POST['exposiciones'];
$fotografia  = $_POST['fotografia'];
$escultura  = $_POST['escultura'];
$pintura  = $_POST['pintura'];
$libro  = $_POST['libro'];
$otrosE  = $_POST['otrosE'];
$cine  = $_POST['cine'];
$musica  = $_POST['musica'];
$clasica  = $_POST['clasica'];
$instrumental  = $_POST['instrumental'];
$fulklore  = $_POST['fulklore'];
$turistico  = $_POST['turistico'];
$ferias  = $_POST['ferias'];
$carnavales  = $_POST['carnavales'];
$peregrinacion  = $_POST['peregrinacion'];
$religiosa  = $_POST['religiosa'];
$otrosTuristica  = $_POST['otrosTuristica'];


$entretenimiento  = $_POST['entretenimiento'];
$conciertos  = $_POST['conciertos'];
$electronica  = $_POST['electronica'];
$jazzblues  = $_POST['jazzblues'];
$trova  = $_POST['trova'];
$rock  = $_POST['rock'];
$alternativa  = $_POST['alternativa'];
$gruperanortena  = $_POST['gruperanortena'];
$infantilE  = $_POST['infantilE'];
$hiphop  = $_POST['hiphop'];
$ranchera  = $_POST['ranchera'];
$pop  = $_POST['pop'];
$metal  = $_POST['metal'];
$reague  = $_POST['reague'];
$reggeatton  = $_POST['reggeatton'];
$baladasboleros  = $_POST['baladasboleros'];
$salsacumbia  = $_POST['salsacumbia'];
$cristiana  = $_POST['cristiana'];
$deportes  = $_POST['deportes'];
$basquetball  = $_POST['basquetball'];
$tenis  = $_POST['tenis'];
$beisball  = $_POST['beisball'];
$volleyball  = $_POST['volleyball'];
$torneos  = $_POST['torneos'];
$maratones  = $_POST['maratones'];
$autosmotos  = $_POST['autosmotos'];
$futbolAmericano  = $_POST['futbolAmericano'];
$artesMarciales  = $_POST['artesMarciales'];
$boxE  = $_POST['boxE'];
$luchaLibre  = $_POST['luchaLibre'];
$atletismo  = $_POST['atletismo'];
$toros  = $_POST['toros'];
$baresantros  = $_POST['baresantros'];
$inaguracion  = $_POST['inaguracion'];
$promocion  = $_POST['promocion'];
$showE  = $_POST['showE'];
$fiestasTematicas  = $_POST['fiestasTematicas'];
$bienvenida  = $_POST['bienvenida'];

$email = $_POST['alonso@hotmail.com'];


$sql = "SELECT * FROM Clientes AS C, Usuarios AS U, ClientesPreferencias AS CP, Preferencias AS P
WHERE C.idUsuario = U.idUsuario AND CP.idCliente = C.idCliente AND CP.idPreferencia = P.idPreferencia AND U.email ='$email' ";
$query = mysqli_query($db,$sql);
$results = mysqli_num_rows($query);
if ($results > 0)
{
    $row = mysqli_fetch_array($query);
    echo $row['idPreferencia'];
    $id =$row['idPreferencia'];
}

    $insert = "INSERT INTO Academica (academica, areaestudio, congresos, convenciones, seminarios, talleres, diplomados, cursos, conferencias, expos, idPreferencia) VALUES ( '$academica', '$area', '$congreso', '$convencion', '$seminario', '$taller', '$diplomado', '$curso', '$conferencia', '$expo', '12')";

        $query  = mysqli_query($db,$insert);
        if ($query)
        {
            //echo "Thanks for registering";
        }
        else
        {
            echo "Insert failed";
        }

    $insert = "INSERT INTO Cultural (cultural, balletdanza, teatro, comedia, drama, infantilC, musical, otrosT, circos, exposiciones, fotografia, escultura, pintura, libros, otrosE, cineArte, musica, clasica, instrumental, folklorepopular, turistico, ferias, carnavales, peregrinaciones, fiestasReligiosasIndigenas, otrosTuristica, idPreferencia) VALUES ('$cultural','$balletdanza','$teatro','$comedia','$drama','$infantilC','$musical','$otrosT','$circos','$exposiciones','$fotografia','$escultura','$pintura','$libros','$otrosE','$cineArte','$musica','$clasica','$instrumental','$folklorepopular','$turistico','$ferias','$carnavales','$peregrinaciones','$fiestasReligiosasIndigenas','$otrosTuristica','12')";
    $query  = mysqli_query($db,$insert);
    if ($query)
    {
        //echo "Thanks for registering";
    }
    else
    {
        echo "Insert failed";  //  $query  = mysqli_query($db,$insert);

    }

    
    $insert = "INSERT INTO Entretenimiento (entretenimiento, conciertos, electronica, jazzblues, trova, rock, alternativa, gruperanortena, infantilE, hiphop, ranchera, pop, metal, reague, reggeatton, baladasboleros, salsacumbia, cristiana, deportes, futbol, basquetball, tenis, beisball, volleyball, torneos, maratones, autosmotos, futbolAmericano, artesMarciales, boxE, luchaLibre, atletismo, toros, baresantros, inaguracion, promocion, showE, fiestasTematicas, bienvenida, idPreferencia) 

    VALUES ('$entretenimiento', '$conciertos', '$electronica', '$jazzblues', '$trova', '$rock', '$alternativa', '$gruperanortena', '$infantilE', '$hiphop', '$ranchera', '$pop', '$metal', '$reague', '$reggeatton', '$baladasboleros', '$salsacumbia', '$cristiana', '$deportes', '$futbol', '$basquetball', '$tenis', '$beisball', '$volleyball', '$torneos', '$maratones', '$autosmotos', '$futbolAmericano', '$artesMarciales', '$boxE', '$luchaLibre', '$atletismo', '$toros', '$baresantros', '$inaguracion', '$promocion', '$showE', '$fiestasTematicas', '$bienvenida', '12')";

    $query  = mysqli_query($db,$insert);
    if ($query)
    {
        //echo "Thanks for registering";
    }
    else
    {
        echo "Insert failed";
    }

$db->close(); 
?>


