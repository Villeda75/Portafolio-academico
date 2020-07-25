<?php
    include('Conn.php');
    function LoginVal($Name, $Password){
        $result = mysqli_query(strConnection(), "SELECT usuario.usuario, usuario.contraseña FROM usuario where usuario.usuario = '$Name' and usuario.contraseña = '$Password'");
        if(mysqli_num_rows($result) == 1){
            return true;
        }
        else{
            return false;
        }
    }

    function GetLastId(string $Table, string $CampName)
    {
        $Result = mysqli_query(strConnection(), "SELECT ".$CampName." FROM ".$Table." ORDER BY ".$CampName." ASC");
        $id = 0;
        while ($table = mysqli_fetch_assoc($Result)) {
            $id = $table[$CampName];
        }
        return $id;
    }

    function InsertData(string $Table, array $Params, bool $alert){
        //Construyendo la cadena de consulta
        $query = "INSERT INTO $Table VALUES ('',";
        for ($i=0; $i < count($Params); $i++) { 
            if($i == count($Params)-1){
                if(is_numeric($Params[$i])){
                    $query.= $Params[$i];
                }
                else{
                    $query.= "'".$Params[$i]."'";
                }
            }
            else{
                if(is_numeric($Params[$i])){
                    $query.= $Params[$i].",";
                }
                else{
                    $query .= "'".$Params[$i]."',";
                }
            }
        }
        $query.=")";
        //echo'<script type="text/javascript">alert("'.$query.'");</script>';
        if(mysqli_query(strConnection(), $query)){
            if($alert == true){
                //echo'<script type="text/javascript">alert("'.$query.' Se ejecuto correctamente.");</script>';
                echo'<script type="text/javascript">alert("¡Registro guardado éxitosamente!");</script>';
            }
        }
        else{
            echo'<script type="text/javascript">alert("Error : '.$query.'");</script>';
        }
    }

    function ModifyData($Table, $ID, array $params)
    {
        switch ($Table) {
            case 'beca':
                $tab = mysqli_fetch_assoc(mysqli_query(strConnection(), "SELECT Id_Beca FROM becario where Id_becario = ".$ID));
                if(mysqli_query(strConnection(), "UPDATE beca SET Id_Patrocinador = ".$params[0].", Id_Estado = ".$params[1].", Fecha_Ingreso = ".$params[2].", Fecha_Egreso = ".$params[3]." where Id_Beca = ".$tab['Id_Beca'])){
                    echo'<script type="text/javascript">alert("Update '.$Table.' se ejecuto correctamente.");</script>';
                }
                break;
            case 'formacion_academica':
                $tab = mysqli_fetch_assoc(mysqli_query(strConnection(), "SELECT Id_estudio FROM becario where Id_becario = ".$ID));
                if(mysqli_query(strConnection(), "UPDATE formacion_academica SET Id_Universidad = ".$params[0].", Id_Carrera = ".$params[1].", Fecha_Grad = ".$params[2]." where Id_estudio = ".$tab['Id_estudio'])){
                    echo'<script type="text/javascript">alert("Update '.$Table.' se ejecuto correctamente.");</script>';
                }
                break;
            case 'trabajo':
                $tab = mysqli_fetch_assoc(mysqli_query(strConnection(), "SELECT Id_Trabajo FROM becario where Id_becario = ".$ID));
                if(mysqli_query(strConnection(), "UPDATE trabajo SET nombre = ".$params[0].", Id_Departamento = ".$params[1]." where Id_Trabajo = ".$tab['Id_Trabajo'])){
                    echo'<script type="text/javascript">alert("Update '.$Table.' se ejecuto correctamente.");</script>';
                }
                break;
            case 'becario':
                if(mysqli_query(strConnection(), "UPDATE becario SET Nombres = ".$params[0].", Apellidos = ".$params[1].", Id_Sexo = ".$params[2].", Correo = ".$params[3].", Telefono = ".$params[4].", Id_Departamento = ".$params[5].", Id_Municipio = ".$params[6]." where Id_Becario = ".$ID)){
                    echo'<script type="text/javascript">alert("Update '.$Table.' se ejecuto correctamente.");</script>';
                }
                break;
        }
    }

    function DeleteScholar($ID)
    {
        if(mysqli_query(strConnection(), "DELETE FROM expediente WHERE Id_becario = ".$ID))
        {
            echo'<script type="text/javascript">alert("Ejecutado correctamente.");</script>';
        }
    }

    function ExtractTablesView(string $Table, array $params){
        $query = "SELECT ";
        for ($i=0; $i < count($params); $i++) {
            if($i == count($params)-1){
                $query .= $params[$i]." ";
            }
            else{
                $query .= $params[$i].", ";
            }
        }
        $query .= "FROM ".$Table;
        $Result = mysqli_query(strConnection(), $query);
        while ($table = mysqli_fetch_assoc($Result)) {
            echo '<tr><th scope="row">'.$table[$params[0]].'</th>';
            echo '<td>'.$table[$params[1]].'</td></tr>';
        }
    }

    //----- Funciones para becario.php y expedientes.php -----

    function ExtractRecordsTableView(){
        $query = "SELECT becario.Id_Becario as 'ID', concat(becario.Nombres, ' ', becario.Apellidos) as 'Becario', departamento.Nombre as 'Departamento', universidad.Nombre as 'Universidad' FROM becario INNER JOIN departamento INNER JOIN formacion_academica INNER JOIN universidad on becario.Id_Departamento = departamento.Id_Departamento and becario.Id_estudio = formacion_academica.Id_estudio and formacion_academica.Id_Universidad = universidad.Id_Universidad";
        $results = mysqli_query(strConnection(), $query);
        while ($table = mysqli_fetch_assoc($results)) {
            echo '<tr><th scope="row">'.$table['ID'].'</th>';
            echo '<td>'.$table['Becario'].'</td>';
            echo '<td>'.$table['Departamento'].'</td>';
            echo '<td>'.$table['Universidad'].'</th>';
            echo '<td><a href="becario.php?Bec='.$table['ID'].'" name="View">>></a></td></tr>';
        }
    }

    function ExtractElements(string $Table, array $param){
        $query = "SELECT ".$param[0].", ".$param[1]." FROM ".$Table." order by ".$param[1];
        $res = mysqli_query(strConnection(), $query);
        //echo'<script type="text/javascript">alert("'.$query.' Se ejecuto correctamente.");</script>';
        while ($tab = mysqli_fetch_assoc($res)) {
            echo '<option value="'.$tab[$param[0]].'">'.$tab[$param[1]].'</option>';
        }
    }

    function LoadScholarView($ID)
    {
        $ResScholar = mysqli_query(strConnection(), "SELECT * FROM becario where Id_Becario = ".$ID);
        $TableScholar = mysqli_fetch_assoc($ResScholar);
        $ResTraining = mysqli_query(strConnection(), "SELECT * FROM formacion_academica where Id_estudio = ".$TableScholar['Id_estudio']);
        $TableTaining = mysqli_fetch_assoc($ResTraining);
        $ResShip = mysqli_query(strConnection(), "SELECT * FROM beca WHERE Id_Beca = ".$TableScholar['Id_Beca']);
        $TableShip = mysqli_fetch_assoc($ResShip);
        $ResWork = mysqli_query(strConnection(), "SELECT * FROM trabajo WHERE Id_Trabajo = ".$TableScholar['Id_Trabajo']);
        $TableWork = mysqli_fetch_assoc($ResWork);
        echo '<div class="form-group" >
                    <label>Nombres y Apellidos:</label><br>
                    <input type="text" required class="form-control mr-4 float-left border-secondary" id="nombre" name="Name"  minlength="1" pattern="[a-zA-z][[:space:]]" required maxlength="30" value="'.$TableScholar['Nombres'].'" style= "width:190px;">
                    <input type="text" required class="form-control mr-4 float-none border-secondary" id="apellido" name="LastName" minlength="1" pattern="[a-zA-z][[:space:]]" required  maxlength="30" value="'.$TableScholar['Apellidos'].'" style= "width:190px;">
                  </div>
                  <div class="form-group">
                    <label for="correo">Correo y Telefono:</label><br>
                    <input required type="email" class="form-control mr-4 float-left border-secondary" name="Mail" id="correo" value="'.$TableScholar['Correo'].'" style= "width:235px;">
                    <input required type="numeric" class="form-control mr-4 float-none border-secondary" id="tel" name="Phone"  minlength="1" required maxlength="8" value="'.$TableScholar['Telefono'].'" style= "width:145px;">
                  </div>
                  <div class="form-group">
                    <label for="dep">Departamento y Municipio:</label><br>
                    <select required class="form-control mr-3 border border-secondary" id="dep" name="Dep" style="width: 195px; float:left">';
                        $ResDep = mysqli_query(strConnection(), "SELECT * FROM departamento");
                        while ($tab = mysqli_fetch_assoc($ResDep)) {
                            if ($tab['Id_Departamento'] == $TableScholar['Id_Departamento']) {
                                echo '<option value="'.$tab['Id_Departamento'].'" selected="true">'.$tab['Nombre'].'</option>';
                            }
                            else{
                                echo '<option value="'.$tab['Id_Departamento'].'">'.$tab['Nombre'].'</option>';
                            }
                        }
                    echo '</select>
                    <select required class="form-control ml-3 border border-secondary" id="seccion" name="Mun" style="width: 195px; float:none;">';
                        $ResMun = mysqli_query(strConnection(), "SELECT * FROM municipio ORDER BY Nombre");
                        while ($tab = mysqli_fetch_assoc($ResMun)) {
                            if ($tab['Id_Municipio'] == $TableScholar['Id_Municipio']) {
                                echo '<option value="'.$tab['Id_Municipio'].'" selected="true">'.$tab['Nombre'].'</option>';
                            }
                            else{
                                echo '<option value="'.$tab['Id_Municipio'].'">'.$tab['Nombre'].'</option>';
                            }
                        }
                    echo '</select>
                  </div>
                  <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-2 pt-0">Sexo:</legend>
                      <div class="col-sm-1">
                        <select required class="form-control ml-3 border border-secondary" id="seccion" name="Sex" style="width: 195px; float:none;">';
                        $ResSex = mysqli_query(strConnection(), "SELECT * FROM sexo ORDER BY Nombre");
                        while ($tab = mysqli_fetch_assoc($ResSex)) {
                            if ($tab['Id_Sexo'] == $TableScholar['Id_Sexo']) {
                                echo '<option value="'.$tab['Id_Sexo'].'" selected="true">'.$tab['Nombre'].'</option>';
                            }
                            else{
                                echo '<option value="'.$tab['Id_Sexo'].'">'.$tab['Nombre'].'</option>';
                            }
                        }
                        echo '</select>
                      </div>
                    </div>
                  </fieldset> 
                  <br>
                  <div class="form-group">
                    <label for="dep">Universidad y Carrera:</label>
                    <br>
                    <select required class="form-control mr-3 border border-secondary" id="university" name="U" style="width: 195px; float:left">';
                    $ResU = mysqli_query(strConnection(), "SELECT * FROM universidad ORDER BY Nombre");
                    while ($tab = mysqli_fetch_assoc($ResU)) {
                        if ($tab['Id_Universidad'] == $TableTaining['Id_Universidad']) {
                            echo '<option value="'.$tab['Id_Universidad'].'" selected="true">'.$tab['Nombre'].'</option>';
                        }
                        else{
                            echo '<option value="'.$tab['Id_Universidad'].'">'.$tab['Nombre'].'</option>';
                        }
                    }
                    echo '</select>
                    <select required class="form-control ml-3 border border-secondary" id="carrera" name="Career" style="width: 195px; float:none;">';
                    $ResCarrer = mysqli_query(strConnection(), "SELECT * FROM carrera ORDER BY Nombre");
                    while ($tab = mysqli_fetch_assoc($ResCarrer)) {
                        if ($tab['Id_Carrera'] == $TableTaining['Id_Carrera']) {
                            echo '<option value="'.$tab['Id_Carrera'].'" selected="true">'.$tab['Nombre'].'</option>';
                        }
                        else{
                            echo '<option value="'.$tab['Id_Carrera'].'">'.$tab['Nombre'].'</option>';
                        }
                    } 
                    echo '</select>
                  </div>
                  <div class="form-group">
                    <label for="beca">Estado de beca:</label><br>
                    <select required class="form-control mr-3 border border-secondary" id="beca" name="StateBec" style="width: 215px;">';
                    $ResState = mysqli_query(strConnection(), "SELECT * FROM estado ORDER BY Nombre");
                    while ($tab = mysqli_fetch_assoc($ResState)) {
                        if ($tab['Id_Estado'] == $TableShip['Id_Estado']) {
                            echo '<option value="'.$tab['Id_Estado'].'" selected="true">'.$tab['Nombre'].'</option>';
                        }
                        else{
                            echo '<option value="'.$tab['Id_Estado'].'">'.$tab['Nombre'].'</option>';
                        }
                    }
                    echo '</select>
                  </div>
              </div>
              <div class="col py-3 px-lg-5  bg-light" style="width: auto; height: auto;">
                <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
                    <div class="form-group">
                      <label for="beca">Patrocinador:</label>
                      <br>
                      <select required class="form-control mr-3 border border-secondary" id="patr" name="Sponsor" style="width: 215px;">';
                      $ResSponsor = mysqli_query(strConnection(), "SELECT * FROM patrocinador ORDER BY nombre");
                      while ($tab = mysqli_fetch_assoc($ResSponsor)) {
                          if ($tab['Id_Patrocinador'] == $TableShip['Id_Patrocinador']) {
                              echo '<option value="'.$tab['Id_Patrocinador'].'" selected="true">'.$tab['nombre'].'</option>';
                          }
                          else{
                              echo '<option value="'.$tab['Id_Patrocinador'].'">'.$tab['nombre'].'</option>';
                          }
                      }
                      echo '</select>
                    </div>
                    <div class="form-group">
                      <label for="">Fecha de ingreso a la RU</label>
                      <input required type="date" class="form-control border-secondary" id="dateIn" name="DateIn" value="'.$TableShip['Fecha_Ingreso'].'">
                    </div>
                    <div class="form-group">
                      <label for="">Fecha de egreso de la RU</label>
                      <input required type="date" class="form-control border-secondary" id="dateOut" name="DateOut" value="'.$TableShip['Fecha_Egreso'].'">
                    </div>
                    <div class="form-group">
                      <label for="">Fecha de graduación</label>
                      <input required type="date" class="form-control border-secondary" id="fechaGrad" name="Grad" value="'.$TableTaining['Fecha_Grad'].'">
                    </div>
                    <div class="form-group">
                      <label for="dep">Empresa y departamento donde labora:</label><br>
                      <input required type="text" class="form-control mr-3 float-left border-secondary" id="empresa" name="Company"  minlength="3" required maxlength="30" style= "width:195px;" value="'.$TableWork['nombre'].'">
                      <select required class="form-control mr-3 border border-secondary" id="carrera" name="DepCo" style="width: 195px; float:none;">';
                      $ResDepCo = mysqli_query(strConnection(), "SELECT * FROM departamento");
                      while ($tab = mysqli_fetch_assoc($ResDepCo)) {
                          if ($tab['Id_Departamento'] == $TableWork['Id_Departamento']) {
                              echo '<option value="'.$tab['Id_Departamento'].'" selected="true">'.$tab['Nombre'].'</option>';
                          }
                          else{
                              echo '<option value="'.$tab['Id_Departamento'].'">'.$tab['Nombre'].'</option>';
                          }
                      }
                      echo '</select>
                    </div>
                    <!--<div class="form-group">
                      <label for="nota">Observaciones:</label>
                      <textarea class="form-control" id="nota" rows="2"></textarea>
                    </div>-->';
    }
?>