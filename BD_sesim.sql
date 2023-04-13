-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 01-Ago-2018 às 13:18
-- Versão do servidor: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BD_sesim`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nome_admin` varchar(250) NOT NULL,
  `email_admin` varchar(250) NOT NULL,
  `senha_admin` varchar(45) NOT NULL,
  `foto_admin` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nome_admin`, `email_admin`, `senha_admin`, `foto_admin`) VALUES
(1, 'Rômulo Lima', 'romulo@gmail.com', 'qwe123', 'asda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_doenca`
--

CREATE TABLE `tb_doenca` (
  `id_doenca` int(11) NOT NULL,
  `nome_doenca` varchar(250) NOT NULL,
  `doenca_cronica` varchar(45) NOT NULL,
  `sintomas_doenca` longtext NOT NULL,
  `desc_doenca` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_doenca`
--

INSERT INTO `tb_doenca` (`id_doenca`, `nome_doenca`, `doenca_cronica`, `sintomas_doenca`, `desc_doenca`) VALUES
(68, 'Dengue', 'NÃ£o', 'dores no corpo, febre, retenÃ§Ã£o de liquidos', 'causada pelo mosquito Aedes Aegypti, a dengue Ã© ruim cara pega nÃ£o'),
(69, 'Gripe', 'NÃ£o', 'tosse, febre (Ã s vezes), espirros constantes, dentre outros', 'causado por um virus ai'),
(70, 'Diabetes', 'Sim', 'Aumento da sede, vontade de urinar com frequÃªncia exagerada, CansaÃ§o fora do comum, dentre outros', 'O diabetes Ã© considerado uma epidemia mundial e merece atenÃ§Ã£o e cuidados especiais. A informaÃ§Ã£o Ã© uma forte aliada na luta pela diminuiÃ§Ã£o da doenÃ§a em todo o mundo.'),
(71, 'Chikugunya', 'Sim', 'Dor no corpo (principalmente nos pÃ©s), dor atrÃ¡s dos olhos, febre, enjoo dentre outros', 'Chikugunya Ã© uma doenÃ§a transmitida pelo Aedes Aegypti, o mesmo mosquito causador da dengue'),
(72, 'Conjutivite', 'NÃ£o', 'Dor e inchaÃ§o nos olhos, lacrimejamento, ardÃªncia nos olhos', 'DoenÃ§a altamente contagiosa e viral'),
(73, 'HipertensÃ£o', 'NÃ£o', 'dores no peito, etc', 'A hipertensÃ£o arterial sistÃªmica (HAS) ou pressÃ£o alta Ã© uma condiÃ§Ã£o clÃ­nica multifatorial caracterizada por nÃ­veis elevados e sustentados da pressÃ£o arterial (PA).'),
(74, 'Hepatite B', 'NÃ£o', 'doenÃ§a transmitida por vÃ­rus e que causa irritaÃ§Ã£o e inflamaÃ§Ã£o do fÃ­gado.', 'hepatite B, provocada pelo VÃ­rus da Hepatite B (VHB), descoberto em 1965, Ã© a mais perigosa das hepatites e uma das doenÃ§as mais frequentes do mundo, estimando-se que existam 350 milhÃµes de portadores crÃ³nicos do vÃ­rus.'),
(75, 'Hepatite A', 'NÃ£o', 'inflamaÃ§Ã£o e necrose do fÃ­gado', 'A transmissÃ£o do vÃ­rus Ã© fecal-oral, atravÃ©s da ingestÃ£o de Ã¡gua e alimentos contaminados ou diretamente de uma pessoa para outra. Uma pessoa infectada com o vÃ­rus pode ou nÃ£o desenvolver a doenÃ§a'),
(77, 'Tuberculose', 'Sim', 'Tosse, geralmente por mais de quinze dias, podendo produzir escarros com sangue, febre ao entardecer, fraqueza, suores excessivos Ã  noite, dores no peito e falta de apetite.', 'Trata-se de uma bactÃ©ria de nome â€œMycobacterium tuberculosisâ€ ou Bacilo de Koch, que ataca principalmente os pulmÃµes (tuberculose pulmonar), podendo atacar outros Ã³rgÃ£os do corpo tambÃ©m, como o sistema nervoso central (Meningite), gÃ¢nglios linfÃ¡ticos, sistema circulatÃ³rio (tuberculose miliar), ossos e articulaÃ§Ãµes, sendo somente a tuberculose pulmonar Ã© transmissÃ­vel.'),
(78, 'Difteria', 'Sim', 'Febre, cansaÃ§o, dores de garganta e dificuldades para engolir, sÃ£o os sintomas da difteria, podendo ocorrer tambÃ©m vÃ´mitos, calafrios, fraqueza e nÃ¡useas.', 'DoenÃ§a altamente contagiosa causada por uma bactÃ©ria de nome â€œCorynebacterium diphteriaeâ€, a difteria, ou â€œcrupeâ€ Ã© uma doenÃ§a que ataca o sistema respiratÃ³rio.'),
(79, 'TÃ©tano', 'Sim', 'Os principais sintomas sÃ£o rigidez musculares, inicialmente no pescoÃ§o e na mastigaÃ§Ã£o, progredindo para os mÃºsculos respiratÃ³rios, febre e suor excessivo.', 'DoenÃ§a infecciosa, grave, aguda, nÃ£o contagiosa, causada por uma bactÃ©ria de nome "Clostridium Tetani", que pode em muitos dos casos ser fatal.'),
(80, 'Coqueluche', 'NÃ£o Informado', 'O inÃ­cio da doenÃ§a pode ser confundido com uma gripe (febre, coriza, olhos avermelhados), posteriormente, Ã© caracterizada por catarros, vÃ´mitos, tosse prolongada (tosse comprida) entre outros, como lesÃµes leves no freio da lÃ­ngua e hemorragias leves nos olhos.', 'DoenÃ§a causada por bactÃ©ria extremamente contagiosa que ataca as vias respiratÃ³rias.'),
(81, 'Sarampo', 'Sim', 'Os sintomas inicias sÃ£o febre alta, tosse rouca e constante, coriza, conjuntivite, hipersensibilidade a luz, manchas brancas na mucosa da boca e posteriormente manchas avermelhadas na pele, sendo iniciado no rosto e progredindo em direÃ§Ã£o aos pÃ©s, com duraÃ§Ã£o de trÃªs dias e desaparecendo na mesma ordem do aparecimento.', 'O Sarampo Ã© uma doenÃ§a viral extremamente contagiosa com diversos sintomas e erupÃ§Ã£o caracterÃ­stica, sendo as crianÃ§as na faixa etÃ¡ria de 2 anos mais vulnerÃ¡veis ao vÃ­rus.'),
(82, 'Caxumba', 'Sim', 'Costumam aparecer de 12 a 25 dias apÃ³s o contato com o vÃ­rus. O sintoma mais comum Ã© o inchaÃ§o nas glÃ¢ndulas localizadas a frente das orelhas, e que quando apalpadas, provocam dores, podendo ocorrer tambÃ©m dores ao mastigar e engolir, febre, dor de cabeÃ§a, fraqueza, dores musculares entre outros.', 'TambÃ©m chamada de Papeira ou Parotidite, a Caxumba Ã© uma doenÃ§a viral caracterizada pelo inchaÃ§o das glÃ¢ndulas salivares, e seu perÃ­odo de encubaÃ§Ã£o (contato com o vÃ­rus e aparecimento dos sintomas) Ã© de 16 a 18 dias.'),
(83, 'Pneumonia', 'Sim', 'No inÃ­cio pode ser confundida com uma gripe, com sintomas como febre, calafrios, tosse com secreÃ§Ã£o, dores no peito e dificuldades para respirar. JÃ¡ em casos mais avanÃ§ados, pode ocorrer acÃºmulo de lÃ­quidos nos pulmÃµes e ulceraÃ§Ãµes nos brÃ´nquios.', 'InflamaÃ§Ã£o ou a infecÃ§Ã£o dos pulmÃµes causados por vÃ­rus, fungos, parasitas ou bactÃ©rias (pneumococo), sendo essa Ãºltima responsÃ¡vel pela maior parte dos casos.'),
(84, 'Catapora', 'NÃ£o Informado', 'Em crianÃ§as, em geral, a manifestaÃ§Ã£o da Catapora, sÃ£o as lesÃµes de pele (sendo no inÃ­cio como pequenas manchas vermelhas e posteriormente, pequenas bolhas com conteÃºdo lÃ­quido claro), podendo ocorrer tambÃ©m, febre, cansaÃ§o, dores de cabeÃ§a, e perda do apetite, de um a dois dias antes do aparecimento das lesÃµes.', 'Varicela ou Catapora Ã© uma doenÃ§a infecciosa aguda altamente transmissÃ­vel causada pelo vÃ­rus â€œvaricela-zosterâ€. A doenÃ§a Ã© mais comum em crianÃ§as entre um e dez anos de idade, podendo ocorrer em pessoas susceptÃ­veis (nÃ£o imunes) de qualquer idade.'),
(85, 'Poliomielite', 'NÃ£o', 'SÃ£o variÃ¡veis e algumas vezes parecidos com os da gripe, febre, dor de garganta e no corpo, nÃ¡useas e vÃ´mitos. Pode ocorrer meningite.', 'Poliomielite ou paralisia infantil Ã© uma doenÃ§a infecto-contagiosa viral aguda, causada pelo poliovÃ­rus, do gÃªnero enterovÃ­rus, apresentando trÃªs sorotipos: I, II e III. Caracterizada por quadro de paralisia flÃ¡cida, o dÃ©ficit motor ocorre subitamente, acometendo em geral os membros inferiores, de forma assimÃ©trica.'),
(86, 'Meningite', 'Sim', 'Febre, dores de cabeÃ§a, nÃ¡useas, vÃ´mitos, rigidez na nuca, sensibilidade a luz, alteraÃ§Ãµes do estado de consciÃªncia, e para crianÃ§as abaixo de um ano de idade, pode ocorrer o abaulamento da fontanela (meleira) e choro persistente.', 'Meningite Ã© a inflamaÃ§Ã£o das membranas que revestem o cÃ©rebro e a medula espinhal, podendo ser viral ou bacteriana, sendo essa Ãºltima prevenida por vacina.'),
(87, 'Acne', 'NÃ£o', 'presenÃ§a de comedÃµes abertos ou fechados com poucos sinais de inflamaÃ§Ã£o.', 'A acne, tambÃ©m conhecida como espinha ou cravo,Ã© uma doenÃ§a da pele muito frequente que ocorre devido Ã  obstruÃ§Ã£o dos folÃ­culos pilossebÃ¡ceos. Essa obstruÃ§Ã£o pode ser ocasionada pelo excesso de sebo produzido por glÃ¢ndulas sebÃ¡ceas e tambÃ©m pela presenÃ§a de cÃ©lulas mortas. O acÃºmulo causa inflamaÃ§Ã£o da pele e esse ambiente pode propiciar o aparecimento e crescimento de bactÃ©rias, principalmente a Propioniumbacterium acnes. As lesÃµes de acne cicatrizam lentamente.'),
(88, 'Alergia ao sol', 'Sim', 'A alergia ao sol pode ser classificada em quatro grupos de acordo com os sintomas e as circunstÃ¢ncias de surgimento: urticÃ¡ria solar, erupÃ§Ã£o cutÃ¢nea fotoalÃ©rgica, erupÃ§Ã£o polimorfa Ã  luz e a fotossensibilidade.', 'A alergia ao sol Ã© uma reaÃ§Ã£o do sistema imunolÃ³gico Ã  exposiÃ§Ã£o da pele Ã  luz solar. Ã‰ tambÃ©m chamado de erupÃ§Ã£o cutÃ¢nea fotoalÃ©rgica ou fotoalergia e fotodermatose.\r\nEstima-se que 5 a 10% das pessoas sofrem de alergia ao sol. Esta doenÃ§a afeta principalmente as mulheres, sendo que 95% sÃ£o jovens de 20 a 35 anos.'),
(89, 'Alzheimer', 'Sim', 'Perda de neurÃ´nios colinÃ©rgicos, o que reduz o nÃºmero de conexÃµes cerebrais', 'O Alzheimer Ã© uma doenÃ§a crÃ´nica cada vez mais freqÃ¼ente entre a populÃ§Ã£o. Trata-se de uma doenÃ§a que afeta a memÃ³ria e as faculdades mentais em geral, eque evolui de maneira progressiva e irreversÃ­vel, devido a uma degeneraÃ§Ã£o do tecido cerebral, queleva a pessoa a um estado de demÃªncia. A doenÃ§a de Alzheimer pertence Ã s demÃªncias, um grupo doenÃ§a que leva a uma perda de capacidades intelectuais e sociais. O Alzheimer Ã© de longe a demÃªncia mais frequente.'),
(90, 'Amenorreia', 'NÃ£o', 'O Ãºnico sintoma da amenorreia Ã© a falta de menstruaÃ§Ã£o. Outros sintomas estÃ£o relacionados com as possÃ­veis causas que levam a amenorreia (por exemplo, ondas de calor e alteraÃ§Ãµes de humor, no caso da menopausa).', 'A amenorreia Ã© uma consequÃªncia natural do aleitamento, da gravidez e da menopausa. AlÃ©m dos trÃªs casos, 3 a 4% das mulheres sofrem de amenorreia devido Ã  um problema de saÃºde subjacentes, como os distÃºrbios alimentares ou doenÃ§as endÃ³crinas.'),
(91, 'Angina', 'NÃ£o Informado', 'dor de garganta, febre, bronquite, tosse', 'A angina ou amigdalite Ã© uma inflamaÃ§Ã£o aguda da garganta (orofaringe e/ou amÃ­gdalas). Esta Ã© uma doenÃ§a muito comum em crianÃ§as, mas tambÃ©m em adultos, e nestes, trata-se principalmente de amigdalite viral.'),
(92, 'Apneia do sono', 'Sim', 'Ronco e dor de garganta', 'A apneia do sono Ã© uma desordem na qual o paciente, durante o sono, pÃ¡ra de respirar abruptamente e permanece assim durante alguns segundos atÃ© que ele acorde para voltar a respirar. Esses episÃ³dios podem se repetir por diversas vezes e atrapalham o sono da pessoa, que acorda cansada e com a sensaÃ§Ã£o de que nÃ£o dormiu nada.'),
(93, 'Anemia', 'NÃ£o', 'Os sintomas da anemia sÃ£o melhor administrÃ¡veis em caso de anemia crÃ´nica, pois o corpo tem o tempo de se adaptar Ã  falta de oxigÃªnio. NÃ£o Ã© o caso quando ocorre a anemia aguda, onde a queda drÃ¡stica de glÃ³bulos vermelhos Ã© bem menos tolerada.\r\n\r\nOs sintomas gerais dos diferentes tipos de anemia sÃ£o os seguintes:\r\n\r\nâ€“ fadiga\r\nâ€“ palidez da pele e das mucosas\r\nâ€“ palpitaÃ§Ãµes\r\nâ€“ sufocaÃ§Ã£o\r\n\r\nApÃ³s a falta de oxigÃªnio, os sintomas podem se agravar e provocar tambÃ©m os seguintes sintomas iniciais:\r\nâ€“ dores de cabeÃ§a\r\nâ€“ vertigens\r\nâ€“ zumbidos no ouvido\r\n\r\nOs sintomas caracterÃ­sticos aos diferentes tipos de anemia sÃ£o os citados abaix\r\n\r\nâ€“ Anemia perniciosa ou megaloblÃ¡stica: Este tipo de anemia Ã© geralmente bem tolerado, visto a sua instalaÃ§Ã£o progressiva. A vitamina B12 intervÃ©m tambÃ©m na transmissÃ£o nervosa, sua carÃªncia pode provocar distÃºrbios nervosos.\r\n\r\nâ€“ Anemia ferropriva (anemia por carÃªncia marcial): Em geral, os sintomas deste tipo de anemia sÃ£o idÃªnticos aos sintomas gerais. AlÃ©m disso, a doenÃ§a Ã© bem tolerada.o corpo se adapta au manqueongles.\r\n\r\nâ€“ Anemia hemolÃ­tica: AlÃ©m dos sintomas gerais, Ã© possÃ­vel identificar uma esplenomegalia ou uma icterÃ­cia.\r\n\r\nâ€“ Anemia do recÃ©m-nascid os sinais caracterÃ­sticos da anemia do recÃ©m-nascido sÃ£o a palidez, uma dificuldade na tomada da mamadeira (devido a uma sufocaÃ§Ã£o) e um sopro cardÃ­aco.', 'A anemia Ã© uma doenÃ§a que afeta a qualidade e a quantidade de glÃ³bulos vermelhos (ou eritrÃ³citos) no sangue. Ela pode ocorrer por diversos fatores.\r\nUm dos tipos de anemia Ã© aquela caracterizada pela ausÃªncia de nutrientes que sÃ£o utilizados na produÃ§Ã£o de elementos dos glÃ³bulos vermelhos, como o ferro (anemia ferropriva), vitamina B12 ou Ã¡cido fÃ³lico (anemia perniciosa ou megaloblÃ¡stica). Outro fator Ã© a excessiva perda de sangue, como em hemorragias. Determinadas doenÃ§as infecciosas e auto-imunes, alÃ©m de substÃ¢ncias tÃ³xicas, podem ocasionar destruiÃ§Ã£o das cÃ©lulas vermelhas do sangue, levando Ã  anemia hemolÃ­tica.'),
(94, 'Artrose', 'NÃ£o', 'A artrose Ã© caracterizada por dor articular que aumenta conforme o movimento, a dor pode ser mais intensa durante a noite e madrugada.\r\n\r\nEstes sintomas sÃ£o tÃ­picos, por exemplo, na artrose do joelho e do quadril.\r\n\r\nMuitas vezes, a articulaÃ§Ã£o aumenta de tamanho pela formaÃ§Ã£o de um edema. Os sintomas geralmente diminuem de intensidade no repouso. A articulaÃ§Ã£o tambÃ©m pode tornar-se mais rÃ­gida.\r\n\r\nNa parte da manhÃ£, ao acordar, a articulaÃ§Ã£o pode estar rÃ­gida, mas com um pouco de exercÃ­cio torna-se mais flexÃ­vel.\r\n\r\nEm caso de atividade (exercÃ­cio), a articulaÃ§Ã£o pode fazer um estalo, no entanto, nÃ£o Ã© grave e nÃ£o impede o movimento.', 'A artrose pode afetar uma ou mais articulaÃ§Ãµes. As articulaÃ§Ãµes mais afetadas sÃ£o as do joelho (gonartrose), do quadril (coxartrose) e dos dedos (poliartrose digital).\r\n\r\nA idade Ã© um fator de risco importante e, de fato, a artrose geralmente se desenvolve apÃ³s os 60 anos de idade. Fatores genÃ©ticos, excesso de peso e prÃ¡tica excessiva de esportes tambÃ©m sÃ£o causas frequentes desse reumatismo.'),
(95, 'Artrite', 'Sim', 'Em funÃ§Ã£o do tipo de artrite, os sintomas e principalmente a localizaÃ§Ã£o podem ser diferentes, mas em geral, a articulaÃ§Ã£o apresenta os sintomas tÃ­picos de uma inflamaÃ§Ã£o: dores, calor, vermelhidÃ£o e tumefaÃ§Ã£o (articulaÃ§Ã£o inchada), Ã s vezes acompanhada de febre. As dores sÃ£o quase sempre noturnas e aumentam quando se estÃ¡ em repouso (sem atividade).\r\n\r\nCom o passar do tempo, a inflamaÃ§Ã£o progressiva leva a rigidez da articulaÃ§Ã£o com conseqÃ¼ente reduÃ§Ã£o do movimento.\r\n\r\nAs articulaÃ§Ãµes mais atingidas sÃ£o:\r\nâ€“ MÃ£os\r\nâ€“ Joelhos\r\nâ€“ PÃ©s\r\nâ€“ Cotovelos\r\nâ€“ Ombros\r\nâ€“ MandÃ­bula\r\nâ€“ Coluna\r\nâ€“ Quadril', 'A artrite Ã© uma doenÃ§a inflamatÃ³ria que atinge uma ou mais articulaÃ§Ãµes e pode ter carÃ¡ter agudo ou crÃ´nico. Existem vÃ¡rios tipos de artrite, como a artrite psoriÃ¡tica, artrite reumatÃ³ide, artrose, artrite infecciosa, etc. As artrites atingem cerca de 10% da populaÃ§Ã£o masculina mundial e 15% das mulheres. Esses nÃºmeros aumentam com o passar da idade, sobretudo apÃ³s os 70 anos de idade.'),
(96, 'Asma', 'Sim', 'Os sintomas tÃ­picos da asma sÃ£o:\r\n\r\nâ€“ Dificuldade para respirar = dispnÃ©ia (que aparece em forma de crise: crise de asma)\r\nâ€“ SensaÃ§Ã£o de opressÃ£o no peito\r\nâ€“ Tosse (por ex. acompanhada de catarros). A tosse Ã© muitas vezes agravada por um episÃ³dio de gripe ou de resfriado.\r\nâ€“ Chiado no peito durante a expiraÃ§Ã£o\r\nâ€“ InsÃ´nia\r\nâ€“ CansaÃ§o diurno\r\nâ€“ DiminuiÃ§Ã£o da atividade e rendimento escolar ou do trabalho.\r\n\r\nVocÃª deve saber que os sintomas de asma podem ocorrer vÃ¡rias vezes por dia ou por semana. A intensidade varia de um indivÃ­duo para outro.\r\n\r\nOs mÃ©dicos destacam diferentes tipos de asma, isso permite em funÃ§Ã£o do grau de severidade, prescrever o tratamento mais adequado.', 'A asma Ã© uma doenÃ§a crÃ´nica dos brÃ´nquios. Esta condiÃ§Ã£o Ã© caracterizada por crises de asma (aperto no peito), na qual ocorre uma forte contraÃ§Ã£o dos mÃºsculos que controlam a abertura e o fechamento dos brÃ´nquios.\r\nA asma Ã© uma doenÃ§a que mata dezenas de pessoas ao redor do mundo todos os dias. Cabe, portanto, ao prÃ³prio paciente e Ã  equipe mÃ©dica considerar essa doenÃ§a como sÃ©ria.'),
(97, 'Verrugas', 'NÃ£o', 'verrugas vulgares: trata-se de uma excrescÃªncia da pele, de cor cinza-amarelado, com a superfÃ­cie da verruga um pouco porosa. As verrugas vulgares podem ser apresentadas de forma isolada ou em cachos. Estas verrugas geralmente aparecem nas mÃ£os e nos pÃ©s, e nÃ£o provocam dores. As verrugas comuns nÃ£o apresentam risco de cÃ¢ncer.', 'Uma verruga Ã© um pequeno tumor de pele geralmente benigno, com uma superfÃ­cie irregular. As verrugas mais frequentes sÃ£o as verrugas comuns e planas.'),
(98, 'Aids', 'Sim', 'â€“ Os sintomas da AIDS sÃ£o inÃºmeros e serÃ£o tambÃ©m abordados em â€œcomplicaÃ§Ãµes da aidsâ€.\r\n\r\nRessaltamos em geral os seguintes sintomas:\r\n\r\nâ€“ InfecÃ§Ã£o pelo Pneumocystis carinii, que pode levar a uma pneumonia (sintoma: tosse seca,â€¦).\r\n\r\nâ€“ Perda de peso\r\n\r\nâ€“ DiarrÃ©ia\r\n\r\nfadiga aids- Fraqueza (fadiga)\r\n\r\nâ€“ Manchas sobre a pele (sarcoma de Kaposi)\r\n\r\nâ€“ Micose das unhas\r\n\r\nâ€“ Estomatomicose (sapinho)\r\n\r\nâ€“ Micoses em geral\r\n\r\nâ€“ Tuberculose\r\n\r\nâ€“ Meningite\r\n\r\nâ€“ LesÃµes infecciosas na regiÃ£o dos olhos: herpes, citomegalovÃ­rus,â€¦', 'A aids Ã© uma doenÃ§a crÃ´nica que atinge o sistema imunolÃ³gico e que pode levar Ã  morte (no caso da ausÃªncia de tratamento). Quem sofre de  aids tem a imunidade enfraquecida contra as infecÃ§Ãµes ou tumores (cÃ¢ncer).\r\nA transmissÃ£o do HIV ocorre por meio do sangue, sÃªmen (assim como o lÃ­quido seminal que escorre no inÃ­cio da ereÃ§Ã£o), secreÃ§Ãµes vaginais e leite (uma forma de transmissÃ£o da mÃ£e para o recÃ©m-nascido).'),
(100, 'Transtorno bipolar', 'Sim', 'Durante o transtorno bipolar, o paciente passa por diferentes episÃ³dios manÃ­acos e depressivos. O paciente vive perÃ­odos neutros tambÃ©m. Estes episÃ³dios neutros sÃ£o intervalos livres em que o paciente nÃ£o Ã© nem manÃ­aco nem depressivo.\r\n\r\nFases manÃ­acas duram, pelo menos, uma semana, e podem incluir os seguintes sintomas:\r\n\r\nâ€“ DiminuiÃ§Ã£o da necessidade de sono; insÃ´nia.\r\n\r\nâ€“ AgitaÃ§Ã£o.\r\n\r\nâ€“ Ideias de grandeza, autoestima inflada.\r\n\r\nâ€“ Facilidade de contato, ruptura social.\r\n\r\nâ€“ Ideias fÃ©rteis, grande criatividade.\r\n\r\nâ€“ DistraÃ§Ã£o.\r\n\r\nâ€“ Perda excessiva de limites de comportamento social.\r\n\r\nâ€“ AlucinaÃ§Ãµes, delÃ­rios.\r\n\r\nO comportamento excessivo pode resultar em intenso estado de euforia (felicidade pura) ou de outra forma de irritabilidade.\r\n\r\nA hipomania dura mais de 4 dias. AlucinaÃ§Ãµes comeÃ§am a desaparecer.\r\n\r\nFases depressivas sÃ£o caracterizados pelos seguintes sintomas:\r\n\r\nâ€“ Grande e crescente tristeza inexplicÃ¡vel.\r\n\r\nâ€“ Desespero, tristeza.\r\n\r\nâ€“ ContÃ­nua auto-depreciaÃ§Ã£o; auto-culpa exagerada.\r\n\r\nâ€“ Dificuldade em se mover, para seguir em frente (retardo motor).\r\n\r\nâ€“ Dificuldade em encontrar novas ideias (retardamento criativo).\r\n\r\nâ€“ Dificuldade em adormecer e acordar cedo.\r\n\r\nâ€“ Dificuldade e pouca vontade de comer.\r\n\r\nâ€“ Dificuldade em falar, de se expressar, de ser compreendido.\r\n\r\nâ€“ Falta de dinamicidade.\r\n\r\nâ€“ IdeaÃ§Ã£o suicida.\r\n\r\nNo transtorno bipolar I, o paciente passa por episÃ³dios manÃ­acos recorrentes com ou sem episÃ³dios depressivos.\r\n\r\nNo caso do transtorno bipolar II, o paciente passa por hipomania com episÃ³dios depressivos.\r\n\r\nSe os episÃ³dios manÃ­aco causa profunda dor emocional, o paciente pode ter pensamentos suicidas. As tentativas de suicÃ­dio pode ser espontÃ¢neas, bem como previamente pensadas. TambÃ©m Ã© possÃ­vel que os pacientes cometem homicÃ­dio tentando salvar seus entes queridos e depois cometer suicÃ­dio. Esta Ã© a ideia de salvar suas famÃ­lias.', 'O diagnÃ³stico do transtorno bipolar envolve a coleta dos sintomas apresentados pelo paciente. O mÃ©dico analisa as queixas do paciente e tenta primeiro determinar alternativas para os distÃºrbios intelectuais, somÃ¡ticos ou psicÃ³ticos.'),
(101, 'Azia', 'NÃ£o', 'Os sintomas da azia sÃ£o basicamente queimaÃ§Ã£o na regiÃ£o peitoral, principalmente apÃ³s as refeiÃ§Ãµes e durante a noite (ao deitar) e dores esofÃ¡gicas e peitorais que pioram quando a pessoa estÃ¡ deitada ou se dobra. Por vezes a dor no peito pode ser tÃ£o intensa que, em muitos casos, os pacientes a confundem com angina.\r\nO suco gÃ¡strico pode subir atÃ© a garganta e ocasionar um gosto amargo e Ã¡cido na boca. Outros sintomas incluem dificuldades em respirar e crises de asma noturna e tosse.', 'A azia ou pirose Ã© caracteriza-se por sensaÃ§Ã£o de queimaÃ§Ã£o e dor na regiÃ£o do peito ocasionada pelo Ã¡cido gÃ¡strico que sobe pelo esÃ´fago, podendo atingir a faringe. Estudos apontam que cerca de 7% da populaÃ§Ã£o mundial sofre diariamente desse mal e que 50% tem acessos mensais de queimaÃ§Ã£o.\r\nA causa bÃ¡sica da azia Ã© quando o suco gÃ¡strico retorna pelo esÃ´fago. Isso ocorre quando o esfÃ­ncter esofÃ¡gico nÃ£o se contrai totalmente e permite que o Ã¡cido estomacal entre em contato com a mucosa esofÃ¡gica. Fatores como alimentaÃ§Ã£o inadequada, estresse, tabagismo e consumo de Ã¡lcool podem desencadear a azia. Pacientes acima do peso, grÃ¡vidas e com doenÃ§a do refluxo gastresofÃ¡gico tÃªm mais chance de sofrerem de azia.'),
(103, 'Bronquite', 'Sim', 'Os sintomas da bronquite variam em funÃ§Ã£o do tipo da doenÃ§a (veja definiÃ§Ã£o da bronquite). Muitas vezes Ã© possÃ­vel enumerar certos sintomas comuns Ã s duas formas da bronquite, tais como:\r\n\r\nâ€“ Tosse, com produÃ§Ã£o de muco. O muco pode ter cores diferentes: lÃ­quido branco ou transparente, amarelo ou verde;\r\nâ€“ Falta de ar agravada pelo estresse, Ã s vezes com respiraÃ§Ã£o com chiado;\r\nâ€“ Dores no peito;\r\nâ€“ Fadiga\r\nâ€“ Febre', 'A bronquite Ã© uma inflamaÃ§Ã£o dos brÃ´nquios que se manifesta por tosse acompanhada de expectoraÃ§Ã£o.\r\nEsta Ã© uma doenÃ§a muito comum que pode ser dividida em dois tipos: bronquite aguda e bronquite crÃ´nica.\r\nA bronquite aguda Ã© muitas vezes a conseqÃ¼Ãªncia ou complicaÃ§Ã£o de uma gripe ou um resfriado geralmente de origem viral.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_grafico`
--

CREATE TABLE `tb_grafico` (
  `id_grafico` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `localidade` varchar(250) NOT NULL,
  `tipo_doenca` varchar(250) NOT NULL,
  `idade` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_grafico`
--

INSERT INTO `tb_grafico` (`id_grafico`, `nome`, `genero`, `localidade`, `tipo_doenca`, `idade`) VALUES
(71, 'sthefani', 'Feminino', 'BanguÃª 2', 'Gripe', 'CrianÃ§a/Adolescente'),
(72, 'sthefani', 'Feminino', 'BanguÃª 2', 'Conjutivite', 'Adulto'),
(73, 'aaaa', 'Masculino', 'PajeÃº', 'Diabetes', 'Idoso'),
(74, 'RÃ´mulo Lima Fonseca', 'Masculino', 'Centro', 'Gripe', 'CrianÃ§a/Adolescente'),
(75, 'Antonio Jefferson', 'Masculino', 'Formoso', 'Chikugunya', 'CrianÃ§a/Adolescente'),
(76, 'Fernando Rondinele', 'Masculino', 'Cavalaria', 'Difteria', 'Adulto'),
(77, 'Marcelo Henrique', 'Masculino', 'CroatÃ¡ 1', 'HipertensÃ£o', 'CrianÃ§a/Adolescente'),
(80, 'Marcos VerÃ­ssimo', 'Masculino', 'CroatÃ¡ 1', 'Conjutivite', 'Adulto'),
(81, 'Bruno Queiroz', 'Masculino', 'CroatÃ¡ 1', 'Conjutivite', 'CrianÃ§a/Adolescente'),
(82, 'AAAA', 'AAAA', 'CroatÃ¡ 1', 'Conjutivite', 'CrianÃ§a/Adolescente'),
(83, 'Erica', 'Feminino', 'Aldeia Park', 'Gripe', 'CrianÃ§a/Adolescente'),
(84, 'Luis Gaylherme', 'Masculino', 'Buriti 1', 'Diabetes', 'CrianÃ§a/Adolescente'),
(85, 'romulo lima bezerra', 'Masculino', 'Aldeia Park', 'Poliomielite', 'Adulto'),
(86, 'Evandro', 'Masculino', 'Centro', 'torcicolo', 'CrianÃ§a/Adolescente'),
(87, 'Luis Guilherme', 'Masculino', 'Aldeia Park', 'Gripe', 'CrianÃ§a/Adolescente'),
(88, 'Nahana', 'Feminino', 'BanguÃª 2', 'Conjutivite', 'CrianÃ§a/Adolescente'),
(89, 'Marcos Preto', 'Masculino', 'Centro', 'Gripe', 'Adulto'),
(98, 'romulo', 'Masculino', 'Centro', 'Catapora', 'CrianÃ§a/Adolescente'),
(99, 'Sonia', 'Feminino', 'Alto da Boa Vista', 'Azia', 'Adulto'),
(100, 'sadsadasdsa', 'Sem InformaÃ§Ã£o', 'Alto da Boa Vista', 'Transtorno bipolar', 'CrianÃ§a/Adolescente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_msg`
--

CREATE TABLE `tb_msg` (
  `id_msg` int(11) NOT NULL,
  `mensagem_msg` varchar(45) NOT NULL,
  `nome_msg` varchar(45) NOT NULL,
  `foto_contato` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_msg`
--

INSERT INTO `tb_msg` (`id_msg`, `mensagem_msg`, `nome_msg`, `foto_contato`, `status`) VALUES
(3, 'vou da 5 estrelas', 'bbbb', '1762607451.jpg', 'aprovado'),
(6, 'show', 'RÃ´mulo Lima', '1375147385.jpg', 'aprovado'),
(7, 'top', 'Bruno', '872593514.jpg', 'aprovado'),
(9, 'ta show o sistema pivete', 'Jeffin', '1944387706.png', 'aprovado'),
(11, 'valeu galerinha', 'neymar', '1043923035.jpg', 'aprovado'),
(14, 'Ã“timo sistema', 'Stheffani Adrelino', '1018915975.jpg', 'aprovado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nome_user` varchar(250) NOT NULL,
  `idade_user` date NOT NULL,
  `sexo_user` varchar(45) NOT NULL,
  `email_user` varchar(250) NOT NULL,
  `senha_user` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nome_user`, `idade_user`, `sexo_user`, `email_user`, `senha_user`) VALUES
(1, 'jeffin', '2001-05-12', 'Masculino', 'jeffin@gmail.com', 'qwe123'),
(21, 'Emanuel Soares', '2018-05-13', 'Masculino', 'bruno@gmail.com', 'qwe123'),
(22, 'Emanuel Soares', '2018-05-13', 'Masculino', 'bruno@gmail.com', 'qwe123'),
(23, 'Emanuel Soares', '2018-05-13', 'Masculino', 'bruno@gmail.com', 'qwe123'),
(24, 'Emanuel Soares', '2018-05-13', 'Masculino', 'bruno@gmail.com', 'qwe123'),
(25, 'Emanuel Soares', '2018-05-13', 'Masculino', 'bruno@gmail.com', 'qwe123'),
(26, 'Emanuel Soares', '2018-05-07', 'Masculino', 'bruno@gmail.com', 'qwe123'),
(27, 'Emanuel Soares', '2018-05-07', 'Masculino', 'bruno@gmail.com', 'qwe123'),
(28, 'RÃ´mulo Lima', '2001-09-26', 'Masculino', 'romulo@gmail.com', 'qwe123'),
(29, 'sthefani', '2001-12-04', 'Feminino', '2016infor41@gmail.com', 'qwe123'),
(30, 'Bruno Queiroz', '2001-06-21', 'Masculino', 'bruno@gmail.com', 'qwe123'),
(31, 'asdasdas', '2018-06-19', 'Masculino', 'wqe@gmail.com', 'qwe123'),
(32, 'dddd', '2018-06-18', 'Masculino', 'aaaa@gmail.com', 'qwe123'),
(33, 'bbbb', '2018-06-26', 'Masculino', 'bbb@gmail.com', 'qwe123'),
(39, 'romulo2', '2018-06-19', 'Masculino', 'fanyasdsadsad@gmail.com', 'qwe123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_vacina`
--

CREATE TABLE `tb_vacina` (
  `id_vacina` int(11) NOT NULL,
  `nome_vacina` varchar(250) NOT NULL,
  `rec_vacina` varchar(250) NOT NULL,
  `comb_vacina` varchar(45) NOT NULL,
  `contra_vacina` longtext NOT NULL,
  `comp_vacina` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_vacina`
--

INSERT INTO `tb_vacina` (`id_vacina`, `nome_vacina`, `rec_vacina`, `comb_vacina`, `contra_vacina`, `comp_vacina`) VALUES
(28, 'Losartana', 'Adultos, Idosos', 'HipertensÃ£o', 'AlÃ©rgicos', 'componentes da losartana'),
(29, 'Captopril', 'Adultos, Idosos', 'HipertensÃ£o', 'AlÃ©rgicos', 'componentes da hipertensÃ£o'),
(35, 'colÃ­rios', 'NÃ£o Informado', 'Conjutivite', 'alÃ©rgicos', 'ContÃ©m 3 ingredientes umidificantes, Dextrana 70, Hipromelose e Glicerol'),
(36, 'soro fisiolÃ³gico', 'RecÃ©m-nascidos', 'Conjutivite', 'alÃ©gicos', 'contem 0,9%, em massa, de NaCl em Ã¡gua destilada. Cada 100mL da soluÃ§Ã£o aquosa contÃ©m 0,9 gramas do sal (0,354 gramas de Na+ e 0,546 gramas de Cl-, com pH = 6,0).'),
(37, 'ibuprofeno', 'NÃ£o Informado', 'Chikugunya', 'alÃ©rgicos', 'Ã¡lcool polivinÃ­lico + diÃ³xido de titÃ¢nio + macrogol + talco, celulose + lactose, amidoglicolato de sÃ³dio, estearato de magnÃ©sio, povidona, amido, Ã¡gua purificada'),
(38, 'Paracetamol Comprimido', 'NÃ£o Informado, CrianÃ§as', 'Chikugunya', 'alÃ©rgicos', 'Ã¡cido esteÃ¡rico, amido, crospovidona, estearato de magnÃ©sio, hipromelose, macrogol, povidona'),
(39, 'insulina', 'RecÃ©m-nascidos', 'Diabetes', 'alÃ©rgicos', 'diazÃ³xido , asparaginase , Ã¡cido nicotÃ­nico'),
(40, 'Glibenclamida Comprimido', 'RecÃ©m-nascidos, CrianÃ§as', 'Diabetes', 'mulheres durante a gravidez ou em lactantes.', 'lactose monoidratada, amido pregelatinizado, estearato de magnÃ©sio, croscarmelose sÃ³dica, diÃ³xido de silÃ­cio, laurilsulfato de sÃ³dio'),
(41, 'multigrip', 'NÃ£o Informado', 'Gripe', 'pacientes com hipersensibilidade aos componentes da fÃ³rmula, pressÃ£o alta, doenÃ§a cardÃ­aca, diabetes, glaucoma, hipertrofia da prÃ³stata, doenÃ§a renal crÃ´nica, insuficiÃªncia hepÃ¡tica grave, disfunÃ§Ã£o tireoidiana, gravidez e lactaÃ§Ã£o', 'Paracetamol 400 mg, Maleato de clorfeniramina 4 mg, Cloridrato de fenilefrina 4 mg'),
(42, 'Benegrip', 'NÃ£o Informado', 'Gripe', 'amigdalite, asma, glaucoma, hipertrofia prostÃ¡tica, infecÃ§Ãµes respiratÃ³rias crÃ´nicas, distÃºrbios hematopoÃ©ticos, pacientes em tratamento com Atropina e pacientes com alergia a algum dos componentes da fÃ³rmula.', 'lactose, celulose microcristalina, diÃ³xido de silÃ­cio, estearato de magnÃ©sio, talco, copolÃ­mero metacrilato, Ã¡lcool isopropÃ­lico, diÃ³xido de titÃ¢nio, corantes CI nÂº 19.140 e CI nÂº 15.985 e polietilenoglicol 6000'),
(43, 'Paracetamol "PROIBIDO"', 'RecÃ©m-nascidos', 'Dengue', 'pacientes com hipersensibilidade ao Paracetamol ou a qualquer um dos componentes da fÃ³rmula', 'Ã¡cido cÃ­trico, aroma de cereja, aroma de morango, benzoato de sÃ³dio, celulose microcristalina, carmelose sÃ³dica, ciclamato de sÃ³dio, corante vermelho ponceau, xarope de frutose de milho, glicerol, goma xantana, sorbitol, sucralose, Ã¡gua deionizada'),
(44, 'Dipirona', 'NÃ£o Informado', 'Dengue', 'crianÃ§as com menos de 3 meses ou pesando menos de 5 kg, mulheres grÃ¡vidas ou que estejam a amamentar e pessoas com alergia a qualquer componente da fÃ³rmula.', '00 mg de dipirona monoidratada. Excipientes: fosfato de sÃ³dio monobÃ¡sico, fosfato de sÃ³dio dibÃ¡sico, sacarina sÃ³dica e Ã¡gua purificada. Cada 1 mL deste medicamento equivale a 20 gotas e 1 gota equivale a 25 mg de dipirona monoidratada.'),
(45, 'Primeira GeraÃ§Ã£o, ADN', 'Gestantes', 'Hepatite B', 'Hipersensibilidade Ã  levedura ou a qualquer componente da vacina.', 'A vacina hepatite B (recombinante) Ã© constituÃ­da de partÃ­culas nÃ£o infecciosas de antÃ­geno de superfÃ­cie da Hepatite B (HBsAg) altamente purificadas, produzida por DNA recombinante em cÃ©lulas de levedura (Saccharomyces cerevisiae), adsorvidas em sais de alumÃ­nio como adjuvante.'),
(47, 'BCG', 'RecÃ©m-nascidos, CrianÃ§as, Adultos', 'Tuberculose', 'A BCG estÃ¡ contra-indicada em indivÃ­duos que tenham apresentado reaÃ§Ã£o alÃ©rgica grave a dose prÃ©via da vacina ou a seus componentes. Ã‰ absolutamente contra-indicada em pessoas imunodeficientes, mesmo quando assintomÃ¡ticas. Ã‰ prudente adiar a vacinaÃ§Ã£o em indivÃ­duos com doenÃ§a aguda grave ou crÃ´nica descompensada.', 'As vacinas sÃ£o compostas, geralmente, pelo prÃ³prio agente da doenÃ§a, que Ã© atenuado em laboratÃ³rio. A BCG ID possui os bacilos atenuados Mycobacterium bovis.'),
(48, 'DTP', 'RecÃ©m-nascidos, CrianÃ§as', 'Difteria', 'A ocorrÃªncia de reaÃ§Ã£o alÃ©rgica ou eventos neurolÃ³gicos subsequentes Ã  aplicaÃ§Ã£o da vacina dupla bacteriana constitui contra-indicaÃ§Ã£o absoluta para administraÃ§Ã£o de outras doses dessa vacina.', 'sÃ£o produzidas a partir da toxina diftÃ©rica inativada que atua como antÃ­geno que estimula a produÃ§Ã£o de anticorpos. AlÃ©m disso contÃ©m timerosal (MertiolateÂ®) como estabilizador, hidrÃ³xido de alumÃ­nio como adjuvante vacinal.'),
(49, 'dT - dupla adulto', 'Adultos', 'TÃ©tano', 'Algumas doenÃ§as podem afetar a utilizaÃ§Ã£o da vacina tÃ©tano. Avise ao seu mÃ©dico se vocÃª ou a sua crianÃ§a estiverem com alguma doenÃ§a grave  ou com febre, pois os sintomas da doenÃ§a podem ser confundidos com possÃ­veis eventos adversos da vacina.', 'ToxÃ³ide tetÃ¢nico purificado HidrÃ³xido de alumÃ­nio SoluÃ§Ã£o fisiolÃ³gica'),
(50, 'TrÃ­plice bacteriana - DTP', 'RecÃ©m-nascidos, Gestantes', 'Coqueluche', 'Hipersensibilidade aos componentes da vacina (anafilaxia), encefalopatia dentro de 7 dias apÃ³s vacinaÃ§Ã£o seguindo a imunizaÃ§Ã£o prÃ©via de vacina com o componente pertussis (coqueluche).', 'Ã‰ composta por 2 unidade internacionais (UI) de toxÃ³ide diftÃ©rico, 20 UI de toxÃ³ide tetÃ¢nico, 8 mcg de toxÃ³ide pertussis, alÃ©m de hemaglutinina filamentosa e pertactina, hidrÃ³xido de alumÃ­nio hidratado e fosfato de alumÃ­nio.'),
(51, 'trÃ­plice vira', 'RecÃ©m-nascidos, CrianÃ§as', 'Sarampo', 'Mulheres grÃ¡vidas nÃ£o devem tomar a vacina trÃ­plice viral. Mulheres que precisarem tomar a vacina devem recebÃª-la apÃ³s o parto. As mulheres devem evitar engravidar nas quatro semanas seguintes Ã  vacinaÃ§Ã£o com a trÃ­plice viral.', 'A vacina trÃ­plice viral Ã© preparada a partir de vÃ­rus vivos atenuados do sarampo (cepas Schwarz, Moraten e Edmonston Zagreb), da caxumba (cepas Jeryl Lynn, L-3 Zagreb e Urabe AM9) e da rubÃ©ola (cepa Wistar RA27/3). Existem trÃªs combinaÃ§Ãµes vacinais de diferentes cepas de sarampo e caxumba com o vÃ­rus da rubÃ©ola.'),
(52, 'TrÃ­plice Viral', 'CrianÃ§as, Adultos, Adultos', 'Caxumba', 'assim como todas as vacinas de vÃ­rus atenuado, estÃ¡ contra-indicada durante a gestaÃ§Ã£o e esta deve ser evitada nos 30 dias que sucedem a aplicaÃ§Ã£o. Como regra geral, a vacina nÃ£o deve ser utilizada em imunodeficientes, exceto em situaÃ§Ãµes especiais em que o risco da doenÃ§a Ã© consideravelmente superior ao imposto pela vacina (indivÃ­duos infectados pelo HIV em Ã¡reas de elevada prevalÃªncia de sarampo).', 'A vacina trÃ­plice viral Ã© preparada a partir de vÃ­rus vivos atenuados do sarampo (cepas Schwarz, Moraten e Edmonston Zagreb), da caxumba (cepas Jeryl Lynn, L-3 Zagreb e Urabe AM9) e da rubÃ©ola (cepa Wistar RA27/3). Existem trÃªs combinaÃ§Ãµes vacinais de diferentes cepas de sarampo e caxumba com o vÃ­rus da rubÃ©ola.'),
(53, 'PneumocÃ³cica', 'Adultos', 'Pneumonia', 'CrianÃ§as que apresentaram anafilaxia apÃ³s usar algum componente da vacina ou apÃ³s dose anterior da vacina.', 'Pacientes com doenÃ§a pulmonar crÃ´nica (DPOC) estÃ£o em maior risco para a pneumonia pneumocÃ³cica; Pacientes com doenÃ§as como a insuficiÃªncia cardÃ­aca sÃ£o mais propensos a ter piores desfechos, se pneumonia pneumocÃ³cica ocorre;'),
(54, 'polaramine', 'CrianÃ§as, Adultos, Adultos', 'Catapora', 'CrianÃ§as e adultos imunocomprometidos / ImunodeficiÃªncia adquirida (aids) ou congÃªnita.', 'Maleato de dexclorfeniramina, Excipientes:propilenoglicol, sorbitol, metilparabeno, propilparabeno, Ã¡lcool etÃ­lico, mentol, sacarose, cloreto de sÃ³dio, citrato de sÃ³dio, aroma artificial de damasco, aroma artificial de laranja e Ã¡gua'),
(55, 'Salk', 'RecÃ©m-nascidos', 'Poliomielite', 'Em crianÃ§as com febre moderada a alta (acima de 38ÂºC), a vacinaÃ§Ã£o deve ser adiada atÃ© que o quadro clÃ­nico melhore. Importante: Diarreia e vÃ´mitos leves nÃ£o contraindicam a vacinaÃ§Ã£o, mas Ã© aconselhÃ¡vel adiÃ¡-la ou repetir a dose apÃ³s quatro semanas.', 'poliovirus 1,2 e 3 e nos esquemas recomendados sÃ£o altamente imunogÃªnicas e eficazes na prevenÃ§Ã£o da poliomielite'),
(56, 'pneumocÃ³cica', 'RecÃ©m-nascidos, CrianÃ§as', 'Meningite', 'Esta vacina esta contraindicada quando existem sintomas de febre ou sinais de inflamaÃ§Ã£o ou para pacientes com alergia a algum dos componentes da fÃ³rmula.', 'Ã‰ composta por oligossacarÃ­deo do meningococo do sorogrupo C. O oligossacarÃ­deo C Ã© conjugado com a proteÃ­na CRM197 de Corynebacterium diphteriae. A vacina possui hidrÃ³xido de alumÃ­nio. A vacina possui excipientes tais como: manitol, fosfato de sÃ³dio monobÃ¡sico monoidratado, fosfato de sÃ³dio dibÃ¡sico heptaidratado, cloreto de sÃ³dio e Ã¡gua para injeÃ§Ã£o.'),
(57, 'Acido Azelaico', 'Todos', 'Acne', 'Este medicamento nÃ£o deve ser utilizado por mulheres grÃ¡vidas sem orientaÃ§Ã£o mÃ©dica ou do cirurgiÃ£o-dentista', 'Cartucho com bisnaga de 15 g (10 e 30g) de gel. Cartucho com bisnaga de 20 (30 g) (20%) de Creme'),
(58, 'creme protector e bronzeadores', 'CrianÃ§as', 'Alergia ao sol', 'Alergia Ã  neomicina e aos antibiÃ³ticos aminoglicosÃ­deos e outros componentes da fÃ³rmula.', 'Cada grama da pomada contÃ©m 5mg de sulfato de neomicina (equivalente a 3,5mg de neomicina base.), 250UI de bacitracina zÃ­ncica.'),
(59, 'Alois', 'Idosos', 'Alzheimer', 'VocÃª nÃ£o deve administrar o ALOISÂ® se for alÃ©rgico ao cloridrato de memantina ou a quaisquer outros componentes da formulaÃ§Ã£o (veja no item COMPOSIÃ‡ÃƒO).', 'cloridrato de memantina'),
(60, 'Bromocriptina', 'Adolescente, Adultos', 'Amenorreia', 'Gravidez diagnosticada ou presumida. Hipersensibilidade Ã  bromocriptina ou outros alcalÃ³ides do ergot. Toxemia gravÃ­dica. HipertensÃ£o arterial no pÃ³s-parto e puerpÃ©rio. FunÃ§Ã£o hepÃ¡tica deficitÃ¡ria (necessÃ¡ria uma diminuiÃ§Ã£o da dose). DistÃºrbios psiquiÃ¡tricos (podem ser exacerbados). BROMOCRIPTINA nÃ£o deve ser administrada a lactantes, visto que o medicamento interfere na lactaÃ§Ã£o.', 'Comprimidos: Cada comprimido contÃ©m: Bromocriptina 2,5 mg.'),
(61, 'Vitamina B12', 'Todos', 'Anemia', 'Suplementos de vitamina B12 sÃ£o contra-indicados Ã s pessoas que apresentam hipersensibilidade a qualquer componente presente na formulaÃ§Ã£o.\r\n\r\nÃcido fÃ³lico: o uso contÃ­nuo de suplementos de Ã¡cido fÃ³lico e em doses elevadas pode diminuir os nÃ­veis de vitamina B12 no sangue e mascarar sua deficiÃªncia.\r\n\r\nAlergia Ã  vitamina B12: a vitamina B12 injetÃ¡vel nÃ£o deve ser utilizada por pessoas alÃ©rgicas Ã  prÃ³pria vitamina ou a outros componentes da fÃ³rmula, podendo ocasionar vermelhidÃ£o, suores e queda de pressÃ£o arterial (hipotensÃ£o), raramente causando perda de consciÃªncia.\r\n\r\nAtrofia Ã³tica de Leber: Ã© uma disfunÃ§Ã£o congÃªnita associada Ã  intoxicaÃ§Ã£o crÃ´nica por cianeto. Pessoas que apresentam esta doenÃ§a nÃ£o devem fazer uso da forma cianocobalamina. Neste caso, Ã© utilizada a hidroxicobalamina.\r\n\r\nBebÃªs e CrianÃ§as: nÃ£o foram encontradas contra-indicaÃ§Ãµes significativas na literatura pesquisada.\r\n\r\nGravidez e LactaÃ§Ã£o: nÃ£o foram encontradas contra-indicaÃ§Ãµes significativas na literatura pesquisada. "SaÃºde jÃ¡ recomenda que o uso de suplementos de vitamina B12 por gestantes e lactantes seja prescrito e supervisionado por um profissional de saÃºde".\r\n\r\nIdosos: nÃ£o foram encontradas contra-indicaÃ§Ãµes significativas na literatura pesquisada. "SaÃºde jÃ¡ recomenda que o uso de suplementos de vitamina B12 por idosos seja prescrito e supervisionado por um profissional de saÃºde, jÃ¡ que o uso deste suplemento pode interagir com alguns medicamentos freqÃ¼entemente prescritos e utilizados por idosos."', 'A vitamina B12 possui o elemento quÃ­mico cobalto em sua molÃ©cula. Apresenta 4 formas principais: adenosilcobalamina, cianocobalamina, hidroxicobalamina e metilcobalamina. O termo vitamina B12 Ã© mais comumente utilizado para se referir Ã  cianocobalamina:\r\n\r\nAdenosilcobalamina: presente nos alimentos de origem animal, atua como coenzima (substÃ¢ncia responsÃ¡vel por ativar determinadas enzimas, fazendo com que exerÃ§am sua funÃ§Ã£o) na sÃ­ntese de alguns aminoÃ¡cidos e Ã¡cidos graxos.\r\n\r\nCianocobalamina: Ã© a forma mais utilizada em suplementos nutricionais e no enriquecimento de alimentos.\r\nHidroxicobalamina: Ã© encontrada, como suplemento, somente para uso parenteral (injetÃ¡vel). Ã‰ uma das formas presentes no leite materno humano.\r\n\r\nMetilcobalamina: forma mais comumente encontrada nos alimentos de origem animal, ligada Ã s proteÃ­nas e tambÃ©m utilizada em suplementos nutricionais. Atua no organismo como coenzima em diversos processos metabÃ³licos.'),
(62, 'Sulfato Ferroso', 'Todos', 'Anemia', 'Hemocromatose, hemossiderose, hipervitaminoses do complexo B, pancreatite crÃ´nica, tuberculose pulmonar ativa, cirrose hepÃ¡tica, outras anemias que nÃ£o sejam essencialmente ferroprivas e hipersensibilidade a qualquer dos componentes das fÃ³rmulas.', 'Cada drÃ¡gea contÃ©m: sulfato ferroso 300 mg;sulfato de cobre 1 mg; mononitrato de tiamina (vitamina B1) 4 mg; riboflavina base (vitamina B2) 1 mg. Excipientes: celulose microcristalina, manitol, amido, povidona, estearato de magnÃ©sio, talco, carbonato de cÃ¡lcio, gomas laca e arÃ¡bica, aÃ§Ãºcar, gelatina, diÃ³xido de titÃ¢nio, ceras de abelha e carnaÃºba, polietilenoglicol e corante rosa. Cada 1 ml (aproximadamente 20 gotas) da soluÃ§Ã£o oral concentrada contÃ©m: sulfato ferroso 125 mg. Excipientes: parabenos, ciclamato de sÃ³dio, sacarina sÃ³dica, Ã¡cido cÃ­trico, essÃªncia de limÃ£o, Ã¡lcool etÃ­lico e Ã¡gua purificada. Cada colher das de sobremesa (10 ml) do lÃ­quido contÃ©m: sulfato ferroso 300 mg; sulfato de cobre 20 mg; cloridrato de tiamina (vitamina B1) 10 mg; riboflavina 5-fosfato (vitamina B2) 2 mg. Excipientes: parabenos, ciclamato de sÃ³dio, sacarina sÃ³dica, Ã¡cido cÃ­trico, hidrÃ³xido de sÃ³dio, Ã¡lcool etÃ­lico, corante caramelo, essÃªncia de cereja e Ã¡gua purificada.'),
(63, 'SuplementaÃ§Ã£o de Ã¡cido fÃ³lico', 'Todos', 'Anemia', 'Depois de termos falado sobre os benefÃ­cios e prÃ³s do suplemento, principalmente durante a gestaÃ§Ã£o, vamos entÃ£o falar dos contras.\r\n\r\nO Ã¡cido fÃ³lico Ã© contraindicado e pode ter efeitos colaterais no organismo de indivÃ­duos que demonstrem intolerÃ¢ncia prÃ©via Ã  droga.\r\n\r\nO Ã¡cido fÃ³lico nÃ£o deve ser utilizado em anemia megaloblÃ¡stica nÃ£o diagnosticada a menos que seja administrada vitamina B12 simultaneamente, caso contrÃ¡rio, a neuropatia pode ser precipitada.\r\n\r\nEstÃ¡ igualmente contraindicado em situaÃ§Ãµes de Gastrite atrÃ³fica, neuropatia Ã³ptica hereditÃ¡ria de Leber (LHON), cirurgias para remover o estÃ´mago (ex: gastrectomia total), Baixas concentraÃ§Ãµes de potÃ¡ssio no sangue.\r\n\r\nA terapia de folato (Ã¡cido fÃ³lico) de longo prazo estÃ¡ contra-indicada em doentes com deficiÃªncia de cobalamina nÃ£o tratada. Esta pode ser tratada anemia perniciosa ou outra causa de deficiÃªncia de cobalamina, incluindo ao longo da vida vegetariana.\r\n\r\nEm pessoas idosas, o teste de absorÃ§Ã£o de cobalamina deve ser feito antes do tratamento a longo prazo de folato. O Ã¡cido fÃ³lico administrado a estes doentes durante 3 meses ou mais, precipitou a neuropatia.\r\n\r\nO Ã¡cido fÃ³lico nunca deve ser administrado isoladamente no tratamento da anemia perniciosa de Addison e em estados de deficiÃªncia vitamina B 12, porque pode precipitar o aparecimento da degeneraÃ§Ã£o subaguda combinada da medula espinal.\r\n\r\nO Ã¡cido fÃ³lico nÃ£o deve ser utilizado em doenÃ§as malignas, a menos que na anemia megaloblÃ¡stica devido Ã  deficiÃªncia de folato ser uma complicaÃ§Ã£o importante.', 'O Ã¡cido fÃ³lico Ã© uma molÃ©cula constituÃ­da por trÃªs componentes:\r\n\r\n-Uma pteridina;\r\n-Um Ã¡cido para-aminobenzÃ³ico, geralmente abreviado para PABA;\r\n-E um ou mais resÃ­duos do aminoÃ¡cido Ã¡cido glutÃ¢mico (tambÃ©m conhecido como glutamato).'),
(64, 'Garra do Diabo', 'Adultos', 'Artrose', 'Ã‰ bom recordar que o uso desta erva medicinal Ã© contra-indicada em casos de gastrite e Ãºlcera gÃ¡strica. TambÃ©m nÃ£o deve ser utilizada quando estiver a tomar outros anti-inflamatÃ³rios, porque iria fortalecer desproporcionalmente os efeitos das drogas, incluindo os indesejados.', 'NÃ£o informado'),
(65, 'Diclofenaco', 'Adolescente, Adultos, Idosos', 'Artrite', 'VocÃª nÃ£o pode tomar este medicamento se:\r\n\r\n- for alÃ©rgico (hipersensibilidade) ao diclofenaco ou a qualquer outro componente da formulaÃ§Ã£o descrito no inÃ­cio desta bula;\r\n\r\n- jÃ¡ teve reaÃ§Ã£o alÃ©rgica apÃ³s tomar medicamentos para tratar inflamaÃ§Ã£o ou dor (ex.: Ã¡cido acetilsalicÃ­lico, diclofenaco ou ibuprofeno).\r\n\r\nAs reaÃ§Ãµes alÃ©rgicas podem ser asma, secreÃ§Ã£o nasal, rash cutÃ¢neo (vermelhidÃ£o na pele com ou sem descamaÃ§Ã£o), face inchada. Se vocÃª suspeita que possa ser alÃ©rgico, pergunte ao seu mÃ©dico antes de usar este medicamento;\r\n\r\n- tem Ãºlcera no estÃ´mago ou no intestino;\r\n\r\n- tem sangramento ou perfuraÃ§Ã£o no estÃ´mago ou no intestino, sintomas que podem resultar em sangue nas fezes ou fezes pretas;\r\n\r\n- sofre de doenÃ§a grave no fÃ­gado ou nos rins;\r\n\r\n- tem insuficiÃªncia cardÃ­aca grave;\r\n\r\n- vocÃª estÃ¡ nos Ãºltimos trÃªs meses de gravidez.', 'Celulose microcristalina, citrato de trietila, corante laca amarelo tartrazina, corante laca vermelho 40, diÃ³xido de silÃ­cio, diÃ³xido de titÃ¢nio, estearato de magnÃ©sio, fosfato de cÃ¡lcio dibÃ¡sico di-hidratado, amidoglicolato de sÃ³dio, hidrÃ³xido de sÃ³dio, lactose, macrogol, polimetacrÃ­licocopoliacrilato de etila, polissorbato 80, simeticona, talco'),
(66, 'Aerolin', 'Todos', 'Asma', 'Aerolin estÃ¡ contraindicado para pacientes com alergia ao Salbutamol ou a algum dos componentes da fÃ³rmula.', 'Aerolin Spray por cada dose contÃ©m:\r\n\r\nSulfato de salbutamol\r\nExcipiente: Norflurano (HFA134a)\r\n\r\nAerolin SolucÌ§aÌƒo para NebulizaÃ§Ã£o por cada 1 ml contÃ©m:\r\n\r\nSulfato de salbutamol\r\nVeÃ­culo\r\n\r\n(VeÃ­culos: aÌgua purificada, soluÃ§Ã£o de cloreto de benzalcÃ´nio e Ã¡cido sulfÃºrico diluÃ­do).'),
(67, 'Pointts', 'Todos', 'Verrugas', 'Este produto nÃ£o deve ser usado em crianÃ§as com menos de 4 anos de idade, diabÃ©ticos, pessoas com mÃ¡ circulaÃ§Ã£o, em mulheres grÃ¡vidas ou a amamentar.', 'Uma embalagem de aerossol contendo uma mistura de Ã©ter dimetÃ­lico, propano e isobutano;'),
(69, 'Antirretrovirais', 'Todos', 'Aids', 'A contraindicaÃ§Ã£o de qualquer medicamento Ã© a presenÃ§a de componentes que causam alergia em pacientes sensÃ­veis. Ã‰ importante verificar essa informaÃ§Ã£o na bula do produto.\r\n\r\nPacientes que utilizam medicamentos para HIV/AIDS devem ter cuidado: alguns sÃ£o contraindicados para crianÃ§as menores de 3 meses de idade, pessoas com doenÃ§as do fÃ­gado e rins.', ''),
(70, 'Sonrisal', 'Todos', 'Azia', 'Este medicamento nÃ£o deve ser usado em casos de histÃ³ria de alergia a quaisquer componentes da fÃ³rmula ou a salicilatos, histÃ³ria de Ãºlcera ou sangramento no estÃ´mago, hemofilia ou suspeita de dengue.', 'Cada comprimido efervescente de Sonrisal contÃ©m:\r\n\r\nBicarbonato de sÃ³dio\r\nCarbonato de sÃ³dio\r\nÃcido acetilsalicÃ­lico\r\nÃcido cÃ­trico'),
(71, 'Carbolitium', 'NÃ£o Informado', 'Transtorno bipolar', 'O uso deste medicamento Ã© contra indicado em caso de hipersensibilidade ao carbonato de lÃ­tio e/ou demais componentes da formulaÃ§Ã£o. NÃ£o deve ser usado durante a gravidez e perÃ­odo de aleitamento.', 'amido, estearato de magnÃ©sio, laurilsulfato de sÃ³dio,talco  povidona, amidoglicolato de sÃ³dio, diÃ³xido de titÃ¢nio, hipromelose e macrogol.'),
(72, 'Liberaflux', 'Todos', 'Bronquite', 'Liberaflux estÃ¡ contraindicado para pacientes com intolerÃ¢ncia Ã  frutose e para pacientes com alergia a algum dos componentes da fÃ³rmula.', 'Liberaflux por cada 1 ml do xarope contÃ©m:\r\n\r\nExtrato seco de Hedera helix\r\nExcipientes');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_grafico`
--
CREATE TABLE `vw_grafico` (
`localidade` varchar(250)
,`tipo_doenca` varchar(250)
,`quantidade` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_grafico`
--
DROP TABLE IF EXISTS `vw_grafico`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_grafico`  AS  select `tb_grafico`.`localidade` AS `localidade`,`tb_grafico`.`tipo_doenca` AS `tipo_doenca`,count(`tb_grafico`.`localidade`) AS `quantidade` from `tb_grafico` group by `tb_grafico`.`localidade`,`tb_grafico`.`tipo_doenca` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_doenca`
--
ALTER TABLE `tb_doenca`
  ADD PRIMARY KEY (`id_doenca`);

--
-- Indexes for table `tb_grafico`
--
ALTER TABLE `tb_grafico`
  ADD PRIMARY KEY (`id_grafico`);

--
-- Indexes for table `tb_msg`
--
ALTER TABLE `tb_msg`
  ADD PRIMARY KEY (`id_msg`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_vacina`
--
ALTER TABLE `tb_vacina`
  ADD PRIMARY KEY (`id_vacina`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_doenca`
--
ALTER TABLE `tb_doenca`
  MODIFY `id_doenca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `tb_grafico`
--
ALTER TABLE `tb_grafico`
  MODIFY `id_grafico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `tb_msg`
--
ALTER TABLE `tb_msg`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tb_vacina`
--
ALTER TABLE `tb_vacina`
  MODIFY `id_vacina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
