create table Hostal(
    Id int(11) not null AUTO_INCREMENT,
    Cliente varchar(50) not null,
    Dias Int not null,
    T_Habitacion varchar (30) not null,
    Costo Double not null,
    Importe Double not null,
	primary key (Id)
    );