
CREATE TABLE Empleado (
  idEmpleado INT NOT NULL AUTO_INCREMENT,
  Cedula VARCHAR(45) NOT NULL,
  pNombre VARCHAR(45) NOT NULL,
  sNombre VARCHAR(45) NULL,
  pApellido VARCHAR(45) NOT NULL,
  sApellido VARCHAR(45) NULL,
  Fecha_nacimiento VARCHAR(45) NULL,
  Direccion VARCHAR(45) NULL,
  Genero VARCHAR(45) NULL,
  Cargo VARCHAR(45) NOT NULL,
  PRIMARY KEY (idEmpleado))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Usuario
-- -----------------------------------------------------
CREATE TABLE Usuario (
  id_usuario INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(45) NULL,
  contraseña VARCHAR(45) NULL,
  Empleado_idEmpleado INT NOT NULL,
  PRIMARY KEY (id_usuario),
    FOREIGN KEY (Empleado_idEmpleado)
    REFERENCES Empleado (idEmpleado))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Cliente
-- -----------------------------------------------------
CREATE TABLE Cliente (
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
CREATE TABLE Equipo (
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
-- Table Inventario
-- -----------------------------------------------------
CREATE TABLE Inventario (
  idInventario INT NOT NULL,
  nombre_m VARCHAR(45) NOT NULL,
  valor_m DECIMAL(2) NOT NULL,
  categoria_m VARCHAR(45) NOT NULL,
  Cant_m VARCHAR(45) NULL,
  PRIMARY KEY (idInventario))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Compra
-- -----------------------------------------------------
CREATE TABLE Compra (
  idCompra INT NOT NULL AUTO_INCREMENT,
  Fecha_compra DATE NULL,
  cant_compra INT NULL,
  Empleado_idEmpleado INT NOT NULL,
  Inventario_idInventario INT NOT NULL,
  PRIMARY KEY (idCompra),
    FOREIGN KEY (Empleado_idEmpleado)
    REFERENCES Empleado (idEmpleado),
    FOREIGN KEY (Inventario_idInventario)
    REFERENCES Inventario (idInventario))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Rev_equipo
-- -----------------------------------------------------
CREATE TABLE Rev_equipo (
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
-- Table rev_ma
-- -----------------------------------------------------
CREATE TABLE rev_ma (
  idrev_ma INT NOT NULL,
  cant_usar VARCHAR(45) NOT NULL,
  Inventario_idInventario INT NOT NULL,
  Rev_equipo_idRev_equipo INT NOT NULL,
  PRIMARY KEY (idrev_ma),
    FOREIGN KEY (Inventario_idInventario)
    REFERENCES Inventario (idInventario),
    FOREIGN KEY (Rev_equipo_idRev_equipo)
    REFERENCES Rev_equipo (idRev_equipo))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Factura
-- -----------------------------------------------------
CREATE TABLE Factura (
  idFactura INT NOT NULL,
  fecha_e DATE NOT NULL,
  impuesto_m FLOAT NULL,
  impuesto_o FLOAT NULL,
  total DECIMAL(2) NULL,
  Rev_equipo_idRev_equipo INT NOT NULL,
  PRIMARY KEY (idFactura),
    FOREIGN KEY (Rev_equipo_idRev_equipo)
    REFERENCES Rev_equipo (idRev_equipo))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
