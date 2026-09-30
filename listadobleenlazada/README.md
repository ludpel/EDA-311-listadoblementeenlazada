PROYECTO: LISTA DOBLEMENTE ENLAZADA EN PHP + MYSQL

Ejecución del proyecto

Copiar la carpeta del proyecto dentro de htdocs de XAMPP.

Iniciar Apache y MySQL desde XAMPP.

Abrir phpMyAdmin.

Crear o importar la base de datos base1.

--base1(1).sql  este archivo es la base de datos lo que se debe de hacer es crear la base de datos base1 y luego importar este archivo y auntomaticamente ya tendras la base de datos lista una vez hecho estas acciones si quieres borralo es mas preferible esta opcion ya que no es parte del codigo y capaz te genere errores

Verificar que exista la tabla productos.

Abrir el proyecto desde el navegador:

http://localhost/listadobleenlazada/

Qué hace el proyecto

Se conecta a la base de datos MySQL.

Lee los productos almacenados en la tabla productos.

Crea un objeto Nodo por cada producto.

Inserta los nodos en una ListaDoblementeEnlazada.

Cada nodo mantiene una referencia al nodo anterior y al siguiente.

Muestra visualmente los elementos de la lista doblemente enlazada.

Archivos principales

db.php: conexión con la base de datos.

Nodo.php: estructura de cada nodo.

ListaDoblementeEnlazada.php: administración de la lista.

tra4.php: consulta de los productos.

index.php: página principal y visualización del proyecto.

tare3h2.php: archivo perteneciente al proyecto.





