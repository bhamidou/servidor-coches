<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Login para el middleware


```json
{
    "DNI": "20A",
    "Nombre": "Test"
}
```

## Endpoints de API

A continuación se describen los endpoints de una API utilizando el framework de Laravel. Estos endpoints gestionan operaciones relacionadas con Coches, Personas, Propiedades y Alquileres, y requieren autenticación (middleware 'login').

## Coches

### Listar Coches

- **Método HTTP:** GET
- **Ruta:** `/car`
- **Controlador:** `Coche::class`
- **Método del Controlador:** `index`

### Mostrar un Coche por Matrícula

- **Método HTTP:** GET
- **Ruta:** `/car/{matricula}`
- **Controlador:** `Coche::class`
- **Método del Controlador:** `show`

### Crear un Coche

- **Método HTTP:** POST
- **Ruta:** `/car`
- **Controlador:** `Coche::class`
- **Método del Controlador:** `store`

### Actualizar un Coche por ID

- **Método HTTP:** PUT
- **Ruta:** `/car/{id}`
- **Controlador:** `Coche::class`
- **Método del Controlador:** `update`

### Eliminar un Coche por ID

- **Método HTTP:** DELETE
- **Ruta:** `/car/{id}`
- **Controlador:** `Coche::class`
- **Método del Controlador:** `destroy`

## Personas

### Listar Personas (Usuarios)

- **Método HTTP:** GET
- **Ruta:** `/users`
- **Controlador:** `Persona::class`
- **Método del Controlador:** `index`

### Mostrar una Persona (Usuario) por ID

- **Método HTTP:** GET
- **Ruta:** `/user/{id}`
- **Controlador:** `Persona::class`
- **Método del Controlador:** `show`

### Crear una Persona (Usuario)

- **Método HTTP:** POST
- **Ruta:** `/user`
- **Controlador:** `Persona::class`
- **Método del Controlador:** `store`

### Actualizar una Persona (Usuario) por ID

- **Método HTTP:** PUT
- **Ruta:** `/user/{id}`
- **Controlador:** `Persona::class`
- **Método del Controlador:** `update`

### Eliminar una Persona (Usuario) por ID

- **Método HTTP:** DELETE
- **Ruta:** `/user/{id}`
- **Controlador:** `Persona::class`
- **Método del Controlador:** `destroy`

## Propiedades

### Listar Propiedades

- **Método HTTP:** GET
- **Ruta:** `/properties`
- **Controlador:** `Propiedad::class`
- **Método del Controlador:** `index`

### Mostrar una Propiedad por ID

- **Método HTTP:** GET
- **Ruta:** `/property/{id}`
- **Controlador:** `Propiedad::class`
- **Método del Controlador:** `show`

### Crear una Propiedad

- **Método HTTP:** POST
- **Ruta:** `/property`
- **Controlador:** `Propiedad::class`
- **Método del Controlador:** `store`

### Actualizar una Propiedad por ID

- **Método HTTP:** PUT
- **Ruta:** `/property/{id}`
- **Controlador:** `Propiedad::class`
- **Método del Controlador:** `update`

### Eliminar una Propiedad por ID

- **Método HTTP:** DELETE
- **Ruta:** `/property/{id}`
- **Controlador:** `Propiedad::class`
- **Método del Controlador:** `destroy`

## Alquileres (Rent)

### Devolver un Coche Alquilado

- **Método HTTP:** GET
- **Ruta:** `/return-car`
- **Controlador:** `Rent::class`
- **Método del Controlador:** `returnRentedCar`

### Mostrar Alquileres

- **Método HTTP:** GET
- **Ruta:** `/rents`
- **Controlador:** `Rent::class`
- **Método del Controlador:** `show`

### Alquilar un Coche

- **Método HTTP:** POST
- **Ruta:** `/rent/{matricula}`
- **Controlador:** `Rent::class`
- **Método del Controlador:** `rentCar`

### Mostrar el Ranking

- **Método HTTP:** GET
- **Ruta:** `/ranking`
- **Controlador:** `Rent::class`
- **Método del Controlador:** `ranking`

Todos los endpoints requieren autenticación a través del middleware 'login' para acceder a ellos. Asegúrate de proporcionar las credenciales adecuadas al realizar solicitudes a estos endpoints.

Ten en cuenta que los parámetros como `{matricula}` e `{id}` deben ser reemplazados por los valores reales que desees utilizar en tus solicitudes.




## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
