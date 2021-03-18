-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Mar 2021 pada 10.46
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cctvku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti`
--

CREATE TABLE `bukti` (
  `id_bukti` int(11) NOT NULL,
  `id_checkout` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_akun` varchar(100) NOT NULL,
  `nomor_akun` int(11) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_trans` varchar(100) NOT NULL,
  `bukti_trans` varchar(255) NOT NULL,
  `is_processed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkout`
--

CREATE TABLE `checkout` (
  `id_checkout` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `deadline` varchar(255) NOT NULL,
  `is_upload` int(11) NOT NULL,
  `no_resi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir_propinsi`
--

CREATE TABLE `ongkir_propinsi` (
  `kd` varchar(50) NOT NULL,
  `propinsi1` varchar(100) NOT NULL,
  `propinsi2` varchar(100) NOT NULL,
  `ongkir_jne` varchar(15) NOT NULL,
  `ongkir_pos` varchar(15) NOT NULL,
  `ongkir_tiki` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir_propinsi`
--

INSERT INTO `ongkir_propinsi` (`kd`, `propinsi1`, `propinsi2`, `ongkir_jne`, `ongkir_pos`, `ongkir_tiki`) VALUES
('00b48517fe98bdec50de6cab0048abe6', 'Kepulauan Riau', 'Riau', '20000', '', ''),
('014d910074efdb6a30a75679abdc03f9', 'Kalimantan Timur', 'Maluku', '50000', '', ''),
('01aff6db685b2f3b746e9d50f61a99cc', 'Maluku', 'Jawa Timur', '37000', '', ''),
('03ce660e45ef54e5c4eb96b2b7a7d37f', 'Jambi', 'Riau', '41000', '', ''),
('03d5dad5df08738ec55b46c7e0799334', 'Sumatera Selatan', 'Kepulauan Riau', '39000', '', ''),
('042928603630fa80c7d8c961f99a2673', 'DKI Jakarta', 'Kalimantan Tengah', '43000', '', ''),
('042c75e5b7ebaaeee0a657b6ea65d5bc', 'DI Yogyakarta', 'Lampung', '69000', '', ''),
('0457f0f0c7646bceb93c1db84751c555', 'Kalimantan Tengah', 'Maluku', '30000', '', ''),
('04ad5379b2589bfdf375bb9a6d521f93', 'Kepulauan Bangka Belitung', 'Kepulauan Bangka Belitung', '28000', '', ''),
('051bbc2ca1096b759080711b1482063a', 'Kalimantan Barat', 'Sumatera Utara', '38000', '', ''),
('054b63feef4168c688881ba283f4cdeb', 'Sumatera Selatan', 'Nusa Tenggara Barat', '33000', '', ''),
('05546302d8f4591331749f24e9896c2f', 'Jawa Tengah', 'Aceh', '57000', '', ''),
('057719c4c96dbc0e44ff98b3fde356c8', 'Nusa Tenggara Timur', 'Kepulauan Riau', '39000', '', ''),
('05ebe09171cff19d56ece1a6d1466950', 'Jawa Tengah', 'Sumatera Utara', '18000', '', ''),
('066e48975b399f7ccd267380192350b8', 'Gorontalo', 'Kalimantan Selatan', '21000', '', ''),
('06f2e21974aa6346dc7d1072fa1d39ba', 'Kalimantan Utara', 'Lampung', '45000', '', ''),
('08243db2a09f1e8965ba8403e2e79d25', 'DI Yogyakarta', 'Kalimantan Timur', '94000', '', ''),
('088b47ffde6e68090cc427c4f7b2c84b', 'Sulawesi Tenggara', 'Jambi', '39000', '', ''),
('08cedbb25ffea72192edbe411fb98f43', 'Papua', 'Kalimantan Barat', '42000', '', ''),
('09c1006e199139a3a53036aa15f457d6', 'Sulawesi Tengah', 'Bengkulu', '54000', '', ''),
('09cc6ff4932ef3620bd723c30f6214ad', 'Lampung', 'Bali', '45000', '', ''),
('0a34249da08ee5fc763f40047ec17d97', 'Kepulauan Bangka Belitung', 'Kalimantan Tengah', '33000', '', ''),
('0a954275f8d543d8bc5fa405a2c355fb', 'Jawa Tengah', 'Maluku', '53000', '', ''),
('0abc8e45504fa7a8b309999ac29452f9', 'Kepulauan Riau', 'Papua Barat', '77000', '', ''),
('0b1e089de476d58fde612130be2673bf', 'Kalimantan Barat', 'Kalimantan Barat', '17000', '', ''),
('0b39ec3229c355272c6bbba1426d6640', 'Aceh', 'Sulawesi Barat', '87000', '', ''),
('0b76cae03f0c168598bf357aff5003da', 'Aceh', 'Bali', '67000', '', ''),
('0b8f35ffb85d1d7b05a9e68a94c18f54', 'Kalimantan Timur', 'Sulawesi Barat', '37000', '', ''),
('0c14c09a636a69e3c3272ef768688d33', 'Kalimantan Selatan', 'Jawa Timur', '41000', '', ''),
('0caf1d6563cdd3101d93fb56b882d607', 'Jawa Barat', 'Kalimantan Timur', '44000', '', ''),
('0dec97ba0cdd73194297404f86d3a010', 'Banten', 'Jawa Timur', '19000', '', ''),
('0e2d6a199a374332fc139c02fbd25270', 'Sulawesi Utara', 'Bengkulu', '51000', '', ''),
('0e826ced1e6b9b69c61a09a0b6366ee1', 'Lampung', 'Sumatera Barat', '15150', '', ''),
('0fa367b29dd2216143cb1d1edafaeafb', 'DI Yogyakarta', 'Kalimantan Selatan', '37000', '', ''),
('0fc84a7064e8e05b7aa76ffc67634e2e', 'Kalimantan Timur', 'Riau', '149000', '', ''),
('1014d8a649b8c05c3ad92dff51658439', 'Kepulauan Bangka Belitung', 'Kepulauan Riau', '39000', '', ''),
('1072d288cddbc735b848d40e5b765db6', 'Maluku Utara', 'Nusa Tenggara Timur', '39000', '', ''),
('108dde68b2690a603cab31085d54e498', 'Papua Barat', 'Riau', '84000', '', ''),
('10be45194e795cf68525450e914d5469', 'Maluku Utara', 'Kepulauan Riau', '78000', '', ''),
('111d16e4283cb9505c23b7abf9eb577a', 'Lampung', 'Jawa Timur', '40000', '', ''),
('129b7f11b5a6889fa2b43bb69b371f41', 'Nusa Tenggara Timur', 'Sulawesi Barat', '33000', '', ''),
('137fbcd49026791c5c7ace7fc509d64a', 'Sulawesi Tenggara', 'Sumatera Barat', '30000', '', ''),
('13ccd97334cd7dd781c1183c2c9a0d33', 'Kalimantan Utara', 'Kalimantan Utara', '20000', '', ''),
('14f3ad019a8f4466b3b6259e8f32f3c5', 'Papua', 'Papua', '45000', '', ''),
('1592de46927c8e66ab011764661d495d', 'Kalimantan Timur', 'Sulawesi Tengah', '9000', '', ''),
('15d5647020106d5bd84e68c2fd318804', 'Sulawesi Tengah', 'Lampung', '51000', '', ''),
('15ec6ae92c7fee250e586a529e3b6ecb', 'Sulawesi Tenggara', 'Kalimantan Tengah', '72000', '', ''),
('15febc6bf582e43a4349bbf6e499e47d', 'Kalimantan Tengah', 'Nusa Tenggara Barat', '49000', '', ''),
('16069b44d509f5fe959fc7fccd0177a7', 'Sulawesi Selatan', 'Maluku', '32000', '', ''),
('1667508f58fb9b114a14c85a351765d8', 'Nusa Tenggara Timur', 'Aceh', '80000', '', ''),
('16a718882638d3153e4b570fa04a889d', 'Banten', 'Kalimantan Utara', '47000', '', ''),
('17ec4a74420bb18e1fa39075cb7f8450', 'Maluku Utara', 'Kalimantan Barat', '36000', '', ''),
('1898c8bf6bae62bc0c34ff831252ce87', 'Gorontalo', 'Papua Barat', '92000', '', ''),
('18f733dd2108d756513c3d2698db721e', 'Papua', 'Papua Barat', '49000', '', ''),
('196eb9feff5f9ee0719578d467b3754f', 'Kepulauan Riau', 'Jawa Tengah', '47000', '', ''),
('1972e3f27b64c2d143e11eb91fdc219a', 'Kalimantan Selatan', 'Sumatera Barat', '13000', '', ''),
('1b076ef78a5b0dd00e4ac15f18c5e749', 'Nusa Tenggara Timur', 'Jawa Barat', '41000', '', ''),
('1b3d0831e6afdd6697597be73c582899', 'DI Yogyakarta', 'Jawa Tengah', '20000', '', ''),
('1bed30722ec0a873a825d842ce5f765d', 'Kalimantan Timur', 'Jawa Timur', '21000', '', ''),
('1c14334336216487d60bf181ed484d50', 'Sulawesi Tengah', 'Sulawesi Barat', '24000', '', ''),
('1cb0eaca9e8cdc92e602b5e7e4457aff', 'Papua Barat', 'Lampung', '55000', '', ''),
('1df76c3c7b01b7a5214ba56b7d5fa4fb', 'Sulawesi Utara', 'Sumatera Utara', '49000', '', ''),
('1e0e2cf2fda155a21c7264e1917e217e', 'Gorontalo', 'Aceh', '97000', '', ''),
('1f09344affdddb75c1bfb56a4d8a0d76', 'DI Yogyakarta', 'Bengkulu', '20000', '', ''),
('1f886eee288bd3f20c5af467eeae3e53', 'Sulawesi Selatan', 'Jambi', '70000', '', ''),
('20348584c2ea016f1f097db5799b78da', 'Kepulauan Riau', 'Sumatera Utara', '44000', '', ''),
('20730507b8a9209590f8f5976eb0229b', 'Sulawesi Tenggara', 'Sulawesi Tengah', '44000', '', ''),
('20e390a7d6c672cd9e1c1c80867c9f8e', 'Sulawesi Selatan', 'Kalimantan Tengah', '36000', '', ''),
('2195275f9ce8d3a3b16dd3e0218904f2', 'Sulawesi Utara', 'Riau', '83000', '', ''),
('22c2ec16015fdf72d7d216133487bb9f', 'Papua Barat', 'Kalimantan Tengah', '36000', '', ''),
('237960823f1379ab95132fb49bd72c11', 'Papua Barat', 'Papua Barat', '66000', '', ''),
('240a9e6a431544e99e3f74e8e1a61ddf', 'Kepulauan Bangka Belitung', 'Jawa Tengah', '38000', '', ''),
('242f4a5ab370f09b5b6ece600852f6f5', 'DI Yogyakarta', 'Kalimantan Utara', '73730', '', ''),
('252e43399380dad4a3b26f709e56a7c5', 'Maluku Utara', 'Maluku', '58000', '', ''),
('25686f559c94888e0e88102286cc1eed', 'Kalimantan Timur', 'Papua Barat', '71000', '', ''),
('26369fff56368c18625f6eb447ca03f1', 'Kepulauan Bangka Belitung', 'Lampung', '46000', '', ''),
('272b25d291c5ca4f021ae6105b546ff5', 'DKI Jakarta', 'Riau', '22000', '', ''),
('276f6dbd6773ce947bc879777af50325', 'Lampung', 'Lampung', '21000', '', ''),
('27c0357d31ace27e9c6adfec92356847', 'Sumatera Selatan', 'Kalimantan Tengah', '51000', '', ''),
('28157f1ed30998b8504581a5afe21633', 'Papua', 'Nusa Tenggara Timur', '45000', '', ''),
('286a7897f1f062215bbcae43e125b769', 'Papua', 'Lampung', '75000', '', ''),
('28dc2014ffeb1e29c3229232340391da', 'Banten', 'Sulawesi Utara', '47000', '', ''),
('2923c2c8d74f0601104f42b5164be111', 'Kalimantan Utara', 'Jawa Tengah', '51000', '', ''),
('2a8aed7407f0c6ecdbab7bfa263c94b8', 'Bali', 'Jawa Timur', '13000', '', ''),
('2ad3d0e4fb350345f107fd87fec65d65', 'Maluku Utara', 'Kepulauan Bangka Belitung', '66000', '', ''),
('2ae12c281c874e23d67eb3e88a642f8a', 'Kepulauan Riau', 'Sumatera Barat', '162000', '', ''),
('2bce29c46dea52803d131a2a0705b43c', 'Sumatera Selatan', 'Jambi', '29000', '', ''),
('2be9b9b1f7d48fdb0fc11baf4346d791', 'Kepulauan Bangka Belitung', 'Sumatera Selatan', '40000', '', ''),
('2c8d5244b697a8be582be41cecc0e3ff', 'Kalimantan Selatan', 'Kalimantan Barat', '66000', '', ''),
('2e8b703621c6bcaaa5f30831d9fb525d', 'Jawa Tengah', 'Nusa Tenggara Barat', '25000', '', ''),
('2ebf6abc1bbe193f2aa69d67bfb9d4d6', 'DI Yogyakarta', 'Aceh', '63000', '', ''),
('2fd20d92e32d617f1053069393dd1c9d', 'Jambi', 'Aceh', '51000', '', ''),
('3022bfa097f9f578b75bf3551f508127', 'Kepulauan Bangka Belitung', 'Sulawesi Selatan', '51000', '', ''),
('3038ff55313c3b1552b651fb04ef57d8', 'DKI Jakarta', 'Lampung', '37000', '', ''),
('30536bcbd1b778a249a0f59934c6b7ed', 'Kalimantan Utara', 'Sumatera Selatan', '60000', '', ''),
('3057d79b23cb7543354269db40e60e48', 'Maluku Utara', 'Aceh', '93000', '', ''),
('306398ada1f844b6aaf78c95e0e445ba', 'Sulawesi Tenggara', 'Riau', '69000', '', ''),
('30713e4433e00326593cf0c72e487691', 'Jawa Barat', 'Riau', '25000', '', ''),
('311a1c6d8e83ac128d8a582ce27e5376', 'Banten', 'Jawa Barat', '11000', '', ''),
('3120b510dc84a4eedc9841231ddeba4b', 'Banten', 'Sumatera Barat', '45000', '', ''),
('316614d678b78b17df80ec30f7951126', 'Sumatera Selatan', 'Kalimantan Selatan', '32000', '', ''),
('3167ee1dad531f97c509bd659aa85b2c', 'Sumatera Selatan', 'Bali', '25000', '', ''),
('317c6dc0a04fabe641b3758e9882ae0e', 'Kalimantan Barat', 'Maluku', '66000', '', ''),
('31e87530d0b49d64fdfe39709a701913', 'Kalimantan Utara', 'Nusa Tenggara Barat', '56000', '', ''),
('3205fa2ce85a1b7ae0e36b86a9fd142b', 'Kepulauan Bangka Belitung', 'Bali', '21000', '', ''),
('32d1a090bb1e7b041f3ee09820ff9192', 'Sulawesi Barat', 'Nusa Tenggara Barat', '36000', '', ''),
('33655d6186c419d269105de5c6b2c0f4', 'Sulawesi Selatan', 'Sumatera Utara', '80000', '', ''),
('336b65235e6e409de982546d51af18a6', 'Gorontalo', 'Kalimantan Barat', '27000', '', ''),
('33bd7b7b9ecdd2db9641ca37b80f600e', 'Kalimantan Selatan', 'Aceh', '63000', '', ''),
('33e37ca34765a0c8bd97b3bd1612b66d', 'Kalimantan Utara', 'Kepulauan Riau', '52000', '', ''),
('3466027c9ab8b00af2051c2ae2205424', 'Jawa Barat', 'Sulawesi Barat', '59000', '', ''),
('35197e8a50fe02867a05c62693edf5b8', 'Sulawesi Tenggara', 'Jawa Barat', '32000', '', ''),
('35d28bbffc4b7e6d83fdb9e4120ab681', 'Kalimantan Selatan', 'Sulawesi Barat', '24000', '', ''),
('369755dabea0f7c18e872e111966acce', 'Kepulauan Bangka Belitung', 'Sumatera Utara', '24000', '', ''),
('36c1327d720d7667da2f4b7a4f49a5e0', 'Papua', 'Jawa Timur', '52000', '', ''),
('37312cd72d6b9a55b31accfc026b44fb', 'Kalimantan Tengah', 'Riau', '53000', '', ''),
('374c99a187bd630a29fc93f72fce9f5b', 'DKI Jakarta', 'Maluku', '51000', '', ''),
('37b28a579da8e494a6e528bece8e288b', 'Maluku Utara', 'Bengkulu', '72000', '', ''),
('382415c1f3803763878aaf7cdc6d5153', 'Sulawesi Tengah', 'Kalimantan Barat', '44000', '', ''),
('38754ea69691c0e48a104bdccf60e6ed', 'DI Yogyakarta', 'Sumatera Selatan', '69000', '', ''),
('38d786c6d3ac146d0c9a6a77885683e6', 'Sulawesi Selatan', 'Nusa Tenggara Timur', '118000', '', ''),
('39bd8b96df2c332c67f6f23f4d51a934', 'Banten', 'Sumatera Utara', '11000', '', ''),
('3aeb0a8df2be49e9d60ed6e3cdb9917f', 'Kalimantan Selatan', 'Sulawesi Tengah', '55000', '', ''),
('3b1206af7f151291afa7f69d5f25d6b4', 'Maluku Utara', 'Jawa Barat', '60000', '', ''),
('3b1f1cf330ab523dc059fff925fc6d8d', 'Kalimantan Utara', 'Sumatera Utara', '46000', '', ''),
('3b968603526e29a134ade827b3b457ad', 'DKI Jakarta', 'Papua Barat', '51000', '', ''),
('3c33fdd07b7daa2113ed44b0ebdec25e', 'Kalimantan Utara', 'Kalimantan Timur', '36000', '', ''),
('3c5e7d326fcea868ad8b68fb153c3994', 'Gorontalo', 'Jawa Barat', '32000', '', ''),
('3cc46d7552b05991c7646d7e787b1a6b', 'Jambi', 'Sumatera Utara', '36000', '', ''),
('3ce6e8293e7ccb01e9c8152fc10db9cd', 'Papua Barat', 'Nusa Tenggara Barat', '45000', '', ''),
('3d9d2ffb8163d181e324f89be5566152', 'DKI Jakarta', 'Jambi', '22000', '', ''),
('3da550995416b68263686e0a7b890d68', 'Kalimantan Selatan', 'Sumatera Utara', '44000', '', ''),
('3dae61541bf59abc765fdecf6854b698', 'Jambi', 'Sulawesi Barat', '42000', '', ''),
('3e155c74fef184903570da0041351481', 'Jambi', 'Kalimantan Barat', '52000', '', ''),
('3e201a09f5f39f5da127faaa100bd774', 'Kepulauan Riau', 'Kalimantan Timur', '43000', '', ''),
('3e429c754a3c5d6256b0f5514e2e1bf3', 'Sumatera Barat', 'Jawa Timur', '16000', '', ''),
('3eb0b3de4c3a5c7be25cf569d647e3d8', 'Kepulauan Bangka Belitung', 'Sulawesi Utara', '45000', '', ''),
('3f1f23895bcfce32542aab1e7dc7ec4f', 'DI Yogyakarta', 'Kepulauan Riau', '37000', '', ''),
('40230dff41ecef4b3ffdf90675ff65a1', 'Sulawesi Utara', 'Jawa Barat', '49000', '', ''),
('404980284ae66525df274f05ee8eb8d4', 'DI Yogyakarta', 'Riau', '77000', '', ''),
('405656da486c7bb2ca77f58b1636fd06', 'Jawa Barat', 'Nusa Tenggara Barat', '37000', '', ''),
('407030b17785634df0c664f0da0b35b3', 'Maluku', 'Riau', '78000', '', ''),
('407b209343603e00e72e95668f90ee88', 'Kalimantan Timur', 'Kalimantan Tengah', '80000', '', ''),
('415c7a7255366a55a0b8b904d3c469a1', 'Sulawesi Selatan', 'Kalimantan Barat', '59000', '', ''),
('4181b4543f3cc20562ba26293f4776f9', 'Kalimantan Selatan', 'Kalimantan Selatan', '13000', '', ''),
('423f8091561415fc086011a0082fe0ae', 'Sulawesi Selatan', 'Banten', '25000', '', ''),
('4266175812cfdfa13d4f0625ee59afac', 'Jawa Tengah', 'Kalimantan Barat', '51000', '', ''),
('428c1c847016ae0126423f8b67922611', 'Lampung', 'Riau', '50000', '', ''),
('42cad03ba665c063440135e9b18ec0b0', 'Kepulauan Riau', 'Aceh', '60000', '', ''),
('42deadecce3becac344bef44f7d340b1', 'Kalimantan Selatan', 'Kepulauan Riau', '48000', '', ''),
('4328d9557786167fe0c561e589e4b322', 'Banten', 'Kepulauan Riau', '28000', '', ''),
('439741b1dad0a157ce9861b255b02bb9', 'Sulawesi Tenggara', 'Banten', '29000', '', ''),
('4416ece6c9997883ffcd30fd986d9ecd', 'Sumatera Barat', 'Maluku', '53000', '', ''),
('44a560543b134c7aad944da27426fe97', 'Maluku Utara', 'Lampung', '69000', '', ''),
('44f33d0dea30b4febca15d4b2bc8026c', 'Kepulauan Bangka Belitung', 'Papua', '72000', '', ''),
('45ca8e1af9308ac2597bb5d41b52ebdd', 'Jawa Barat', 'Sumatera Utara', '59000', '', ''),
('4603b5511b9b9ef51e3e450e2562047c', 'Banten', 'Nusa Tenggara Barat', '37000', '', ''),
('461da3ab2749fef26f3d75a8c306c20d', 'Nusa Tenggara Timur', 'Kalimantan Barat', '3000', '', ''),
('462218c3de47e33328ab0a8c7ebbc7c1', 'Kepulauan Bangka Belitung', 'Riau', '15000', '', ''),
('46fc1a7da97a6df692982d0678c1c304', 'Lampung', 'Sumatera Utara', '34000', '', ''),
('471f37fe25bc019ebe698be33617a831', 'Nusa Tenggara Timur', 'Kalimantan Tengah', '6000', '', ''),
('48bb966a53024007f8be303f14b298a6', 'Gorontalo', 'Papua', '15000', '', ''),
('48e482840d33aebb2738ba8f98fcf314', 'Maluku Utara', 'DI Yogyakarta', '52000', '', ''),
('4935ee8e02dde2bf416b1e616d28aef4', 'Banten', 'Kalimantan Timur', '65000', '', ''),
('496219652f4b3a91dee5030a0d7f0b16', 'Sulawesi Barat', 'Maluku', '3000', '', ''),
('4964bca287043deaeefe3c5b4b6b9142', 'DI Yogyakarta', 'Sulawesi Utara', '55000', '', ''),
('49809d053d37369839c40468435b0566', 'Jambi', 'Kalimantan Selatan', '54000', '', ''),
('49878477c6b7ae0494352ec1021b583a', 'Kalimantan Selatan', 'Papua Barat', '220000', '', ''),
('4a05f7fc524209e8848237731762babe', 'Gorontalo', 'Sulawesi Selatan', '19000', '', ''),
('4a845b8dfcfd291ec498428c6630d17a', 'Kalimantan Utara', 'Jawa Barat', '42000', '', ''),
('4bbe8a2c5f39428ea65d885239312682', 'Sumatera Selatan', 'Bengkulu', '28000', '', ''),
('4c5f20edd8433dbb5b5cf26ff577c5dc', 'Kalimantan Utara', 'Kalimantan Barat', '99000', '', ''),
('4c99bdf1044e8f1b9bfee292c24668d9', 'Maluku Utara', 'Bali', '45000', '', ''),
('4cd5bee0aa0022d36f70286b78395600', 'DKI Jakarta', 'Sumatera Utara', '33000', '', ''),
('4d2741dc1319f68068e03745939dbc60', 'DKI Jakarta', 'Nusa Tenggara Timur', '87000', '', ''),
('4d8621aed72e87d9b7293447aeac84c5', 'Maluku Utara', 'Sulawesi Tenggara', '12000', '', ''),
('4d9e6932f78752d1540e38b21485e839', 'Aceh', 'Sumatera Utara', '30300', '', ''),
('4dea6a1ff0f0090fe36b7f661d1cb8e9', 'Maluku', 'Sumatera Utara', '84000', '', ''),
('4e6c32bf09810d2b6adbb9700dffadf5', 'Jawa Barat', 'Lampung', '19000', '', ''),
('4e79329e6eee5a2d1f18cc3fc9cfd1d4', 'Nusa Tenggara Timur', 'Bengkulu', '58000', '', ''),
('4e8a2d5d68cbfb26b1cc38eb4d8a9f92', 'Kepulauan Bangka Belitung', 'Sulawesi Barat', '60000', '', ''),
('4ead799dfcb65892e10638721ce2810d', 'Aceh', 'Nusa Tenggara Barat', '54000', '', ''),
('4ef1fdbe437737a39828c24540c7bc06', 'Kalimantan Selatan', 'Bali', '37000', '', ''),
('4f03ef2db5622c3e9100ca18b0887d09', 'Jawa Tengah', 'Lampung', '42000', '', ''),
('4f092933d2cb07fa51a742d45964e139', 'Kepulauan Bangka Belitung', 'Kalimantan Utara', '42000', '', ''),
('4f190c0fe45194077fc9d23f75b5eb56', 'Kalimantan Utara', 'Sulawesi Tengah', '6000', '', ''),
('4f48f819be4cd0523f0aff3dca632c00', 'Sulawesi Selatan', 'Sumatera Selatan', '32000', '', ''),
('4f501968fb1d50088cc49d0260b1991c', 'Gorontalo', 'DKI Jakarta', '30000', '', ''),
('4f5a9f29dd334c01e0429a98939a6bd8', 'Sulawesi Tengah', 'Sumatera Utara', '30000', '', ''),
('4f84bc234b5395c80c8b676f42f44d6b', 'Sulawesi Selatan', 'Sulawesi Utara', '22000', '', ''),
('4f92a7d912b2c140ff85a56b369eaaa4', 'Gorontalo', 'Sumatera Barat', '78000', '', ''),
('50229295ad6296e0e84bc5eec71ab09e', 'Bengkulu', 'Sulawesi Barat', '66000', '', ''),
('50be48bf83a482c1489d68670d04a5db', 'Kalimantan Utara', 'Sulawesi Utara', '3000', '', ''),
('514eac1a3f41adbda19f68a14d356474', 'DKI Jakarta', 'Bengkulu', '25000', '', ''),
('52137dba9afd3bacbd2dc88ca396c7d0', 'Bengkulu', 'Bengkulu', '28000', '', ''),
('52659dfc980536c8a5c1ff55064b266e', 'Kalimantan Utara', 'Nusa Tenggara Timur', '15000', '', ''),
('527d67d46a5e7b685b56f742274fcec6', 'Sulawesi Tenggara', 'Jawa Tengah', '30000', '', ''),
('533742318a43c710377ea71f6d9223c4', 'Jambi', 'Sumatera Barat', '40000', '', ''),
('533cc95fdb2d52d9cf8b16247472ecc6', 'Banten', 'Sumatera Selatan', '19000', '', ''),
('53488f718a47a8f386faf6642b6d3293', 'Papua', 'Riau', '87000', '', ''),
('539a0ff3ae491a187bd7e45fff8c302a', 'Kalimantan Utara', 'Riau', '57000', '', ''),
('539a98c7928cd50ea01edc7b2631ba5a', 'Aceh', 'Kalimantan Tengah', '47000', '', ''),
('53aac7f5d6cdfaa30fa4a1e3e58d4c9f', 'Kalimantan Utara', 'Maluku', '21000', '', ''),
('5414fceb6bc11f05eaf8a93d3cd825b4', 'Sulawesi Tenggara', 'Jawa Timur', '33000', '', ''),
('546fd4597eeebcb6ec7fc237e2e52c06', 'DKI Jakarta', 'Sulawesi Tengah', '77000', '', ''),
('547b6f1768cfaefdc0290692349b6d0c', 'Sulawesi Barat', 'Bali', '39000', '', ''),
('5493d032537ccdfae39c730683e809ed', 'DKI Jakarta', 'Aceh', '51000', '', ''),
('56052a2756cbd8ed493d59227eb831f8', 'Maluku Utara', 'Papua Barat', '3000', '', ''),
('561e909bb2d7b883bfac5b47ba5b749d', 'Sumatera Selatan', 'Kalimantan Barat', '31000', '', ''),
('56a9a117c7539cde1e5f3fa48b6957f6', 'Nusa Tenggara Timur', 'Maluku', '36000', '', ''),
('56ceb0e9992e8559646c50ee44849944', 'Kepulauan Bangka Belitung', 'Sulawesi Tengah', '48000', '', ''),
('574ba24bb4104ecaab98cb069220b1ab', 'Kalimantan Timur', 'Kalimantan Barat', '51000', '', ''),
('585f8e403b9e79a4e18aed11f53a53de', 'Nusa Tenggara Timur', 'Sulawesi Tengah', '21000', '', ''),
('59b0d45c696c9e100d438b66f2ac084f', 'Gorontalo', 'DI Yogyakarta', '42000', '', ''),
('59dd8b049ff0db216b6369f362353ff0', 'Maluku Utara', 'Sulawesi Selatan', '33000', '', ''),
('5a2e99c228e2718b6d2ddbdeb632cc69', 'DKI Jakarta', 'Kalimantan Timur', '58000', '', ''),
('5a6387556bc6925f214f94b74da351b9', 'Nusa Tenggara Timur', 'Papua Barat', '42000', '', ''),
('5af994e82f150d679e1540918021892b', 'Sulawesi Selatan', 'Lampung', '64000', '', ''),
('5b69d5033ae22d8db4dfa717b1f27fb9', 'Sulawesi Selatan', 'Aceh', '118000', '', ''),
('5c09185ee6400dfa1bfa76287cbf3047', 'Jawa Tengah', 'Kalimantan Tengah', '40000', '', ''),
('5c0ca6df249930372e9c2d3b6107e551', 'Kepulauan Riau', 'Bali', '44000', '', ''),
('5c2bcb5029957f613eaed8a3c055322e', 'Nusa Tenggara Timur', 'Riau', '28000', '', ''),
('5c32a769665dbcf01d19de561b06bb51', 'Sulawesi Utara', 'Jawa Tengah', '46000', '', ''),
('5cd5c44626149036659b91bef02ee000', 'Sumatera Selatan', 'Lampung', '40000', '', ''),
('5cea0610828a5c0008b6d5ca38043ff4', 'Maluku Utara', 'Sulawesi Tengah', '18000', '', ''),
('5d847721198208b0dd6bda322bcc05b7', 'Kalimantan Barat', 'Jawa Timur', '44000', '', ''),
('5d92ded6d7464b03998d14500f6cc5c4', 'Papua', 'Sulawesi Utara', '66000', '', ''),
('5dffbbd1ca22e54fbd07d7e34ae197eb', 'Sulawesi Tenggara', 'Papua Barat', '138000', '', ''),
('5e40a3638234cf22a63f56e0495e1926', 'Kepulauan Bangka Belitung', 'Kalimantan Barat', '30000', '', ''),
('5ea0e773b5b044de8efb5b3b9fca3061', 'Maluku Utara', 'Maluku Utara', '121000', '', ''),
('5ea70c694a2db3e4dc251fee991891fb', 'Sulawesi Utara', 'Papua Barat', '50000', '', ''),
('5f27399ee4a7d71cee91c931da14096a', 'Kalimantan Tengah', 'Sumatera Utara', '31000', '', ''),
('5ffb9fcce497e589880a5a67423d8b97', 'Banten', 'Bali', '28000', '', ''),
('601b4cdf145e95aaf691e6a112aa512e', 'Kepulauan Bangka Belitung', 'Jawa Timur', '41000', '', ''),
('60547ba28a80e3443111ed1f38b15060', 'Kalimantan Utara', 'Bali', '21000', '', ''),
('605ead3d55fda05f89203fa65138b418', 'Papua', 'Jawa Barat', '64000', '', ''),
('60cbdd16f142e2fba88ae7f3aca103ff', 'DKI Jakarta', 'Banten', '9000', '', ''),
('63a3a173c437199464c422c8095eb9e6', 'Kalimantan Barat', 'Riau', '14000', '', ''),
('63f48f8b6efe1d3032a2383586859389', 'Papua', 'Bali', '51000', '', ''),
('642b82218be6b6d2940c533981f56bab', 'Kepulauan Riau', 'Bengkulu', '32000', '', ''),
('64663f35055b0d456fce23cab97a37c6', 'Kalimantan Tengah', 'Sulawesi Barat', '27000', '', ''),
('64ddce8ed25c625da4fb82a2502335e2', 'Maluku Utara', 'Papua', '6000', '', ''),
('65166254a167bfd801bc972c5979c92c', 'Kalimantan Selatan', 'Jawa Barat', '30000', '', ''),
('65229caaddb199c662ac7446b4c6825b', 'Jawa Barat', 'Maluku', '51000', '', ''),
('65bee39d646f16104190bbb1292e097f', 'Sulawesi Tenggara', 'Kalimantan Timur', '15000', '', ''),
('65f95ca9d290e9553e2404b23daf5c51', 'Kepulauan Bangka Belitung', 'Bengkulu', '6000', '', ''),
('6603c85dbebb24c51f739392016bb373', 'Jawa Barat', 'Papua Barat', '116000', '', ''),
('666694b9b92a8b1396c76104a3979f4c', 'Banten', 'Kalimantan Selatan', '33000', '', ''),
('667e6665f5fd0ee2cff78bfba1e546c4', 'Banten', 'Lampung', '47000', '', ''),
('66c47d201224e415bdfa66e35bda83aa', 'Jawa Tengah', 'Sumatera Barat', '58000', '', ''),
('6740795ca17b8978d1e1d2c2edb3bff6', 'Maluku Utara', 'Banten', '69000', '', ''),
('67d166389e934ac5133e5479645a3b8b', 'Sulawesi Tengah', 'Sulawesi Tengah', '30000', '', ''),
('6806e2bcad50b50b36e86fb527296e21', 'Sulawesi Utara', 'Nusa Tenggara Barat', '21000', '', ''),
('68ed12eb0b9be7ab84e39bd983aa1d13', 'Nusa Tenggara Timur', 'Bali', '29000', '', ''),
('6911d7e4a38595748fb35df29fc6b7e5', 'Sulawesi Utara', 'Kalimantan Timur', '42000', '', ''),
('69179d5b6b008151120072134d71ff73', 'Banten', 'Jambi', '47000', '', ''),
('696b373bed65da2189132dd91845f8c0', 'Jawa Tengah', 'Sulawesi Barat', '48000', '', ''),
('697a31a30e132124f0e539adec036991', 'Kalimantan Utara', 'Bengkulu', '48000', '', ''),
('6997581482a74ba23c929292321acd70', 'Bengkulu', 'Kalimantan Tengah', '39000', '', ''),
('69b1eec28fe2ff27ccd654497d5b04f9', 'Gorontalo', 'Maluku Utara', '9000', '', ''),
('6a03863e49a15c03df41b948a18ed29a', 'Kalimantan Utara', 'Jawa Timur', '32000', '', ''),
('6a11dacd0a32c69a2eca24698e5fd4a9', 'Maluku Utara', 'Jawa Tengah', '54000', '', ''),
('6a3e369e41853f1fb3ae588ffc87c08f', 'Banten', 'Sulawesi Tengah', '77000', '', ''),
('6a928037f6d1ed469160c66d3b9c75d3', 'Sulawesi Tenggara', 'Lampung', '57000', '', ''),
('6af33f3765671888f7687290144425d4', 'Jawa Barat', 'Bali', '36000', '', ''),
('6c19ceb41033d1dd8b4fe72041b19a82', 'Kepulauan Riau', 'Lampung', '63000', '', ''),
('6d6d1d5991f551c6f1dc75928af0fa79', 'DI Yogyakarta', 'Maluku', '108000', '', ''),
('6de6cc1105b9cdb3f6b17ad542f6cf01', 'Gorontalo', 'Jawa Tengah', '35000', '', ''),
('6e36d8c9e725e9cc4ba77f132a8c4e69', 'DKI Jakarta', 'Bali', '9000', '', ''),
('6eb709aef519d640a275047636d83a31', 'Kalimantan Barat', 'Kalimantan Tengah', '30000', '', ''),
('6ecd2d8e3c8477f765574537cba4a635', 'Gorontalo', 'Kepulauan Bangka Belitung', '57000', '', ''),
('6f67dd00b94879fb8bccf7f818eaf704', 'Papua', 'Kalimantan Timur', '90900', '', ''),
('701d7ca62217d12edf2b76982ac664f8', 'Kepulauan Riau', 'Jawa Timur', '44000', '', ''),
('7134ecb3dc9c3dac51bfad71d6957f09', 'Sulawesi Selatan', 'Sumatera Barat', '25000', '', ''),
('71977f5cc39e6ad985a0543111f6ad8d', 'Papua', 'Maluku', '30000', '', ''),
('72483403be7789b5aa2845d061cd0cad', 'Papua Barat', 'Kalimantan Barat', '58000', '', ''),
('725c6549dd46cc84810807f83a89b743', 'Kalimantan Timur', 'Bengkulu', '47000', '', ''),
('728c2404adce759f6460828eb11ab0b6', 'Nusa Tenggara Timur', 'Jawa Timur', '26000', '', ''),
('7387eb664d996bcf991ba89a0adedf8a', 'DI Yogyakarta', 'Nusa Tenggara Timur', '47000', '', ''),
('74af64aeff383820b01db6e8838a3950', 'Kalimantan Tengah', 'Kalimantan Tengah', '39000', '', ''),
('74c2bdbd6f10b38d032233d24427107e', 'DI Yogyakarta', 'DI Yogyakarta', '9000', '', ''),
('74c5546d205c5c87eff2dd4449888763', 'DKI Jakarta', 'Kepulauan Riau', '28000', '', ''),
('74c7e525d6a61a16782c34d2aee6b76a', 'Papua Barat', 'Sulawesi Barat', '9000', '', ''),
('75ad6bb1c78fcbddf51a2f29f3eba7c2', 'Jambi', 'Nusa Tenggara Barat', '43000', '', ''),
('75f3da1a48bdb81c1f511019a6cb6ef9', 'Aceh', 'Riau', '68000', '', ''),
('76111b56617516f08b9c061d4af727dc', 'DI Yogyakarta', 'Sumatera Barat', '77000', '', ''),
('761378fc9a30b35a1d53f98ba3a41432', 'Banten', 'Nusa Tenggara Timur', '55000', '', ''),
('76c9bdf9bddc55ece1434b9071dc3366', 'Sulawesi Selatan', 'Sulawesi Barat', '17000', '', ''),
('77e1cd9f26cf3a76d3499a2981df231c', 'Papua', 'Kepulauan Riau', '90000', '', ''),
('788713cbf2cdcd647e24819b948536bc', 'Nusa Tenggara Barat', 'Nusa Tenggara Barat', '13000', '', ''),
('78b0e26e64cb5cb5cf4f6f922030ff68', 'DKI Jakarta', 'Papua', '121000', '', ''),
('78ca45c28f64b8fa6c56fc8360fbc92d', 'Sulawesi Tenggara', 'Sumatera Utara', '39000', '', ''),
('79814f61dc25b861681e6fb823253989', 'Bengkulu', 'Riau', '56000', '', ''),
('79a62df3cdca131e0ab090fe1b515e47', 'Gorontalo', 'Sumatera Utara', '81000', '', ''),
('7aaa8f4b5359ae3caf35aa1264bf5a44', 'Nusa Tenggara Timur', 'Nusa Tenggara Timur', '23000', '', ''),
('7b5d380a82d6e681a72dd270c9eb62f0', 'Sulawesi Utara', 'Bali', '24000', '', ''),
('7cb0844a80a83b1268bf3c8133a9d25c', 'Kalimantan Utara', 'Kalimantan Selatan', '28000', '', ''),
('7dce0b3647e5872010adac044cca4a30', 'Papua', 'Kalimantan Selatan', '36000', '', ''),
('7e6dd374a095ddf4547d4b5b79073965', 'Sumatera Selatan', 'Sulawesi Barat', '78000', '', ''),
('7ec558f570f01d5139cd20818d4caa65', 'Sulawesi Utara', 'Kepulauan Riau', '47000', '', ''),
('7ed272b8d085bd99d23886f479ac6b3c', 'Nusa Tenggara Timur', 'Sumatera Utara', '51000', '', ''),
('7ef88e5721e7894303067aabcae0a9ed', 'Kalimantan Tengah', 'Lampung', '39000', '', ''),
('7f3d17283519b98f32e47a0ca8fb0787', 'Papua Barat', 'Sumatera Utara', '87000', '', ''),
('7f3f5f05b6b051183f32f6a412a6188c', 'Jambi', 'Kalimantan Tengah', '41410', '', ''),
('7f548f13c130aff75696020ebfb961d2', 'DI Yogyakarta', 'Sumatera Utara', '55000', '', ''),
('8023a3c64d42f1d53c370f6d03620895', 'Sumatera Selatan', 'Sulawesi Tengah', '75000', '', ''),
('8189a810877757d27ab52ffaf9f88e93', 'Sulawesi Selatan', 'Papua Barat', '42000', '', ''),
('820a15e8bc35d131a7c13feda415aaf0', 'Gorontalo', 'Jambi', '66000', '', ''),
('821cf6f291656571651088211064686a', 'Sulawesi Tenggara', 'Kepulauan Riau', '66000', '', ''),
('823123859471ed76a5f4437c44177168', 'Sulawesi Utara', 'Kalimantan Tengah', '12000', '', ''),
('825b9fc1916f4a942b954c7826f2e349', 'Sulawesi Tenggara', 'Bengkulu', '60000', '', ''),
('82771ed00fc62f72e3063a446a74f5b9', 'DKI Jakarta', 'DKI Jakarta', '9000', '', ''),
('82ed6b3633dc1da854f0fb80f1f4f08a', 'Kalimantan Tengah', 'Jawa Timur', '26000', '', ''),
('83646e9d81e82a96ff598e96b4f5d70e', 'DI Yogyakarta', 'Papua', '229000', '', ''),
('836de9e4c54255eec7daac9678618672', 'DI Yogyakarta', 'Papua Barat', '78000', '', ''),
('8464332f1ac199dff5a74a8387d3b206', 'Kalimantan Utara', 'Sumatera Barat', '35000', '', ''),
('85c4ed7e7b8472a5deb1d45dbc8bc307', 'Kalimantan Selatan', 'Riau', '42000', '', ''),
('862714ea399385141f3cc9a6b880b579', 'Sulawesi Tenggara', 'Sulawesi Barat', '6000', '', ''),
('862e552dcee536f96393eb46830d8d95', 'Gorontalo', 'Bali', '36000', '', ''),
('86fb1479815b41783215731a6a422131', 'Papua', 'Sumatera Barat', '93000', '', ''),
('87165a7775908bbdb08761af4d210c10', 'Jambi', 'Jawa Timur', '16000', '', ''),
('87d05438f435607cf0877e915bd72a12', 'Sumatera Selatan', 'Aceh', '40000', '', ''),
('88b82fca5518ae4983707e1fe8de07f6', 'Banten', 'Kalimantan Barat', '57000', '', ''),
('8917bf3d65c1df850182c0131257787c', 'Kalimantan Tengah', 'Sumatera Barat', '33000', '', ''),
('89ad62d502ba149ebae3cc46782577b1', 'Kepulauan Bangka Belitung', 'Kalimantan Selatan', '43000', '', ''),
('8a0c2615cd56147156180d8fe9b43486', 'Sulawesi Tenggara', 'Sulawesi Tenggara', '11500', '', ''),
('8a2e99ee1d5223fbde6a78bf236da965', 'Maluku Utara', 'Sumatera Barat', '87000', '', ''),
('8a77f8630dc399802d16a8698f82ae0f', 'DKI Jakarta', 'Jawa Tengah', '20000', '', ''),
('8a99caad2bbd32650d40b04a50d1ce23', 'Nusa Tenggara Barat', 'Jawa Timur', '18000', '', ''),
('8b2899c6dc5701cbf7e53f475522a07b', 'Maluku Utara', 'Riau', '81000', '', ''),
('8b58e6d3b58c2b068635884de7198122', 'Jambi', 'Jawa Tengah', '30000', '', ''),
('8b8ce4f589e35952797631f88efe7e2e', 'Sulawesi Barat', 'Sumatera Utara', '84000', '', ''),
('8bf5d8070fb12b1ca79dfa8a5c51ee23', 'Gorontalo', 'Banten', '31000', '', ''),
('8cba8c3e03a75ff605d90ce34e4ae55f', 'Papua Barat', 'Aceh', '70000', '', ''),
('8cf329aaaefcc59de28680b09b1cac43', 'DI Yogyakarta', 'Bali', '46000', '', ''),
('8d23b8cb424a147a6fe8182e8768d0be', 'Aceh', 'Maluku', '90000', '', ''),
('8e25db2a703eed3800240f9b910aaaad', 'Papua Barat', 'Maluku', '84000', '', ''),
('8e4e78b9a9e86c5bb7e8896ab473c6a2', 'Kalimantan Timur', 'Lampung', '55000', '', ''),
('8e721f2f8ab37b48e46117a4a2af7a94', 'Kepulauan Riau', 'Sulawesi Tengah', '75000', '', ''),
('8fda6e1a75112d5a449e37836faac183', 'Maluku', 'Maluku', '133000', '', ''),
('8fdef46101087cec53cef77a8166f458', 'Sulawesi Tengah', 'Maluku', '15000', '', ''),
('9049481b7b5079b2882195653acd50cb', 'Sumatera Selatan', 'Sumatera Barat', '23000', '', ''),
('9090f40c46ad48b057ff7b349cb43457', 'Kalimantan Barat', 'Sulawesi Barat', '70000', '', ''),
('9151a20eac368a1407a0d5591079f164', 'Jawa Barat', 'Jawa Tengah', '21000', '', ''),
('91805ff40b56e1077739ca7e369c2849', 'Sulawesi Selatan', 'Kalimantan Selatan', '193000', '', ''),
('928409ca479b60d07ea15cff7b5bf2f2', 'Gorontalo', 'Sulawesi Utara', '22000', '', ''),
('9295d2439159d32add11a8d42ad91466', 'Sulawesi Utara', 'Aceh', '53000', '', ''),
('92c499a4b6805d4da3d323736d4be49b', 'Gorontalo', 'Kepulauan Riau', '69000', '', ''),
('92e118d2e2ac94c18fa5bae14d8f048e', 'DKI Jakarta', 'Kalimantan Barat', '45000', '', ''),
('93f592e9b9895ec849f1936b70c99b0b', 'Banten', 'Maluku', '58000', '', ''),
('9441816d2f655b6bdb0710243edfe5a0', 'Papua Barat', 'Jawa Timur', '76000', '', ''),
('944e80b537a7df9569169916e8ff4b5b', 'Sulawesi Selatan', 'Nusa Tenggara Barat', '44000', '', ''),
('9524c96e5f6c05a39ef06e094966da1a', 'Aceh', 'Jawa Timur', '38000', '', ''),
('952b6c36691b3964d6675bc8f22515c2', 'Sulawesi Tengah', 'Jawa Timur', '31000', '', ''),
('9571ef6eacd34e44e183707df9d30ae6', 'Sumatera Selatan', 'Sumatera Selatan', '18000', '', ''),
('96638777b17708698b5bc87471f7b7b4', 'Bengkulu', 'Nusa Tenggara Barat', '30000', '', ''),
('973e374d49511aef87bd8e8b61cb1931', 'Jambi', 'Kalimantan Timur', '26000', '', ''),
('981f5365eb3614f6516049d7665d1657', 'Sulawesi Selatan', 'Sulawesi Tengah', '35000', '', ''),
('982d81e65525dd18a0c6b1c789c9c808', 'Kalimantan Selatan', 'Bengkulu', '42000', '', ''),
('9a42222d616045ab89777c1b2f06fcab', 'Sulawesi Tenggara', 'Kalimantan Utara', '12000', '', ''),
('9a94db9752d25f5cfc90f8c4165341ec', 'Sumatera Barat', 'Sumatera Utara', '37000', '', ''),
('9ab3843c2c04316b965fb35769fe0dc5', 'Kalimantan Timur', 'Jawa Tengah', '25000', '', ''),
('9accf7bdb7a561c05a4ab0d4e1037139', 'Kalimantan Barat', 'Lampung', '31000', '', ''),
('9b54e1d8ba21cd2500b7ece7fc0dccac', 'Kalimantan Selatan', 'Maluku', '74000', '', ''),
('9b733c894f5614276c2483999ba8822f', 'Maluku Utara', 'DKI Jakarta', '39000', '', ''),
('9b83ac4ade8fba5ef66cae8f1faf7881', 'DKI Jakarta', 'Jawa Timur', '22000', '', ''),
('9c186be4a323f31be21115312737ba13', 'Papua', 'Jawa Tengah', '80000', '', ''),
('9c3546bebed9d003c4f32f2efc97225b', 'Kalimantan Barat', 'Aceh', '17000', '', ''),
('9c7f876690ead0036760a19f37e6c415', 'Nusa Tenggara Barat', 'Riau', '39000', '', ''),
('9c934aea0b478e93e30a7ea16bec2b40', 'Sumatera Selatan', 'Jawa Barat', '11000', '', ''),
('9cecf3e48ee65e67dd465d51582bb234', 'Kepulauan Bangka Belitung', 'Jambi', '9000', '', ''),
('9d4ad80cd3a75c6c877cb0bf6f5c94ab', 'Sumatera Selatan', 'Riau', '86000', '', ''),
('9d6360aabf469a776431811e5b667b4a', 'Lampung', 'Maluku', '56000', '', ''),
('9d97a46f6cd52d4a0c0d4bfbfe2ae343', 'Sulawesi Barat', 'Sulawesi Barat', '34000', '', ''),
('9dcc35f2bf853bf3021862a4e81d2628', 'Sulawesi Tengah', 'Kalimantan Tengah', '15000', '', ''),
('9e463edfefa5c084eaa10a27974e16ff', 'Sulawesi Utara', 'Sulawesi Utara', '7000', '', ''),
('9e46a542b59b9e77600e7ced9509301a', 'Banten', 'Jawa Tengah', '21000', '', ''),
('9ed34bf47588300ad16da645ea6ac20f', 'Jawa Tengah', 'Jawa Timur', '15000', '', ''),
('9ed8979a2f034e97af0074754478808b', 'Jawa Tengah', 'Papua Barat', '79000', '', ''),
('9f03f6ef27f46dbfd89384a78a3ea675', 'Jambi', 'Jawa Barat', '22000', '', ''),
('9f04385f5371f8c2121c42dab5855eaa', 'Kalimantan Utara', 'Papua Barat', '27000', '', ''),
('9f07dbc484a1a6cded2e2d2f30ea00f3', 'Papua', 'Bengkulu', '78000', '', ''),
('9f26df3b172b99ed35adb7b28484ca00', 'DI Yogyakarta', 'DKI Jakarta', '19000', '', ''),
('9f44fd198509d710eda24e9ecc1b9fd8', 'Sulawesi Utara', 'Sumatera Barat', '22000', '', ''),
('9f95d9baa9067a44a087b1ee407f79a8', 'Sulawesi Barat', 'Riau', '75000', '', ''),
('a003ddf996472dec0dae39f9bfcba7c5', 'Sumatera Selatan', 'Jawa Tengah', '21000', '', ''),
('a011206d2da1b437353d1e12db0e021b', 'Sumatera Selatan', 'Kalimantan Timur', '48000', '', ''),
('a0aea5109b2af92fe5ddcb3d62d61c79', 'Banten', 'Papua Barat', '88000', '', ''),
('a0b847110b16dbbeb3b19120f7ffbe57', 'Maluku Utara', 'Kalimantan Utara', '24000', '', ''),
('a0f94b12ec93dde387e72dc005893fb2', 'Sulawesi Utara', 'Lampung', '41000', '', ''),
('a107af62dbc411c691f384be56ebf133', 'Bali', 'Bali', '8000', '', ''),
('a12bb5ee199a1a70d613fb2249b799a6', 'Sulawesi Tengah', 'Nusa Tenggara Barat', '55000', '', ''),
('a1921b317f1c1318c41d321cf6a85e84', 'Bengkulu', 'Maluku', '69000', '', ''),
('a216e03acf3b5f504debaec45cd19641', 'Sulawesi Utara', 'Sulawesi Tengah', '44000', '', ''),
('a3299f46c207c8b321bcf67a5cbff7cd', 'Jambi', 'Bengkulu', '42000', '', ''),
('a3596732c6917fd495d518ac0b061a7e', 'Nusa Tenggara Barat', 'Sumatera Utara', '63000', '', ''),
('a39baf1047e1ef310a226087cc1ff1ea', 'Jawa Barat', 'Sulawesi Tengah', '61000', '', ''),
('a48ebe02985cda02bbf5b85cd077faab', 'Jambi', 'Sulawesi Tengah', '57000', '', ''),
('a4d5f641daad6bd513d206cf13738655', 'Banten', 'Sulawesi Barat', '65000', '', ''),
('a53ad450b49ecec6dceeaa198e6889fd', 'DKI Jakarta', 'Sumatera Selatan', '22000', '', ''),
('a5d0b740db5d11e773eb5d5b50bcdadb', 'Jawa Barat', 'Aceh', '64000', '', ''),
('a64137ebf7f61c5c2e39e1784c37526d', 'Sumatera Selatan', 'Sumatera Utara', '31000', '', ''),
('a71541098f451bc4c3cd96f1c9079a8b', 'Gorontalo', 'Kalimantan Tengah', '24000', '', ''),
('a7ec08140522af76046df55ea7e55bbb', 'Maluku Utara', 'Sumatera Utara', '90000', '', ''),
('a8c07ab272378e4459c976374b6f4c16', 'Jawa Barat', 'Kalimantan Tengah', '28000', '', ''),
('a8f14b1b10590b1a59428027206dc16e', 'Sulawesi Tengah', 'Jawa Tengah', '31000', '', ''),
('a916e286d8ea03fe84429a17a67f2f94', 'Sulawesi Tengah', 'Sumatera Barat', '47000', '', ''),
('a9748bb2d23149f41f247c2d12edd51e', 'Sulawesi Tenggara', 'DKI Jakarta', '27000', '', ''),
('a98d38e9aecefb1d2dc6e222f41a2664', 'Bengkulu', 'Jawa Timur', '30000', '', ''),
('aa5d50f3682b54a2643b043079e0c0ad', 'Kalimantan Timur', 'Nusa Tenggara Barat', '37500', '', ''),
('aac2603e2f8d6a876026aad46a05ab2d', 'Kalimantan Utara', 'Kalimantan Tengah', '9000', '', ''),
('aaf6fbfd825e531a83e6ab576560a639', 'Sulawesi Selatan', 'Jawa Timur', '39000', '', ''),
('aba76a1adaf4e4381121022750494342', 'Papua', 'Kalimantan Utara', '30000', '', ''),
('ac2f1e8cd0f9f7e163770b9e424d0302', 'DKI Jakarta', 'Kalimantan Selatan', '57000', '', ''),
('ac5c31e793f93c8916ceea1f2d43d50b', 'DKI Jakarta', 'Nusa Tenggara Barat', '28000', '', ''),
('ac83db0e3f492405462731ea75def615', 'Papua', 'Jambi', '66000', '', ''),
('ace6cc711e0446b53bee9ba42256f4b9', 'Sulawesi Tenggara', 'Kalimantan Barat', '42000', '', ''),
('ad039f8fd49fa128c89276ff3a9a082c', 'Nusa Tenggara Timur', 'Sulawesi Utara', '18000', '', ''),
('adb41f3b631e1c5a6ade1fd73653804c', 'Bali', 'Riau', '40000', '', ''),
('ae094660b024f0abb30e6f9e9f69a476', 'Gorontalo', 'Kalimantan Timur', '18000', '', ''),
('ae465553d5135e7670c19d16d460c03d', 'DI Yogyakarta', 'Kalimantan Barat', '36000', '', ''),
('ae876131f84aee38441823bfb34a6839', 'DI Yogyakarta', 'Jawa Timur', '46000', '', ''),
('aed5cffd9c196bd8db8c96e03c3e1c5c', 'Banten', 'Kalimantan Tengah', '52000', '', ''),
('aeee436b851c68e2b8a969efa304e5ed', 'Gorontalo', 'Nusa Tenggara Timur', '30000', '', ''),
('af6fb075a3aa6a5473ee1d747c48e4d8', 'Papua', 'Banten', '75000', '', ''),
('af8443c6afe4ae252f7197cb61615959', 'Nusa Tenggara Timur', 'Jawa Tengah', '29000', '', ''),
('b000bfe29a749520defd36f899ba8d7b', 'Sumatera Barat', 'Nusa Tenggara Barat', '42000', '', ''),
('b0ae11157a3d8e8e645edb6f832c2a62', 'Kalimantan Selatan', 'Kalimantan Timur', '21000', '', ''),
('b1b3f8fe8c327b91695652f1041884b7', 'Papua', 'Sulawesi Barat', '12000', '', ''),
('b2fccd70a05ad5e96f903aaa2a031dfa', 'Gorontalo', 'Riau', '72000', '', ''),
('b398a5231f5d88e5cf2b023d5e5fe44f', 'Jambi', 'Kepulauan Riau', '31000', '', ''),
('b42c98c15d88518f2917bb55e46f8b99', 'Sulawesi Utara', 'Jawa Timur', '36000', '', ''),
('b44478845623f3ee92bec7efb43358aa', 'Papua', 'Sumatera Selatan', '90000', '', ''),
('b4eb123f747cb2418bc3249fc2e34d2f', 'Sulawesi Selatan', 'Kalimantan Timur', '33000', '', ''),
('b4eb404508be7e856bc74647e141d8f4', 'Bengkulu', 'Lampung', '28000', '', ''),
('b4faf1e9f291b93248317f5aad9fc5e1', 'Kepulauan Bangka Belitung', 'Aceh', '50000', '', ''),
('b52c2ec24d7f0c60294c46710c4dbc9d', 'Kalimantan Barat', 'Bengkulu', '38000', '', ''),
('b52e379e6bd2f9f4d37c92a30c9e9e26', 'DI Yogyakarta', 'Jawa Barat', '20000', '', ''),
('b5d063aa84bb6fb76208dfe88a0c6033', 'Sulawesi Utara', 'Sulawesi Barat', '15000', '', ''),
('b5d2f86369385785d7c20516ad6d5f3a', 'Papua Barat', 'Bali', '48000', '', ''),
('b67a0804a1a2b1ce2b8bf7f9e72d2239', 'DI Yogyakarta', 'Sulawesi Barat', '66000', '', ''),
('b6ce2a2297c4c3ba6f01760fdfe777a1', 'Banten', 'Aceh', '35000', '', ''),
('b7611bd29e503e98076bf02b2b14e56e', 'Kalimantan Selatan', 'Nusa Tenggara Barat', '55000', '', ''),
('b81d21463734c5984328da643eef0d4b', 'Banten', 'Riau', '87000', '', ''),
('b90e1cdfa80629c942d0018dfdf18f28', 'Bali', 'Maluku', '42000', '', ''),
('b91baf6492712e38c7f69960f31dcf79', 'DI Yogyakarta', 'Banten', '23000', '', ''),
('bab7ae5fc475960b517168b99f5c4dd1', 'Sulawesi Tengah', 'Papua Barat', '104000', '', ''),
('bae1ec3b05065b1919c18e7d4f0ea065', 'Maluku Utara', 'Nusa Tenggara Barat', '42000', '', ''),
('bc438c16620c0cf0d738d33ad0329132', 'Aceh', 'Lampung', '41000', '', ''),
('bc945aa3aee472215c583130d41760d1', 'Bengkulu', 'Aceh', '21000', '', ''),
('bcbb1a2488208f77cd0a9c0d1675a3b0', 'Sulawesi Tenggara', 'Papua', '18000', '', ''),
('bccef4c45d0629af36846cfadd3c826d', 'Kalimantan Utara', 'Aceh', '18000', '', ''),
('bcd398c02ada639f8c810a054357a1af', 'Sulawesi Tenggara', 'Bali', '16000', '', ''),
('bd5d5ffdc4af1aaef649ec2f197d3287', 'Nusa Tenggara Barat', 'Maluku', '108000', '', ''),
('bdc11d1a54010be28b58427bed16c438', 'Papua Barat', 'Sumatera Barat', '90000', '', ''),
('bdf9760526f411680ae227375995df48', 'Kalimantan Timur', 'Sumatera Barat', '28000', '', ''),
('be118299fbfe10a4d188b7c28e414dcf', 'Kalimantan Selatan', 'Jawa Tengah', '43000', '', ''),
('be1e39da6cb41c1431d1e083f469bca4', 'Kalimantan Utara', 'Sulawesi Barat', '18000', '', ''),
('bf6d2836d84176d37322b636f16e85ee', 'Maluku Utara', 'Jawa Timur', '75000', '', ''),
('bf6febee35188cabb78f05a9c84fe7ab', 'Bali', 'Sumatera Utara', '60000', '', ''),
('c077546a09bf468018c38434f31c7405', 'Maluku Utara', 'Sulawesi Utara', '25000', '', ''),
('c0dc30c2208b5596321734c33825cd0b', 'Jawa Tengah', 'Bali', '35000', '', ''),
('c1ac4275889c8cb6336eea9035e32bc6', 'Sulawesi Tengah', 'Riau', '39000', '', ''),
('c2f23de60e11d2da0f9e8bff82ac6b1c', 'Gorontalo', 'Lampung', '60000', '', ''),
('c349323ef1d25d4d90f4a87cdbdf0dea', 'Sumatera Selatan', 'Nusa Tenggara Timur', '68000', '', ''),
('c3be32716d755c7272d9ec1f11dbac30', 'Sulawesi Tenggara', 'Aceh', '81000', '', ''),
('c3cf02fcb28904faa0d4968f1b2096e2', 'Kepulauan Bangka Belitung', 'Sumatera Barat', '21000', '', ''),
('c40802e61e2516230166afa3bc9fdf87', 'Sulawesi Selatan', 'Jawa Barat', '26000', '', ''),
('c474401bdee92f2c7f3bc237fb28c916', 'Sulawesi Utara', 'Kalimantan Barat', '44000', '', ''),
('c496b52e264751dbc07074b6cb36a83b', 'Jambi', 'Sulawesi Utara', '74000', '', ''),
('c4aa475ee2cf04ceaf819445fc8bbf95', 'Sulawesi Selatan', 'Kepulauan Riau', '44000', '', ''),
('c5024d59aaa11aed6cd0de6f04074468', 'Sulawesi Tenggara', 'Nusa Tenggara Timur', '27000', '', ''),
('c5cdb4612360bd2b1947afcd8c067133', 'Nusa Tenggara Timur', 'Sumatera Barat', '28000', '', ''),
('c607ee187c71059ef7e0fe567c89e628', 'Sulawesi Tengah', 'Bali', '37000', '', ''),
('c656fbcc07fbf64adefd8780c2cc46d2', 'DI Yogyakarta', 'Kepulauan Bangka Belitung', '37875', '', ''),
('c77e72b2b29ed227c4adcc57b7fea435', 'Kalimantan Utara', 'Jambi', '51000', '', ''),
('c795c0b2466ba14f36702f9426d30b91', 'Sumatera Selatan', 'Jawa Timur', '25000', '', ''),
('c8a1c27f2f401ae075275749852ef877', 'Sulawesi Selatan', 'Papua', '62000', '', ''),
('c9a52910f79403664fe0757cc759fed4', 'Sulawesi Selatan', 'Kalimantan Utara', '84000', '', ''),
('c9e34a698c2b7b60e0a57153ed1d7690', 'Kalimantan Timur', 'Sumatera Utara', '38000', '', ''),
('cab4ce7ffb305aee25903cfb6cd94d30', 'Papua', 'Sumatera Utara', '88000', '', ''),
('cb8c2c57d0f8a0c823186ebfbad1edbe', 'Banten', 'Bengkulu', '37000', '', ''),
('cbb982a926c136a8116d3ac2e9464963', 'Jawa Barat', 'Jawa Barat', '18000', '', ''),
('cbfe311fc125f87d892d6db00d0c29c2', 'Maluku Utara', 'Jambi', '75000', '', ''),
('cc082ddc9a7617f21eda000b9460783b', 'Kalimantan Barat', 'Sumatera Barat', '88000', '', ''),
('cc223fb9173dccd2762c8ba360405f7e', 'Gorontalo', 'Jawa Timur', '28000', '', ''),
('cc5a089d9f88ea162f2bdbd682b20798', 'Bengkulu', 'Sumatera Barat', '15000', '', ''),
('cda06745e7f78f4d4ef239b6c49141df', 'DKI Jakarta', 'Kalimantan Utara', '54000', '', ''),
('ce1e37969cded1c1e8d4718e8a509102', 'Kepulauan Riau', 'Jawa Barat', '28000', '', ''),
('ceae6efa41a0287241f99b97d0338e58', 'Sulawesi Barat', 'Lampung', '63000', '', ''),
('cf7573c66ce3c78950432b184891d99a', 'Kepulauan Riau', 'Kepulauan Riau', '28000', '', ''),
('cf776540d5c2f26c13d7c533340cb943', 'DKI Jakarta', 'Sulawesi Selatan', '36000', '', ''),
('cf973707bb02ed8ef062f492e8d80990', 'Sulawesi Tenggara', 'Kalimantan Selatan', '39000', '', ''),
('cfafc0d5fe2ab835177734fd60962c3c', 'Gorontalo', 'Gorontalo', '5000', '', ''),
('cfde4d26884277ca14b9a6baa065a52b', 'Kepulauan Bangka Belitung', 'Papua Barat', '189000', '', ''),
('d032a9e78368d3454dfa05e3cc352ca2', 'Maluku Utara', 'Kalimantan Timur', '27000', '', ''),
('d06b7107113db63466bd935ef94691e0', 'Kalimantan Barat', 'Bali', '42000', '', ''),
('d117a23db0b120ab38f4aa73c4be28fe', 'Sulawesi Selatan', 'Jawa Tengah', '49000', '', ''),
('d1c7e78b0931620dc79350bd1185253c', 'Kalimantan Timur', 'Aceh', '39000', '', ''),
('d29c34404e5d6c6580adb09f348f0528', 'Kalimantan Selatan', 'Kalimantan Tengah', '16000', '', ''),
('d2a474d79c7d3e258202ff2af628a389', 'Jawa Barat', 'Jawa Timur', '36000', '', ''),
('d3a475de6c4944defef9f9d706c01d0b', 'Sulawesi Tenggara', 'Sulawesi Utara', '9000', '', ''),
('d3b6d2f5c208e6a8ddcc75b19213f53e', 'Sulawesi Selatan', 'Bengkulu', '76000', '', ''),
('d46c08b40521a3dd90777bee52f36f96', 'Sulawesi Tenggara', 'Nusa Tenggara Barat', '30000', '', ''),
('d483dc000b361a79e2b3001bfe23ce6e', 'Jawa Tengah', 'Bengkulu', '33000', '', ''),
('d49b72c7a8686201b37bc4db04be7d25', 'Kepulauan Riau', 'Maluku', '37000', '', ''),
('d4a4bef62de936799a0d0f6a7676780d', 'Sulawesi Tenggara', 'Maluku', '9000', '', ''),
('d57382b1041408a077a8f7383b03be3a', 'DKI Jakarta', 'Sulawesi Barat', '52000', '', ''),
('d5babf7bae6f027dadf2dedb37d8e464', 'Kepulauan Riau', 'Nusa Tenggara Barat', '49000', '', ''),
('d63ef48088cba9632635fe4f4d867bf5', 'Gorontalo', 'Maluku', '6000', '', ''),
('d6630e465cc974fc422a31c38b160c98', 'Jawa Tengah', 'Riau', '53000', '', ''),
('d6dbdc43d1cf94745b5ccd135457f2a3', 'Kalimantan Selatan', 'Lampung', '33000', '', ''),
('d7fae2b510327b444d76b97abb02a7c2', 'DKI Jakarta', 'Jawa Barat', '18000', '', ''),
('d82115c710753f31905f304951ba998c', 'Sulawesi Tengah', 'Aceh', '75000', '', ''),
('d9e9d1cf22eb16d366ecd237223f9d59', 'DI Yogyakarta', 'Sulawesi Tenggara', '55000', '', ''),
('d9ec206151eab0ef835ad07d9402d9ff', 'Jawa Barat', 'Bengkulu', '25000', '', ''),
('da90d4e5cc2f5a2ba487d7a032298294', 'Sulawesi Tenggara', 'Sumatera Selatan', '72000', '', ''),
('dafbd81ffafef978008e2123abcca5da', 'Kepulauan Bangka Belitung', 'Maluku', '96000', '', ''),
('dc2dfdf348e65f3e32ecda881792f70a', 'Sulawesi Tenggara', 'Sulawesi Selatan', '16000', '', ''),
('dc6e7434c50b939f6ce9fdd51ad20f6e', 'Papua', 'Nusa Tenggara Barat', '84000', '', ''),
('dc8cb92f4e9e2689c77ce2680f3bdf1b', 'Maluku Utara', 'Kalimantan Selatan', '30000', '', ''),
('dcaa6527d6f7e666d148e2dc72141073', 'Sumatera Selatan', 'Papua Barat', '131000', '', ''),
('dd2eafb961312e3f1421cc6e180bda35', 'Papua', 'Aceh', '99000', '', ''),
('dd87fa4b867fbef2ae9cfe781c554260', 'Gorontalo', 'Bengkulu', '63000', '', ''),
('dd981f823d772e73fb0364b3bcf623ec', 'Jambi', 'Bali', '35000', '', ''),
('de356420af1e01cd1d79d1cdf4e0876b', 'Jambi', 'Jambi', '11000', '', ''),
('de39a7da576e60d01f6c0aea40bc54ec', 'DI Yogyakarta', 'Kalimantan Tengah', '37000', '', ''),
('dec0e370ac855f67b506691b099ec36e', 'Nusa Tenggara Timur', 'Nusa Tenggara Barat', '3000', '', ''),
('dec31931c63fbc2cdf829fbd41fadbe5', 'Kepulauan Riau', 'Kalimantan Tengah', '73000', '', ''),
('df4e140baa11a922f7056151d2d70dd8', 'Aceh', 'Sumatera Barat', '74000', '', ''),
('e054dbc3ed1baf7ead67524b5f45f8ef', 'DKI Jakarta', 'Sumatera Barat', '57000', '', ''),
('e1ddbc67e329c57aec85ef07d9b51f5d', 'Sumatera Barat', 'Riau', '17170', '', ''),
('e273cc3eb56bbb26c0c1cf73e723ca37', 'Sulawesi Tenggara', 'Kepulauan Bangka Belitung', '54000', '', ''),
('e304afc5f95361d861c97cc570fda956', 'Kalimantan Timur', 'Bali', '8000', '', ''),
('e33f74a4ecc474745553d0a0c15705c4', 'Sulawesi Utara', 'Maluku', '47000', '', ''),
('e5e20b6fcb2b07431547b540d389ce7f', 'Banten', 'Banten', '13130', '', ''),
('e6144fe4444a949db8b5b827d64d929d', 'Kalimantan Selatan', 'Sulawesi Utara', '99000', '', ''),
('e64d711293681db2a1c386c4d462abfa', 'DI Yogyakarta', 'Sulawesi Tengah', '82000', '', ''),
('e79fb7c121d3f9e520fcc621fd685297', 'Sulawesi Selatan', 'Riau', '154000', '', ''),
('e7e095a405fe2cfa60187456cac81fed', 'DI Yogyakarta', 'Sulawesi Selatan', '42000', '', ''),
('e8ada0e6cbd4b2ee01acb1df57539441', 'Nusa Tenggara Timur', 'Kalimantan Timur', '12000', '', ''),
('e9141841ccfe0ec19adfb9f03a1fa05d', 'Gorontalo', 'Kalimantan Utara', '15000', '', ''),
('e9699399ea3d21c1e6d7650e160752e7', 'Sumatera Barat', 'Sumatera Barat', '20000', '', ''),
('ea0e8706d8b713f19bb355a0b0b8456e', 'Nusa Tenggara Timur', 'Kalimantan Selatan', '80000', '', ''),
('ea47b379ffed03be32107e686ad61baa', 'Aceh', 'Aceh', '28000', '', ''),
('ea8a7a68706b7f798cfe0b0c3da610e0', 'Jawa Tengah', 'Jawa Tengah', '14000', '', ''),
('eabc200b514dce6d3d3d579ed0c91af9', 'DI Yogyakarta', 'Jambi', '69000', '', ''),
('ebc251a7e1cf628663f54829690d3d41', 'Papua', 'Sulawesi Tengah', '24000', '', ''),
('ec3b3773e9ae02cadfe503f5779a1c90', 'Maluku Utara', 'Sumatera Selatan', '84000', '', ''),
('ec894e2ca5f1f335256eb3c78c7d1ed6', 'Bengkulu', 'Bali', '27000', '', ''),
('ecae948a31c37453ba1b081a8c8a24ae', 'Gorontalo', 'Nusa Tenggara Barat', '33000', '', ''),
('ed4fb96e9c3daf76586ad0afc4ce4d3a', 'Jawa Barat', 'Sumatera Barat', '54000', '', ''),
('ede2e4161e2e6ecd2fa92a5f40192957', 'Sulawesi Selatan', 'Sulawesi Selatan', '17000', '', ''),
('edfa686ca63ffcc142b87c7424eb6a5a', 'Sulawesi Barat', 'Jawa Timur', '33000', '', ''),
('ee268a6c581a875c8e78050b65ae7dff', 'Gorontalo', 'Sumatera Selatan', '75000', '', ''),
('eec9dfed2633cfe3cfbe768b50790a07', 'Jawa Barat', 'Kalimantan Barat', '47000', '', ''),
('efcc40174067898c8766e902c3e0c5c8', 'Papua', 'Kalimantan Tengah', '39000', '', ''),
('effbe7be13f637050d9b0ff9f6c0b3d8', 'Bali', 'Nusa Tenggara Barat', '27000', '', ''),
('f01e36169f8626345d86db4c8ef9b195', 'Kepulauan Bangka Belitung', 'Nusa Tenggara Barat', '24000', '', ''),
('f05767949b7308f42a8be855d2440e6b', 'Maluku Utara', 'Sulawesi Barat', '6000', '', ''),
('f0937ced9382d3206fd39314aa4e3e69', 'Kepulauan Bangka Belitung', 'Jawa Barat', '32000', '', ''),
('f0af57f2dad5f34081d95bf1156d6f09', 'Sumatera Selatan', 'Maluku', '61000', '', ''),
('f125716709fb4a08d8970b829c350675', 'Jambi', 'Lampung', '26000', '', ''),
('f1c112fc47f81f3551ecdc9087b90b79', 'DKI Jakarta', 'Kepulauan Bangka Belitung', '22000', '', ''),
('f2f7d9149d74fc068205989b3af88c7e', 'Nusa Tenggara Timur', 'Lampung', '30000', '', ''),
('f30ea23c166d689d32df76830ae00c91', 'Kepulauan Bangka Belitung', 'Kalimantan Timur', '39000', '', ''),
('f45af55f730f3cf20fe890e8114bf434', 'Lampung', 'Nusa Tenggara Barat', '39000', '', ''),
('f482b296e62dafa084eb47f71b640a3e', 'Jambi', 'Papua Barat', '238000', '', ''),
('f6660139b2cd3f99e8526548b0368cbe', 'Sulawesi Selatan', 'Bali', '30000', '', ''),
('f6fe45ea6ca2c60c71c8b2757f084146', 'Bali', 'Sumatera Barat', '23000', '', ''),
('f7123bcf850b9c85c6bc2c058c3ca4da', 'Maluku Utara', 'Kalimantan Tengah', '33000', '', ''),
('f7496511f63de998f18f2a9a9ec8d933', 'Gorontalo', 'Sulawesi Tenggara', '54000', '', ''),
('f75b2649a312a8bc7206031e85758d7c', 'Gorontalo', 'Sulawesi Tengah', '43000', '', ''),
('f85b3fe8544ea082d40d59b07c685d47', 'Jambi', 'Maluku', '72000', '', ''),
('f8dd7be4c24e17f8d3ca6a6ddc0f2670', 'Papua Barat', 'Bengkulu', '75000', '', ''),
('f95ac218fe9eae8f2e0e82dc3d1b7965', 'Kepulauan Riau', 'Kalimantan Barat', '38000', '', ''),
('f97d2a51526a5bb0dae059eec3b2c6e3', 'Kalimantan Barat', 'Nusa Tenggara Barat', '44000', '', ''),
('f9aaebaf6c568a12485aaf172b012d82', 'Sulawesi Barat', 'Sumatera Barat', '81000', '', ''),
('fb7b4594892c95aa7db82831bbe036d0', 'DKI Jakarta', 'Sulawesi Utara', '47000', '', ''),
('fb7cb6526a2d2a7bb140c7b9afab9459', 'Kepulauan Riau', 'Sulawesi Barat', '75000', '', ''),
('fb86d77726965ca121b5d05d478abb7a', 'Kepulauan Bangka Belitung', 'Nusa Tenggara Timur', '88000', '', ''),
('fbb38d2b0ed45ab7e5b99718c4c02d37', 'Kalimantan Timur', 'Kalimantan Timur', '11000', '', ''),
('fd0fd55d1e3dbc4cad4b8afbd0c97a27', 'Jambi', 'Nusa Tenggara Timur', '119000', '', '');
INSERT INTO `ongkir_propinsi` (`kd`, `propinsi1`, `propinsi2`, `ongkir_jne`, `ongkir_pos`, `ongkir_tiki`) VALUES
('fe22252ea3ff951e512495848cca4a95', 'Gorontalo', 'Sulawesi Barat', '30000', '', ''),
('fe3c9e0031fa509cb52d27242adeb3be', 'Kalimantan Tengah', 'Bali', '12000', '', ''),
('fe85d3d2409a7016f3afa7718fb55d46', 'Kepulauan Bangka Belitung', 'Banten', '33000', '', ''),
('fe966b19504005d95f769986b3f996f9', 'DI Yogyakarta', 'Nusa Tenggara Barat', '62000', '', ''),
('ff4322f50902ca2dc64f1b958353081a', 'Bengkulu', 'Sumatera Utara', '35000', '', ''),
('ff5cc6e966f2e973e49cfd105141f3ee', 'Sumatera Selatan', 'Sulawesi Utara', '48000', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderan`
--

CREATE TABLE `orderan` (
  `id_orderan` int(11) NOT NULL,
  `id_checkout` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `berat` float NOT NULL,
  `stok` int(11) NOT NULL,
  `is_new` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `harga`, `gambar`, `deskripsi`, `berat`, `stok`, `is_new`) VALUES
(1, 'CCTV 1', 200000, 'cctv1.jpg', 'Jual HD Camera CCTV Microlexus MTI 2056 IRP_Smart IR Dome Eyeball 2.0 MP di JakartaCCTV harga murah dan berkualitas sangat baik, kami memperkenalkan kepada Anda sebuah Dome Camera dengan kualitas resolusi High Definition dari brand Microlexus. Brand yang telah banyak digunakan oleh konsumen di Indonesia. Kualitas produk yang diberikan brand ini tidak kalah dengan brand-brand yang telah terlebih dahulu muncul.', 1, 100, 0),
(2, 'CCTV 2', 250000, 'cctv2.jpg', 'Jual HD Camera CCTV Microlexus MTI 2056 IRP_Smart IR Dome Eyeball 2.0 MP di JakartaCCTV harga murah dan berkualitas sangat baik, kami memperkenalkan kepada Anda sebuah Dome Camera dengan kualitas resolusi High Definition dari brand Microlexus. Brand yang telah banyak digunakan oleh konsumen di Indonesia. Kualitas produk yang diberikan brand ini tidak kalah dengan brand-brand yang telah terlebih dahulu muncul.', 1, 80, 1),
(3, 'CCTV 3', 240000, 'cctv3.jpg', 'Jual HD Camera CCTV Microlexus MTI 2056 IRP_Smart IR Dome Eyeball 2.0 MP di JakartaCCTV harga murah dan berkualitas sangat baik, kami memperkenalkan kepada Anda sebuah Dome Camera dengan kualitas resolusi High Definition dari brand Microlexus. Brand yang telah banyak digunakan oleh konsumen di Indonesia. Kualitas produk yang diberikan brand ini tidak kalah dengan brand-brand yang telah terlebih dahulu muncul.', 1, 93, 1),
(7, 'CCTV 4', 170000, '7000a8256b8c9d7185f5fc5c6f0ad182.jpg', 'ssssssssss', 0.5, 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id_prov` char(2) NOT NULL,
  `nama` tinytext NOT NULL,
  `urutan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_prov`, `nama`, `urutan`) VALUES
