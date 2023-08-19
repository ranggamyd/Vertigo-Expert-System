--
-- Database: `sp_vertigo`
--
-- --------------------------------------------------------
--
-- Struktur dari tabel `admin`
--
CREATE TABLE `admin` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` enum('laki-laki', 'perempuan', 'lainnya') NOT NULL,
  `alamat` text DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL
);

--
-- Dumping data untuk tabel `admin`
--
INSERT INTO
  `admin` (
    `id`,
    `nama`,
    `jk`,
    `alamat`,
    `username`,
    `password`
  )
VALUES
  (
    1,
    'Administator',
    'perempuan',
    'New York',
    'admin',
    '$2y$10$L4zXv9/dscZqbem34beK1uAlnlblqoIkEGFqFVU5eJtjAwsde.YQC'
  );

-- --------------------------------------------------------
--
-- Struktur dari tabel `detail_hasil`
--
CREATE TABLE `detail_hasil` (
  `id` int NOT NULL,
  `id_pasien` int NOT NULL,
  `id_penyakit` int NOT NULL,
  `presentase` double NOT NULL
);

-- --------------------------------------------------------
--
-- Struktur dari tabel `gejala`
--
CREATE TABLE `gejala` (
  `id` int NOT NULL,
  `kode_gejala` char(5) NOT NULL,
  `nama_gejala` varchar(255) NOT NULL,
  `bobot` double NOT NULL
);

--
-- Dumping data untuk tabel `gejala`
--
INSERT INTO
  `gejala` (`id`, `kode_gejala`, `nama_gejala`, `bobot`)
VALUES
  (1, 'G1', 'Mual', 0.4),
  (2, 'G2', 'Muntah', 0.6),
  (3, 'G3', 'Keringat Dingin', 0.5),
  (4, 'G4', 'Pandangan Kabur', 0.3),
  (5, 'G5', 'Seperti Mabok Perjalanan', 0.7),
  (6, 'G6', 'Tidak Mampu Berderi Tegak', 0.5),
  (7, 'G7', 'Sensasi Kepala Berputar', 0.8),
  (
    8,
    'G8',
    'Tidak mampu berdiri atau berjalan',
    0.7
  ),
  (9, 'G9', 'Kehilangan pendengaran sementara', 0.6),
  (10, 'G10', 'Terjadi dalam beberapa menit', 0.5),
  (11, 'G11', 'Telinga berdengung', 0.6),
  (
    12,
    'G12',
    'Sensitif terhadap cahaya dan bunyi',
    0.6
  ),
  (13, 'G13', 'Kepala pusing', 0.7),
  (14, 'G14', 'Faktor Genetik', 0.4),
  (15, 'G15', 'Pandangan Sulit fokus', 0.6),
  (16, 'G16', 'Lingkungan berputar 2 arah', 0.7);

-- --------------------------------------------------------
--
-- Struktur dari tabel `hasil`
--
CREATE TABLE `hasil` (
  `id` int NOT NULL,
  `id_pasien` int NOT NULL,
  `id_penyakit` int NOT NULL,
  `presentase` int NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- --------------------------------------------------------
--
-- Struktur dari tabel `kategori`
--
CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `kode_kategori` char(5) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL
);

--
-- Dumping data untuk tabel `kategori`
--
INSERT INTO
  `kategori` (
    `id`,
    `kode_kategori`,
    `nama_kategori`,
    `deskripsi`
  )
VALUES
  (
    1,
    'K1',
    'Vertigo Perifer',
    'Vertigo perifer merujuk pada jenis vertigo yang disebabkan oleh gangguan di bagian telinga dalam atau saraf vestibular yang terkait. Hal ini dapat terjadi akibat BPPV, inflamasi telinga bagian dalam (misalnya, labyrinthitis), atau karena perubahan dalam fungsi vestibular. Gejalanya meliputi rasa pusing atau sensasi berputar, ketidakseimbangan, mual, dan muntah. Vertigo perifer umumnya tidak terkait dengan masalah pada otak dan sistem saraf pusat.'
  ),
  (
    2,
    'K2',
    'Vertigo Sentral',
    'Vertigo sentral terjadi akibat gangguan di otak atau sistem saraf pusat. Hal ini bisa disebabkan oleh kondisi seperti migrain, stroke, tumor otak, atau multiple sclerosis. Vertigo sentral cenderung lebih persisten dan berkepanjangan, mungkin disertai dengan gejala neurologis lain seperti kesulitan berbicara, kelemahan pada tubuh, atau perubahan fungsi kognitif. Diagnosa dan penanganan vertigo sentral membutuhkan evaluasi medis yang lebih mendalam dan pengawasan oleh dokter spesialis.'
  );

-- --------------------------------------------------------
--
-- Struktur dari tabel `pasien`
--
CREATE TABLE `pasien` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `JK` enum('laki-laki', 'perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL
);

-- --------------------------------------------------------
--
-- Struktur dari tabel `penyakit`
--
CREATE TABLE `penyakit` (
  `id` int NOT NULL,
  `kode_penyakit` char(5) NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL,
  `id_kategori` int NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `solusi` text DEFAULT NULL
);

--
-- Dumping data untuk tabel `penyakit`
--
INSERT INTO
  `penyakit` (
    `id`,
    `kode_penyakit`,
    `nama_penyakit`,
    `id_kategori`,
    `deskripsi`,
    `solusi`
  )
VALUES
  (
    1,
    'P1',
    'Bening Parazosysmal Position Vertigo',
    1,
    'Bening Paroksismal Pozisyonel Vertigo (BPPV) adalah kelainan pada sistem vestibular yang menyebabkan rasa pusing atau vertigo saat perubahan posisi kepala. Ini adalah salah satu jenis vertigo yang paling umum terjadi.',
    'Untuk mengatasi Bening Paroksismal Pozisyonel Vertigo (BPPV), ada beberapa solusi yang dapat membantu. Pertama, terdapat manuver Epley atau Semont yang melibatkan gerakan kepala tertentu untuk mengembalikan kristal di dalam telinga ke posisi semula. Anda dapat mencari petunjuk langkah demi langkah tentang cara melakukan manuver ini, atau meminta bantuan dari dokter atau fisioterapis. Selain itu, terapi vestibular juga dapat membantu. Terapi ini melibatkan latihan untuk meningkatkan keseimbangan dan koordinasi mata, yang dilakukan dengan bimbingan fisioterapis atau ahli terapi vestibular. Latihan-latihan ini akan memperkuat sistem vestibular dan mengurangi gejala BPPV. Terakhir, dalam beberapa kasus, dokter mungkin meresepkan obat anti-vertigo atau obat anti-mual untuk membantu mengatasi gejala yang terkait dengan BPPV. Namun, penting untuk diingat bahwa pengobatan yang tepat dapat bervariasi untuk setiap individu, jadi selalu penting untuk berkonsultasi dengan dokter atau profesional kesehatan yang berpengalaman dalam menangani BPPV.'
  ),
  (
    2,
    'P2',
    'Meniere',
    1,
    'Pen,yakit Meniere adalah kondisi telinga kronis yang ditandai oleh serangan vertigo yang hebat, tinitus, gangguan pendengaran, dan rasa penuh di telinga.',
    'Untuk mengatasi gejala Meniere, terdapat beberapa solusi yang dapat membantu. Pertama, mengikuti diet rendah garam dapat membantu mengurangi retensi cairan di tubuh dan mengurangi serangan vertigo. Dokter juga dapat meresepkan obat-obatan seperti obat anti-vertigo, obat anti-mual, atau diuretik untuk mengurangi intensitas serangan dan mengontrol gejala lainnya. Selain itu, terapi fisik atau rehabilitasi vestibular dengan bantuan ahli terapi dapat meningkatkan keseimbangan dan koordinasi gerakan. Dalam kasus yang lebih parah, dokter mungkin melakukan injeksi obat ke dalam telinga untuk mengendalikan serangan. Penting untuk berkonsultasi dengan dokter atau spesialis THT untuk mendapatkan penanganan yang sesuai dengan kondisi individu.'
  ),
  (
    3,
    'P3',
    'Migren Vestibular',
    1,
    'Migren Vestibular adalah bentuk migren yang menyebabkan gejala vestibular seperti pusing, mual, muntah, dan ketidakseimbangan. Penyebab pasti migren vestibular belum diketahui, namun diyakini terkait dengan gangguan dalam fungsi sistem vestibular di dalam telinga.',
    'Solusi untuk mengatasi migren vestibular meliputi penggunaan obat-obatan untuk meredakan gejala akut dan mencegah serangan berulang, serta menghindari pemicu yang dapat memicu serangan migren, seperti stres, pola makan yang tidak teratur, kurang tidur, atau makanan tertentu.'
  ),
  (
    4,
    'P4',
    'Multiple Sclerosis',
    2,
    'Multiple Sclerosis (MS) adalah penyakit autoimun yang mempengaruhi sistem saraf pusat, termasuk otak dan sumsum tulang belakang. Gejala MS dapat bervariasi, termasuk gangguan koordinasi, kelemahan otot, kesulitan berjalan, gangguan penglihatan, dan gangguan kognitif.',
    'Solusi dalam mengelola MS melibatkan penggunaan obat-obatan yang diresepkan oleh dokter untuk mengontrol peradangan dan mengurangi gejala, serta terapi fisik, terapi okupasi, dan terapi bicara untuk membantu mempertahankan dan meningkatkan kualitas hidup.'
  ),
  (
    5,
    'P5',
    'Vertigo Serebeleum',
    2,
    'Vertigo Serebelum terjadi akibat gangguan pada bagian otak yang disebut serebelum. Gejala utama adalah vertigo yang intens dan disertai dengan koordinasi gerakan yang buruk.',
    'Solusi untuk mengatasi Vertigo Serebelum meliputi terapi rehabilitasi serebelum untuk memperbaiki koordinasi dan keseimbangan gerakan, obat-obatan untuk mengendalikan gejala vertigo, serta pengelolaan gejala pendukung seperti menjaga lingkungan yang aman dan menghindari pemicu yang dapat memperburuk vertigo.'
  );

-- --------------------------------------------------------
--
-- Struktur dari tabel `penyakit_gejala`
--
CREATE TABLE `penyakit_gejala` (
  `id` int NOT NULL,
  `id_penyakit` int NOT NULL,
  `id_gejala` int NOT NULL
);

--
-- Dumping data untuk tabel `penyakit_gejala`
--
INSERT INTO
  `penyakit_gejala` (`id`, `id_penyakit`, `id_gejala`)
VALUES
  (1, 1, 1),
  (2, 1, 2),
  (3, 1, 3),
  (4, 1, 4),
  (5, 1, 5),
  (6, 1, 6),
  (7, 1, 7),
  (8, 2, 8),
  (9, 2, 9),
  (10, 3, 1),
  (11, 3, 2),
  (12, 3, 4),
  (13, 3, 9),
  (14, 3, 10),
  (15, 3, 11),
  (16, 3, 12),
  (17, 3, 13),
  (18, 4, 4),
  (19, 4, 6),
  (20, 4, 7),
  (21, 4, 14),
  (22, 5, 15),
  (23, 5, 16);

-- --------------------------------------------------------
--
-- Indexes for dumped tables
--
--
-- Indeks untuk tabel `admin`
--
ALTER TABLE
  `admin`
ADD
  PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_hasil`
--
ALTER TABLE
  `detail_hasil`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `id_pasien` (`id_pasien`),
ADD
  KEY `id_penyakit` (`id_penyakit`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE
  `gejala`
ADD
  PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE
  `hasil`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `id_pasien` (`id_pasien`),
ADD
  KEY `id_penyakit` (`id_penyakit`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE
  `kategori`
ADD
  PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE
  `pasien`
ADD
  PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE
  `penyakit`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `penyakit_gejala`
--
ALTER TABLE
  `penyakit_gejala`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `id_penyakit` (`id_penyakit`),
ADD
  KEY `id_gejala` (`id_gejala`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--
--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE
  `admin`
MODIFY
  `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_hasil`
--
ALTER TABLE
  `detail_hasil`
MODIFY
  `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE
  `gejala`
MODIFY
  `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE
  `hasil`
MODIFY
  `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE
  `kategori`
MODIFY
  `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE
  `pasien`
MODIFY
  `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE
  `penyakit`
MODIFY
  `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penyakit_gejala`
--
ALTER TABLE
  `penyakit_gejala`
MODIFY
  `id` int NOT NULL AUTO_INCREMENT;