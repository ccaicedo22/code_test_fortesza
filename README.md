
# FORTESZA - API 
## Carlos Andres Balaguera Caicedo - FORTESZA

## Prueba realizada del 07/02/2023 al 13/02/2023
Bienvenido. Esta es la prueba técnica para validar mis conocimientos y fortalezas en el mundo del Backend utilizando laravel, demostrando así mi capacidad de arquitectura de codigo, patrones de diseño, clean code, normas SOLID, REST y demás para el mundo de FORTESZA.

# Contenido
* Modelo relacional de mi base de datos y procedimientos almacenados.
* Patron de diseño y arquitectura de la aplicación.
* Implementación de normas S.O.L.I.D
* Herramientas de desarrollo utilizadas.
* ¿Deseas probas la api en POSTMAN?
* Un poco sobre mí 😀

## MODELO RELACIONAL DE MI BASE DE DATOS Y PROCEDIMIENTOS ALMACENADOS
Para la base de datos llamada Code_Test_Fortesza tomé como referencia 3 tablas: una de datos llamada users , una de datos llamada messages, las cuales tiene una relación de uno a muchos y una ultima tabla llamada upload_file que es donde guardamos la informacion del archivo subido y los datos de los usuarios relacionados con el mensaje.

![Image text](https://github.com/ccaicedo22/code_test_fortesza/blob/solid_application/public/images/tablas.png)

Para crear las tablas, las relaciones y los procedimientos almacenados se debe ejecutar el comando:
##### php artisan migrate

Este comando también crea los procedimientos almacenados que tendrán interacción con las tablas ya mencionadas.
La tabla users funciona a través de un seeder, ejecutar el comando php artisan db:seed para llenar dicha tabla automaticamente.

# PATRÓN DE DISEÑO Y ARQUITECTURA DE LA APLICACIÓN
## Patrón de diseño:
Para la arquitectura se implementaron conceptos de patron repositorio para no depender de la arquitectura por defecto de laravel, la cual es MVC. Utilizando patron repositorio un mecanismo para encapsular el comportamiento de almacenamiento, obtención y búsqueda, de una forma similar a una colección de objetos (parecida a una lista o arreglo), centralizando responsabilidades a cada una de las clases, así siguiendo el principio de responsabilidad unica, que se implementa en dichas clases que cumplen más de una responsabilidad, como controladores, modelos de dominio, repositorios entre otros. Se implementaron normas REST para el API.
## Arquitectura:
El concepto de responsabilidad única se implementa en el patrón repositorio, causando que, por ejemplo, los controladores sólo tengan una responsabilidad y no adjuntar métodos por verbo http en un solo controlador.
linkedin
## IMPLEMENTACIÓN DE NORMAS S.O.L.I.D
Las normas SOLID son muy importantes para mantener un código limpio y bien estructurado por lo que, para este trabajo, se implementa 3 conceptos de dichas normas:

## RESPONSABILIDAD ÚNICA Y ABIERTO/CERRADO
Le decimos a las clases y a los métodos que solo deben cumplir una sola responsabilidad, con ello cerrando las puertas de entrada que puede tener una clase y así cerrando el acoplamiento, dejando el codigo mas mantenible.
## INVERSIÓN DE DEPENDENCIAS
Utilizamos la inversión de dependencias para formar una abstracción entre dos clases gracias al manejo de interfaces e implementando la inyección de dependencias. Desacoplamos nuestro código y así dejamos de depender de clases con funciones padre, por lo que hacer cambios a nivel de código será más óptimo en un futuro.

## ENDPOINTS
* Route::get('/show-messages') , Este endpoint nos permite obtener los mensajes enviados entre los usuarios. se le debe enviar datos de los usuarios:
{
    "user_id_send": 42,
    "user_id_receive": 43
}

ademas se mostran los mensajes paginados por bloques de 15 mensajes por pagina.

![Image text](https://github.com/ccaicedo22/code_test_fortesza/blob/solid_application/public/images/SHOW-MESSAGES.png)

* Route::post('/send-messages'), Este endpoint recibe los datos de los usuarios (usuario que envia y el usuario que recibe), recibe el mensaje que se envia, ademas de eso recibe archivos por si dentro del mensaje se envia algun documento relacionado con dicho mensaje .

ademas genera el guardado o registro en las tablas (messages,upload_file) por medio de unos procedimientos almacenados.

![Image text](https://github.com/ccaicedo22/code_test_fortesza/blob/solid_application/public/images/SEND-MESSAGES.png)

## HERRAMIENTAS DE DESARROLLO UTILIZADAS
* Laravel Framework v - 9.51.0 
* PHP 8.0.25 
* visual studio code
* postman
* xampp
* MySQL workbench
* Git
* GitHub

## ¿DESEAS PROBAR LA API EN POSTMAN?
Adjunto la coleccion de postman con la que realice pruebas que se encuentra en un drive para que puedan descargarla e importarla. 
https://drive.google.com/file/d/1MTDM0UCC2zgaxDUiJGybnCZJx6uXkKUA/view?usp=share_link

## SOBRE MÍ
Espero con ansias ser parte de FORTESZA, aportar mis conocimientos y aptitudes, como también tener la posibilidad de ser un pilar en el engranaje encargado del crecimiento de la empresa. Quiero fortalecerme como profesional y siento que FORTESZA es la oportunidad que necesito. Muchas gracias 😀
