alter table lawyers add constraint  fk_id_email foreign key (id,email) references users(id,email);

create table cases (id mediumint primary key, lawyer_id mediumint foreign key references lawyers(id), customer_id mediumint foreign key references customers(id));

