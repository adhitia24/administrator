-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 25. Agustus 2013 jam 09:30
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran`
--

CREATE TABLE IF NOT EXISTS `angsuran` (
  `no_angsuran` varchar(8) NOT NULL,
  `tgl_angsuran` date NOT NULL,
  `no_pinjaman` varchar(8) NOT NULL,
  `angsuran_ke` int(2) NOT NULL,
  `sisa_angsuran` int(7) NOT NULL,
  `sisa_pinjaman` int(7) NOT NULL,
  PRIMARY KEY (`no_angsuran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `angsuran`
--

INSERT INTO `angsuran` (`no_angsuran`, `tgl_angsuran`, `no_pinjaman`, `angsuran_ke`, `sisa_angsuran`, `sisa_pinjaman`) VALUES
('APK001', '2013-08-20', 'PKA001', 1, 17, 1913444);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id` varchar(8) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tgl_berita` date NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `isi_berita` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `tgl_berita`, `kategori`, `isi_berita`) VALUES
('ID001', 'Pengertian Koperasi', '2013-07-02', 'Umum', 'Koperasi berasal dari kata â€œcoâ€ dan â€œoperatioâ€ yang mempunyai arti bekerja sama untuk mencapai tujuan. Secara umum Arifin Chanigo(1984:2) menyatakan koperasi merupakan : â€œSuatu perkumpulan yang beranggotakan orang- orang atau badan- badan yang memberikan kebebasan masuk dan keluar menjadi anggota, dengan kerja sama secara kekeluargaan menjalankan usaha, untuk mempertinggi kesejahteraan anggotanyaâ€'),
('ID002', 'Jenis-jenis Koperasi di Indonesia', '2013-07-04', 'Penting', 'Koperasi Berdasarkan Jenisnya ada 4, yaitu :Koperasi Produksi (Koperasi Produksi melakukan usaha produksi atau menghasilkan barang) Koperasi konsumsi (Koperasi Konsumsi menyediakan semua kebutuhan para anggota dalam bentuk barang) Koperasi Simpan Pinjam (Koperasi Simpan Pinjam melayani para anggotanya untuk menabung dengan mendapatkan imbalan)Koperasi Serba Usaha (Koperasi Serba Usaha (KSU) terdiri atas berbagai jenis usaha) '),
('ID003', 'Sidang Program', '2012-10-29', 'Umum', 'Tanggal 30 dan 31 itu adalah jadwal sidang program'),
('ID004', 'Sidang Program', '2013-07-31', 'Umum', 'Sedang dilakukan sidang program di universitas mercubuana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
  `kd_divisi` varchar(8) NOT NULL,
  `nama_divisi` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_divisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`kd_divisi`, `nama_divisi`) VALUES
