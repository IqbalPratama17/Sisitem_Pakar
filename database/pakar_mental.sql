-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Agu 2022 pada 14.57
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakar_mental`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `username`, `password`, `email`, `nohp`, `jabatan`) VALUES
(1, 'admin', 'admin', '12345', 'admin@gmail.com', '082118102030', 'admin'),
(2, 'Angie Nathania Devi, M.Psi.', 'pakar', '54321', 'Angie@gmail.com', '081572177920', 'pakar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_aturan`
--

CREATE TABLE `tbl_aturan` (
  `id_aturan` int(11) NOT NULL,
  `id_penyakit` varchar(50) NOT NULL,
  `id_gejala` varchar(50) NOT NULL,
  `bobot` decimal(19,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_aturan`
--

INSERT INTO `tbl_aturan` (`id_aturan`, `id_penyakit`, `id_gejala`, `bobot`) VALUES
(1, 'PNY001', 'GJL001', '0.40'),
(2, 'PNY001', 'GJL002', '0.50'),
(3, 'PNY001', 'GJL003', '0.60'),
(4, 'PNY001', 'GJL004', '0.50'),
(5, 'PNY001', 'GJL005', '0.80'),
(6, 'PNY002', 'GJL006', '0.60'),
(7, 'PNY002', 'GJL007', '0.70'),
(8, 'PNY002', 'GJL008', '0.70'),
(9, 'PNY002', 'GJL009', '0.50'),
(10, 'PNY002', 'GJL010', '0.40'),
(11, 'PNY003', 'GJL011', '0.80'),
(12, 'PNY003', 'GJL012', '0.80'),
(13, 'PNY003', 'GJL013', '0.50'),
(14, 'PNY003', 'GJL014', '0.40'),
(15, 'PNY003', 'GJL015', '0.30'),
(16, 'PNY004', 'GJL016', '0.60'),
(17, 'PNY004', 'GJL017', '0.80'),
(18, 'PNY004', 'GJL018', '0.50'),
(19, 'PNY004', 'GJL019', '0.40'),
(20, 'PNY004', 'GJL020', '0.30'),
(21, 'PNY005', 'GJL021', '0.50'),
(22, 'PNY005', 'GJL022', '0.30'),
(23, 'PNY005', 'GJL023', '0.60'),
(24, 'PNY005', 'GJL024', '0.80'),
(25, 'PNY005', 'GJL025', '0.60'),
(26, 'PNY006', 'GJL026', '0.80'),
(27, 'PNY006', 'GJL027', '0.60'),
(28, 'PNY006', 'GJL028', '0.40'),
(29, 'PNY006', 'GJL029', '0.50'),
(30, 'PNY006', 'GJL030', '0.30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_diagnosa`
--

CREATE TABLE `tbl_detail_diagnosa` (
  `id_detail_diagnosa` int(11) NOT NULL,
  `id_diagnosa` varchar(50) NOT NULL,
  `id_penyakit` varchar(50) NOT NULL,
  `id_gejala` varchar(50) NOT NULL,
  `bobot` decimal(19,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_detail_diagnosa`
--

INSERT INTO `tbl_detail_diagnosa` (`id_detail_diagnosa`, `id_diagnosa`, `id_penyakit`, `id_gejala`, `bobot`) VALUES
(1, 'DNS001', 'PNY001', 'GJL001', '0.40'),
(2, 'DNS001', 'PNY001', 'GJL002', '0.50'),
(3, 'DNS001', 'PNY001', 'GJL003', '0.60'),
(4, 'DNS001', 'PNY002', 'GJL006', '0.60'),
(5, 'DNS001', 'PNY002', 'GJL008', '0.70'),
(6, 'DNS001', 'PNY002', 'GJL010', '0.40'),
(7, 'DNS001', 'PNY003', 'GJL012', '0.80'),
(8, 'DNS001', 'PNY003', 'GJL014', '0.40'),
(9, 'DNS002', 'PNY005', 'GJL023', '0.60'),
(10, 'DNS002', 'PNY005', 'GJL024', '0.80'),
(11, 'DNS002', 'PNY006', 'GJL027', '0.60'),
(12, 'DNS002', 'PNY006', 'GJL028', '0.40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_diagnosa`
--

CREATE TABLE `tbl_diagnosa` (
  `id_diagnosa` varchar(50) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_diagnosa`
--

INSERT INTO `tbl_diagnosa` (`id_diagnosa`, `id_pasien`, `tanggal`) VALUES
('DNS001', 'PSN001', '2022-08-02 02:51:02'),
('DNS002', 'PSN002', '2022-08-02 02:53:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `id_gejala` varchar(50) NOT NULL,
  `id_penyakit` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`id_gejala`, `id_penyakit`, `nama`) VALUES
('GJL001', 'PNY001', 'Merasa diri selalu tegang dalam kondisi dan situasi apa pun.'),
('GJL002', 'PNY001', 'Mudah merasa cemas bahkan untuk hal yang sepele.'),
('GJL003', 'PNY001', 'Mudah merasa uring-uringan tanpa sebab yang jelas.'),
('GJL004', 'PNY001', 'Merasa resah dan sulit untuk ditenangkan.'),
('GJL005', 'PNY001', 'Selalu merasa ketakutan tanpa sebab yang pasti.'),
('GJL006', 'PNY002', 'Mudah melamun dan berhalusinasi.'),
('GJL007', 'PNY002', 'Delusi / waham (Suka meyakini yang aneh-aneh).'),
('GJL008', 'PNY002', 'Perubahan sikap dan perilaku secara tiba-tiba.'),
('GJL009', 'PNY002', 'Suasana hati mudah berubah tanpa sebab.'),
('GJL010', 'PNY002', 'Sering curiga, sulit fokus dan berkonsentrasi.'),
('GJL011', 'PNY003', 'Sering merasa takut, khawatir dengan keadaan sekitar.'),
('GJL012', 'PNY003', 'Sering merasa kurang atau bahkan tidak merasa bersih ketika mencuci tangan.'),
('GJL013', 'PNY003', 'Sering mengalami fokus untuk mengatur setiap hal secara berurutan, rapih dan simetris.'),
('GJL014', 'PNY003', 'Selalu memeriksa sesuatu berulang kali.'),
('GJL015', 'PNY003', 'Suka atau berkeinginan untuk mengumpulkan barang-barang bekas yang anda temukan.'),
('GJL016', 'PNY004', 'Ingatan yang tidak diinginkan, yaitu bersifat mengganggu yang datang berulang.'),
('GJL017', 'PNY004', 'Mencoba menghindari berpikir atau berbicara tentang peristiwa traumatis.'),
('GJL018', 'PNY004', 'Memiliki kecenderungan berpikir negatif tentang orang lain, diri sendiri, lingkungan, bahkan dunia.'),
('GJL019', 'PNY004', 'Sering merasa bersalah atau malu yang luar biasa.'),
('GJL020', 'PNY004', 'Kesulitan dalam mempertahankan hubungan dekat (Keluarga, Teman, Kekasih).'),
('GJL021', 'PNY005', 'Mudah merasa bahagia dan antusias berlebihan.'),
('GJL022', 'PNY005', 'Perasaan semangat yang menggebu-gebu.'),
('GJL023', 'PNY005', 'Berkurangnya minat pada suatu kegiatan.'),
('GJL024', 'PNY005', 'Sulit untuk tidur atau insomnia.'),
('GJL025', 'PNY005', 'Mudah merasa bersalah secara berlebihan.'),
('GJL026', 'PNY006', 'Merasa memiliki dua atau lebih identitas atau kepribadian yang berbeda-beda dalam satu orang.'),
('GJL027', 'PNY006', 'Munculnya memori yang tidak diingat dalam aktivitas, informasi diri, atau kejadian traumatis.'),
('GJL028', 'PNY006', 'Merasa seperti ada orang lain di dalam pikiran.'),
('GJL029', 'PNY006', 'Sering bertindak di luar karakter atau kepribadian yang sebenarnya.'),
('GJL030', 'PNY006', 'Kadang merasa asing dengan diri sendiri, bahkan tidak memperdulikan keselamatan diri sendiri.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hasil_diagnosa`
--

CREATE TABLE `tbl_hasil_diagnosa` (
  `id_hasil_diagnosa` int(11) NOT NULL,
  `id_diagnosa` varchar(50) NOT NULL,
  `id_penyakit` varchar(50) NOT NULL,
  `persentase` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_hasil_diagnosa`
--

INSERT INTO `tbl_hasil_diagnosa` (`id_hasil_diagnosa`, `id_diagnosa`, `id_penyakit`, `persentase`) VALUES
(1, 'DNS001', 'PNY001', '88'),
(2, 'DNS001', 'PNY002', '93'),
(3, 'DNS001', 'PNY003', '88'),
(4, 'DNS002', 'PNY005', '92'),
(5, 'DNS002', 'PNY006', '76');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `usia` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `nama`, `jenis_kelamin`, `no_telp`, `tgl_lahir`, `usia`, `alamat`) VALUES
('PSN001', 'Jaka', 'Laki-Laki', '54321', '2000-02-12', '22', 'Surabaya'),
('PSN002', 'Dinda', 'Laki-Laki', '6789', '2000-05-12', '22', 'Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penyakit`
--

CREATE TABLE `tbl_penyakit` (
  `id_penyakit` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kett` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_penyakit`
--

INSERT INTO `tbl_penyakit` (`id_penyakit`, `nama`, `kett`, `solusi`) VALUES
('PNY001', 'Anxiety Disorder (Gangguan kecemasan)', 'Anxiety disorder adalah perasaan tidak nyaman yang menjalar ke seluruh tubuh, perasaan khawatir yang tidak menyenangkan dan kerap disertai dengan ketegangan dan seringkali pemikiran tidak realistis.', 'Solusi utama perawatan adalah terapi (Dengan psikolog, psikoterapis atau psikoanalis), serta psikiater dan farmakotherapeutic (psikoterapi).'),
('PNY002', 'Gangguan Psikosis', 'Gangguan psikosis adalah kondisi ketika penderitanya mengalami kesulitan dalam membedakan kenyataan dan imajinasi. Kondisi ini ditandai dengan munculnya halusinasi dan waham (delusi). Psikosis terjadi karena adanya gangguan di otak yang memengaruhi cara kerja otak dalam memproses informasi.', 'Gangguan psikosis paling efektif diobati dengan kombinasi obat dan terapi. Obat antipsikotik adalah salah satu perawatan untuk psikosis. Ini membantu memblokir reseptor serotonin atau dopamin di otak untuk mencegah halusinasi dan delusi. Melakukan terapi perilaku kognitif (CBT) mungkin sangat membantu dengan mengubah pola pikir yang dapat menyebabkan delusi dan halusinasi.'),
('PNY003', 'Obsessive Compulsive Disorder', 'OCD adalah gangguan mental yang mendorong penderitanya untuk melakukan tindakan tertentu secara berulang-ulang. Tindakan tersebut ia lakukan untuk mengurangi kecemasan dalam pikirannya. Penderita OCD biasanya menyadari bahwa pikiran dan tindakannya berlebihan, tetapi mereka tidak bisa melawannya.', 'Untuk mengatasi pikiran obsesif yang muncul, hal pertama yang harus dilakukan adalah memperhatikan gejala yang muncul, kemudian pikirkan bagaimana hal tersebut bisa terjadi. Setelah mengetahui pikiran obsesif yang berujung pada kecemasan, langkah selanjutnya yang bisa dilakukan adalah melawan gejala yang muncul. Jangan terlalu dipikirkan, karena akan memicu gangguan stres.'),
('PNY004', 'Post-Traumatic Stress Disorder (PTSD)', 'PTSD atau gangguan stres pascatrauma adalah gangguan mental yang muncul setelah seseorang mengalami atau menyaksikan peristiwa yang bersifat traumatis atau sangat tidak menyenangkan. PTSD merupakan gangguan kecemasan yang membuat penderitanya teringat pada kejadian traumatis.', 'Perbaiki kesehatan psikis lewat sesi konseling Sesi konseling dilakukan agar korban trauma dapat membicarakan perasaan yang sedang dialami, gangguan stres apa yang perlu diatasi, kepada tenaga kesehatan yang bersifat netral dan sanggup memberi saran tepat.'),
('PNY005', 'Bipolar Disorder (Gangguan Emosional)', 'Gangguan bipolar dapat diderita seumur hidup sehingga memengaruhi aktivitas penderitanya. Namun, pemberian obat-obatan dan psikoterapi dapat membantu penderita untuk mengurangi gangguan tersebut.', 'Metode pengobatan yang dapat dilakukan berupa pemberian obat-obatan dan psikoterapi. Pengobatan gangguan bipolar ini bertujuan untuk mengurangi frekuensi munculnya gejala, membantu penderita kembali beraktivitas seperti biasanya, dan menurunkan risiko mengalami gangguan kesehatan lainnya.'),
('PNY006', 'Gangguan Identitas Disosiatif', 'Gangguan disosiatif adalah salah satu jenis penyakit mental yang menunjukkan adanya disosiasi atau ketidaksesuaian hubungan antara pikiran, ingatan, lingkungan, tindakan, serta identitas diri. Gangguan ini juga sering disebut dengan gangguan kepribadian ganda. Secara umum, panyebab utama orang memiliki gangguan disosiatif yaitu trauma masa lalu.', 'Melakukan psikoterapi untuk menangani gangguan disosiatif bertujuan untuk menyatukan berbagai kepribadian yang ada, hingga menjadi satu kepribadian yang utuh lagi. Sebenarnya, tidak ada obat khusus yang dapat menyembuhkan gangguan disosiatif. Namun, pemberian obat-obatan pada beberapa kasus diperlukan untuk meredakan gejala, seperti kecemasan atau depresi.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  ADD PRIMARY KEY (`id_aturan`);

--
-- Indeks untuk tabel `tbl_detail_diagnosa`
--
ALTER TABLE `tbl_detail_diagnosa`
  ADD PRIMARY KEY (`id_detail_diagnosa`);

--
-- Indeks untuk tabel `tbl_diagnosa`
--
ALTER TABLE `tbl_diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`);

--
-- Indeks untuk tabel `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `tbl_hasil_diagnosa`
--
ALTER TABLE `tbl_hasil_diagnosa`
  ADD PRIMARY KEY (`id_hasil_diagnosa`);

--
-- Indeks untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `tbl_penyakit`
--
ALTER TABLE `tbl_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_diagnosa`
--
ALTER TABLE `tbl_detail_diagnosa`
  MODIFY `id_detail_diagnosa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_hasil_diagnosa`
--
ALTER TABLE `tbl_hasil_diagnosa`
  MODIFY `id_hasil_diagnosa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
