/*********************************************************************************/
INSERT INTO `repaso`.`tbl_rol`(`NOMBRE_ROL`) VALUES('ADMINISTRADOR');
INSERT INTO `repaso`.`tbl_rol`(`NOMBRE_ROL`) VALUES('ADMINISTRADOR_OPERATIVO');
INSERT INTO `repaso`.`tbl_rol`(`NOMBRE_ROL`) VALUES('DESPACHADOR');
INSERT INTO `repaso`.`tbl_rol`(`NOMBRE_ROL`) VALUES('DOMICILIARIO');
/*********************************************************************************/


/*********************************************************************************/
INSERT INTO `repaso`.`tbl_aliados` (`NOMBRE`) VALUES('Servicios a domicilio s.a');
INSERT INTO `repaso`.`tbl_aliados` (`NOMBRE`) VALUES ('no tiene aliados');
/*********************************************************************************/


INSERT INTO `repaso`.`tbl_restaurante` (`NOMBRE_SEDE`) VALUES ('RANDYS');
INSERT INTO `repaso`.`tbl_restaurante` (`NOMBRE_SEDE`) VALUES ('ESTAR FOOD');
/*********************************************************************************/


/*********************************************************************************/
INSERT INTO `repaso`.`tbl_factura` (`ID_RESTAURANTE`,`NUMERO_FACTURA`,`ZONA`,`FECHA_FACTUA`)
VALUES (1,2485175,'Norte',CURDATE());
--
INSERT INTO `repaso`.`tbl_factura` (`ID_RESTAURANTE`,`NUMERO_FACTURA`,`ZONA`,`FECHA_FACTUA`)
VALUES (1,2485176,'Orieente',CURDATE());
--
INSERT INTO `repaso`.`tbl_factura` (`ID_RESTAURANTE`,`NUMERO_FACTURA`,`ZONA`,`FECHA_FACTUA`)
VALUES (1,2485177,'Sur',CURDATE());
--
INSERT INTO `repaso`.`tbl_factura` (`ID_RESTAURANTE`,`NUMERO_FACTURA`,`ZONA`,`FECHA_FACTUA`)
VALUES (1,2485178,'Occidente',CURDATE());
--
INSERT INTO `repaso`.`tbl_factura` (`ID_RESTAURANTE`,`NUMERO_FACTURA`,`ZONA`,`FECHA_FACTUA`)
VALUES (1,2485179,'Centro',CURDATE());
/*********************************************************************************/


/*********************************************************************************/
INSERT INTO `repaso`.`tbl_usuraio`(`NOMBRE`,`APELLIDO`,`IDENTIFICACION`,`PASSWORD`,`CELULAR`,`CORREO ELECTRONICO`,
`CODIGO DE BARRAS`,`ID_ROL`,`ID_ALIADOS`)
VALUES('Javier Andres','Martinez',1060801245,45821477,3216574,'javier.lopez@gmail.com','478d5788s66s',4,1);

INSERT INTO `repaso`.`tbl_usuraio`(`NOMBRE`,`APELLIDO`,`IDENTIFICACION`,`PASSWORD`,`CELULAR`,`CORREO ELECTRONICO`,
`CODIGO DE BARRAS`,`ID_ROL`,`ID_ALIADOS`)
VALUES('Pedro Alejandro','Perez',74588414,7842156,7412574,'Pedro.Perez@gmail.com','7444dss66s',4,1);

INSERT INTO `repaso`.`tbl_usuraio`(`NOMBRE`,`APELLIDO`,`IDENTIFICACION`,`PASSWORD`,`CELULAR`,`CORREO ELECTRONICO`,
`CODIGO DE BARRAS`,`ID_ROL`,`ID_ALIADOS`)
VALUES('Juan Carlos','Martinez',1082485414,78888547,32167421,'Juan.Martinez@gmail.com','47s85d788ss6s',4,1);

INSERT INTO `repaso`.`tbl_usuraio`(`NOMBRE`,`APELLIDO`,`IDENTIFICACION`,`PASSWORD`,`CELULAR`,`CORREO ELECTRONICO`,
`CODIGO DE BARRAS`,`ID_ROL`,`ID_ALIADOS`)
VALUES('Carlos Mario','Cadavid',74125845,21264,3217874,'Carlos.Cadavid@gmail.com','fad854788s66s',3,2);

INSERT INTO `repaso`.`tbl_usuraio`(`NOMBRE`,`APELLIDO`,`IDENTIFICACION`,`PASSWORD`,`CELULAR`,`CORREO ELECTRONICO`,
`CODIGO DE BARRAS`,`ID_ROL`,`ID_ALIADOS`)
VALUES('Juan Manuel','Lopez',21458588,7811558,7126574,'Juan.lopez@gmail.com','478d57yy88s66s',2,2);

