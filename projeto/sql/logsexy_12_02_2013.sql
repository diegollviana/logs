--
-- PostgreSQL database dump
--

-- Started on 2013-02-12 10:29:27

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

--
-- TOC entry 335 (class 2612 OID 16386)
-- Name: plpgsql; Type: PROCEDURAL LANGUAGE; Schema: -; Owner: postgres
--

CREATE PROCEDURAL LANGUAGE plpgsql;


ALTER PROCEDURAL LANGUAGE plpgsql OWNER TO postgres;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 1537 (class 1259 OID 17999)
-- Dependencies: 3
-- Name: cidades; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cidades (
    id integer NOT NULL,
    cidade character varying(45),
    estado_id integer,
    capital character varying(1)
);


ALTER TABLE public.cidades OWNER TO postgres;

--
-- TOC entry 1536 (class 1259 OID 17997)
-- Dependencies: 1537 3
-- Name: cidades_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cidades_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.cidades_id_seq OWNER TO postgres;

--
-- TOC entry 1882 (class 0 OID 0)
-- Dependencies: 1536
-- Name: cidades_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cidades_id_seq OWNED BY cidades.id;


--
-- TOC entry 1535 (class 1259 OID 17991)
-- Dependencies: 3
-- Name: estados; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE estados (
    id integer NOT NULL,
    estado character varying(45),
    sigla character varying(3),
    pais_id integer
);


ALTER TABLE public.estados OWNER TO postgres;

--
-- TOC entry 1534 (class 1259 OID 17989)
-- Dependencies: 3 1535
-- Name: estados_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE estados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.estados_id_seq OWNER TO postgres;

--
-- TOC entry 1883 (class 0 OID 0)
-- Dependencies: 1534
-- Name: estados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE estados_id_seq OWNED BY estados.id;


--
-- TOC entry 1533 (class 1259 OID 17983)
-- Dependencies: 3
-- Name: paises; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE paises (
    id integer NOT NULL,
    pais character varying(80)
);


ALTER TABLE public.paises OWNER TO postgres;

--
-- TOC entry 1532 (class 1259 OID 17981)
-- Dependencies: 1533 3
-- Name: paises_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE paises_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.paises_id_seq OWNER TO postgres;

--
-- TOC entry 1884 (class 0 OID 0)
-- Dependencies: 1532
-- Name: paises_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE paises_id_seq OWNED BY paises.id;


--
-- TOC entry 1525 (class 1259 OID 17842)
-- Dependencies: 1826 1827 1828 1829 1830 1831 1832 1833 1834 3
-- Name: perfil; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE perfil (
    id integer NOT NULL,
    user_id integer,
    genero integer,
    estado_civil integer,
    nome character varying(45),
    data_nascimento date,
    etnia integer DEFAULT 1,
    cabelos_cor integer DEFAULT 1,
    cabelos_tipo integer DEFAULT 1,
    olhos_cor integer DEFAULT 1,
    olhos_tipo integer DEFAULT 1,
    altura character varying(5),
    peso integer,
    tipo_fisico integer DEFAULT 1,
    fuma integer DEFAULT 1,
    bebe integer DEFAULT 1,
    sobre text,
    orientacao_sexual integer DEFAULT 1
);


ALTER TABLE public.perfil OWNER TO postgres;

--
-- TOC entry 1527 (class 1259 OID 17873)
-- Dependencies: 3
-- Name: perfil_conjuge; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE perfil_conjuge (
    id integer NOT NULL,
    perfil_id integer,
    nome character varying(45),
    data_nascimento date,
    etnia integer,
    cabelos_cor integer,
    cabelos_tipo integer,
    olhos_cor integer,
    olhos_tipo integer,
    altura character varying(5),
    peso integer,
    tipo_fisico integer,
    fuma integer,
    bebe integer,
    orientacao_sexual integer
);


ALTER TABLE public.perfil_conjuge OWNER TO postgres;

