 <form class="navbar-form navbar-right" method="post" action="validar_usuario.php">
  <select class="form-control" name="tipo_usuario" id="tipo_usuario">
   <option>Alumno</option>
   <option>Administrador</option>
   <option>Profesor</option>
   </select>
            <div class="form-group">
              <input type="text"  name="usuario" placeholder="Matrícula/Nómina" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="contraseña" placeholder="Contraseña" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Login</button>
          </form>