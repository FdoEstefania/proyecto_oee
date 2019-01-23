-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-09-2018 a las 19:35:18
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `oee_v1_demo`
--
CREATE DATABASE IF NOT EXISTS `oee_v1_demo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `oee_v1_demo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_nprog`
--

CREATE TABLE `det_nprog` (
  `cod_dnprog` varchar(100) NOT NULL,
  `nom_dnprog` varchar(100) NOT NULL,
  `fk_cod_maq` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `det_nprog`
--
DELIMITER $$
CREATE TRIGGER `det_nprog_BI` BEFORE INSERT ON `det_nprog` FOR EACH ROW SET NEW.cod_dnprog = concat((SELECT cod_maq FROM maquinas WHERE cod_maq = NEW.fk_cod_maq),'-',SUBSTRING(NEW.nom_dnprog,1,3),LPAD((SELECT COUNT(*)+1 FROM det_nprog where fk_cod_maq = NEW.fk_cod_maq), 3, '0'))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_prog`
--

CREATE TABLE `det_prog` (
  `cod_dprog` varchar(100) NOT NULL,
  `nom_dprog` varchar(100) NOT NULL,
  `fk_cod_suc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `det_prog`
--

INSERT INTO `det_prog` (`cod_dprog`, `nom_dprog`, `fk_cod_suc`) VALUES
('IBRMac002-Cap001', 'Capacitacion', 'IBRMac002'),
('IBRMac002-Cha002', 'Charlas', 'IBRMac002'),
('IBRMac002-Che003', 'Checklist despeje sala productiva', 'IBRMac002'),
('IBRMac002-Che004', 'Checklist partida de proceso', 'IBRMac002'),
('IBRMac002-Col005', 'Colacion', 'IBRMac002'),
('IBRMac002-Man006', 'Mantencion Preventiva', 'IBRMac002'),
('IBRMac002-Pau007', 'Pausa Activa', 'IBRMac002'),
('IBRMac002-Rev008', 'Revision de Granel Reacondicionamiento', 'IBRMac002'),
('IBRMac002-Set009', 'Setup Parcial HM 2 HRS', 'IBRMac002'),
('IBRMac002-Set010', 'Setup Profundo HM 4 HRS', 'IBRMac002'),
('IBRMac002-Tur011', 'Turno no programado', 'IBRMac002'),
('IBRMer002-Cha003', 'Charlas', 'IBRMer002'),
('IBRMer002-Col003', 'Colacion', 'IBRMer002'),
('IBRMer002-Ind003', 'Induccion', 'IBRMer002');

--
-- Disparadores `det_prog`
--
DELIMITER $$
CREATE TRIGGER `det_prog_BI` BEFORE INSERT ON `det_prog` FOR EACH ROW SET NEW.cod_dprog = concat((SELECT cod_sucursal FROM sucursal WHERE cod_sucursal = NEW.fk_cod_suc),'-',SUBSTRING(NEW.nom_dprog,1,3),LPAD((SELECT COUNT(*)+1 FROM det_prog where fk_cod_suc = NEW.fk_cod_suc), 3, '0'))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `rut_emp` varchar(100) NOT NULL,
  `nom_emp` varchar(100) NOT NULL,
  `alias_emp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`rut_emp`, `nom_emp`, `alias_emp`) VALUES
