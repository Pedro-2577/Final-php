DROP DATABASE IF EXISTS DW3_Mendez_Pedro_final;
CREATE DATABASE DW3_Mendez_Pedro_final;
USE DW3_Mendez_Pedro_final;


CREATE TABLE categorias( 
	IDC tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	CATEGORIA VARCHAR(45) UNIQUE NOT NULL
)ENGINE=innoDB;


CREATE TABLE sexos( 
	IDS tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	SEXO VARCHAR(12) UNIQUE NOT NULL 
)ENGINE=innoDB;

CREATE TABLE usuarios( 
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	NOMBRE VARCHAR(50),
	APELLIDO VARCHAR(100),
	EMAIL VARCHAR(100) NOT NULL UNIQUE,
	CLAVE VARCHAR(40) NOT NULL,
	NIVEL ENUM('admin','user'),
	FECHA_ALTA DATETIME,
	AVATAR VARCHAR(100),
	FKSEXO TINYINT(1) UNSIGNED,
	BANEO tinyint(1) UNSIGNED,
	FOREIGN KEY(FKSEXO) REFERENCES sexos(IDS) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=innoDB;

CREATE TABLE publicaciones( 
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	TITULO VARCHAR(100) NOT NULL,
	FECHA_ALTA DATETIME,
	CONTENIDO TEXT,
	FKAUTOR INT UNSIGNED,
	FKCATEGORIA TINYINT(2) UNSIGNED,
	FOREIGN KEY (FKCATEGORIA) REFERENCES categorias(IDC) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY (FKAUTOR) REFERENCES usuarios(ID) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=innoDB;

CREATE TABLE rel_pubg_user_comentario( 
	IDREL INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	FKPUBLICAION INT UNSIGNED,
	FKUSUARIO INT UNSIGNED,
	COMENTARIO TEXT,
	FECHA_ALTA DATETIME,

	FOREIGN KEY(FKPUBLICAION) REFERENCES publicaciones(ID) ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY(FKUSUARIO) REFERENCES usuarios(ID) ON DELETE SET NULL
)ENGINE=innoDB;


/* INSERCION DE DATOS */

INSERT INTO categorias (CATEGORIA)
VALUES ('Cocina'), ('Cine'), ('Videojuegos'), ('Anime'), ('Literatura'), ('Conspiraciones'), ('Programacion'), ('Turismo'), ('Animales'), ('Medicina'), ('Otros');

INSERT INTO sexos (SEXO)
VALUES ('masculino'), ('femenino'), ('Traba');

INSERT INTO usuarios (NOMBRE, APELLIDO, EMAIL, CLAVE, NIVEL, FKSEXO, FECHA_ALTA, BANEO, AVATAR)
VALUES 
	(NULL, NULL, 'german.rodriguez@davinci.edu.ar', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'admin', 1, NOW( ), 1, 'sin_img.jpg' ),
	(NULL, NULL, 'omar.toyos@davinci.edu.ar', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'admin',  NULL, NOW( ), 1, 'sin_img.jpg' ),
	('Gonzalo', 'Palummo', 'pal.gon@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user',  1, NOW( ), 1, 'sin_img.jpg' ),
	(NULL, NULL, 'valentin.el.fantasma.amigable@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user', 1, NOW( ), 1, 'sin_img.jpg' ),
	(NULL, NULL, 'k-mi.will@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user', 2, NOW( ), 1, 'sin_img.jpg' ),
	('Ari', NULL, 'ariel.maizel@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user', 1, NOW( ), 1, 'sin_img.jpg' ),
	('Marcia', 'Aguero', 'marci@email.com.ar', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user', 2, NOW( ), 1, 'sin_img.jpg' ),
	(NULL, NULL, 'pedromendezcaraban@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'admin', 1, NOW( ), 1, 'pedromendezcaraban@gmail.com.jpg' ),
	(NULL, NULL, 'lucho.cessano@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user', 1, NOW( ), 1, 'sin_img.jpg' ),
	('Flor', NULL, 'flower.maca@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user', 2, NOW( ), 1, 'sin_img.jpg' ),
	('Facu', 'Moises', 'elmesias@email.com.ar', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user', 1, NOW( ), 1, 'sin_img.jpg' ),
	(NULL, 'Tito Condori', 'tito.es.el.apellido@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user', 1, NOW( ), 1, 'sin_img.jpg' ),
	(NULL, NULL, 'salomon.chabube@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user', 1, NOW( ), 1, 'sin_img.jpg' ),
	(NULL, NULL, 'cristian.gimenez@email.com.ar', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user', 1, NOW( ), 1, 'sin_img.jpg' ),
	(NULL, NULL, 'rami.belco@email.com.ar', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user', 1, NOW( ), 1, 'sin_img.jpg' ),
	(NULL, NULL, 'juanma.romero@email.com.ar', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user', 1, NOW( ), 1, 'sin_img.jpg' );



INSERT INTO 
	publicaciones (	TITULO, FECHA_ALTA, CONTENIDO,	FKAUTOR, FKCATEGORIA)
VALUES
	('El triler de shadow of the colosus que a empezado a circular es muy mucho malo', '2018-06-17 15:12:07',' Aparentemente, Wander es un ex esclavo ingenioso que vagabundea en un pueblo, roba el caballo (Agro) del mal pueblo Chamán (Emon) y es golpeado. Afortunadamente, la hija de Emon y su salvaje sexy (Mono) se hacen amigos de él. Desafortunadamente, Emon en una furia de borracho arroja a Mono a la pared de un granero y le rompe el cuello. Realmente creo que esto es un insulto a los veteranos que amamos y veneramos esta gloriosa pieza de arte', 8, 3),
	('Peliculas nacionales recomendadas?', '2018-06-16 05:34:51', 'Que peliculas nacionales me recomendarian? No importa genero, año de estreno, actores, ni directores.', 4, 2),
	('Conspiraciones Argentinas', '2017-12-30 12:26:31', 'Cual fue la teoria de conspiracion argentina mas interesante/ rara que escucharon?', 4, 6),
	('Ghost in the shell (anime) en HOYTS.', NOW(), 'No estoy seguro si alguien tiro la data.
		Van a pasar la peli original (la creme de la creme IMHO) en el HOYTS.
		La entrada es por pre-venta.
		Incluso si sos ciego vale la pena ir. La OST es, en su completa duracion, orgasmica.', 10, 4);
	('¿Qué son los Lenguajes de Programación?', '2020-12-19 21:44:47', 'Con sus palabras por favor.Desde ya muchísimas gracias.', 14, 7),
	('Los libros de Harry potter', '2020-12-19 21:49:08', 'Hola, Harry Potter y Las Reliquias de la muerte, es el último de los libros de la saga de Harry Potter lo leí y me encanto. Harry tiene que enfrentar a su más grande adversario Voldemor, pues se va acabar la protección que le dejo su madre al morir ella. Sus amigos toman la poción multijugos para poder ayudar a que Harry escape, al fallar su plan. él, Hermione y Ron se van en busca de los oro cruxes para así poder vencer a los mortífagos y a Voldemor. Harry al enterarse la verdad de Snape lucha con más fuerza y cuando piensas que todo está acabado Harry resulta vencedor y la escuela de Hogwarts queda libre de todas las fuerzas del mal.
Este último libro fue increíble, la historia de algunos personajes da un giro inesperado. El final me pareció sorprendente y él como Neville toma un papel importante, me gustó mucho más. El final fue la cereza del pastel para una saga tan fantástica.', 8, 5),
	('Una guía para tu primer viaje a Salta', '2020-12-19 21:50:05', 'Salta se ha transformado en una de las puertas de entrada al noroeste argentino. Situada aproximadamente en el centro de esa región, muchos turistas optan por elegir la ciudad como base para luego hacer los recorridos hacia otras localidades cercanas. Por ello, en esta entrada te contamos qué datos necesitas para organizar tu viaje a Salta.La ciudad de Salta es una de las que mejor conectividad aérea tiene con otras ciudades argentinas. No sólo hay vuelos a Buenos Aires; también hay conexiones directas hacia Córdoba, Mendoza, Rosario e Iguazú, entre otras alternativas. 3 aerolíneas hacen vuelos de cabotaje. Aerolíneas Argentinas, LATAM Argentina y Andes. Entre todas brindan más de 10 vuelos diarios, y las frecuencias se incrementan en los meses de mayor demanda. Este aeropuerto es internacional ya que tiene varios vuelos hacia otros países. Por ejemplo, BOA la conecta con Santa Cruz de la Sierra en Bolivia, y LATAM con Lima. La amplia conectividad de este aeropuerto ha sido una de las claves para el desarrollo turístico de la zona.', 5, 8),
	('¿Esta bien devolver a un cachorro?', '2020-12-19 23:30:53', 'Hace poco fue mi cumpleaños y una de mis amigas, sin preguntarme, me regalo un cachorro.

Lo termine aceptando de pura culpa, además que pensé que cuidar a un cachorro iba a ser fácil, pero me termine equivocando.

Estoy constantemente ansiosa porque temo que le pase algo, siempre la estoy mirando para ver que no coma nada del piso y se atragante, y durante las noches no duermo por fijarme a cada rato que este bien. Todo esto me estresa bastante y me hace pensar que no soy lo suficientemente emocionalmente madura para cuidarla.

En estos 4 días que la tuve me encariñe bastante con ella, y aunque en estas situaciones es mejor pensar de manera racional más que emocional para lo mejor de ella, tengo miedo de que ella se haya encariñado conmigo y en el momento que tenga otro dueño/a le de depresión o se ponga muy triste.

¿Qué debería hacer?', 12, 9),


INSERT INTO
	rel_pubg_user_comentario (FKPUBLICAION, FKUSUARIO, FECHA_ALTA, COMENTARIO)
VALUES
	(1,3, NOW(), 'Dale Pedro dejate de boludear y hace el tp de german...'),
	(1,8, NOW(), '100% de acuerdo con lo que decis, por encima la hace sony la pelicula asi que nada bueno puede salir de ahi.'),
	(1,7, NOW(), 'Capo no viste la pelicula, dejate de joder y espera a que salga para criticarla.'),
	(3,14, NOW(), 'No la campora. Milagro sala era la que tenía las armas para hacer el golpe, por eso lo primero que hicieron apenas asumieron fue meterla en cana y ahora hay todo esta quilombo de por medio. Source : viejas de barrio norte.'),
	(4,11, NOW(), 'La mina que apareció prendida fuego en Puerto Madero después de lo de Nisman. Eso fue MUY loco y quedo en nada, nunca se volvio a hablar de eso. Turbio'),
	(3,4, NOW(), 'Lástima que sea un solo día y una sola función, en un horario bastante choto encima. Pero es mejor que nada. Envidia a quienes puedan ir a verla!'),
	(4,2, NOW(), 'Es la del 95 o la remasterizacion ultra pedorra del 2013 con el CGI trucho?'),
	(4,1, NOW(), 'Que hijos de puta.. 1 solo día 1 solo horario (si fuese más tarde podría llegar a "pasar")'),
	(4,14, NOW(), 'Podríamos organizar para ir no se, al del Abasto?'),
	(2,13, NOW(), 'Mingo y Anibal contra los fantasmas.'),
	(2,11, NOW(), 'Para variar un poco, recomiendo "Para vestir santos" de Leopoldo Torres Nilsson. De 1955, preciosa pelicula.');