('KP001', 'Sekretaris'),
('KP002', 'HRD'),
('KP003', 'Personalia'),
('KP004', 'IT'),
('KP005', 'Produksi'),
('KP006', 'SDM'),
('KP007', 'Supply Barang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `flat_pinjaman`
--

CREATE TABLE IF NOT EXISTS `flat_pinjaman` (
  `kd_flat` varchar(8) NOT NULL,
  `jenis_flat` varchar(50) NOT NULL,
  `jumlah_flat` int(7) NOT NULL,
  PRIMARY KEY (`kd_flat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `flat_pinjaman`
--

INSERT INTO `flat_pinjaman` (`kd_flat`, `jenis_flat`, `jumlah_flat`) VALUES
('F001', 'Golongan 1', 2000000),
('F002', 'Golongan 2', 3500000),
('F003', 'Golongan 3', 4000000),
('F004', 'Golongan 4', 5000000),
('F005', 'Golongan 5', 6000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
--

CREATE TABLE IF NOT EXISTS `pinjaman` (
  `no_pinjaman` varchar(8) NOT NULL,
  `tgl_pinjaman` date NOT NULL,
  `nik` varchar(8) NOT NULL,
  `kd_flat` varchar(8) NOT NULL,
  `angsuran_pokok` int(7) NOT NULL,
  `kali_angsuran` int(2) NOT NULL,
  `bunga_pinjaman` float NOT NULL,
  `angsuran_perbulan` double NOT NULL,
  `status` enum('Belum Lunas','Sudah Lunas') NOT NULL,
  `approval` enum('Sudah disetujui','Belum disetujui','Tidak Disetujui') NOT NULL,
  PRIMARY KEY (`no_pinjaman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjaman`
--

INSERT INTO `pinjaman` (`no_pinjaman`, `tgl_pinjaman`, `nik`, `kd_flat`, `angsuran_pokok`, `kali_angsuran`, `bunga_pinjaman`, `angsuran_perbulan`, `status`, `approval`) VALUES
('PKA001', '2013-08-20', 'AK012', 'F001', 111111, 18, 1.3, 112555.55555556, 'Belum Lunas', 'Sudah disetujui'),
('PKA002', '2013-08-20', 'AK004', 'F002', 194444, 18, 1.3, 196972.22222222, 'Belum Lunas', 'Sudah disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_akun`
--

CREATE TABLE IF NOT EXISTS `trans_akun` (
  `no_akun` varchar(8) NOT NULL,
  `nik` varchar(8) NOT NULL,
  `saldo_trans` double NOT NULL,
  PRIMARY KEY (`no_akun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trans_akun`
--

INSERT INTO `trans_akun` (`no_akun`, `nik`, `saldo_trans`) VALUES
('SA001', 'AK003', 200000),
('SA002', 'AK004', 0),
('SA003', 'AK005', 0),
('SA004', 'AK006', 50000),
('SA005', 'AK007', 0),
('SA006', 'AK008', 0),
('SA007', 'AK009', 0),
('SA008', 'AK010', 0),
('SA009', 'AK011', 0),
('SA010', 'AK012', 0),
('SA011', 'AK013', 0),
('SA012', 'AK014', 0),
('SA013', 'AK015', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_detail`
--

CREATE TABLE IF NOT EXISTS `trans_detail` (
  `no_trans_detail` varchar(8) NOT NULL,
  `tgl_trans` date NOT NULL,
  `no_akun` varchar(8) NOT NULL,
  `kd_jenis` varchar(8) NOT NULL,
  `jmlh_transaksi` double NOT NULL,
  PRIMARY KEY (`no_trans_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trans_detail`
--

INSERT INTO `trans_detail` (`no_trans_detail`, `tgl_trans`, `no_akun`, `kd_jenis`, `jmlh_transaksi`) VALUES
('TSK001', '2013-07-28', 'SA001', 'SKA003', 200000),
('TSK002', '2013-07-29', 'SA004', 'SKA003', 20000),
('TSK003', '2013-07-30', 'SA004', 'SKA003', 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_jenis`
--

CREATE TABLE IF NOT EXISTS `trans_jenis` (
  `kd_jenis` varchar(8) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trans_jenis`
--

INSERT INTO `trans_jenis` (`kd_jenis`, `nama_jenis`) VALUES
('PS004', 'Penarikan Simpanan'),
('SKA001', 'Simpanan Pokok'),
('SKA002', 'Simpanan Wajib'),
('SKA003', 'Simpanan Sukarela');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_koperasi`
--

CREATE TABLE IF NOT EXISTS `unit_koperasi` (
  `kd_koperasi` varchar(8) NOT NULL,
  `nama_unit` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_koperasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unit_koperasi`
--

INSERT INTO `unit_koperasi` (`kd_koperasi`, `nama_unit`) VALUES
('UK001', 'Sosial'),
('UK002', 'Simpan Pinjam'),
('UK003', 'Toko Waserda'),
('UK004', 'Pendidikan'),
('UK005', 'Humas'),
('UK006', 'Kesehatan'),
('UK007', 'Logistik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `nik` varchar(8) NOT NULL,
  `kd_divisi` varchar(8) NOT NULL,
  `kd_koperasi` varchar(8) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nik`, `kd_divisi`, `kd_koperasi`, `nama_user`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `telepon`, `tgl_masuk`, `username`, `password`) VALUES
('AD001', 'KP004', 'UK002', 'Rizky Januari', '1989-02-04', 'Laki-laki', 'Jl. Kemanggisan', '08567296130', '2009-07-25', 'admin', 'admin'),
('AD002', 'KP004', 'UK002', 'Emanuel', '1985-08-26', 'Laki-laki', 'Jl. Tomang Raya', '0215467281', '2002-09-27', 'sihombing', 'sihombing'),
('AD010', 'KP006', 'UK002', 'Usman', '1989-07-11', 'Laki-laki', 'Jl. Kokoban', '021987123', '2012-11-29', 'usman', 'usman'),
('AK003', 'KP001', 'UK005', 'Indah Kalalo', '1989-11-19', 'Perempuan', 'Jl. Pondok indah', '08992345112', '2012-08-16', 'kalalo', 'kalalo'),
('AK004', 'KP002', 'UK003', 'Joko Susilo', '1989-11-30', 'Laki-laki', 'Jl. Ujang', '0218912341', '2012-06-12', 'susilo', 'susilo'),
('AK005', 'KP003', 'UK004', 'Wedi Bari', '1989-12-30', 'Laki-laki', 'Jl. Gang ijo', '08571134516', '2012-05-12', 'wedibari', 'wedibari'),
('AK006', 'KP006', 'UK004', 'Anandita', '1990-11-30', 'Perempuan', 'Jl. Jingga', '0217891235', '2012-02-02', 'anandita', 'anandita'),
('AK007', 'KP003', 'UK003', 'Linda Maryam', '1991-12-04', 'Perempuan', 'Jl. H. Joko', '085812341232', '2012-10-19', 'maryam', 'maryam'),
('AK008', 'KP001', 'UK001', 'Husnul', '2013-07-26', 'Laki-laki', 'Jl. kelinci', '0987654432', '2013-07-03', 'sasa', 'sasa'),
('AK009', 'KP003', 'UK006', 'Rachmad', '1990-02-12', 'Laki-laki', 'Jl. Meruya Selatan', '08159576089', '2013-02-23', 'rahmad', 'rahmad'),
('AK010', 'KP005', 'UK004', 'Ruri', '1989-03-12', 'Perempuan', 'Jl. kereta kuda', '02199887712', '2013-07-31', 'ruri', 'ruri'),
('AK011', 'KP002', 'UK004', 'Leoni S', '1989-07-25', 'Perempuan', 'Jl. acaca', '08571233890', '2011-08-27', 'leoni', 'leoni'),
('AK012', 'KP003', 'UK006', 'Anggun', '1988-09-29', 'Perempuan', 'Jl. Sukawati', '085678231923', '2010-08-24', 'anggun', 'anggun'),
('AK013', 'KP006', 'UK006', 'Ajeng', '1988-09-27', 'Perempuan', 'Jl. joja', '085678232345', '2009-09-26', 'ajeng', 'ajeng'),
('AK014', 'KP007', 'UK006', 'Robi sabila', '2006-09-28', 'Laki-laki', 'Jl. haji ujang', '085721423412', '2011-08-09', 'sabila', 'sabila'),
('AK015', 'KP003', 'UK004', 'ita derita', '1988-08-17', 'Perempuan', 'Jl. kusuma', '021998867', '2010-08-29', 'derita', 'derita');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