('76093249-9', 'Ignacio andres lorca Producciones', 'SVG'),
('76952550-5', 'grupo de servicios integrales chile sa', 'IBR'),
('88293202-1', 'sistemas digitales newtec ltda', 'newtec'),
('96808570-0', 'inversiones y servicios comerciales transwarrants sa', 'twl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `cod_maq` varchar(100) NOT NULL,
  `nom_maq` varchar(100) DEFAULT NULL,
  `vel_func_maq` varchar(100) DEFAULT NULL,
  `mod_maq` varchar(100) DEFAULT NULL,
  `fk_sucursal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`cod_maq`, `nom_maq`, `vel_func_maq`, `mod_maq`, `fk_sucursal`) VALUES
('IBRMac002-Est002', 'Estuchadora AV5', '35', 'EAV-5', 'IBRMac002'),
('IBRMac002-eti001', 'etiquetadora newTeck', '50 min', 'EN02', 'IBRMac002'),
('newtecSan002-Lle002', 'LLenadora polvos tover', '25 min', 'PT01', 'newtecSan002');

--
-- Disparadores `maquinas`
--
DELIMITER $$
CREATE TRIGGER `maquinas_BI` BEFORE INSERT ON `maquinas` FOR EACH ROW SET NEW.cod_maq = concat((SELECT cod_sucursal FROM sucursal WHERE cod_sucursal = NEW.fk_sucursal),'-',SUBSTRING(NEW.nom_maq,1,3),LPAD((SELECT COUNT(*)+1 FROM maquinas where fk_sucursal = NEW.fk_sucursal), 3, '0'))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `cod_sucursal` varchar(100) NOT NULL,
  `nom_sucursal` varchar(100) NOT NULL,
  `direc_sucursal` varchar(100) NOT NULL,
  `fk_empresa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`cod_sucursal`, `nom_sucursal`, `direc_sucursal`, `fk_empresa`) VALUES
('IBRMac002', 'Mackiver', 'Mackiver 180', '76952550-5'),
('IBRMer002', 'Merced', 'Merced 200', '76952550-5'),
('newtecSan002', 'Santiago /chile', 'ahumada', '88293202-1'),
('newtecSao003', 'Sao Pablo', 'Mi Rua ', '88293202-1'),
('twlCer001', 'Cerrillos', 'Aeropuerto 300', '96808570-0');

--
-- Disparadores `sucursal`
--
DELIMITER $$
CREATE TRIGGER `sucursal_BI` BEFORE INSERT ON `sucursal` FOR EACH ROW SET NEW.cod_sucursal = concat((SELECT alias_emp FROM empresa WHERE rut_emp = NEW.fk_empresa), SUBSTRING(NEW.nom_sucursal,1,3),LPAD((SELECT COUNT(*)+1 FROM sucursal where fk_empresa = NEW.fk_empresa),3,'0'))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_ext`
--

CREATE TABLE `tabla_ext` (
  `num_orden` varchar(100) NOT NULL,
  `cod_articulo` varchar(100) NOT NULL,
  `nom_articulo` varchar(100) NOT NULL,
  `serie_articulo` varchar(100) NOT NULL,
  `tamano_lote` varchar(100) NOT NULL,
  `unidad_medida` varchar(100) NOT NULL,
  `fk_empresa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='datos_importados_SAP';

--
-- Volcado de datos para la tabla `tabla_ext`
--