INSERT INTO `repaso`.`tbl_usuraio`(`NOMBRE`,`APELLIDO`,`IDENTIFICACION`,`PASSWORD`,`CELULAR`,`CORREO ELECTRONICO`,
`CODIGO DE BARRAS`,`ID_ROL`,`ID_ALIADOS`)
VALUES('Jose Luis','Lopez',27304801,78559945,7226574,'Jose.lopez@gmail.com','478d5rrr788s66s',1,2);

INSERT INTO `repaso`.`tbl_usuraio`(`NOMBRE`,`APELLIDO`,`IDENTIFICACION`,`PASSWORD`,`CELULAR`,`CORREO ELECTRONICO`,
`CODIGO DE BARRAS`,`ID_ROL`,`ID_ALIADOS`)
VALUES('Diego','Sanchez',755585414,7822247,7025888,'Juan.Martinez@gmail.com','47s85d788ss6s',4,1);
/*********************************************************************************/




/*********************************************************************************/
INSERT INTO `repaso`.`tbl_envio`(`ID_USUARIO`,`ID_RESTAURANTE`,`FECHA_HORA_LLEGADA`,`FECHA_HORA_SALIDA`)
VALUES(1,1,CURDATE(),CURDATE());

INSERT INTO `repaso`.`tbl_envio`(`ID_USUARIO`,`ID_RESTAURANTE`,`FECHA_HORA_LLEGADA`,`FECHA_HORA_SALIDA`)
VALUES(2,1,CURDATE(),CURDATE());

INSERT INTO `repaso`.`tbl_envio`(`ID_USUARIO`,`ID_RESTAURANTE`,`FECHA_HORA_LLEGADA`,`FECHA_HORA_SALIDA`)
VALUES(3,1,CURDATE(),CURDATE());

INSERT INTO `repaso`.`tbl_envio`(`ID_USUARIO`,`ID_RESTAURANTE`,`FECHA_HORA_LLEGADA`,`FECHA_HORA_SALIDA`)
VALUES(1,1,CURDATE(),CURDATE());

INSERT INTO `repaso`.`tbl_envio`(`ID_USUARIO`,`ID_RESTAURANTE`,`FECHA_HORA_LLEGADA`,`FECHA_HORA_SALIDA`)
VALUES(3,1,CURDATE(),CURDATE());
/*********************************************************************************/


/*********************************************************************************/
INSERT INTO `repaso`.`tbl_envios_factura`(`ID_ENVIO`,`ID_FACTURA`)VALUES(1,1);
INSERT INTO `repaso`.`tbl_envios_factura`(`ID_ENVIO`,`ID_FACTURA`)VALUES(1,2);
INSERT INTO `repaso`.`tbl_envios_factura`(`ID_ENVIO`,`ID_FACTURA`)VALUES(1,3);
INSERT INTO `repaso`.`tbl_envios_factura`(`ID_ENVIO`,`ID_FACTURA`)VALUES(1,4);
INSERT INTO `repaso`.`tbl_envios_factura`(`ID_ENVIO`,`ID_FACTURA`)VALUES(2,5);
/*********************************************************************************/


/*********************************************************************************/
INSERT INTO `repaso`.`tbl_estado_domiciliarios`(`ID_USUARIO`,`DESCRIPCION ESTADO`)VALUES(1,'Ocupado');
INSERT INTO `repaso`.`tbl_estado_domiciliarios`(`ID_USUARIO`,`DESCRIPCION ESTADO`)VALUES(2,'Ocupado');
INSERT INTO `repaso`.`tbl_estado_domiciliarios`(`ID_USUARIO`,`DESCRIPCION ESTADO`)VALUES(3,'Ocupado');
INSERT INTO `repaso`.`tbl_estado_domiciliarios`(`ID_USUARIO`,`DESCRIPCION ESTADO`)VALUES(7,'Disponible');
/*********************************************************************************/


/*********************************************************************************/
INSERT INTO `repaso`.`tbl_registro_laboral`(`ID_USUARIO`,`FECHA_HORA_LLEGADA`,`FECHA_HORA_SALIDA`)VALUES(1,CURDATE(),CURDATE());
INSERT INTO `repaso`.`tbl_registro_laboral`(`ID_USUARIO`,`FECHA_HORA_LLEGADA`,`FECHA_HORA_SALIDA`)VALUES(2,CURDATE(),CURDATE());
INSERT INTO `repaso`.`tbl_registro_laboral`(`ID_USUARIO`,`FECHA_HORA_LLEGADA`,`FECHA_HORA_SALIDA`)VALUES(3,CURDATE(),CURDATE());
INSERT INTO `repaso`.`tbl_registro_laboral`(`ID_USUARIO`,`FECHA_HORA_LLEGADA`,`FECHA_HORA_SALIDA`)VALUES(7,CURDATE(),CURDATE());
/*********************************************************************************/
































