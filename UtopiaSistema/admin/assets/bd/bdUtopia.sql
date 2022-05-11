
CREATE TABLE `administradores` (
  `adm_email` varchar(255) NOT NULL,
  `adm_pass` varchar(255) NOT NULL,
  `adm_nombre` varchar(255) NOT NULL,
  `adm_telefono` varchar(15) NOT NULL,
  `adm_rol` varchar(15) NOT NULL,
  PRIMARY KEY (`adm_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `administradores` VALUES ('111q@111.com','111','111','3046236417','admin');



CREATE TABLE `momentos` (
  `mom_id` int(11) NOT NULL AUTO_INCREMENT,
  `mom_nombre` varchar(255) NOT NULL,
  `mom_color` varchar(16) NOT NULL,
  PRIMARY KEY (`mom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1637782789 DEFAULT CHARSET=latin1;



CREATE TABLE `proyectos_img` (
  `pmg_id` int(11) NOT NULL AUTO_INCREMENT,
  `pry_id` int(11) NOT NULL,
  `pmg_img` varchar(255) NOT NULL,
  `pmg_url` varchar(255) NOT NULL,
  PRIMARY KEY (`pmg_id`),
  KEY `pry_id` (`pry_id`),
  CONSTRAINT `proyectos_img_ibfk_1` FOREIGN KEY (`pry_id`) REFERENCES `proyectos_momento` (`pry_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

CREATE TABLE `pedidos` (
  `ped_id` int(11) NOT NULL AUTO_INCREMENT,
  `ped_nombre` varchar(255) NOT NULL,
  `ped_fecha` varchar(255) NOT NULL,
  `ped_telefono` int(11) NOT NULL,
  `ped_descripcion` varchar(500) NOT NULL,
  `ped_total` int(11) NOT NULL,
  `ped_abono` int(11) NOT NULL,
  `ped_saldo` int(11) NOT NULL,
  `ped_entrega` varchar(255) NOT NULL,
   PRIMARY KEY (`ped_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

CREATE TABLE `proyectos_momento` (
  `pry_id` int(11) NOT NULL AUTO_INCREMENT,
  `mom_id` int(11) NOT NULL,
  `pry_img` varchar(255) NOT NULL,
  `pry_nombre` varchar(255) NOT NULL,
  `pry_contenido` longtext NOT NULL,
  `prov_estado` varchar(16) NOT NULL,
  PRIMARY KEY (`pry_id`),
  KEY `mom_id` (`mom_id`),
  CONSTRAINT `proyectos_momento_ibfk_1` FOREIGN KEY (`mom_id`) REFERENCES `momentos` (`mom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;


CREATE TABLE `videos` (
  `vid_id` int(11) NOT NULL AUTO_INCREMENT,
  `vid_nombre` varchar(255) NOT NULL,
  `vid_archivo` varchar(255) NOT NULL,
  PRIMARY KEY (`vid_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;
