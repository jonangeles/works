
CREATE DATABASE IF NOT EXISTS `rol_interactivo` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `rol_interactivo`;

create table `usuarios`( 
    `id` smallint AUTO_INCREMENT primary key,
    `usuario` varchar(16) not null unique,
    `grupo` varchar(13),
    `correo` varchar(40) not null unique,
    `contraseña` varchar(12)  not null,
    `tiempo` int
);
create table `personajes`(
    `id` smallint AUTO_INCREMENT primary key,
    `id_usuario` smallint,
    `borrado` varchar(2),
    `clase` varchar(10),
    `nivel` tinyint,
    `nombre` varchar (20) unique,
    `raza` varchar (20),
    `edad` smallint,
    `sexo` varchar (9),
    `experiencia` int,
    `dinero` int,
    `descripcion` text,
    `fuerza` tinyint,
    `destreza` tinyint,
    `constitucion` tinyint,
    `inteligencia` tinyint,
    `sabiduria` tinyint,
    `carisma` tinyint ,  
    `fortaleza` tinyint,
    `reflejos` tinyint,
    `voluntad` tinyint,
    `vida` smallint,
    `velocidad` tinyint,
    `at_base` varchar(10),
    `iniciativa` tinyint,
    `ca` tinyint,
    foreign key(id_usuario) references usuarios(id) ON DELETE CASCADE
 
);
create table `dotes`(
    `id` smallint AUTO_INCREMENT primary key,
    `nombre` varchar(50) not null,
    `prerrequisito` varchar(40),
    `descripcion` varchar(300) not null
);

create table `dotado`(
    `id_personaje` smallint,
    `id_dotes` smallint,
    foreign key (id_personaje) references personajes(id) ON DELETE CASCADE,
    foreign key (id_dotes) references dotes(id),
    primary key (id_personaje,id_dotes)

);

create table `idiomas`(
    `id` smallint AUTO_INCREMENT primary key,
    `idioma` varchar(50) not null
);
create table `posee_idioma`(
    `id_personaje` smallint ,
    `id_idioma` smallint ,
    foreign key (id_personaje) references personajes(id) ON DELETE CASCADE,
    foreign key (id_idioma) references idiomas(id),
    primary key (id_personaje, id_idioma)
);

create table `conjuros`(
    `id` smallint AUTO_INCREMENT primary key,
    `nivel` tinyint not null,
    `clase` varchar(10) not null,
    `escuela` varchar(20),
    `nombre` varchar (50) not null,
    `descripcion`varchar(80) not null
);


create table `pertenencias`(
    `id` smallint AUTO_INCREMENT primary key,
    `nombre` varchar(100) not null
);

create table `posee`(
    `id_personaje` smallint,
    `id_pertenencia` smallint,
    `cantidad` tinyint not null,
    foreign key (id_personaje) references personajes(id) ON DELETE CASCADE,
    foreign key (id_pertenencia) references pertenencias(id),
    primary key (id_personaje, id_pertenencia)
);

create table `habilidades`(
    `id` smallint AUTO_INCREMENT primary key,
    `nombre` varchar (100) not null,
    `clase` varchar (8) not null,
    `modificador` varchar (12) not null
);

create table `habilitado`(
    `id_personaje` smallint,
    `id_habilidad` smallint,
    `rango` smallint,
    foreign key (id_personaje) references personajes(id) ON DELETE CASCADE,
    foreign key (id_habilidad) references habilidades(id),
    primary key (id_personaje, id_habilidad)
);

create table `armas`(
    `id` smallint AUTO_INCREMENT primary key, 
    `nombre` varchar (30) not null,
    `daño` varchar(8) not null,
    `critico` varchar (10) not null
);

create table `armado`(
    `id_personaje` smallint,
    `id_arma` smallint,
    `municion` smallint,
    foreign key (id_personaje) references personajes(id) ON DELETE CASCADE,
    foreign key (id_arma) references armas(id),
    primary key (id_personaje, id_arma)
);

