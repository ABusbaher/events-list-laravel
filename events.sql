-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2017 at 05:57 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `events`
--

-- --------------------------------------------------------

--
-- Table structure for table `event-users`
--

CREATE TABLE IF NOT EXISTS `event-users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `event-users`
--

INSERT INTO `event-users` (`id`, `user_id`, `event_id`, `created_at`, `updated_at`) VALUES
(4, 2, 2, '2017-03-19 18:15:12', '2017-03-19 18:15:12'),
(5, 2, 8, '2017-03-19 19:19:50', '2017-03-19 19:19:50'),
(6, 2, 1, '2017-03-19 19:35:58', '2017-03-19 19:35:58'),
(7, 2, 6, '2017-03-19 19:42:12', '2017-03-19 19:42:12'),
(8, 2, 5, '2017-03-19 19:42:49', '2017-03-19 19:42:49'),
(9, 2, 7, '2017-03-19 19:44:33', '2017-03-19 19:44:33'),
(10, 2, 9, '2017-03-19 19:47:23', '2017-03-19 19:47:23'),
(11, 2, 10, '2017-03-19 19:48:11', '2017-03-19 19:48:11'),
(12, 5, 2, '2017-03-21 13:44:42', '2017-03-21 13:44:42'),
(13, 5, 11, '2017-03-21 13:44:56', '2017-03-21 13:44:56'),
(15, 4, 5, '2017-03-21 20:30:26', '2017-03-21 20:30:26'),
(16, 4, 9, '2017-03-21 20:30:38', '2017-03-21 20:30:38'),
(17, 4, 7, '2017-03-21 20:30:56', '2017-03-21 20:30:56'),
(20, 5, 7, '2017-03-22 11:15:12', '2017-03-22 11:15:12'),
(21, 5, 1, '2017-03-22 11:15:35', '2017-03-22 11:15:35'),
(22, 4, 2, '2017-03-22 13:27:01', '2017-03-22 13:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `date_and_time` datetime NOT NULL,
  `place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `description`, `date_and_time`, `place`, `image`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Exit festival', '<p><strong>EXIT FESTIVAL</strong> je najveći muzički festival na području jugoistočne Evrope. Ovaj festival se organizuje na prelepoj i magičnoj Petrovaradinskoj tvrđavi u Novom Sadu od 2001. godine. Svake godine sve je veći broj posetilaca na festivalu. Mladi stižu iz svih delova zemlje, ali i iz zemalja &scaron;irom Evrope i sveta. Pored dobrog muzičkog programa EXIT je posećen i zbog kvalitetne zabave, dobre atmosfere na tvrđavi i pozitivne energije grada.</p>\r\n<p>Na&scaron;a MISIJA je da iniciramo pozitivne dru&scaron;tvene promene i ubrzamo evoluciju ljudske svesti koristeći kreativne industrije, vrhunske globalne umetničke, obrazovne i humanitarne događaje, kao put za preno&scaron;enje poruke ljubavi i slobode čitavoj planeti. A sve ovo u cilju ispunjenja na&scaron;e VIZIJE - Čovečanstva i Zemlje u harmoniji, kako na lokalnom i regionalnom, tako i na globalnom nivou.<br />Festival donosi duh slobode, kreativnosti, zabave i &scaron;iri granice svakodnevnog života. Puno stejdževa, izvođača i događaja ti daju slobodu da izabere&scaron; &scaron;ta ti se sviđa i da bude&scaron; ko god želi&scaron;.</p>', '2017-07-28 21:00:00', 'Novi Sad', '1490097868.jpg', '2017-03-17 17:31:52', '2017-03-21 11:04:28', 'exit-festival'),
