create table i60_logs
(
	key_log bigint unsigned auto_increment,
	ts timestamp not null,
	tags varchar(1000) not null,
	data json not null,
	constraint i60_logs_pk
		primary key (key_log)
);

create table i60_config
(
    key_config varchar(100) not null,
    data json not null,
    constraint i60_config_pk
        primary key (key_config)
);
