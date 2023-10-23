## 👋 ¡Bienvenid@!

Este desafío fue resuelto por [Cristhian García](https://www.linkedin.com/in/crisgarlez/).

## 🔖 Contenido

- [¿De qué trata este proyecto?](#-¿de-qué-trata-este-proyecto)
- [¿Cómo configurar el entorno local?](#-¿cómo-configurar-el-entorno-local)
  - [Clonar el Repositorio](#-clonar-el-repositorio)
  - [Configurar el entorno local](#🧾-configurar-el-entorno-local)
  - [Usar Docker para levantar el entorno local](#-usar-docker-para-levantar-el-entorno-local)
- [Uso de la Aplicación](#-uso-de-la-aplicación)

---

## 🤔 ¿De qué trata este proyecto?

Desarrollador PHP Laravel: Prueba Tecnica.

## 💻 ¿Cómo configurar el entorno local?

Este proyecto utiliza Docker, por lo que puedes configurarlo siguiendo las siguientes instrucciones.

### 🔀 Clonar el Repositorio

Para clonar el repositorio desde GitHub, puedes seguir estas instrucciones:

1. Abre tu terminal o línea de comandos.

2. Navega al directorio donde deseas clonar el repositorio. Por ejemplo, si deseas clonarlo en tu carpeta "Documentos", puedes usar el siguiente comando:

   ```
   cd Documentos
   ```

3. Ejecuta el siguiente comando para clonar el repositorio:

   ```
   git clone https://github.com/crisgarlez/remoteandtalent-challenge.git
   ```

   Este comando iniciará el proceso de clonación y descargará los archivos del repositorio en tu directorio actual.

4. Espera a que se complete el proceso de clonación. Una vez finalizado, deberías ver un nuevo directorio llamado "remoteandtalent-challenge" en tu ubicación actual.

5. ¡Has clonado el repositorio con éxito! Ahora puedes navegar hasta el directorio clonado con el siguiente comando:

   ```
   cd remoteandtalent-challenge
   ```

### 🧾 Configurar el entorno local

**Nota:** Los archivos `.env` no se han versionado en el repositorio por razones de seguridad. Serán enviados por correo electrónico y deben colocarse en las siguientes rutas:

1. Backend:

   - Ruta del archivo `.env`: `remoteandtalent-challenge/backend/.env`

2. Frontend (Perfil de Usuario):
   - Ruta del archivo `.env`: `remoteandtalent-challenge/profile-front/.env`

### 🐳 Usar Docker para levantar el entorno local

Para crear imágenes de Docker para el repositorio utilizando el archivo docker-compose.yml proporcionado en la carpeta remoteandtalent-challenge, puedes seguir estas instrucciones:

1. Asegúrate de tener Docker y Docker Compose instalados en tu máquina. Puedes descargar e instalar Docker desde el sitio web oficial de Docker (https://www.docker.com/get-started), y Docker Compose suele estar incluido con Docker en la mayoría de las plataformas.

2. Abre tu terminal o línea de comandos.

3. Dentro del directorio "remoteandtalent-challenge", deberías encontrar un archivo "docker-compose.yml".

4. Ejecuta el siguiente comando para construir las imágenes de Docker definidas en el archivo "docker-compose.yml":

   ```bash
   docker-compose build
   ```

   Este comando leerá el archivo "docker-compose.yml" y construirá las imágenes de Docker necesarias especificadas en el archivo.

5. Espera a que se construyan las imágenes. El tiempo que lleva construirlas puede variar según la complejidad del proyecto y los recursos de tu máquina.

6. Una vez que las imágenes se hayan construido con éxito, puedes proceder a ejecutar los contenedores basados en las imágenes usando el comando "docker-compose up". Ejecuta el siguiente comando:

   ```bash
   docker-compose up
   ```

   Este comando iniciará los contenedores según las configuraciones especificadas en el archivo "docker-compose.yml".

   Nota: Si deseas ejecutar los contenedores en modo desacoplado (en segundo plano), puedes agregar la bandera "-d":

   ```bash
   docker-compose up -d
   ```

7. Los contenedores deberían estar en funcionamiento y puedes acceder a los servicios proporcionados por la aplicación.

## 🌐 Uso de la Aplicación

Puedes interactuar con la Aplicación localmente una vez que hayas levantado el entorno local siguiendo las instrucciones proporcionadas en la sección anterior.

```
http://localhost
```

A continuación, se mostrará un menú con las siguientes funcionalidades

### Página dinámica

Esta pantalla mostrará el profile con datos no especificados

```
http://localhost/profile
```

### Formulario de Datos

Esta pantalla mostrará un formulario con los datos del perfil, al enviar los datos, se generará una pantalla de éxito con un link que te redirecciona a la página de profile con los datos ingresados.

```
http://localhost/profile/form
```

Si los son ingresados por primera vez, se registraran en la BD.

Puedes conectarte a la BD con los siguientes parámetros

```
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=remoteandtalentdb
DB_USERNAME=remoteandtalentdb
DB_PASSWORD=remoteandtalentdb
```

### Simulador de email

En esta pantalla se mostrará un formulario con los siguientes campos:

- Destinatario:
- Asunto:
- Cuerpo del Correo:

Al enviar los datos, se mostrará una pantalla de éxito.

El backend se encargara de agregar un línea al Log de forma asincrónica con el mensaje:

```
Mensaje enviado al correo: xxx@xxx.xxx
```

### Página dinámica con ejemplos

Se trata de la misma página de perfil, pero con datos de ejemplo que se encuentra en la descripción del challenge

```
?nombre=Juan&apellidos=Perez&telefono=123456&correo=juan@ejemplo.co
m&imagen=https://www.google.com/images/branding/googlelogo/2x/googlel
ogo_color_272x92dp.png
```
