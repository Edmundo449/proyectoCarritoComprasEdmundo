<div class="b8s-example">
    <nav class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand">INICIO</a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                
                <li class="active"><a href="#">VENTAS</a></li>
                <!-- ELEMENTOS INDIVIDUALES DEL MENÚ
                <li><a href="#">Cotizaciones</a></li>
                 -->
                 <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">INVENTARIOS<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="producto_agregar.php">AGREGAR NUEVOS PRODUCTOS</a></li>
                        <li><a href="#">REABASTECER INVENTARIO</a></li>
                        <li class="divider"></li>
                        <li><a href="#">DAR DE ALTA UN PRODUCTO</a></li>
						<li><a href="#">DAR DE BAJA UN PRODUCTO</a></li>
                    </ul>
                </li>
                 
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">CONSULTAS<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">INVENTARIO</a></li>
						<li><a href="#">PRODUCTOS ACTIVOS</a></li>
						<li><a href="#">VENTAS</a></li>
						<li><a href="#">PRODUCTOS NUEVOS</a></li>
                    </ul>
                </li>
            
            </ul>
            <form class="navbar-form navbar-left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar" />
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Login</a></li>
            </ul>
        </div>
    </nav>
</div>