-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2023 a las 21:53:29
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hoteles`
--

INSERT INTO `autores` (`id_autor`, `nombre`) VALUES
(1, 'Robert Jordan'),
(2, 'Brandon Sanderson'),
(3, 'Ursula K. Le Guin'),
(4, 'Frank Herbert'),
(5, 'Dan Simmons'),
(6, 'Isaac Asimov'),
(7, 'Liu Cixin'),
(8, 'Nancy Kress'),
(9, 'Martha Wells');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id_descuento` int(11) NOT NULL,
  `porcentaje` decimal(2,2) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hoteles`
--

INSERT INTO `descuentos` (`id_descuento`, `porcentaje`) VALUES
(1, '0.10'),
(2, '0.15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hoteles`
--

INSERT INTO `generos` (`id_genero`, `nombre`) VALUES
(1, 'Ciencia Ficcion'),
(2, 'Fantasia'),
(3, 'Historia'),
(4, 'Misterio'),
(5, 'Romance'),
(6, 'Terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidadDePaginas` int(6) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `isbn` varchar(100) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,

--   `saga` varchar(100) DEFAULT NULL,
--   `sagaNumero` varchar(10) DEFAULT NULL,

  `id_genero` int(11) DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL,
--   `id_saga` int(11) DEFAULT NULL,
  `id_descuento` int(11) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aereos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `cantidadDePaginas`, `imagen`, `isbn`, `stock`, `id_genero`, `id_autor`, `id_descuento`) VALUES
