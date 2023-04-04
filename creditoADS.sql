

create Table Estado_cliente(
id_estado_cliente serial not null primary key, 
	estado_cliente varchar(50)
)

create table Clientes(
id_cliente serial not null primary key, 
	nombres varchar(50) not null, 
	apellidos varchar(50) not null, 
	direccion text not null,
	num_telefono varchar(10) not null,
	correo_electronico varchar(50) not null, 
	fecha_nacimiento date not null, 
	estado_civil varchar(50), 
	ocupacion varchar(100) not null, 
	username varchar(50) not null, 
	pass varchar(50) not null, 
	dui varchar(11) not null unique,
	genero varchar (10) not null, 
	fecha_creacion timestamp default current_timestamp.
	id_estado_cliente int references Estado_cliente(id_estado_cliente)
);

create table Tipo_cuentas(
	id_tipo_cuenta serial not null primary key, 
	tipo_cuenta varchar(100)
);


create table Cuentas(
id_cuenta serial not null primary key, 
	id_cliente int references Clientes (id_cliente), 
	id_tipo_cuenta int not null references Tipo_cuentas(id_tipo_cuenta), 
	saldo_actual numeric not null, 
	fecha_apertura timestamp default current_timestamp, 
	numero_cuenta bigInt not null
);





Insert into Tipo_cuentas values (default, 'Cuenta de ahorro'), (default, 'Cuenta corriente'),
(default, 'Cuenta de inversión')


Insert into Estado_cliente values(default, 'Activo'), (default, 'Inactivo'), 
(default, 'Bloqueado')