create table `protecciones`(
    `id` smallint AUTO_INCREMENT primary key,
    `nombre` varchar(50) ,
    `bonificador` tinyint ,
    `tipo` varchar(10)
);

create table `protegido`(
    `id_personaje` smallint,
    `id_proteccion` smallint,
    foreign key (id_personaje) references personajes(id) ON DELETE CASCADE,
    foreign key (id_proteccion) references protecciones(id),
    primary key (id_personaje, id_proteccion)
);




create table `Experiencia`(
    `nivel` tinyint primary key,
    `experiencia` int not null,
    `dotes`tinyint not null
);

create table `guerrero`(
    `nivel` tinyint primary key,
    `vida` tinyint not null,
    `at_base` varchar(20) not null,
    `fortaleza` tinyint not null,
    `reflejos` tinyint not null,
    `voluntad` tinyint not null,
    `dotes` tinyint not null,
    `habilidad` tinyint not null
);

create table `mago`(
    `nivel` tinyint primary key,
    `vida` tinyint not null,
    `nivel_conjuro` tinyint not null,
    `conjuros_diarios` tinyint not null,
    `at_base`  varchar(20) not null,
    `fortaleza` tinyint not null,
    `reflejos` tinyint not null,
    `voluntad` tinyint not null,
    `dotes` tinyint not null,
    `habilidad` tinyint not null
);

create table `clerigo`(
    `nivel` tinyint primary key,
    `vida` tinyint not null,
    `nivel_conjuro` tinyint not null,
    `conjuros_diarios` tinyint not null,
    `at_base`  varchar(20) not null,
    `fortaleza` tinyint not null,
    `reflejos` tinyint not null,
    `voluntad` tinyint not null,
    `dotes` tinyint not null,
    `habilidad` tinyint not null
);


insert into dotes values (null,'conjurar en silencio','','Lanza conjuros sin el componente verbal');
insert into dotes values (null,'conjurar sin moverse','','Lanzas un conjuro sin componente somático');
insert into dotes values (null,'extender conjuro','','dobla el area del conjuro');
insert into dotes values (null,'maximizar conjuro','','Maximiza los efectos numericos variables de un conjuro');
insert into dotes values (null,'Potenciar conjuro','','Aumenta los efectos numericos variables de un conjuro en un 50%');
insert into dotes values (null,'Conjurar en combate','','+4 en las pruebas de concentracion al lanzar conjuros a la defensiva');
insert into dotes values (null,'Abstencion de materiales','','Lanzas conjuros sin componentes materiales');
insert into dotes values (null,'Ataque poderoso','fuerza 13','Puedes cambiar bonificador de ataque por daño');
insert into dotes values (null,'Hendedura','Ataque poderoso','Ataque cuerpo a cuerpo adicional despues de acabar con un objetivo');
insert into dotes values (null,'Gran hendedura','ataque base +4, Ataque poderoso, hendedura','sin limitea los ataques hendedura por asalto');
insert into dotes values (null,'combate a dos armas','Destreza 15','Permite usar un arma cuerpo a cuerpo con la mano no dominante');
insert into dotes values (null,'defensa con dos armas','combate con dos armas','el arma de la mano torpe otoga un bonificador +1 a la CA');
insert into dotes values (null,'Combate en dos armas mejorado','ataque base +6,combate con dos armas, destreza 17','obtienes un 2 ataque con la mano torpe');
insert into dotes values (null,'combate con dos armas mayor','ataque base +11, combate con dos armas, combate con dos armas mejorado, destreza 19','Obtienes un 3 ataque con la mano torpe');
insert into dotes values (null,'critico mejorado','ataque base +8','duplica el rango de critico de un arma');
insert into dotes values (null,'Curacion aumentada','','suma +2 puntos por nivel de conjuro a la cantidad de daño que cure cualquier sortilegio de conjuracion [sanacion] que lances');

