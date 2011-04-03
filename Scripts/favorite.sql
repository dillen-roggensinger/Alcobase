create table favorite(
aid integer,
did integer,
foreign key (did) references alcohol(did),
foreign key (aid) references account(aid)
);

alter table favorite
add primary key(did,aid);

INSERT INTO favorite VALUES(6,1);
INSERT INTO favorite VALUES(3,5);
INSERT INTO favorite VALUES(1,6);
INSERT INTO favorite VALUES(5,6);
INSERT INTO favorite VALUES(5,7);
INSERT INTO favorite VALUES(7,15);
INSERT INTO favorite VALUES(9,18);
INSERT INTO favorite VALUES(4,23);
INSERT INTO favorite VALUES(10,26);
INSERT INTO favorite VALUES(7,31);
INSERT INTO favorite VALUES(8,39);
