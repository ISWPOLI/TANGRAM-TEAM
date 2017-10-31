 -----------------------------------------------------
-- Schema randys
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema randys
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `randys` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema new_schema1
-- -----------------------------------------------------
USE `randys` ;

-- -----------------------------------------------------
-- Table `randys`.`TBL_ROL`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `randys`.`TBL_ROL` (
  `ID_ROL` INT NOT NULL AUTO_INCREMENT,
  `NOMBRE_ROL` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`ID_ROL`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `randys`.`TBL_ALIADOS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `randys`.`TBL_ALIADOS` (
  `ID_ALIADOS` INT NOT NULL AUTO_INCREMENT,
  `NOMBRE` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`ID_ALIADOS`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `randys`.`TBL_USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `randys`.`TBL_USUARIO` (
  `ID_USUARIO` INT NOT NULL AUTO_INCREMENT,
  `NOMBRE` VARCHAR(20) NOT NULL,
  `APELLIDO` VARCHAR(20) NOT NULL,
  `IDENTIFICACION` INT NOT NULL,
  `PASSWORD` VARCHAR(20) NOT NULL,
  `CELULAR` INT NOT NULL,
  `CORREO_ELECTRONICO` VARCHAR(33) NULL,
  `CODIGO_DE_BARRAS` VARCHAR(45) NULL,
  `ID_ROL` INT NOT NULL,
  `ID_ALIADOS` INT NOT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  INDEX `FK_ROL_USUARIO_idx` (`ID_ROL` ASC),
  INDEX `FK_ALIADOS_USUARIO_idx` (`ID_ALIADOS` ASC),
  CONSTRAINT `FK_ROL_USUARIO`
    FOREIGN KEY (`ID_ROL`)
    REFERENCES `randys`.`TBL_ROL` (`ID_ROL`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_ALIADOS_USUARIO`
    FOREIGN KEY (`ID_ALIADOS`)
    REFERENCES `randys`.`TBL_ALIADOS` (`ID_ALIADOS`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `randys`.`TBL_REGISTRO_LABORAL`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `randys`.`TBL_REGISTRO_LABORAL` (
  `ID_REGISTRO_LABORAL` INT NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` INT NOT NULL,
  `FECHA_HORA_LLEGADA` DATE NOT NULL,
  `FECHA_HORA_SALIDA` DATE NOT NULL,
  PRIMARY KEY (`ID_REGISTRO_LABORAL`),
  INDEX `FK_USUARIO_LABORAL_idx` (`ID_USUARIO` ASC),
  CONSTRAINT `FK_USUARIO_LABORAL`
    FOREIGN KEY (`ID_USUARIO`)
    REFERENCES `randys`.`TBL_USUARIO` (`ID_USUARIO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `randys`.`TBL_ESTADO_DOMICILIARIOS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `randys`.`TBL_ESTADO_DOMICILIARIOS` (
  `ID_ESTADO_DOMICILIARIOS` INT NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` INT NOT NULL,
  `DESCRIPCION_ESTADO` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`ID_ESTADO_DOMICILIARIOS`),
  INDEX `FK_USUARIO_DOMICILIARIO_idx` (`ID_USUARIO` ASC),
  CONSTRAINT `FK_USUARIO_DOMICILIARIO`
    FOREIGN KEY (`ID_USUARIO`)
    REFERENCES `randys`.`TBL_USUARIO` (`ID_USUARIO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `randys`.`TBL_RESTAURANTE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `randys`.`TBL_RESTAURANTE` (
  `ID_RESTAURANTE` INT NOT NULL AUTO_INCREMENT,
  `NOMBRE_SEDE` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`ID_RESTAURANTE`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `randys`.`TBL_ENVIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `randys`.`TBL_ENVIO` (
  `ID_ENVIO` INT NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` INT NOT NULL,
  `ID_RESTAURANTE` INT NOT NULL,
  `FECHA_HORA_LLEGADA` DATE NOT NULL,
  `FECHA_HORA_SALIDA` DATE NOT NULL,
  PRIMARY KEY (`ID_ENVIO`),
  INDEX `FK_USUARIOS_ENVIO_idx` (`ID_USUARIO` ASC),
  INDEX `ID_RESTAURANTE_idx` (`ID_RESTAURANTE` ASC),
  CONSTRAINT `FK_USUARIOS_ENVIO`
    FOREIGN KEY (`ID_USUARIO`)
    REFERENCES `randys`.`TBL_USUARIO` (`ID_USUARIO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ID_RESTAURANTE`
    FOREIGN KEY (`ID_RESTAURANTE`)
    REFERENCES `randys`.`TBL_RESTAURANTE` (`ID_RESTAURANTE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `randys`.`TBL_FACTURA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `randys`.`TBL_FACTURA` (
  `ID_FACTURA` INT NOT NULL AUTO_INCREMENT,
  `ID_RESTAURANTE` INT NOT NULL,
  `NUMERO_FACTURA` VARCHAR(20) NOT NULL,
  `ZONA` VARCHAR(20) NOT NULL,
  `FECHA_FACTUA` DATE,
  PRIMARY KEY (`ID_FACTURA`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `randys`.`TBL_ENVIOS_FACTURA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `randys`.`TBL_ENVIOS_FACTURA` (
  `ID_ENVIOS_FACTURA` INT NOT NULL AUTO_INCREMENT,
  `ID_ENVIO` INT NOT NULL,
  `ID_FACTURA` INT NOT NULL,
  PRIMARY KEY (`ID_ENVIOS_FACTURA`),
  INDEX `FK_FACTURAS_ENVIOS_idx` (`ID_FACTURA` ASC),
  INDEX `FK_ENVIOS_idx` (`ID_ENVIO` ASC),
  CONSTRAINT `FK_FACTURAS_ENVIOS`
    FOREIGN KEY (`ID_FACTURA`)
    REFERENCES `randys`.`TBL_FACTURA` (`ID_FACTURA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_ENVIOS`
    FOREIGN KEY (`ID_ENVIO`)
    REFERENCES `randys`.`TBL_ENVIO` (`ID_ENVIO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

