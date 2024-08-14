
-- Crear la base de datos
CREATE DATABASE bddanper;

-- Usar la base de datos recién creada
USE bdDanper;

CREATE TABLE Empleados (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(255),
    Cargo VARCHAR(255),
    DNI CHAR(8),
    FechaContratacion DATE
 
);

CREATE TABLE Parcelas (
    IDParcela INT PRIMARY KEY AUTO_INCREMENT,
    NombreParcela VARCHAR(255),
    Ubicacion VARCHAR(255),
    Tamano DECIMAL(10, 2) -- en m2
   
);

CREATE TABLE Cultivos (
    IDCultivo INT PRIMARY KEY AUTO_INCREMENT,
    NombreCultivo VARCHAR(255),
    FechaPlantacion DATE,
    IDParcela INT,
    FOREIGN KEY (IDParcela) REFERENCES Parcelas(IDParcela)
 
);

CREATE TABLE Plagas (
    IDPlaga INT PRIMARY KEY AUTO_INCREMENT,
    NombrePlaga VARCHAR(255),
    Descripcion TEXT
);

CREATE TABLE RegistroPlagas (
    IDRegistro INT PRIMARY KEY AUTO_INCREMENT,
    IDPlaga INT,
    IDCultivo INT,
    FechaDeteccion DATE,
    Severidad INT,
    FOREIGN KEY (IDPlaga) REFERENCES Plagas(IDPlaga),
    FOREIGN KEY (IDCultivo) REFERENCES Cultivos(IDCultivo)
);

CREATE TABLE Cosechas (
    IDCosecha INT PRIMARY KEY AUTO_INCREMENT,
    IDCultivo INT,
    FechaCosecha DATE,
    CantidadCosechada DECIMAL(10, 2),
    FOREIGN KEY (IDCultivo) REFERENCES Cultivos(IDCultivo)
 
);

CREATE TABLE Riegos (
    IDRiego INT PRIMARY KEY AUTO_INCREMENT,
    IDCultivo INT,
    FechaRiego DATE,
    Duracion INT,
    CantidadAguaUtilizada DECIMAL(10, 2),
    FOREIGN KEY (IDCultivo) REFERENCES Cultivos(IDCultivo)
 
);

CREATE TABLE TareasControlPlagas (
    IDTarea INT PRIMARY KEY AUTO_INCREMENT,
    IDPlaga INT,
    FechaInicio DATE,
    FechaFin DATE,
    Descripcion TEXT,
    boolean BIT DEFAULT 0,
    FOREIGN KEY (IDPlaga) REFERENCES Plagas(IDPlaga)
    
);

CREATE TABLE TareasGestionCultivos (
    IDTarea INT PRIMARY KEY AUTO_INCREMENT,
    IDCultivo INT,
    FechaInicio DATE,
    FechaFin DATE,
    Descripcion TEXT,
    Completada boolean DEFAULT 0,
    FOREIGN KEY (IDCultivo) REFERENCES Cultivos(IDCultivo)
    
);

CREATE TABLE TareasGestionCosechas (
    IDTarea INT PRIMARY KEY AUTO_INCREMENT,
    IDCosecha INT,
    FechaInicio DATE,
    FechaFin DATE,
    Descripcion TEXT,
    Completada boolean DEFAULT 0,
    FOREIGN KEY (IDCosecha) REFERENCES Cosechas(IDCosecha)
    
);


CREATE TABLE Recursos (
    IDRecurso INT PRIMARY KEY AUTO_INCREMENT,
    NombreRecurso VARCHAR(255),
    Descripcion TEXT
);


CREATE TABLE RecursosAsignadosCultivos (
    IDRecursoAsignado INT PRIMARY KEY AUTO_INCREMENT,
    IDCultivo INT,
    IDRecurso INT,
    CantidadUtilizada DECIMAL(10, 2),
    FOREIGN KEY (IDCultivo) REFERENCES Cultivos(IDCultivo),
    FOREIGN KEY (IDRecurso) REFERENCES Recursos(IDRecurso)

);


CREATE TABLE RecursosAsignadosCosechas (
    IDInventario INT PRIMARY KEY AUTO_INCREMENT,
    IDCosecha INT,
    IDRecurso INT,
    CantidadUtilizada DECIMAL(10, 2),
    FOREIGN KEY (IDCosecha) REFERENCES Cosechas(IDCosecha),
    FOREIGN KEY (IDRecurso) REFERENCES Recursos(IDRecurso)

);

-- Crear la tabla `users`
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  Rol VARCHAR(20),
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
);


-- Estructura de tabla para la tabla `password_resets`
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`email`)
);





INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Juan', 'admin@gmail.com', NULL, '$2y$10$05hO7Pij0NmJgPYAS0td9e2d8MJqFX.H8oCmF2mOpVcBkxQHhATBe', NULL, '2023-07-14 15:49:51', '2023-07-14 15:49:51');


