--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.2
-- Dumped by pg_dump version 9.6.4

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: employee; Type: TABLE; Schema: public; Owner: rcjtwzfgvsdppu
--

CREATE TABLE employee (
    employeeid integer NOT NULL,
    employeefirstname character varying(255) NOT NULL,
    employeelastname character varying(255) NOT NULL,
    employeelastfour character varying(4) NOT NULL,
    employeetitle character varying(10) NOT NULL,
    employeeseniority integer NOT NULL,
    employeenumvolunteered integer,
    isadmin boolean NOT NULL
);


ALTER TABLE employee OWNER TO rcjtwzfgvsdppu;

--
-- Name: employee_employeeid_seq; Type: SEQUENCE; Schema: public; Owner: rcjtwzfgvsdppu
--

CREATE SEQUENCE employee_employeeid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE employee_employeeid_seq OWNER TO rcjtwzfgvsdppu;

--
-- Name: employee_employeeid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER SEQUENCE employee_employeeid_seq OWNED BY employee.employeeid;


--
-- Name: employeeovertime; Type: TABLE; Schema: public; Owner: rcjtwzfgvsdppu
--

CREATE TABLE employeeovertime (
    employeeovertimeid integer NOT NULL,
    employeeid integer NOT NULL,
    overtimeid integer NOT NULL
);


ALTER TABLE employeeovertime OWNER TO rcjtwzfgvsdppu;

--
-- Name: employeeovertime_employeeovertimeid_seq; Type: SEQUENCE; Schema: public; Owner: rcjtwzfgvsdppu
--

CREATE SEQUENCE employeeovertime_employeeovertimeid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE employeeovertime_employeeovertimeid_seq OWNER TO rcjtwzfgvsdppu;

--
-- Name: employeeovertime_employeeovertimeid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER SEQUENCE employeeovertime_employeeovertimeid_seq OWNED BY employeeovertime.employeeovertimeid;


--
-- Name: overtime; Type: TABLE; Schema: public; Owner: rcjtwzfgvsdppu
--

CREATE TABLE overtime (
    overtimeid integer NOT NULL,
    unitid integer NOT NULL,
    overtimedate date NOT NULL
);


ALTER TABLE overtime OWNER TO rcjtwzfgvsdppu;

--
-- Name: overtime_overtimeid_seq; Type: SEQUENCE; Schema: public; Owner: rcjtwzfgvsdppu
--

CREATE SEQUENCE overtime_overtimeid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE overtime_overtimeid_seq OWNER TO rcjtwzfgvsdppu;

--
-- Name: overtime_overtimeid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER SEQUENCE overtime_overtimeid_seq OWNED BY overtime.overtimeid;


--
-- Name: unit; Type: TABLE; Schema: public; Owner: rcjtwzfgvsdppu
--

CREATE TABLE unit (
    unitid integer NOT NULL,
    unitname character varying(255) NOT NULL
);


ALTER TABLE unit OWNER TO rcjtwzfgvsdppu;

--
-- Name: unit_unitid_seq; Type: SEQUENCE; Schema: public; Owner: rcjtwzfgvsdppu
--

CREATE SEQUENCE unit_unitid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE unit_unitid_seq OWNER TO rcjtwzfgvsdppu;

--
-- Name: unit_unitid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER SEQUENCE unit_unitid_seq OWNED BY unit.unitid;


--
-- Name: users; Type: TABLE; Schema: public; Owner: rcjtwzfgvsdppu
--

CREATE TABLE users (
    userid integer NOT NULL,
    username character varying(255) NOT NULL,
    userpassword character varying(255) NOT NULL,
    employeeid integer NOT NULL
);


ALTER TABLE users OWNER TO rcjtwzfgvsdppu;

--
-- Name: users_userid_seq; Type: SEQUENCE; Schema: public; Owner: rcjtwzfgvsdppu
--

CREATE SEQUENCE users_userid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_userid_seq OWNER TO rcjtwzfgvsdppu;

--
-- Name: users_userid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER SEQUENCE users_userid_seq OWNED BY users.userid;


--
-- Name: employee employeeid; Type: DEFAULT; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER TABLE ONLY employee ALTER COLUMN employeeid SET DEFAULT nextval('employee_employeeid_seq'::regclass);


--
-- Name: employeeovertime employeeovertimeid; Type: DEFAULT; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER TABLE ONLY employeeovertime ALTER COLUMN employeeovertimeid SET DEFAULT nextval('employeeovertime_employeeovertimeid_seq'::regclass);


--
-- Name: overtime overtimeid; Type: DEFAULT; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER TABLE ONLY overtime ALTER COLUMN overtimeid SET DEFAULT nextval('overtime_overtimeid_seq'::regclass);


--
-- Name: unit unitid; Type: DEFAULT; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER TABLE ONLY unit ALTER COLUMN unitid SET DEFAULT nextval('unit_unitid_seq'::regclass);


--
-- Name: users userid; Type: DEFAULT; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER TABLE ONLY users ALTER COLUMN userid SET DEFAULT nextval('users_userid_seq'::regclass);


--
-- Data for Name: employee; Type: TABLE DATA; Schema: public; Owner: rcjtwzfgvsdppu
--

