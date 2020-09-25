-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 11:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'By Doctors'),
(2, 'By Astrologers'),
(3, 'Personal experience'),
(4, 'By Frontliners');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` varchar(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_author_id` int(32) NOT NULL,
  `post_date` date NOT NULL,
  `post_content` text NOT NULL,
  `post_status` varchar(1) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT 0,
  `post_img` text DEFAULT NULL,
  `post_incerpt` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_author_id`, `post_date`, `post_content`, `post_status`, `type`, `post_img`, `post_incerpt`) VALUES
(1, '1', 'Post 1', 'Admin1', 741, '2020-09-22', '\r\n&lt;p&gt;This is the first post.&lt;/p&gt;\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;uploadsPostImg/545f396888e4f.jpg&quot; alt=&quot;&quot; width=&quot;536&quot; height=&quot;354&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum&lt;/p&gt;\r\n', '1', 0, 'uploadsPostImg/545f396888e4f.jpg', 'The first post of this covid 19 Dashboard site'),
(2, '1', 'What are coronaviruses', 'test', 740, '2020-09-22', '\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;span class=&quot;ILfuVd NA6bn&quot;&gt;Coronaviruses are large group of viruses that cause illness in humans and animals. Rarely, animal coronaviruses can evolve and infect people and then spread between people such as has been seen with MERS and SARS.&lt;br /&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;span class=&quot;ILfuVd NA6bn&quot;&gt;&lt;img src=&quot;uploadsPostImg/c9bf6087dfa71.jpg&quot; alt=&quot;&quot; width=&quot;259&quot; height=&quot;194&quot; /&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: center;&quot;&gt;&lt;span class=&quot;ILfuVd NA6bn&quot;&gt;Although most human coronavirus infections are mild, the epidemics of the severe acute respiratory syndrome coronavirus (SARS-CoV) and Middle East respiratory syndrome coronavirus (MERS-CoV), have caused more than 10,000 cumulative cases in the past two decades, with mortality rates of 10% for SARS-CoV.&lt;/span&gt;&lt;/p&gt;\r\n', '1', 0, 'uploadsPostImg/c9bf6087dfa71.jpg', 'Coronaviruses are large group of viruses that cause illness in humans and animals. Rarely, animal coronaviruses can evolve and infect people and then spread between people such as has been seen with MERS and SARS.'),
(3, '1', 'How can you prevent the spread of the coronavirus disease?', 'test', 740, '2020-09-22', '\r\n&lt;p&gt;&lt;span class=&quot;ILfuVd NA6bn IKudke&quot;&gt;&lt;span class=&quot;hgKElc&quot;&gt;Practice Social Distancing: Avoid gatherings such as melas, haats, gatherings in religious places, social functions etc. Maintain a safe distance of at least one Metre between you and other people when in public places, especially if they are having symptoms such as cough, fever etc. to avoid direct droplet contact. Stay at home as much as possible. Avoid physical contact like handshakes, hand holding or hugs. Avoid touching surfaces such as table tops, chairs, door handles etc. b) Practice good hygiene Wash your hands frequently using soap and water: After coming home from outside or meeting other people especially if they are ill.&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n', '1', 1, NULL, 'Good practices for COVID prevention'),
(4, '1', 'COVID essay by UN', 'test', 740, '2020-09-22', '\r\n&lt;p&gt;23 June 2020 &amp;ndash; The COVID-19 pandemic has &amp;nbsp;demonstrated the interconnected nature of our world &amp;ndash; and that no one is safe until everyone is safe. &amp;nbsp;Only by acting in solidarity can communities save lives and overcome the devastating socio-economic impacts of the virus. &amp;nbsp;In partnership with the United Nations, people around the world are showing acts of humanity, inspiring hope for a better future. &lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;https://www.un.org/sites/un2.un.org/files/raufsalem.jpg&quot; alt=&quot;&quot; width=&quot;665&quot; height=&quot;444&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;Rauf Salem, a volunteer, instructs children on the right way to wash their hands, in Sana\'a, Yemen. &amp;nbsp;Simple measures, such as maintaining physical distance, washing hands frequently and wearing a mask are imperative if the fight against COVID-19 is to be won. &amp;nbsp;Photo: UNICEF/UNI341697&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Venezuelan refugee Juan Batista Ramos, 69, plays guitar in front of a mural he painted at the Tancredo Neves temporary shelter in Boa Vista, Brazil to help lift COVID-19 quarantine blues. &amp;nbsp;&amp;ldquo;Now, everywhere you look you will see a landscape to remind us that there is beauty in the world,&amp;rdquo; he says. &amp;nbsp;Ramos is among the many artists around the world using the power of culture to inspire hope and solidarity during the pandemic. &amp;nbsp;Photo: UNHCR/Allana Ferreira&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Wendy Schellemans, an education assistant at the Royal Woluwe Institute in Brussels, models a transparent face mask designed to help the hard of hearing. &amp;nbsp;The United Nations and partners are working to ensure that responses to COVID-19 leave no one behind. &amp;nbsp;Photo courtesy of Royal Woluwe Institute&lt;/p&gt;\r\n', '1', 0, 'https://www.un.org/sites/un2.un.org/files/raufsalem.jpg', '23 June 2020 – The COVID-19 pandemic has  demonstrated the interconnected nature of our world – and that no one is safe until everyone is safe.  Only by acting in solidarity can communities save lives and overcome the devastating socio-economic impacts of the virus. '),
(5, '1', 'COVID essay by UN', 'test', 740, '2020-09-22', '\r\n&lt;p&gt;Venezuelan refugee Juan Batista Ramos, 69, plays guitar in front of a mural he painted at the Tancredo Neves temporary shelter in Boa Vista, Brazil to help lift COVID-19 quarantine blues. &amp;nbsp;&amp;ldquo;Now, everywhere you look you will see a landscape to remind us that there is beauty in the world,&amp;rdquo; he says. &amp;nbsp;Ramos is among the many artists around the world using the power of culture to inspire hope and solidarity during the pandemic. &amp;nbsp;Photo: UNHCR/Allana Ferreira.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;&lt;img style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;uploadsPostImg/a1311da1eeb84.jpg&quot; alt=&quot;&quot; width=&quot;506&quot; height=&quot;382&quot; /&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Wendy Schellemans, an education assistant at the Royal Woluwe Institute in Brussels, models a transparent face mask designed to help the hard of hearing. &amp;nbsp;The United Nations and partners are working to ensure that responses to COVID-19 leave no one behind. &amp;nbsp;Photo courtesy of Royal Woluwe Institute&lt;/p&gt;\r\n', '1', 0, 'uploadsPostImg/a1311da1eeb84.jpg', 'Wendy Schellemans, an education assistant at the Royal Woluwe Institute in Brussels, models a transparent face mask designed to help the hard of hearing.  The United Nations and partners are working to ensure that responses to COVID-19 leave no one behind.  Photo courtesy of Royal Woluwe Institute'),
(6, '1', 'Humanity at its best', 'test', 740, '2020-09-22', '\r\n&lt;p&gt;Maryna, a community worker at the Arts Centre for Children and Youth in Chasiv Yar village, Ukraine, makes face masks on a sewing machine donated by the Office of the United Nations High Commissioner for Refugees (UNHCR) and civil society partner, Proliska. &amp;nbsp;She is among the many people around the world who are voluntarily addressing the shortage of masks on the market. Photo: UNHCR/Artem Hetman&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;A mother helps her daughter Ange, 8, take classes on television at home in Man, C&amp;ocirc;te d\'Ivoire. &amp;nbsp;Since the COVID-19 pandemic began, caregivers and educators have responded in stride and have been instrumental in finding ways to keep children learning. &amp;nbsp;In C&amp;ocirc;te d\'Ivoire, the United Nations Children&amp;rsquo;s Fund (UNICEF) partnered with the Ministry of Education on a &amp;lsquo;school at home&amp;rsquo; initiative, which includes taping lessons to be aired on national TV and radio. &amp;nbsp;Ange says: &amp;ldquo;I like to study at home. &amp;nbsp;My mum is a teacher and helps me a lot. &amp;nbsp;Of course, I miss my friends, but I can sleep a bit longer in the morning. &amp;nbsp;Later I want to become a lawyer or judge.&quot; &amp;nbsp;Photo: UNICEF/UNI320749&lt;/p&gt;\r\n', '1', 0, NULL, 'A mother helps her daughter Ange, 8, take classes on television at home in Man, Côte d\'Ivoire.  Since the COVID-19 pandemic began, caregivers and educators have responded in stride and have been instrumental in finding ways to keep children learning.  In Côte d\'Ivoire, the United Nations Children’s Fund (UNICEF) partnered with the Ministry of Education on a ‘school at home’ initiative,'),
(7, '3', 'Life goes on', 'User2', 743, '2020-09-22', '\r\n&lt;p&gt;Henri Abued Manzano, a tour guide at the United Nations Information Service (UNIS) in Vienna, speaks from his apartment. &amp;nbsp;COVID-19 upended the way people work, but they can be creative while in quarantine. &amp;nbsp;&amp;ldquo;We quickly decided that if visitors can&amp;rsquo;t come to us, we will have to come to them,&amp;rdquo; says Johanna Kleinert, Chief of the UNIS Visitors Service in Vienna. &amp;nbsp;Photo courtesy of Kevin K&amp;uuml;hn&lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;uploadsPostImg/a8a4251cd6fa3.png&quot; alt=&quot;&quot; width=&quot;500&quot; height=&quot;334&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;Hundreds of millions of babies are expected to be born during the COVID-19 pandemic. &amp;nbsp;Fionn, son of Chloe O\'Doherty and her husband Patrick, is among them. &amp;nbsp;The couple says: &amp;ldquo;It\'s all over. &amp;nbsp;We did it. &amp;nbsp;Brought life into the world at a time when everything is so uncertain. &amp;nbsp;The relief and love are palpable. &amp;nbsp;Nothing else matters.&amp;rdquo; &amp;nbsp;Photo: UNICEF/UNI321984/Bopape&lt;/p&gt;\r\n', '1', 0, 'uploadsPostImg/a8a4251cd6fa3.png', 'We quickly decided that if visitors can’t come to us, we will have to come to them,” says Johanna Kleinert, Chief of the UNIS Visitors Service in Vienna'),
(8, '4', 'Supporting the frontlines', 'User2', 743, '2020-09-22', '\r\n&lt;p&gt;The United Nations Air Service, run by the World Food Programme (WFP), distributes protective gear donated by the Jack Ma Foundation and Alibaba Group, in Somalia. The United Nations is using its supply chain capacity to rapidly move badly needed personal protective equipment, such as medical masks, gloves, gowns and face-shields to the frontline of the battle against COVID-19. Photo: WFP/Jama Hassan The United Nations is using its supply chain capacity to rapidly move badly needed personal protective equipment, such as medical masks, gloves, gowns and face-shields to the frontline of the battle against COVID-19. Photo: WFP/Jama Hassan&lt;/p&gt;\r\n', '1', 0, NULL, 'The United Nations is using its supply chain capacity to rapidly move badly needed personal protective equipment, such as medical masks, gloves, gowns and face-shields to the frontline of the battle against COVID-1'),
(9, '1', 'Editor in Chief\'s Introduction to Essays on the Impact of COVID-19 on Work and Workers', 'User2', 743, '2020-09-22', '\r\n&lt;p&gt;n March 11, 2020, the World Health Organization declared that COVID-19 was a global pandemic, indicating significant global spread of an infectious disease (&lt;sup&gt;&lt;a class=&quot; bibr popnode&quot; role=&quot;button&quot; href=&quot;https://www.ncbi.nlm.nih.gov/pmc/articles/PMC7205668/#bb0075&quot; aria-expanded=&quot;false&quot; aria-haspopup=&quot;true&quot;&gt;World Health Organization, 2020&lt;/a&gt;&lt;/sup&gt;). At that point, there were 118,000 confirmed cases of the coronavirus in 110 countries. China had been the first country with a widespread outbreak in January, and South Korea, Iran and Italy following in February with their own outbreaks. Soon, the virus was in all continents and over 177 countries, and as of this writing, the United States has the highest number of confirmed cases and, sadly, the most deaths. The virus was extremely contagious and led to death in the most vulnerable, particularly those older than 60 and those with underlying conditions. The most critical cases led to an overwhelming number being admitted into the intensive care units of hospitals, leading to a concern that the virus would overwhelm local health care systems. Today, in early May 2020, there have been nearly 250,000 deaths worldwide, with over 3,500,000&lt;/p&gt;\r\n&lt;p&gt;&lt;img src=&quot;uploadsPostImg/d1ed28be89b2d.jpg&quot; alt=&quot;&quot; width=&quot;275&quot; height=&quot;183&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;confirmed cases (&lt;sup&gt;&lt;a class=&quot; bibr popnode&quot; role=&quot;button&quot; href=&quot;https://www.ncbi.nlm.nih.gov/pmc/articles/PMC7205668/#bb0030&quot; aria-expanded=&quot;false&quot; aria-haspopup=&quot;true&quot;&gt;Hopkins, 2020&lt;/a&gt;&lt;/sup&gt;). The human toll is staggering, and experts are predicting a second wave in summer or fall.As the deaths rose from the virus that had no known treatment or vaccine countries shut their borders, banned travel to other countries and began to issue orders for their citizens to stay at home, with no gatherings of more than 10 individuals. Schools and universities closed their physical locations and moved education online. Sporting events were canceled, airlines cut flights, tourism evaporated, restaurants, movie theaters and bars closed, theater productions canceled, manufacturing facilities, services, and retail stores closed. In some businesses and industries, employees have been able to work remotely from home, but in others, workers have been laid off, furloughed, or had their hours cut. The&lt;/p&gt;\r\n', '1', 0, 'uploadsPostImg/d1ed28be89b2d.jpg', '. Soon, the virus was in all continents and over 177 countries, and as of this writing, the United States has the highest number of confirmed cases and, sadly, the most deaths. The virus was extremely contagious and led to death in the most vulnerable, particularly those older than 60 and those with underlying conditions. The most critical cases led to an overwhel'),
(10, '4', 'Astrologers predict not much respite from coronavirus until September  Read more at: https://www.deccanherald.com/national/astrologers-predict-not-much-respite-from-coronavirus-until-september-843635.html', 'Admin1', 741, '2020-09-22', '\r\n&lt;div style=&quot;position: absolute; left: -99999px;&quot;&gt;\r\n&lt;div style=&quot;position: absolute; left: -99999px;&quot;&gt;sdfsThe country has been under a lockdown since March 25 to contain the spread of coronavirus. But it has infected over 1.7 lakh people as on Saturday and killed nearly 5,000. &quot;Though the impact of COVID-19 will start reducing by the last week of Augu...&lt;br /&gt;&lt;br /&gt;Read more at: https://www.deccanherald.com/national/astrologers-predict-not-much-respite-from-coronavirus-until-september-843635.html&lt;/div&gt;\r\nThe country has been under a lockdown since March 25 to contain the spread of coronavirus. But it has infected over 1.7 lakh people as on Saturday and killed nearly 5,000. &quot;Though the impact of COVID-19 will start reducing by the last week of Augu...&lt;br /&gt;&lt;br /&gt;Read more at: https://www.deccanherald.com/national/astrologers-predict-not-much-respite-from-coronavirus-until-september-843635.html&lt;/div&gt;\r\n', '0', 0, NULL, ' Prime Minister Narendra Modi will chair a high-level virtual meeting to discuss the coronavirus situation with the chief ministers of seven states tomorrow. The meeting comes as most of the states in the country have been witnessing a spike in the number of Covid cases over the last few weeks.');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `col1` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `col1`) VALUES
(1, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(32) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `usern` varchar(64) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `img` text NOT NULL,
  `email` varchar(64) NOT NULL,
  `phnum` varchar(10) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `ts` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `passwd`, `usern`, `fname`, `lname`, `img`, `email`, `phnum`, `dob`, `ts`, `status`, `token`) VALUES
(740, '$2y$10$GroOp6lmR4SLRiZmIiCxhOCwZoimUY4SOtMsTgwKAbVtMUDu98YQi', 'test', '', '', '', 'test@test.com', '7788994455', '2020-09-02', '2020-09-22', 1, '6c0177ec163b393d9fdcc35ee407d3c5'),
(741, '$2y$10$78pc95VWfzcGOXuSfId9HuJxYxS0rwPedlZsPYhJj57KC.tPxJF4.', 'Admin1', 'Admin', 'User', '', 'admin1@dashboard.com', '8899774455', '2020-09-01', '2020-09-22', 2, '6b906b3d14ef0ff2f897bee7d41120c7'),
(742, '$2y$10$/gkaC26J4AQkeIFLhzywDOAbrTSUpdUkUJFnsX/hBAq0tky65fM.C', 'user1', 'user', 'user', '', 'user1@dashboard.com', '8899774454', '2020-09-15', '2020-09-22', 0, '89052383c2cada26b04e2547a89495b4'),
(743, '$2y$10$brLCLWaoKQpalA4KfXzcU.5.9F7KbUnjOBA41qEK.NNWk2FavANSm', 'User2', 'user', 'user2', '', 'user2@user.com', '8844557766', '2020-09-09', '2020-09-22', 1, '5b0ee14169b9fcdf8a99c70c8e9f9dd6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usern` (`usern`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=744;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
