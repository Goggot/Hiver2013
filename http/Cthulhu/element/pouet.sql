-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 21 Janvier 2013 à 11:41
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `skeuleush`
--

-- --------------------------------------------------------

--
-- Structure de la table `pouet`
--

CREATE TABLE IF NOT EXISTS `pouet` (
  `id` int(2) NOT NULL DEFAULT '0',
  `nom` text NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pouet`
--

INSERT INTO `pouet` (`id`, `nom`, `text`) VALUES
(0, 'Pouet', 'Cthulhu est une créature de fiction imaginée par l''écrivain américain H. P. Lovecraft dans la nouvelle L''Appel de Cthulhu (1926). Monstre humanoïde gigantesque, il possède une tête de seiche ainsi que des tentacules de pieuvre et des ailes. Il est présenté comme un « Grand Ancien », ce qui en fait l''équivalent d''un dieu extraterrestre millénaire, au même titre que Cthugha, Yig, Glaaki, Chaugnar Faugn ou Y''Golonac. En revanche, il ne semble pas que Cthulhu partage des liens autres que purement symboliques avec ces divinités de la cosmogonie lovecraftienne que sont Yog-Sothoth, Azathoth, Nyarlathotep, Nodens ou Shub-Niggurath, que les continuateurs de H. P. Lovecraft (notamment August Derleth) qualifient de « dieux extérieurs ». Selon l''interprétation d''August Derleth, postérieure à la mort de Lovecraft, Cthulhu fut jadis banni du lointain système de Xoth (lequel pourrait correspondre à l''étoile Bételgeuse dans la constellation d''Orion) par les « dieux très anciens », et dort désormais au fond du Pacifique Sud dans la cité sous-marine de R''lyeh, en attendant l''heure de son retour.\nMélange de mythologies européennes (le Kraken des Scandinaves) et du Proche-Orient (Dagon, le dieu-poisson des Philistins), Cthulhu est l''archétype du dieu cosmique monstrueux : d''apparence humanoïde, avec une tête de pieuvre et de grandes ailes filandreuses, il est vénéré par des créatures dégénérées, thème récurrent dans l''œuvre de Lovecraft. Cthulhu inspire également les rêves des hommes, élargissant ainsi le cercle de ses adorateurs2.\nDans sa nouvelle L''Appel de Cthulhu (1926), H. P. Lovecraft parle de Cthulhu en ces termes : « Johansen estime que deux des six hommes qui ne regagnèrent pas le bateau moururent de peur à cet instant maudit. Nul ne saurait décrire le monstre ; aucun langage ne saurait peindre cette vision de folie, ce chaos de cris inarticulés, cette hideuse contradiction de toutes les lois de la matière et de l''ordre cosmique. »'),
(1, 'Skeuleush', 'Coucou ! test 1212 !!'),
(2, 'Grobkul', 'Grobkul Kazgrim est un nain de niveau 3, ayant un gros cul et une grosse barbe de la mort qui tue.     Les Nains sont des créatures humanoïdes de petite taille, vraisemblablement entre quatre et cinq pieds de haut (entre 1 mètre 20 et 1 mètre 50). Ils sont robustes, font d''excellents combattants et sont dotés d''une grande résistance à la faim et à la douleur. Leur espérance de vie moyenne est de deux cent cinquante ans. Un aspect important de leur physique est leur barbe, qu''ils ne rasent jamais et qui est portée par les hommes comme par les femmes.Les Nains sont un peuple fier, renfermé et secret, mais il leur arrive d''enseigner leur savoir à d''autres peuples avec lesquels ils entretiennent de bonnes relations, le plus souvent commerciales. C''est le cas des Elfes Gris de Beleriand au Premier Âge ou des Hommes du Rhovanion au Second Âge. Puisqu''ils vivent essentiellement sous terre, les Nains sont peu férus d''agriculture et d''élevage, préférant commercer avec les autres races pour obtenir ces biens. Ils sont dits être des amis loyaux, mais des adversaires rancuniers et tenaces, qui n''oublient jamais ni une insulte, ni une bonne action. Leur avarice est également réputée et forme l''un de leurs points faibles, par lequel ils sont corruptibles, comme le montre l''exemple des Anneaux de Pouvoir.Les Nains minent et travaillent les métaux précieux et la pierre présents dans les montagnes de la Terre du Milieu avec un talent consommé, issu de leur concepteur, Aulë : au début du Quatrième Âge, ce sont eux qui reforgent les portes de Minas Tirith. Gandalf décrit l''or et les pierres précieuses comme les jouets des Nains et le fer comme leur serviteur — nul, pas même les Ñoldor, ne les surpasse dans la trempe de l''acier —, le métal qu''ils prisent entre tous étant le rarissime mithril, qui n''est exploité qu''à Khazad-dûm. Les Nains sont également de grands forgerons, créateurs de nombre d''armes renommées, comme Narsil, l''épée d''Elendil, qui est forgée par Telchar de Nogrod, ou Angrist, le poignard que Beren prend à Curufin et utilise pour extraire un Silmaril de la couronne de Morgoth.Les Nains sont réputés pour leur prédilection pour la hache, mais ils emploient également des épées et des arcs. L''équipement des troupes de Dáin durant la bataille des Cinq Armées est décrit en détail dans Bilbo le Hobbit :"Chacun de ses gens était revêtu d''un haubert d''acier qui lui descendait jusqu''aux genoux, et ses jambes étaient recouvertes de chausses faites de mailles d''un métal fin et flexible, dont le peuple de Dáin avait le secret. [...] Au combat, ils maniaient de lourds bigots à deux mains ; mais chacun avait aussi au côté une courte et large épée et, suspendu dans le dos, un bouclier rond."');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