COPY employee (employeeid, employeefirstname, employeelastname, employeelastfour, employeetitle, employeeseniority, employeenumvolunteered, isadmin) FROM stdin;
1	Norma	Cutter	1001	LPN	1	2	f
2	Elliot	Ashby	1002	LPN	2	0	f
3	David	Lindsey	1003	LPN	3	2	f
4	Brandon	Fowler	1004	LPN	4	0	f
5	Dallas	Bleak	1005	LPN	5	0	f
6	Becky	Grant	1006	LPN	6	2	f
7	Connie	Shipley	1007	LPN	7	0	f
8	Deb	Gustufson	1008	LPN	8	3	f
9	Josh	Barney	1009	LPN	9	0	f
10	Irma	Garcia	1010	LPN	10	0	f
11	Diana	Stanfill	1011	LPN	11	0	f
12	Debi	Rand	1012	LPN	12	0	f
13	Kathy	Sadler	1013	RN	99	0	t
14	Patrick	Gee	1014	RN	99	0	t
\.


--
-- Name: employee_employeeid_seq; Type: SEQUENCE SET; Schema: public; Owner: rcjtwzfgvsdppu
--

SELECT pg_catalog.setval('employee_employeeid_seq', 14, true);


--
-- Data for Name: employeeovertime; Type: TABLE DATA; Schema: public; Owner: rcjtwzfgvsdppu
--

COPY employeeovertime (employeeovertimeid, employeeid, overtimeid) FROM stdin;
1	1	1
2	1	2
3	1	3
4	1	4
5	1	7
6	3	1
7	3	3
8	3	5
9	3	8
10	6	2
11	6	3
12	6	4
13	6	5
14	6	6
15	6	7
16	6	8
17	8	2
18	8	5
19	8	6
20	8	7
21	8	8
\.


--
-- Name: employeeovertime_employeeovertimeid_seq; Type: SEQUENCE SET; Schema: public; Owner: rcjtwzfgvsdppu
--

SELECT pg_catalog.setval('employeeovertime_employeeovertimeid_seq', 21, true);


--
-- Data for Name: overtime; Type: TABLE DATA; Schema: public; Owner: rcjtwzfgvsdppu
--

COPY overtime (overtimeid, unitid, overtimedate) FROM stdin;
1	2	2017-11-14
2	1	2017-11-18
3	2	2017-11-21
4	2	2017-11-28
5	1	2017-11-25
6	1	2017-12-02
7	1	2017-12-09
8	1	2017-12-16
\.


--
-- Name: overtime_overtimeid_seq; Type: SEQUENCE SET; Schema: public; Owner: rcjtwzfgvsdppu
--

SELECT pg_catalog.setval('overtime_overtimeid_seq', 8, true);


--
-- Data for Name: unit; Type: TABLE DATA; Schema: public; Owner: rcjtwzfgvsdppu
--

COPY unit (unitid, unitname) FROM stdin;
1	Primary Care
2	Flu Clinic
\.


--
-- Name: unit_unitid_seq; Type: SEQUENCE SET; Schema: public; Owner: rcjtwzfgvsdppu
--

SELECT pg_catalog.setval('unit_unitid_seq', 2, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: rcjtwzfgvsdppu
--

COPY users (userid, username, userpassword, employeeid) FROM stdin;
1	ksadler1013	$2y$10$pn1RQvBlNJJpiOkyKZ/xiOyYGF6HLgOPWvZ3eVK3qA/b1uhojnEMi	13
2	bgrant1006	$2y$10$ocq9WvBgVhxGZ/i7xJlzcOITd1WjzDVnnrdv6y9pdEqZT33huqMpe	6
\.


--
-- Name: users_userid_seq; Type: SEQUENCE SET; Schema: public; Owner: rcjtwzfgvsdppu
--

SELECT pg_catalog.setval('users_userid_seq', 2, true);


--
-- Name: employee employee_pkey; Type: CONSTRAINT; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER TABLE ONLY employee
    ADD CONSTRAINT employee_pkey PRIMARY KEY (employeeid);


--
-- Name: employeeovertime employeeovertime_pkey; Type: CONSTRAINT; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER TABLE ONLY employeeovertime
    ADD CONSTRAINT employeeovertime_pkey PRIMARY KEY (employeeovertimeid);


--
-- Name: overtime overtime_pkey; Type: CONSTRAINT; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER TABLE ONLY overtime
    ADD CONSTRAINT overtime_pkey PRIMARY KEY (overtimeid);


--
-- Name: unit unit_pkey; Type: CONSTRAINT; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER TABLE ONLY unit
    ADD CONSTRAINT unit_pkey PRIMARY KEY (unitid);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (userid);


--
-- Name: users users_username_key; Type: CONSTRAINT; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_username_key UNIQUE (username);


--
-- Name: employeeovertime employeeovertime_employeeid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER TABLE ONLY employeeovertime
    ADD CONSTRAINT employeeovertime_employeeid_fkey FOREIGN KEY (employeeid) REFERENCES employee(employeeid);


--
-- Name: employeeovertime employeeovertime_overtimeid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER TABLE ONLY employeeovertime
    ADD CONSTRAINT employeeovertime_overtimeid_fkey FOREIGN KEY (overtimeid) REFERENCES overtime(overtimeid);


--
-- Name: overtime overtime_unitid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER TABLE ONLY overtime
    ADD CONSTRAINT overtime_unitid_fkey FOREIGN KEY (unitid) REFERENCES unit(unitid);


--
-- Name: users users_employeeid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rcjtwzfgvsdppu
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_employeeid_fkey FOREIGN KEY (employeeid) REFERENCES employee(employeeid);


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO rcjtwzfgvsdppu;


--
-- PostgreSQL database dump complete
--

