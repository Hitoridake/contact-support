# Contact Support Dashboard

Sistema web para gestionar clientes, agentes, interacciones y bitácoras de soporte. Desarrollado con **HTML, PHP, MySQL, jQuery, Bootstrap y AdminLTE**.

---

## 📁 Estructura del Proyecto

```
├── dashboard.html
├── clientes.html
├── agentes.html
├── interacciones.html
├── bitacoras.html
├── dashboard/
│   └── charts/
│       ├── clientes.php
│       ├── agentes.php
│       ├── interacciones.php
│       ├── bitacoras.php
├── clientes/
│   ├── create.php
│   ├── read.php
│   ├── update.php
│   └── delete.php
├── agentes/
│   ├── create.php
│   ├── read.php
│   ├── update.php
│   └── delete.php
├── interacciones/
│   ├── create.php
│   ├── read.php
│   ├── update.php
│   └── delete.php
├── bitacoras/
│   ├── create.php
│   ├── read.php
│   ├── update.php
│   └── delete.php
├── dist/
│   └── css/
│   └── js/
│   └── img/
├── plugins/
│   └── chart.js/
│   └── bootstrap/
│   └── fontawesome/
└── db.php
```

---

## 🚀 Funcionalidades

### 👥 Módulo de Clientes
- CRUD completo usando formularios modales
- Validación de correos únicos para evitar duplicados

### 🎧 Módulo de Agentes
- Gestión completa de agentes con validación
- Se eliminó la relación con la tabla `plataforma` por ser innecesaria

### 💬 Módulo de Interacciones
- Cada interacción incluye:
  - Fecha de creación
  - Cliente y agente asignado
  - Descripción inicial
  - Fecha de última actualización
- Al crear una interacción, se genera automáticamente la primera entrada en la Bitácora

### 📓 Módulo de Bitácora
- Registra múltiples actualizaciones por interacción
- Cada entrada contiene:
  - Fecha del registro
  - Descripción del seguimiento
  - Relación con la interacción correspondiente

### 📊 Dashboard
- Tarjetas de resumen con conteos en tiempo real:
  - Clientes, Agentes, Interacciones y Bitácoras
- Gráficos dinámicos usando Chart.js:
  - Gráfico de líneas (mensual)
  - Gráfico circular (por categoría o fuente)
- Los datos se cargan desde la carpeta `dashboard/charts/`

---

## 🗃️ Esquema de Base de Datos (MySQL)

```sql
CREATE TABLE Cliente (
  ID_Cliente INT AUTO_INCREMENT PRIMARY KEY,
  Nombre VARCHAR(100) NOT NULL,
  Correo VARCHAR(100) UNIQUE NOT NULL,
  Telefono VARCHAR(20)
);

CREATE TABLE Agente (
  ID_Agente INT AUTO_INCREMENT PRIMARY KEY,
  Nombre VARCHAR(100) NOT NULL,
  Correo VARCHAR(100) UNIQUE NOT NULL,
  Telefono VARCHAR(20)
);

CREATE TABLE Interaccion (
  ID_Interaccion INT AUTO_INCREMENT PRIMARY KEY,
  ID_Cliente INT NOT NULL,
  ID_Agente INT NOT NULL,
  Fecha_Creacion DATE NOT NULL,
  Fecha_Ultima DATE,
  Descripcion_Inicial TEXT,
  FOREIGN KEY (ID_Cliente) REFERENCES Cliente(ID_Cliente),
  FOREIGN KEY (ID_Agente) REFERENCES Agente(ID_Agente)
);

CREATE TABLE Bitacora (
  ID_Bitacora INT AUTO_INCREMENT PRIMARY KEY,
  ID_Interaccion INT NOT NULL,
  Fecha DATE NOT NULL,
  Detalles TEXT,
  FOREIGN KEY (ID_Interaccion) REFERENCES Interaccion(ID_Interaccion)
);
```

---

## ⚙️ Instrucciones de Instalación

1. Clona o descarga el repositorio
2. Importa el esquema de base de datos en tu servidor MySQL
3. Configura el archivo `db.php` con tus credenciales de base de datos
4. Abre el proyecto en un servidor local (por ejemplo, XAMPP)
5. Accede a `dashboard.html` para comenzar

---

## 📌 Mejoras Futuras

- Autenticación de usuarios
- Filtros avanzados y búsqueda en tablas
- Exportación a PDF o CSV
- Notificaciones en tiempo real
- Fragmentación del layout con `includes` reutilizables

---

## 👨‍💻 Autor

**Johan Perez**  
Desarrollador y mantenedor del proyecto  
📫 ¡Se aceptan ideas, mejoras y sugerencias!
