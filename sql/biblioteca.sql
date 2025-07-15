CREATE DATABASE IF NOT EXISTS biblioteca;
USE biblioteca;

-- Tabla Usuario
CREATE TABLE Usuario (
  DNI INT PRIMARY KEY,
  Nombre VARCHAR(100),
  Telefono INT,
  Correo VARCHAR(100),
  Clave VARCHAR(255)
);

-- Tabla Libro
CREATE TABLE Libro (
  ISBN INT PRIMARY KEY,
  Titulo VARCHAR(255),
  Autor VARCHAR(100),
  Editorial VARCHAR(100),
  Genero VARCHAR(50)
);

-- Tabla Ejemplar
CREATE TABLE Ejemplar (
  cod_barra INT PRIMARY KEY,
  ISBN INT,
  estado ENUM('Disponible', 'Prestado', 'Reservado'),
  Cantidad INT,
  FOREIGN KEY (ISBN) REFERENCES Libro(ISBN)
);

-- Tabla Prestamo
CREATE TABLE Prestamo (
  id_prestamo INT PRIMARY KEY AUTO_INCREMENT,
  DNI INT,
  cod_barra INT,
  fec_prestamo DATE,
  fec_dev_pre DATE,
  fec_dev_real DATE,
  FOREIGN KEY (DNI) REFERENCES Usuario(DNI),
  FOREIGN KEY (cod_barra) REFERENCES Ejemplar(cod_barra)
);

-- Tabla Multa
CREATE TABLE Multa (
  id_multa INT PRIMARY KEY AUTO_INCREMENT,
  id_prestamo INT,
  monto INT,
  fec_generacion DATE,
  FOREIGN KEY (id_prestamo) REFERENCES Prestamo(id_prestamo)
);

-- Tabla Reserva
CREATE TABLE Reserva (
  id_reserva INT PRIMARY KEY AUTO_INCREMENT,
  DNI INT,
  ISBN INT,
  fec_reserva DATE,
  fec_dispo DATE,
  FOREIGN KEY (DNI) REFERENCES Usuario(DNI),
  FOREIGN KEY (ISBN) REFERENCES Libro(ISBN)
);

-- Tabla Administrador
CREATE TABLE Administrador (
  DNI INT PRIMARY KEY,
  Clave VARCHAR(255),
  FOREIGN KEY (DNI) REFERENCES Usuario(DNI)
);
