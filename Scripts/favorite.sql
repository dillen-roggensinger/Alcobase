create table favorite(
username varchar(20),
did integer,
foreign key (did) references alcohol(did),
foreign key (username) references account(username)
);

alter table favorite
add primary key(did,username);

INSERT INTO favorite VALUES('trollolol',1);
INSERT INTO favorite VALUES('bigdaddy',5);
INSERT INTO favorite VALUES('newuser',6);
INSERT INTO favorite VALUES('friday',6);
INSERT INTO favorite VALUES('ragingbull',7);
INSERT INTO favorite VALUES('bigdaddy',15);
INSERT INTO favorite VALUES('friday',18);
INSERT INTO favorite VALUES('trollolol',23);
INSERT INTO favorite VALUES('newuser',26);
INSERT INTO favorite VALUES('friday',31);
INSERT INTO favorite VALUES('ragingbull',39);
