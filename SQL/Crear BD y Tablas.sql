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