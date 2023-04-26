
use CreditoADS



create Table Estado_cliente(
id_estado_cliente INT IDENTITY(1,1) not null primary key, 
	estado_cliente varchar(50)
);


Insert into Estado_cliente values('Activo'), ('Inactivo'), 
('Bloqueado')

create table Clientes(
id_cliente INT IDENTITY(1,1) not null primary key, 
	nombres varchar(50) not null, 
	apellidos varchar(50) not null, 
	direccion text not null,
	num_telefono varchar(10) not null,
	correo_electronico varchar(50) not null, 
	fecha_nacimiento date not null, 
	estado_civil varchar(50), 
	ocupacion varchar(100) not null, 
	username varchar(50) not null, 
	pass varchar(200) not null, 
	dui varchar(11) not null unique,
	genero varchar (10) not null, 
	fecha_creacion datetime default GETDATE(),
	id_estado_cliente int references Estado_cliente(id_estado_cliente)
);

create table Tipo_cuentas(
	id_tipo_cuenta INT IDENTITY(1,1) not null primary key, 
	tipo_cuenta varchar(100)
);

Insert into Tipo_cuentas values ('Cuenta de ahorro'), ('Cuenta corriente'),
('Cuenta de inversión')



create table Cuentas(
id_cuenta INT IDENTITY(1,1) not null primary key, 
	id_cliente int references Clientes (id_cliente), 
	id_tipo_cuenta int not null references Tipo_cuentas(id_tipo_cuenta), 
	saldo_actual DECIMAL(10,2) not null, 
	fecha_apertura datetime default GETDATE(),
	numero_cuenta bigInt not null
);



create table Tipo_transaccion(
id_tipo_transaccion INT IDENTITY(1, 1) not null primary key,
	tipo_transaccion varchar(100)
);



create table Transaccion(
id_transaccion INT IDENTITY(1, 1) not null primary key, 
	id_cuenta int not null references Cuentas(id_cuenta), 
	fecha_hora_transac datetime default GETDATE(),
	id_tipo_transaccion int not null references Tipo_transaccion(id_tipo_transaccion), 
	cantidad_dinero DECIMAL(10, 2) not null, 
	descripcion text not null

);


create table Tipo_usuario(
id_tipo_usuario  INT IDENTITY(1,1) not null primary key, 
	tipo_usuario varchar(50)

);

insert into Tipo_usuario values ('Asesor de crédito'), ( 'Administrador');

create table Usuarios(
id_usuario INT IDENTITY(1, 1) not null primary key, 
	usuario varchar(50) not null, 
	nombres varchar(50) not null, 
	apellidos varchar(50) not null, 
	pass varchar(150) not null, 
	dui varchar(15) not null, 
	direccion text, 
	id_tipo_usuario int references Tipo_usuario(id_tipo_usuario)

);

create table Estado_prestamo(
id_estado_prestamo INT IDENTITY(1, 1) not null primary key, 
	estado_prestamo varchar(150) not null
);


create table Prestamos(
id_prestamo INT IDENTITY(1, 1) not null primary key, 
	id_cliente int not null references Clientes(id_cliente), 
	fecha_solicitud date not null, 
	monto_prestamo decimal(10, 2), 
	tasa_interes decimal (10, 2), 
	plazo_pago varchar(50) not null, 
	fecha_vencimiento date not null, 
	id_estado_prestamo int not null references Estado_prestamo(id_estado_prestamo)

);


create table Tipo_pago(
id_tipo_pago INT IDENTITY(1, 1) not null primary key, 
	tipo_pago varchar(150)
);



create table Pagos(
id_pago INT IDENTITY (1, 1) not null primary key, 
	id_prestamo int references Prestamos(id_prestamo),
	fecha_pago date not null, 
	monto decimal(10 ,2) not null,
	id_tipo_pago int not null references Tipo_pago(id_tipo_pago), 
	id_usuario int not null references Usuarios(id_usuario)
);


--cambios 23 de abril --

alter table Clientes add codigo varchar(200)