insert into idiomas values (null,'comun');
insert into idiomas values (null,'elfico');
insert into idiomas values (null,'enano');
insert into idiomas values (null,'orco');
insert into idiomas values (null,'gnomico');
insert into idiomas values (null,'goblin');
insert into idiomas values (null,'draconico');
insert into idiomas values (null,'infernal');

insert into conjuros values(null,'0','Mago','abjuracion','Resistencia','el receptor gana +1 en los TS');
insert into conjuros values(null,'0','Mago','adivinacion','Detectar magia','Detecta conjuros y objetos magicos en 60 pies de radio');
insert into conjuros values(null,'0','Mago','conjuracion','salpicadura de acido','Orbe que inflige 1d3 puntos de daño por acido');
insert into conjuros values(null,'0','Mago','encantamiento','atontar','Una criatura de acido de hasta 4DG pierde si siguiente accion');
insert into conjuros values(null,'0','Mago','Evocacion','Luz','Un objeto brilla como una antorcha');
insert into conjuros values(null,'0','Mago','ilusion','sonido fantasma','sonidos quimericos');
insert into conjuros values(null,'0','Mago','nigromancia','Perturbar muertos vivientes','infliges 1d6 a 1 muerto viviente');
insert into conjuros values(null,'0','Mago','transmutacion','cuchicheo de mago','conversacion cuchicheada a distancia');
insert into conjuros values(null,'1','Mago','abjuracion','escudo','Disco invisible que da +4 de CA y bloquea los proyectiles magicos');
insert into conjuros values(null,'1','Mago','adivinacion','impacto verdadero','sacas un 20 en la proxima tirada');
insert into conjuros values(null,'1','Mago','conjuracion','armadura de mago','concede al receptor un +4 de armadura');
insert into conjuros values(null,'1','Mago','encantamiento','Hechizar persona','una persona se hace amiga tuya');
insert into conjuros values(null,'1','Mago','evocacion','proyectil magico','daño de 1d4+1, +1 proyectil/2 nivles por encima del level 1');
insert into conjuros values(null,'1','Mago','ilusion','Disfrazarse','Cambia tu apariencia');
insert into conjuros values(null,'1','Mago','Nigromancia','rayo de debilitamiento','rayo que reduce la fuerza en 1d6+1/3 niveles');
insert into conjuros values(null,'1','Mago','transmutacion','arma magica','un arma gana un +1');
insert into conjuros values(null,'2','Mago','abjuracion','Proteccion contra las flechas','receptor inmune a la mayoria de ataques a distancia');
insert into conjuros values(null,'2','Mago','adivinacion','localizar objeto','presiente en que direccion se encuentra un objeto (concreto o tipo)');
insert into conjuros values(null,'2','Mago','conjuracion','flecha acida de melf','ataque de toque a distancia daño 2d4 durante 1 asalto+1asalto/3niveles');
insert into conjuros values(null,'2','Mago','encantamiento','Atontar monstruo','una criatura viva de 6dg o menos pierde su siguiente accion');
insert into conjuros values(null,'2','Mago','Evocacion','Rayo abrasador','ataque de toque a distancia que inflige 4d6 daño de fuego, 1 rayo/4niveles');
insert into conjuros values(null,'2','Mago','ilusion','invisibilidad','el receptor se vuelve invisible durante 10 min/nivel o hasta que ataca');
insert into conjuros values(null,'2','Mago','Nigromancia','falsa vida','obtienes 1d10 de vida temporales + 1/nivel');
insert into conjuros values(null,'2','Mago','Transmutacion','Vision en la oscuridad','ver hasta 60 pies en la oscuridad total');
insert into conjuros values(null,'3','Mago','abjuracion','disipar magia','cancela conjuros y efectos magicos');
insert into conjuros values(null,'3','Mago','adivinacion','don de lenguas','Puedes hablar cualquier idioma');
insert into conjuros values(null,'3','Mago','conjuracion','corcel fantasmal','caballo magico que aparece durnate 1h/nivel');
insert into conjuros values(null,'3','Mago','encantamiento','inmovilizar persona','inmoviliza a una persona 1 asalto/nivel');
insert into conjuros values(null,'3','Mago','evocacion','bola de fuego','1d6 daño/nivel, radio 20 pies');
insert into conjuros values(null,'3','Mago','ilusion','esfera de invisibilidad','hace invisible a todo el mundo en un radio de 10 pies');
insert into conjuros values(null,'3','Mago','nigromante','toque vampirico','toque que inflige 1d6/2niveles del lanzador, lanzador gana vida iguales al daño');
insert into conjuros values(null,'3','Mago','transmutacion','arma magica mayor','bonificador +1/3niveles');
insert into conjuros values(null,'4','Mago','abjuracion','piel petrea',' ignora 10 puntos de daño por ataque');
insert into conjuros values(null,'4','Mago','adivinacion','ojo arcano','ojo flotante invisible que se mueve a 30 pies/asalto');
insert into conjuros values(null,'4','Mago','conjuracion','cobijo seguro de leomund','crea una solida casa');
insert into conjuros values(null,'4','Mago','encantamiento','hechizar monstruo','un monstruo cree ser tu aliado');
insert into conjuros values(null,'4','Mago','evocacion','muro de fuego','inflige 2d4 por daño de fuego hasta 10 pies y 1d4 hasta 20 pies atravesar el fuego infige 2d6 +1/nivel');
insert into conjuros values(null,'4','Mago','ilusion','asesino fantasmal','una terrible ilusion mata al receptor o le inflige 3d6 de daño');
insert into conjuros values(null,'4','Mago','nigromancia','reanimar a los muertos','crea esqueletos y zombies muertos vivientes');
insert into conjuros values(null,'4','Mago','transmutacion','poliformar','dota de nueva forma a un receptor voluntario');
insert into conjuros values(null,'5','Mago','abjuracion','romper encantamiento','libera a los receptores de encantamientos, alteraciones, maldiciones y petrificaciones');
insert into conjuros values(null,'5','Mago','adivinacion','contactar con otro plano','te permite hacer preguntas a una entidad de otro plano');
insert into conjuros values(null,'5','Mago','conjuracion','teleportar','te transporta instantaneamente hasta a 100millas/nivel');
insert into conjuros values(null,'5','Mago','encantamiento','Dominar persona','controla telepaticamente a una persona');
insert into conjuros values(null,'5','Mago','evocacion','cono de frio','1d6 de daño por frio /nivel');
insert into conjuros values(null,'5','Mago','ilusion','pesadilla','envia una vision que infligue 1d10 daño, fatiga');
insert into conjuros values(null,'5','Mago','nigromancia','asolar','marchita a una planta o cosa 1d6/nivel puntos de daño a una criatura tipo planta');
insert into conjuros values(null,'5','Mago','transmutacion','viaje en vuelo','vuelas a una velocidad ded 40 pies y puedes aligerar en grandes distancias');
insert into conjuros values(null,'6','Mago','abjuracion','campo antimagia','niega la magia en una radio ded 10 pies');
insert into conjuros values(null,'6','Mago','adivicacion','vision verdadera','ves todo como es en realidad');
insert into conjuros values(null,'6','Mago','conjuracion','bruma acida','bruma que inflige daño por acido');
insert into conjuros values(null,'6','Mago','encantamiento','heroismo mayor','proporciona un bonificador +4 a las tiradas de ataque, salvaciones y pruebas de habilidad; inmunidad al miedo y pg temporales');
insert into conjuros values(null,'6','Mago','evocacion','relampago zigzagueante','1d6 daño/nivel 1 rayo secundario/nivel, cada uno infligue medio daño');
insert into conjuros values(null,'6','Mago','ilusion','doble engañoso','te hace invisible y crea un doble ilusorio');
insert into conjuros values(null,'6','Mago','nigromancia','mata muertos vivientes','destruye 1d4 dg/nivel de muertos vivientes');
insert into conjuros values(null,'6','Mago','transmutacion','controlar las aguas','hace subir o bajar masas de agua');
insert into conjuros values (null,'0','Clerigo','','crear agua','crea 2 galones/nivel de agua pura');
insert into conjuros values (null,'0','Clerigo','','curar heridas menores','cura 1pg');
insert into conjuros values (null,'0','Clerigo','','detectar magia','detecta conjuros y objetos magicos en un radio de 60 pies');
insert into conjuros values (null,'0','Clerigo','','infligir heridas leves','ataque de toque,1 punto de daño');
insert into conjuros values (null,'0','Clerigo','','orientacion divina','+1 en una tirada de ataque, salvacion o prueba');
insert into conjuros values (null,'0','Clerigo','','purificar comida y bebida','purifica 1 pie cubico/nivel de agua o comida');
insert into conjuros values (null,'0','Clerigo','','resistencia','el receptor gana +1 en todos los ts');
insert into conjuros values (null,'0','Clerigo','','virtud','el receptor gana temporalmente 1pg');
insert into conjuros values (null,'1','Clerigo','','curar heridas leves','cura 1d8pg + 1pg/nivel');
insert into conjuros values (null,'1','Clerigo','','comprension idiomatica','comprendes todos los idiomas hablados o escritos');
insert into conjuros values (null,'1','Clerigo','','detectar muertos vivientes','revela a estas criaturas en un radio de 60 pies');
insert into conjuros values (null,'1','Clerigo','','infligir heridas leves','ataque de toque, daño 1d8 +1/nivel (maximo 5)');
insert into conjuros values (null,'1','Clerigo','','favor divino','ganas un +1/3niveles a las tiradas de ataque y daño');
insert into conjuros values (null,'1','Clerigo','','santuario','los oponentes no pueden atacarte y tu tampoco puedes atacar');
insert into conjuros values (null,'1','Clerigo','','perdicion','los enemigos sufren un -1 a las tiradas dde ataque y las salvaciones contra el miedo');
insert into conjuros values (null,'1','Clerigo','','orden imperiosa','un receptor obedece durante 1 asalto una orden de palabra unica');
insert into conjuros values (null,'2','Clerigo','','arma espiritual','un arma que ataca por si sola');
insert into conjuros values (null,'2','Clerigo','','auxilio divino','+1 a las tiradas de ataque y las salvaciones contra el miedo, 1d8 pg temporales +1/nivel');
insert into conjuros values (null,'2','Clerigo','','campanas funebres','mata a una criatura funebre moribunda, ganas 1d8 pg temporales, +2 fuerza y +1 nivel');
insert into conjuros values (null,'2','Clerigo','','curar heridas moderadas','cura 2d8 pg +1/nivel');
insert into conjuros values (null,'2','Clerigo','','encontrar trampas','advierte la presencia de trampas igual que los picaros');
insert into conjuros values (null,'2','Clerigo','','infligir heridas moderadas','ataque de toque, daño 2d8 +1/nivel');
insert into conjuros values (null,'2','Clerigo','','zona de verdad','los receptores dentro del alcance no pueden mentir');
insert into conjuros values (null,'2','Clerigo','','explosion de sonido','inflige 1d8 daño sonico a los receptores que, pueden quedar aturdidos');
insert into conjuros values (null,'3','Clerigo','','curar heridas graves','cura 3d8 pg +1/nivel');
insert into conjuros values (null,'3','Clerigo','','infligir heridas graves','inflige 3d8 pg de daño +1/nivel');
insert into conjuros values (null,'3','Clerigo','','lanzar una maldicion','-6 a una caracteristica, -4 a los ataques, salvaciones y pruebas, o 50% perder cada accion');
insert into conjuros values (null,'3','Clerigo','','luz abrasadora','un rayo infligue 1d8/2 niveles a los muertos vivientes el doble');
insert into conjuros values (null,'3','Clerigo','','mano auxiliadora','una mano fantasmal que lleva al receptor hacia ti');
insert into conjuros values (null,'3','Clerigo','','obscurecer objeto','oculta un objeto del escudriñamiento');
insert into conjuros values (null,'3','Clerigo','','quitar enfermedad','cura todas las enfermedades que afecten al receptor');
insert into conjuros values (null,'3','Clerigo','','quitar maldicion','libera a un objeto o persona de una maldicion');
insert into conjuros values (null,'4','Clerigo','','curar heridas criticas','curda 4d8 +1/nivel');
insert into conjuros values (null,'4','Clerigo','','infligir heridas criticas','ataque de toque daño 4d8 +1/nivel');
insert into conjuros values (null,'4','Clerigo','','inmunidad a conjuros','el receptor es inmune a conjuros/4 niveles');
insert into conjuros values (null,'4','Clerigo','','neutralizar venenos','inmuniza al objetivo frente al veneno, desintoxica el veneno que cubra o invada  al receptor');
insert into conjuros values (null,'4','Clerigo','','poder divino','ganas bonificadores de ataque, +6 fuerza y +1pg/nivel');
insert into conjuros values (null,'4','Clerigo','','recado','lleva instantaneamente un mensaje corto a cualquier lugar');
insert into conjuros values (null,'4','Clerigo','','veneno','tu toque inflige 1d10 puntos de daño a la constitucion, que se repiten al cabo de 1 minuto');
insert into conjuros values (null,'4','Clerigo','','custodia contra la muerte','inmuniza contra conjuros ddee muerte y efectos de energia negativa');
insert into conjuros values (null,'5','Clerigo','','comunion','la deidad respone con un si o un no a una pregunta/nivel');
insert into conjuros values (null,'5','Clerigo','','curar heridas leves en grupo','cura 1d8 +1/nivel al grupo');
insert into conjuros values (null,'5','Clerigo','','descarga flamigera','castiga a los enemigos con el fuego divino qd6 daño/nivel');
insert into conjuros values (null,'5','Clerigo','','infligir heridas leves en grupo','inflige  1d8 al grupo +1/nivel');
insert into conjuros values (null,'5','Clerigo','','rematar a los vivos','tu ataque de toque mata al receptor');
insert into conjuros values (null,'5','Clerigo','','rc','el receptor gana rc +12');
insert into conjuros values (null,'5','Clerigo','','revivir a los muertos','devuelve la vida a un receptor que muriera, como mucho hace 1dia/level');
insert into conjuros values (null,'5','Clerigo','','vision verdadera','te permite ver todo como es en realidad');
insert into conjuros values (null,'6','Clerigo','','animar los objetos','los objetos atacan a tus enemigos');
insert into conjuros values (null,'6','Clerigo','','barrera de cuchillas','las cuchillas que te rodean infligen 1d6 de daño/nivel');
insert into conjuros values (null,'6','Clerigo','','curar heridas moderadas en grupo','cura 2d8 pg +1 /nivel');
insert into conjuros values (null,'6','Clerigo','','dañar','inflige 10 puntos/nivel de daño al objetivo');
insert into conjuros values (null,'6','Clerigo','','infligir heridas moderadas en grupo','daña 2d8 +1/nivel al grupo');
insert into conjuros values (null,'6','Clerigo','','matar muertos vivientes','destruye 1d4 dg/nivel muertos vivientes (maximo 20d4)');
insert into conjuros values (null,'6','Clerigo','','palabra de regreso','te teletransporta de vuelta hasta el lugar designado');
insert into conjuros values (null,'6','Clerigo','','sanar','cura 10 puntos de daño/nivel todas las enfermedades y todas las condiciones mentales');