(1, 'The Eye of the World', 'En una pequeña aldea solitaria de la región de Dos Ríos vive Rand, un joven granjero, en compañía de su padre. Una noche son asaltados por trollocs, bestias semihumanas, que hieren al padre. Rand lo traslada al pueblo más cercano para que lo curen y comprueba que los trollocs también han ocasionado graves destrozos. Una poderosa maga, Moraine, afirma que Rand y otros dos muchachos deben huir de la aldea porque son el objetivo de la persecución de los trollocs, quienes obedecen a las fuerzas del mal.', '8500.00', '800', '../resources/img/products/theEyeOfTheWorld.png', '9780812511819', 12, 2, 1, 1),
(2, 'The Great Hunt', '¡Rand ha sobrevivido a su primer enfrentamiento con los perversos seguidores del Oscuro, pero ni sus amigos ni él están a salvo, ya que el señor del mal ha liberado a los Renegados, mientras los héroes de todas las eras se levantan de la tumba cuando el Cuerno de Valere los saca de su sueño. Al verse obligado a enfrentarse a las fuerzas de la oscuridad, Rand decide escapar de su destino. Pero la profecía tiene que cumplirse. Por su calidad literaria, su ambicioso planteamiento y su descomunal historia, La Rueda del Tiempo es la saga de fantasía más importante de los últimos treinta años. El lector que inicie el camino junto a Rand, Mat y Perrin no podrá abandonar el viaje hasta su incierto y sorprendente final.', '8500.00', '705', '../resources/img/products/theGreatHunt.png', '9780812517729', 17, 2, 1, 1),
(3, 'The Dragon Reborn', "El Dragón Renacido, el profético adalid que ha de salvar al mundo, el libertador que enloquecerá y matará a todos sus seres queridos, ha iniciado una carrera para huir de su destino. Rand al'Thor es capaz de entrar en contacto con el Poder Único, pero no puede controlarlo, ni tiene a nadie que le enseñe a hacerlo, pues ningún hombre lo ha conseguido desde hace tres mil años. Tiene la certidumbre de que ha de enfrentarse al Oscuro, pero ¿cómo? Perrin Aybara va en busca de Rand, acompañado por Moraine Sedai, su Guardián, Lan, y Olial el Ogier. Acosado por extraños sueños, Perrin afronta otro problema insoluble: ¿cómo eludir la pérdida de su propia condición humana?", '8500.00', '624', '../resources/img/products/theDragonReborn.png', '9780765305114', 15, 2, 1, NULL),
(4, 'The Way of Kings', 'En Roshar, un mundo de piedra y tormentas, extrañas tempestades de increíble potencia barren el rocoso territorio de tal manera que han dado forma a una nueva civilización escondida. Han pasado siglos desde la caída de las diez órdenes consagradas conocidas como los Caballeros Radiantes, pero sus espadas y armaduras aún permanecen. En las Llanuras Quebradas se libra una guerra sin sentido. Kaladin ha sido sometido a la esclavitud, mientras diez ejércitos luchan por separado contra un solo enemigo. El comandante de uno de los otros ejércitos, el señor Dalinar, se siente fascinado por un antiguo texto llamado "El camino de los reyes". Mientras tanto, al otro lado del océano, su eminente y hereje sobrina, Jasnah Kholin, forma a su discípula, la joven Shallan, quien investigará los secretos de los Caballeros Radiantes y la verdadera causa de la guerra.', '9500.00', '1007', '../resources/img/products/theWayOfKings.png', '9780765326355', 32, 2, 2, 2),
(5, 'Words of Radiance', 'Palabras radiantes es la continuación de Camino de los reyes, la aclamada primera parte de la serie en diez volúmenes The Stormlight Archive. En ella retrocedemos seis años en el tiempo, cuando un asesino, entre cuyos primeros objetivos se halla Dalinar, mata al rey alezi. Kaladin está al mando de los guardaespaldas reales, un puesto controvertido por su baja condición, y debe proteger al rey y a Dalinar, al tiempo que dominar, en secreto, los nuevos y extraordinarios poderes vinculados a sus honorspren. Shallan tiene la misión de impedir el fin de las Desolaciones. Las Llanuras Quebradas tienen la respuesta; en ellas los parshendi están convencidos, gracias a su líder, de arriesgarlo todo en una apuesta desesperada...', '9500.00', '1087', '../resources/img/products/wordsOfRadiance.png', '9780765326362', 27, 2, 2, 1),
(6, 'Oathbringer', 'La humanidad se enfrenta a una nueva Desolación con el regreso de los Portadores del Vacío, un enemigo tan grande en número como en sed de venganza. La victoria fugaz de los ejércitos alezi de Dalinar Kholin ha tenido consecuencias: el enemigo parshendi ha convocado la violenta tormenta eterna, que arrasa el mundo y hace que los hasta ahora pacíficos parshmenios descubran con horror que llevan un milenio esclavizados por los humanos. Al mismo tiempo, en una desesperada huida para alertar a su familia de la amenaza, Kaladin se pregunta si la repentina ira de los parshmenios está justificada.', '9500.00', '1243', '../resources/img/products/oathbringer.png', '9780765326379', 24, 2, 2, NULL),
(7, 'A Wizard of Earthsea', 'En el mundo de Terramar hay dragones y espectros, talismanes y poderes, y las leyes de la magia son tan inevitables y exactas como las leyes naturales. Un principio fundamental rige en ese mundo: el delicado equilibrio entre la muerte y la vida, que muy pocos hombres pueden alterar o restaurar, pues la restauración del orden cósmico corresponde al individuo que se gobierna a sí mismo, el héroe completo capaz de dar el paso último, enfrentarse a su propia sombra, que es miedo, odio, inhumanidad. Ésta es la gran aventura iniciática de Ged, aprendiz de hechicero.', '7000.00', '183', '../resources/img/products/aWizardOfEarthsea.png', '9780553383041', 9, 2, 3, NULL),
(8, 'The Tombs of Atuan', 'En el mundo de Terramar hay dragones y espectros, talismanes y poderes, y las leyes de la magia son tan inevitables y exactas como las leyes naturales. Un principio fundamental rige en ese mundo: el delicado equilibrio entre la muerte y la vida, que muy pocos hombres pueden alterar, o restaurar. Pues la restauración del orden cósmico corresponde naturalmente al individuo que se gobierna a sí mismo, el héroe completo capaz de dar el paso último, enfrentarse a su propia sombra, que es miedo, odio, inhumanidad.', '7000.00', '180', '../resources/img/products/theTombsOfAtuan.png', '9780689845369', 7, 2, 3, NULL),
(9, 'Dune', 'La historia se desarrolla alrededor del joven Paul Atreides, heredero del ducado de la Casa Atreides. Su padre, el duque Leto Atreides, recibe del Emperador Padishah Shaddam IV la orden de trasladarse, con todo su ducado, a Arrakis, la única fuente en el Universo Conocido de la especia melange. Paul debe enfrentarse a la traición del Emperador, temeroso de la ascendencia de la Casa Atreides en el Landsraad, y de la Casa Harkonnen, enemigos de los Atreides desde la Batalla de Corrin.', '9000.00', '658', '../resources/img/products/dune.png', '9780593099322', 7, 1, 4, 2),
(10, 'Dune messiah', 'Esta historia se centra en el nuevo Imperio Estelar Fremen, con la Bene Gesserit, la Cofradía Espacial, los Bene Tleilax, la princesa consorte Irulan Corrino y los Fremen rebeldes al Quizarato, que ven como el nuevo imperio diluye su cultura y costumbres ancestrales, en un complot para tomar el control del Imperio.', '9000.00', '337', '../resources/img/products/duneMessiah.png', '9780593098233', 12, 1, 4, NULL),
(11, 'Children of dune', "Nueve años después de la muerte de Chani, del final de la conspiración contra los Fremen, y de que el Emperador Paul Atreides, Muad'dib, ciego y solo, caminara hacia el desierto siguiendo la tradición fremen que aseguraba una muerte rápida, Alia, hermana de Paul y con poderes prescientes similares a los de su hermano, se ha casado con el ghola de Duncan Idaho y se sienta en el trono de Arrakis como Regente Imperial, así como tutora y guardiana de los gemelos nacidos en el momento de morir Chani: Leto y Ghanima.", '9000.00', '609', '../resources/img/products/childrenOfDune.png', '9780593098240', 15, 1, 4, NULL),
(12, 'Hyperion', 'Siete personas se dirigen en Hyperion a una última peregrinación a su encuentro con el Alcaudón, considerado por algunos como una deidad y por otros como avatar de la inminente expiación humana. Todos ellos, portadores de historias increíbles y temibles secretos, muestran al contar sus historias, pinceladas del complejo universo desarrollado por Simmons y de una sociedad abocada a una lucha por su destino, a la que tal vez puedan salvar.', '8500.00', '500', '../resources/img/products/hyperion.png', '9780553283686', 19, 1, 5, 1),
(13, 'The fall of hyperion', 'Después de varias horas de explorar las Tumbas del Tiempo en búsqueda del Alcaudón sin tener éxito, los peregrinos hacen un campamento cerca del artefacto conocido como la Esfinge. A partir de una terrible tormenta de arena, los peregrinos se van separando poco a poco para enfrentarse solos al Alcaudón.', '8500.00', '517', '../resources/img/products/theFallOfHyperion.png', '9780553288209', 16, 1, 5, NULL),
(14, 'Foundation', 'Mucho tiempo después de que la Tierra pasara al olvido, la galaxia se unificó alrededor de un Imperio pacífico gobernado desde la majestuosa ciudad de Trántor. El sistema funcionó y prosperó durante incontables generaciones. Todo el mundo creía que duraría eternamente... Todos menos Hari Seldon, la mente científica más poderosa de su tiempo. Sus investigaciones en el campo de la psicohistoria (las matemáticas aplicadas a las grandes aglomeraciones humanas) auguraban un desastre imposible de prevenir. El Imperio estaba condenado... Pero el Plan Seldon era una estrategia a largo plazo, destinada a minimizar las peores consecuencias del futuro que se avecinaba. Para ello se establecieron dos Fundaciones en ambos extremos de la galaxia. Esta es la historia de la primera.', '8000.00', '244', '../resources/img/products/fundation.png', '9780553803716', 21, 1, 6, NULL),
(15, 'Three body problem', 'Durante la Revolución Cultural china, un proyecto militar secreto envía señales al espacio para contactar con extraterrestres. Pronto, una civilización alienígena al borde de la destrucción capta la señal y comienza a planear su desembarco en la Tierra. Durante las décadas siguientes, se comunica a través de un insólito método: un extraño videojuego virtual impregnado de historia y filosofía. Pero a medida que los alienígenas empiezan a ganar a los jugadores terrícolas, se forman distintos bandos, unos dispuestos a dar la bienvenida a esos seres superiores y ayudarlos a hacerse cargo de un mundo tan corrupto, y otros preparados para luchar contra la invasión. El resultado es una experiencia tan auténtica como reveladora sobre nuestro tiempo.', '9000.00', '400', '../resources/img/products/threeBodyProblem.png', '9780765377067', 6, 1, 7, NULL),
(16, 'Beggars in spain', 'Año 2019. Una nueva especie de seres humanos, los Insomnes, disponen de mayor conocimiento y poder. Modificados por la ingeniería genética para no tener que dormir, los insomnes cuentan con más horas de actividad, no enferman nunca y son más longevos. Sus superdotados descendientes, los Superinsomnes, pueden desarrollar además una nueva biotecnología por la que aspiran a dominar el mundo. En el otro extremo de la sociedad se encuentran los Durmientes -los nuevos mendigos del futuro cercano-, cuyo recelo de los Insomnes es notorio, pues dependen de éstos para garantizar su propia supervivencia. En semejante contexto, tres personajes de diferente condición exponen su particular punto de vista sobre un conflicto que se intuye inminente e inevitable.', '7000.00', '400', '../resources/img/products/beggarsInSpain.png', '9780060733483', 8, 1, 8, NULL),
(17, 'All systems red', 'En un futuro controlado por entidades corporativas donde el viaje espacial es posible, una compañía de seguros debe aprobar y abastecer todas las misiones planetarias. Los equipos de exploración tienen que ir acompañados de androides suministrados por las aseguradoras, por su propio bien. Pero en una sociedad donde los contratos se conceden al postor más bajo, la seguridad no es lo más importante.', '6500.00', '152', '../resources/img/products/allSystemsRed.png', '9780765397539', 11, 1, 9, NULL);

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id_descuento`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);
  ADD KEY `id_genero` (`id_genero`);
  ADD KEY `id_autor` (`id_autor`);
  ADD KEY `id_saga` (`id_saga`);
  ADD KEY `id_descuento` (`id_descuento`);

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id_descuento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`),
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`id_autor`),
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_saga`) REFERENCES `sagas` (`id_saga`),
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_descuento`) REFERENCES `descuentos` (`id_descuento`),
COMMIT;