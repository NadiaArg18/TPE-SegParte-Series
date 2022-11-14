
# Serie de televisón. El endpoint de la API en Postman es:
http://localhost/proyectos/TPE-SegParte-Series/api/episodes

## Para obtener todos los episodios es: método GET: 
http://localhost/proyectos/TPE-SegParte-Series/api/episodes

### Para obtener un episodio mediante el ID es: método GET:
http://localhost/proyectos/TPE-SegParte-Series/api/episodes/:ID

### Para insertar un episodio es: método POST: 
http://localhost/proyectos/TPE-SegParte-Series/api/episodes

### Para eliminar un episodio mediante el ID es: método DELETE:
http://localhost/proyectos/TPE-SegParte-Series/api/episodes/:ID

#### Para ordenar en forma decreciente cada campo de mi tabla: la URL del método GET seguido de:
"?sort=nameEpisode&order=DESC"
"?sort=Director&order=DESC"
"?sort=fk_id_Season&order=DESC"
"?sort=premiereYear&order=DESC"

#### Paginación: 
la URL del método GET seguido de: "?size=3&page=2"

#### Filtro: 
la URL del método GET seguido de: "?filter=nombreColumna&input=datoParticular"

