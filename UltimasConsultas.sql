1 yayayyaya

reporte cantidad envios por domiciliario
roles
 domiciliario
entradas
 codigo barras, fecha inicial, fecha final, id restaurante
salida
cantidad envios


select count(*) as cantidad_de_domicilios
from randys.TBL_RESTAURANTE     rest,
	 randys.TBL_ENVIO 		     envio,
	 randys.TBL_USUARIO         usuario
Where rest.id_restaurante  			 = envio.id_restaurante
and   envio.id_usuario     			 = usuario.id_usuario
and  DATE_FORMAT(envio.fecha_hora_llegada,'%Y-%m-%d') between  '2017-11-16' and '2017-11-18'
group by rest.ID_RESTAURANTE,usuario.CODIGO_DE_BARRAS,usuario.ID_USUARIO,usuario.NOMBRE,usuario.APELLIDO,rest.NOMBRE_SEDE
having usuario.CODIGO_DE_BARRAS = 211111160006
and    rest.ID_RESTAURANTE = 3;
/*******************************************************/

2 yayayya
reporte cantidad envios por domiciliario 
roles
 supervisor, despachador
entradas
 idusuario, fecha inicial, fecha final
salida
 cantidad envios

select 
count(*) as cantidad_de_domicilios
from randys.TBL_RESTAURANTE     rest,
	 randys.TBL_ENVIO 		     envio,
	 randys.TBL_USUARIO         usuario
Where rest.id_restaurante  			 = envio.id_restaurante
and   envio.id_usuario     			 = usuario.id_usuario
and  DATE_FORMAT(envio.fecha_hora_llegada,'%Y-%m-%d') between  '2017-11-16' and '2017-11-18'
group by rest.ID_RESTAURANTE
having    rest.ID_RESTAURANTE = 3;
/***********************************************************/


3 yayayaya
reporte cantidad envios por restaurante
roles
 supervisor
entradas
 idrestaurante, fecha inicial, fecha final
salida
cantidad envios 


select 
count(*) as cantidad_de_domicilios
from randys.TBL_RESTAURANTE     rest,
	 randys.TBL_ENVIO 		     envio,
	 randys.TBL_USUARIO         usuario
Where rest.id_restaurante  			 = envio.id_restaurante
and   envio.id_usuario     			 = usuario.id_usuario
and  DATE_FORMAT(envio.fecha_hora_llegada,'%Y-%m-%d') between  '2017-11-16' and '2017-11-18'
group by rest.ID_RESTAURANTE
having    rest.ID_RESTAURANTE = 3;

/***********************************************************/

4
reporte envios por restaurante (listado) yaaaaaaaaaaaaaaaaa
roles
 supervisor
entradas
 idrestaurante, fecha inicial, fecha final
salida
 fecha, hora salida, hora llegada, idenvio, idusuario


select 
DATE_FORMAT(envio.FECHA_HORA_SALIDA,'%d-%m-%y') fecha,
DATE_FORMAT(envio.FECHA_HORA_SALIDA,'%h-%i-%s') hora_salida,
DATE_FORMAT(envio.FECHA_HORA_LLEGADA,'%h-%i-%s') hora_llegada,
envio.ID_ENVIO,
usuario.ID_USUARIO,
count(*) as cantidad_de_domicilios
from randys.TBL_RESTAURANTE     rest,
	 randys.TBL_ENVIO 		     envio,
	 randys.TBL_USUARIO         usuario
Where rest.id_restaurante  			 = envio.id_restaurante
and   envio.id_usuario     			 = usuario.id_usuario
and  DATE_FORMAT(envio.fecha_hora_llegada,'%Y-%m-%d') between  '2017-11-16' and '2017-11-17'
and    rest.ID_RESTAURANTE = 3
group by 
envio.FECHA_HORA_SALIDA,
envio.FECHA_HORA_LLEGADA,
envio.ID_ENVIO,
usuario.ID_USUARIO;


/***********************************************************/
6 yayayaya

reporte de envios por domiciliario (listado)
roles
 domiciliario
entradas
 codigo barras, fecha inicial, fecha final, id restaurante
salida
 fecha, hora salida, hora llegada, idenvio


select 
DATE_FORMAT(envio.FECHA_HORA_SALIDA,'%d-%m-%Y') fecha,
DATE_FORMAT(envio.FECHA_HORA_SALIDA,'%h-%i-%s') hora_salida,
DATE_FORMAT(envio.FECHA_HORA_LLEGADA,'%h-%i-%s') hora_llegada,
envio.ID_ENVIO
from randys.TBL_RESTAURANTE     rest,
	 randys.TBL_ENVIO 		     envio,
	 randys.TBL_USUARIO         usuario
