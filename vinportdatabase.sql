-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 10:45 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vinportdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorinformation`
--

CREATE TABLE `authorinformation` (
  `pieceOfInformationId` int(11) NOT NULL,
  `pieceOfInformationLabel` varchar(100) NOT NULL,
  `pieceOfInformationValue` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authorinformation`
--

INSERT INTO `authorinformation` (`pieceOfInformationId`, `pieceOfInformationLabel`, `pieceOfInformationValue`) VALUES
(1, 'First name', 'Marko'),
(2, 'Last name', 'Stojanović'),
(3, 'Date of birth', '2001-02-11'),
(4, 'Place of birth', 'Požarevac'),
(5, 'Country of birth', 'Federal Republic of Yugoslavia'),
(6, 'Place of residence', 'Belgrade'),
(7, 'Country of residence', 'Republic of Serbia'),
(8, 'Education', NULL),
(11, 'Occupation', 'Student'),
(12, 'Professional skills', NULL),
(13, 'Favourite singer', 'Frank Sinatra'),
(14, 'Favourite actor', 'Al Pacino'),
(15, 'Favourite movie', 'The Godfather'),
(16, 'Favourite TV show', 'The Tonight Show Starring Johnny Carson'),
(17, 'Favourite book', 'The Godfather');

-- --------------------------------------------------------

--
-- Table structure for table `authorinformation2`
--

