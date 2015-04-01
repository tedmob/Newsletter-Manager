--
-- Database: `newsletter-manager`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id_category` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `list`
--

CREATE TABLE IF NOT EXISTS `list` (
`id` int(11) NOT NULL,
  `model` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
`id_log` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` int(11) NOT NULL,
  `model` int(11) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `models`
--

CREATE TABLE IF NOT EXISTS `models` (
`id_model` int(11) NOT NULL,
  `model` varchar(30) NOT NULL,
  `text` text NOT NULL,
  `subject` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `name` varchar(20) NOT NULL,
  `value` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `options`
--

INSERT INTO `options` (`name`, `value`) VALUES
('max_daily_email', '500'),
('smtp_email', 'hello@world.com'),
('smtp_host', 'smtp.world.com'),
('smtp_name', 'Tedmob'),
('smtp_password', 'helloworld'),
('smtp_port', '587'),
('smtp_user', 'hello@world.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id_user` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `birthday` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` int(11) NOT NULL,
  `citta` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id_category`), ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
 ADD PRIMARY KEY (`id_log`), ADD KEY `user` (`user`), ADD KEY `user_2` (`user`), ADD KEY `model` (`model`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
 ADD PRIMARY KEY (`id_model`), ADD UNIQUE KEY `model` (`model`), ADD UNIQUE KEY `model_2` (`model`), ADD UNIQUE KEY `model_3` (`model`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
 ADD PRIMARY KEY (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `email` (`email`), ADD KEY `category` (`category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `logs`
--
ALTER TABLE `logs`
ADD CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`model`) REFERENCES `models` (`id_model`) ON DELETE NO ACTION ON UPDATE NO ACTION;