--
-- TOC entry 1526 (class 1259 OID 17871)
-- Dependencies: 1527 3
-- Name: perfil_conjuge_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE perfil_conjuge_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.perfil_conjuge_id_seq OWNER TO postgres;

--
-- TOC entry 1885 (class 0 OID 0)
-- Dependencies: 1526
-- Name: perfil_conjuge_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE perfil_conjuge_id_seq OWNED BY perfil_conjuge.id;


--
-- TOC entry 1539 (class 1259 OID 18051)
-- Dependencies: 1842 1843 1844 1845 1846 3
-- Name: perfil_contatos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE perfil_contatos (
    id integer NOT NULL,
    perfil_id integer,
    email_msn character varying(100),
    privacidade_email_msn smallint DEFAULT 1,
    skype character varying(100),
    privacidade_skype smallint DEFAULT 1,
    twitter character varying(100),
    privacidade_twitter smallint DEFAULT 1,
    facebook character varying(100),
    privacidade_facebook smallint DEFAULT 1,
    orkut character varying(100),
    privacidade_orkut smallint DEFAULT 1
);


ALTER TABLE public.perfil_contatos OWNER TO postgres;

--
-- TOC entry 1538 (class 1259 OID 18049)
-- Dependencies: 3 1539
-- Name: perfil_contatos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE perfil_contatos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.perfil_contatos_id_seq OWNER TO postgres;

--
-- TOC entry 1886 (class 0 OID 0)
-- Dependencies: 1538
-- Name: perfil_contatos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE perfil_contatos_id_seq OWNED BY perfil_contatos.id;


--
-- TOC entry 1524 (class 1259 OID 17840)
-- Dependencies: 1525 3
-- Name: perfil_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE perfil_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.perfil_id_seq OWNER TO postgres;

--
-- TOC entry 1887 (class 0 OID 0)
-- Dependencies: 1524
-- Name: perfil_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE perfil_id_seq OWNED BY perfil.id;


--
-- TOC entry 1531 (class 1259 OID 17915)
-- Dependencies: 3
-- Name: perfil_interesses; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE perfil_interesses (
    id integer NOT NULL,
    perfil_id integer,
    generos character varying(45),
    relacionamentos character varying(45),
    outros text
);


ALTER TABLE public.perfil_interesses OWNER TO postgres;

--
-- TOC entry 1530 (class 1259 OID 17913)
-- Dependencies: 1531 3
-- Name: perfil_interesses_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE perfil_interesses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.perfil_interesses_id_seq OWNER TO postgres;

--
-- TOC entry 1888 (class 0 OID 0)
-- Dependencies: 1530
-- Name: perfil_interesses_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE perfil_interesses_id_seq OWNED BY perfil_interesses.id;


--
-- TOC entry 1529 (class 1259 OID 17902)
-- Dependencies: 3
-- Name: perfil_localizacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE perfil_localizacao (
    id integer NOT NULL,
    perfil_id integer,
    pais_id integer NOT NULL,
    estado_id integer,
    cidade_id integer,
    bairro character varying(45)
);


ALTER TABLE public.perfil_localizacao OWNER TO postgres;

--
-- TOC entry 1528 (class 1259 OID 17900)
-- Dependencies: 3 1529
-- Name: perfil_localizacao_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE perfil_localizacao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.perfil_localizacao_id_seq OWNER TO postgres;

--
-- TOC entry 1889 (class 0 OID 0)
-- Dependencies: 1528
-- Name: perfil_localizacao_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE perfil_localizacao_id_seq OWNED BY perfil_localizacao.id;


