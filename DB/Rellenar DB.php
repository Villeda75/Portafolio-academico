<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros Necesarios</title>
</head>
<body>
<?php

    $Municipios = array(
        "Ahuachapan" => array("Ciudad de Ahuachapan",
        "Apaneca",
        "Atiquizaya",
        "Concepcion de Ataco",
        "El Refugio",
        "Guaymango",
        "Jujutla",
        "San Francisco Menendez",
        "San Lorenzo",
        "San Pedro Puxtla",
        "Tacuba",
        "Turin"),
        "Cabanias" => array("Sensuntepeque",
        "Cinquera",
        "Dolores",
        "Guacotecti",
        "Ilobasco",
        "Jutiapa",
        "San Isidro",
        "Tejutepeque",
        "Victoria"),
        "Chalatenango" => array("Chalatenango",
        "Agua Caliente",
        "Arcatao",
        "Azacualpa",
        "Cancasque",
        "Citala",
        "Comalapa",
        "Concepcion Quezaltepeque",
        "Dulce Nombre de Maria",
        "El Carrizal",
        "El Paraiso",
        "La Laguna",
        "La Palma",
        "La Reina",
        "Las Flores",
        "Las Vueltas",
        "Nombre de Jesus",
        "Nueva Concepcion",
        "Nueva Trinidad",
        "Ojos de Agua",
        "Potonico",
        "San Antonio de la Cruz",
        "San Antonio de los Ranchos",
        "San Fernando",
        "San Francisco Lempa",
        "San Francisco Morazan",
        "San Ignacio",
        "San Isidro Labrador",
        "San Luis del Carmen",
        "San Miguel de Mercedes",
        "San Rafael",
        "Santa Rita",
        "Tejutla"),
        "Cuscatlan" => array("Cojutepeque",
        "Candelaria",
        "El Carmen",
        "El Rosario",
        "Monte San Juan",
        "Oratorio de Concepción",
        "San Bartolomé Perulapía",
        "San Cristóbal",
        "San José Guayabal",
        "San Pedro Perulapán",
        "San Rafael Cedros",
        "San Ramón",
        "Santa Cruz Analquito",
        "Santa Cruz Michapa",
        "Suchitoto",
        "Tenancingo"),
        "La Libertad" => array("Santa Tecla",
        "Antiguo Cuscatlán",
        "Chiltiupán",
        "Ciudad Arce",
        "Colón",
        "Comasagua",
        "Huizúcar",
        "Jayaque",
        "Jicalapa",
        "La Libertad",
        "Nuevo Cuscatlán",
        "Quezaltepeque",
        "San Juan Opico",
        "Sacacoyo",
        "San José Villanueva",
        "San Matías",
        "San Pablo Tacachico",
        "Talnique",
        "Tamanique",
        "Teotepeque",
        "Tepecoyo",
        "Zaragoza"),
        "La Paz" => array("Cuyultitán",
        "El Rosario",
        "Jerusalén",
        "Mercedes La Ceiba",
        "Olocuilta",
        "Paraíso de Osorio",
        "San Antonio Masahuat",
        "San Emigdio",
        "San Francisco Chinameca",
        "San Pedro Masahuat",
        "San Juan Nonualco",
        "San Juan Talpa",
        "San Juan Tepezontes",
        "San Luis La Herradura",
        "San Luis Talpa",
        "San Miguel Tepezontes",
        "San Pedro Nonualco",
        "San Rafael Obrajuelo",
        "Santa María Ostuma",
        "Santiago Nonualco",
        "Tapalhuaca"),
        "La Union" => array("La Unión",
        "Anamorós",
        "Bolívar",
        "Concepción de Oriente",
        "Conchagua",
        "El Carmen",
        "El Sauce",
        "Intipucá",
        "Lislique",
        "Meanguera del Golfo",
        "Nueva Esparta",
        "Pasaquina",
        "Polorós",
        "San Alejo",
        "San José",
        "Santa Rosa de Lima",
        "Yayantique",
        "Yucuaiquín"),
        "Morazan" => array("Arambala",
        "Cacaopera",
        "Chilanga",
        "Corinto",
        "Delicias de Concepción",
        "El Divisadero",
        "El Rosario",
        "Gualococti",
        "Guatajiagua",
        "Joateca",
        "Jocoaitique",
        "Jocoro",
        "Lolotiquillo",
        "Meanguera",
        "Osicala",
        "Perquín",
        "San Carlos",
        "San Fernando",
        "San Isidro",
        "San Simón",
        "Sensembra",
        "Sociedad",
        "Torola",
        "Yamabal",
        "Yoloaiquín"),
        "San Miguel" => array("Ciudad de San Miguel",
        "Carolina",
        "Chapeltique",
        "Chinameca",
        "Chirilagua",
        "Ciudad Barrios",
        "Comacarán",
        "El Tránsito",
        "Lolotique",
        "Moncagua",
        "Nueva Guadalupe",
        "Nuevo Edén de San Juan",
        "Quelepa",
        "San Antonio",
        "San Gerardo",
        "San Jorge",
        "San Luis de la Reina",
        "San Rafael Oriente",
        "Sesori",
        "Uluazapa"),
        "San Salvador" => array("San Salvador",
        "Aguilares",
        "Apopa",
        "Ayutuxtepeque",
        "Cuscatancingo",
        "Delgado",
        "El Paisnal",
        "Guazapa",
        "Ilopango",
        "Mejicanos",
        "Nejapa",
        "Panchimalco",
        "Rosario de Mora",
        "San Marcos",
        "San Martín",
        "Santiago Texacuangos",
        "Santo Tomás",
        "Soyapango",
        "Tonacatepeque"),
        "San Vicente" => array("San Vicente",
        "Apastepeque",
        "Guadalupe",
        "San Cayetano Istepeque",
        "San Esteban Catarina",
        "San Ildefonso",
        "San Lorenzo",
        "San Sebastián",
        "Santa Clara",
        "Santo Domingo",
        "Tecoluca",
        "Tepetitán",
        "Verapaz"),
        "Santa Ana" => array("Santa Ana",
        "Candelaria de la Frontera",
        "Chalchuapa",
        "Coatepeque",
        "El Congo",
        "El Porvenir",
        "Masahuat",
        "Metapán",
        "San Antonio Pajonal",
        "San Sebastián Salitrillo",
        "Santa Rosa Guachipilín",
        "Santiago de la Frontera",
        "Texistepeque"),
        "Sonsonate" => array("Sonsonate",
        "Acajutla",
        "Armenia",
        "Caluco",
        "Cuisnahuat",
        "Izalco",
        "Juayúa",
        "Nahuizalco",
        "Nahulingo",
        "Salcoatitán",
        "San Antonio del Monte",
        "San Julián",
        "Santa Catarina Masahuat",
        "Santa Isabel Ishuatán",
        "Santo Domingo de Guzmán",
        "Sonzacate"),
        "Usulutan" => array("Usulután",
        "Alegría",
        "Berlín",
        "California",
        "Concepción Batres",
        "El Triunfo",
        "Ereguayquín",
        "Estanzuelas",
        "Jiquilisco",
        "Jucuapa",
        "Jucuarán",
        "Mercedes Umaña",
        "Nueva Granada",
        "Ozatlán",
        "Puerto El Triunfo",
        "San Agustín",
        "San Buenaventura",
        "San Dionisio",
        "San Francisco Javier",
        "Santa Elena",
        "Santa María",
        "Santiago de María",
        "Tecapán")
    );
    

    $Estados = array(
        "Activo",
        "Inactivo",
        "Suspendido temporalmente",
        "Retirado",
        "Graduado"
    );

    $Carreras = array(
        "Ing. Industrial",
        "Ing. Aeronáutica ",
        "Ing. Mecatrónica",
        "Ing. Mecánica",
        "Ing. en Ciencias de la Computación",
        "Ing. Biomédica",
        "Ing. Agronómica",
        "Ing. Civil",
        "Ing. Química",
        "Ing. Eléctrica",
        "Ing. de Alimentos",
        "Ing. Telecomunicaciones",
        "Ing. Automatización ",
        "Ing. Electrónica",
        "Ing. Desarrollo de software",
        "Ing. Desarrollo de videojuegos",
        "Ing. Logística y distribución ",
        "Ing. de Negocios",
        "Doctorado en Medicina",
        "Doctorado en Cirugia Dental",
        "Lic. Laboratorio Clínico",
        "Lic. Anestesiología",
        "Lic. Radiología",
        "Lic. Nutrición",
        "Lic. Fisioterapia y Terapia ocupacional",
        "Lic. Enfermeria",
        "Lic. Salud Ambiental",
        "Lic. en Quimica y Farmacia",
        "Lic. Medicina veterinaria",
        "Lic. Arquitectura",
        "Lic. Arquitectura de interiores",
        "Lic. en Física",
        "Lic. en Matemática",
        "Lic. Biología",
        "Lic. Estadística",
        "Lic. Ciencias Jurídicas",
        "Lic. en Relaciones Internacionales",
        "Lic. Ortesis y prótesis",
        "Lic. en Administración de Empresas",
        "Lic. en Contauria publica",
        "Lic. Economía",
        "Lic. Mercadeo",
        "Lic. Psicología",
        "Lic. Sociología",
        "Lic. Filosofía",
        "Lic. en Teología",
        "Lic. Periodismo",
        "Lic. Letras",
        "Lic. Historia",
        "Lic. Educación",
        "Lic. Lenguas modernas",
        "Lic. en Idiomas",
        "Lic. en Turismo",
        "Lic. Comunicaciones",
        "Lic. en Diseño Gráfico",
        "Lic. en Diseño industrial",
        "Lic. en Artes plásticas",
        "Lic. en Marketing",
        "Lic. Relaciones públicas",
        "Tec. Multimedia",
        "Tec. Arquitectura",
        "Tec. Mantenimiento aeronáutico"

    );

    
    
    $Universidades = array(
        "U. Don Bosco",
        "U. de El Salvador",
        "U. Tecnológica",
        "U. Francisco Gavidia",
        "U. Andrés Bello",
        "U. Alberto Masferrer",
        "U. Modular Abierta",
        "U. Evangélica de El Salvador",
        "U. Dr. José Matías Delgado",
        "U. Pedagógica",
        "U. Centroamericana José Simeon Cañas",
        "U. Albert Einstein",
        "Escuela Superior de Economía y Negocios",
        "Escuela de comunicación Mónica Herrera",
        "ITCA-FEPADE"

    );
    $conn = mysqli_connect('localhost', 'root', '', 'db_jovesolides');
    if(mysqli_connect_errno()){
        echo'<script type="text/javascript">alert("Conexion fallida: '.mysqli_connect_error().'");</script>';
    }
    else{
        echo'<script type="text/javascript">alert("Conexion establecida, se ingresarán los datos necesarios.");</script>';
    }

     //Agregando Departamentos y Municipios
    $DepId = 1;
    foreach ($Municipios as $Depto => $Mun) {
        mysqli_query($conn, "INSERT INTO departamento VALUES('','$Depto')");
        echo "Los municipios en ".$Depto."Son :";
        echo "<br>";
        foreach ($Mun as $Nombre) {
            mysqli_query($conn, "INSERT INTO municipio VALUES ('', '$Nombre', $DepId)");
            echo $Nombre;
            echo "<br>";
        }
        echo "<br><br>";
        $DepId++;
    } 

    //Agregando Universidades

    foreach ($Universidades as $Nombre) {
        mysqli_query($conn, "INSERT INTO universidad VALUES ('', '$Nombre')");
        echo $Nombre;
        echo "<br>";
    }

    
    //Agregando estados

    foreach ($Estados as $Valor) {
        mysqli_query($conn, "INSERT INTO estado VALUES ('', '$Valor')");
        echo $Valor;
        echo "<br>";
    }

    //Agregando Carreras

    foreach ($Carreras as $value) {
        mysqli_query($conn, "INSERT INTO carrera VALUES('', '$value')");
        echo $value;
        echo "<br>";
    }

    mysqli_query($conn,"INSERT INTO sexo(Nombre) VALUES ('Hombre'),('Mujer')"); //agregando opciones de sexo

    /*  agregando usuario por defecto (master) 
        Usuario: jovesolides   Contraseña: admi     */
    mysqli_query($conn,"INSERT INTO usuario VALUES ('','jovesolides','jovesolides@gmail.com','admi')");
    
    echo'<script type="text/javascript">alert("Datos insertados correctamente.");</script>'; //todo se ingresó correctamente

?>