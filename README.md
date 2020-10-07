###### Obtener repositorio completo
```
git@github.com:robertostory/resb-iahorro.git
```

###### Actulizar el repositorio ante cualquier cambio
```
Composer update
```

###### Creamos la Base de datos
```
php artisan crearDatabase iahorro
```

###### Creamos las tablas y cargamos la informacion DEMO para la prueba.
```
php artisan migrate:fresh --seed
```
###### En caso de error al guardar algun registro limpiar la cache.
```
php artisan cache:clear
php artisan config:cache
```
###### Login para Obtención de Token

URL: http://localhost:8080/api/auth/login

Credenciales:
	email=user@user.com
	password=Admin1234

```
var axios = require('axios');

var config = {
  method: 'post',
  url: 'http://localhost:8080/api/auth/login?email=user@user.com&password=Admin1234',
  headers: { }
};

axios(config)
.then(function (response) {
  console.log(JSON.stringify(response.data));
})
.catch(function (error) {
  console.log(error);
});
```

###### Registro nuevo cliente

URL: http://localhost:8080/api/auth/create-cliente

Parametros:

	nombreApellido = Nombre y Apellido Cliente
	email = email@gmail.com (Valor Unico)
	telefono = 697390752
	ingresosNetos = (Numerico)
	cantidadSolicitada = (Numerico)
	horaComunicacion_from = formato(Y-m-d H:i:s)
	horaComunicacion_to = formato(Y-m-d H:i:s)

Header:
	
	Authorization = Bearer $token

```
var axios = require('axios');

var config = {
  method: 'post',
  url: 'http://localhost:8080/api/auth/create-cliente?nombreApellido=Roberto Story&email=roberto.story@gmail.com&telefono=697390752&ingresosNetos=100&cantidadSolicitada=50000&horaComunicacion_from=2020-10-09 18:50:12&horaComunicacion_to=2020-10-09 23:51:12',
  headers: { 
    'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODA4MFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYwMjA2ODc3NCwiZXhwIjoxNjAyMDcyMzc0LCJuYmYiOjE2MDIwNjg3NzQsImp0aSI6IkZyTm11b2hiejk3Q01IekMiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.20jK4TEICgSr9kGH7ovcsNi5UUtS6EIZUgk2ZwREwvQ'
  }
};

axios(config)
.then(function (response) {
  console.log(JSON.stringify(response.data));
})
.catch(function (error) {
  console.log(error);
});
```

###### Verificación Experto cliente

URL: http://localhost:8080/api/auth/registros/{id}

Parametro id= (Id del Experto registrado en Base de datos)

```
var axios = require('axios');

var config = {
  method: 'post',
  url: 'http://localhost:8080/api/auth/registros/11',
  headers: { 
    'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODA4MFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYwMjA2ODc3NCwiZXhwIjoxNjAyMDcyMzc0LCJuYmYiOjE2MDIwNjg3NzQsImp0aSI6IkZyTm11b2hiejk3Q01IekMiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.20jK4TEICgSr9kGH7ovcsNi5UUtS6EIZUgk2ZwREwvQ'
  }
};

axios(config)
.then(function (response) {
  console.log(JSON.stringify(response.data));
})
.catch(function (error) {
  console.log(error);
});

```