insert into pertenencias values(null,'abrojos');
insert into pertenencias values(null,'aceite(frasco de 1 pinta)');
insert into pertenencias values(null,'aguja de costura');
insert into pertenencias values(null,'antorcha');
insert into pertenencias values(null,'bolsa(para el cinto)');
insert into pertenencias values(null,'botija');
insert into pertenencias values(null,'cuerda de cañamo(50pies)');
insert into pertenencias values(null,'estuche(para mapas)');
insert into pertenencias values(null,'frasco');
insert into pertenencias values(null,'lampara corriente');
insert into pertenencias values(null,'manta de invierno');
insert into pertenencias values(null,'mochila vacia');
insert into pertenencias values(null,'odre');
insert into pertenencias values(null,'olla de hierro');
insert into pertenencias values(null,'papel');
insert into pertenencias values(null,'pedernal y acero');
insert into pertenencias values(null,'petate');
insert into pertenencias values(null,'piedra de afilar');
insert into pertenencias values(null,'raciones de viaje');
insert into pertenencias values(null,'vial');
insert into pertenencias values(null,'muda de artesano');
insert into pertenencias values(null,'muda de noble');
insert into pertenencias values(null,'muda de viajero');
insert into pertenencias values(null,'muda de plebeyo');
insert into pertenencias values(null,'muda de invierno');

