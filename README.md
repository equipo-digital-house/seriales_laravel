# seriales_laravel
Migración del proyecto a Laravel
Desarrollo de proyecto Seriales Pasos para trabajar con GIT Y Como colaborar en el proyecto.

- Paso 1. Crear una carpeta. Entrar con Git Bash a esa carpeta. Ejecutar "git clone + la ruta del repositorio". Entrar a la carpeta creada con Git Bash. Ejecutar "git init" para determinar que ese será nuestro master. Ejecutar "composer install" (puede ser "composer update" tb). Renombrar el archivo .env.example por .env.
- Paso 2. realizar un PULL, para bajar los ultimos commit que hay en remoto.
- Paso 3. al realizar el clone la carpeta que crearon traera todos los archivos que contiene nuestro master remoto.
- Paso 4. entra a la carpeta master (cd master) -chequear con un git status (deberian aparecer nuevos archivos a la carpeta).
- Paso 5. inicializa el git (git init), esto le dira que la carpeta master que será el repositorio master local
- Paso 6. Apunta el repositorio master local con el repositorio master remoto (git remote add origin https://github.com/equipo-digital-house/master.git)
- Paso 7. realiza el git config user.name "tuUserName" y el git config user.email "tuEmail@gmail.com" Ojo. estas credenciales son las que tuvimos que configurar en gitHub.
- Paso 8. En este punto se supone que deben modificar el archivo que les haya tocado codear y una vez que hayan hecho los cambios y esté probado en el localhost, debemos enviarlo al repositorio remoto. -para esto debemos volver a Git Bash y posicionarnos en nuestra carpeta master local e indicarle que vamos a agregar archivos para enviar al remoto (git add .) te agrega todos los archivos que hayan sufrido modificacion al stage. (los está preparando para poder empaquetarlos y despues enviarlos)
- Paso 9. realizar el commit el cual debe ir con un mensaje que indique las modificaciones que se efectuaron (git commit -m "cambios en pagina x "), esto lo que hace es empaquetar lo agregado mas el mensaje que será el commit de cambios.
- Paso 10. realizar un PULL, para bajar los ultimos commit que hay en remoto, antes de realizar un push.
- Paso 11. realizar el push para enviar a repositorio remoto nuestros cambios (git push origin master ) la primera vez que lo hagas te pedira tu password de gitHub, si todo sale bien te mostrara que ha enviado los archivos al repositorio master remoto. Puedes chequear lleno al sitio gitHub y comprobar que estan alli los archivos enviados. Despúes los pasos 7 al 9 se deberan realizar tantas veces hagamos cambios.
