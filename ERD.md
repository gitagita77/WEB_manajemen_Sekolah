# Entity Relationship Diagram (ERD) - Manajemen Sekolah

## Daftar Entitas

1. **users**: Menyimpan data pengguna aplikasi (Admin, Guru, Siswa) untuk autentikasi.
2. **siswa**: Menyimpan data profil lengkap siswa.
3. **kelas**: Menyimpan data kelas.
4. **mata_pelajaran**: Menyimpan data mata pelajaran.
5. **jam_pelajaran**: Menyimpan referensi waktu jam pelajaran.
6. **jadwal_kelas**: Menyimpan jadwal pelajaran per kelas.
7. **absensi**: Menyimpan data kehadiran siswa.
8. **poin_prestasi**: Mencatat prestasi yang diraih siswa.
9. **poin_pelanggaran**: Mencatat pelanggaran yang dilakukan siswa.
10. **poin_kategori**: Master data kategori poin (prestasi/pelanggaran) beserta bobotnya.
11. **semester**: Data semester akademik.
12. **tahun_ajaran**: Data tahun ajaran.
13. **aktivitas_siswa**: Log aktivitas detail siswa.
14. **settings**: Konfigurasi sistem dinamis.
15. **activity_logs**: Audit trail penggunaan sistem.
16. **notifications**: Sistem notifikasi pengguna.

## Atribut Utama dan Relasi

### 1. users
*   **PK**: `id`
*   **Attributes**: username, password, role, status
*   **Relations**:
    *   Referenced by `kelas.wali_kelas_id` (One-to-Many)
    *   Referenced by `mata_pelajaran.guru_id` (One-to-Many)
    *   Referenced by `jadwal_kelas.guru_id` (One-to-Many)

### 2. siswa
*   **PK**: `id`
*   **Attributes**: nis, nisn, nama_lengkap, kelas_id, total_poin_prestasi
*   **FK**: `kelas_id` -> `kelas.id`
*   **Relations**:
    *   Belongs to `kelas` (Many-to-One)
    *   Has Many `absensi`
    *   Has Many `poin_prestasi`
    *   Has Many `poin_pelanggaran`

### 3. kelas
*   **PK**: `id`
*   **Attributes**: kode_kelas, nama_kelas, wali_kelas_id
*   **FK**: `wali_kelas_id` -> `users.id`
*   **Relations**:
    *   Has Many `siswa`
    *   Has Many `jadwal_kelas`

### 4. mata_pelajaran
*   **PK**: `id`
*   **Attributes**: kode_mapel, nama_mapel, guru_id
*   **FK**: `guru_id` -> `users.id`
*   **Relations**:
    *   Has Many `jadwal_kelas`

### 5. jadwal_kelas
*   **PK**: `id`
*   **FK**: `mapel_id`, `kelas_id`, `guru_id`
*   **Relations**:
    *   Link table connecting Class, Subject, and Teacher for a specific time slot.

### 6. absensi
*   **PK**: `id`
*   **FK**: `siswa_id`, `mapel_id`
*   **Relations**:
    *   Records attendance for a Student in a Subject.

### 7. poin_prestasi & poin_pelanggaran
*   **PK**: `id`
*   **FK**: `siswa_id`
*   **Relations**:
    *   Tracks points associated with a Student.

## Ringkasan Logika Sistem
Sistem ini berpusat pada entitas `siswa`. Siswa dikelompokkan dalam `kelas`. Proses belajar mengajar diatur melalui `jadwal_kelas` yang menghubungkan `kelas`, `mata_pelajaran`, dan `guru`. Kehadiran dicatat di `absensi`. Perilaku siswa dilacak melalui sistem poin (`poin_prestasi` dan `poin_pelanggaran`) yang mempengaruhi skor total siswa.
