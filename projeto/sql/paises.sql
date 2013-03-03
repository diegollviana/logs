--
-- PostgreSQL database dump
--

-- Started on 2013-03-03 14:22:19

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

SET search_path = public, pg_catalog;

--
-- TOC entry 1825 (class 0 OID 0)
-- Dependencies: 1532
-- Name: paises_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('paises_id_seq', 1, false);


--
-- TOC entry 1822 (class 0 OID 17983)
-- Dependencies: 1533
-- Data for Name: paises; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO paises (id, pais) VALUES (1, 'Afeganistão');
INSERT INTO paises (id, pais) VALUES (2, 'África do Sul');
INSERT INTO paises (id, pais) VALUES (3, 'Albânia');
INSERT INTO paises (id, pais) VALUES (4, 'Alemanha');
INSERT INTO paises (id, pais) VALUES (5, 'Andorra');
INSERT INTO paises (id, pais) VALUES (6, 'Angola');
INSERT INTO paises (id, pais) VALUES (7, 'Anguilla');
INSERT INTO paises (id, pais) VALUES (8, 'Antártida');
INSERT INTO paises (id, pais) VALUES (9, 'Antígua e Barbuda');
INSERT INTO paises (id, pais) VALUES (10, 'Antilhas Holandesas');
INSERT INTO paises (id, pais) VALUES (11, 'Arábia Saudita');
INSERT INTO paises (id, pais) VALUES (12, 'Argélia');
INSERT INTO paises (id, pais) VALUES (13, 'Argentina');
INSERT INTO paises (id, pais) VALUES (14, 'Armênia');
INSERT INTO paises (id, pais) VALUES (15, 'Aruba');
INSERT INTO paises (id, pais) VALUES (16, 'Austrália');
INSERT INTO paises (id, pais) VALUES (17, 'Áustria');
INSERT INTO paises (id, pais) VALUES (18, 'Azerbaijão');
INSERT INTO paises (id, pais) VALUES (19, 'Bahamas');
INSERT INTO paises (id, pais) VALUES (20, 'Bahrein');
INSERT INTO paises (id, pais) VALUES (21, 'Bangladesh');
INSERT INTO paises (id, pais) VALUES (22, 'Barbados');
INSERT INTO paises (id, pais) VALUES (23, 'Belarus');
INSERT INTO paises (id, pais) VALUES (24, 'Bélgica');
INSERT INTO paises (id, pais) VALUES (25, 'Belize');
INSERT INTO paises (id, pais) VALUES (26, 'Benin');
INSERT INTO paises (id, pais) VALUES (27, 'Bermuda');
INSERT INTO paises (id, pais) VALUES (28, 'Bolívia');
INSERT INTO paises (id, pais) VALUES (29, 'Bósnia e Herzegovina');
INSERT INTO paises (id, pais) VALUES (30, 'Botsuana');
INSERT INTO paises (id, pais) VALUES (31, 'Brasil');
INSERT INTO paises (id, pais) VALUES (32, 'Brunei');
INSERT INTO paises (id, pais) VALUES (33, 'Bulgária');
INSERT INTO paises (id, pais) VALUES (34, 'Burkina Faso');
INSERT INTO paises (id, pais) VALUES (35, 'Burundi');
INSERT INTO paises (id, pais) VALUES (36, 'Butão');
INSERT INTO paises (id, pais) VALUES (37, 'Cabo Verde');
INSERT INTO paises (id, pais) VALUES (38, 'Camarões');
INSERT INTO paises (id, pais) VALUES (39, 'Camboja');
INSERT INTO paises (id, pais) VALUES (40, 'Canadá');
INSERT INTO paises (id, pais) VALUES (41, 'Catar');
INSERT INTO paises (id, pais) VALUES (42, 'Cazaquistão');
INSERT INTO paises (id, pais) VALUES (43, 'Chade');
INSERT INTO paises (id, pais) VALUES (44, 'Chile');
INSERT INTO paises (id, pais) VALUES (45, 'China');
INSERT INTO paises (id, pais) VALUES (46, 'China (Hong Kong)');
INSERT INTO paises (id, pais) VALUES (47, 'China (Macau)');
INSERT INTO paises (id, pais) VALUES (48, 'Chipre');
INSERT INTO paises (id, pais) VALUES (49, 'Cidade do Vaticano (Santa Sé)');
INSERT INTO paises (id, pais) VALUES (50, 'Cingapura');
INSERT INTO paises (id, pais) VALUES (51, 'Colômbia');
INSERT INTO paises (id, pais) VALUES (52, 'Comores');
INSERT INTO paises (id, pais) VALUES (53, 'Congo');
INSERT INTO paises (id, pais) VALUES (54, 'Congo (República Popular)');
INSERT INTO paises (id, pais) VALUES (55, 'Coréia');
INSERT INTO paises (id, pais) VALUES (56, 'Coréia do Norte');
INSERT INTO paises (id, pais) VALUES (57, 'Costa do Marfim');
INSERT INTO paises (id, pais) VALUES (58, 'Costa Rica');
INSERT INTO paises (id, pais) VALUES (59, 'Croácia (Hrvatska)');
INSERT INTO paises (id, pais) VALUES (60, 'Cuba');
INSERT INTO paises (id, pais) VALUES (61, 'Dinamarca');
INSERT INTO paises (id, pais) VALUES (62, 'Djibuti');
INSERT INTO paises (id, pais) VALUES (63, 'Dominica');
INSERT INTO paises (id, pais) VALUES (64, 'Egito');
INSERT INTO paises (id, pais) VALUES (65, 'El Salvador');
INSERT INTO paises (id, pais) VALUES (66, 'Emirados Árabes Unidos');
INSERT INTO paises (id, pais) VALUES (67, 'Equador');
INSERT INTO paises (id, pais) VALUES (68, 'Eritréia');
INSERT INTO paises (id, pais) VALUES (69, 'Eslováquia');
INSERT INTO paises (id, pais) VALUES (70, 'Eslovênia');
INSERT INTO paises (id, pais) VALUES (71, 'Espanha');
INSERT INTO paises (id, pais) VALUES (72, 'Estados Unidos');
INSERT INTO paises (id, pais) VALUES (73, 'Estônia');
INSERT INTO paises (id, pais) VALUES (74, 'Etiópia');
INSERT INTO paises (id, pais) VALUES (75, 'Fiji');
INSERT INTO paises (id, pais) VALUES (76, 'Filipinas');
INSERT INTO paises (id, pais) VALUES (77, 'Finlândia');
INSERT INTO paises (id, pais) VALUES (78, 'França');
INSERT INTO paises (id, pais) VALUES (79, 'Gabão');
INSERT INTO paises (id, pais) VALUES (80, 'Gâmbia');
INSERT INTO paises (id, pais) VALUES (81, 'Gana');
INSERT INTO paises (id, pais) VALUES (82, 'Geórgia');
INSERT INTO paises (id, pais) VALUES (83, 'Gibraltar');
INSERT INTO paises (id, pais) VALUES (84, 'Grécia');
INSERT INTO paises (id, pais) VALUES (85, 'Grenada');
INSERT INTO paises (id, pais) VALUES (86, 'Groenlândia');
INSERT INTO paises (id, pais) VALUES (87, 'Guadalupe');
INSERT INTO paises (id, pais) VALUES (88, 'Guam');
INSERT INTO paises (id, pais) VALUES (89, 'Guatemala');
INSERT INTO paises (id, pais) VALUES (90, 'Guiana');
INSERT INTO paises (id, pais) VALUES (91, 'Guiana Francesa');
INSERT INTO paises (id, pais) VALUES (92, 'Guiné');
INSERT INTO paises (id, pais) VALUES (93, 'Guiné Equatorial');
INSERT INTO paises (id, pais) VALUES (94, 'Guiné-Bissau');
INSERT INTO paises (id, pais) VALUES (95, 'Haiti');
INSERT INTO paises (id, pais) VALUES (96, 'Holanda');
INSERT INTO paises (id, pais) VALUES (97, 'Honduras');
INSERT INTO paises (id, pais) VALUES (98, 'Hungria');
INSERT INTO paises (id, pais) VALUES (99, 'Iêmen');
INSERT INTO paises (id, pais) VALUES (100, 'Ilha Bouvet');
INSERT INTO paises (id, pais) VALUES (101, 'Ilha Norfolk');
INSERT INTO paises (id, pais) VALUES (102, 'Ilhas Cayman');
INSERT INTO paises (id, pais) VALUES (103, 'Ilhas Christmas');
INSERT INTO paises (id, pais) VALUES (104, 'Ilhas Cocos (Keeling)');
INSERT INTO paises (id, pais) VALUES (105, 'Ilhas Cook');
INSERT INTO paises (id, pais) VALUES (106, 'Ilhas Faroés');
INSERT INTO paises (id, pais) VALUES (107, 'Ilhas Geórgia do Sul e Sandwich do Sul');
INSERT INTO paises (id, pais) VALUES (108, 'Ilhas Heard e McDonald');
INSERT INTO paises (id, pais) VALUES (109, 'Ilhas Malvinas');
INSERT INTO paises (id, pais) VALUES (110, 'Ilhas Marianas do Norte');
INSERT INTO paises (id, pais) VALUES (111, 'Ilhas Marshall');
INSERT INTO paises (id, pais) VALUES (112, 'Ilhas Salomão');
INSERT INTO paises (id, pais) VALUES (113, 'Ilhas Svalbard e Jan Mayen');
INSERT INTO paises (id, pais) VALUES (114, 'Ilhas Turks e Caicos');
INSERT INTO paises (id, pais) VALUES (115, 'Ilhas Virgens Americanas');
INSERT INTO paises (id, pais) VALUES (116, 'Ilhas Virgens Britânicas');
INSERT INTO paises (id, pais) VALUES (117, 'Ilhas Wallis e Futuna');
INSERT INTO paises (id, pais) VALUES (118, 'Índia');
INSERT INTO paises (id, pais) VALUES (119, 'Indonésia');
INSERT INTO paises (id, pais) VALUES (120, 'Irã');
INSERT INTO paises (id, pais) VALUES (121, 'Iraque');
INSERT INTO paises (id, pais) VALUES (122, 'Irlanda');
INSERT INTO paises (id, pais) VALUES (123, 'Islândia');
INSERT INTO paises (id, pais) VALUES (124, 'Israel');
INSERT INTO paises (id, pais) VALUES (125, 'Itália');
INSERT INTO paises (id, pais) VALUES (126, 'Iugoslávia');
INSERT INTO paises (id, pais) VALUES (127, 'Jamaica');
INSERT INTO paises (id, pais) VALUES (128, 'Japão');
INSERT INTO paises (id, pais) VALUES (129, 'Jordânia');
INSERT INTO paises (id, pais) VALUES (130, 'Kiribati');
INSERT INTO paises (id, pais) VALUES (131, 'Kuwait');
INSERT INTO paises (id, pais) VALUES (132, 'Laos');
INSERT INTO paises (id, pais) VALUES (133, 'Lesoto');
INSERT INTO paises (id, pais) VALUES (134, 'Letônia');
INSERT INTO paises (id, pais) VALUES (135, 'Líbano');
INSERT INTO paises (id, pais) VALUES (136, 'Libéria');
INSERT INTO paises (id, pais) VALUES (137, 'Líbia');
INSERT INTO paises (id, pais) VALUES (138, 'Liechtenstein');
INSERT INTO paises (id, pais) VALUES (139, 'Lituânia');
INSERT INTO paises (id, pais) VALUES (140, 'Luxemburgo');
INSERT INTO paises (id, pais) VALUES (141, 'Macedônia');
INSERT INTO paises (id, pais) VALUES (142, 'Madagascar');
INSERT INTO paises (id, pais) VALUES (143, 'Malásia');
INSERT INTO paises (id, pais) VALUES (144, 'Malaui');
INSERT INTO paises (id, pais) VALUES (145, 'Maldivas');
INSERT INTO paises (id, pais) VALUES (146, 'Mali');
INSERT INTO paises (id, pais) VALUES (147, 'Malta');
INSERT INTO paises (id, pais) VALUES (148, 'Marrocos');
INSERT INTO paises (id, pais) VALUES (149, 'Martinica');
INSERT INTO paises (id, pais) VALUES (150, 'Maurício');
INSERT INTO paises (id, pais) VALUES (151, 'Mauritânia');
INSERT INTO paises (id, pais) VALUES (152, 'Mayotte');
INSERT INTO paises (id, pais) VALUES (153, 'México');
INSERT INTO paises (id, pais) VALUES (154, 'Micronésia');
INSERT INTO paises (id, pais) VALUES (155, 'Moçambique');
INSERT INTO paises (id, pais) VALUES (156, 'Moldávia');
INSERT INTO paises (id, pais) VALUES (157, 'Mônaco');
INSERT INTO paises (id, pais) VALUES (158, 'Mongólia');
INSERT INTO paises (id, pais) VALUES (159, 'Montserrat');
INSERT INTO paises (id, pais) VALUES (160, 'Myanma');
INSERT INTO paises (id, pais) VALUES (161, 'Namíbia');
INSERT INTO paises (id, pais) VALUES (162, 'Nauru');
INSERT INTO paises (id, pais) VALUES (163, 'Nepal');
INSERT INTO paises (id, pais) VALUES (164, 'Nicarágua');
INSERT INTO paises (id, pais) VALUES (165, 'Níger');
INSERT INTO paises (id, pais) VALUES (166, 'Nigéria');
INSERT INTO paises (id, pais) VALUES (167, 'Niue');
INSERT INTO paises (id, pais) VALUES (168, 'Noruega');
INSERT INTO paises (id, pais) VALUES (169, 'Nova Caledônia');
INSERT INTO paises (id, pais) VALUES (170, 'Nova Zelândia');
INSERT INTO paises (id, pais) VALUES (171, 'Omã');
INSERT INTO paises (id, pais) VALUES (172, 'Palau');
INSERT INTO paises (id, pais) VALUES (173, 'Panamá');
INSERT INTO paises (id, pais) VALUES (174, 'Papua-Nova Guiné');
INSERT INTO paises (id, pais) VALUES (175, 'Paquistão');
INSERT INTO paises (id, pais) VALUES (176, 'Paraguai');
INSERT INTO paises (id, pais) VALUES (177, 'Peru');
INSERT INTO paises (id, pais) VALUES (178, 'Pitcairn');
INSERT INTO paises (id, pais) VALUES (179, 'Polinésia Francesa');
INSERT INTO paises (id, pais) VALUES (180, 'Polônia');
INSERT INTO paises (id, pais) VALUES (181, 'Porto Rico');
INSERT INTO paises (id, pais) VALUES (182, 'Portugal');
INSERT INTO paises (id, pais) VALUES (183, 'Quênia');
INSERT INTO paises (id, pais) VALUES (184, 'Quirguistão');
INSERT INTO paises (id, pais) VALUES (185, 'Reino Unido');
INSERT INTO paises (id, pais) VALUES (186, 'República Centro-Africana');
INSERT INTO paises (id, pais) VALUES (187, 'República Dominicana');
INSERT INTO paises (id, pais) VALUES (188, 'República Tcheca');
INSERT INTO paises (id, pais) VALUES (189, 'Reunião');
INSERT INTO paises (id, pais) VALUES (190, 'Romênia');
INSERT INTO paises (id, pais) VALUES (191, 'Ruanda');
INSERT INTO paises (id, pais) VALUES (192, 'Rússia');
INSERT INTO paises (id, pais) VALUES (193, 'Saara Ocidental');
INSERT INTO paises (id, pais) VALUES (194, 'Saint Kitts e Névis');
INSERT INTO paises (id, pais) VALUES (195, 'Samoa');
INSERT INTO paises (id, pais) VALUES (196, 'Samoa Americana');
INSERT INTO paises (id, pais) VALUES (197, 'San Marino');
INSERT INTO paises (id, pais) VALUES (198, 'Santa Helena');
INSERT INTO paises (id, pais) VALUES (199, 'Santa Lúcia');
INSERT INTO paises (id, pais) VALUES (200, 'São Tomé e Príncipe');
INSERT INTO paises (id, pais) VALUES (201, 'São Vicente e Granadinas');
INSERT INTO paises (id, pais) VALUES (202, 'Senegal');
INSERT INTO paises (id, pais) VALUES (203, 'Serra Leoa');
INSERT INTO paises (id, pais) VALUES (204, 'Seychelles');
INSERT INTO paises (id, pais) VALUES (205, 'Síria');
INSERT INTO paises (id, pais) VALUES (206, 'Somália');
INSERT INTO paises (id, pais) VALUES (207, 'Sri Lanka');
INSERT INTO paises (id, pais) VALUES (208, 'St. Pierre e Miquelon');
INSERT INTO paises (id, pais) VALUES (209, 'Suazilândia');
INSERT INTO paises (id, pais) VALUES (210, 'Sudão');
INSERT INTO paises (id, pais) VALUES (211, 'Suécia');
INSERT INTO paises (id, pais) VALUES (212, 'Suíça');
INSERT INTO paises (id, pais) VALUES (213, 'Suriname');
INSERT INTO paises (id, pais) VALUES (214, 'Tadjiquistão');
INSERT INTO paises (id, pais) VALUES (215, 'Tailândia');
INSERT INTO paises (id, pais) VALUES (216, 'Taiwan');
INSERT INTO paises (id, pais) VALUES (217, 'Tanzânia');
INSERT INTO paises (id, pais) VALUES (218, 'Território Britânico do Oceano Índico');
INSERT INTO paises (id, pais) VALUES (219, 'Territórios Franceses do Sul');
INSERT INTO paises (id, pais) VALUES (220, 'Territórios Insulares dos EUA');
INSERT INTO paises (id, pais) VALUES (221, 'Timor Oriental');
INSERT INTO paises (id, pais) VALUES (222, 'Togo');
INSERT INTO paises (id, pais) VALUES (223, 'Tokelau');
INSERT INTO paises (id, pais) VALUES (224, 'Tonga');
INSERT INTO paises (id, pais) VALUES (225, 'Trinidad e Tobago');
INSERT INTO paises (id, pais) VALUES (226, 'Tunísia');
INSERT INTO paises (id, pais) VALUES (227, 'Turcomenistão');
INSERT INTO paises (id, pais) VALUES (228, 'Turquia');
INSERT INTO paises (id, pais) VALUES (229, 'Tuvalu');
INSERT INTO paises (id, pais) VALUES (230, 'Ucrânia');
INSERT INTO paises (id, pais) VALUES (231, 'Uganda');
INSERT INTO paises (id, pais) VALUES (232, 'Uruguai');
INSERT INTO paises (id, pais) VALUES (233, 'Uzbequistão');
INSERT INTO paises (id, pais) VALUES (234, 'Vanuatu');
INSERT INTO paises (id, pais) VALUES (235, 'Venezuela');
INSERT INTO paises (id, pais) VALUES (236, 'Vietnã');
INSERT INTO paises (id, pais) VALUES (237, 'Zâmbia');
INSERT INTO paises (id, pais) VALUES (238, 'Zimbábu');


-- Completed on 2013-03-03 14:22:20

--
-- PostgreSQL database dump complete
--

