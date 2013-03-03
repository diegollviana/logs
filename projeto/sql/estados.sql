--
-- PostgreSQL database dump
--

-- Started on 2013-03-03 14:22:00

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

SET search_path = public, pg_catalog;

--
-- TOC entry 1825 (class 0 OID 0)
-- Dependencies: 1534
-- Name: estados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('estados_id_seq', 1, false);


--
-- TOC entry 1822 (class 0 OID 17991)
-- Dependencies: 1535
-- Data for Name: estados; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO estados (id, estado, sigla, pais_id) VALUES (1, 'Rio de Janeiro', 'RJ', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (2, 'São Paulo', 'SP', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (3, 'Espírito Santo', 'ES', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (4, 'Minas Gerais', 'MG', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (5, 'Distrito Federal', 'DF', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (6, 'Mato Grosso do Sul', 'MS', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (7, 'Paraná', 'PR', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (8, 'Santa Catarina', 'SC', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (9, 'Bahia', 'BA', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (10, 'Goiás', 'GO', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (11, 'Rio Grande do Sul', 'RS', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (12, 'Mato Grosso', 'MT', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (13, 'Sergipe', 'SE', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (14, 'Alagoas', 'AL', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (15, 'Paraíba', 'PB', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (16, 'Pernambuco', 'PE', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (17, 'Piauí', 'PI', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (18, 'Tocantins', 'TO', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (19, 'Ceará', 'CE', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (20, 'Maranhão', 'MA', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (21, 'Rio Grande do Norte', 'RN', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (22, 'Amapá', 'AP', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (23, 'Amazonas', 'AM', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (24, 'Pará', 'PA', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (25, 'Rondônia', 'RO', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (26, 'Acre', 'AC', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (27, 'Roraima', 'RR', 31);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (28, 'Idaho', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (29, 'Maine', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (30, 'Massachusetts', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (31, 'New Hampshire', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (32, 'Ohio', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (33, 'Rhode Island', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (34, 'Texas', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (35, 'Utah', '  ', 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (36, 'Alabama', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (37, 'Alaska', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (38, 'Arizona', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (39, 'Colorado', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (40, 'Connecticut', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (41, 'Delaware', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (42, 'Northern Mariana Islands', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (43, 'Illinois', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (44, 'Indiana', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (45, 'Iowa', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (46, 'Kansas', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (47, 'Kentucky', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (48, 'Maryland', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (49, 'Michigan', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (50, 'Minnesota', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (51, 'Mississippi', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (52, 'Missouri', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (53, 'Montana', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (54, 'Nebraska', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (55, 'Nevada', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (56, 'Oklahoma', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (57, 'Oregon', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (58, 'West Virginia', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (59, 'Vermont', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (60, 'Virginia', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (61, 'Washington', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (62, 'Wisconsin', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (63, 'Wyoming', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (64, 'Arkansas', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (65, 'California', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (66, 'North Carolina', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (67, 'South Carolina', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (68, 'North Dakota', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (69, 'South Dakota', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (70, 'District of Columbia', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (71, 'Florida', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (72, 'Georgia', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (73, 'Guam', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (74, 'Hawaii', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (75, 'Virgin Islands', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (76, 'Louisiana', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (77, 'New York', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (78, 'New Jersey', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (79, 'New Mexico', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (80, 'Pennsylvania', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (81, 'Puerto Rico', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (82, 'American Samoa', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (83, 'Tennessee', NULL, 72);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (84, 'Apure', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (85, 'Delta Amacuro', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (86, 'Nueva Esparta', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (87, 'Sucre', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (88, 'Zulia', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (89, 'Amazonas', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (90, 'Anzoategui', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (91, 'Aragua', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (92, 'Barinas', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (93, 'Bolivar', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (94, 'Carabobo', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (95, 'Cojedes', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (96, 'Dependencias Federales', NULL, 224);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (97, 'Distrito Federal', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (98, 'Falcon', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (99, 'Guarico', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (100, 'Lara', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (101, 'Merida', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (102, 'Miranda', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (103, 'Monagas', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (104, 'Portuguesa', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (105, 'Tachira', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (106, 'Trujillo', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (107, 'Vargas', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (108, 'Yaracuy', NULL, 235);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (109, 'Porto', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (110, 'Viseu', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (111, 'Azores', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (112, 'Beja', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (113, 'Braga', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (114, 'Braganca', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (115, 'Castelo Branco', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (116, 'Coimbra', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (117, 'Faro', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (118, 'Guarda', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (119, 'Leiria', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (120, 'Lisboa', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (121, 'Madeira', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (122, 'Portalegre', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (123, 'Viana do Castelo', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (124, 'Vila Real', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (125, 'Aveiro', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (126, 'Santarem', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (127, 'Setubal', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (128, 'Evora', NULL, 182);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (129, 'Cordoba', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (130, 'Distrito Federal', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (131, 'La Rioja', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (132, 'Rio Negro', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (133, 'Buenos Aires', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (134, 'Catamarca', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (135, 'Chaco', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (136, 'Chubut', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (137, 'Corrientes', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (138, 'Entre Rios', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (139, 'Formosa', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (140, 'Jujuy', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (141, 'La Pampa', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (142, 'Mendoza', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (143, 'Misiones', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (144, 'Neuquen', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (145, 'Salta', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (146, 'San Juan', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (147, 'San Luis', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (148, 'Santa Cruz', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (149, 'Santa Fe', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (150, 'Santiago del Estero', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (151, 'Tierra del Fuego', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (152, 'Tucuman', NULL, 13);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (153, 'Western Australia', NULL, 16);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (154, 'South Australia', NULL, 16);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (155, 'New South Wales', NULL, 16);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (156, 'Tasmania', NULL, 16);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (157, 'Australian Capital Territory', NULL, 16);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (158, 'Northern Territory', NULL, 16);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (159, 'Queensland', NULL, 16);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (160, 'Victoria', NULL, 16);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (161, 'Lower Austria', NULL, 17);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (162, 'Upper Austria', NULL, 17);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (163, 'Vienna', NULL, 17);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (164, 'Burgenland', NULL, 17);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (165, 'Carinthia', NULL, 17);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (166, 'Salzburg', NULL, 17);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (167, 'Styria', NULL, 17);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (168, 'Tyrol', NULL, 17);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (169, 'Vorarlberg', NULL, 17);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (170, 'Chuquisaca', NULL, 28);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (171, 'Cochabamba', NULL, 28);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (172, 'El Beni', NULL, 28);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (173, 'La Paz', NULL, 28);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (174, 'Oruro', NULL, 28);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (175, 'Pando', NULL, 28);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (176, 'Potosi', NULL, 28);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (177, 'Santa Cruz', NULL, 28);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (178, 'Tarija', NULL, 28);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (179, 'British Columbia', NULL, 40);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (180, 'New Brunswick', NULL, 40);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (181, 'Nova Scotia', NULL, 40);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (182, 'Quebec', NULL, 40);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (183, 'Newfoundland', NULL, 40);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (184, 'Northwest Territories', NULL, 40);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (185, 'Yukon Territory', NULL, 40);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (186, 'Prince Edward Island', NULL, 40);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (187, 'Alberta', NULL, 40);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (188, 'Manitoba', NULL, 40);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (189, 'Nunavut', NULL, 40);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (190, 'Ontario', NULL, 40);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (191, 'Saskatchewan', NULL, 40);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (192, 'Aisen', NULL, 44);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (193, 'Bio-Bio', NULL, 44);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (194, 'Region Metropolitana', NULL, 44);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (195, 'Antofagasta', NULL, 44);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (196, 'Araucania', NULL, 44);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (197, 'Atacama', NULL, 44);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (198, 'Bernardo O´Higgins', NULL, 44);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (199, 'Coquimbo', NULL, 44);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (200, 'Los Lagos', NULL, 44);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (201, 'Magallanes', NULL, 44);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (202, 'Maule', NULL, 44);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (203, 'Tarapaca', NULL, 44);
INSERT INTO estados (id, estado, sigla, pais_id) VALUES (204, 'Valparaiso', NULL, 44);


-- Completed on 2013-03-03 14:22:00

--
-- PostgreSQL database dump complete
--