Where rest.id_restaurante  			 = envio.id_restaurante
and   envio.id_usuario     			 = usuario.id_usuario
and usuario.CODIGO_DE_BARRAS = 211111160006
and  DATE_FORMAT(envio.fecha_hora_llegada,'%Y-%m-%d') between  '2017-11-16' and '2017-11-17'

and    rest.ID_RESTAURANTE = 3
group by 
envio.FECHA_HORA_SALIDA,
envio.FECHA_HORA_LLEGADA,
envio.ID_ENVIO;



/***********************************************************/
7 yuayyayay
 reporte de envios por domiciliario (listado)
roles
 supervisor, despachador
entradas
 idusuario, fecha inicial, fecha final
salida
 fecha, hora salida, hora llegada, idenvio, idrestaurante, tiempo trascurrido


 
select 
DATE_FORMAT(envio.FECHA_HORA_SALIDA,'%d-%i-%Y') fecha,
DATE_FORMAT(envio.FECHA_HORA_SALIDA,'%h-%i-%s') hora_salida,
DATE_FORMAT(envio.FECHA_HORA_LLEGADA,'%h-%i-%s') hora_llegada,
envio.ID_ENVIO,
rest.ID_RESTAURANTE,
SEC_TO_TIME((TIMESTAMPDIFF(MINUTE , envio.FECHA_HORA_SALIDA, envio.FECHA_HORA_LLEGADA ))*60) AS tiempo_transcurrido
from randys.TBL_RESTAURANTE     rest,
	 randys.TBL_ENVIO 		     envio,
	 randys.TBL_USUARIO         usuario
Where rest.id_restaurante  			 = envio.id_restaurante
and   envio.id_usuario     			 = usuario.id_usuario
and usuario.id_usuario = 7
and  DATE_FORMAT(envio.fecha_hora_llegada,'%Y-%m-%d') between  '2017-11-16' and '2017-11-18'
group by 
envio.FECHA_HORA_SALIDA,
envio.FECHA_HORA_LLEGADA,
envio.ID_ENVIO,
rest.ID_RESTAURANTE;



/***********************************************************/
8 yayaya
reporte de estado de envios activos (listado)
roles 
supervisor, despachador
entradas
id restaurante, fecha
salida
idenvio, domicliario asignado, fechahora salida, tiempo trascurrido


select 
envio.ID_ENVIO,
concat(usuario.NOMBRE,' ', usuario.apellido) NOMBRE,
envio.FECHA_HORA_SALIDA,
SEC_TO_TIME((TIMESTAMPDIFF(MINUTE , envio.FECHA_HORA_SALIDA, envio.FECHA_HORA_LLEGADA ))*60) AS tiempo_transcurrido
from randys.TBL_RESTAURANTE     rest,
	 randys.TBL_ENVIO 		     envio,
	 randys.TBL_USUARIO         usuario
Where rest.id_restaurante  			 = envio.id_restaurante
and   envio.id_usuario     			 = usuario.id_usuario
and    rest.ID_RESTAURANTE = 3
and   envio.ESTADO_ENVIO =  1
and   envio.FECHA_HORA_SALIDA =  '2017-11-18 23:23:34'
group by 
envio.FECHA_HORA_SALIDA,
envio.FECHA_HORA_LLEGADA,
envio.ID_ENVIO,
rest.ID_RESTAURANTE;
/***********************************************************/

9 YAYAYA
reporte de domiciliarios activos  (listado)
roles
supervisor, despachador
entradas
id restaurante, fecha
salida
domiciliario, hora entrada, cantidad domiclios del dia, estado(enprocesdernvio, disponible)



select distinct envio.id_envio,usuariop.NOMBRE, usuariop.APELLIDO,
       DATE_FORMAT(registro.FECHA_HORA_LLEGADA,'%r') hora_llegada,
	  (select count(*) as cantidad_de_domicilios
			from randys.TBL_RESTAURANTE     rest1,
				 randys.TBL_ENVIO 		     envio1,
				 randys.TBL_USUARIO         usuario
			Where rest1.id_restaurante  			 = envio.id_restaurante
			and   envio1.id_usuario     			 = usuariop.id_usuario
			and usuario.id_usuario 				 = usuariop.ID_USUARIO
            and DATE_FORMAT(envio.fecha_hora_llegada,'%Y-%m-%d') = '2017-11-19') cantidad_domicilios,
            estado.DESCRIPCION_ESTADO
from randys.TBL_RESTAURANTE          rest,
	 randys.TBL_ENVIO 		         envio,
	 randys.TBL_USUARIO         	 usuariop,
	 randys.tbl_estado_domiciliarios estado,
     randys.tbl_registro_laboral     registro
Where rest.id_restaurante  			 = envio.id_restaurante
and   envio.id_usuario     			 = usuariop.id_usuario
and  ( usuariop.id_usuario			 = estado.id_usuario 
										and estado.id_estado_domiciliarios in 
                                        (select max(id_estado_domiciliarios) 
                                        from tbl_estado_domiciliarios c  where c.id_usuario = estado.id_usuario) )
