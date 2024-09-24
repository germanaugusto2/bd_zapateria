# Sistema para una zapateria

## Modelo Entidad-Relacion

![modelo Entidad-Relacion](img/bd_zapateria.png " Modelo Entidad-Relacion")

## Modelo fisico de la BD

![modelo fisico](img/modelo_fisico.png "Modelo fisico de la BD")

## Tabla fabricante

![Tabla fabricante](img/Tabla_fabricante.png "Tabla fabricante")

## Tabla Articulo

![Tabla Articulo](img/tabla_articulo.png "Tabla Articulo")

## Consultas a la BD

1. Mostrar la lista de todos los datos de los fabricantes

`SELECT * FROM Fabricante;`

2. Mostrar la lista de nombres de los Fabricantes, ponendo un alias al nombre de la columna

`SELECT nombre_fabricante AS Fabricante FROM Fabricante;`

![Consulta 2](img/consulta_2.png "Consulta 2")

3. Mostrar los nombres de los productos

![Consulta 3](img/consulta_3.png "Consulta 3")

4. Obtener los nombres y los precios de los productos de la tienda.

`SELECT nombre_articulo AS Nombre, precio_articulo AS Precio FROM Articulo;`

![Consulta 4](img/consulta_4.png "Consulta 4")

5. Obtener los nombres de los articulos cuyo precio sea superior a 50000

`SELECT nombre_articulo FROM Articulo WHERE precio_articulo > 50000;`

![Consulta 5](img/consulta_5.png "Consulta 5")

6. Obtener el nombre de los articulos cuyo preco este entre 5000 y 40000 (ambos incluidos)

### Forma 1
`SELECT nombre_articulo FROM Articulo WHERE precio_articulo >= 5000 AND precio_articulo <= 40000;`

### Forma 2

`SELECT nombre_articulo FROM Articulo WHERE precio_articulo BETWEEN >= 5000 AND 40000;`

![Consulta 6](img/consulta_6.png "Consulta 6")
