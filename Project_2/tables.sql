create table object_alcohol of AlcoholBaseType(
	did PRIMARY KEY
)
OBJECT IDENTIFIER IS PRIMARY KEY;

create table object_stores of StoreType(
	sid PRIMARY KEY
)
OBJECT IDENTIFIER IS PRIMARY KEY;

create table object_sold_at(
	did integer,
	sid integer,
	quantity integer,
	price real
);

alter table object_sold_at
add primary key(price,quantity,sid,did);

create table object_account(
	admin integer,
	username varchar2(32) primary key,
	password varchar2(32) not null,
	email varchar2(300) not null
);

create table object_bought(
	username varchar2(32),
	time date,
	did integer,
	sid integer,
	quantity integer,
	price real,
	foreign key (quantity,price,did,sid) references object_sold_at(quantity,price,did,sid),
	foreign key (username) references object_account(username)
);

alter table object_bought
add primary key(time,username,quantity,price);

create table object_favorite(
	fid integer,
	username varchar(32),
	beverage ref AlcoholBaseType SCOPE is object_alcohol,
	foreign key (username) references object_account(username)
);

alter table object_favorite
add primary key(fid,username);

create table object_write_comment(
	text varchar2(1000) not null,
	time date,
	username varchar2(32),
	beverage ref AlcoholBaseType SCOPE is object_alcohol,
	foreign key (username) references object_account(username) on delete cascade
);

alter table object_write_comment
add primary key(username,time);
