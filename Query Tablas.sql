USE PERSIANAS

BEGIN TRAN 



create table MOTOR(
idMotor int IDENTITY(1,1),
tipoProducto varchar(100),
descripcionMotor varchar(100),
detalleMotor varchar(100),
dimensionesMotor varchar(100),
lienxosMotor	 varchar(45),
carreraMotor	 varchar(45),
precioMotor	 float,
activacion	varchar(45),
voltaje		varchar(45),
tubo	varchar(45),
RPM	varchar(45),
amperaje	varchar(45));

Create Table PRODUCTOSUNO(
idProducto	int IDENTITY(1,1),
tipoProducto	varchar(100),
tipoPresentacionProducto	varchar(100),
tipoTelaProducto	varchar(100),
telaProducto	varchar(100),
ahchoProducto	float,
Precio		float
);

Create Table COLORESPRODUCTO(
idColor	int IDENTITY(1,1),
nombreTela  varchar(100),
colorTela varchar(100)
);

create table Cover_Light (
idCover_Light	  	int,
codigoCover_Light	varchar(45),
nombreCover_Light	varchar(45),
precioCover_Light	float,
tipoProductoCover_Light	varchar(45));

create table Direccion_Tela (
idDireccion_Tela	  	int,
codigoDireccion_Tela	varchar(45),
nombreDireccion_Tela	varchar(45),
precioDireccion_Tela	float,
tipoProductoDireccion_Tela	varchar(45));

create table Junto_Item (
idJunto_Item	  	int,
codigoJunto_Item	varchar(45),
nombreJunto_Item	varchar(45),
precioJunto_Item	float,
tipoProductoJunto_Item	varchar(45));

create table Mando (
idMando	  	int,
codigoMando	varchar(45),
nombreMando	varchar(45),
precioMando	float,
tipoProductoMando	varchar(45));

create table Mismo_Cabezal (
idMismo_Cabezal	  	int,
codigoMismo_Cabezal	varchar(45),
nombreMismo_Cabezal	varchar(45),
precioMismo_Cabezal	float,
tipoProductoMismo_Cabezal	varchar(45));


create table PERFIL(
idPerfil	  	int IDENTITY(1,1),
tipoPerfil varchar(45),
nombrePerfil varchar(45),
colorPerfil varchar(45));


create table Sentido (
idSentido	  	int,
codigoSentido	varchar(45),
nombreSentido	varchar(45),
precioSentido	float,
tipoProductoSentido	varchar(45));

create table Soporte_Intermedio (
idSoporte_Intermedio	  	int,
codigoSoporte_Intermedio	varchar(45),
nombreSoporte_Intermedio	varchar(45),
precioSoporte_Intermedio	float,
tipoProductoSoporte_Intermedio	varchar(45));

create table USUTRADE
(
BRUTO MONEY,
DESCUENTO MONEY,
FACTURADO INT,
FECHA DATE,
CODCLIENTE VARCHAR(100),
NRODCTO VARCHAR(45),
ORIGEN VARCHAR(45),
TIPODCTO VARCHAR(45)
);

CREATE TABLE USUMVTRADE(
IDPRODUCTO	int IDENTITY(1,1),
BODEGA		VARCHAR(45),
CANTIDAD	VARCHAR(45),
CONSECUT	VARCHAR(45),
COSTO		MONEY,
DESCUENTO	VARCHAR(45),
DETALLE		VARCHAR(255),
FECHA		DATE,
IVA		VARCHAR(45),
NOMBRE		VARCHAR(45),
NOTA		VARCHAR(45),
NRODCTO		VARCHAR(45),
PRODUCTO	VARCHAR(255),
TIPODCTO	VARCHAR(45),
ORIGEN		VARCHAR(45),
VALORUNIT	VARCHAR(45),
ALTO		FLOAT,
ANCHO		FLOAT

);

