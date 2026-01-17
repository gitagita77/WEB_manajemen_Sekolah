-- Generated from tabel struktur.xlsx
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `siswa`;
DROP TABLE IF EXISTS `kelas`;
DROP TABLE IF EXISTS `mata_pelajaran`;
DROP TABLE IF EXISTS `jam_pelajaran`;
DROP TABLE IF EXISTS `jadwal_kelas`;
DROP TABLE IF EXISTS `absensi`;
DROP TABLE IF EXISTS `poin_prestasi`;
DROP TABLE IF EXISTS `poin_pelanggaran`;
DROP TABLE IF EXISTS `poin_kategori`;
DROP TABLE IF EXISTS `semester`;
DROP TABLE IF EXISTS `tahun_ajaran`;
DROP TABLE IF EXISTS `aktivitas_siswa`;
DROP TABLE IF EXISTS `settings`;
DROP TABLE IF EXISTS `activity_logs`;
DROP TABLE IF EXISTS `notifications`;
SET FOREIGN_KEY_CHECKS=1;;

CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) UNIQUE NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `nama_lengkap` VARCHAR(100) NOT NULL,
  `jenis_kelamin` ENUM('L','P') DEFAULT 'L',
  `nip` VARCHAR(30) UNIQUE,
  `tempat_lahir` VARCHAR(50),
  `tanggal_lahir` DATE,
  `alamat` TEXT,
  `no_telepon` VARCHAR(15),
  `email` VARCHAR(100) UNIQUE,
  `role` ENUM('admin','guru','siswa') DEFAULT 'guru',
  `jabatan` VARCHAR(100),
  `bidang_studi` VARCHAR(100),
  `foto` VARCHAR(255),
  `status` ENUM('aktif','nonaktif','pensiun','pindah') DEFAULT 'aktif',
  `last_login` TIMESTAMP,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `siswa` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nis` VARCHAR(20) UNIQUE NOT NULL,
  `nisn` VARCHAR(20) UNIQUE NOT NULL,
  `nama_lengkap` VARCHAR(100) NOT NULL,
  `jenis_kelamin` ENUM('L','P') NOT NULL,
  `tempat_lahir` VARCHAR(50),
  `tanggal_lahir` DATE,
  `agama` VARCHAR(20),
  `alamat` TEXT,
  `rt_rw` VARCHAR(10),
  `kelurahan` VARCHAR(50),
  `kecamatan` VARCHAR(50),
  `kota` VARCHAR(50),
  `provinsi` VARCHAR(50),
  `kode_pos` VARCHAR(10),
  `no_telepon` VARCHAR(15),
  `email` VARCHAR(100),
  `nama_ayah` VARCHAR(100),
  `nama_ibu` VARCHAR(100),
  `pekerjaan_ayah` VARCHAR(100),
  `pekerjaan_ibu` VARCHAR(100),
  `no_telepon_ortu` VARCHAR(15),
  `kelas_id` INT,
  `foto` VARCHAR(255),
  `status` ENUM('aktif','alumni','pindah','keluar','dropout') DEFAULT 'aktif',
  `tahun_masuk` YEAR,
  `tahun_keluar` YEAR,
  `total_poin_prestasi` INT DEFAULT 0,
  `total_poin_pelanggaran` INT DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `kelas` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `kode_kelas` VARCHAR(10) UNIQUE NOT NULL,
  `nama_kelas` VARCHAR(50) NOT NULL,
  `tingkat` ENUM('X','XI','XII') NOT NULL,
  `jurusan` VARCHAR(50),
  `wali_kelas_id` INT NULL,
  `kapasitas` INT DEFAULT 30,
  `ruangan` VARCHAR(20),
  `tahun_ajaran` VARCHAR(9),
  `semester` ENUM('ganjil','genap') DEFAULT 'ganjil',
  `status` ENUM('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `mata_pelajaran` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `kode_mapel` VARCHAR(10) UNIQUE NOT NULL,
  `nama_mapel` VARCHAR(100) NOT NULL,
  `kategori` ENUM('umum','jurusan','peminatan','ekstrakurikuler') DEFAULT 'umum',
  `tingkat` ENUM('X','XI','XII','semua') DEFAULT 'semua',
  `jurusan` VARCHAR(50),
  `guru_id` INT NULL,
  `kelas_id` INT NULL,
  `semester` ENUM('ganjil','genap','tahunan') DEFAULT 'tahunan',
  `tahun_ajaran` VARCHAR(9),
  `jam_per_minggu` INT DEFAULT 2,
  `deskripsi` TEXT,
  `status` ENUM('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `jam_pelajaran` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `sesi` INT NOT NULL,
  `jam_mulai` TIME NOT NULL,
  `jam_selesai` TIME NOT NULL,
  `keterangan` VARCHAR(50),
  `jenis` ENUM('normal','istirahat','upacara','khusus') DEFAULT 'normal',
  `hari` ENUM('senin','selasa','rabu','kamis','jumat','sabtu','minggu','semua') DEFAULT 'semua',
  `status` ENUM('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `jadwal_kelas` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `hari` ENUM('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') NOT NULL,
  `sesi` INT NOT NULL,
  `mapel_id` INT,
  `kelas_id` INT,
  `guru_id` INT,
  `ruangan` VARCHAR(20),
  `tahun_ajaran` VARCHAR(9),
  `semester` ENUM('ganjil','genap') DEFAULT 'ganjil',
  `status` ENUM('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY unique_jadwal (hari, sesi, kelas_id, tahun_ajaran, semester)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `absensi` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `siswa_id` INT NOT NULL,
  `mapel_id` INT NOT NULL,
  `tanggal` DATE NOT NULL,
  `sesi` INT NOT NULL,
  `status` ENUM('hadir','sakit','izin','alfa','terlambat','dinas','cuti') DEFAULT 'alfa',
  `keterangan` TEXT,
  `waktu_absen` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `guru_id` INT NULL,
  `metode_absen` ENUM('manual','qr_code','fingerprint','face_recognition') DEFAULT 'manual',
  `latitude` DECIMAL(10,8),
  `longitude` DECIMAL(11,8),
  `bukti_izin` VARCHAR(255),
  `verified_by` INT NULL,
  `verified_at` TIMESTAMP,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY unique_absensi (siswa_id, mapel_id, tanggal, sesi)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `poin_prestasi` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `siswa_id` INT NOT NULL,
  `jenis_prestasi` ENUM('akademik','non-akademik','sosial','olahraga','seni','lainnya') DEFAULT 'akademik',
  `kategori` ENUM('prestasi','penghargaan','lomba','kejuaraan') DEFAULT 'prestasi',
  `nama_prestasi` VARCHAR(200) NOT NULL,
  `deskripsi` TEXT,
  `tingkat` ENUM('sekolah','kecamatan','kabupaten','provinsi','nasional','internasional') NOT NULL,
  `peringkat` ENUM('juara_1','juara_2','juara_3','harapan','partisipasi') DEFAULT 'partisipasi',
  `poin` INT NOT NULL,
  `tanggal` DATE NOT NULL,
  `penyelenggara` VARCHAR(100),
  `lokasi` VARCHAR(100),
  `keterangan` TEXT,
  `dokumen` VARCHAR(255),
  `foto` VARCHAR(255),
  `created_by` INT NULL,
  `status` ENUM('pending','approved','rejected') DEFAULT 'pending',
  `approved_by` INT NULL,
  `approved_at` TIMESTAMP,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `poin_pelanggaran` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `siswa_id` INT NOT NULL,
  `jenis_pelanggaran` ENUM('ringan','sedang','berat') NOT NULL,
  `kategori_pelanggaran` VARCHAR(100),
  `deskripsi` TEXT NOT NULL,
  `poin` INT NOT NULL,
  `tanggal` DATE NOT NULL,
  `sanksi` TEXT,
  `lokasi` VARCHAR(100),
  `saksi` VARCHAR(100),
  `ditindak_oleh` INT NULL,
  `status` ENUM('pending','ditindak','selesai') DEFAULT 'pending',
  `tindak_lanjut` TEXT,
  `follow_up_by` INT NULL,
  `follow_up_at` TIMESTAMP,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `poin_kategori` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `jenis` ENUM('prestasi','pelanggaran') NOT NULL,
  `nama_kategori` VARCHAR(100) NOT NULL,
  `deskripsi` TEXT,
  `poin_min` INT DEFAULT 0,
  `poin_max` INT DEFAULT 0,
  `sanksi` TEXT,
  `penghargaan` TEXT,
  `status` ENUM('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `semester` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `tahun_ajaran` VARCHAR(9) NOT NULL,
  `semester` ENUM('ganjil','genap') NOT NULL,
  `tanggal_mulai` DATE NOT NULL,
  `tanggal_selesai` DATE NOT NULL,
  `status` ENUM('aktif','selesai','akan_datang') DEFAULT 'akan_datang',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY unique_semester (tahun_ajaran, semester)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tahun_ajaran` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `tahun_ajaran` VARCHAR(9) UNIQUE NOT NULL,
  `tanggal_mulai` DATE NOT NULL,
  `tanggal_selesai` DATE NOT NULL,
  `status` ENUM('aktif','selesai','akan_datang') DEFAULT 'akan_datang',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `aktivitas_siswa` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `siswa_id` INT NOT NULL,
  `jenis_aktivitas` ENUM('absensi','prestasi','pelanggaran','perubahan_data','lainnya') NOT NULL,
  `deskripsi` TEXT NOT NULL,
  `tanggal` DATE NOT NULL,
  `waktu` TIME NOT NULL,
  `created_by` INT NULL,
  `referensi_id` INT,
  `referensi_tabel` VARCHAR(50),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `settings` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `setting_key` VARCHAR(100) UNIQUE NOT NULL,
  `setting_value` TEXT,
  `setting_group` VARCHAR(50) DEFAULT 'general',
  `setting_type` ENUM('text','number','boolean','json','date','time') DEFAULT 'text',
  `label` VARCHAR(100),
  `description` TEXT,
  `options` TEXT,
  `is_public` BOOLEAN DEFAULT FALSE,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `activity_logs` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `activity` VARCHAR(255) NOT NULL,
  `module` VARCHAR(50),
  `action` VARCHAR(50),
  `details` TEXT,
  `ip_address` VARCHAR(45),
  `user_agent` TEXT,
  `referrer` VARCHAR(255),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `notifications` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `title` VARCHAR(200) NOT NULL,
  `message` TEXT NOT NULL,
  `type` ENUM('info','warning','success','danger') DEFAULT 'info',
  `is_read` BOOLEAN DEFAULT FALSE,
  `link` VARCHAR(255),
  `data` JSON,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `read_at` TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Add foreign keys after tables exist
