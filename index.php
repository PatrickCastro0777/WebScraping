<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Busqueda de empleo</title>

</head>
    <body> 
        <header>
            <div class="titulo">
                <h1>Búsqueda de empleo</h1>
            </div>
        </header>  
    <br>
    <form method="POST" action="index.php">
    <div class="cuerpo">
        <div class="buscar">
            <input type="text" class="form-control" name="nombre-empleo" id="nombre-empleo" placeholder="Ingrese el nombre del empleo" required>
                <span>
                <input type="submit" value="Buscar" name="btn1" class="boton-buscar">
                <!--Filtro-->     
                    <select class="filtro" name="Filtrar" id="Filtro"> 
                         <option selected disabled>Filtrar</option>
                         <option value="1">Lugar</option>
                         <option value="2">Años</option>
                         <option value="3">Paga</option>
                    </select>
                    <button type="button"  class="Boton" onclick="filtrado()">Aceptar filtro</button>
                    <spam id="flt"></spam>  
                </span>
        </div>   
        <div class="contenedor-tabla">
        <table class="tabla">
            <thead>
                <tr > 
                    <th>Nombre_Empleo</th>
                    <th>Descripción</th>
                    <th>URL</th>
                </tr>
            </thead>
             <!--Buscador-->
            <?php
              include("coneccion.php"); 
              if(isset($_POST['btn1']))
              { 
               $nom = $_POST['nombre-empleo'];
               $filtro="where nombre_empleo like '%".$nom."%'";
              }
              else
              {
                  $filtro="Where IdEmpleo=0";
              }

              if(isset($_POST['btn2']))
              {    
                  $nom = $_POST['nombre-empleo'];
                  $lugar=$_POST['lugar-empleo'];
                  $filtro="where nombre_empleo like '%".$nom."%' and descripción like '%".$lugar."%' ";
                  #echo $lugar;
                  #echo $nom;   
              }
              
              if(isset($_POST['btn3']))
              {    
                  $nom = $_POST['nombre-empleo'];
                  $experiencia=$_POST['años-exp'];
                  $filtro="where nombre_empleo like '%".$nom."%' and descripción like '%".$experiencia."%' ";
                  #echo $experiencia;
                  #echo $nom;   
              }
              
              if(isset($_POST['btn4']))
              {    
                  $nom = $_POST['nombre-empleo'];
                  $salario=$_POST['salario'];
                  $filtro="where nombre_empleo like '%".$nom."%' and descripción like '%".$salario."%' ";
                  #echo $salario;
                  #echo $nom;   
              }   
                $resultado=mysqli_query($conexion,"select *from empleo $filtro");
                $row_cnt = $resultado->num_rows;
                if($row_cnt<=0)
                {
                    echo "Empleo no encontrado";
                }
                else
                {
                    echo"Empleos encontrados: ".$row_cnt;
                }   
                while($mostrar=mysqli_fetch_array($resultado))
                {           
            ?>  
                        <tbody> 
                            <tr>
                            <td><?php echo $mostrar['nombre_empleo'];?></td>
                            <td><?php echo $mostrar['descripción'];?></td>
                            <td><a href= "<?php echo $mostrar['url'];?>"><?php echo $mostrar['url'];?></a></td>
                            </tr>
                        </tbody>
    
            <?php
                }                   
                include("cerrar.php"); 
            ?>
        <!---->  
        </table>
        </div> 
    </div>
    <!-- Modulo de lugar-->
    <div id="forma-modal" class="modal">
        <div>
            <spam onclick="document.getElementById('forma-modal').style.display='none'" class="close" title="cerrar modal">&times;</spam>
        </div>
        <div class="contenedor">
            <h3>Seleccione un departamento</h3>
            <select class="LugarEmpleo" name="lugar-empleo" id="lugar-empleo">
            <?php 
            if($_POST['lugar-empleo']!='')
            {
             ?>
             <option value= "<?php echo $_POST["lugar-empleo"]; ?>"> <?php echo $_POST["lugar-empleo"]; ?> </option>  
            <?php
            }
            ?>     
                         <option selected disabled>Departamentos</option>
                         <option value="Alta Verapaz">Alta Verapaz</option>
                         <option value="Baja Verapaz">Baja Verapaz</option>
                         <option value="Chiquimula">Chiquimula</option>
                         <option value="Escuintla">Escuintla</option>
                         <option value="Guatemala">Guatemala</option>
                         <option value="Huehuetenango">Huehuetenango</option>
                         <option value="Izabal">Izabal</option>
                         <option value="Jalapa">Jalapa</option>
                         <option value="Petén">Petén</option>
                         <option value="El Progreso">El Progreso</option>
                         <option value="Chiquimula">Chiquimula</option>
                         <option value="Quetzaltenango">Quetzaltenango</option>
                         <option value="Quiché">Quiché</option>
                         <option value="Retalhuleu">Retalhuleu</option>
                         <option value="Sacatepéquez">Sacatepéquez</option>
                         <option value="San Marcos">San Marcos</option>
                         <option value="Santa Rosa">Santa Rosa</option>
                         <option value="Sololá">Sololá</option>
                         <option value="Suchitepéquez">Suchitepéquez</option>
                         <option value="Totonicapán">Totonicapán</option>
                         <option value="Zacapa">Zacapa</option>
            </select>
            <input type="submit" value="Aceptar" name="btn2" class="boton-lugar">
        </div>
    </div>
<!-- Modulo de añós-->
    <div id="modal-años" class="modal-años">
        <div>
            <spam onclick="document.getElementById('modal-años').style.display='none'" class="closeaños" title="cerrar modal-años">&times;</spam>
        </div>
        <div class="contenedoranos-años">
            <h3>Seleccione los años de experiencia</h3>
            <select class="AñosExperiencia" name="años-exp" id="años-exp">
            <?php 
            if($_POST['años-exp']!='')
            {
             ?>
             <option value= "<?php echo $_POST["años-exp"]; ?>"> <?php echo $_POST["años-exp"]; ?> </option>  
            <?php
            }
            ?>          
                         <option selected disabled>Años de experiencia</option>
                         <option value="Sin experiencia">0</option>
                         <option value="1 año">1</option>
                         <option value="2 años">2</option>
                         <option value="3 años">3</option>
                         <option value="4 años">4</option>
                         <option value="5 años">5</option>
            </select>
            <input type="submit" value="Aceptar" name="btn3" class="boton-años">
        </div>
    </div>
<!-- Modulo de paga-->
    <div id="modal-paga" class="modal-paga">
        <div>
            <spam onclick="document.getElementById('modal-paga').style.display='none'" class="closepaga" title="cerrar modal-paga">&times;</spam>
        </div>
        <div class="contenedoranos-paga">
            <h3>Ingrese el monto a buscar</h3>
            <input type ="text" class="salario-empleo" name="salario" placeholder="Ejemplo 2,000">
            <input type="submit" value="Aceptar" name="btn4" class="boton-salario">
        </div>
    </div>
    <script src="filtro.js"> </script>
</body>
</html>