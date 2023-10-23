create table failed_jobs
(
	id bigserial not null
		constraint failed_jobs_pkey
			primary key,
	uuid varchar(255) not null
		constraint failed_jobs_uuid_unique
			unique,
	connection text not null,
	queue text not null,
	payload text not null,
	exception text not null,
	failed_at timestamp(0) default CURRENT_TIMESTAMP not null
);

alter table failed_jobs owner to remoteandtalentdb;

create table jobs
(
	id bigserial not null
		constraint jobs_pkey
			primary key,
	queue varchar(255) not null,
	payload text not null,
	attempts smallint not null,
	reserved_at integer,
	available_at integer not null,
	created_at integer not null
);

alter table jobs owner to remoteandtalentdb;

create index jobs_queue_index
	on jobs (queue);

create table migrations
(
	id serial not null
		constraint migrations_pkey
			primary key,
	migration varchar(255) not null,
	batch integer not null
);

alter table migrations owner to remoteandtalentdb;

create table password_reset_tokens
(
	email varchar(255) not null
		constraint password_reset_tokens_pkey
			primary key,
	token varchar(255) not null,
	created_at timestamp(0)
);

alter table password_reset_tokens owner to remoteandtalentdb;

create table personal_access_tokens
(
	id bigserial not null
		constraint personal_access_tokens_pkey
			primary key,
	tokenable_type varchar(255) not null,
	tokenable_id bigint not null,
	name varchar(255) not null,
	token varchar(64) not null
		constraint personal_access_tokens_token_unique
			unique,
	abilities text,
	last_used_at timestamp(0),
	expires_at timestamp(0),
	created_at timestamp(0),
	updated_at timestamp(0)
);

alter table personal_access_tokens owner to remoteandtalentdb;

create index personal_access_tokens_tokenable_type_tokenable_id_index
	on personal_access_tokens (tokenable_type, tokenable_id);

create table profiles
(
	id bigserial not null
		constraint profiles_pkey
			primary key,
	name varchar(255) not null,
	"lastName" varchar(255) not null,
	phone varchar(255) not null,
	email varchar(255) not null,
	image varchar(255),
	created_at timestamp(0),
	updated_at timestamp(0),
	hash varchar(255) not null
		constraint profiles_hash_unique
			unique
);

alter table profiles owner to remoteandtalentdb;

create table users
(
	id bigserial not null
		constraint users_pkey
			primary key,
	name varchar(255) not null,
	email varchar(255) not null
		constraint users_email_unique
			unique,
	email_verified_at timestamp(0),
	password varchar(255) not null,
	remember_token varchar(100),
	created_at timestamp(0),
	updated_at timestamp(0)
);

alter table users owner to remoteandtalentdb;



