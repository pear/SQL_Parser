CREATE TABLE albums (
  name varchar(60),
  directory varchar(60),
  rating enum (1,2,3,4,5,6,7,8,9,10) NOT NULL,
  category set('sexy','\'family time\'',"outdoors",'generic','very weird') NULL,
  description text NULL,
  id int default 200 PRIMARY KEY
);
CREATE TABLE photos (
  filename varchar(60) not NULL,
  name varchar(60) default "no name",
  album int,
  price float (4,2),
  description text default 'hello',
  id int default 0 primary key not null,
);
create table brent (
    filename varchar(10),
    description varchar(20),
);
CREATE TABLE films ( 
             code      CHARACTER(5) CONSTRAINT firstkey PRIMARY KEY, 
             title     CHARACTER VARYING(40) NOT NULL, 
             did       DECIMAL(3) NOT NULL, 
             date_prod DATE, 
             kind      CHAR(10), 
             len       INTERVAL HOUR TO MINUTE
             CONSTRAINT production UNIQUE(date_prod)
);
CREATE TABLE distributors ( 
             did      DECIMAL(3) PRIMARY KEY DEFAULT NEXTVAL('serial'), 
             name     VARCHAR(40) NOT NULL CHECK (name <> '') 
             CONSTRAINT con1 CHECK (did > 100 AND name > '') 
);
CREATE TABLE distributors ( 
            did      DECIMAL(3) PRIMARY KEY, 
            name     VARCHAR(40) 
);
CREATE TABLE msgs ( user_id integer, msg_id integer, msg_text varchar, msg_title varchar(30), msg_date time);
create table nodefinitions;
create dogfood;
create table dunce (name varchar;
create table dunce (name varchar(2,3));
create table dunce (enum);
create table dunce (enum(23));
