
    <div class="wrapper">

      <header class="main-header" style="position: fixed; width:100%;-moz-box-shadow: 1px 1px 3px #212121;">

        <!-- Logo -->
        <a href="index.php" class="logo" style="background:#263238;">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>TCD</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Tu Clínica Dental</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation" style="background:#263238;">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"style="background:#263238; border-left: 1px solid #616161;">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu" style="border-left: 1px solid #616161; font-size: 17px;">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="nav-item dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height:50px;">
                  <i class="fa fa-user fa-lg"></i>&nbsp; <?php echo $_SESSION["usuario"]; ?>&nbsp;
                  <i class="fa fa-caret-down" aria-hidden="true" style="color: #b0bec5;"></i>&nbsp;&nbsp;&nbsp;
                </a>

            <div class="dropdown-menu" style="background: #ffffff;">
              <a class="dropdown-item" href="perfil.php" style="color: #000000; font-size: 17px; text-align: center; border: 1px">&nbsp;&nbsp;Mi Perfil <i class="fa fa-user"></i></a><br>
              <!-- <p style="text-align: left; color:#e0e0e0; ">__________________</p> -->
              <hr>
              <a class="dropdown-item" href="cerrarsesion.php" style="color: #000000; font-size: 17px; text-align: center; border: 1px">&nbsp;&nbsp;Cerrar Sesión <i class="fa fa-sign-out"></i></a>

            </div>
              </li>

            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="position: fixed;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"><i class="fa fa-laptop" style="margin-left: 50px; text-size:40px;"></i> SISTEMA WEB</li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>Pacientes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="nuevoPaciente.php"><i class="fa fa-circle-o"></i>Registro</a></li>
                <li><a href="listaPaciente.php"><i class="fa fa-circle-o"></i>Administración</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
			  	<i class="fa fa-calendar" aria-hidden="true"></i>
                <span>Citas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="nuevaCita.php"><i class="fa fa-circle-o"></i> Crear Cita</a></li>
                <li><a href="proveedor.php"><i class="fa fa-circle-o"></i> Todas las citas</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
			  	<i class="fa fa-file-text" aria-hidden="true"></i>
                <span>Reportes</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="caja.php"><i class="fa fa-circle-o"></i>Crear reporte</a></li>
                <li><a href="venta.php"><i class="fa fa-circle-o"></i>Reportes de cuentas</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
			  	<i class="fa fa-medkit" aria-hidden="true"></i>
                <span>Tratamientos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="caja.php"><i class="fa fa-circle-o"></i>Crear tratamiento</a></li>
                <li><a href="venta.php"><i class="fa fa-circle-o"></i>Administrar tratamientos</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Cuadro Clínico</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="ccnuevo.php"><i class="fa fa-circle-o"></i>Agregar</a></li>
                <li><a href="venta.php"><i class="fa fa-circle-o"></i>Administrar</a></li>
              </ul>
            </li>
            <?php// if ($_SESSION["rol"]==1 && $_SESSION["id"]!=1) { ?>
            <!-- <li>
              <a href="usuarios.php">
                <i class="fa fa-user-plus"></i> <span>Usuarios</span>
              </a>
            </li> -->
            <?php //} ?>
            <?php// if ($_SESSION["rol"]==1 && $_SESSION["id"]==1) { ?>
            <li>
				<a href="susuario.php">
					<i class="fa fa-users" aria-hidden="true"></i> 
					<span>Usuarios</span>
				</a>
            </li>
            <?php //} ?>
             <!--<li>
              <a href="inventario.php">
                <i class="fa fa-file-excel-o"></i> <span>Inventario</span>
              </a>
            </li>
            <li>
              <a href="listventas.php">
                <i class="fa fa-file"></i> <span>Reporte de Ventas</span>
              </a>
            </li>
            <li>
              <a href="rcompras.php">
                <i class="fa fa-file"></i> <span>Reporte de Ingresos</span>
              </a>
            </li>-->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

</div>