(2, 'Gitarijada', '<p>Ovo je najstariji festival neafirmisanih rok bendova i spada u red najznačajnijih muzičkih događaja u regionu. Cilj manifestacije je podsticanje i afirmacija muzičkog stvarala&scaron;tva mladih opredeljenih za <strong>rock''n''roll</strong>.</p>\r\n<p>Za razliku od sličnih manifestacija koje su u međuvremenu nastajale i nestajale, ovaj festival do dana&scaron;njih dana odoleva izazovima vremena.Vi&scaron;edecenijska tradicija i značaj učinili su ovu manifestaciju nacionalnim brendom, promoterom i jednim od nosilaca razvoja turističke privrede grada<em> Zaječara</em>.</p>', '2017-08-25 20:00:00', 'Zaječar', '1490199747.jpg', '2017-03-17 17:31:52', '2017-03-22 15:22:27', 'gitarijada'),
(5, 'Guča', '<p>Dragačevski sabor trubača, takođe poznat i kao Guča festival, je tradicionalna festivalska manifestacija i jedinstvena smotra truba&scaron;tva koja se svake godine održava u gradiću <strong>Guča</strong>, u Dragačevu, u regionu Zapadne Srbije. Skoro milion posetilaca iz Srbije i inostranstva dolazi u gradić od dve hiljade stanovnika svakog Avgusta.</p>\r\n<p>Zahvaljujući festivalu Guča je postala poznata u celom svetu kao mesto održavanja najvećeg festivala trubačke muzike &scaron;irom planete, gde su jo&scaron; zatupljene i druge tradicionalne vrednosti, kao &scaron;to su tradicionalne pesme, igre i no&scaron;nje regiona Dragačeva i Zapadne Srbije.</p>\r\n<p>Zvuk trube u ovom delu Srbije tradicionalno prati svaki veći događaj, od proslave rođenja, kr&scaron;tenja, venčanja, porodičnih slava, ali je i sastavni deo sahrana uz čiji zvuk se ljudi opra&scaron;taju od ovog sveta.</p>\r\n<p>Muzika u Srbiji je veoma raznolika za tako malu teritoriju, gde dominiraju tri različita pravca narodne muzike, ona koja se svira u Zapadnoj srbiji gde dominiraju parni ritmovi u vidu sporih pesama za pevanje i brzih kola &ndash; za igru, zatim muzika južne srbije koja se bazira na specifičnim neparnim ritmovima u pesmama i igrama, i sa nagla&scaron;enim emotivnim tonovima i načinom na koji muzičari proizvode isti. Takođe, tu je i specifičan muzički odraz Istočne Srbije, sa svojim karakteristikama i posebnostima. Čime su se godinama izdiferencirala tri regiona kao tri poznata centra sa poznatim trubačima danas.</p>', '2017-08-30 21:00:00', 'Guča', '1490097598.JPG', '2017-03-18 21:46:15', '2017-03-21 10:59:58', 'guca'),
(6, 'Kobasicijada - Turija ', '<p>U <em>Turiji</em> se od 1985. godine, svake godine, u februaru, održava manifestacija pod nazivom <strong>KOBASICIJADA</strong>. Ovu manifestaciju godi&scaron;nje poseti na desetine hiljada gostiju, kako bi videli "čudo od kobasice", koje se pravi samo u selu Turiji, u opstini Srbobran.</p>\r\n<p>U tri dana u Turiji će biti veoma zabavno. Pripremljen je bogat kulturno-umetnički program, a najvažniji događaj zbiće se u subotu. U 12h domaćini će izneti dugačku kobasicu (ove godine čitavih 3033m), čime počinje svečano otvaranje manifestacije koja je postala brend Srbije. Nakon toga sledi progla&scaron;enje najbolje industrijske kobasice, a onda i progla&scaron;enje najbolje kobasice koju su proizveli građani Turije. Biće tamo i takmičenje u brzom jedenju kobasice, a predviđena je i nagrada za gosta koji je do&scaron;ao iz najudaljenijeg mesta.</p>', '2018-02-20 18:00:00', 'Turija,kod Srbobrana', '1490097695.jpg', '2017-03-18 21:57:01', '2017-03-21 11:01:35', 'kobasicijada-turija'),
(7, 'Pršutijada - Mačkat (Zlatibor)', '<p><strong>Pr&scaron;utijada</strong> se tradicionalno održava u selu <em>Mačkat</em>, koje se nalazi između Užica i Zlatibora, a već 17 godina i ima status nacionalne manifestacije.</p>\r\n<p>Privlači vi&scaron;e od 10.000 posetilaca svake godine tokom januara meseca. Sajam suhomesnatih proizvoda ima vi&scaron;estruki karakter. Pre svega okuplja veliki broj proizvođača suhomesnatih proizvoda i zato ima privredni karakter. Na sajmu se mogu videti, probati i kupiti delikatesi kao &scaron;to su užička goveća, svinjska i ovčija pr&scaron;uta, slanina, kobasica, pr&scaron;uta i dr. Specifičnost ovih proizvoda je u tehnologiji proizvodnje jer se Mačkat nalazi na nadmorskoj visini koja pogoduje su&scaron;enju mesa. Posetioci učestvuju u nagradnoj igri i mogu nakon zavr&scaron;etka manifestacije osvojiti džak mesnih prerađevina. Domaća pr&scaron;uta je verovatno jedan od najprepoznatljivijih proizvoda Srbije, a zahvaljujući prirodi i okolini u kojoj se proizvodi, predstavlja ne&scaron;to najlep&scaron;e &scaron;to planinski predeli, kanjoni i reke nude.</p>', '2018-02-20 18:00:00', 'Mačkat kod Zlatibora', '1490097739.jpg', '2017-03-18 22:00:16', '2017-03-21 11:02:19', 'prsutijada-mackat-zlatibor'),
(8, 'Leskovačka roštiljada ', '<p>Leskovačka ro&scaron;tiljada je privredno-turistička manifestacija koja se tradicionalno održava u poslednjoj nedelji avgusta na prostoru popularne "<strong>&Scaron;iroke čar&scaron;ije</strong>" u centru Leskovca. Manifestacija po kojoj se prepoznaje Leskovac na turističkoj mapi. Najveći i najposećeniji festival ro&scaron;tilja u jugoistočnoj Evropi. Za sedam dana trajanja okupi preko 500. 000 posetilaca, iz zemlje i inostranstva.</p>\r\n<p>Popularni leskovački voz satavljen od vagona (unificiranih &scaron;tandova), na kojima gurmani mogu da probaju najraznovrsnije specijalitete nadaleko poznatog leskovačkog ro&scaron;tilja.<br />Leskovačku ro&scaron;tiljadu prati bogat kulturno-zabavni sadržaj uz nastupe zvezda estrade, folklornih ansambala i bleh orkestara. Tradicionalni prateći programi su pripremanje najveće pljeskavice na svetu, najveće pljeskavice iz ruku, takmičenja majstora ro&scaron;tilja, takmičenje učenika ugostiteljskih &scaron;kola u spremanju jela sa ro&scaron;tilja...</p>', '2017-08-30 09:00:00', 'Leskovac', '1490097553.jpg', '2017-03-18 22:06:13', '2017-03-21 10:59:13', 'leskovacka-rostiljada'),
(9, 'Nišvil džez festival', '<p>Internacionalni Ni&scaron;vil džez festival - najposećeniji džez festival jugoistočne Evrope, od samog osnivanja 1995.godine dosledno brani evropske vrednosti multikulturalnosti i strpljivo neguje muzički ukus pojedinaca. Potvrda toga je i veliki tekst o festivalu "Ni&scaron;vil - evropsko lice Srbije" ("Ni&scaron;ville - European face of Serbia") objavljen u glasilu Evropske unije, magazinu "New Europe" koji izlazi u Briselu.</p>\r\n<p>Ni&scaron;vil jazz festival je Javna Gradska Manifestacija Ni&scaron;a od 2005, a 2010 godine odlukom Ministarstva kulture Republike Srbije i Manifestacija od Nacionalnog značaja. Ni&scaron;ville je i dobitnik statue "Najbolje iz Srbije" za 2011. godinu, po izboru Ministarstva trgovine i usluga, Privredne komore Srbije i časopisa "Privredni pregled", a dobitnik je i nagrade "Projekat budućnosti" u akciji Kluba privrednih novinara Srbije 2010 i Centra za mala i srednja preduzeća. Turistička organizacija Srbije uvr&scaron;tava Ni&scaron;vil u svoju zvaničnu sajamsku ponudu &scaron;irom Evrope, a mnoge domaće i strane turističke organizacije i agencije pozivaju zaljubljuenike u džez da, krajem avgusta, posete Srbiju i mitski grad Ni&scaron;.</p>\r\n<p>Koncept festivala je od početka, osim na &bdquo;tradicionalnijim" formama džeza, bio zasnovan pre svega na fuziji ovog pravca sa etno tradicijama različitih delova sveta a naročito Balkana. Najpoznatiji džez magazin na svetu, američki "Downbeat" je u op&scaron;irnom prikazu festivala ocenio Ni&scaron;vil kao festival koji na najbolji mogući način istovremeno promovi&scaron;e džez kao pravac nastao na američkom kontinentu, muzičku tradiciju Balkana, ali i posebno spoj ta dva stila, čime je Ni&scaron;vil u mnogome doprineo predstavljanju balkanske muzike kao novog svetskog trenda.</p>\r\n<p>Glavni program festivala održava se na otvorenom prostoru Platoa ni&scaron;ke Tvrđave, na dve bine Earth i Sky, a mnogi kvalitetni domaći i strani izvođači nastupaju na stejdževima koji su besplatni za publiku: River, Open, Movie, Matine, Welcome, Youth i Jam Session stejdž.</p>', '2017-08-10 18:00:00', 'Niška tvrđava,Niš', '1490097451.jpg', '2017-03-18 22:47:20', '2017-03-21 10:57:31', 'nisvil-dzez-festival'),
(10, 'Lička olimpijada', '<p>Lička olimpijada, ovde ćete moći da uživate u praćenju sportskih nadmetanja u narodnim disciplinama ali i da probate neke tradicionalne, ličke specijalitete i hladno pivo.</p>\r\n<p>Ceo program prati i raznovrstan muzički program. U devet tradicionalnih disciplina nadmetaće se preko 20 ekipa sa teritorija Srbije, Hrvatske i Bosne i Hercegovine. Discipline su sledeće:<br /><br /><br />1. Trka u vrećama za decu do 12 godina<br />2. Penjanja uz stožinu<br />3. Skok u dalj iz mesta<br />4. Skok u vis iz mesta<br />5. Trčanje po brvnu<br />6. Hrbanje (obaranje ruku)<br />7. Nadvlačenje konopa<br />8. Nadvlačenje kuke<br />9. Nadvlačenje klička</p>', '2017-06-25 12:00:00', 'Banja Junaković - Apatin', '1490097342.jpg', '2017-03-18 22:50:59', '2017-03-21 10:55:42', 'licka-olimpijada'),
(11, 'Belgrade Beer Fest', '<p><strong>Belgrade Beer Fest</strong> je festival koji promovi&scaron;e druženje, pozitivnu energiju i kosmopolitski duhBeograda i sjajnu zabavu. Pre svega, ovaj događaj je jedan od za&scaron;titnih znakova Beograda, koji svetu &scaron;alje pozitivnu sliku o Beogradu i beograđanima.</p>\r\n<p>Festival promovi&scaron;e kulturu i nasleđe Balkana. Preko 7,2 miliona zadovoljnih posetilaca iz svih krajeva sveta najbolji su dokaz da je 4 krajeva sveta najbolji su dokaz da je Festival na pravom putu.Pored uloge koju ima u rebrendiranju i repozicioniranju Srbije na svetskoj mapi, ovaj Festival promovi&scaron;e druženje, okupljanje, ostvarivanje novih prijateljstava i poslovnih kontakata. Svake godine Festival je idealna marketin&scaron;ka i prodajna platforma na kojoj pivare i druge kompanije prezentuju svoje proizvode i usluge posetiocima različitog ekonomskog, starosnog i socijalnog statusa.Festivalska opu&scaron;tena i vesela atmosfera je slika koju će posetioci poneti kući uživajući u muzici i dru&scaron;tveno odgovornoj zabavi.</p>\r\n<p>Festival je dobio mnogobrojna priznanja. Među njima je preporuka britanskog lista "The Independent", koji je <strong>Belgrade Beer Fest&trade;</strong> 2005. godine uvrstio među 20 svetskih događaja koje bi obavezno trebalo posetiti. Profesor Dennis Wilcox, u svojoj knjizi "PR Strategies and Tactics" koja se koristi na preko 350 univerziteta &scaron;irom planete, naveo je Belgrade Beer Fest&trade; kao pozitivan primer marketinga i PR kampanje. Povodom velike dru&scaron;tvene kampanje "Biram da recikliram", čiji su ciljevi bili da se ojača ekolo&scaron;ka svest građana i kupe reciklažni kontejneri za beogradske &scaron;kole, Festival je od marketin&scaron;kog časopisa "Taboo" dobio 2009. godine nagradu za marketin&scaron;ki događaj godine.</p>\r\n<p>Belgrade Beer Fest&trade; se zahvaljujući svemu ovome etablirao kao jedan od najznačajnijih segmenata turističke ponude Srbije, te kao brend koji radi na promovisanju zemlje i jačanju njenog imidža.</p>', '2017-09-30 19:00:00', 'Beograd', '1490097644.jpg', '2017-03-20 20:03:27', '2017-03-21 11:00:44', 'belgrade-beer-fest');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_03_17_175019_create_roles_table', 1),
('2017_03_17_180058_create_events_table', 2),
('2017_03_17_180557_create_event-users_table', 2),
('2017_03_20_200547_add_slug', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', '2017-03-17 17:31:52', '2017-03-17 17:31:52'),
(2, 'subscriber', '2017-03-17 17:31:52', '2017-03-17 17:31:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_index` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `role_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@a.com', '$2y$10$Pj7p0YJmVC6Nkrbp3AQUM.m/yIphHFvOE0BwjtnAqTyd8vLDHUT7O', 'FiOHK3tOPVy7PP7ZAVVxARF8Ig4K6NfBd3kX6ThsnhFv57QgQPO4QQVayiev', 1, 1, '2017-03-17 17:31:52', '2017-03-22 15:36:49'),
(2, 'ana', 'ana@a.com', '$2y$10$EIZL1gjKPg.drF3bHU9dXuU2S66pCclWOpQbVsGAVmtJiVlaasZEm', 'Lt8igvNld8PBGzrEpXm1pKl25jVvuXvT4sVFqN7x6rv1eAOshSJkpo1nzxZb', 2, 1, '2017-03-17 20:58:22', '2017-03-22 15:26:45'),
(4, 'sima', 'sima@s.com', '$2y$10$2K7KyxXixOLn9eIc0fVzv.HsjcF8OQ.REao9B7PwG/JhH/zd38Z/G', '9AaRMBromi8xu0n9c0VlVnDIz0uWV6dzrPu4CKC44tNGO5rKCctM8fwnrHxK', 2, 1, '2017-03-18 00:08:05', '2017-03-22 13:28:32'),
(5, 'Mile Mišić', 'mile@m.com', '$2y$10$kx5USNKpVyrPzAGeizgVSuKZfZfp53z2xJVTr4wlmzlHiZ0/l21jy', 'QCOnVL63G9HCceMKPMDYdEqJByBg66OKVW8G6qhUGOrtsUzBOlZZoPqRpQeZ', 2, 1, '2017-03-21 13:44:13', '2017-03-22 11:16:02'),
(7, 'Miloš Milošević', 'milos@m.com', '$2y$10$Q2OLtcVI6dILpjPb2t5MEeTGn0HIESKT.kyx4hV0DV2oOSALQHpaa', 'OLoYIChsNjAFgiaGKwupTOO2zjuMSjleC68f5tLHSIbjhh7oS5lFkaWhOBFP', 2, 0, '2017-03-21 21:47:43', '2017-03-22 15:23:50');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
