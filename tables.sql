-- Table: public.users

-- DROP TABLE IF EXISTS public.users;

CREATE TABLE IF NOT EXISTS public.users
(
    userid integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    email text COLLATE pg_catalog."default",
    login text COLLATE pg_catalog."default",
    password text COLLATE pg_catalog."default",
    name text COLLATE pg_catalog."default",
    surname text COLLATE pg_catalog."default",
    CONSTRAINT users_pkey PRIMARY KEY (userid)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.users
    OWNER to root;