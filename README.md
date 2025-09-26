# Sistem Kalibrasi Besaran Listrik BYSTLAA

## Project Overview
Proyek ini merupakan hasil kerja praktek yang dilaksanakan di UPT Balai Yasa Sintel dan LAA. Adapun tujuan dari proyek ini adalah untuk mempermudah dalam pengelolaan data kalibrasi. Sistem yang dibangun dirancang untuk menyimpan, mengelola, dan menampilkan data hasil kalibrasi secara lebih terstruktur sehingga proses pencatatan menjadi lebih efisien dan meminimalkan risiko kehilangan data. Dengan adanya sistem ini, diharapkan kegiatan kalibrasi dapat dilakukan dengan lebih cepat dan akurat.


## Fitur
Sistem ini dilengkapi dengan beberapa fitur utama yang mendukung proses pengelolaan data kalibrasi diantaranya yaitu:

### Pengolahan data kalibrasi
Data kalibrasi yang masuk akan diolah terlebih dahulu. Proses ini mencakup input data kalibrasi, edit data kalibrasi, delete data kalibrasi dan view data kalibrasi. Setelah data diolah, sistem akan memastikan bahwa semua informasi yang dimasukkan valid dan sesuai dengan standar yang berlaku. Data yang telah diverifikasi kemudian disimpan ke dalam basis data untuk keperluan pencatatan dan pengelolaan lebih lanjut.

### Pengolahan data pengukuran
Data pengukuran yang diterima dari pengguna akan melalui proses serupa. Tahapan ini mencakup input data pengukuran dan edit data pengukuran. Data ini kemudian dianalisis untuk menentukan akurasi alat yang dikalibrasi dan menghitung parameter penting seperti standar deviasi standar, rata-rata pengukuran, serta koreksi nilai terhadap standar.

### Riwayat kalibrasi
Hasil dari pengolahan data kalibrasi dan pengukuran digunakan untuk menghasilkan sertifikat kalibrasi. Proses ini melibatkan penggabungan data yang relevan, format sertifikat yang sesuai, serta validasi akhir sebelum sertifikat dicetak atau disimpan dalam sistem. Sertifikat ini berfungsi sebagai dokumentasi resmi hasil kalibrasi dan dapat digunakan oleh pemilik perangkat untuk keperluan laporan.


## Framework
Sistem ini dikembangkan menggunakan **PHP Native** sebagai basis utama pengolahan data dan logika backend, serta memanfaatkan **Bootstrap** untuk mempermudah pengembangan antarmuka pengguna.


## Screenshots
<img width="1365" height="632" alt="Screenshot 2024-11-23 142109" src="https://github.com/user-attachments/assets/e42a09e1-f692-4f25-81a8-b625c1bcb4d7" />
<img width="1365" height="631" alt="Screenshot 2024-11-23 142338" src="https://github.com/user-attachments/assets/fb0e0dc1-9280-46e9-b20b-1dd213020390" />
<img width="1365" height="632" alt="Screenshot 2024-11-23 142917" src="https://github.com/user-attachments/assets/75589469-0407-4506-ac8e-1b0a12602d0f" />
<img width="1365" height="632" alt="Screenshot 2024-11-23 143433" src="https://github.com/user-attachments/assets/a3147a93-6cb4-4104-932b-495e9d0ca7b9" />


## File terkait
1. [Beranda](https://github.com/salsabilar311/Sistem_Kalibrasi_BYSTLAA/blob/main/index.php)
2. [Form data kalibrasi](https://github.com/salsabilar311/Sistem_Kalibrasi_BYSTLAA/blob/main/data_kalibrasi.php)
3. [Form input data kalibrasi](https://github.com/salsabilar311/Sistem_Kalibrasi_BYSTLAA/blob/main/input_kalibrasi.php)
4. [Form edit data kalibrasi](https://github.com/salsabilar311/Sistem_Kalibrasi_BYSTLAA/blob/main/edit_kalibrasi.php)
5. [Form detail kalibrasi](https://github.com/salsabilar311/Sistem_Kalibrasi_BYSTLAA/blob/main/detail_kalibrasi.php)
6. [Form data pengukuran](https://github.com/salsabilar311/Sistem_Kalibrasi_BYSTLAA/blob/main/input_pengukuran.php)
7. [Form progres kalibrasi](https://github.com/salsabilar311/Sistem_Kalibrasi_BYSTLAA/blob/main/progres.php)
8. [Form analisis kalibrasi](https://github.com/salsabilar311/Sistem_Kalibrasi_BYSTLAA/blob/main/analisis.php)
