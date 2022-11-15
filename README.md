Segunda entrega del trabajo práctico de Web II. 

Se generó una API RESTfull de carácter pública para la Serie de televisón: La ley y el Orden: U.V.E. 

>Requerimiento:
Importar desde PHPMyAdmin (o cualquiera otra) la base de datos: db_serie.sql

Se puede consumir por Postman con los siguientes endpoints:

# El endpoint de la API es (Para obtener todos los episodios):
http://localhost/proyectos/TPE-SegParte-Series/api/episodes

> Method = GET 
		URL = api/episodes 
		Code = 200

### Para obtener un episodio mediante el ID es:
http://localhost/proyectos/TPE-SegParte-Series/api/episodes/:ID

> Method = GET 
		URL = api/episodes/:ID 
	    Code = 200

### Para insertar un episodio es: 
http://localhost/proyectos/TPE-SegParte-Series/api/episodes

> Method = POST 
		URL = api/episodes 
		Code = 201
...
Insertar episodio con el siguiente formato:
    {
        "nameEpisode": "Payback",
        "Director": "Jean de Segonzac",
        "fk_id_Season": "1",
        "premiereYear": "1999"
    }
...

### Para eliminar un episodio mediante el ID es:
http://localhost/proyectos/TPE-SegParte-Series/api/episodes/:ID

> Method = DELETE 
		URL = api/episodes/:ID 
		Code = 200

#### Para ordenar en forma decreciente cada campo de la tabla (Agregar parámetros de consulta a las solicitudes GET):
http://localhost/proyectos/TPE-SegParte-Series/api/episodes?sort=field&order=DESC

>Ejemplos:
    http://localhost/proyectos/TPE-SegParte-Series/api/episodes?sort=nameEpisode&order=DESC
    http://localhost/proyectos/TPE-SegParte-Series/api/episodes?sort=premiereYear&order=DESC

#### Paginación (Agregar parámetros de consulta a las solicitudes GET): 
http://localhost/proyectos/TPE-SegParte-Series/api/episodes?size=number&page=number

>Ejemplos:
    http://localhost/proyectos/TPE-SegParte-Series/api/episodes?size=2&page=1
    http://localhost/proyectos/TPE-SegParte-Series/api/episodes?size=3&page=2

#### Filtro (Agregar parámetros de consulta a las solicitudes GET):
http://localhost/proyectos/TPE-SegParte-Series/api/episodes?filter=field&input=particularInformation

>Ejemplos:
    http://localhost/proyectos/TPE-SegParte-Series/api/episodes?filter=fk_id_Season&input=1
    http://localhost/proyectos/TPE-SegParte-Series/api/episodes?filter=premiereYear&input=2000
