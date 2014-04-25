<?php
$db = mysqli_connect("mysql2.000webhost.com","a4243734_alonso","Wanagow2","a4243734_gow2");
if (mysqli_connect_errno()) {
    printf("Can't connect to SQL Server. Error Code %s\n", mysqli_connect_error($db));
    exit;
}
$email = $_POST['email'];
$json   = array();
$db->query("SET NAMES 'utf8'");

$sql = "SELECT * FROM Clientes AS C, Usuarios AS U, ClientesPreferencias AS CP, Preferencias AS P, Entretenimiento AS E, Cultural AS Cul, Academica AS A
WHERE C.idUsuario = U.idUsuario AND CP.idCliente = C.idCliente AND CP.idPreferencia = P.idPreferencia 
AND P.idPreferencia = E.idPreferencia AND P.idPreferencia = Cul.idPreferencia AND P.idPreferencia = A.idPreferencia
AND U.email ='$email' ";
$query = mysqli_query($db,$sql);
$results = mysqli_num_rows($query);
if ($results > 0)
{
    $row = mysqli_fetch_array($query);
    //echo $row['idPreferencia'];
    $id =$row['idPreferencia'];


    $cultural =$row['cultural'];
    $ballet =$row['balletdanza'];

    $teatro =$row['teatro'];
    $teatro_comedia = $row['comedia'];
    $teatro_drama =$row['drama'];
    $teatro_infantil =$row['infantilC'];
    $teatro_musical =$row['musical'];
    $teatro_otros =$row['otrosT'];
    $circos =$row['circos'];

    $exposicion =$row['exposiciones'];
    $exposicion_fotografia =$row['fotografia'];
    $exposicion_escultura =$row['escultura'];
    $exposicion_pintura =$row['pintura'];
    $exposicion_libros =$row['libros'];
    $exposicion_otrosE =$row['otrosE'];
    $cine_arte =$row['cineArte'];

    $culturales_musica =$row['musica'];
    $musica_clasica =$row['clasica'];
    $musica_instrumental =$row['instrumental'];
    $musica_popular =$row['folklorepopular'];

    $turistico =$row['turistico'];
    $turistico_feria =$row['ferias'];
    $turistico_carnavales =$row['carnavales'];
    $turistico_peregrinaciones =$row['peregrinaciones'];
    $turistico_fiestasReligiosas =$row['fiestasReligiosasIndigenas'];
    $turistico_otros =$row['otrosTuristica'];

    $entretenimiento =$row['entretenimiento'];
    $entretenimiento_concierto =$row['conciertos'];
    $concierto_electronica =$row['electronica'];
    $concierto_jazz =$row['jazzblues'];
    $concierto_trova =$row['trova'];
    $concierto_rock =$row['rock'];
    $concierto_alternativa =$row['alternativa'];
    $concierto_grupera =$row['gruperanortena'];
    $concierto_infantilE =$row['infantilE'];
    $concierto_hiphop =$row['hiphop'];
    $concierto_rancheras =$row['ranchera'];
    $concierto_pop =$row['pop'];
    $concierto_metal =$row['metal'];
    $concierto_cristiana =$row['cristiana'];
    $concierto_reague =$row['reague'];
    $concierto_reggetton =$row['reggeatton'];
    $concierto_salsa =$row['salsacumbia'];
    $concierto_baladas =$row['baladasboleros'];

    $deporte =$row['deportes'];
    $deporte_futboll =$row['futbol'];
    $deporte_basketball =$row['basquetball'];
    $deporte_tenis =$row['tenis'];
    $deporte_beisball =$row['beisball'];
    $deporte_volleyball=$row['volleyball'];
    $deporte_torneos =$row['torneos'];
    $deporte_toros =$row['toros'];
    $deporte_maratones =$row['maratones'];
    $deporte_futbolAmericano =$row['futbolAmericano'];
    $deporte_artesmarciales =$row['artesMarciales'];
    $deporte_autosmotos =$row['autosmotos'];
    $deporte_luchalibre =$row['luchaLibre'];
    $deporte_box=$row['boxE'];
    $deporte_atletismo=$row['atletismo'];

    $barantro =$row['baresantros'];
    $barantro_inaguracion =$row['inaguracion'];
    $barantro_promocion =$row['promocion'];
    $barantro_show =$row['showE'];
    $barantro_fiestastematicas =$row['fiestasTematicas'];
    $barantro_bienvenida =$row['bienvenida'];

    $academica =$row['academica'];
    $academica_areaestudio =$row['areaestudio'];
    $academica_congreso =$row['congresos'];
    $academica_convencion=$row['convenciones'];
    $academica_seminario=$row['seminarios'];
    $academica_taller=$row['talleres'];
    $academica_diplomado=$row['diplomados'];
    $academica_curso=$row['cursos'];
    $academica_expos =$row['expos'];
    $academica_conferencia =$row['conferencias'];




    switch($cultural)
    {
        case "0":
        //    alert("Estoy dentro de un switcg");
        break;
        case "1":
        //    alert("Esta activo la preferencia Cultural");
                    switch($ballet){
                        case "1":
                           if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'ballet' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                        break;
                        case "0":
                        break;
                    }


            switch($teatro)
            {
                case "1":
             //       alert("Esta activo las preferencias de Teatro");
                    switch($teatro_comedia){
                        case "1":
                           if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'comedia' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                        break;
                        case "0":
                        break;
                    }
                    switch($teatro_drama){
                        case "1":
                           if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'drama' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                        break;
                        case "0":
                        break;
                    }
                    
                    switch($teatro_infantil){
                        case "1":
                            if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'infantil' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                        break;
                        case "0":
                        break;
                    }
                    
                    switch($teatro_musical){
                        case "1":
                                if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                                    FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                                    WHERE E.idPromotor = P.idPromotor
                                    AND E.idTipoEvento = T.idTipoEvento
                                    AND D.idDestino = E.idDestino
                                    AND T.detallesEvento =  'Musical' ")) {
                                    while ($row=$result->fetch_assoc()) {
                                        $json[]=array(
                                            'idEvento'=>$row['idEvento'],
                                            'titulo'=>$row['titulo'],
                                            'tipo'=>$row['tipoEvento'],
                                            'descripcion'=>$row['descripcion'],
                                            'lugar'=>$row['calle'],        
                                            'fecha'=>$row['fechaEvento'],
                                            'hora'=>$row['hora'],
                                            'costo'=>$row['costo'],
                                            'imagen'=>$row['imagen'],
                                         
                                        );
                                    }
                                }
                                $result->close();
                        break;
                        case "0":
                        break;
                    }
                    
                    switch($teatro_otros){
                        case "1":
                    if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Teatro otros' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                        break;
                        case "0":
                        break;
                    }
                        
                break;
                case "0":
                break;
            }
            
            switch($circos){
                        case "1":
                           if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Circo' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                        break;
                        case "0":
                        break;
                    }


            switch($exposicion){
                case "1":
            //        alert("Esta activo las preferencias de Exposicion");
                    
                    switch($exposicion_fotografia){
                    case "1":
                       if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'fotografia' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($exposicion_escultura){
                    case "1":
                       if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'escultura' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($exposicion_pintura){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'pintura' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($exposicion_libros){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'libros' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($exposicion_otrosE){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Exposicion otros' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }

                    
                break;
                case "0":
                    break;
            }
            

            switch($cine_arte){
                        case "1":
                           if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Cine de Arte' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                        break;
                        case "0":
                        break;
                    }


            switch($culturales_musica){
                case "0":
                break;
                case "1":
                //    alert("Esta activo la preferencia de Musica");
                    
                    switch($musica_clasica){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Clasica' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($musica_instrumental){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Instrumental' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($musica_popular){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Popular' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    
                break;
            }
            
            switch($turistico){
                case "0":
                break;
                case "1":
                    //alert("Esta activo la preferencia de Turistico");
                    
                    switch($turistico_feria){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Feria' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($turistico_carnavales){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Carnaval' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($turistico_peregrinaciones){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Peregrinacion' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($turistico_fiestasReligiosas){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Fiesta Religiosa' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($turistico_otros){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Turistico otros' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    
                    
                break;
            }
            
        break;
    }

    switch($entretenimiento){
        case "0":
        break;
        case "1":
        //    alert("Esta activo la preferencia de Entretenimiento");
            
            switch($entretenimiento_concierto){
                case "0":
                break;
                case "1":
                //    alert("Esta activo la preferencia de conciertos");
                    
                    switch($concierto_electronica){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Electronica' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($concierto_jazz){
                    case "1":
                       if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Jazz' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($concierto_trova){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Trova' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($concierto_rock){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Rock' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($concierto_alternativa){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Alternativa' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($concierto_grupera){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Grupera' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($concierto_infantilE){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Concierto Infantil' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($concierto_hiphop){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Hip Hop' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($concierto_rancheras){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Ranchera' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($concierto_pop){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Pop' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($concierto_metal){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Metal' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($concierto_reague){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Reague' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($concierto_reggetton){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Reggetton' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($concierto_baladas){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Balada' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($concierto_salsa){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Salsa' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($concierto_cristiana){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Cristiana' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                break;
            }

            switch($deporte){
                case "0":
                break;
                case "1":
                //    alert("Esta activo la preferencia de Deportes");
                    
                    switch($deporte_futboll){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Futboll' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($deporte_basketball){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Basketball' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($deporte_tenis){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Tenis' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($deporte_beisball){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Beisball' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($deporte_volleyball){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Volleyball' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($deporte_torneos){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Torneos' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($deporte_maratones){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Maraton' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($deporte_futbolAmericano){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Futboll Americano' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($deporte_artesmarciales){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Artes Marciales' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($deporte_autosmotos){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Autos o Motos' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($deporte_box){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Box' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($deporte_luchalibre){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Lucha Libre' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($deporte_atletismo){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Atletismo' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($deporte_toros){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Toros' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                break;
            }
            
            switch($barantro){
                case "0":
                break;
                case "1":
                //    alert("Esta activo la preferencia de Bares y Antros");
                    
                    switch($barantro_inaguracion){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Inaguracion' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($barantro_promocion){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Promocion' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    case "0":
                        break;
                    }
                    
                    switch($barantro_show){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Show' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($barantro_fiestastematicas){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Fiesta Tematica' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($barantro_bienvenida){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Bienvenida' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    
                break;
            }
        break;
    }

    switch($academica){
        case "0":
        break;
        case "1":
        //    alert("Esta activo la preferencia de Academica");
            
                    switch($academica_areaestudio){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Area de Estudio' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($academica_congreso){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Congreso' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($academica_convencion){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Convencion' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($academica_seminario){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Seminario' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($academica_taller){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Taller' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($academica_diplomado){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Diplomado' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($academica_curso){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Curso' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($academica_conferencia){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Conferencia' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
                    
                    switch($academica_expos){
                    case "1":
                        if($result = $db->query("SELECT E.fechaEvento, E.hora, E.titulo, E.costo, E.imagen, E.idEvento, E.descripcion, T.tipoEvento, D.calle
                            FROM Eventos AS E, TiposEventos AS T, Destinos AS D, Promotores AS P
                            WHERE E.idPromotor = P.idPromotor
                            AND E.idTipoEvento = T.idTipoEvento
                            AND D.idDestino = E.idDestino
                            AND T.detallesEvento =  'Expo' ")) {
                            while ($row=$result->fetch_assoc()) {
                                $json[]=array(
                                    'idEvento'=>$row['idEvento'],
                                    'titulo'=>$row['titulo'],
                                    'tipo'=>$row['tipoEvento'],
                                    'descripcion'=>$row['descripcion'],
                                    'lugar'=>$row['calle'],        
                                    'fecha'=>$row['fechaEvento'],
                                    'hora'=>$row['hora'],
                                    'costo'=>$row['costo'],
                                    'imagen'=>$row['imagen'],
                                 
                                );
                            }
                        }
                        $result->close();
                    break;
                    case "0":
                        break;
                    }
            
            
        break;  
    }
    

}
header("Content-Type: text/json");
echo json_encode(array( 'nombre'  =>   $json)); 
$db->close(); 


?> 