SET FOREIGN_KEY_CHECKS=0;
ALTER TABLE `siswa` ADD CONSTRAINT fk_siswa_kelas_id FOREIGN KEY (`kelas_id`) REFERENCES `kelas`(`id`) ON DELETE SET NULL;
ALTER TABLE `kelas` ADD CONSTRAINT fk_kelas_wali_kelas_id FOREIGN KEY (`wali_kelas_id`) REFERENCES `users`(`id`) ON DELETE SET NULL;
ALTER TABLE `mata_pelajaran` ADD CONSTRAINT fk_mata_pelajaran_guru_id FOREIGN KEY (`guru_id`) REFERENCES `users`(`id`) ON DELETE SET NULL;
ALTER TABLE `mata_pelajaran` ADD CONSTRAINT fk_mata_pelajaran_kelas_id FOREIGN KEY (`kelas_id`) REFERENCES `kelas`(`id`) ON DELETE CASCADE;
ALTER TABLE `jadwal_kelas` ADD CONSTRAINT fk_jadwal_kelas_mapel_id FOREIGN KEY (`mapel_id`) REFERENCES `mata_pelajaran`(`id`) ON DELETE CASCADE;
ALTER TABLE `jadwal_kelas` ADD CONSTRAINT fk_jadwal_kelas_kelas_id FOREIGN KEY (`kelas_id`) REFERENCES `kelas`(`id`) ON DELETE CASCADE;
ALTER TABLE `jadwal_kelas` ADD CONSTRAINT fk_jadwal_kelas_guru_id FOREIGN KEY (`guru_id`) REFERENCES `users`(`id`) ON DELETE CASCADE;
ALTER TABLE `absensi` ADD CONSTRAINT fk_absensi_siswa_id FOREIGN KEY (`siswa_id`) REFERENCES `siswa`(`id`) ON DELETE CASCADE;
ALTER TABLE `absensi` ADD CONSTRAINT fk_absensi_mapel_id FOREIGN KEY (`mapel_id`) REFERENCES `mata_pelajaran`(`id`) ON DELETE CASCADE;
ALTER TABLE `absensi` ADD CONSTRAINT fk_absensi_guru_id FOREIGN KEY (`guru_id`) REFERENCES `users`(`id`) ON DELETE SET NULL;
ALTER TABLE `absensi` ADD CONSTRAINT fk_absensi_verified_by FOREIGN KEY (`verified_by`) REFERENCES `users`(`id`) ON DELETE SET NULL;
ALTER TABLE `poin_prestasi` ADD CONSTRAINT fk_poin_prestasi_siswa_id FOREIGN KEY (`siswa_id`) REFERENCES `siswa`(`id`) ON DELETE CASCADE;
ALTER TABLE `poin_prestasi` ADD CONSTRAINT fk_poin_prestasi_created_by FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE SET NULL;
ALTER TABLE `poin_prestasi` ADD CONSTRAINT fk_poin_prestasi_approved_by FOREIGN KEY (`approved_by`) REFERENCES `users`(`id`) ON DELETE SET NULL;
ALTER TABLE `poin_pelanggaran` ADD CONSTRAINT fk_poin_pelanggaran_siswa_id FOREIGN KEY (`siswa_id`) REFERENCES `siswa`(`id`) ON DELETE CASCADE;
ALTER TABLE `poin_pelanggaran` ADD CONSTRAINT fk_poin_pelanggaran_ditindak_oleh FOREIGN KEY (`ditindak_oleh`) REFERENCES `users`(`id`) ON DELETE SET NULL;
ALTER TABLE `poin_pelanggaran` ADD CONSTRAINT fk_poin_pelanggaran_follow_up_by FOREIGN KEY (`follow_up_by`) REFERENCES `users`(`id`) ON DELETE SET NULL;
ALTER TABLE `aktivitas_siswa` ADD CONSTRAINT fk_aktivitas_siswa_siswa_id FOREIGN KEY (`siswa_id`) REFERENCES `siswa`(`id`) ON DELETE CASCADE;
ALTER TABLE `aktivitas_siswa` ADD CONSTRAINT fk_aktivitas_siswa_created_by FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE SET NULL;
ALTER TABLE `activity_logs` ADD CONSTRAINT fk_activity_logs_user_id FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE;
ALTER TABLE `notifications` ADD CONSTRAINT fk_notifications_user_id FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