INSERT INTO Cover_Light VALUES ('1 ','cov-li2016734556 ','SI ','18000 ','ENROLLABLE ');
INSERT INTO Cover_Light VALUES ('2 ','cov-lig2016110283 ','SI ','18000 ','SHEER ');
INSERT INTO Direccion_Tela VALUES ('1 ','dirtela-2016736545 ','NORMAL ','400 ','ENROLLABLE ');
INSERT INTO Direccion_Tela VALUES ('2 ','dirtela-2016192236 ','ATRAVESADA ','100 ','ENROLLABLE ');
INSERT INTO Direccion_Tela VALUES ('3 ','dirtela-2016665428 ','ATRAVESADA Y ANADIDA ','200 ','ENROLLABLE ');
INSERT INTO Junto_Item VALUES ('1 ','sig-item2016883349 ','AL SIGUIENTE ITEM ','55 ','SHEER ');
INSERT INTO Junto_Item VALUES ('2 ','sig-item2016447755 ','AL ANTERIOR ITEM ','44 ','SHEER ');
INSERT INTO Mando VALUES ('1 ','mando-20163423345 ','IZQUIERDO ','12000 ','ENROLLABLE ');
INSERT INTO Mando VALUES ('2 ','mando-2016876436 ','DERECHO ','1500 ','ENROLLABLE ');
INSERT INTO Mando VALUES ('3 ','mando-201676545 ','IZQUIERDO ','654 ','SHEER ');
INSERT INTO Mando VALUES ('4 ','mando-2016367283 ','DERECHO ','765 ','SHEER ');
INSERT INTO Mismo_Cabezal VALUES ('1 ','mismo-ca2016874789 ','JUNTO AL SIGUIENTE ','777 ','SHEER ');
INSERT INTO Mismo_Cabezal VALUES ('2 ','mismo-ca2016877435 ','JUNTO AL ANTERIOR ','666 ','SHEER ');
INSERT INTO Mismo_Cabezal VALUES ('3 ','mismo-ca2016338495 ','JUNTO CON EL ANTERIOR Y SIGUIENTE ','333 ','SHEER ');
INSERT INTO Perfil VALUES ('1 ','perfil2016998454 ','ESTANDAR ','767657 ','ENROLLABLE ');
INSERT INTO Perfil VALUES ('2 ','perfil2016874456 ','ELITE ','675 ','ENROLLABLE ');
INSERT INTO Perfil VALUES ('3 ','perfil2016874895 ','PREMIUM ','76687 ','ENROLLABLE ');
INSERT INTO Sentido VALUES ('1 ','sentido-2016538498 ','NORMAL ','0 ','ENROLLABLE ');
INSERT INTO Sentido VALUES ('2 ','sentido-2016873948 ','CONTRARIO-NVR ','550 ','ENROLLABLE ');
INSERT INTO Sentido VALUES ('3 ','sentido-2016968775 ','NORMAL ','765 ','SHEER ');
INSERT INTO Sentido VALUES ('4 ','sentido-2016876347 ','CONTRARIO-NVR ','454 ','SHEER ');
INSERT INTO Soporte_Intermedio VALUES ('1 ','sop-inter2016847384 ','DEPENDIENTE ','1000 ','ENROLLABLE ');
INSERT INTO Soporte_Intermedio VALUES ('2 ','sop-inter2016899435 ','INDEPENDIENTE ','340 ','ENROLLABLE ');
INSERT INTO Soporte_Intermedio VALUES ('3 ','sop-inter2016876645 ','DEPENDIENTE ','110 ','SHEER ');
INSERT INTO Soporte_Intermedio VALUES ('4 ','sop-inter2016993346 ','INDEPENDIENTE ','120 ','SHEER ');



alter table mtprocli add PASSWORDLOG VARCHAR(45);




INSERT INTO MTPROCLI 
(DETALLE, FECHAING, NIT, NOMBRE, PASSWORDLOG)
VALUES
('0', GETDATE(), '852963', 'USUARIO PRUEBA', 'PRUEBA');