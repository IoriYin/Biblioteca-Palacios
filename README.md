Iniciamos con el desarrollo del esqueleto del Sistema Web de la "Biblioteca Palacios"

El sistema web de gestión de biblioteca fue desarrollado en PHP y MySQL, con diseño responsivo basado en HTML y CSS, y diseñado según el DER y mockups aprobados en PDF (Canvas) previamente.
Se utilizó Chat Gpt para corregir en el periodo temprano de programación, puliendo ciertas líneas de código y algunas funcionalidades anteriormente planteadas.
Torrez comenzó a testear cada versión y luego utilizo ChatGPT para facilitar el proceso y conseguir una Beta.

Durante el periodo de desarrollo se utilizaron las siguientes tecnologías:

En Backend se utilizó:
- PHP
- MySQL (XAMPP)
- phpMyAdmin (gestor de base de datos)
- Servidor Apache (XAMPP)
- Sesiones PHP (“$_SESSION”)
- Hash de contraseñas (“password_hash()”, “password_verify()”)

En Frontend se utilizó:
- HTML
- CSS
- Paleta de color: Verde (#2e7d32, #43a047), blanco y gris claro
- Distribución de interfaz:
  - Barra lateral vertical fija a la izquierda
  - Área de contenido adaptada a la derecha
  - Diseño limpio y estructurado, basado en el diseño del canvas.

Las Herramientas locales fueron:
- XAMPP (Apache, MySQL, PHP)
- phpMyAdmin
- Visual Studio Code

Aqui esta la lista de la estructura del sistema de forma simple:

-Login, se consiguió un sistema de autenticación de usuarios mediante correo, Torrez logró programarlo mediante un tutorial con un poco de asistencia de ChatGPT para pequeños inconvenientes en el proceso.

-Recuperación de contraseña, a través del correo designado, mismo caso que el anterior pero sin asistencia de ChatGPT.

-Reservas, aún en desarrollo pero con conceptos establecidos por los dos miembros del grupo, sería una base de datos de todas las solicitudes de libros, tanto con los libros solicitados pero no recogidos, como los libros recogidos en espera de ser devueltos.

-Usuarios, también aun en desarrollos y con conceptos establecidos, sería una base de datos con todos los usuarios integrados en el sistema, con un menú intuitivo para revisar historiales, poder banear o desbanear en el caso de entregar o no libros, o cualquier inconveniente que considere el administrador.

-Configuración, también aun en desarrollo, pero sin conceptos establecidos, aunque hay varias ideas en el papel, Feijóo y Torrez no consiguieron ponerse de acuerdo, por lo que quedará a futuro.

-Cerrar sesión, un proceso sencillo donde simplemente se retrocede al login, no es lo ideal  y puede ser mejorado a futuro, pero actualmente sirve para lo básico.

Aqui esta la lista de las tablas de la base de datos según el modelo relacional visto en el DER:

-Tabla “Usuario”, consiste en el DNI, número telefónico, nombre de usuario, correo y contraseña.
-Tabla “Libro”, consiste en el ISBN, el título, el autor, la editorial y el género.
-Tabla “Ejemplar”, consiste en el ISBN, el código de barra, el estado del ejemplar y la cantidad.
-Tabla “Préstamo”, consiste en el DNI, el código de barra, fecha de prestamo, fecha de devolución inicial y la fecha de devolución real.
-Tabla “Multa”, consiste en la ID de la multa, en la ID del préstamo, en el Monto y en la fecha de generación.
-Tabla “Reserva”, consiste en la ID de la reserva, el DNI, el ISBN, la fecha de reserva y la fecha disponible. 
-Tabla “Administrador”, consiste en el DNI y la contraseña.

Instalación:

1. Clonar o copiar el proyecto en “C:\xampp\htdocs\”
2. Importar la base de datos desde `phpMyAdmin` usando el script `biblioteca.sql`
3. Iniciar los servicios de Apache y MySQL desde XAMPP
4. Acceder desde “http://localhost/biblioteca_palacios/login.php”

Autores:

Emanuel Leonel Torrez Clavijo
Ian Gabriel Feijóo
Proyecto académico/documentado para gestión de biblioteca