insert into armas values (null,'alabarda','1d10','x3');
insert into armas values (null,'espadon','2d6','19-20/x2');
insert into armas values (null,'gran hacha','1d12','x3');
insert into armas values (null,'daga','1d4','19-20/x2');
insert into armas values (null,'maza ligera','1d6','x2');
insert into armas values (null,'puñal','1d4','x3');
insert into armas values (null,'lanza corta','1d6','x2');
insert into armas values (null,'lanza larga','1d8','x3');
insert into armas values (null,'ballesta ligera','1d8','19-20/x2');
insert into armas values (null,'ballesta pesada','1d10','19-20/x2');
insert into armas values (null,'habalina','1d6','x2');
insert into armas values (null,'espada corta','1d6','19-20/x2');
insert into armas values (null,'espada larga','1d8','19-20/x2');
insert into armas values (null,'estoque','1d6','18-20/x2');
insert into armas values (null,'guadaña','2d4','x4');
insert into armas values (null,'arco corto','1d6','x3');
insert into armas values (null,'arco largo','1d8','x3');
insert into armas values (null,'espada bastarda','1d10','19-20/x2');

insert into protecciones values (null,'acolchada','+1','ligera');
insert into protecciones values (null,'cuero','+2','ligera');
insert into protecciones values (null,'cuero tachonado','+3','ligera');
insert into protecciones values (null,'camisote de mallas','+4','ligera');
insert into protecciones values (null,'pieles','+3','intermedia');
insert into protecciones values (null,'cota de escamas','+4','intermedia');
insert into protecciones values (null,'cota de mallas','+5','intermedia');
insert into protecciones values (null,'coraza','+5','intermedia');
insert into protecciones values (null,'protecciones laminada','+6','pesada');
insert into protecciones values (null,'cota de bandas','+6','pesada');
insert into protecciones values (null,'protecciones de placa y mallas','+7','pesada');
insert into protecciones values (null,'protecciones completa','+8','pesada');
insert into protecciones values (null,'broquela','+1','escudo');
insert into protecciones values (null,'escudo ligero de madera','+1','escudo');
insert into protecciones values (null,'escudo ligero de acero','+1','escudo');
insert into protecciones values (null,'escudo pesado de madera','+2','escudo');
insert into protecciones values (null,'escudo pesado de acero','+2','escudo');
insert into protecciones values (null,'escudo paves','+4','escudo');

