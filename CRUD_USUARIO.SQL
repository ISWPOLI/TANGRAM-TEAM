/*****************************************************************************************/
Select * from 
tbl_usuario 
where ID_USUARIO = \"$key_row\"

/*****************************************************************************************/

UPDATE tbl_usuario 
set 
NOMBRE = \"$this->NOMBRE\", 
APELLIDO = \"$this->APELLIDO\", I
DENTIFICACION = \"$this->IDENTIFICACION\", 
PASSWORD = \"$this->PASSWORD\", 
CELULAR = \"$this->CELULAR\", 
CORREO_ELECTRONICO = \"$this->CORREO_ELECTRONICO\", 
CODIGO_DE_BARRAS = \"$this->CODIGO_DE_BARRAS\", 
ID_ROL = \"$this->ID_ROL\", 
ID_ALIADOS = \"$this->ID_ALIADOS\" 
where 
ID_USUARIO = \"$this->ID_USUARIO\"

/*****************************************************************************************/

Insert into tbl_usuario (
NOMBRE, 
APELLIDO,
 IDENTIFICACION, 
PASSWORD, 
CELULAR, 
CORREO_ELECTRONICO, 
CODIGO_DE_BARRAS, 
ID_ROL, 
ID_ALIADOS) 

values (\"$this->NOMBRE\", 
\"$this->APELLIDO\", 
\"$this->IDENTIFICACION\",
 \"$this->PASSWORD\",
 \"$this->CELULAR\", 
\"$this->CORREO_ELECTRONICO\", 
\"$this->CODIGO_DE_BARRAS\", 
\"$this->ID_ROL\", 
\"$this->ID_ALIADOS\")
/*****************************************************************************************/ 