('11', 'Aceh', '1'),
('12', 'Sumatera Utara', '2'),
('13', 'Sumatera Barat', '3'),
('14', 'Riau', '5'),
('15', 'Jambi', '7'),
('16', 'Sumatera Selatan', '4'),
('17', 'Bengkulu', '8'),
('18', 'Lampung', '9'),
('19', 'Kepulauan Bangka Belitung', '10'),
('21', 'Kepulauan Riau', '6'),
('31', 'DKI Jakarta', '11'),
('32', 'Jawa Barat', '12'),
('33', 'Jawa Tengah', '14'),
('34', 'DI Yogyakarta', '15'),
('35', 'Jawa Timur', '16'),
('36', 'Banten', '9'),
('51', 'Bali', '17'),
('52', 'Nusa Tenggara Barat', '18'),
('53', 'Nusa Tenggara Timur', '19'),
('61', 'Kalimantan Barat', '20'),
('62', 'Kalimantan Tengah', '21'),
('63', 'Kalimantan Selatan', '22'),
('64', 'Kalimantan Timur', '23'),
('65', 'Kalimantan Utara', '24'),
('71', 'Sulawesi Utara', '25'),
('72', 'Sulawesi Tengah', '26'),
('73', 'Sulawesi Selatan', '27'),
('74', 'Sulawesi Tenggara', '28'),
('75', 'Gorontalo', '29'),
('76', 'Sulawesi Barat', '30'),
('81', 'Maluku', '31'),
('82', 'Maluku Utara', '32'),
('91', 'Papua Barat', '33'),
('92', 'Papua', '34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `role_id`) VALUES
('admin', 'nandagoreh@gmail.com', '$2y$10$avS6u9k8WR7QWE3d9F0NHuA.kA953bEVA4S3NmGylAuyp/uW5fqnW', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bukti`
--
ALTER TABLE `bukti`
  ADD PRIMARY KEY (`id_bukti`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_checkout`);

--
-- Indeks untuk tabel `ongkir_propinsi`
--
ALTER TABLE `ongkir_propinsi`
  ADD PRIMARY KEY (`kd`);

--
-- Indeks untuk tabel `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`id_orderan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bukti`
--
ALTER TABLE `bukti`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `orderan`
--
ALTER TABLE `orderan`
  MODIFY `id_orderan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