--
-- TOC entry 1523 (class 1259 OID 17698)
-- Dependencies: 1820 1821 1822 1823 1824 3
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    email character varying(100),
    username character varying(45),
    password character varying(60),
    status_cadastro smallint DEFAULT 0,
    data_cadastro timestamp without time zone,
    assinante smallint DEFAULT 0,
    assinatura_inicio date,
    assinatura_fim date,
    last_login timestamp without time zone,
    status_online smallint DEFAULT 0,
    avatar character varying(60),
    folder character varying(10),
    chave_cadastro character varying(50),
    last_login_ip character varying(60),
    cadastro_ip character varying(60),
    bloqueado smallint DEFAULT 0,
    deleted smallint DEFAULT 0
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 1541 (class 1259 OID 34478)
-- Dependencies: 1848 3
-- Name: users_deleted; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users_deleted (
    id integer NOT NULL,
    user_id integer,
    username character varying(25),
    email character varying(100),
    motivo character varying(200),
    deleted_ip character varying(20),
    deleted_key character varying(45),
    deleted_confirm smallint DEFAULT 0,
    created timestamp without time zone
);


ALTER TABLE public.users_deleted OWNER TO postgres;

--
-- TOC entry 1540 (class 1259 OID 34476)
-- Dependencies: 3 1541
-- Name: users_deleted_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_deleted_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.users_deleted_id_seq OWNER TO postgres;

--
-- TOC entry 1890 (class 0 OID 0)
-- Dependencies: 1540
-- Name: users_deleted_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_deleted_id_seq OWNED BY users_deleted.id;


--
-- TOC entry 1522 (class 1259 OID 17696)
-- Dependencies: 1523 3
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 1891 (class 0 OID 0)
-- Dependencies: 1522
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- TOC entry 1840 (class 2604 OID 18002)
-- Dependencies: 1536 1537 1537
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE cidades ALTER COLUMN id SET DEFAULT nextval('cidades_id_seq'::regclass);


--
-- TOC entry 1839 (class 2604 OID 17994)
-- Dependencies: 1535 1534 1535
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE estados ALTER COLUMN id SET DEFAULT nextval('estados_id_seq'::regclass);


--
-- TOC entry 1838 (class 2604 OID 17986)
-- Dependencies: 1533 1532 1533
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE paises ALTER COLUMN id SET DEFAULT nextval('paises_id_seq'::regclass);


--
-- TOC entry 1825 (class 2604 OID 17845)
-- Dependencies: 1524 1525 1525
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE perfil ALTER COLUMN id SET DEFAULT nextval('perfil_id_seq'::regclass);


--
-- TOC entry 1835 (class 2604 OID 17876)
-- Dependencies: 1526 1527 1527
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE perfil_conjuge ALTER COLUMN id SET DEFAULT nextval('perfil_conjuge_id_seq'::regclass);


--
-- TOC entry 1841 (class 2604 OID 18054)
-- Dependencies: 1539 1538 1539
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE perfil_contatos ALTER COLUMN id SET DEFAULT nextval('perfil_contatos_id_seq'::regclass);


--
-- TOC entry 1837 (class 2604 OID 17918)
-- Dependencies: 1531 1530 1531
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE perfil_interesses ALTER COLUMN id SET DEFAULT nextval('perfil_interesses_id_seq'::regclass);


--
-- TOC entry 1836 (class 2604 OID 17905)
-- Dependencies: 1529 1528 1529
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE perfil_localizacao ALTER COLUMN id SET DEFAULT nextval('perfil_localizacao_id_seq'::regclass);


--
-- TOC entry 1819 (class 2604 OID 17701)
-- Dependencies: 1523 1522 1523
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- TOC entry 1847 (class 2604 OID 34481)
-- Dependencies: 1541 1540 1541
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE users_deleted ALTER COLUMN id SET DEFAULT nextval('users_deleted_id_seq'::regclass);


--
-- TOC entry 1866 (class 2606 OID 18004)
-- Dependencies: 1537 1537
-- Name: cidades_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cidades
    ADD CONSTRAINT cidades_pkey PRIMARY KEY (id);


--
-- TOC entry 1864 (class 2606 OID 17996)
-- Dependencies: 1535 1535
-- Name: estados_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY estados
    ADD CONSTRAINT estados_pkey PRIMARY KEY (id);


--
-- TOC entry 1851 (class 2606 OID 17706)
-- Dependencies: 1523 1523
-- Name: id_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT id_pk PRIMARY KEY (id);


