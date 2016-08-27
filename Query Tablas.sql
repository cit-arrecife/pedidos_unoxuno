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

CREATE TABLE COLORESPRODUCTO(
tipoTela Varchar(60),
nombreTela Varchar(60),
colorTela	Varchar(60)
);

create table PRECIOSSHEER (
id int IDENTITY(1,1),
Anmin	float,
Anmax	float,
Almin	float,
Almax	float,
Tipo	varchar(100),
precio int
);

CREATE TABLE COLORACCESORIOS (
id int IDENTITY(1,1),
producto varchar(50),
color varchar(50) 
)




create table Cover_Light (
idCover_Light	  	int,
codigoCover_Light	varchar(45),
nombreCover_Light	varchar(45),
precioCover_Light	float,
tipoProductoCover_Light	varchar(45));



create table PERFIL(
idPerfil	  	int IDENTITY(1,1),
tipoPerfil varchar(45),
nombrePerfil varchar(45),
colorPerfil varchar(45));


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
ANCHO		FLOAT,
OBSERVACIONES VARCHAR(255)

);

INSERT INTO Cover_Light VALUES ('1 ','cov-li2016734556 ','SI ','18000 ','ENROLLABLE ');
INSERT INTO Cover_Light VALUES ('2 ','cov-lig2016110283 ','SI ','18000 ','SHEER ');

alter table mtprocli add PASSWORDLOG VARCHAR(45);

INSERT INTO MTPROCLI 
(DETALLE, FECHAING, NIT, NOMBRE, PASSWORDLOG)
VALUES
('0', GETDATE(), '852963', 'USUARIO PRUEBA', 'PRUEBA');



INSERT INTO MOTOR VALUES
('PANEL JAPONES','Vertilix-DM-00001',	'NULL',	'NULL',	'NULL',	'AUTOMATICO',	'1200000',	'ALAMBRICO',	'24 vol',	'N/A',	'NULL',	'2,7 A')

INSERT INTO MOTOR VALUES
('PANEL JAPONES','Vertilix-DM-00001',	'NULL',	'NULL',	'NULL',	'AUTOMATICO',	'1200000',	'RADIOFRECUENCIA',	'24 vol',	'N/A',	'NULL',	'2,7 A')





COMMIT