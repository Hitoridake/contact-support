Proyecto: CRUD Módulo Cliente - Contact Support


Autor: Johan Pérez


Instrucciones:
1. Colocar esta carpeta en htdocs de XAMPP
2. Crear la base de datos `contact_support_db`
3. Crear tabla Cliente con:

CREATE TABLE Cliente (
  ID_Cliente INT PRIMARY KEY AUTO_INCREMENT,
  Nombre VARCHAR(100),
  Correo VARCHAR(100),
  Telefono VARCHAR(20)
);

4. Acceder a http://localhost/contact_support/clientes/read.php para ver los registros