--
-- TOC entry 1862 (class 2606 OID 17988)
-- Dependencies: 1533 1533
-- Name: paises_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY paises
    ADD CONSTRAINT paises_pkey PRIMARY KEY (id);


--
-- TOC entry 1856 (class 2606 OID 17878)
-- Dependencies: 1527 1527
-- Name: perfil_conjuge_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY perfil_conjuge
    ADD CONSTRAINT perfil_conjuge_pkey PRIMARY KEY (id);


--
-- TOC entry 1868 (class 2606 OID 18064)
-- Dependencies: 1539 1539
-- Name: perfil_contatos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY perfil_contatos
    ADD CONSTRAINT perfil_contatos_pkey PRIMARY KEY (id);


--
-- TOC entry 1860 (class 2606 OID 17920)
-- Dependencies: 1531 1531
-- Name: perfil_interesses_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY perfil_interesses
    ADD CONSTRAINT perfil_interesses_pkey PRIMARY KEY (id);


--
-- TOC entry 1858 (class 2606 OID 17907)
-- Dependencies: 1529 1529
-- Name: perfil_localizacao_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY perfil_localizacao
    ADD CONSTRAINT perfil_localizacao_pkey PRIMARY KEY (pais_id);


--
-- TOC entry 1854 (class 2606 OID 17863)
-- Dependencies: 1525 1525
-- Name: perfil_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY perfil
    ADD CONSTRAINT perfil_pkey PRIMARY KEY (id);


--
-- TOC entry 1870 (class 2606 OID 34484)
-- Dependencies: 1541 1541
-- Name: users_deleted_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users_deleted
    ADD CONSTRAINT users_deleted_pkey PRIMARY KEY (id);


--
-- TOC entry 1849 (class 1259 OID 17707)
-- Dependencies: 1523
-- Name: id; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX id ON users USING btree (id);


--
-- TOC entry 1852 (class 1259 OID 26338)
-- Dependencies: 1523
-- Name: username; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX username ON users USING btree (username);


--
-- TOC entry 1872 (class 2606 OID 17879)
-- Dependencies: 1527 1525 1853
-- Name: perfil_conjuge_perfil_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY perfil_conjuge
    ADD CONSTRAINT perfil_conjuge_perfil_fkey FOREIGN KEY (perfil_id) REFERENCES perfil(id);


--
-- TOC entry 1875 (class 2606 OID 18065)
-- Dependencies: 1539 1525 1853
-- Name: perfil_contatos_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY perfil_contatos
    ADD CONSTRAINT perfil_contatos_fkey FOREIGN KEY (perfil_id) REFERENCES perfil(id);


--
-- TOC entry 1874 (class 2606 OID 17921)
-- Dependencies: 1853 1525 1531
-- Name: perfil_interesses_perfil; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY perfil_interesses
    ADD CONSTRAINT perfil_interesses_perfil FOREIGN KEY (perfil_id) REFERENCES perfil(id);


--
-- TOC entry 1873 (class 2606 OID 17908)
-- Dependencies: 1853 1525 1529
-- Name: perfil_localizacao_perfil_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY perfil_localizacao
    ADD CONSTRAINT perfil_localizacao_perfil_fkey FOREIGN KEY (perfil_id) REFERENCES perfil(id);


--
-- TOC entry 1871 (class 2606 OID 17864)
-- Dependencies: 1850 1523 1525
-- Name: perfil_users_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY perfil
    ADD CONSTRAINT perfil_users_fkey FOREIGN KEY (user_id) REFERENCES users(id);


--
-- TOC entry 1876 (class 2606 OID 34485)
-- Dependencies: 1523 1541 1850
-- Name: user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users_deleted
    ADD CONSTRAINT user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id) DEFERRABLE;


--
-- TOC entry 1881 (class 0 OID 0)
-- Dependencies: 3
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2013-02-12 10:29:28

--
-- PostgreSQL database dump complete
--