insert into habilidades values (null,'concentracion','mago','inteligencia');
insert into habilidades values (null,'concetracion','clerigo','sabiduria');
insert into habilidades values (null,'conocimiento de conjuros','mago','inteligencia');
insert into habilidades values (null,'conocimiento de conjuros','clerigo','inteligencia');
insert into habilidades values (null,'descifrar escritura','mago','inteligencia');
insert into habilidades values (null,'sanar','clerigo','sabiduria');
insert into habilidades values (null,'inutilizar mecanismo','guerrero','destreza');
insert into habilidades values (null,'juego de manos','guerrero','destreza');
insert into habilidades values (null,'abrir cerraduras','guerrero','destreza');
insert into habilidades values (null,'averiguar intenciones','','sabiduria');
insert into habilidades values (null,'avistar','','sabiduria');
insert into habilidades values (null,'buscar','','inteligencia');
insert into habilidades values (null,'diplomacia','','carisma');
insert into habilidades values (null,'engañar','','carisma');
insert into habilidades values (null,'esconderse','','destreza');
insert into habilidades values (null,'escuchar','','sabiduria');
insert into habilidades values (null,'intimidar','','carisma');
insert into habilidades values (null,'montar','','destreza');
insert into habilidades values (null,'moverse sigilosamente','','destreza');
insert into habilidades values (null,'nadar','','fuerza');
insert into habilidades values (null,'reunir informacion','','carisma');
insert into habilidades values (null,'saltar','','fuerza');
insert into habilidades values (null,'tasacion','','inteligencia');
insert into habilidades values (null,'trepar','','fuerza');

