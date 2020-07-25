<?php
    class Usuario
    {
        public $id;
        public $Nombre;
        public $Password;
        

        public function __construct($_id, $Nombre, $Password)
        {
            $this->id = $_id;
            $this->Nombre = $Nombre;
            $this->Password = $Password;
        }
    }

    class Asociado
    {
        public $id;
        public $Nombre;
        public $Apellido;
        public $DUI;
        public $Estado;

        public function __construct($id, $nombre, $apellido, $dui, $estado)
        {
            $this->id = $id;
            $this->Nombre = $nombre;
            $this->Apellido = $apellido;
            $this->DUI = $dui;
            $this->Estado = $estado;
        }
    }

    class Becario
    {
        public $id_Becario;
        public $id_Estudio;
        public $id_Beca;
        public $id_Trabajo;
        public $Fotografia;
        public $Nombres;
        public $Apellidos;
        public $id_Sexo;
        public $Correo;
        public $Telefono;
        public $id_Departamento;
        public $id_Municipio;

        public function __construct($id, $estudio, $beca, $trabajo, $fotografia, $nombres, $apellidos, $sexo, $correo, $tel, $depto, $municipio)
        {
            $this->id_Becario = $id;
            $this->id_Estudio = $estudio;
            $this->id_Beca = $beca;
            $this->id_Trabajo = $trabajo;
            $this->Fotografia = $fotografia;
            $this->Nombres = $nombres;
            $this->Apellidos = $apellidos;
            $this->id_Sexo = $sexo;
            $this->Correo = $correo;
            $this->Telefono = $tel;
            $this->id_Departamento = $depto;
            $this->id_Municipio = $municipio;
        }
    }

    class FormacionAcademica
    {
        public $id_Estudio;
        public $id_Universidad;
        public $id_Carrera;
        public $Fecha_Grad;

        public function __construct($Id, $universidad, $carrera, $Graduacion)
        {
            $this->id_Estudio = $Id;
            $this->id_Universidad = $universidad;
            $this->id_Carrera = $carrera;
            $this->Fecha_Grad = $Graduacion;
        }
    }

    class Trabajo
    {
        public $id_Trabajo;
        public $Empresa;
        public $id_Departamento;
        //public $Asociado;
        //public $Desarrollo_Comunitario;

        public function __construct($iD, $empresa, $departamento)
        {
            $this->id_Trabajo = $iD;
            $this->Empresa = $empresa;
            $this->id_Departamento = $departamento;
            //$this->Asociado = $asociado;
            //$this->Desarrollo_Comunitario = $desarrollo;
        }
    }

    class Expediente
    {
        public $id_Expediente;
        public $id_Becario;

        public function __construct($ID_, $becario)
        {
            $this->id_Expediente = $ID_;
            $this->id_Becario = $becario;
        }
    }

    class Beca
    {
        public $id_Beca;
        public $id_Patrocinador;
        public $id_Estado;
        public $F_ingreso;
        public $F_egreso;

        public function __construct($id, $patrocinador, $estado, $ingreso, $egreso)
        {
            $this->id_Beca = $id;
            $this->id_Patrocinador = $patrocinador;
            $this->id_Estado = $estado;
            $this->F_ingreso = $ingreso;
            $this->F_egreso = $egreso;
        }
    }

    class Patrocinador
    {
        public $id_Patrocinador;
        public $Nombre;
        public $NIT;
        public $Direccion;

        public function __construct($id, $nombre, $nit, $dir)
        {
            $this->id_Patrocinador = $id;
            $this->Nombre = $nombre;
            $this->NIT = $nit;
            $this->Direccion = $dir;
        }
    }

    class Helpers
    {
        //Ingresa un nuevo usuario
        public static function addUser($id_, $name, $pass)
        {
            $newUser = new Usuario($id_, $name, $pass);
            LocalData::$Usuarios[] = $newUser;
        }

        //Ingresa un nuevo patrocinador
        public static function addSponsor($ID, $name, $_nit, $_dir)
        {
            $newSponsor = new Patrocinador($ID, $name, $_nit, $_dir);
            LocalData::$Patrocinadores[] = $newSponsor;
        }

        //Ingresa nuevo asociado
        public static function addAssociated($ID, $name, $lastname, $uid, $state)
        {
            $newAssociated = new Asociado($ID, $name, $lastname, $uid, $state);
            LocalData::$Asociados[] = $newAssociated;
        }

        public static function addScholarship($ID, $idsponsor, $idstate, $entry, $egress)
        {
            $newShip = new Beca($ID, $idsponsor, $idstate, $entry, $egress);
            LocalData::$Becas[] = $newShip;
        }

        public static function addAcadTraining($ID, $Uid, $idcareer, $graduaton)
        {
            $newTraining = new FormacionAcademica($ID, $Uid, $idcareer, $graduaton);
            LocalData::$FormacionesAcademicas[] = $newTraining;
        }

        public static function addWorks($ID, $company, $iddepartment)
        {
            $newWork = new Trabajo($ID, $company, $iddepartment);
            LocalData::$Trabajos[] = $newWork;
        }

        public static function addScholar($ID, $idTraining, $idShip, $idWork, $photo, $name, $lastn, $idsex, $mail, $num, $iddepto, $idmun)
        {
            $newScholar = new Becario($ID, $idTraining, $idShip, $idWork, $photo, $name, $lastn, $idsex, $mail, $num, $iddepto, $idmun);
            LocalData::$Becarios[] = $newScholar;
        }

        public static function addRepot($ID, $idbecario)
        {
            $newRepor = new Expediente($ID, $idbecario);
            LocalData::$Expedientes[] = $newRepor;
        }
    }

    class LocalData
    {
        public static $Usuarios = array(); //Default
        public static $Patrocinadores = array(); //Default
        public static $Asociados = array(); //Default
        public static $Becas = array(); //1
        public static $FormacionesAcademicas = array();//2
        public static $Trabajos = array(); //3
        public static $Becarios = array(); //4
        public static $Expedientes = array(); //5

        public static function LoadDefaultData()
        {
            //Usuarios
            $user = new Usuario(1, 'Admin', '123456');
            LocalData::$Usuarios[] = $user;
            $user = new Usuario(2, 'William Ovando', '123456');
            LocalData::$Usuarios[] = $user;
            $user = new Usuario(3, 'Josue Chacon', '123456');
            LocalData::$Usuarios[] = $user;
            $user = new Usuario(4, 'Chantell Alvarenga', '123456');
            LocalData::$Usuarios[] = $user;
            $user = new Usuario(5, 'Liliana Caceres', '123456');
            LocalData::$Usuarios[] = $user;

            //Patrocinadores
            $Pat = new Patrocinador(1, 'CAUCUS', '4785-963214-951-0', 'Somewhere');
            LocalData::$Patrocinadores[] = $Pat;
            $Pat = new Patrocinador(2, 'BANCAJA', '7412-753951-456-9', 'Somewhere');
            LocalData::$Patrocinadores[] = $Pat;
            $Pat = new Patrocinador(3, 'FKG', '8264-147963-312-8', 'Somewhere');
            LocalData::$Patrocinadores[] = $Pat;

            //Asociados
            $As = new Asociado(1, 'Ruth Veronica', 'Cubas de Ceron', '02536981-1', 'Activo');
            LocalData::$Asociados[] = $As;
            $As = new Asociado(2, 'Victor Manuel', 'Guardado Sandoval', '01457935-4', 'Inactivo');
            LocalData::$Asociados[] = $As;
            $As = new Asociado(3, 'Rosa Delmy', 'Rivera Villalobos', '39754801-2', 'Activo');
            LocalData::$Asociados[] = $As;

            //1 - Becas
            $bec = new Beca(1, 3, 3, '2018-06-06', '2022-04-20');
            LocalData::$Becas[] = $bec;
            $bec = new Beca(2, 2, 2, '2017-01-25', '2021-12-15');
            LocalData::$Becas[] = $bec;
            $bec = new Beca(3, 1, 1, '2020-02-09', '2024-11-16');
            LocalData::$Becas[] = $bec;

            //2 - Formaciones academicas
            $form = new FormacionAcademica(1, 1, 4, '2022-04-30');
            LocalData::$FormacionesAcademicas[] = $form;
            $form = new FormacionAcademica(2, 4, 1, '2021-12-25');
            LocalData::$FormacionesAcademicas[] = $form;
            $form = new FormacionAcademica(3, 3, 7, '2024-11-20');
            LocalData::$FormacionesAcademicas[] = $form;
            
            //3 - Trabajos
            $trab = new Trabajo(1, 'Siman', 10);
            LocalData::$Trabajos[] = $trab;
            $trab = new Trabajo(2, 'E4CC', 12);
            LocalData::$Trabajos[] = $trab;
            $trab = new Trabajo(3, 'Cinemark', 10);
            LocalData::$Trabajos[] = $trab;
            
            //4 - Becarios
            $becar = new Becario(1, 1, 1, 1, 'Photo', 'Emerson Alexis', 'Alfaro Chavez', 1, 'Alexis.Chavez@gmail.com', '7589-9510', 6, 97);
            LocalData::$Becarios[] = $becar;
            $becar = new Becario(2, 2, 2, 2, 'Photo', 'Gabriel Alejandro', 'Gonzales Lopez', 1, 'Gab.Gonz@outlook.com', '6801-5510', 1, 6);
            LocalData::$Becarios[] = $becar;
            $becar = new Becario(3, 3, 3, 3, 'Photo', 'Evelyn Alexandra', 'Martinez Gomez', 2, 'Ali.Mrtz@hotmail.com', '7100-0850', 10, 190);
            LocalData::$Becarios[] = $becar;

            //5 - Expedientes
            $exp = new Expediente(1,1);
            LocalData::$Expedientes[] = $exp;
            $exp = new Expediente(2,2);
            LocalData::$Expedientes[] = $exp;
            $exp = new Expediente(3,3);
            LocalData::$Expedientes[] = $exp;
        }

        public static $Sexos = array(
            "Hombre",
            "Mujer"
        );

        public static $Estados = array(
            "Activo",
            "Suspendido temporalmente",
            "Retirado",
            "Graduado"
        );

        public static $Carreras = array(
            "Ing. Industrial",
            "Ing. Mecatronica",
            "Ing. Mecanica",
            "Ing. en Ciencias de la Computacion",
            "Ing. Biomedica",
            "Lic. en Idiomas",
            "Lic. en Diseño Grafico",
            "Lic. en Relaciones Internacionales",
            "Lic. en Administracion de Empresas"
        );
        
        public static $Universidades = array(
            "U. Don Bosco",
            "U. Nacional de El Salvador",
            "U. Tecnologica",
            "U. Francisco Gavidia",
            "U. Andres Bello",
            "U. Alberto Masferrer",
            "U. Modular Abierta"
        );

        public static $Departamentos = array(
            "Ahuachapan",
            "Cabañas",
            "Chalatenango",
            "Cuscatlan",
            "La Libertad",
            "La Paz",
            "La Union",
            "Morazan",
            "San Miguel",
            "San Salvador",
            "San Vicente",
            "Santa Ana",
            "Sonsonate",
            "Usulutan"
        );

        public static $Municipios = array(
            /*Ahuachapan*/
            "Ciudad de Ahuachapan",
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
            "Turin",
            /*Cabanias*/
            "Sensuntepeque",
            "Cinquera",
            "Dolores",
            "Guacotecti",
            "Ilobasco",
            "Jutiapa",
            "San Isidro",
            "Tejutepeque",
            "Victoria",
            /*Chalatenango*/
            "Chalatenango",
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
            "Tejutla",
            /*Cuscatlan*/
            "Cojutepeque",
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
            "Tenancingo",
            /*La Libertad*/
            "Santa Tecla",
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
            "Zaragoza",
            /*La Paz*/
            "Cuyultitán",
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
            "Tapalhuaca",
            /*La Union*/
            "La Unión",
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
            "Yucuaiquín",
            /*Morazan*/
            "Arambala",
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
            "Yoloaiquín",
            /*San Miguel*/
            "Ciudad de San Miguel",
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
            "Uluazapa",
            /*San Salvador*/
            "San Salvador",
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
            "Tonacatepeque",
            /*San Vicente*/
            "San Vicente",
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
            "Verapaz",
            /*Santa Ana*/
            "Santa Ana",
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
            "Texistepeque",
            /*Sonsonate*/
            "Sonsonate",
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
            "Sonzacate",
            /*Usulutan*/
            "Usulután",
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
            "Tecapán"
        );
    }
?>