INSERT INTO `tabla_ext` (`num_orden`, `cod_articulo`, `nom_articulo`, `serie_articulo`, `tamano_lote`, `unidad_medida`, `fk_empresa`) VALUES
('49214', '738574', 'ALPRAZOLAM 0,5mg COMP. ALUM. 284mm', 'ALU6A5814', '31,68', 'Kg', '96808570-0'),
('49215', '31204', 'ADESNA 500mg 2 COMP. M. MEDICA', '6A068', '11800', 'UND', '96808570-0'),
('49216', '31569', 'ADESNA 500mg 10 COMP. LR', '6A068', '61120', 'UND', '96808570-0'),
('49217', '92823', 'OMEPRAZOL CAP 20mg 100 BLISTER X 10 CAP USO EXCLUSIVO MINIST. DE SALUD PUBLICA Y B.S.', '5G500', '1225', 'UND', '96808570-0'),
('49218', '213216', 'GINKGO BILOBA 40mg 30 CAPS. BLANDAS (GEA) (SOF)', '5H500', '17034', 'UND', '96808570-0'),
('49219', '213215', 'GINKGO BILOBA 40mg 90 CAPS. BLANDAS (GEA) (SOF)', '5H501', '5000', 'UND', '96808570-0'),
('49220', '213215', 'GINKGO BILOBA 40mg 90 CAPS. BLANDAS (GEA) (SOF)', '5H502', '5657', 'UND', '96808570-0'),
('49221', '730002', 'ACICLOVIR 200mg COMP. ALUM. 193mm', 'ALU6A5815', '22,18', 'Kg', '96808570-0'),
('49223', '213062', 'VITE 400 UI 30 CAPSULAS', 'BB506012C', '10330', 'UND', '96808570-0'),
('49227', '11630', 'ALOPURINOL 300mg 1000 COMP. (I) BE LR', '5L062', '1200', 'UND', '76952550-5'),
('49229', '743707', 'KETOPROFENO T.U. 200mg NUCLEO ', '5D2351', '325,647', 'Kg', '76952550-5'),
('49233', '743706', 'KETOPROFENO T.U. 200mg COMP. REC. ENTERICO LIB. PROLONGADA', '5D2351', '356', 'Kg', '76952550-5'),
('49235', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6A091', '300', '50N', '76952550-5'),
('49236', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6A091', '480', 'Kg', '76952550-5'),
('49237', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6A092', '300', '50N', '76952550-5'),
('49238', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6A092', '480', 'Kg', '76952550-5'),
('49239', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6A093', '300', '50N', '76952550-5'),
('49240', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6A093', '480', 'Kg', '76952550-5'),
('49241', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6A094', '300', '50N', '76952550-5'),
('49242', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6A094', '480', 'Kg', '88293202-1'),
('49243', '16013', 'DICLOFENACO DIETILAMINA GEL 1,16% 30g', '6A095', '15000', 'UND', '88293202-1'),
('49244', '741127', 'DICLOFENACO DIETILAMINA GEL 1,16%', '6A095', '450', 'Kg', '88293202-1'),
('49245', '213062', 'VITE 400 UI 30 CAPSULAS', 'AB505026F', '2666', 'UND', '88293202-1'),
('49246', '251495', 'CALCIO+D3 500mg 60 COMPRIMIDOS', 'AG509003A', '5000', 'UND', '88293202-1'),
('49248', '213043', 'GINSENG ROJO COREANO 50 CAPS. BLANDAS ', 'R1507014B', '1520', 'UND', '88293202-1'),
('49249', '213126', 'GEA VITAMINA C 500mg 90 COMP (GEA)', '151008A', '4588', 'UND', '88293202-1'),
('49250', '213100', 'GEA KOL-ON 60 CAPSULAS', 'G16A00096', '3800', 'UND', '88293202-1'),
('49251', '730365', 'ADESNA 500mg COMP. ALUM. 284mm ', 'ALU6A5829', '31,01', 'Kg', '88293202-1'),
('49253', '738651', 'ADESNA 500mg COMP. M. MEDICA ALUM. 284mm ', 'ALU6A5831', '15,5', 'Kg', '88293202-1'),
('49254', '733018', 'ISTEFRAL 50mg M. MEDICA ALUMINIO 193mm', 'ALU6A5832', '10,98', 'Kg', '96808570-0'),
('49256', '31572', 'BUCOGERM TOS 10 COMP. MASTICABLES LR', '5K083', '33400', 'UND', '96808570-0'),
('49257', '31572', 'BUCOGERM TOS 10 COMP. MASTICABLES LR', '5K084', '33400', 'UND', '96808570-0'),
('49258', '250314', 'GEA FRESH 30 CAPSULAS BLANDAS', 'BB510017A', '4916', 'UND', '96808570-0'),
('49259', '31110', 'MINTAVIT C 500mg 30 COMP. (NEPG)', '150919', '6354', 'UND', '96808570-0'),
('49260', '741504', 'ELITIRAN 15mg/mL SUSPENSION PARA GOTAS', '5I0601', '390', 'Lt', '96808570-0'),
('49261', '33049', 'ELITIRAN SUSPENSION PARA GOTAS ORALES 15mg/mL 25mL', '5I0602', '15840', 'UND', '96808570-0'),
('49262', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6B060', '300', '50N', '96808570-0'),
('49263', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B060', '480', 'Kg', '96808570-0'),
('49264', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6B061', '300', '50N', '96808570-0'),
('49265', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B061', '480', 'Kg', '76952550-5'),
('49266', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6B062', '300', '50N', '76952550-5'),
('49267', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B062', '480', 'Kg', '76952550-5'),
('49268', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6B063', '300', '50N', '76952550-5'),
('49269', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B063', '480', 'Kg', '76952550-5'),
('49270', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6B064', '300', '50N', '76952550-5'),
('49271', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B064', '480', 'Kg', '76952550-5'),
('49272', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6B065', '300', '50N', '76952550-5'),
('49273', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B065', '480', 'Kg', '76952550-5'),
('49274', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6B066', '300', '50N', '76952550-5'),
('49275', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B066', '480', 'Kg', '88293202-1'),
('49276', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6B067', '300', '50N', '88293202-1'),
('49277', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B067', '480', 'Kg', '88293202-1'),
('49278', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6B068', '300', '50N', '88293202-1'),
('49279', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B068', '480', 'Kg', '88293202-1'),
('49280', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6B069', '300', '50N', '88293202-1'),
('49281', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B069', '480', 'Kg', '88293202-1'),
('49282', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6B070', '300', '50N', '88293202-1'),
('49283', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B070', '480', 'Kg', '88293202-1'),
('49284', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6B071', '300', '50N', '88293202-1'),
('49285', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B071', '480', 'Kg', '96808570-0'),
('49286', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6B072', '300', '50N', '96808570-0'),
('49287', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B072', '480', 'Kg', '96808570-0'),
('49288', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6B073', '300', '50N', '96808570-0'),
('49289', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B073', '480', 'Kg', '96808570-0'),
('49290', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6B074', '300', '50N', '96808570-0'),
('49291', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B074', '480', 'Kg', '96808570-0'),
('49292', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6B075', '300', '50N', '96808570-0'),
('49293', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B075', '480', 'Kg', '96808570-0'),
('49294', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6B076', '300', '50N', '96808570-0'),
('49295', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B076', '480', 'Kg', '76952550-5'),
('49296', '43016', 'AMOXICILINA 500mg/5mL POLVO P/ SUSP. ORAL 60 mL 50 FRASCOS (C)', '6B077', '300', '50N', '76952550-5'),
('49297', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B077', '480', 'Kg', '76952550-5'),
('49298', '13011', 'AMOXICILINA 500mg/5mL POLVO PARA SUSP. ORAL 60mL', '6B078', '15000', 'UND', '76952550-5'),
('49299', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B078', '480', 'Kg', '76952550-5'),
('49300', '13011', 'AMOXICILINA 500mg/5mL POLVO PARA SUSP. ORAL 60mL', '6B079', '15000', 'UND', '76952550-5'),
('49301', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B079', '480', 'Kg', '76952550-5'),
('49302', '13011', 'AMOXICILINA 500mg/5mL POLVO PARA SUSP. ORAL 60mL', '6B080', '15000', 'UND', '76952550-5'),
('49303', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B080', '480', 'Kg', '76952550-5'),
('49304', '13011', 'AMOXICILINA 500mg/5mL POLVO PARA SUSP. ORAL 60mL', '6B081', '15000', 'UND', '76952550-5'),
('49305', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B081', '480', 'Kg', '88293202-1'),
('49306', '13011', 'AMOXICILINA 500mg/5mL POLVO PARA SUSP. ORAL 60mL', '6B082', '15000', 'UND', '88293202-1'),
('49307', '740051', 'AMOXICILINA 500mg/5mL MEZCLA ', '6B082', '480', 'Kg', '88293202-1'),
('49308', '42013', 'FLUCLOXACILINA 500mg 500 CAPS. (C)', '6B083', '1240', 'UND', '88293202-1'),
('49309', '741877', 'FLUCLOXACILINA 500mg CAPS. ', '6B083', '433,38', 'Kg', '88293202-1'),
('49310', '741878', 'FLUCLOXACILINA 500mg MEZCLA ', '6B083', '373,86', 'Kg', '88293202-1'),
('49312', '741884', 'FACIMIN SOLUCION NASAL 0,5mg/mL', '6B084', '100', 'Lt', '88293202-1'),
('49313', '33034', 'FACIMIN SOLUCION NASAL 0,5mg/mL 10mL', '6B085', '10000', 'UND', '88293202-1'),
('49314', '741884', 'FACIMIN SOLUCION NASAL 0,5mg/mL', '6B085', '100', 'Lt', '88293202-1'),
('49315', '13062', 'AMBROXOL CLORHIDRATO 30mg/5mL JARABE 100mL LR', '6B086', '20000', 'UND', '88293202-1'),
('49316', '740039', 'AMBROXOL CLORHIDRATO 30mg/5mL JARABE', '6B086', '2000', 'Lt', '96808570-0'),
('49317', '13062', 'AMBROXOL CLORHIDRATO 30mg/5mL JARABE 100mL LR', '6B087', '20000', 'UND', '96808570-0'),
('49318', '740039', 'AMBROXOL CLORHIDRATO 30mg/5mL JARABE', '6B087', '2000', 'Lt', '96808570-0'),
('49319', '13062', 'AMBROXOL CLORHIDRATO 30mg/5mL JARABE 100mL LR', '6B088', '20000', 'UND', '96808570-0'),
('49320', '740039', 'AMBROXOL CLORHIDRATO 30mg/5mL JARABE', '6B088', '2000', 'Lt', '96808570-0'),
('49321', '13062', 'AMBROXOL CLORHIDRATO 30mg/5mL JARABE 100mL LR', '6B089', '20000', 'UND', '96808570-0'),
('49322', '740039', 'AMBROXOL CLORHIDRATO 30mg/5mL JARABE', '6B089', '2000', 'Lt', '96808570-0'),
('49325', '43025', 'IBUPROFENO 100mg/5mL SUSP. ORAL 100mL 25 FCS. (C) LR', '6B091', '800', 'UND', '96808570-0'),
('49326', '742972', 'IBUPROFENO 100mg/5mL SUSPENSION ORAL', '6B091', '2000', 'Lt', '96808570-0'),
('49327', '43025', 'IBUPROFENO 100mg/5mL SUSP. ORAL 100mL 25 FCS. (C) LR', '6B092', '800', 'UND', '96808570-0'),
('49328', '742972', 'IBUPROFENO 100mg/5mL SUSPENSION ORAL', '6B092', '2000', 'Lt', '76952550-5'),
('49329', '33068', 'NEOHYSTICLAR 2,5mg/5mL JARABE 90mL LR', '6B093', '22222', 'UND', '76952550-5'),
('49330', '744852', 'NEOHYSTICLAR 2,5mg/5mL JARABE', '6B093', '2000', 'Lt', '76952550-5'),
('49331', '13068', 'SALBUTAMOL JARABE 2mg/5mL 100mL LR', '6B094', '20000', 'UND', '76952550-5'),
('49332', '747036', 'SALBUTAMOL JARABE 2mg/5mL', '6B094', '2000', 'Lt', '76952550-5'),
('49337', '86809', 'BETAMETASONA CREMA 0,05% 15g GENERICO ECUADOR', '6B097', '30000', 'UND', '76952550-5'),
('49338', '740388', 'BETAMETASONA CREMA DERMICA 0,05%', '6B097', '450', 'Kg', '76952550-5'),
('49339', '86809', 'BETAMETASONA CREMA 0,05% 15g GENERICO ECUADOR', '6B098', '30000', 'UND', '76952550-5'),
('49340', '740388', 'BETAMETASONA CREMA DERMICA 0,05%', '6B098', '450', 'Kg', '76952550-5'),
('49341', '86809', 'BETAMETASONA CREMA 0,05% 15g GENERICO ECUADOR', '6B099', '30000', 'UND', '76952550-5'),
('49342', '740388', 'BETAMETASONA CREMA DERMICA 0,05%', '6B099', '450', 'Kg', '88293202-1'),
('49345', '36003', 'CREMIRIT CREMA DERMICA 0,05%  15g', '6B101', '30000', 'UND', '88293202-1'),
('49346', '740808', 'CREMIRIT 0,05% CREMA DERMICA', '6B101', '450', 'Kg', '88293202-1'),
('49347', '36003', 'CREMIRIT CREMA DERMICA 0,05%  15g', '6B102', '30000', 'UND', '88293202-1'),
('49348', '740808', 'CREMIRIT 0,05% CREMA DERMICA', '6B102', '450', 'Kg', '88293202-1'),
('49349', '36017', 'DONTER CREMA DERMICA 1 % 15g', '6B103', '30000', 'UND', '88293202-1'),
('49350', '741135', 'DONTER CREMA DERMICA 1%', '6B103', '450', 'Kg', '88293202-1'),
('49351', '36507', 'FRAGIDERM UNGUENTO DERMICO 30g', '6B104', '15000', 'UND', '88293202-1'),
('49352', '741889', 'FRAGIDERM UNGUENTO DERMICO ', '6B104', '450', 'Kg', '88293202-1'),
('49363', '213108', 'PROPOLEO 30mg 30 CAPSULAS', '151208A', '3600', 'UND', '88293202-1'),
('49364', '213105', 'PROPOLEO 30 mg 60 CAPSULAS (GEA)', '151208B', '3240', 'UND', '96808570-0'),
('49365', '31116', 'MAXIMOX 875/125 20 COMP. REC. BE', '6B109', '9000', 'UND', '96808570-0'),
('49366', '744480', 'MAXIMOX 875/125 COMP. REC.', '6B109', '324', 'Kg', '96808570-0'),
('49367', '744481', 'MAXIMOX 875/125 NUCLEO', '6B109', '306', 'Kg', '96808570-0'),
('49369', '744480', 'MAXIMOX 875/125 COMP. REC.', '6B110', '324', 'Kg', '96808570-0'),
('49370', '744481', 'MAXIMOX 875/125 NUCLEO', '6B110', '306', 'Kg', '96808570-0'),
('49371', '33021', 'MAXIMOX 400/57,1 POLVO PARA SUSP. ORAL C/SOLVENTE 70mL', '6B111', '9500', 'UND', '96808570-0'),
('49372', '3003', 'SOLVENTE (MAXIMOX 400/57,1 70mL) FCO. 55mL', '6B111', '9500', 'UND', '96808570-0'),
('49373', '744482', 'SOLVENTE (MAXIMOX 400/57,1) SOLUCION', '6B111', '600', 'Lt', '96808570-0'),
('49374', '744479', 'MAXIMOX 400/57,1 MEZCLA', '6B111', '210,9', 'Kg', '96808570-0'),
('49375', '33023', 'MAXIMOX 400/57,1 POLVO PARA SUSP. ORAL C/SOLVENTE 35mL MM', '6B112', '19000', 'UND', '76952550-5'),
('49376', '3005', 'SOLVENTE (MAXIMOX 400/57,1 35mL) FCO. 28mL M. MEDICA', '6B112', '21428', 'UND', '76952550-5'),
('49377', '744482', 'SOLVENTE (MAXIMOX 400/57,1) SOLUCION', '6B112', '600', 'Lt', '76952550-5'),
('49378', '744479', 'MAXIMOX 400/57,1 MEZCLA', '6B112', '210,9', 'Kg', '76952550-5'),
('49383', '732381', 'GEMFIBROZILO 600mg COMP. ALUM. 284mm', 'ALU6A5843', '47,7', 'Kg', '76952550-5'),
('49384', '732381', 'GEMFIBROZILO 600mg COMP. ALUM. 284mm', 'ALU6A5845', '47,7', 'Kg', '76952550-5'),
('49385', '16013', 'DICLOFENACO DIETILAMINA GEL 1,16% 30g', '6A097', '15000', 'UND', '76952550-5'),
('49386', '741127', 'DICLOFENACO DIETILAMINA GEL 1,16%', '6A097', '450', 'Kg', '76952550-5'),
('49387', '16013', 'DICLOFENACO DIETILAMINA GEL 1,16% 30g', '6A098', '15000', 'UND', '76952550-5'),
('49388', '741127', 'DICLOFENACO DIETILAMINA GEL 1,16%', '6A098', '450', 'Kg', '76952550-5'),
('49389', '12087', 'CEFADROXILO 500mg 8 CAP. BE', '5L016A', '1489', 'UND', '88293202-1'),
('49556', '33058', 'TULOX 50mg/5mL JARABE ADULTO 100mL LR', '6B114', '20000', 'UND', '88293202-1'),
('49557', '747427', 'TULOX JBE. ADULTO 50mg/5mL ', '6B114', '2000', 'Lt', '88293202-1'),
('49558', '33058', 'TULOX 50mg/5mL JARABE ADULTO 100mL LR', '6B115', '20000', 'UND', '88293202-1'),
('49559', '747427', 'TULOX JBE. ADULTO 50mg/5mL ', '6B115', '2000', 'Lt', '88293202-1'),
('49560', '33058', 'TULOX 50mg/5mL JARABE ADULTO 100mL LR', '6B116', '20000', 'UND', '88293202-1'),
('49561', '747427', 'TULOX JBE. ADULTO 50mg/5mL ', '6B116', '2000', 'Lt', '88293202-1'),
('49562', '744451', 'MINTAMOX JBE. 30mg/5mL ', '6B117', '2000', 'Lt', '88293202-1'),
('49563', '33059', 'MINTAMOX 30mg/5mL JARABE ADULTO 100mL LR', '6B117', '20000', 'UND', '88293202-1'),
('49564', '744451', 'MINTAMOX JBE. 30mg/5mL ', '6B118', '2000', 'Lt', '88293202-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `cod_turno` varchar(100) NOT NULL,
  `inicio` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  `cant_prod` int(11) DEFAULT NULL,
  `nom_opera` varchar(100) NOT NULL,
  `ape_opera` varchar(100) NOT NULL,
  `velocidad_pro` varchar(100) DEFAULT NULL,
  `fk_dnprog` varchar(100) DEFAULT NULL,
  `fk_dprog` varchar(100) DEFAULT NULL,
  `fk_maquina` varchar(100) NOT NULL,
  `fk_tab_ext` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`cod_turno`, `inicio`, `fin`, `cant_prod`, `nom_opera`, `ape_opera`, `velocidad_pro`, `fk_dnprog`, `fk_dprog`, `fk_maquina`, `fk_tab_ext`) VALUES
('newtecSan002-Lle002-fes001', '2018-06-25 17:08:27', NULL, NULL, 'fesa', 'lala', '44', NULL, NULL, 'newtecSan002-Lle002', '49242'),
('newtecSan002-Lle002-fes002', NULL, '2018-06-25 17:08:28', NULL, 'fesa', 'lala', '44', NULL, NULL, 'newtecSan002-Lle002', '49242');

--
-- Disparadores `turno`
--
DELIMITER $$
CREATE TRIGGER `turnos_BI` BEFORE INSERT ON `turno` FOR EACH ROW SET NEW.cod_turno = concat((SELECT cod_maq FROM maquinas WHERE cod_maq = NEW.fk_maquina),'-',SUBSTRING(NEW.nom_opera,1,3),
					LPAD((SELECT COUNT(*)+1 FROM turno WHERE fk_maquina = NEW.fk_maquina),3,'0'))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `correo_usu` varchar(100) NOT NULL,
  `nom_usu` varchar(100) NOT NULL,
  `ape_usu` varchar(100) NOT NULL,
  `tel_usu` varchar(100) NOT NULL,
  `cargo_usu` varchar(100) NOT NULL,
  `tipo_usu` varchar(100) NOT NULL,
  `contrasena_usu` varchar(250) NOT NULL,
  `fk_empresa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo_usu`, `nom_usu`, `ape_usu`, `tel_usu`, `cargo_usu`, `tipo_usu`, `contrasena_usu`, `fk_empresa`) VALUES
('desarrollo2@svg.cl', 'kevin', 'hernandez', '98790257', 'desarrollador', 'cliente', '$2y$10$FVSpbZEup4w3zM2AkDNwS.Ah.gIrAw9C.zrsJEOPDqlOWG2cTL1M.', '76952550-5'),
('desarrollo3@svg.cl', 'fernando', 'estefania', '2-56-982066137', 'desarrollador', 'desarrollador', '$2y$10$QC83ztKr/wYbNxRGxnjka.4.d02syJt5hCIvjmz2UotBn6nhqEzye', '88293202-1'),
('it@svg.cl', 'rene', 'valdes', '56966703415', 'CTO', 'desarrollador', 'blablabla', '76093249-9'),
('soporte@svg.cl', 'soporte', 'svg', 'null', 'desarrollador', 'cliente', 'blablabla', '96808570-0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `det_nprog`
--
ALTER TABLE `det_nprog`
  ADD PRIMARY KEY (`cod_dnprog`),
  ADD KEY `det_nprog_maquinas_FK` (`fk_cod_maq`);

--
-- Indices de la tabla `det_prog`
--
ALTER TABLE `det_prog`
  ADD PRIMARY KEY (`cod_dprog`),
  ADD KEY `det_prog_sucursal_FK` (`fk_cod_suc`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`rut_emp`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`cod_maq`),
  ADD KEY `maquinas_sucursal_FK` (`fk_sucursal`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`cod_sucursal`),
  ADD KEY `sucursal_empresa_FK` (`fk_empresa`);

--
-- Indices de la tabla `tabla_ext`
--
ALTER TABLE `tabla_ext`
  ADD PRIMARY KEY (`num_orden`),
  ADD KEY `tabla_ext_empresa_FK` (`fk_empresa`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`cod_turno`),
  ADD KEY `turno_det_prog_FK` (`fk_dprog`),
  ADD KEY `turno_maquinas_FK` (`fk_maquina`),
  ADD KEY `turno_det_nprog_FK` (`fk_dnprog`),
  ADD KEY `turno_tabla_ext_FK` (`fk_tab_ext`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correo_usu`),
  ADD KEY `usuario_empresa_FK` (`fk_empresa`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `det_nprog`
--
ALTER TABLE `det_nprog`
  ADD CONSTRAINT `det_nprog_maquinas_FK` FOREIGN KEY (`fk_cod_maq`) REFERENCES `maquinas` (`cod_maq`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `det_prog`
--
ALTER TABLE `det_prog`
  ADD CONSTRAINT `det_prog_sucursal_FK` FOREIGN KEY (`fk_cod_suc`) REFERENCES `sucursal` (`cod_sucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`rut_emp`) REFERENCES `usuario` (`fk_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD CONSTRAINT `maquinas_sucursal_FK` FOREIGN KEY (`fk_sucursal`) REFERENCES `sucursal` (`cod_sucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `sucursal_empresa_FK` FOREIGN KEY (`fk_empresa`) REFERENCES `empresa` (`rut_emp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tabla_ext`
--
ALTER TABLE `tabla_ext`
  ADD CONSTRAINT `tabla_ext_empresa_FK` FOREIGN KEY (`fk_empresa`) REFERENCES `empresa` (`rut_emp`);

--
-- Filtros para la tabla `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `turno_det_nprog_FK` FOREIGN KEY (`fk_dnprog`) REFERENCES `det_nprog` (`cod_dnprog`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `turno_det_prog_FK` FOREIGN KEY (`fk_dprog`) REFERENCES `det_prog` (`cod_dprog`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `turno_maquinas_FK` FOREIGN KEY (`fk_maquina`) REFERENCES `maquinas` (`cod_maq`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `turno_tabla_ext_FK` FOREIGN KEY (`fk_tab_ext`) REFERENCES `tabla_ext` (`num_orden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_empresa_FK` FOREIGN KEY (`fk_empresa`) REFERENCES `empresa` (`rut_emp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