insert into guerrero values(1,10,'+1',2,0,0,1,8);
insert into guerrero values(2,15,'+2',3,0,0,2,12);
insert into guerrero values(3,20,'+3',3,1,1,2,16);
insert into guerrero values(4,25,'+4',4,1,1,3,20);
insert into guerrero values(5,30,'+5',4,1,1,3,24);
insert into guerrero values(6,35,'+6/+1',5,2,2,4,28);
insert into guerrero values(7,40,'+7/+2',5,2,2,4,32);
insert into guerrero values(8,45,'+8/+3',6,2,2,5,36);
insert into guerrero values(9,50,'+9/+4',7,3,3,5,40);
insert into guerrero values(10,55,'+10/+5',7,3,3,6,44);
insert into guerrero values(11,60,'+11/+6/+1',8,4,4,6,48);

insert into mago values(1,6,1,2,'+0',0,0,2,1,12);
insert into mago values(2,9,1,2,'+1',0,0,3,1,18);
insert into mago values(3,12,2,2,'+1',1,1,3,1,24);
insert into mago values(4,15,2,3,'+2',1,1,4,1,30);
insert into mago values(5,18,3,3,'+2',1,1,4,2,36);
insert into mago values(6,21,3,3,'+3',2,2,5,2,42);
insert into mago values(7,24,4,4,'+3',2,2,5,2,48);
insert into mago values(8,27,4,4,'+4',2,2,6,3,54);
insert into mago values(9,30,5,5,'+4',3,3,6,3,60);
insert into mago values(10,33,5,5,'+5',3,3,7,3,66);
insert into mago values(11,36,6,5,'+5',3,3,7,4,72);

