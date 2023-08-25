<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Usuarie</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 offset-md-4">
                <form action="" method="post" class="modal-content animate">
                    
                    <div class="col-md-3 offset-md-4">
                      <img src="#" alt="Avatar" class="avatar">
                    </div>

                    <label for="dni" class ="form-label"><b>DNI</b></label>
                    <input type="int" id="dni" placeholder="DNI sin puntos" name="dni" required>

                    <label for="nombre" class ="form-label"><b>Nombre</b></label>
                    <input type="text" id="nombre" placeholder="Nombre como DNI" name="nombre" required>

                    <label for="nombre_autoperc" class ="form-label"><b>Nombre autopercibido</b></label>
                    <input type="text" id="nombre_autoperc" placeholder="Nombre autopercibido" name="nombre_autoperc">
           
                    <label for="apellido" class ="form-label"><b>Apellido</b></label>
                    <input type="text" id="apellido" placeholder="Apellido" name="apellido" required>

                    <label for="fecnac" class ="form-label"><b>Fecha de nacimiento</b></label>
                    <input type="date" id="fecnac" placeholder="(AAAA-MM-DD))" name="fecnac" required>
           
                    <label for="celContacto" class ="form-label"><b>Celular Contacto</b></label>
                    <input type="text" id="celContacto" placeholder="Sin 0 ni 15" name="celContacto" required>

                    <label for="id_institucion" class ="form-label"><b>Institución</b></label>
                    <select name="id_institucion" id="id_institucion" placeholder="Institución" required>
                        <?php foreach($instituciones as $institucion) : ?>
                            <option value="<?= $institucion->id_institucion ?>"><?= $institucion->nombre ?></option>
                        <?php endforeach; ?>
                    </select>
           
                    <button class="btn btn-primary" type="submit">Siguiente</button>
           
               </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>