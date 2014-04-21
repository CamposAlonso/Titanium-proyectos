<?php
$db = mysqli_connect("mysql2.000webhost.com","a4243734_alonso","Wanagow2","a4243734_gow2");
if (mysqli_connect_errno()) {
    printf("Can't connect to SQL Server. Error Code %s\n", mysqli_connect_error($db));
    exit;
}

$json   = array();

$email = $_POST['email'];


$sql = "SELECT * FROM Clientes AS C, Usuarios AS U, ClientesPreferencias AS CP, Preferencias AS P
WHERE C.idUsuario = U.idUsuario AND CP.idCliente = C.idCliente AND CP.idPreferencia = P.idPreferencia AND U.email ='$email' ";
$query = mysqli_query($db,$sql);
$results = mysqli_num_rows($query);
if ($results > 0)
{
    $row = mysqli_fetch_array($query);
    //echo $row['idPreferencia'];
    $id =$row['idPreferencia'];
    $insert = "INSERT INTO Academica (academica, areaestudio, congresos, convenciones, seminarios, talleres, diplomados, cursos, conferencias, expos, idPreferencia) VALUES ('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$id');";

        $query  = mysqli_query($db,$insert);
        if ($query)
        {
            echo "Thanks for registering";
        }
        else
        {
            echo "Insert failed";
        }

    $insert = "INSERT INTO  Cultural (cultural , balletdanza , teatro , comedia , drama , infantilC , musical , otrosT , circos , exposiciones , fotografia , escultura , pintura , libros , otrosE , cineArte , musica , clasica , instrumental , folklorepopular , turistico , ferias , carnavales , peregrinaciones , fiestasReligiosasIndigenas , otrosTuristica , idPreferencia ) VALUES ('0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '00',  '0',  '0',  '$id')"; 

    $query  = mysqli_query($db,$insert);
    if ($query)
    {
        echo "Thanks for registering";
    }
    else
    {
        echo "Insert failed";    $query  = mysqli_query($db,$insert);

    }

    
    $insert = "INSERT INTO  Entretenimiento (entretenimiento , conciertos , electronica , jazzblues , trova , rock , alternativa , gruperanortena , infantilE , hiphop , ranchera , pop , metal , reague , reggeatton , baladasboleros , salsacumbia , cristiana , deportes , futbol , basquetball , tenis , beisball , volleyball , torneos , maratones , autosmotos , futbolAmericano , artesMarciales , boxE , luchaLibre , atletismo , toros , baresantros , inaguracion , promocion , showE , fiestasTematicas , bienvenida , idPreferencia ) VALUES ('0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '$id')";
    $query  = mysqli_query($db,$insert);
    if ($query)
    {
        echo "Thanks for registering";
    }
    else
    {
        echo "Insert failed";
    }

}

$db->close(); 
?>