CREATE TABLE `authorinformation2` (
  `pieceOfInformation2Id` int(11) NOT NULL,
  `pieceOfInformation2Value` varchar(100) NOT NULL,
  `pieceOfInformationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authorinformation2`
--

INSERT INTO `authorinformation2` (`pieceOfInformation2Id`, `pieceOfInformation2Value`, `pieceOfInformationId`) VALUES
(1, 'Economic-Trade School Požarevac', 8),
(2, 'ICT College', 8),
(5, 'Programming in C programming language', 12),
(6, 'Programming in C# programming language', 12),
(7, 'Database architecture in SQL domain-specific language', 12),
(8, 'Server administration on Windows Server 2012 R2', 12),
(9, 'Server administration on Ubuntu 16.04', 12),
(10, 'Administration of network devices', 12),
(11, 'Working in Microsoft Office 2016 productivity suite', 12),
(12, 'Working in Microsoft SQL Server Management Studio 18', 12),
(13, 'Programming in JavaScript script language', 12),
(14, 'Programming in PHP programming language', 12),
(15, 'Knowledge of TCP/IP architecture', 12);

-- --------------------------------------------------------

--
-- Table structure for table `carouseldata`
--

CREATE TABLE `carouseldata` (
  `id` int(11) NOT NULL,
  `src` varchar(100) NOT NULL,
  `alt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carouseldata`
--

INSERT INTO `carouseldata` (`id`, `src`, `alt`) VALUES
(5, '1980SLanciaGamma.jpg', '1980s Lancia Gamma'),
(6, '1950SBuickSpecial.jpg', '1950s Buick Special'),
(7, '1950SAustinHealey3000.jpg', '1950s Austin-Healey 3000');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `comment` text NOT NULL,
  `dateAndTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `reportId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `userId`, `comment`, `dateAndTime`, `reportId`) VALUES
(1, 3, 'La-dee-dah!', '2021-05-29 03:28:49', 5),
(4, 3, 'Johnny Carson\'s car!', '2021-05-29 03:44:38', 10),
(5, 2, 'This one was in The Godfather Part III!', '2021-05-29 05:38:30', 2),
(6, 5, 'What a nice car that is!', '2021-05-31 04:37:58', 5),
(7, 5, 'I love it!', '2021-05-31 04:38:17', 5),
(8, 2, 'This one is from The Godfather Part II! (In estate wagon variant)', '2021-06-01 06:50:59', 1),
(9, 2, 'The good old chevy!', '2021-06-01 06:52:17', 11),
(10, 2, 'This one was in The Godfather!', '2021-06-01 07:30:36', 4),
(11, 2, 'This one was in the Father Of The Bride!', '2021-06-01 07:34:34', 6);

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE `contributions` (
  `id` int(11) NOT NULL,
  `carName` varchar(100) DEFAULT NULL,
  `carManufacturer` varchar(100) DEFAULT NULL,
  `carEpoch` varchar(100) DEFAULT NULL,
  `carImage` varchar(100) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`id`, `carName`, `carManufacturer`, `carEpoch`, `carImage`, `userId`) VALUES
(3, NULL, NULL, NULL, '1622289393Contributionfiat500.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `countryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryName`) VALUES
(1, 'USA'),
(2, 'UK'),
(3, 'Italy'),
(4, 'Germany');

-- --------------------------------------------------------

--
-- Table structure for table `epochs`
--

CREATE TABLE `epochs` (
  `id` int(11) NOT NULL,
  `epochName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `epochs`
--

INSERT INTO `epochs` (`id`, `epochName`) VALUES
(1, '1940s'),
(2, '1950s'),
(3, '1960s'),
(4, '1970s'),
(5, '1980s');

-- --------------------------------------------------------

--
-- Table structure for table `footerlinks`
--

CREATE TABLE `footerlinks` (
  `id` int(11) NOT NULL,
  `href` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footerlinks`
--

INSERT INTO `footerlinks` (`id`, `href`, `icon`) VALUES
(1, 'https://www.facebook.com/profile.php?id=100068791247447', 'bi bi-facebook'),
(2, 'https://www.instagram.com/vinportnpo/', 'bi bi-instagram'),
(3, 'pdf/documentation.pdf', 'bi bi-file-earmark-post'),
(4, 'mailto:vinport2000@gmail.com', 'bi bi-envelope-fill');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `manufacturerName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `manufacturerName`) VALUES
(1, 'Buick'),
(2, 'Chevrolet'),
(3, 'Cadillac'),
(4, 'Chrysler'),
(5, 'Lancia'),
(6, 'Fiat'),
(7, 'Austin-Healey'),
(8, 'Jeep'),
(9, 'Volkswagen');

-- --------------------------------------------------------

--
-- Table structure for table `menudata`
--

CREATE TABLE `menudata` (
  `id` int(11) NOT NULL,
  `href` varchar(100) NOT NULL,
  `label` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menudata`
--

INSERT INTO `menudata` (`id`, `href`, `label`) VALUES
(1, 'index.php', 'Home'),
(2, 'index.php?page=reports', 'Reports'),
(3, 'index.php?page=author', 'Author'),
(4, 'index.php?page=signIn', 'Sign in'),
(5, 'index.php?page=signUp', 'Sign up'),
(6, 'models/signingOut.php', 'Sign out'),
(7, 'index.php?page=dashboard', 'Dashboard'),
(9, 'index.php?page=contribute', 'Contribute');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `firstName`, `lastName`, `emailAddress`, `subjectId`, `message`) VALUES
(1, 'Steve', 'Martin', 'stevemartin45@gmail.com', 1, 'Austin-Healey is great!');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `reportId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `carName` varchar(100) NOT NULL,
  `carImage` varchar(100) NOT NULL,
  `carThumbImage` varchar(100) NOT NULL,
  `sizeId` int(11) NOT NULL,
  `manufacturerId` int(11) NOT NULL,
  `countryId` int(11) NOT NULL,
  `epochId` int(11) NOT NULL,
  `reportKernel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`reportId`, `title`, `carName`, `carImage`, `carThumbImage`, `sizeId`, `manufacturerId`, `countryId`, `epochId`, `reportKernel`) VALUES
(1, '1950s Buick Special', 'Special', '1621700758Changing1950SBuickSpecial.jpg', '1621700758ChangingThumb1950SBuickSpecial.jpg', 3, 1, 1, 2, 'Specials before 1951 had 4.1 L engine which was replaced that year by larger Fireball straight-eight. A two-door hardtop coupe was also new for 1951. The 1954 Specials had an all-new body and chassis, much wider and lower, and were now equipped with the all-new, more powerful Nailhead V8 engines. Introduced in the middle of the 1955 model year the four-door Buick Special Riviera were the first four-door pillarless hardtops ever produced. 1956 Specials had larger 5.3 L V8 engine. In 1957 that engine was replaced by bigger 186 kW V8. The wheelbase was 122 inches. In 1957 2 estate wagon models were offered by Buick under Special series: Special Estate Wagon model 49 and hardtop variant marketed as the model 49-D. Both were six-seaters. 1958 brought the most chrome yet and twin headlights, as the car grew longer and wider, albeit on an unchanged chassis. Pre-1957 Specials had three VentiPorts on each side. GM renamed the Buick Special the LeSabre for the 1959 model year.'),
(2, '1980s Lancia Gamma', 'Gamma', '1621700794Changing1980SLanciaGammaII.jpg', '1621700794ChangingThumb1980SLanciaGammaII.jpg', 3, 5, 3, 5, 'In 1980 Lancia Gamma Series 2 was launched in 2 types:  4-door fastback saloon marketed as Berlina and 2-door coupe. The Lancia Gamma was a front-wheel drive car with longitudinally-mounted boxer engine and with either a 5-speed manual transmission and later a 4-speed automatic transmission. Lancia developed unique flat-4 engines for the Gamma. The Gamma had a midcycle face-lift, receiving Bosch L-Jetronic fuel injection as well as a new corporate grille, 15-inch sunburst alloy wheels, and a revised interior with new instrumentation, interior lighting, badging, handbrake and gear lever gaiter. Lancia developed unique flat-4 engines for the Gamma It was available with a displacement of 2.5 L (Gamma 2500) and 2.0 L version (Gamma 2000). Gamma 2500 also came in a version fitted with fuel injection (Gamma 2500 I.E.). In 1984 production of both Berlina and coupe ended.'),
(3, '1980s Jeep Wagoneer', 'Wagoneer', '1621700898Changing1980SJeepWagoneer.jpg', '1621700898ChangingThumb1980SJeepWagoneer.jpg', 3, 8, 1, 5, 'In the early \'80s Wagoneers had one-piece aluminum bumpers and a new one-piece chrome plastic grille with a protruding middle section shaped somewhat like a pig\'s nose, horizontal slats, and square headlights. This front end look that has become known as the pig nose grill would stay with Wagoneer models through 1985. In that time period, Wagoneers had 4.2 L six-cylinder engine as an optional feature which came with a manual transmission as standard equipment, but in 1983, automatic transmissions with Selec-Trac four-wheel drive became standard. With this combination, the Wagoneer achieved EPA fuel-consumption estimates of 13 L/100 km city and 9.4 L/100 km highway - outstanding for a full size estate wagon. This allowed the company to advertise good fuel mileage, although the more powerful 360 V8 remained popular with certain buyers despite its greater thirst for fuel. In 1981, the Wagoneer line was expanded to three models. The Custom Wagoneer was the basic model, yet it included a four-speed transmission, free-wheeling hubs, power steering, and power front disc brakes, as well as passenger area carpeting. A new Brougham model added an upgraded interior trim that included woodgrain for the instrument cluster and horn cover, floor mats, power tailgate window, as well as the convenience and light packages. The Brougham\'s exterior included a thin side body scuff molding with a narrow woodgrain insert, roof rack, as well as bright door and quarter window frames, and a lower tailgate molding. The Wagoneer Limited was the top-of-the-line with standard Quadra-Trac, automatic transmission, air conditioning, tinted glass, power windows, and door locks, cruise control, AM/FM stereo radio, extra quiet insulation, power six-way driver and passenger bucket seats with center armrest, upgraded door panels, leather-wrapped steering wheel, extra thick carpeting, and a retractable cargo cover. The basic Custom model was eliminated for 1983, and a new Selec-Trac system became standard equipment. A dash-mounted control allowed the driver to change between two-wheel and four-wheel drive. The switch activated a vacuum-activated spline clutch that was built into the transfer case that engaged the front axle assembly. A shift lever mounted on the side of the transmission hump allowed the driver to shift between four-high and four-low with the vehicle moving, although the transmission had to be shifted to neutral and the vehicle had to be moving at less than 5 miles per hour to accomplish this. The SJ-body Wagoneer line saw consolidation in 1984 with the end of the Brougham model, while the Limited was renamed the Grand Wagoneer.  In mid-1984, AMC introduced a less expensive version called the Wagoneer Custom, without the simulated woodgrain exterior. The Custom had steel wheels with hubcaps, standard equipment was pared down, and it had part-time four-wheel drive. Despite its lower price, sales were poor, and it was dropped after 1984. Thus, at the end of 1984, production reached 20,019 with just one fully equipped version available. An improved handling package was introduced in 1985 that incorporated a revised front sway bar, gas-filled shock absorbers, and lower friction rear springs. A total of 17,814 Grand Wagoneers were built for 1985. Starting in the 1986 model year, the Grand Wagoneer received a new four-part front grille and a stand-up hood ornament. An updated audio system became a standard feature and a power sunroof installed by American Sunroof Corporation became a factory option. However, the most significant change was the installation of a fully revamped interior including a new dash pad, new instrumentation, new door panel design, shorter nap cut-pile carpeting, new leather, and corduroy seat cover designs as well as front seats that now featured adjustable headrests. Changes were made to the instrument panel that now featured square gauges, and contained an improved climate control system. The metal glove box door was also replaced with a plastic door featuring a woodgrain overlay. A new two-spoke steering wheel also included new stalks for the lights and wiper and washer controls on the column. The Selec-Trac driveline gained a new Trac-Lok limited-slip differential to send power to the wheel with the best traction. There were 17,254 Grand Wagoneers built in 1986. The last model year developed under AMC, 1987, was also the 25th anniversary of the Wagoneer design. Standard equipment included the 5.9 L V8 engine and self-sealing Michelin Tru Seal P235/75R 15 radial tires. The sound system included a new AM/FM electronically tuned stereo with Dolby cassette and four Jensen speakers. The exterior featured revised woodgrained sides in marine teak with new nameplates and V8 badges. On the inside were new tan or cordovan trims that replaced the honey and garnet colors, while the interior assist pulls on the door panels were removed. A combined 14,265 units were built by AMC and Chrysler for 1987. Chrysler bought out American Motors Corporation on 2 March 1987. In 1988, Jeep\'s first full year under Chrysler, 14,117 Grand Wagoneers were produced. Many improvements were made for the 1989–1991 model year series, including a quality replacement for the earlier, leak-prone air conditioning compressor, the addition of the visually identifiable rear wiper/washer assembly, as well as a general improvement in fit and finish. An interior overhead console  was also added. This functional console featured much brighter map lights, an outside temperature sensor and compass, a storage compartment for sunglasses as well as an infrared remote-controlled key-less entry system. Since 1989 Wagoneers included upgraded wood siding and modernized aluminum alloy wheels that lost their gold-colored inlays in favor of gunmetal grey metallic. Chrysler also introduced an electrocoat primer for better rust proofing and all exterior colors were now applied in a two-stage base-clearcoat system. Late \'80s models also featured several new exterior paint colors and the tan interior color was replaced with a lighter color that Jeep called sand.'),
(4, '1940s Cadillac Series 70', 'Series 70', '1621700809Changing1940SCadillacSeries70.jpg', '1621700809ChangingThumb1940SCadillacSeries70.jpg', 3, 3, 1, 1, 'Series 70 had 3 models in the \'40s : Series 75, Series 72 and Series 67. In 1940 the one year only Series 72 was introduced as a less expensive companion to the Series 75. 1940 was the final year for the optional sidemounts. Sealed beam headlights were standard equipment. The engine manifold was set at five degrees to the engine to cancel the rearward tilt of the engine and give balanced distribution. The Series 72 had the same general appearance as the Series 75 but it was three inches shorter and set apart by rectangular taillights set high on the sides of the trunk. Recirculating ball steering was tried on Series 72 in 1940, to be adopted on all series in 1941. Like the Series 75 it was Fleetwood bodied, but rode on a 138 in wheelbase. 1941, the wheelbase was reduced to 136 in, though power on the 5.7 L L-head V8 engine was up to 112 kW. The one piece hood came down lower in the front, included the side panels and extended sideways to the fenders. A single rectangular panel of louver trim was used on each side of the hood. The rectangular grille was wide, vertical, and bulged foreword in the middle. Rectangular parking lights were built into the top outer corners of the grille. Headlights were now built into the nose of the fenders,and provision for built in accessory fog lights was provided under the headlights. Three chrome spears appeared on the rear section of all four fenders. Rear fender skirts were standard. Unlike other Cadillacs the Series 75 could only be ordered with running boards. It was with this generation that all GM vehicles experienced increased width dimensions to accommodate three passengers on the front bench seat and an additional three passengers on rear bench seat installed vehicles. This was accomplished with the deletion of running board thereby adding additional room inside the passenger compartment. The grille became more massive in 1942, with even fewer bars. Parking lights became round and fog light sockets became rectangular and were included in the grille area. A bullet shape appeared on the tops of the bumper guards. The nose on the hood louvers were more rounded. Unlike other Cadillacs the fender treatment remained unchanged. A new fresh air ventilating system with air ducts leading from the grille replaced cowl ventilators. Handbrake control was changed from lever to tee-shaped pull handle. Radiator shutter control of engine temperature was replaced by a blocking type thermostat in the water return fitting in the radiator. The Series 75 returned after the war as Cadillac\'s largest model. It retained most of its pre-war styling and rode on the long 136 in wheelbase and used a distinctive body not shared with other General Motors divisions. Five different touring sedan configurations were featured: with quarter windows; with auxiliary jump seats; business; Imperial seven-passenger and Imperial nine-passenger (the latter two both having jump seats). The engine was the same 346 in³ L-head V8 used by other Cadillacs that year. Standard equipment included large wheel discs, fender skirts, hood, side and lower beltline moldings and stainless steel runningboards. Unchanged in all but minor details for 1947, the big Series 75 continued to use the touring sedan body with a stately prewar appearance. It came in the same five configurations marketed the year before and had the same assortment of standard equipment geared to the luxury class buyer. 1948 Specials featured General Motors old-fashioned Turret Top styling, a throwback to the prewar years. Minor revisions on the outside of the cars included a new background for the V-shaped hood emblem and Cadillac script, replacing block lettering, low on the fenders behind the front wheel opening. Buyers ordering fog lamps got rectangular lamps in place of the smaller round style. Stainless steel running boards were seen once again. A new dashboard with rainbow style instrument cluster and burled leather trim extending to the carpets was seen this year. To accommodate luxury-class buyers the long wheelbase Series 75 was carried over in 1949 without any basic changes except that a more conventional dashboard design appeared featuring a horizontal speedometer. The Series 67 of 1941-42 was somewhat longer than the 75. It was a Fisher bodied car, but rode on a 139.0 in wheelbase. The Series 75 featured a higher cowl, and the height of the hood was extended to accommodate this extra height. Interior room in the Series 75 was larger, and its higher body made it more easily to enter and leave the vehicle.'),
(5, '1970s Volkswagen Type 1', 'Type 1', '1621700655Changing1970SVolkswagenType1.jpg', '1621700655ChangingThumb1970SVolkswagenType1.jpg', 1, 9, 4, 4, 'In 1970, familiar VW 1200 model was only in production. In the same year a new L (Luxus) Package was introduced including, among other items, twin map pockets, dual rear ashtrays, full carpeting, a passenger-side visor vanity mirror, and rubber bumper moldings. The optional 1500 cc engine now came with an engine lid having two rows of cooling louvers, while the convertible\'s engine lid gained two additional sets for a total of four. For North America, the 1500 cc engine was enlarged to 1600 cc engine and produced 43 kW. There were two Beetles for the first time in 1971, the familiar standard Beetle and a new, larger version, different from the windscreen forward. All Beetles received an engine upgrade: the optional 1500 cc engine was replaced by a 1600 cc with twin-port cylinder heads and a larger, relocated oil cooler. The new engine produced 45 kW. The ventilation system was improved with the original dash-top vents augmented by a second pair aimed directly at the driver and passenger. For the first time the system was a flow-through design with crescent-shaped air exits fitted behind the rear quarter windows. Airflow could be increased via an optional 2-speed fan. The standard Beetle was now badged as the VW 1300; when equipped with the 1600 engine, it was badged 1300 S. The new, larger Beetle was sold as the 1302/1302 S, offering nearly 43% more luggage capacity, up from 140 litres in front to 260 litres (remaining at 140 in back). A new MacPherson strut front suspension was incorporated and the front track was widened. The new suspension layout allowed the spare tire to be positioned flat under the trunk floor. Although the car had to be lengthened slightly to accomplish this, it allowed a reduction in turning radius. To gain additional trunk volume, the under-dash panel was lowered, allowing the fuel tank to be shifted rearward. From the windscreen back the big Beetle was identical to its smaller progenitor, except for having the also new semi-trailing arm rear suspension as standard equipment. Overall, the bigger Beetle was 2.0 in longer, 1.4 in wider and rode on a 0.7-longer wheelbase. Both Beetles were available with or without the L Package. The convertible was now based on the 1302 body. In North America, the 1302 was marketed as the Super Beetle and came only with the L Package and 1600 cc engine. While it lacked the front disc brakes that normally accompanied the larger motor, it was fitted with brake drums that were slightly larger than the standard Beetle. With the Super Beetle being sold as the premium model in North America, the standard Beetle, while retaining the same 1600 cc engine, was stripped of many of its earlier features in order to reduce the selling price. Bright window and running board moldings disappeared, along with the day/night mirror, horn ring, map pocket, locking glove box and miscellaneous other items. 1972 models had an 11% larger rear window (1.6 in taller). , and the convertible engine lid with four rows of louvres was now used on all Beetles. Inside the vehicle, a four-spoke energy-absorbing steering wheel was introduced, the windshield wiper/washer knob was replaced in favor of a steering column stalk, and intermittent wipers were a new option available in selected markets. An engine compartment socket for the proprietary VW Diagnosis system was also introduced. The rear luggage area was fitted with a folding parcel shelf. A limited-edition Commemorative model was launched in celebration of the Beetle\'s passing the record of the Ford Model T as the world\'s most-produced automobile. The Commemorative Beetle was a 1302 S finished in a special Marathon Blue Metallic paint and unique 4.5 x 15 styled steel wheels. In the U.S., it was marketed as the Super Beetle Baja Champion SE. 1973 models featured significantly enlarged elephant foot taillamps mounted in reshaped rear fenders. In the engine bay, the oil-bath air cleaner gave way to a dry element filter, and the generator was replaced with an alternator. The 1302/Super became the 1303 with a new taller wrap-around windscreen. The changes to the cowl and windshield resulted in slight redesign of the front hood. The instrument panel, formerly shared with the standard Beetle, was all-new and incorporated a raised speedometer pod, rocker-style switches and side-window defrosters. The limited-edition GSR (Gelb-Schwarzer Renner; German for Yellow-Black Racer) was a 1303 S available only in Saturn Yellow paint equipped with special 5.5 in wide sport wheels fitted with 175/70-15 Pirelli Cinturato CN36 high-performance radial tires. Front and rear deck lids were finished in matte black, as was all exterior trim with the exception of the chrome headlamp bezels. Inside were corduroy and leatherette high-bolstered sport seats and a small diameter three-spoke steering wheel with padded leather rim and a small red VW logo on the bottom spoke. In North America, the GSR was sold as the Super Beetle Sports Bug. The North American model had body-color deck lids and was available in Marathon Blue Metallic in addition to Saturn Yellow. In some markets, the sport wheels  (in both 4.5-inch and 5.5-inch widths), sport steering wheel and sport seats became available as stand-alone options. For 1974, North American models received newly required 5 mph impact bumpers mounted on self-restoring energy absorbers, which added approximately 0.98 in to the car\'s overall length. On the Super Beetle, the steering knuckle, and consequently the lower attachment point of the strut, was redesigned to improve handling and stability in the event of a tire blowout. A limited-edition Big Beetle was introduced based on the 1303 LS. Available in unique metallic paint colors, the car featured styled-steel 5.5 in wide sport wheels wrapped in 175/70-15 Pirelli Cinturato CN36 tires, corduroy seat inserts, upgraded loop-pile carpet, wood-look instrument panel trim and a padded steering wheel with bright accents. In the North American market, a limited-edition Sun Bug was introduced as a standard Beetle or Super Beetle. Both were finished in metallic gold and featured styled-steel 4.5 in-wide sport wheels. Inside were brown corduroy and leatherette seats, loop-pile carpet, and padded four-spoke deluxe steering wheel. The Super Beetle Sun Bug included a sliding-steel sunroof. Mid-year, the Love Bug was introduced for North America: based on the standard Beetle, it was available only in Phoenix Red or Ravenna Green with all exterior trim finished in matte black. A price leader, the Love Bug retailed for less than a standard Beetle.  In 1975, front turn indicators were moved from the top of the front fenders down into the bumper. At the rear, the license plate light housing was now molded of plastic with a ribbed top surface. To comply with tightening emission standards, the 1600 cc engine in Japanese and North American markets received Bosch L-Jetronic fuel injection. The injected engine received a new muffler and in California a catalytic converter. This necessitated a bulge in the rear apron under the rear bumper and replaced the distinctive twin pea shooter tailpipes with a single offset pipe, making injected models identifiable at a glance. 5 mph bumper-equipped North American models retained fender-top front indicators. The 1303 received rack and pinion steering. In North America, the 1303/Super Beetle sedan was moved upmarket and was now christened La Grande Bug. Similar to the Big Beetle of 1974, La Grande Bug was available in blue or green metallic paint in the U.S. and blue, green or gold metallic in Canada and was equipped with the same features as the 1974 Sun Bug. The Volkswagen script on the engine lid of all North American Beetles was replaced with a Fuel Injection badge. In 1976, the 1303/La Grande Bug was discontinued, with the larger body continuing only in convertible form. To make up for the loss in North American markets, the standard Beetle was upgraded, regaining some of the features that were removed in 1971. In addition, the 2-speed ventilation fan was included, previously available in North America only on the larger Beetle. The automatic stickshift option was discontinued as well. 1977 models received new front seats with separate head restraints. This was the final model year for the Beetle sedan in North America. The convertible was offered in a triple white Champagne Edition in Alpine White with white top and interior with the padded deluxe steering wheel, tiger maple wood-grain dash trim and 4.5 in wide sport wheels. Approximately 1,000 Champagne Editions were produced. In the same year, Volkswagen issued Annie Hall edition of Super Beetle convertible with Woody Allen and Diane Keaton characters from the movie poster on a decal on the rear quarter panel. Also included was a plastic sandwich in the glovebox, a reference to famous scene from the movie of the same name. Unfortunately for VW, a clerical error sent all 2500 Annie Hall edition Beetles to dealerships in Kansas, Oklahoma, Texas, and the Dakotas, where only 15 were sold. For 1978, a new Champagne 2nd Edition convertible was launched, available in blue or red metallic paint with white leatherette interior. Features included the 4.5 in wide styled steel sport wheels, AM/FM radio, analog quartz clock, padded deluxe steering wheel and rosewood-grain instrument panel trim. Approximately 1,100 were produced. In 1979, VW offered an Epilogue Edition of the convertible in triple black with features similar to the 1978 Champagne Edition. This would be the last year of convertible production worldwide as well as the final year for the Beetle in the US and Canada.'),
(6, '1950s Austin-Healey 3000', '3000', '1621700834Changing1950SAustinHealey3000.jpg', '1621700834ChangingThumb1950SAustinHealey3000.jpg', 3, 7, 2, 2, 'The Austin-Healey 3000 Mark I was announced on 1 July 1959 with a 3-litre BMC C-Series engine. The manufacturers claimed it would reach 60 mph in 11 seconds and 100 mph in 31 seconds. The body-styles were 2+2 or BT7 and a two-seater BN7. Weather protection was minimal, a folding plastic roof on a light demountable frame and above the doors detachable side screens holding sliding perspex panels. Wire wheels, overdrive gearbox, laminated windscreen, heater, adjustable steering column, detachable hard top for the 2+2, and two-tone paint were available as options.'),
(7, '1940s Chrysler Royal', 'Royal', '1621714706Changing1940SChryslerRoyal.jpg', '1621714706ChangingThumb1940SChryslerRoyal.jpg', 3, 4, 1, 1, 'The Chrysler Royal was 6-cylinder entry-level model. Features included sweeping fenders, rear suicide doors, dual windshield wipers, dual taillights and dual chrome trumpet horns. It was manufacturered as 4-door sedan, 2-door coupe and as a 2-door convertible.'),
(8, '1970s Buick LeSabre', 'LeSabre', '1621700887Changing1970SBuickLeSabre.jpg', '1621700888ChangingThumb1970SBuickLeSabre.jpg', 3, 1, 1, 4, 'In the early \'70s the latest generation of LeSabre was third generation. New features in 1970 included a hidden radio antenna which amounted to two wires embedded in the windshield. Wheelbase was increased by one inch to 124 inches. Both base and Custom models were offered. Engines were revised with the standard 350 two-barrel V8 increased in horsepower from 230 to 260. A new option for 1970 was a low-compression regular-fuel version of the 350 four-barrel rated at 285 horsepower and the high-compression premium fuel 350 four-barrel V8 was reworked with horsepower upped to 315 on a 10.25 to 1 compression ratio. Added to the lineup was a new LeSabre 455 line which shared interior and exterior trimmings with the LeSabre Custom and was powered by Buick\'s new 455 cubic-inch V8 with four-barrel carburetor, 10.25 to 1 compression and 370 horsepower, which also required premium fuel. Transmission offerings included a standard three-speed manual with column shift for the base 350 two-barrel or optional three-speed Turbo Hydra-matic 350 automatic, which was standard equipment with the two 350 four-barrel engines. This transmission completely replaced the old two-speed automatic offered with the smaller base engines in past years, while the 455 was paired with the Turbo Hydra-matic 400. At the start of the model year, variable-ratio power steering and power drum brakes were optional equipment. Those items were made standard equipment on all LeSabres (and Wildcats) effective January 1, 1970. Power front disc brakes remained an extra-cost option. Buick offered a full-sized station wagon for 1970 under the Estate Wagon nameplate. Though it used the LeSabre\'s B-body, it rode on the C-body Electra 225\'s 127-inch wheelbase chassis. The Estate Wagon came standard with the 455 V8. GM B platform used by LeSabres in the early 70s became fourth best selling automobile platform in history. In 1971 fourth generation of LeSabres was launched. The LeSabre emerged larger and heavier than before and also ever after. The styling featured curved bodysides, long hoods and wide expanses of glass. Semi-fastback rooflines were utilized on two-door hardtop coupes. Convertibles had a new top design to permit a full-width rear seat. The same assortment of 350 and 455 cubic-inch V8s were carried over but featured lowered compression ratios and other modifications in order to enable the use of lower-octane low-lead or unleaded gasoline as a result of a General Motors corporate mandate. Variable-ratio power steering and power front disc brakes were made standard equipment on all LeSabres at the start of the 1971 model year. In March, the Turbo Hydramatic transmission became standard equipment. The new body also featured a double shell roof for improved roll-over protection. Also new for 1971 was a flow-through ventilation system utilizing vents mounted in the trunklid. It used the heater fan to draw air into the car from the cowl intake, and force it out through vents in the trunk lid or tailgate. In theory, passengers could enjoy fresh air even when the car was moving slowly or stopped, as in heavy traffic. In practice, however, it didn\'t work. However, within weeks of the 1971 models\' debut, Buick and all other GM dealers received multiple complaints from drivers who complained that the ventilation system pulled cold air into the car before the heater could warm up and could not be turned off. The ventilation system was extensively modified for 1972. Also new for the 1971 was an optional MaxTrac computerized traction control system. Inside was a new wrap-around cockpit style instrument panel that placed all controls and instruments within easy reach of the driver, along with easier serviceability with instruments and switches accessible from the front when the faceplate was removed. Again, base and Custom model LeSabres were offered in the same sedan and coupe bodystyles while the convertible was a Custom-only offering. The LeSabre 455 model line was dropped for 1971 with the larger engine now being offered as an option on the regular base and Custom-series models. LeSabre Customs equipped with the optional 455 engine got a 455 badge underneath the LeSabre nameplates on the front fenders instead of the Custom badge normally used. A revised grille and taillights lenses were among the styling changes for 1972. Out back, a small BUICK nameplate was located above the right side taillight replacing the larger block letters spelling B U I C K across the lower trunk lid between the taillights in 1971. Also new for 1972 was a one-year only 2 1/2-mph front bumper. Interior trims received only slight revisions from 1971. A revised flow-through ventilation system utilizing vents in the doorjambs replaced the troublesome system used in 1971 with the trunklid vents. Both the 350 and 455 V8s were carried over from 1971 with horsepower ratings switched the new SAE net figures based on an engine as installed in an automobile with accessories and emission controls hooked up, rather than the gross horsepower method of past years based upon a dynamometer rating from an engine not installed in a vehicle. With that, the standard 350 two-barrel V8 was rated at 160 net horsepower compared to 230 gross horsepower in 1971 while the top 455 V8 was rated at 250 net horsepower in 1972 compared to 315 in 1971. Engines were also revised to meet the 1972 federal and California emission standards with California-bound cars receiving EGR valves, which would be installed on engines of virtually all automobiles for nationwide sales in 1973. Inside, the instrument panel featured a new FASTEN SEAT BELTS light due to a new federal safety regulation and the buzzer which sounded when the key was left in the ignition also sounded upon starting the car to remind the driver and passengers to buckle up. The 1973 Buick LeSabre featured the larger federally mandated 5 mph front bumper and a new vertical bar grille flowed across the entire lower front end and under the headlights, and turn signal below the bumper. Revised taillights were set in a larger rear bumper. Both the 350 and 455 V8s were revised with EGR valves used on both federal and California-emission equipped cars. The LeSabre Custom convertible was dropped this year. The 1974 Buick LeSabre appeared to have a stronger, more modern appearance with a more detailed vertical-barred grille, dual headlights were given individual bezels, turn signals were set within the front bumper and wide horizontal taillights stretched above the new 5 mph rear bumper. Four-door pillared and hardtop sedans retained the same rooflines as 1973 but the two-door hardtop coupe featured a new roofline with a side rear opera windows (along with a small roll-down rear window). Inside, the instrument panel was substantially revised but retained the wrap-around theme. A new (and seldom ordered) option was an Air Cushion Restraint System which included driver- and passenger-side airbags along with a unique four-spoke steering wheel. This option was not very popular and was dropped after the 1976 model year. New integrated seat and shoulder belts were introduced this year along with a federally mandated interlock system that required the driver and right front passenger to buckle their seat belts in order to start the vehicle. The interlock was met with such a major public outcry that Congress rescinded the interlock regulation in late 1974 after a few early 1975 models were so equipped, permitting owners of all 1974 and the early 1975 models equipped with the interlock system to legally disconnect it. In 1973 LeSabre became Buick\'s only B-body large car. The base LeSabre was continued, but a new LeSabre Luxus series replaced the LeSabre Custom. The Luxus convertible also returned the ragtop to the LeSabre line after a one-year absence and was Buick\'s only ragtop. Engine offerings were revised for 1974. The 350 two-barrel remained standard on all models with optional engines including a 350 four-barrel and 455 four-barrel V8s, both carried over from 1973 with revisions to meet the 1974 emission standards. New engine options for 1974 included a 455 two-barrel and the Stage 1 455 performance package which added dual exhausts, suspension upgrades and other equipment. New options for 1974 included radial-ply tires, GM\'s High Energy Ignition and a low fuel warning light that illuminated when the fuel tank was down to four gallons. This would be the final year for the MaxTrac electronic traction control system as an option. The upscale LeSabre Luxus designation was dropped and replaced by the LeSabre Custom nameplate. 1975 also was the first year of the catalytic converter, and standard high energy ignition which was part of GM\'s Maximum Mileage System at the time Introduced in September 1974. The 1975 LeSabre was the first to require use of unleaded gasoline, due to the advent of the catalytic converter. The LeSabre lineup offered a coupe and two sedans while the LeSabre Custom lineup offered the coupe, two sedans, and the only convertible in the Buick lineup. 1975 would be the final year for the LeSabre Custom Convertible with around 5,300 examples rolling off the assembly lines. Engine offerings were reduced to just two: the standard 5.7-litre V8  and a four-barrel carburetor or optional 7.5-litre V8 with a four barrel. The 1975 Buick LeSabre now featured a larger, cross-hatched patterned grille which still ran the entire front of the car, dual headlights were once again set side by side instead of individually. Turn signals were located within the front bumper. A Buick tri-shield hood ornament was standard on the Custom Series and optional on the base series. The three-hole ventiports were moved from the hood to the front fenders. Slightly larger but narrower taillamps draped the back of the car with back-up lights positioned in the center broken up by the license plate. Four-door pillared sedans received a new small third windows while four-door hardtop sedans had new opera windows. Inside, a new flat instrument panel replaced the wrap-around cockpit dash of previous years and featured a horizontal sweep speedometer that read to only 100 mph compared to 120 mph in previous years and also included kilometer readings. Otherwise, interior trimmings received only minor revisions. Convertible production for both the LeSabre Custom was not very abundant in the years 1971 to 1975. The rarest production in that time was the 1971 LeSabre Custom with just over 1,800 units built. The convertible mechanism used was called the scissor top that folded inward on itself, instead of straight back. Only minor styling changes highlighted the 1976 Buick LeSabre, which was the final year for the 1971-vintage bodyshell, the unpopular and rarely-ordered driver- and passenger-side airbag option, the 455 V8 and hardtop bodystyles. Changes included rectangular quad headlights placed into a unit with the turn signals set directly below and at the center was a new classic egg-crate grille, no longer integrated with the headlights, making it more prominent. The 1976 LeSabre was the only American full-size car with a standard V6 engine, which was Buick\'s brand-new 3.8 L V6 engine. The V6 was only offered on the base-level LeSabre and not mentioned in initial 1976 Buick literature issued in September 1975 because the V6 engine was a last-minute addition to the line. The 350-cubic-inch V8 was the base engine on the LeSabre Custom and the 455-cubic-inch V8 was optional. Both V8s were optional on the base LeSabre. Buick\'s full size LeSabre coupe was a true hardtop, with small rear quarter windows that rolled down (in addition to a larger third rear side opera window that was fixed). In 1977 fifth generation of LeSabres was launched. The 1977 Buick LeSabre was considerably smaller on the outside and lighter than their predecessors to the tune of losing 700-800 pounds of weight and overall length of 10 to 15 inches. Although the 1977 Buick LeSabre was considerably smaller on the outside, headroom, rear seat legroom and trunk space were increased over the much larger 1976 model. The engine lineup consisted of an assortment of engines including the standard 231 cubic-inch Buick-built V6 and various optional powerplants including a Pontiac-built 301 cubic-inch V8, 350 cubic-inch V8s built by both Buick and Oldsmobile, and an Oldsmobile 403 cubic-inch V8. The V6 was standard in base and Custom coupes and sedans, the 301 V8 on the new LeSabre Sport Coupe and the 350 V8 on the Estate Wagon. The pillarless hardtop body styles were no longer available. Following a major downsizing and redesign, the 1978 Buick LeSabre received only minor changes including new grillework. Engine offerings were unchanged from 1977 on most models, but the LeSabre Sport Coupe was now powered by a turbocharged 231 cubic-inch V6 with a four-barrel carburetor producing 165 BHP (SAE Net) at 4000 RPM and a rather useful 285 lb-ft at 2,800 rpm. Only minor changes including new grille and rear taillight patterns highlighted the 1979 LeSabre aside from the top-level LeSabre Custom of previous years being renamed the LeSabre Limited. The LeSabre Sport Coupe continued with the turbocharged V6 as standard equipment and a new option for this model only were Strato bucket seats with center console. This would be the final year for the Pontiac 301 and Oldsmobile 403 V8s on the option list.'),
(9, '1970s Fiat 124', '124', '1621700667Changing1970SFiat124.jpg', '1621700667ChangingThumb1970SFiat124.jpg', 1, 6, 3, 4, 'At the November 1970 Turin Motor Show Fiat introduced a round of updates for the entire saloon and wagon 124 range, as well as a new model variant: the 124 Special T. All models had gained air outlets added to the C-pillar for better ventilation, and a split brake circuit; while some features previously exclusive to the 124 Special such as servo-assisted brakes, back-up light and an alternator were made standard across the range. Berlina and Familiare both had a new grille with alternated chrome and black horizontal bars, and larger bumper over-riders. Additionally the Berlina had large, nearly square tail lamps made up by two stacked rectangular elements. The renewed Special sported a completely redesigned front end. A black, square-mesh radiator grille was crossed by a horizontal bright bar joining the dual headlamps; each of the four round lamps was set in its own square, bright-edged housing. The grille-headlamps assembly was flanked by the turn indicators. Front and rear the bumpers had lost their over-riders, replaced by full-width rubber strips. At the rear the lamps were also new—still horizontal and rectangular in shape unlike the ones used on the standard saloon—and the whole tail panel was surrounded by a chromed profile. Inside there was a new dashboard with imitation wood inserts, carpets instead of rubber mats, and cloth upholstery. The T in 124 Special T stood for twin cam, hinting at the car\'s 1,438 cc dual overhead camshaft engine, derived from the Sport Coupé and Spider but in a milder state of tune. Coded 124 AC.300, this engine had revised valve timing and fuel system and produced 59 kW at 5,800 rpm. According to the manufacturer top speed was 160 km/h. Externally the Special T was identical to the Special, save for model badging at the rear.');
INSERT INTO `reports` (`reportId`, `title`, `carName`, `carImage`, `carThumbImage`, `sizeId`, `manufacturerId`, `countryId`, `epochId`, `reportKernel`) VALUES
(10, '1970s Chevrolet Corvette', 'Corvette', '1621700877Changing1970SChevroletCorvette.jpg', '1621700877ChangingThumb1970SChevroletCorvette.jpg', 3, 2, 1, 4, 'The only version of Corvette produced in the \'70s was C3. With January 1970 production, fender flares were designed into the body contours to reduce wheel-thrown debris damage. New were eggcrate grills with matching front fender side vents and larger squared front directional lamps. The previously round dual exhaust outlets were made larger and rectangular in shape. Interiors were tweaked with redesigned seats and a new deluxe interior option combined wood-grain wood accents and higher-spec carpeting with leather seat surfaces. Positraction rear axle, tinted glass, and a wide-ratio 4-speed manual transmission were now standard. The 5.7 L base engine (ZQ3) remained at 224 kW and the L46 was again offered as a 261 kW high performance upgrade. New was the LT-1, a 5.7 L small-block V8 engine delivering a factory rated 276 kW.  It was a solid lifter motor featuring a forged steel crankshaft, 4-bolt main block, 11:1 compression ratio, impact extruded pistons, high-lift camshaft, low-restriction exhaust, aluminum intake manifold, 4-barrel carburetor, and finned aluminum rocker covers. The new engine, making up less than 8% of production, could not be ordered with air conditioning but was fitted with a domed hood adorned with LT-1 decals. A special ZR1 package added racing suspension, brakes, stabilizer bars, and other high performance components to LT-1 cars. Big-block selection was down to one engine but displacement increased. The LS5 was a 7.4 L motor generating  291 kW SAE gross and accounted for a a quarter of the cars. The LS7, which was equipped with a single 800 CFM Holley carburetor and advertised at 343 kW at 5600 rpm SAE gross and 490 lb⋅ft at 3600 rpm of torque,  was planned and appeared in Chevrolet literature but is not believed to have ever been delivered to retail customers, but offered as a crate engine. A short model year resulted in a disproportionately low production volume of 17,316, down nearly 60%. Rare options: ZR1 special engine package (25), shoulder belts in convertibles (475), LT-1 engine (1,287). Produced from August 1970, 1971 cars were virtually identical in appearance to the previous model inside and out. This was the final year for the fiber optics light monitoring system, the headlight washer system, and the M22 heavy duty 4-speed manual gearbox. For the first time, air conditioning was installed on most of the cars, with nearly 53 percent so ordered. Engines were detuned with reduced compression ratios to tolerate lower octane fuel. The small blocks available were the 5.7L base engine, which dropped to 201 kW , and the high performance LT-1, now listed at 246 kW. The LS5 7.4 L motor was carried over and produced 272 kW. 1971-only was the LS6 7.4 L block featuring aluminum heads and delivering 317 kW and could be ordered with an automatic transmission. The ZR1 option was carried over for LT-1 equipped cars and the ZR2 option, offered this year only, provided a similar performance equipment package for LS6 cars, and restricted transmission to a 4-speed manual.  Rare options: ZR1 special engine package (8), ZR2 special engine package (12), LS6 425 hp engine (188), shoulder belts in convertibles (677). 1972 (Aug. 1971 prod) was the last model year for chrome bumpers at both front and rear, the vacuum actuated pop-up windshield wiper door, as well as the removable rear window. The key activated anti-theft alarm system became standard. The increasingly popular choice of an automatic transmission was installed in most Corvettes for the first time, with nearly 54 percent so equipped. This year SAE net measurement for horsepower was now utilized (away from the previous SAE gross standard), and was largely responsible for the much lower engine output figures such as the 149 kW rating on the standard 5.7 L motor. This was the final year for the LT-1 engine, rated at 190 kW, and the ZR1 racing package built around it. Although the M22 HD 4-speed was no longer a Regular Production Option, it continued to be fitted to cars outfitted with the ZR1 package. The LT-1 could now be ordered with air conditioning, a combination not permitted the two previous years. The LS5 7.4 L big block was again available and came in at 201 kW. Noteworthy is in 1972 the LS5 was not available to California buyers.  This was the beginning of a trend where Chevrolet restricted certain power train choices to California buyers due to that state\'s practice of applying more stringent emission (smog) standards than mandated by federal regulations.  It sold only 6,508 copies, amounting to 9% of the market, placing it number three. Rare options: ZR1 special engine package (20), shoulder belts with convertibles (749), LT1 engine option (1,741). Model year 1973 started Corvette\'s transformation from muscle to touring sports car. Indeed, redesigned body mounts and radial tires did improve Corvette\'s ride, and interior sound levels were reduced by 40%.  The chrome rear bumper was essentially carried over from the previous year. However, the chrome blade front bumper was dropped for the federally required 8.0 km/h standard for a light-weight front bumper system with an inner transverse tube attached to the frame with two Omark-bolts-(special steel fasteners which absorbed energy when a forming die, pushed back by the bumper, was forced down their length), and an injection-molded urethane bumper cover. The urethane nose was chosen over Chevy\'s other alternative, a more protruding version of the previous metal bumper. The new urethane bumper assembly added thirty-five pounds to the front end. Two 5.7 L small block engines were available. The base L-48 engine produced 142 kW. The L-82 was introduced as the optional high performance small-block engine (replacing the LT-1 engine) and delivered 186 kW. The new hydraulic lifter motor featured a forged steel crankshaft, running in a four-bolt main block, with special rods, impact extruded pistons, a higher lift camshaft, mated to special heads with larger valves running at a higher 9:1 compression, and included finned aluminum valve covers to help dissipate heat. The 7.4 L LS-4 big-block V8 engine was offered delivering 205 kW and 15% of the cars were ordered so equipped. 454 emblems adorned the hood of big-block equipped Corvettes. All models featured a new cowl induction domed hood, which pulled air in through a rear hood intake into the engine compartment under full throttle, increasing power (but didn\'t show up in the horsepower ratings). 0-60 mph times were reduced by a second while keeping the engine compartment cooler. The new tire size was GR70-15 with white stripes or raised white letters optional. An aluminum wheel option was seen on 1973 and 1974 pilot cars, and a few \'73s were so equipped, but withheld for quality issues, and wouldn\'t be available until 1976. In 1973 was the first Off Road Suspension RPO Z07 produced and today it is considered a very rare production Corvette as only 45 were produced. For 1974, a new rear bumper system replaced the squared tail and chrome rear bumper blades with a trim, tapering urethane cover carrying an integral license plate holder and recesses for the trademark round taillights. Underneath sat a box-section aluminum impact bar on two Omark-bolt slider brackets similar to the system used in the nose which allowed the Corvette to pass federal five-mph impact tests at the rear as well as the front. For the 1974 model only, casting limitations mandated left and right bumper covers with a vertical center seam. The anti-theft alarm key activator was moved from the rear panel to the front left fender. Tailpipes were now turned down as the new bumper cover eliminated the tailpipe extensions. A 1974 Stingray equipped with the L48 145 kW small-block was capable of 0-60 mph in 6.8 seconds. The L-82 engine remained at 186 kW and the 7.4 L LS4 dropped slightly to 201 kW. Resonators were added to the dual exhaust system on 1974 models which further helped quiet the interior. The radiator and shroud were revised for better low-speed cooling. The inside rear-view mirror width was increased from 8 inches to 10 inches. For the first time, lap and shoulder seat belts were integrated, but only in coupes. The FE7 Gymkhana off-road suspension included stiffer springs and a stiffer front stabilizer bar with no ordering restrictions. It was included with the Z07 package and was also available for L82 and LS4  cars with M21 transmission. 1974 was the end of an era for the Corvette with the last true dual exhaust systems, the last without a catalytic converter and the last use of the 7.4 L big block engine. The 1975 model was advertised as a more efficient Corvette, as service intervals were extended and electronic ignition and the federally mandated catalytic converter were introduced with unleaded fuel only warnings on the fuel gauge and filler door. Dual exhaust pipes were routed to a single converter, then split again leading to dual mufflers and tailpipes. Starting this year, tachometers were electronically driven. The Corvette began to be influenced by the metric system as speedometers now displayed small subfaces indicating kilometers-per-hour. \'75s featured revised inner bumper systems with molded front and rear simulated bumper guards. The urethane rear bumper, now in its second year, reappeared as a one-piece seamless unit. This was the final year for Astro Ventilation. Power bottomed out this year - the base engine produced only 123 kW and the only remaining optional motor, the L-82, dropped an astonishing 34 kW, managing to deliver 153 kW.  With no larger engine available, L-82 hood emblems began to appear on cars so equipped. Unchanged was the standard rear axle ratio for the base engine, which remained at 3.08 with automatic and 3.36 with manual transmission. This was the last convertible for C3 model and only 12% of the cars were ordered as such. As in previous years, a folding top came standard with roadsters and a body color or vinyl covered hardtop was optional at additional cost.  Due to the state\'s strict emissions standards, this was the last year Chevrolet installed the L-82 engine in a Corvette destined for California. 1976 models featured steel floor panels shielding the catalytic converter exhaust. These steel floor panels weighed less than the previous fiberglass floor and reduced interior noise levels. Power output was 134 kW for the base L-48 engine and 157 kW for the optional L-82. To further reduce cabin noise levels, cowl induction was dropped in favor of the air cleaner ducted over the radiator, picking up outside air from the front of the car, thus reducing wind turbulence at the base of the windshield. The hood was carried over, with its cowl vent grille and induction system opening becoming non-functional. The optional cast aluminum wheels were finally made available, which reduced the unsprung weight of the car by 32 pounds. A standard steel rim spare was used. This was the last year for optional white striped tires, as 86% of the cars were being delivered with the optional white lettered tires. A new rear nameplate for the rear bumper cover was introduced, eliminating the individual Corvette letters.  An unwelcome change was the Vega GT 4-spoke steering wheel, although its smaller diameter did provide extra room and eased entry/exit. The steering wheel, color-keyed to the interior, continued on 1977 through 1979 models, limited to non-tilt wheel cars only. GM\'s Freedom battery, a new sealed and maintenance-free unit, was now installed in all cars. The rear window defroster option was changed from the forced-air type of previous years to the new Electro-Clear defogger, an in-glass heated element type. Even without a convertible model, the Corvette still set new sales records. 1977 saw the steering column repositioned 2 inches closer to the dashboard to allow a more arms out position for the driver. The custom interior with leather seat trim was now standard, with cloth and leather a no-cost option. A redesigned center console permitted universal Delco radio options. One consequence of this modification was that an 8-track tape player was now available as an option. Auxiliary gauges were restyled and the ammeter was replaced with a voltmeter. The sun visors were redesigned to swivel so as to provide some glare protection from the side as well as the front. Chevrolet responded to the criticism of the previous year\'s steering wheel with an all new three-spoke leather-wrapped unit, which was well received. Chevrolet featured this new wheel prominently on the front of their new Corvette sales brochure. The new wheel came on all cars fitted with the optional tilt-telescopic steering column which was ordered on all but a few thousand Corvettes. Corvette\'s refinement as a touring sports car continued as both power steering and power brakes became standard and new options included body-colored sport mirrors, cruise control, and a new convenience group. Cruise control was only available on cars with automatic transmissions. The convenience group included dome light delay, headlight warning buzzer, underhood light, low fuel warning light, interior courtesy lights, and passenger side visor mirror. The black exterior paint color returned. Unchanged was the horsepower ratings for both base and L-82 engines. Early in production, the engine paint color was changed from Chevy orange to Corporate blue. The Stingray script, seen on front fenders  disappeared, but new cross-flags emblems began appearing on fenders before the model year ended. Windshield posts were now painted black for a thin pillar look and this was the final year of the sugar scoop tunneled roof-line and vertical back window. A Corvette milestone was reached during 1977 as Chevrolet had built a half million Corvettes since production began in 1953. 1978 was the Corvette\'s 25th anniversary, and all \'78s featured silver anniversary nose and fuel door emblems. A new fastback rear window was the most dramatic and noticeable styling change, giving the ten-year-old C3 Corvette body style a fresh lease on life. The fixed-glass fastback benefited both aerodynamics and increased the usable luggage space behind the seats while improving rearward visibility in the bargain. A shade was installed that could be pulled forward to cover the rear compartment to protect cargo and carpet against the unrelenting sun. The tachometer and speedometer were redesigned to match the new aircraft styled center console and gauge cluster first seen the previous year. Redesigned interior door panels were also new as well as an actual glove box was added in front of the passenger seat, replacing the map pockets of previous years. Available options now included power door locks, a power antenna, dual rear speakers and a CB radio. The optional convenience group, introduced the previous year, now included intermittent (delay) wipers, floor mats, and the passenger side vanity mirror was an upgraded illuminated unit. The base L-48 engine generated 138 kW. Those destined for California or high altitude areas produced 130 kW.  Gone was the chrome-plated ignition shielding over the distributor, replaced with a metal-lined black plastic unit. The single-snorkel air intake used since 1976 was changed to a dual-snorkel set-up on L-82 equipped cars helping to boost that output to 164 kW. L-82 engines were also now fitted with an aluminum intake manifold which saved 24 pounds compared to the cast iron unit of previous years. The Corvette converted to metric tires with the P225/70R15 as standard. Wider P255/60R15 tires were available as an option and required fender trimming from the factory for clearance. The fuel tank capacity increased from 17 gal to 24 gal on all cars. To make room for the larger tank, a smaller (P195/80D15) space saver spare tire was utilized. Two special editions were offered to celebrate Corvette\'s 25th year. Silver Anniversary model in silver color appeared as the B2Z option package and  it presented silver over a gray lower body with a separating pinstripe, plus aluminum wheels and dual sport outside mirrors as mandatory options. 6,502 Indy 500 Pace car replica editions were produced featuring Black/silver two-tone paint, front and rear spoilers, mirror-tint roof panels and contoured sport seats. Reviewers praised the car\'s classic strengths including its impressive straight-line numbers, especially an L48/automatic\'s 7.8 second 0-60 mph time and top speed of 123 mph, and noted its more refined, less rattling ride. On the other hand, they continued to note its weaknesses, like a rear-end that tended to step out during sharp maneuvers and a cabin that was still cramped and uncomfortable. 1979 saw the crossed-flag emblems on the nose and fuel door revert to those seen on the \'77 model. Three popular features introduced on the \'78 pace car replicas made it into this year\'s production: the new bucket seats, the front and rear spoiler package, and the glass roof panels. The new lightweight high back seats were made standard equipment. The new seats had better side bolster, provided easier access to the rear storage area, and the seat pair resulted in a weight reduction of about 24 pounds. The bolt-on front and rear spoilers were offered as an option and nearly 7,000 cars were ordered so equipped. Functionally, the spoilers decreased drag by about 15% and increased fuel economy by about a half-mile per gallon. A bigger hit were the glass mirror-tint roof panels, now a regular option, with nearly 15,000 cars so fitted. All T-tops were now wired into the standard anti-theft alarm system. Tungsten-halogen high-beam headlights became standard as did an AM-FM radio, and for the first time a cassette tape player could be added as a option. Heavy duty shock absorbers could now be ordered without the full Gymkhana suspension. An auxiliary electric engine cooling fan was first installed, but only on L-82 equipped cars with air conditioning. Rocker panels and rear window trim were painted black.  Output for all engines increased due to new open flow mufflers. The dual-snorkel air intake introduced on L-82 cars the previous year was now fitted to all cars and the base engine now generated 145 kW. The optional L-82 engine increased to 168 kW. This was the final year a manual gearbox could be ordered with the L-82 engine. This was also the last year for the M21 close-ratio 4-speed, a gearbox that, as in previous years, required the optional L-82 engine. A wide-ratio 4-speed was available for all cars.  In \'79, less than 20% of the cars were delivered with manual gearboxes.  This year reached an all-time high in Corvette popularity. Production hit its peak in 1979 at 53,807, a record that stands to this day.'),
(11, '1940s Chevrolet Master', 'Master', '1621700714Changing1940SChevroletMaster.jpg', '1621700714ChangingThumb1940SChevroletMaster.jpg', 2, 2, 1, 1, 'Chevrolet Master was the more expensive model in the Chevrolet range at this time. The Master continued to be available in Master 85 (KB) as well as the more upscale Master Deluxe model (KA). The even better equipped Special Deluxe also appeared in 1940. Manufacturing of this car ended in 1942.'),
(12, '1950s Chrysler New Yorker', 'New Yorker', '1621700854Changing1950SChryslerNewYorker.jpg', '1621700854ChangingThumb1950SChryslerNewYorker.jpg', 3, 4, 1, 2, 'In the early \'50s the latest generation of New Yorkers was third. The 1950 New Yorker was the more deluxe of the regular eight-cylinder Chryslers (Saratoga being the eight with plainer trim) with cloth upholstery available in (unusual for 1950) several colors, 101 kW Spitfire straight-eight engine and a roomy interior featuring chair height seats. The Prestomatic  fluid drive transmission had two forward ranges, each with two speeds. In normal driving, the high range was engaged using the clutch. The car could then be driven without using the clutch (unless reverse or low range was required); at any speed above 21 km/h, the driver released the accelerator and the transmission shifted into the higher gear of the range with a slight clunk. When the car came to a stop, the lower gear was again engaged.\n\nA new body style was introduced for 1950, a two-door hardtop, the Special Club coupe in the New Yorker series. The model was called the Newport in sales literature. Also, Chrysler added foam rubber padding on the dashboard for safety. Chrysler introduced the 134 kW  FirePower Hemi engine for 1951. The engine became a popular choice among hot rodders and racers. The FirePower Hemi equipped cars could accelerate 0 to 60 mph in 10 seconds. The New Yorker also offered Fluid Torque Drive, a true torque converter, in place of Fluid Drive. Cars with Fluid Torque Drive came only with Fluid Matic semi-automatic transmission and had a gear selector quadrant on the steering column. Power steering, an industry first, appeared as an option  on Chrysler cars with the Hemi engine. It was sold under the name Hydraguide.\n\nA station wagon was offered for 1951, with only 251 built. Its 131.5 in wheelbase is the longest ever used on a station wagon. 1952 saw a small redesign on taillights with the backup lights in the lower section. This was the last year for the 131.5 in wheelbase chassis for the New Yorker. The 1953 New Yorker had a less bulky look with the wheelbase reduced to 125.5 in, a one-piece curved windshield and rear fenders integrated into the body. Wire wheels were now an option. The Saratoga of 1952 became the New Yorker for 1953 while the former New Yorker was now the New Yorker DeLuxe. The convertible and Newport hardtop were available only in the New Yorker DeLuxe while the base New Yorker offered a long-wheelbase sedan and a Town & Country wagon. The convertible was New Yorker\'s costliest model on the 125.5 in chassis and only 950 were built. Also new were pull-style exterior door handles. The 1954 was a premium version of a standard 1950s size body. The six cylinder models were supplanted in favor of the popular FirePower Hemi V8. The standard model had a 145 kW  output while the DeLuxe was rated at 175 kW. Although introduced very late in the 1953 model year, all 1954 New Yorkers were available with the new two-speed Powerflite automatic transmission. Fluid Torque Drive and Fluid Matic were dropped. 1954 was the last year the long-wheelbase sedan was offered by Chrysler. Next generation of New Yorkers appeared in 1955 when Chrysler did away with the out of fashion high roofline designs of K.T. Keller and came out with a new sedan. The hemi engine produces 186 kW this year. The Powerflite transmission was controlled by a lever on the instrument panel.\n\nThe base model was dubbed the New Yorker DeLuxe, with the plain New Yorker name dropped. The club coupe was replaced by the Newport two-door hardtop, and a new, higher-priced St. Regis two-door hardtop filled the spot of the former Newport. The sedan, convertible, and Town & Country wagon were still offered. Chrysler christened the 1956 model year\'s design PowerStyle, a product of Chrysler designer Virgil Exner. The New Yorker gained a new mesh grille, leather seats, pushbutton PowerFlite selector, and a 354 cubic inch Hemi V8 producin 209 kW. Chrysler introduced an under-dash mounted 16 2/3 rpm record player, dubbed the Highway Hi-Fi that was manufactured by CBS Electronics. A two-way switch in the dash changed the input for the speaker from the all-transistor radio to the 7-inch record player. The St. Regis two-door hardtop gave a unique three-tone paint job for a higher price and the Town and Country Wagon model was Chrysler\'s most expensive vehicle of 1956. This was the first year for the New Yorker four-door pillarless hardtop. Only 921 convertibles were made. The fifth generation of New Yorkers appeared in 1957 when Chrysler cars were redesigned with Virgil Exner\'s Forward Look. The 1957 New Yorker had a powerful 6.4 L Hemi V8 engine rated at 242 kW.  A total of 10,948 were built, but only 1,049 convertible models. The 1957 models also came with the TorqueFlite 3-speed automatic transmission and a Torsion bar suspension called Torsion-Aire that gave smoother handling and ride quality to the car. The New Yorker also sported fins that swept up from just behind the front doors.\n\nEarly model year production had single headlamps with quad headlamps optional where state regulations permitted them. The single headlamps were dropped later in the year. The forward Look remained intact for 1958 but with new body-side trim, shrunken taillights and 257 kW. The convertible model was still available, with only 666 made.  Sales decreased from last year due to The recession of 1958. The reputation of Chysler cars became tainted because of rust problems caused by rushed production and testing.\n\nNew from Chrysler in 1958 was the introduction of a cruise control system called Auto-Pilot. The New Yorkers in 1959 had a new 6.8 L 261 kW producing Golden Lion V8, new tailfins, new front end, and no Hemi. The FirePower (1G) Hemi ended production and was replaced by the less expensive and lighter wedge head engine.'),
(13, '1950s Lancia Aurelia', 'Aurelia', '1621700771Changing1950SLanciaAurelia.jpg', '1621700772ChangingThumb1950SLanciaAurelia.jpg', 2, 5, 3, 2, 'The very first Aurelias were the B10 berlinas (sedans) released in 1950.  They used a 1754 cc version of V6 engine which produced 42kW. The B21 was released in 1951 with a larger 1991 cc 52 kW producing engine. A 2-door B20 GT coupe appeared that same year. It had a shorter wheelbase and a Ghia-designed, Pinin Farina-built body. The same 1991 cc engine produced 56 kW in the B20. In all, 500 first series Aurelias were produced. The second series Aurelia coupé pushed power up to 60 kW from the 1991 cc V6 with a higher compression ratio and repositioned valves. Other changes included better brakes and minor styling tweaks, such as chromed bumpers instead of the aluminium ones used in the earlier car. A new dashboard featured two larger instrument gauges. The suspension was unchanged from the first series. A new B22 sedan was released in 1952 with dual Webers and a hotter camshaft for 67 kW. The third series appeared in 1953 with a larger 2451 cc version of the engine. The rear of the car lost the tail fins of the earlier series. The fourth series introduced the new de Dion tube rear suspension. The engine was changed from white metal bearings to shell bearings. An open car, the B24 Spider, was introduced at this time (1954 to 1955) and was well received. It was similar to the B20 coupe mechanically, with an 8-inch  shorter wheelbase than the coupe. The fourth series cars were the first Aurelias to be available in left-hand drive; fourth series Aurelias were the first ones to be imported to the US in any number. The fifth series coupe, appearing in 1956, was more luxury-oriented. It had a different transaxle (split case), which was more robust. The driveshaft was also revised to reduce vibration. Alongside the fifth series coupes was a revised open car, the B24 convertible. This differed from the earlier B24 Spider, having roll-up windows, better seating position, and a windscreen with vent windows. In mechanical aspects, the B24 convertible was similar to the coupe of the same series. Power of sixth series Aurelias was down to 84 kW for the 1957 sixth series, with increased torque to offset the greater weight of the later car. The sixth series coupés had vent windows, and typically a chrome strip down the bonnet. They were the most touring oriented of the B20 series. The sixth series B24 convertible was very similar to the fifth series, with some minor differences in trim. Most notably, the fuel tank was in the boot, not behind the seats as it was in the fourth and fifth series open cars. This change, however, did not apply for the first 150 sixth series cars, which were like the fifth series. The sixth series convertibles also featured different seats than either both earlier cars. In 1958 production of Aurelias ended.'),
(14, '1970s Cadillac Seville', 'Seville', '1621700783Changing1970SCadillacSeville.jpg', '1621700783ChangingThumb1970SCadillacSeville.jpg', 2, 3, 1, 4, 'The Seville was introduced in May 1975 as an early 1976 model. The Seville became the smallest and one of the most expensive models in the lineup, turning Cadillac\'s traditional marketing and pricing strategy upside down. Unibody construction included a bolt-on subframe with a rear suspension based on the rear-wheel drive 1968–74 X-body platform. It also featured a rear differential with thicker front subframe bushings. Substantial re-engineering and upgrades from these humble origins earned it the unique designation K-body. Also shared with the X-body platform was part of the roof stamping and trunk floor pan (for 1973 and newer vehicles). Cadillac stylists added a crisp, angular body that set the tone for GM styling for the next decade, along with a wide-track stance giving car a substantial, premium appearance. A wide chrome grille flanked by quadruple rectangular headlamps with narrow parking and signal lamps just below the header panel, while small wrap-around rectangular tail lamps placed at the outermost corners of the rear gave the appearance of a lower, leaner, and wider car. The Seville was Introduced in mid-1975 and billed as the new internationally-sized Cadillac. The Seville was thus more nimble and easier to park, as well as remaining attractive to customers with the full complement of Cadillac features. The Seville was modestly successful. To ensure the quality of the initial production run, the first 2,000 units produced were identical in color (Georgian silver) and options. This enabled workers to ramp up to building different configurations. Total 1976 Seville production was 43,772 vehicles. Early Sevilles produced between April 1975 (a total of 16,355) to the close of the 1976 model year were the first Cadillacs to use the smaller GM wheel bolt pattern (5 lugs with a 4.75 in bolt circle). The first Sevilles shared a minority of components with the X-Body. The rear drums measured 11 in. Starting with the 1977 model year, production Sevilles used the larger 5-lug bolt circle. It also received rear disc brakes. 1975–76 models required a vinyl top due to the roof being originally produced in two parts; the rear section around the C-pillar was pressed especially for Cadillac and a regular X-body pressing was used for the forward parts. Due to customer demand, a painted steel roof was offered in 1977, which required a new full roof stamping. 1977 Seville production increased slightly to 45,060 vehicles. The following year, production increased to 56,985 cars and ended up being the peak production year for the first generation. The engine was an Oldsmobile-sourced 5.7 L V8, fitted with a Bendix/Bosch electronically controlled fuel injection. This system gave the Seville smooth drivability and performance that was usually lacking in domestic cars of this early emissions control era. Power output was 130 kW, gas mileage was 17 MPG in the city and 23 MPG on the highway and performance was good for the era with zero-to-60 mph (97 km/h) taking 11.5 seconds. A diesel 5.7 L LF9 V8 was added in 1978, a first in an American passenger vehicle. The Cadillac Trip Computer Tripmaster was a unique option available midyear during the 1978 and 1979 model years. It replaced the two standard analogue gauges with an electronic digital readout for the speedometer and remaining fuel. It also replaced the quartz digital clock with an LED. The trip computer performed various calculations at the touch of a button on a small panel located to the right of the steering wheel. These measurements included miles to empty, miles per gallon, and a destination arrival time (which needed to be programmed by the driver, to estimate arrival time based on miles remaining). The Seville was the first American automobile to offer full electronic instrumentation. The trip computer proved an unpopular option and was rarely ordered, probably due to its expense. The Seville was manufactured in Iran under the brand name of Cadillac Iran from 1978 by Pars Khodro. This made Iran the only country assembling Cadillacs outside the US. From 1978 the Seville was available with the Elegante package. It added a unique black/silver two-tone exterior paint combination and perforated leather seats in light gray only. Real wire wheels were standard as were a host of other features which were optional or unavailable on the base Seville. In 1979, a second color combination was added, a two-tone copper shade with a matching leather interior.'),
(15, '1940s Chrysler Imperial', 'Imperial', '1621700819Changing1940SChryslerImperial.jpg', '1621700819ChangingThumb1940SChryslerImperial.jpg', 3, 4, 1, 1, 'In 1940 fifth generation of Imperials was launched with single model: Imperial Crown. The standard Imperial line was temporarily discontinued. Two bodystyles were produced, an eight-passenger four-door sedan and an eight-passenger four-door limousine. The two vehicles had a 5 kg weight difference. Hydraulic telescopic shock absorbers were in the front and rear. Two-speed electric windshield wipers were standard. As with all U.S.-built automobiles, production was suspended early in the 1942 model year due to World War II production demands, and did not resume until the 1946 model year. Production of this generation of Imperials stopped in 1948. Three Imperial bodystyles were produced in 1949. The short-wheelbase Imperial was only available as a four-door six-passenger sedan. The 4-door 8-passenger Crown Imperial was available as a sedan, or as a limousine with a division window. Early 1949 Imperial Crowns were actually leftover 1948s. The really new models didn\'t arrive until March 1949. Their styling was sleeker than previous models, yet conservative. Fewer, but heavier bars were used in the cross-hatched grille. The upper and center horizontal pieces wrapped around the front fenders. Rocker panel moldings, rear fender stoneguards, full length lower-window trim, and horizontal chrome strips on the rear fenders, and from the headlights to about halfway across the front doors, were used to decorate the side body.'),
(16, '1980s Buick Skyhawk', 'Skyhawk', '1621700684Changing1980SBuickSkyhawk.jpg', '1621700684ChangingThumb1980SBuickSkyhawk.jpg', 1, 1, 1, 5, 'In the early \'80s first generation Skyhawks were in production. There were few changes for 1980, the last model year for the GM H-body platform, most notably the discontinuance of the five-speed manual transmission as an option. Only the four-speed manual and three-speed automatic transmissions were offered for 1980. The H-body Skyhawk was replaced in the spring of 1981 with the new front-wheel drive Buick Skyhawk, built on General Motors\' J-body platform. However, this new second-generation was not a direct replacement for the original Skyhawk. While the original Skyhawk was a small sporty car, the second-generation model was a line of compact cars that included two- and four-door sedans, a two-door hatchback coupe, and a four-door station wagon. Second generation Skyhawks debuted in February, at the 1982 Chicago Auto Show. The Skyhawk was originally available as a two-door and four-door sedan. The standard engine was a corporate 1.8 liter 122 OHV carbureted four-cylinder (88 hp), with a Brazilian-built 1.8 liter overhead-cam TBI four (84 hp) as an option. A carbureted, 90 hp SOHC two-liter also appeared soon after the Skyhawk went on sale, along with an optional five-speed manual. The Skyhawk was an entry-level compact platform for a luxury brand, Buick, and was a refocused effort from the previous generation introduced. For 1983, the Brazil-built 1.8-liter gained four hp, while the OHV 1.8 and SOHC 2.0 were replaced by a Chevrolet-built OHV 2.0, also with 90 hp. A four-door station wagon was also introduced, Buick\'s first front-wheel drive wagon. The next year there was a minor facelift, with bigger cooling openings and larger bumper rub strips. The 2.0 lost four hp, down to 86. Shortly after the introduction of the \'84s, a turbocharged MPFI version of the Brazilian 1.8 became available on the T-Type model, offering a hefty 112 kW. The turbo T-Type was not available with the five-speed manual. The Skyhawk set a sales record in 1984 with 134,076 built. There was not much change for 1985, but for 1986 a new two-door hatchback was added, in \"Sport\" or T-Type trim. Also, both 1.8s and 2.0s now claimed the same 88 hp. The 1.8-liter engines were replaced by two SOHC multi-port injected 2.0 liter versions for 1987, one naturally aspirated producing 71 kW and one producing 123 kW turbocharged version known as RPO LT3. The OHV two-liter remained, now with 90 hp. For 1988, only Skyhawk Sports remained, and the hatchback was discontinued. There was also a Sport S/E two-door coupe. The OHV and turbocharged engines were no longer available. 1989 was to be the last year of the Skyhawk, but nonetheless the car received updates such as standard electronic fuel injection, better acoustical insulation and body colored door and window frames on the station wagon. A total of 23,366 89s were built, for a total of 499,132 second generation Skyhawks. The Skyhawks were built in Leeds, next of Kansas City, Missouri from 1982 through 1988. For 1989, GM moved Skyhawk production to its Janesville, Wisconsin, assembly plant. Production of the Skyhawk ceased after the 1989 model year. The last Skyhawk rolled off the assembly line on June 16, 1989. The Skyhawk was the last Buick vehicle to offer a manual transmission option.'),
(17, '1960s Jeep Wagoneer', 'Wagoneer', '1621700867Changing1960SJeepWagoneer.jpg', '1621700867ChangingThumb1960SJeepWagoneer.jpg', 3, 8, 1, 3, 'The original Wagoneer is a full-size body-on-frame vehicle that started production in 1962.  Available as both two- or four-door wagons, the two-door could be had as a Panel Delivery model with windowless sides behind the doors and double barn doors in the rear instead of the usual tailgate and roll-down rear window. Early Wagoneers were powered by Willys\' new Tornado SOHC 3.8 L six-cylinder engine. The engine developed 104kW and was noted for being fuel-efficient for its day. Both a 3-speed manual and automatic transmission were offered, each available with either 2WD rear-wheel-drive, or part-time four-wheel-drive without a center differential, but with manually locking front hubs. The Warn hubs were utilized to engage or disengage the front wheels, to switch the drive-train between two-wheel or four-wheel drive mode.  The original Wagoneer featured independent front suspension (IFS) as standard on the rear-wheel drive models and was optional on the four-wheel drive. The Wagoneer\'s IFS used swing axles and torsion bar springs, but they combined with short upper A-arms, tied into the torsion bars at their inner pivot points, such that the swing axles served as the lower control arms in a kind of double wishbone suspension design and the axles are located fore and aft by control links. On the four-wheel-drives, the IFS replaced the standard Dana 27AF axle with a single, center-pivot front axle that allowed the Dana 27 differential to swing with the curb-side half.  Further, all Wagoneers had 11-inch drum-brakes all-around; seat belts were optional, and the 4WD came with a standard compass. Front and rear power take-offs were available for heavy-duty utility applications. Shortly after the introduction of the Wagoneer, in early 1963, Willys Motors changed its name to Kaiser Jeep Corporation. The 1964 models introduced factory-optional air conditioning, as well as a lower-compression 99kW Tornado engine, to remedy cooling problems and pinging at altitude the original had sometimes suffered. While it made less power, it returned greater economy, but this lower-compression version was phased out within a year. As of 1965, all models came with a new standard safety package that included front and rear seat belts, a padded dash and high impact windshield, and a dual braking system. Late-year 1965 Wagoneers were available with the 186kW producing 5.4 L AMC V8 engine, which proved to be a popular option. dditionally, the Tornado engine was replaced by American Motors\' 3.8 L OHV inline six. According to the automotive press this engine was smooth, powerful, reliable and easily maintained, but most likely it was cheaper. Although the independent front suspension was positively reviewed,  the option was not popular and was dropped from production, at least for the 4WD models, in 1965. The 1966 model year also saw the introduction of the more luxurious Super Wagoneer, identified by a new more modern-looking full-width grille.  Initially sporting a higher-performance 201 kW producing version of the AMC V8, fitted with a four-barrel carburetor. With comfort and convenience features not standard or even available on other vehicles of its type at the time - e.g. push-button radio, seven-position tilt steering wheel, ceiling courtesy lights, air conditioning, power tailgate, power brakes, power steering, and console-shifted TH400 automatic transmission – the Super Wagoneer is now widely regarded as the precursor of today\'s luxury estate wagons. Production of the Super Wagoneer ended in 1969, and in total it is believed that 3,989 Super Wagoneers were produced. Between 1967 and 1969, all rear-wheel drive only models, which the four-wheel drives had outsold from the beginning, were discontinued, and from then on all Wagoneers had solid axles and leaf-springs, both front and rear. At the end of 1968, the slow-selling two-door version was also discontinued. From 1968 , Wagoneers were powered by Buick’s 5.7 L 172 kW producing Dauntless V8.'),
(18, '1960s Fiat 500', '500', '1621700621Changing1960SFiat500II.jpg', '1621700621ChangingThumb1960SFiat500II.jpg', 1, 6, 3, 3, 'Replacing the original Nuova in 1960, the D looks very similar to the Nuova, but there are two key differences. One is the engine size (the D features an uprated 499 cc engine producing 17 bhp as standard—this engine is used right through until the end of the L in 1973) and the other is the roof: the standard D roof does not fold back as far as the roof on the Nuova, though it was also available as the Transformable with the same roof as the Nuova. The D also features suicide doors. In New Zealand, where it was locally assembled by Torino Motors, the 500 D was sold as the Fiat Bambina (Italian for baby), a name that is still in use there to describe this car. The 500 Giardiniera (500 K on some markets) estate version of the Fiat 500 is the longest running model. The engine is laid under the floor of the boot to create a flat loading surface. The roof on this model also stretches all the way to the rear, not stopping above the driver and front passenger as it does in other models of the same period. The Giardiniera also features suicide doors. A panel van variant of the Giardiniera (estate) was offered as the Furgoncino. Between 1965 and 1969 the F or Berlina carried the same badging as the D, but the two models are distinguishable by the positioning of their door hinges. The D has suicide doors: the F, produced from June 1965, at last featured front-hinged doors. From 1969 the F was sold alonside the Lusso or L model as a cheaper base model alternative. While the F and L are mechanically very similar, the key differences are the bumpers (the L has an extra chrome nudge bar) and the interior (the F interior is nearly identical to the original 1957 design while the L sports a much more modern look). In September 1968 Fiat put on sale the 500 L or Lusso (tipo 110 F/L), a more richly trimmed and better appointed version of the standard 500 F. Perhaps the most obvious new feature of the 500 L were tubular guards protecting the front bumper and the corners of the rear one. As a result, the car was about 2.4 in longer than the 500 F at 119 in. Other model-specific exterior items were a new Fiat badge at the front, redesigned hubcaps, chrome plastic mouldings covering the roof drip rails, and bright trim around windscreen and rear window. Inside the dashboard was entirely covered in black anti-glare plastic material instead of being bare painted metal, and was fitted with a new trapezoid instrument binnacle replacing the round one used on all other 500 models. The steering wheel was black plastic with metal spokes. The door cards—upholstered in the same pleated pattern leatherette used on the seats—carried redesigned and relocated door handles and new door pockets. More storage space was provided in the form of a tray on the centre tunnel, which like the rest of the floor was covered in carpet rather than rubber mats. Except for radial instead of bias ply tires, from a mechanical standpoint the 500 L was identical to the coeval 500 F.'),
(19, '1960s Austin-Healey Sprite', 'Sprite', '1621700630Changing1960SAustinHealeySprite.jpg', '1621700630ChangingThumb1960SAustinHealeySprite.jpg', 1, 7, 2, 3, 'In the early \'60s Mark I was the only model in  production. In May 1961, was announced and it used the same 948 cc engine (engine code 9CG), but with larger twin 11⁄4 inch SU carburettors, increasing power to 46.5 bhp. A close-ratio gearbox was fitted. The bodywork was completely revamped, with the headlights migrating to a more conventional position in the wings, either side of a full-width grille and a conventional bonnet. Rear had a more modern look, with the added advantages of an opening boot lid and conventional rear bumper bar. The addition of the boot lid required the introduction of squared-off rear wheel arches to retain enough metal in the rear structure to give good rigidity. The result was a much less eccentric-looking sports car, though at the expense of some 100 lbs extra weight.  In contrast to the frogeye, the later cars are often collectively referred to as square-bodied Sprites by enthusiasts. In October 1962 Sprites were given a long-stroke 1098 cc engine (engine code 10CG). A strengthened gearbox with Porsche (baulk-ring) synchromesh was introduced to cope with the extra power – 56 bhp. Front disc brakes were also introduced at the same time and wire wheels became an option. 31,665 Mark II Sprites were made. The Mark III Sprite still had a 1098 cc, but the engine had a stronger block casting, and the size of the crankshaft main bearings was increased to two inches (engine code 10CC). A new (slightly) curved-glass windscreen was introduced with hinged quarterlights and wind-up side windows. Exterior door handles were provided for the first time, with separate door locks. Though the car could now be secured, with a soft-top roof the added protection was limited. The rear suspension was modified from quarter-elliptic to semi-elliptic leaf springs, which gave a more comfortable ride for a near-negligible weight penalty as well as providing additional axle location, the upper links fitted to the quarter-elliptic models being deleted. 25,905 Mark III Sprites were made. The next upgrade was presented at the London Motor Show in October 1966. Besides receiving the larger 1275 cc engine, the Mark IV had several changes which were more than cosmetic. Most notable is the change from a removable convertible top, which had to be stowed in the boot, to a permanently affixed, folding top of greatly improved design, which was much easier to use. Separate brake and clutch master cylinders were fitted, as car manufacturers\' thoughts began to turn to making their products safer. On US market versions the larger engine sacrificed some of its performance from 1968 on, through the use of smog pumps and other modifications to comply with federal emission control requirements. 1969 was the final year the Sprite was exported to the US. At the same time reversing lamps were made a standard fitment and the cars\' electrical system was switched to negative earth and powered by an alternator rather than a dynamo. This was also the first year that reclining seats were fitted. '),
(20, '1960s Volkswagen Type 3', 'Type 3', '1621700639Changing1960SVolkswagenType3.jpg', '1621700639ChangingThumb1960SVolkswagenType3.jpg', 1, 9, 4, 3, 'Volkswagen Type 3 production was launched in 1961 as 1500 Notchback, a variant that represented three-box styling in a notchback saloon body. The estate wagon-bodied Variant (marketed as the Squareback in the USA) followed, with the first cars produced in February 1962. The Fastback, or TL version, a fastback coupe, arrived in August 1965. The Type 3 also featured wall-to-wall carpeting, and was available with air conditioning in the US. Volkswagen of America began importing the Type 3 in 1966 in the Squareback and Fastback but not the Notchback configurations. In 1968, the Type 3 E (Einspritzung)  became the first German automobile in series production with electronic fuel injection (Bosch D-Jetronic) as standard equipment. For the 1968 model year, 1969 in the USA, a three-speed fully automatic transaxle became available, noted for extremely low internal friction. With the automatic came CV-jointed independent rear suspension (IRS), replacing the swing axle (also IRS) set-up. For 1969, the CV-jointed rear axle was standard with both automatic and manual transmissions.');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roleName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roleName`) VALUES
(1, 'Staff member'),
(2, 'Community member'),
(9, '2');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `sizeName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `sizeName`) VALUES
(1, 'Small'),
(2, 'Midsize'),
(3, 'Large');

