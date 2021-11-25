CREATE DATABASE carritoCompras

/*TABLA DE CLIENTES FRECUENTES*/
CREATE TABLE `carritoCompras`.`clientesFrecuentes` (
  `cliente_id` INT NOT NULL AUTO_INCREMENT,
  `cliente_nombre` VARCHAR(100) NOT NULL DEFAULT 'nombre sin asignar',
  `cliente_sexo` VARCHAR(255) NULL DEFAULT 'direccion sin asignar',
  `cliente_telefono` VARCHAR(45) NULL DEFAULT 'telefono sin asignar',
  `cliente_celular` VARCHAR(45) NULL DEFAULT 'telefono sin asignar',
  `cliente_correo_e` VARCHAR(45) NULL DEFAULT 'email sin asignar',
  PRIMARY KEY (`cliente_id`),
  UNIQUE INDEX `cliente_id_UNIQUE` (`cliente_id` ASC));
  
ALTER TABLE `carritoCompras`.`clientesFrecuentes` 
ADD UNIQUE INDEX `cliente_nombre_UNIQUE` (`cliente_nombre` ASC);


/*TABLA DE MARCAS DE PRODUCTOS*/
CREATE TABLE `carritoCompras`.`marca` (
  `marca_id` INT NOT NULL AUTO_INCREMENT,
  `marca_nombre` VARCHAR(20) NULL,
  PRIMARY KEY (`marca_id`),
  UNIQUE INDEX `marca_id_UNIQUE` (`marca_id` ASC),
  UNIQUE INDEX `marca_nombre_UNIQUE` (`marca_nombre` ASC));


/*TABLA DE PRODUCTOS*/
CREATE TABLE `carritoCompras`.`productos` (
  `productos_id` INT NOT NULL AUTO_INCREMENT,
  `marca_id` INT NOT NULL,
  `productos_nombre` VARCHAR(255) NOT NULL,
  `productos_descripcion` VARCHAR(255) NULL,
  `productos_imagen` VARCHAR(255) NULL,
  PRIMARY KEY (`productos_id`),
  UNIQUE INDEX `productos_id_UNIQUE` (`productos_id` ASC),
  INDEX `fk_marca_id_idx` (`marca_id` ASC),
  CONSTRAINT `fk_marca_id`
    FOREIGN KEY (`marca_id`)
    REFERENCES `carritoCompras`.`marca` (`marca_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
	
	
/*TABLA SUCURSALES*/
CREATE TABLE `carritoCompras`.`sucursal_cliente` (
  `sucursal_id` INT NOT NULL AUTO_INCREMENT,
  `cliente_id` INT NOT NULL,
  `sucursal_nombre` VARCHAR(100) NOT NULL DEFAULT 'Sin asignar',
  `sucursal_direccion` VARCHAR(255) NULL DEFAULT 'Sin asignar',
  `sucursal_telefono` VARCHAR(45) NULL DEFAULT 'Sin asignar',
  `sucursal_celular` VARCHAR(45) NULL DEFAULT 'Sin asignar',
  `sucursal_correo` VARCHAR(45) NULL DEFAULT 'Sin asignar',
  PRIMARY KEY (`sucursal_id`),
  UNIQUE INDEX `sucursal_id_UNIQUE` (`sucursal_id` ASC),
  INDEX `cliente_id_idx` (`cliente_id` ASC),
  CONSTRAINT `fk_cliente_id`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `carritoCompras`.`clientesFrecuentes` (`cliente_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
	
	
/*TABLA CARRITO*/
CREATE TABLE `carritoCompras`.`carrito` (
  `venta_id` INT NOT NULL AUTO_INCREMENT,
  `productos_id` INT NOT NULL,
  `cantidad_producto` INT NOT NULL,
  `fecha_venta` DATE NOT NULL,
  `hora_venta` TIME NOT NULL,
  PRIMARY KEY (`venta_id`),
  UNIQUE INDEX `venta_id_UNIQUE` (`venta_id` ASC),
  INDEX `productos_id_idx` (`productos_id` ASC),
  CONSTRAINT `fk_productos_id`
    FOREIGN KEY (`productos_id`)
    REFERENCES `carritoCompras`.`productos` (`productos_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);