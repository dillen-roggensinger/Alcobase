create table bought(
username varchar2(20),
did integer,
quantity integer,
time date,
foreign key (did) references alcohol(did),
foreign key (username) references account(username)
);

alter table bought
add primary key(did,username);

INSERT INTO bought VALUES('ninjaturtles',3);
INSERT INTO bought VALUES('sexytime',4);
INSERT INTO bought VALUES('sexytime',8);
INSERT INTO bought VALUES('ragingbull',10);
INSERT INTO bought VALUES('ragingbull',12);
INSERT INTO bought VALUES('cookiemonster',19);
INSERT INTO bought VALUES('friday',20);
INSERT INTO bought VALUES('mysticshadow',25);
INSERT INTO bought VALUES('cookiemonster',35);
INSERT INTO bought VALUES('bigdaddy',39);
INSERT INTO bought VALUES('trollolol',41);