insert into clerigo values (1,8,1,2,'+0',2,0,2,1,10);
insert into clerigo values (2,12,1,2,'+1',3,0,3,1,15);
insert into clerigo values (3,16,2,2,'+2',3,1,3,1,20);
insert into clerigo values (4,20,2,3,'+3',4,1,4,2,25);
insert into clerigo values (5,24,3,3,'+3',4,1,4,2,30);
insert into clerigo values (6,28,3,3,'+4',5,2,5,2,35);
insert into clerigo values (7,32,4,4,'+5',5,2,5,3,40);
insert into clerigo values (8,36,4,4,'+6/1',6,2,6,3,45);
insert into clerigo values (9,40,5,4,'+6/1',6,3,6,3,50);
insert into clerigo values (10,44,5,5,'+7/2',7,3,7,4,55);
insert into clerigo values (11,48,6,5,'+8/3',7,3,7,4,60);

insert into experiencia values (1,0,1);
insert into experiencia values (2,1000,1);
insert into experiencia values (3,3000,2);
insert into experiencia values (4,6000,2);
insert into experiencia values (5,10000,2);
insert into experiencia values (6,15000,3);
insert into experiencia values (7,21000,3);
insert into experiencia values (8,28000,3);
insert into experiencia values (9,36000,4);
insert into experiencia values (10,45000,4);
insert into experiencia values (11,55000,4);

