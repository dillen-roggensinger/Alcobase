create table account(
admin integer,
username varchar2(20) primary key,
password varchar2(32) not null,
email varchar2(300) not null
);

INSERT INTO account VALUES(0,'ninjaturtles','p4ssw0rd','abc@gmail.com');
INSERT INTO account VALUES(1,'sexytime','bestPASSWORDever!1!','def@gmail.com');
INSERT INTO account VALUES(0,'friday','letmein!','ghi@gmail.com');
INSERT INTO account VALUES(0,'ragingbull','abc123','jkl@gmail.com');
INSERT INTO account VALUES(0,'mysticshadow','Iamabanana','mno@gmail.com');
INSERT INTO account VALUES(0,'trollolol','weeeeeee!!','pqr@gmail.com');
INSERT INTO account VALUES(1,'babycakes','iLoveThisSite','stu@gmail.com');
INSERT INTO account VALUES(0,'newuser','youllneverguessthis','vwx@gmail.com');
INSERT INTO account VALUES(0,'bigdaddy','hahahayeah','yandz@gmail.com');
INSERT INTO account VALUES(0,'cookiemonster','imadeapassword','nomoreletters@gmail.com');
