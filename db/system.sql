-- MySQL Script generated by MySQL Workbench
-- Fri Apr 15 21:22:51 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

-- -----------------------------------------------------
-- Schema system
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema system
-- -----------------------------------------------------

CREATE DATABASE s_system;
USE s_system;
-- -----------------------------------------------------
-- Table Empleado
-- -----------------------------------------------------


-- -----------------------------------------------------
-- Table Empleado
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Empleado (
  idEmpleado INT NOT NULL AUTO_INCREMENT,
  Cedula VARCHAR(45) NOT NULL,
  pNombre VARCHAR(45) NOT NULL,
  sNombre VARCHAR(45) NULL,
  pApellido VARCHAR(45) NOT NULL,
  sApellido VARCHAR(45) NULL,
  Fecha_nacimiento VARCHAR(45) NULL,
  Direccion VARCHAR(45) NULL,
  Genero VARCHAR(45) NULL,
  telefono VARCHAR(45) NOT NULL,
  Cargo VARCHAR(45) NOT NULL,
  PRIMARY KEY (idEmpleado))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Usuario
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Usuario (
  id_usuario INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(45) NOT NULL,
  contraseña VARCHAR(45) NOT NULL,
  Empleado_idEmpleado INT NOT NULL,
  PRIMARY KEY (id_usuario),
    FOREIGN KEY (Empleado_idEmpleado)
    REFERENCES Empleado (idEmpleado))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Cliente
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Cliente (
  idCliente INT NOT NULL,
  Nombre VARCHAR(45) NOT NULL,
  Apellido VARCHAR(45) NOT NULL,
  Direccion VARCHAR(45) NULL,
  Telefono VARCHAR(45) NOT NULL,
  Correo VARCHAR(45) NOT NULL,
  Empleado_idEmpleado INT NOT NULL,
  PRIMARY KEY (idCliente),
    FOREIGN KEY (Empleado_idEmpleado)
    REFERENCES Empleado (idEmpleado))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Equipo
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Equipo (
  idEquipo INT NOT NULL,
  nombre_e VARCHAR(45) NOT NULL,
  descripcion VARCHAR(80) NOT NULL,
  prev_diag VARCHAR(80) NOT NULL,
  fecha_ingre DATE NOT NULL,
  Cliente_idCliente INT NOT NULL,
  PRIMARY KEY (idEquipo),
    FOREIGN KEY (Cliente_idCliente)
    REFERENCES Cliente (idCliente))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Rev_equipo
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Rev_equipo (
  idRev_equipo INT NOT NULL AUTO_INCREMENT,
  fecha_rev DATE NOT NULL,
  descrip_rev VARCHAR(80) NOT NULL,
  descrip_reemp VARCHAR(100) NOT NULL,
  presupuesto FLOAT NOT NULL,
  Equipo_idEquipo INT NOT NULL,
  PRIMARY KEY (idRev_equipo),
    FOREIGN KEY (Equipo_idEquipo)
    REFERENCES Equipo (idEquipo))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Carta
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Carta (
  idCarta INT NOT NULL,
  fecha_e DATE NOT NULL,
  impuesto_m FLOAT NOT NULL,
  impuesto_o FLOAT NOT NULL,
  total DECIMAL(2) NOT NULL,
  Rev_equipo_idRev_equipo INT NOT NULL,
  PRIMARY KEY (idCarta),
    FOREIGN KEY (Rev_equipo_idRev_equipo)
    REFERENCES Rev_equipo (idRev_equipo))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Proveedores
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Proveedores (
  idProveedores INT NOT NULL,
  nombre_empre VARCHAR(45) NOT NULL,
  categoria VARCHAR(45) NOT NULL,
  direccion VARCHAR(45) NOT NULL,
  telefono VARCHAR(45) NOT NULL,
  Empleado_idEmpleado INT NOT NULL,
  PRIMARY KEY (idProveedores),
    FOREIGN KEY (Empleado_idEmpleado)
    REFERENCES Empleado (idEmpleado))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Lista
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Lista (
  idProducto INT NOT NULL,
  nombre_pieza VARCHAR(45) NOT NULL,
  precio FLOAT NOT NULL,
  PRIMARY KEY (idProducto))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Proveedores_has_Lista
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Proveedores_has_Lista (
  Proveedores_idProveedores INT NOT NULL,
  Lista_idProducto INT NOT NULL,
  PRIMARY KEY (Proveedores_idProveedores, Lista_idProducto),
    FOREIGN KEY (Proveedores_idProveedores)
    REFERENCES Proveedores (idProveedores),
    FOREIGN KEY (Lista_idProducto)
    REFERENCES Lista (idProducto))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;