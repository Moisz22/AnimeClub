-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2021 a las 22:48:57
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `series_vistas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anime`
--

CREATE TABLE `anime` (
  `anime_id` int(11) NOT NULL,
  `anime_nombre` varchar(100) NOT NULL,
  `anime_sinopsis` text NOT NULL,
  `anime_actualidad` varchar(30) NOT NULL COMMENT 'terminado, en emision, etc',
  `anime_dia_capitulo_siguiente` varchar(10) DEFAULT NULL,
  `anime_estado_vista` varchar(50) NOT NULL COMMENT 'estado de la serie: pendiente, terminado o pendiente',
  `anime_estado` int(1) NOT NULL DEFAULT 1,
  `FechaRegistro` datetime NOT NULL DEFAULT current_timestamp(),
  `anime_imagen` varchar(250) DEFAULT NULL COMMENT '101x150 pixeles',
  `anime_banner` varchar(250) DEFAULT NULL,
  `anime_cantidad_capitulos` int(11) DEFAULT NULL,
  `anime_capitulo_terminado_ver` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anime`
--

INSERT INTO `anime` (`anime_id`, `anime_nombre`, `anime_sinopsis`, `anime_actualidad`, `anime_dia_capitulo_siguiente`, `anime_estado_vista`, `anime_estado`, `FechaRegistro`, `anime_imagen`, `anime_banner`, `anime_cantidad_capitulos`, `anime_capitulo_terminado_ver`) VALUES
(2, 'naruto shippuden', 'Pasados dos años y medio de entrenamiento con Jiraiya, Naruto Uzumaki regresa a la aldea oculta de la hoja, donde se reúne con sus viejos amigos y conforma de nuevo el Equipo 7. Debido a la ausencia de Sasuke, aparece un nuevo personaje llamado Sai el cual retoma su lugar. En esta secuela podremos notar como los compañeros de Naruto han madurado con respecto a su desempeño previo, mejorando la mayoría de estos en su nivel. Durante su entrenamiento con Jiraiya, Naruto aprendió a controlar un poco de la chacra del Kyubi. Lo contrario a la serie original, dónde sólo desempeñó un papel secundario, la organización Akatsuki asume el papel antagónico principal en Naruto Shippuden, buscando como objetivo principal el capturar a todos los poderosos monstruos Biju.', 'Terminado', NULL, 'terminado', 1, '2021-01-31 20:27:55', 'naruto shippuden-imagen.jpg', 'naruto_shippuden.jpg', 478, 478),
(3, 'akame ga kill', 'La historia nos lleva a través de las aventuras de Tatsumi, un joven boxeador que viajó a la capital imperial para unirse al ejército. Sin embargo, descubre que la ciudad está dañada por el ansia de poder de los funcionarios, que se aprovechan de la falta', 'Terminado', NULL, 'terminado', 1, '2021-01-31 20:27:55', 'akame ga kill-imagen.jpg', 'akame ga kill-banner.jpg', 24, 24),
(5, 'gakusen toshi asterisk', 'En el siglo pasado, la humanidad fue atacada por un desastre sin precedentes... el impacto “Invertia”. El mundo fue completamente destruido. Sin embargo, los humanos adquirieron un nuevo poder: el “Genestella”.', 'Terminado', '', 'terminado', 1, '2021-01-31 20:27:55', 'gakusen toshi asterisk-imagen.jpg', 'gakusen toshi asterisk-banner.jpg', 12, 12),
(9, 'Gotoubun no Hanayome', 'Fuutarou Uesugi es un estudiante de segundo año de preparatoria/instituto cuya familia siempre ha sido muy pobre. Un día recibe una suculenta oferta de trabajo como tutor a medio tiempo... ¡pero sus estudiantes resultan ser unas chicas de su propia clase! Para complicar más las cosas, son quintillizas... Las cinco hermanas son todas muy atractivas, pero no es lo único que tienen en común: todas odian estudiar y sus calificaciones siempre están al límite de la catástrofe. Tendrá que conseguir que las cinco estudien, pero primero tendrá que estudiar él cómo ganarse su confianza.', 'Terminado', NULL, 'terminado', 1, '2021-01-31 20:27:55', 'Gotoubun no Hanayome-imagen.jpg', 'Gotoubun no Hanayome-banner.jpg', 12, 12),
(10, 'Death Note', 'Light Yagami es un excelente estudiante japonés que ha tenido una vida aburrida. Esto cambia radicalmente cuando encuentra tirado en el suelo un cuaderno conocido como Death Note (Libreta de la Muerte), un cuaderno perdido por Ryuk, un Shinigami (Dios de la muerte). Cualquier humano cuyo nombre esté escrito en el cuaderno morirá, y ahora Light ha decidido utilizar este poder para crear un mundo perfecto sin criminales. Pero cuando los criminales comienzan a morir de forma masiva, las autoridades envían al legendario detective L en busca del asesino. Con L pisándole los talones, Podrá mantener Light su noble propósito incluso arriesgando su vida.', 'Terminado', NULL, 'terminado', 1, '2021-01-31 20:27:55', 'Death Note-imagen.jpg', 'Death Note-banner.jpg', 37, 37),
(12, 'Sword Art Online', 'Escapar es imposible hasta terminar el juego; un game over significaría una verdadera &quot;muerte&quot;. Sin saber la &quot;verdad&quot; de la siguiente generación del Multijugador Masivo Online, &#39;Sword Art Online(SAO)&#39;, con 10 mil usuarios unidos juntos abriendo las cortinas para esta cruel batalla a muerte. Participando solo en SAO, el protagonista Kirito ha aceptado inmediatamente la &quot;verdad&quot; de este MMO. Y, en el mundo del juego, un gigante castillo flotante llamado &#39;Aincrad&#39;, Kirito se distinguió a si mismo como un jugador solitario. Apuntando a terminar el juego al alcanzar la planta mas alta el solo continua avanzando arriesgadamente hasta que recibe una invitación a la fuerza de una guerrera y esgrimista experta, Asuna, con la cual tendra que hacer equipo.', 'Terminado', NULL, 'terminado', 1, '2021-01-31 20:27:55', 'Sword Art Online-imagen.jpg', 'Sword Art Online-banner.jpg', 25, 25),
(21, 'Boruto: Naruto Next Generations', 'Esta es una secuela de las series de Naruto, la cual sigue la historia de Boruto el hijo de Naruto. La aldea oculta de la hoja ha continuado su moderinización pero siempre manateniendo la paz. Carros eléctricos recorren toda la ciudad conectada por distritos llenos de rascacielos con enormes monitores mostrando todo tipo de imágenes. En esta era, la aldea oculta de la hoja es ahora una cuidad ninja solo en nombre ya que ahora muchas personas normales han venido a vivir aquí. También el estilo de vida de los ninjas ha cambiado... Boruto, el hijo del séptimo Hokage y el actual lider de la aldea, se ha matriculado en la academia ninja para aprender todo sobre lo que necesita saber en las artes ninjas. Los estudiantes que rodean a Boruto se refieren a él como &quot;el hijo del Hokage&quot;, pero Boruto con su peculiar personalidad se hará un nombre por él mismo. Boruto encontrá nuevos amigos y aliados, pero ¿cómo podrá lidear con todos esos misteriorsos incidentes que se le presentarán? Es así como comienza la historia de Boruto Uzumaki.', 'En emision', 'domingo', 'terminado', 1, '2021-01-31 20:27:55', 'Boruto  Naruto Next Generations-imagen.jpg', 'Boruto  Naruto Next Generations-banner.jpg', 184, 184),
(32, 'zero no tsukaima', 'La trama se desarrolla en un mundo donde existe la magia y existe algo de desigualdad social entre la gente que puede realizar magia y la que no, este mundo se asemeja mucho al mapa Europeo por la zona de Inglaterra, Francia, España, Alemania... en el mismo se aprecia que no existe tecnología sobresaliente más allá del siglo XIX. La gente se transporta a caballo, carrozas y en unos extraños barcos que vuelan.Hay seres mitológicos como duendes, elfos, dragones, ogros y por supuesto magos los cuales pueden manejar diferentes elementos (el fuego, el agua, el viento y la tierra). Nuestra protagonista es una maga de nombre Louise Françoise Le Blanc de La Vallière, también llamada por sus compañeros en la academia de magia &quot;Louise la Cero&quot;, debido a que ella no es capaz de realizar algún hechizo sin que pase algo.', 'Terminado', NULL, 'terminado', 1, '2021-01-31 20:27:55', 'zero no tsukaima-imagen.jpg', 'zero no tsukaima-banner.jpg', 13, 13),
(33, 'Zero no Tsukaima: Futatsuki no Kishi', 'Zero no Tsukaima: Futatski no Kishi, Continua exactamente donde termino la anterior temporada. Louise continúa siendo la Noble que trata a Saito como un animal, mientras el sigue siendo exactamente igual o peor. De hecho, la cosa parece empeorar desde que Saito parece tener comportamientos pervertidos con cualquier chica que ve excepto con Louise, y por esto ella se vuelve mas frustrada y celosa provocando momentos y situaciones con un extremo contenido cómico.', 'Terminado', NULL, 'terminado', 1, '2021-01-31 20:27:55', 'Zero no Tsukaima  Futatsuki no Kishi-imagen.jpg', 'Zero no Tsukaima  Futatsuki no Kishi-banner.jpg', 12, 12),
(34, 'Zero no Tsukaima: Princess no Rondo', 'Una historia cómica de 2 personajes principales, Louis y Saito. La aventura recomienza cuando Saito, quien habia luchado contra el ejercito de los 1000 hombres, regreso a la vida luego de una ardua batalla. Tras desconocer los detalles de su milagrosa resurreción la reina les encomienda una expedición para encontrar la misteriosa fuente de la vida. Al encontrarse con milagrosa fuente se descencadenan hechos que darán comienzo a una emocionante e ironica historia.', 'Terminado', '', 'terminado', 1, '2021-01-31 20:27:55', 'Zero no Tsukaima  Princess no Rondo-imagen.jpg', 'Zero no Tsukaima  Princess no Rondo-banner.jpg', 12, 12),
(35, 'Zero no Tsukaima: Final', 'Secuela de Zero no Tsukaima: Princess no Rondo, 4ª y última temporada del anime de Zero no Tsukaima. La historia se ambienta en un mundo donde existe la magia y existe cierta desigualdad social entre la gente que puede realizar magia y la que no. Nuestra protagonista: Louise Françoise Le Blanc de La Vallière, también llamada por sus compañeros en la academia de magia Louise la Zero, debido a que ella no es capaz de realizar algún hechizo sin que haya una explosión. En la academia existe un ritual mediante el cual todos convocan a su familiar (criatura que acompañara al mago y estará a su servicio durante el resto de su vida), y Louise convoca a Saito, un humano de la Tierra, siendo un gran alboroto porque nunca se había visto que alguien convocara a un plebeyo que no puede utilizar la magia, lo cual sorprende a todos ya que adquiere como familiar la habilidad de usar armas diestramente con solo tocarlas.', 'Terminado', NULL, 'terminado', 1, '2021-01-31 20:27:55', 'Zero no Tsukaima  Final-imagen.jpg', 'Zero no Tsukaima  Final-banner.jpg', 12, 12),
(36, 'Gakusen Toshi Asterisk: Temporada 2', 'Invertia, la catástrife astral que aniquiló muchas ciudades en el siglo XX, supuso también el nacimiento de una nueva raza de humanos con habilidades especiales: los Genestella. Al mismo tiempo, se encontró un elemento especial en el interior del meteoro, &quot;maná&quot;, que ayudó a que la humanidad diera un salto tecnológico. En Rikka, la ciudad académica sobre el agua, el &quot;Asterisk&quot; como muchos la llaman, estudiantes de seis escuelas se preparan para un torneo que se celebra anualmente y que enfrenta a los mejores estudiantes. Ayato Amagiri, de la Academia Seidoukan, se enfrentará al reto acompañado de Julis, la Bruja de las Llamas Resplandecientes.', 'Terminado', NULL, 'terminado', 1, '2021-01-31 20:27:55', 'Gakusen Toshi Asterisk Temporada 2-imagen.jpg', 'Gakusen Toshi Asterisk Temporada 2-banner.jpg', 12, 12),
(37, 'High School DxD', 'La historia está protagonizada por Issei Hyoudou, un muchacho de segundo año de instituto bastante salido al que una chica asesina en la primera cita de su vida. Issei se reencarna como demonio, y desde ese mismo día trabaja como sirviente de Riasu, una chica demonio de altísimo nivel que resulta ser la más guapa y popular de todo el instituto.', 'Terminado', NULL, 'terminado', 1, '2021-01-31 20:27:55', 'High School DxD-imagen.jpg', 'High School DxD-banner.jpg', 18, 18),
(38, 'high score girl', 'La historia sigue a Yaguchi Haruo, un muchacho de sexto en el año 1991 y que vive para los videojuegos. No es popular en la escuela, no es guapo, no es divertido y ni siquiera es simpático. Lo único que se le dan bien, son los videojuegos. Un día, en una sala de juegos, se encuentra a Oono Akira, compañera de clase y que es linda, inteligente, lista y popular. Ambos jugarán a Street Fighter II, solo para que Haruo pierda muchas partidas seguidas contra la chica, la cual resulta ser invencible en cualquier juego. Akira comenzará a seguir a Haruo en todas sus visitas a los recreativos para pegarle palizas en todo juego existente, algo que al muchacho molestará bastante en un inicio… pero que acabará haciendo que forjen una extraña amistad.', 'Terminado', NULL, 'terminado', 1, '2021-01-31 20:27:55', 'high score girl-imagen.jpg', 'high score girl-banner.jpg', 15, 15),
(49, 'Seikoku no Dragonar', 'Aprender a domar y montar dragones es algo sencillo para la mayoría de estudiantes de la academia Ansarivan Dragonar, a excepción de para Ash Blake de primero, chico que es conocido por sus compañeros por ser toda una fuente de problemas. Ash es el hazmerreír de la escuela, y es que aunque tiene una enorme estrella que le señala como un futuro señor de los dragones, no parece que tenga ninguna capacidad para serlo. De hecho, su dragón no ha aparecido nunca. Un día el dragón de Ash despierta y muestra todo su poder, aunque parece ser muy distinto de todos los dragones que se conocían hasta el momento, pues tiene la forma de una preciosa chica. Eso sí, no solo su aspecto es lo que está fuera de lo habitual, ya que su actitud es bastante particular: ella le dice que es la señora y él el sirviente. Al pobre Ash le salen los problemas de debajo de las piedras.', 'Terminado', NULL, 'terminado', 1, '2021-01-31 20:27:55', 'Seikoku no Dragonar-imagen.jpg', 'Seikoku no Dragonar-banner.png', 12, 12),
(50, 'Dragon Ball', 'Con Goku como protagonista principal de la historia, el argumento se centra en la búsqueda de las legendarias esferas del dragon, un total de siete que al ser reunidas daban lugar a la aparición del dragón sagrado que puede conceder cualquier deseo. Goku, con la ayuda de su compañera Bulma además de otros personajes que se irán uniendo con el paso de la historia, se adentrará en la búsqueda de las esferas del dragon y desafiará a todo tipo de villanos para convertirse en el hombre más fuerte del mundo. También se hará especial incapié al Budokai Tenkaichi, un gran Torneo Mundial de Artes Marciales en el que los mejores luchadores de todo el Mundo se darán cita, batiéndose en Duelo a fin de demostrar quien es el mas fuerte luchador sobre la Tierra.', 'Terminado', NULL, 'terminado', 1, '2021-01-31 20:27:55', 'Dragon Ball-imagen.jpg', 'Dragon Ball-banner.jpg', 153, 153),
(51, 'Dragon Ball Z', 'En Dragon ball Z Goku se ha convertido en un adulto y está casado con Milk, con la que tiene un hijo llamado Gohan. En esta segunda saga de Dragon ball Goku descubrirá que no es un terricola, sino que pertenece a una raza de guerreros conocida por ser una de las más poderosas de la galaxia, para posteriormente dar paso a los verdaderos enemigos de la serie. Para poder vencer a los nuevos enemigos que irán surgiendo, Goku y sus amigos tendrán que viajar por otros planetas e incluso al cielo y al infierno. Cada enemigo será más fuerte que el anterior, por lo que tendrán que entrenar muy duro para poder derrotarlos además de que se les irán uniendo nuevos personajes que les ayudarán a vencerlos.', 'Terminado', NULL, 'terminado', 1, '2021-01-31 20:27:55', 'Dragon Ball Z-imagen.png', 'Dragon Ball Z-banner.jpg', 291, 291),
(52, 'Dragon Ball GT', 'Ésta es la etapa final de Dragon Ball, aquí veremos a un Goku un poco más viejo acompañado de Oob, la reencarnación de Boo. Ahora Oob, después de un largo entrenamiento, se ha vuelto muy fuerte junto a Goku. Ahora un nuevo problema se le presenta a Goku, él ha sido convertido en niño por un viejo enemigo, con unas esferas de dragón nunca antes vistas, pero éstas no se esparcen por La Tierra, si no por la galaxia, además, si no encuentran las esferas en un determinado tiempo, La Tierra explotará. Esto llevará a Goku, Trunks y su nieta Pan, a una aventura por toda la galaxia.', 'Terminado', NULL, 'terminado', 1, '2021-01-31 20:27:55', 'Dragon Ball GT-imagen.jpg', 'Dragon Ball GT-banner.jpg', 64, 64),
(65, 'High School DxD Hero', 'Cuarta temporada de High School DxD.', 'Terminado', '', 'terminado', 1, '2021-01-31 20:27:55', 'High School DxD Hero-imagen.jpg', 'High School DxD Hero-banner.jpg', 13, 13),
(67, 'Darling in the FranXX', 'Los chicos sueñan con poder volar algún día por el infinito cielo, aunque son dolorosamente conscientes de cuán lejos está el cielo más allá del cristal que les impide salir volando. En un futuro distante la humanidad ha creado Plantation, una ciudad fortaleza móvil construida sobre las ruinas del mundo y en la que ha florecido la civilización. En la ciudad hay barracones especiales para pilotos llamados Mistilteinn, aunque popularmente se los conoce como &quot;jaulas de pájaros&quot;. Allí es donde viven estos chicos... sin saber nada del mundo exterior, sin poder sentir nunca el enorme cielo. Su única misión en la vida siempre fue luchar. Sus enemigos son los misteriosos organismos gigantes conocidos como Kyoryu, a los cuales enfrentan con los robots llamados FRANXX. No saben hacer otra cosa y no se lo plantean, pues creen que este es su propósito único en la vida. entre ellos está un niño al que en su día consideraron un niño prodigio: Código 016, Hiro. Sin embargo, ahora es un fracaso y se lo considera innecesario. Quienes no pueden pilotar un FRANXX es como si no existieran. Un día aparece ante Hiro una chica llamada Zero Two y de su cabeza surgen dos cuernos. &quot;Te encontré, cariño mío&quot;', 'Terminado', '', 'terminado', 1, '2021-01-31 20:27:55', 'Darling in the FranXX-imagen.jpg', 'Darling in the FranXX-banner.webp', 24, 24),
(72, 'High School DxD New', 'Segunda temporada de la serie High School DxD', 'Terminado', '', 'terminado', 1, '2021-01-31 20:27:55', 'High School DxD New-imagen.jpg', 'High School DxD New-banner.jpg', 13, 13),
(73, 'High School DxD BorN', 'La tercera temporada de la serie de televisión de anime High School DxD, High School DxD BorN, fue dirigida por Tetsuya Yanagisawa y producida por TNK.', 'Terminado', '', 'terminado', 1, '2021-01-31 20:27:55', 'High School DxD BorN-imagen.jpg', 'High School DxD BorN-banner.jpg', 12, 12),
(103, 'Gotoubun no Hanayome Temporada 2', 'Un día, el estudiante pobre de preparatoria Fuutarou Uesugi recibe un trabajo como tutor con una excelente paga. Una excelente oportunidad de hacer dinero, ¿no? ¡Pues resulta que su tutorada es su compañera de clases! ¡Y no sólo le enseñará a ella sino también a sus cuatro hermanas! ¡Sí! ¡Son quintillizas! Todas ellas son hermosas, pero a diferencia de sus apariencias, sus actitudes son completamente diferentes. ¿Podrá Fuutarou hacer que las quintillizas Nakano se gradúen con éxito de la preparatoria? ¿Se enamorará de alguna de ellas?', 'En emision', 'jueves', 'terminado', 1, '2021-02-16 14:55:35', 'Goto-imagen.jpg', 'Goto-banner.jpg', 6, 6),
(105, 'Seishun Buta Yarou wa Bunny Girl Senpai no Yume wo Minai', 'Síndrome de la pubertad: ciertas experiencias poco corrientes que se rumorea en Internet que son la causa del exceso de sensibilidad e inestabilidad durante la adolescencia. Este año, Sakuta Azusagawa, estudiante de segundo en una preparatoria cercana a Enoshima, conocerá a varias chicas que están pasando por ese &quot;síndrome de la pubertad&quot;. Por ejemplo, en la biblioteca conoce a una salvaje chica conejito que resulta ser Mai Sakurajima, una chica mayor de su preparatoria que es una actriz que está tomándose un descanso. ¿El problema? Que nadie parece poder ver a esa chica tan encantadora, ¿cómo es posible? Mientras Sakuta busca respuestas para ayudar a Mai comienzan a forjar un vínculo y terminará descubriendo los sentimientos que la chica oculta en su corazón... Una historia que se sale de lo habitual y que se desarrolla en una ciudad con un luminoso cielo y un brillante océano donde Sakuta conocerá a varias chicas de lo más misteriosas e intrigantes.', 'Terminado', '', 'proceso', 1, '2021-02-17 16:36:23', 'barbaro-imagen.jpg', 'barbaro-banner.png', 13, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anime_genero`
--

CREATE TABLE `anime_genero` (
  `anime_genero_id` int(11) NOT NULL,
  `anime_id` int(11) NOT NULL,
  `genero_id` int(11) NOT NULL,
  `anime_genero_estado` int(11) NOT NULL DEFAULT 1,
  `FechaRegistro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anime_genero`
--

INSERT INTO `anime_genero` (`anime_genero_id`, `anime_id`, `genero_id`, `anime_genero_estado`, `FechaRegistro`) VALUES
(32, 65, 2, 1, '2021-01-31 20:27:55'),
(33, 65, 12, 1, '2021-01-31 20:27:55'),
(34, 65, 32, 1, '2021-01-31 20:27:55'),
(35, 65, 23, 1, '2021-01-31 20:27:55'),
(36, 65, 33, 1, '2021-01-31 20:27:55'),
(37, 65, 24, 1, '2021-01-31 20:27:55'),
(38, 65, 8, 1, '2021-01-31 20:27:55'),
(41, 67, 1, 1, '2021-01-31 20:27:55'),
(42, 67, 6, 1, '2021-01-31 20:27:55'),
(48, 72, 2, 1, '2021-01-31 20:27:55'),
(49, 72, 12, 1, '2021-01-31 20:27:55'),
(50, 72, 32, 1, '2021-01-31 20:27:55'),
(51, 72, 23, 1, '2021-01-31 20:27:55'),
(52, 72, 33, 1, '2021-01-31 20:27:55'),
(53, 72, 24, 1, '2021-01-31 20:27:55'),
(54, 72, 8, 1, '2021-01-31 20:27:55'),
(55, 73, 2, 1, '2021-01-31 20:27:55'),
(56, 73, 12, 1, '2021-01-31 20:27:55'),
(57, 73, 22, 1, '2021-01-31 20:27:55'),
(58, 73, 23, 1, '2021-01-31 20:27:55'),
(59, 73, 33, 1, '2021-01-31 20:27:55'),
(60, 73, 24, 1, '2021-01-31 20:27:55'),
(61, 73, 8, 1, '2021-01-31 20:27:55'),
(92, 2, 2, 1, '2021-02-15 21:10:44'),
(93, 2, 11, 1, '2021-02-15 21:10:44'),
(94, 2, 12, 1, '2021-02-15 21:10:44'),
(95, 2, 9, 1, '2021-02-15 21:10:44'),
(96, 2, 29, 1, '2021-02-15 21:10:44'),
(105, 103, 12, 1, '2021-02-16 14:57:12'),
(106, 103, 33, 1, '2021-02-16 14:57:12'),
(107, 103, 24, 1, '2021-02-16 14:57:12'),
(108, 103, 8, 1, '2021-02-16 14:57:12'),
(109, 103, 9, 1, '2021-02-16 14:57:12'),
(111, 3, 2, 1, '2021-02-17 12:15:19'),
(112, 3, 21, 1, '2021-02-17 12:15:19'),
(113, 3, 14, 1, '2021-02-17 12:15:19'),
(114, 9, 12, 1, '2021-02-17 12:16:20'),
(115, 9, 33, 1, '2021-02-17 12:16:20'),
(116, 9, 24, 1, '2021-02-17 12:16:20'),
(117, 9, 8, 1, '2021-02-17 12:16:20'),
(118, 9, 9, 1, '2021-02-17 12:16:20'),
(128, 10, 26, 1, '2021-02-17 12:18:24'),
(129, 10, 17, 1, '2021-02-17 12:18:24'),
(130, 10, 27, 1, '2021-02-17 12:18:24'),
(131, 10, 19, 1, '2021-02-17 12:18:24'),
(132, 10, 39, 1, '2021-02-17 12:18:24'),
(138, 12, 2, 1, '2021-02-17 12:19:49'),
(139, 12, 21, 1, '2021-02-17 12:19:49'),
(140, 12, 14, 1, '2021-02-17 12:19:49'),
(141, 12, 25, 1, '2021-02-17 12:19:49'),
(142, 12, 8, 1, '2021-02-17 12:19:49'),
(143, 21, 2, 1, '2021-02-17 12:20:46'),
(144, 21, 11, 1, '2021-02-17 12:20:46'),
(145, 21, 21, 1, '2021-02-17 12:20:46'),
(146, 21, 9, 1, '2021-02-17 12:20:46'),
(147, 21, 29, 1, '2021-02-17 12:20:46'),
(184, 5, 2, 1, '2021-02-17 16:17:20'),
(185, 5, 1, 1, '2021-02-17 16:17:20'),
(186, 5, 12, 1, '2021-02-17 16:17:20'),
(187, 5, 23, 1, '2021-02-17 16:17:20'),
(188, 5, 33, 1, '2021-02-17 16:17:20'),
(189, 5, 14, 1, '2021-02-17 16:17:20'),
(190, 5, 24, 1, '2021-02-17 16:17:20'),
(191, 5, 8, 1, '2021-02-17 16:17:20'),
(192, 5, 19, 1, '2021-02-17 16:17:20'),
(196, 105, 12, 1, '2021-02-17 16:38:12'),
(197, 105, 33, 1, '2021-02-17 16:38:12'),
(198, 105, 8, 1, '2021-02-17 16:38:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta`
--

CREATE TABLE `etiqueta` (
  `etiqueta_id` int(11) NOT NULL,
  `etiqueta_nombre` varchar(100) NOT NULL,
  `etiqueta_estado` int(1) NOT NULL,
  `FechaRegistro` datetime NOT NULL DEFAULT current_timestamp(),
  `anime_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `genero_id` int(11) NOT NULL,
  `genero_nombre` varchar(50) NOT NULL,
  `genero_estado` int(1) NOT NULL DEFAULT 1,
  `FechaRegistro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`genero_id`, `genero_nombre`, `genero_estado`, `FechaRegistro`) VALUES
(1, 'ciencia ficcion', 1, '2021-01-31 20:27:55'),
(2, 'accion', 1, '2021-01-31 20:27:55'),
(3, 'deportes', 1, '2021-01-31 20:27:55'),
(4, 'espacial', 1, '2021-01-31 20:27:55'),
(5, 'infantil', 1, '2021-01-31 20:27:55'),
(6, 'mecha', 1, '2021-01-31 20:27:55'),
(7, 'parodia', 1, '2021-01-31 20:27:55'),
(8, 'romance', 1, '2021-01-31 20:27:55'),
(9, 'shounen', 1, '2021-01-31 20:27:55'),
(10, 'terror', 1, '2021-01-31 20:27:55'),
(11, 'artes marciales', 1, '2021-01-31 20:27:55'),
(12, 'comedia', 1, '2021-01-31 20:27:55'),
(13, 'drama', 1, '2021-01-31 20:27:55'),
(14, 'fantasía', 1, '2021-01-31 20:27:55'),
(15, 'josei', 1, '2021-01-31 20:27:55'),
(16, 'militar', 1, '2021-01-31 20:27:55'),
(17, 'policia', 1, '2021-01-31 20:27:55'),
(18, 'samurai', 1, '2021-01-31 20:27:55'),
(19, 'sobrenatural', 1, '2021-01-31 20:27:55'),
(20, 'vampiros', 1, '2021-01-31 20:27:55'),
(21, 'aventuras', 1, '2021-01-31 20:27:55'),
(22, 'demencia', 1, '2021-01-31 20:27:55'),
(23, 'ecchi', 1, '2021-01-31 20:27:55'),
(24, 'harem', 1, '2021-01-31 20:27:55'),
(25, 'juegos', 1, '2021-01-31 20:27:55'),
(26, 'Misterio', 1, '2021-01-31 20:27:55'),
(27, 'Psicológico', 1, '2021-01-31 20:27:55'),
(28, 'Seinen', 1, '2021-01-31 20:27:55'),
(29, 'Superpoderes', 1, '2021-01-31 20:27:55'),
(30, 'Yaoi', 1, '2021-01-31 20:27:55'),
(31, 'Carreras', 1, '2021-01-31 20:27:55'),
(32, 'Demonios', 1, '2021-01-31 20:27:55'),
(33, 'Escolares', 1, '2021-01-31 20:27:55'),
(34, 'Historico', 1, '2021-01-31 20:27:55'),
(35, 'Magia', 1, '2021-01-31 20:27:55'),
(36, 'Música', 1, '2021-01-31 20:27:55'),
(37, 'Recuentos de la vida', 1, '2021-01-31 20:27:55'),
(38, 'Shoujo', 1, '2021-01-31 20:27:55'),
(39, 'Suspenso', 1, '2021-01-31 20:27:55'),
(40, 'Yuri', 1, '2021-01-31 20:27:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resenia`
--

CREATE TABLE `resenia` (
  `resenia_id` int(11) NOT NULL,
  `resenia_titulo` varchar(100) NOT NULL,
  `resenia_comentarios` text NOT NULL,
  `resenia_estado` int(1) NOT NULL DEFAULT 1,
  `Fecha_Registro` datetime NOT NULL DEFAULT current_timestamp(),
  `anime_id` int(11) NOT NULL,
  `resenia_valoracion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resenia`
--

INSERT INTO `resenia` (`resenia_id`, `resenia_titulo`, `resenia_comentarios`, `resenia_estado`, `Fecha_Registro`, `anime_id`, `resenia_valoracion`) VALUES
(28, 'buen anime', 'tiene buenas batallas sobre todo, muy entretenido', 1, '2021-01-31 20:27:55', 65, 5),
(38, 'dds', 'ddd', 1, '2021-01-31 16:16:39', 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(150) NOT NULL DEFAULT '0',
  `FechaRegistro` datetime DEFAULT current_timestamp(),
  `usuario_estado` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `username`, `password`, `FechaRegistro`, `usuario_estado`) VALUES
(6, 'root', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', '2021-01-31 16:26:59', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`anime_id`);

--
-- Indices de la tabla `anime_genero`
--
ALTER TABLE `anime_genero`
  ADD PRIMARY KEY (`anime_genero_id`),
  ADD KEY `fk_anime_genero1` (`anime_id`),
  ADD KEY `fk_anime_genero2` (`genero_id`);

--
-- Indices de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD PRIMARY KEY (`etiqueta_id`),
  ADD KEY `fk_etiqueta1` (`anime_id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`genero_id`);

--
-- Indices de la tabla `resenia`
--
ALTER TABLE `resenia`
  ADD PRIMARY KEY (`resenia_id`) USING BTREE,
  ADD KEY `fk_reseña1` (`anime_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anime`
--
ALTER TABLE `anime`
  MODIFY `anime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `anime_genero`
--
ALTER TABLE `anime_genero`
  MODIFY `anime_genero_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  MODIFY `etiqueta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `genero_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `resenia`
--
ALTER TABLE `resenia`
  MODIFY `resenia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anime_genero`
--
ALTER TABLE `anime_genero`
  ADD CONSTRAINT `fk_anime_genero1` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`anime_id`),
  ADD CONSTRAINT `fk_anime_genero2` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`genero_id`);

--
-- Filtros para la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD CONSTRAINT `fk_etiqueta1` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`anime_id`);

--
-- Filtros para la tabla `resenia`
--
ALTER TABLE `resenia`
  ADD CONSTRAINT `fk_reseña1` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`anime_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