and   registro.id_usuario            = usuariop.id_usuario
and   envio.estado_envio            = 1
and   rest.ID_RESTAURANTE = 1
and   DATE_FORMAT(envio.fecha_hora_llegada,'%Y-%m-%d') = '2017-11-19'
and   DATE_FORMAT(registro.fecha_hora_llegada,'%Y-%m-%d') = '2017-11-19';


/***********************************************************/


10 YAYAYAY

reporte de eficiencia por domiciliario
roles
supervisor, despachador
entradas
idusuario, fecha inicial, fecha final
salida
tiempo promedio, tiempo maximo, tiempo minimo, cantidad pedidos


select
min(SEC_TO_TIME((TIMESTAMPDIFF(MINUTE , envio.FECHA_HORA_SALIDA, envio.FECHA_HORA_LLEGADA ))*60)) AS tiempo_minimo_hh_min_ss, 
max(SEC_TO_TIME((TIMESTAMPDIFF(MINUTE , envio.FECHA_HORA_SALIDA, envio.FECHA_HORA_LLEGADA ))*60)) AS tiempo_maximo_hh_min_ss,
SEC_TO_TIME(((min(TIMESTAMPDIFF(MINUTE , envio.FECHA_HORA_SALIDA, envio.FECHA_HORA_LLEGADA ))+max(TIMESTAMPDIFF(MINUTE , envio.FECHA_HORA_SALIDA, envio.FECHA_HORA_LLEGADA )))/2)*60) tiempo_promedio_hh_min_ss,
 (select count(*) as cantidad_de_domicilios
			from randys.TBL_RESTAURANTE     rest1,
				 randys.TBL_ENVIO 		     envio1,
				 randys.TBL_USUARIO         usuario
			Where rest1.id_restaurante  			 = envio.id_restaurante
			and   envio1.id_usuario     			 = usuariop.id_usuario
			and usuario.id_usuario 				 = usuariop.ID_USUARIO
			and DATE_FORMAT(envio1.fecha_hora_llegada,'%Y-%m-%d') between '2017-11-19' and '2017-11-19') cantidad_domicilios
from randys.TBL_RESTAURANTE     rest,
	 randys.TBL_ENVIO 		     envio,
	 randys.TBL_USUARIO         usuariop
Where rest.id_restaurante  		 = envio.id_restaurante
and   envio.id_usuario     	     = usuariop.id_usuario
and   envio.estado_envio         = 0
and DATE_FORMAT(envio.fecha_hora_llegada,'%Y-%m-%d') between '2017-11-19' and '2017-11-19'
group by
usuariop.ID_USUARIO
having usuariop.ID_USUARIO = 7;


11 
reporte de domiciliarios activos que hicieron su registro de entrada
roles
domiciliario
entradas
idrestaurante, fecha dia, 
salida
nombre apellido, hora entrada restaurante, cantidad envios durante el dia, estado (disponible, ocupado)

select distinct usuariop.NOMBRE, usuariop.APELLIDO,
       DATE_FORMAT(registro.FECHA_HORA_LLEGADA,'%r') hora_llegada,
	  (select count(*) as cantidad_de_domicilios
			from randys.TBL_RESTAURANTE     rest1,
				 randys.TBL_ENVIO 		     envio1,
				 randys.TBL_USUARIO         usuario
			Where rest1.id_restaurante  			 = envio.id_restaurante
			and   envio1.id_usuario     			 = usuariop.id_usuario
			and usuario.id_usuario 				 = usuariop.ID_USUARIO
            and DATE_FORMAT(envio.fecha_hora_llegada,'%Y-%m-%d') = '2017-11-19') cantidad_domicilios,
            estado.DESCRIPCION_ESTADO
from randys.TBL_RESTAURANTE          rest,
	 randys.TBL_ENVIO 		         envio,
	 randys.TBL_USUARIO         	 usuariop,
	 randys.tbl_estado_domiciliarios estado,
     randys.tbl_registro_laboral     registro
Where rest.id_restaurante  			 = envio.id_restaurante
and   envio.id_usuario     			 = usuariop.id_usuario
and  ( usuariop.id_usuario			 = estado.id_usuario 
										and estado.id_estado_domiciliarios in 
                                        (select max(id_estado_domiciliarios) 
                                        from tbl_estado_domiciliarios c  where c.id_usuario = estado.id_usuario) )
and   registro.id_usuario            = usuariop.id_usuario
and   rest.ID_RESTAURANTE = 1
and   DATE_FORMAT(envio.fecha_hora_llegada,'%Y-%m-%d') = '2017-11-19'
and   DATE_FORMAT(registro.fecha_hora_llegada,'%Y-%m-%d') = '2017-11-19';





