--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: admin; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.admin (
    id integer NOT NULL,
    aname character varying(40),
    adesignation character varying(30),
    ausername character varying(40),
    apassword character varying(40)
);


ALTER TABLE public.admin OWNER TO postgres;

--
-- Name: admin_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.admin_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.admin_id_seq OWNER TO postgres;

--
-- Name: admin_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.admin_id_seq OWNED BY public.admin.id;


--
-- Name: customer1; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.customer1 (
    fname character varying(200),
    lname character varying(200),
    mobile numeric,
    address character varying(200),
    username character varying(200) NOT NULL,
    password character varying(100)
);


ALTER TABLE public.customer1 OWNER TO postgres;

--
-- Name: item; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.item (
    pid character varying(200),
    username character varying(200)
);


ALTER TABLE public.item OWNER TO postgres;

--
-- Name: products; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.products (
    pid character varying(200) NOT NULL,
    pname character varying(200),
    pprice numeric,
    pcategory character varying(200),
    pimg character varying(200),
    pdescription character varying(100),
    quantity numeric
);


ALTER TABLE public.products OWNER TO postgres;

--
-- Name: sale; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.sale (
    pid character varying(200),
    username character varying(200),
    price numeric,
    date character varying(100)
);


ALTER TABLE public.sale OWNER TO postgres;

--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin ALTER COLUMN id SET DEFAULT nextval('public.admin_id_seq'::regclass);


--
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.admin (id, aname, adesignation, ausername, apassword) FROM stdin;
100	BC	Manager	abc	123
1	Abhishek	Manager	abhi	123
\.


--
-- Name: admin_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.admin_id_seq', 1, true);


--
-- Data for Name: customer1; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.customer1 (fname, lname, mobile, address, username, password) FROM stdin;
Bhushan	Sakhalkar	7507362965	Kothrud	bhuffi	123
Shivai	Sawant	8379943767	Kothrud	tatti@gmail.com	123
Ramesh	Ramlan	9011184931	Kothrud	abc@123.com	abcd
\.


--
-- Data for Name: item; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.item (pid, username) FROM stdin;
B102	tatti@gmail.com
\.


--
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.products (pid, pname, pprice, pcategory, pimg, pdescription, quantity) FROM stdin;
S105	Sofa5	1900	sofa	sofa5.jpg	This is dummy information	0
T100	Table1	1500	table	table1.jpg	This is dummy information	5
T101	Table2	3500	table	table2.jpg	This is dummy information	10
T102	Table3	4200	table	table3.jpg	This is dummy information	4
T104	Table5	6000	table	table5.jpg	This is dummy information	2
S100	Sofa1	1200	sofa	sofa1.jpg	This is dummy information	9
S103	Sofa3	4000	sofa	sofa3.jpg	This is dummy information	9
B102	Bed3	2600	bed	Bed3.jpg	This is dummy information	7
S104	Sofa4	3200	sofa	sofa4.jpg	This is dummy information	17
T103	Table4	5000	table	table4.jpg	This is dummy information	2
B101	Bed2	4000	bed	Bed2.jpg	This is dummy information	4
S101	Sofa2	2000	sofa	sofa2.jpg	This is dummy information	8
B103	Bed4	6000	bed	Bed4.jpg	This is dummy information	8
B104	Bed5	8500	bed	Bed5.jpg	This is dummy information	10
B100	Bed1	3500	bed	Bed1.jpg	This is dummy information	8
\.


--
-- Data for Name: sale; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sale (pid, username, price, date) FROM stdin;
S100	bhuffi	1200	06/02/19
S104	bhuffi	3200	06/02/19
S103	bhuffi	4000	06/02/19
S104	bhuffi	3200	07/02/19
S105	bhuffi	1900	07/02/19
S105	bhuffi	1900	07/02/19
S101	bhuffi	2000	08/02/19
S103	bhuffi	4000	10/02/19
S100	tatti@gmail.com	1200	17/02/19
B100	bhuffi	3500	17/02/19
S103	bhuffi	4000	17/02/19
B102	tatti@gmail.com	2600	17/02/19
S104	tatti@gmail.com	3200	17/02/19
T103	tatti@gmail.com	5000	17/02/19
B101	tatti@gmail.com	4000	17/02/19
S101	bhuffi	2000	17/02/19
B103	bhuffi	6000	18/02/19
B104	bhuffi	8500	18/02/19
B100	bhuffi	3500	18/02/19
\.


--
-- Name: customer1_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.customer1
    ADD CONSTRAINT customer1_pkey PRIMARY KEY (username);


--
-- Name: products_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (pid);


--
-- Name: item_pid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.item
    ADD CONSTRAINT item_pid_fkey FOREIGN KEY (pid) REFERENCES public.products(pid);


--
-- Name: item_username_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.item
    ADD CONSTRAINT item_username_fkey FOREIGN KEY (username) REFERENCES public.customer1(username);


--
-- Name: sale_pid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sale
    ADD CONSTRAINT sale_pid_fkey FOREIGN KEY (pid) REFERENCES public.products(pid);


--
-- Name: sale_username_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sale
    ADD CONSTRAINT sale_username_fkey FOREIGN KEY (username) REFERENCES public.customer1(username);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