-- --------------------------------------------------------

--
-- Table structure for table `sortingcategories`
--

CREATE TABLE `sortingcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sortingcategories`
--

INSERT INTO `sortingcategories` (`id`, `name`) VALUES
(1, 'Sort by name ascending'),
(2, 'Sort by name descending'),
(3, 'Sort by epoch ascending'),
(4, 'Sort by epoch descending');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subjectName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subjectName`) VALUES
(1, 'Compliment'),
(2, 'Complaint'),
(3, 'Suggestion'),
(4, 'Something else');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roleId` int(11) NOT NULL,
  `locked` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `emailAddress`, `username`, `password`, `roleId`, `locked`) VALUES
(1, 'Donald Jay', 'Rickles', 'seaman26@gmail.com', 'Seaman26', '1c400c62f998d2e48d2074414ded13c7', 2, NULL),
(2, 'John', 'Carson', 'heresjohnny@gmail.com', 'johnnyCarson25', '04a7b9fb3184df8baafce00ab37472e5', 1, NULL),
(3, 'Annie', 'Hall', 'anniehall77@gmail.com', 'annieHall77', '8b7ac97b914a9580222795407eae55fd', 2, NULL),
(4, 'Ed', 'McMahon', 'eddmcmahon1923@gmail.com', 'Eddie1923', '46da58f640d04470ad8498e04985e8a7', 2, '1'),
(5, 'Joan', 'Embery', 'joanembery49@gmail.com', 'joanEmbery49', 'ceb1831b1bbbb2c045d064c47a134354', 2, NULL),
(13, 'Frank', 'Sinatra', 'franksinatra@gmail.com', 'frankiE15', 'c1646933914a0a47f129c9db5bcbfe19', 1, NULL),
(14, 'Clint', 'Eastwood', 'clinteastwood@gmail.com', 'clintiE30', '9eec54dd4b24dce5878b8e320d9e77e7', 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wrongsigninginattempts`
--

CREATE TABLE `wrongsigninginattempts` (
  `id` int(11) NOT NULL,
  `dateAndTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wrongsigninginattempts`
--

INSERT INTO `wrongsigninginattempts` (`id`, `dateAndTime`, `userId`) VALUES
(30, '2021-06-06 07:37:25', 2),
(31, '2021-06-06 07:47:32', 13),
(32, '2021-06-06 07:49:16', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorinformation`
--
ALTER TABLE `authorinformation`
  ADD PRIMARY KEY (`pieceOfInformationId`);

--
-- Indexes for table `authorinformation2`
--
ALTER TABLE `authorinformation2`
  ADD PRIMARY KEY (`pieceOfInformation2Id`),
  ADD KEY `pieceOfInformationId` (`pieceOfInformationId`);

--
-- Indexes for table `carouseldata`
--
ALTER TABLE `carouseldata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `reportId` (`reportId`);

--
-- Indexes for table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epochs`
--
ALTER TABLE `epochs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footerlinks`
--
ALTER TABLE `footerlinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menudata`
--
ALTER TABLE `menudata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjectId` (`subjectId`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reportId`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `sizeId` (`sizeId`),
  ADD KEY `manufacturerId` (`manufacturerId`),
  ADD KEY `countryId` (`countryId`),
  ADD KEY `epochId` (`epochId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sortingcategories`
--
ALTER TABLE `sortingcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `emailAddress` (`emailAddress`),
  ADD KEY `roleId` (`roleId`);

--
-- Indexes for table `wrongsigninginattempts`
--
ALTER TABLE `wrongsigninginattempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorinformation`
--
ALTER TABLE `authorinformation`
  MODIFY `pieceOfInformationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `authorinformation2`
--
ALTER TABLE `authorinformation2`
  MODIFY `pieceOfInformation2Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `carouseldata`
--
ALTER TABLE `carouseldata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `epochs`
--
ALTER TABLE `epochs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `footerlinks`
--
ALTER TABLE `footerlinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menudata`
--
ALTER TABLE `menudata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `reportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sortingcategories`
--
ALTER TABLE `sortingcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wrongsigninginattempts`
--
ALTER TABLE `wrongsigninginattempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authorinformation2`
--
ALTER TABLE `authorinformation2`
  ADD CONSTRAINT `authorinformation2_ibfk_1` FOREIGN KEY (`pieceOfInformationId`) REFERENCES `authorinformation` (`pieceOfInformationId`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`reportId`) REFERENCES `reports` (`reportId`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `contributions`
--
ALTER TABLE `contributions`
  ADD CONSTRAINT `contributions_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`subjectId`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`epochId`) REFERENCES `epochs` (`id`),
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`sizeId`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `reports_ibfk_3` FOREIGN KEY (`countryId`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `reports_ibfk_4` FOREIGN KEY (`manufacturerId`) REFERENCES `manufacturers` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `roles` (`id`);

--
-- Constraints for table `wrongsigninginattempts`
--
ALTER TABLE `wrongsigninginattempts`
  ADD CONSTRAINT `wrongsigninginattempts_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
