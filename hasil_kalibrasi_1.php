<?php
    // Include library FPDF
    require('library/fpdf.php');
    include 'koneksi.php';

    $detail_order = $_GET['detail_order'];
    $query = "SELECT d.no_order, d.detail_order, m.nama_merk, t.nama_tipe, d.no_seri, d.tgl_kalibrasi, p.name_owner, d.calibrator, d.tgl_masuk, d.tgl_sertifikat, p.address_1, p.address_2 
            FROM detail d
            INNER JOIN merk m ON d.id_merk = m.id_merk
            INNER JOIN tipe t ON d.id_tipe = t.id_tipe
            INNER JOIN pemilik p ON d.region = p.region
            WHERE d.detail_order = '$detail_order'";
    $result = mysqli_query($conn, $query);
    if ($data = mysqli_fetch_assoc($result)):

    // Membuat instance dari FPDF
    $pdf = new FPDF();
    // Menambahkan halaman
    $pdf->AddPage();
    
    // Header
    function header_sertif() {
        global $pdf;
        global $data;
    
        // Tambahkan gambar di sebelah kiri
        $pdf->Image('assets/img/kai.png', 10, 8, 30); // Gambar di posisi (x=10, y=10), lebar gambar 30
    
        // Set font untuk teks
        $pdf->SetFont('Arial', 'B', 10);
        
        // Teks yang akan ditampilkan
        $text1 = "UPT BALAI YASA SINYAL TELEKOMUNIKASI DAN LISTRIK ALIRAN ATAS - PT. KAI";
        $text2 = "SPECIALIST TOOLS CALIBRATION";
        
        // Hitung lebar teks
        $textWidth1 = $pdf->GetStringWidth($text1);
        $textWidth2 = $pdf->GetStringWidth($text2);
        $maxTextWidth = max($textWidth1, $textWidth2); // Lebar maksimum antara kedua teks
    
        // Hitung posisi X untuk menempatkan teks di tengah halaman
        $pageWidth = $pdf->GetPageWidth(); // Lebar halaman
        $xPosition = ($pageWidth - $maxTextWidth) / 2; // Pusatkan teks di halaman
    
        // Tentukan posisi Y untuk teks (misalnya Y = 10)
        $yPosition = 10; // Posisi Y untuk teks pertama

        // Tentukan tinggi kotak pembungkus
        $headerHeight = 20; // Sesuaikan tinggi kotak sesuai kebutuhan

        // Gambar kotak pembungkus
        $pdf->Rect(5, $yPosition - 5, $pageWidth - 10, $headerHeight, 'D'); // Kotak dengan border
    
        // Tentukan posisi teks pertama
        $pdf->SetXY($xPosition, $yPosition);
        // Tambahkan teks pertama
        $pdf->Cell(0, 5, $text1, 0, 1, 'C'); // Rata tengah
        
        // Tentukan posisi Y untuk teks kedua (turunkan sedikit dari teks pertama)
        $yPosition += 5; // Sesuaikan jarak antar baris
        $pdf->SetXY($xPosition, $yPosition);
        // Tambahkan teks kedua
        $pdf->Cell(0, 5, $text2, 0, 1, 'C'); // Rata tengah
    
         // Set font untuk teks ketiga dengan ukuran lebih kecil
        $pdf->SetFont('Arial', '', 8); // Ukuran font lebih kecil untuk teks ketiga

        // Set kembali posisi setelah header jika diperlukan
        $pdf->Ln(5); // Pindahkan cursor ke bawah setelah header (misal 5 pt ke bawah)
    }
    
    // Body
    function body_sertif() {
        global $pdf;
        global $data;
        global $detail_order;

        // Kotak pembungkus
        $leftMargin = 5; // Margin kiri
        $topMargin = 28; // Margin atas
        $boxWidth = $pdf->GetPageWidth() - 10; // Lebar kotak
        $boxHeight = $pdf->GetY() + 228; // Tinggi kotak (sesuaikan sesuai kebutuhan)
        
        // Gambar kotak
        $pdf->Rect($leftMargin, $topMargin, $boxWidth, $boxHeight); // Membuat kotak
    
        // BARIS 1 (NO ORDER)
        $pdf->Ln(5);
        $leftMargin = 140; // set margin kiri
        $pdf->SetX($leftMargin);

        $pdf->SetFont('Arial', '', 10); 
        $no_order_label = "No. Order     : "; // Bagian awal teks
        $no_order_value = $data['detail_order']; // Bagian yang akan dibuat bold
        $pdf->Cell($pdf->GetStringWidth($no_order_label), 10, $no_order_label, 0, 0); 
        $pdf->Cell(0, 10, $no_order_value, 0, 1); // Pindah ke baris baru setelah teks bold
        $pdf->SetX($leftMargin);
        $pdf->Cell(0, 0, 'Laboratorium Kalibrasi Kelistrikan', 0, 1);
        $pdf->SetX($leftMargin);
        $pdf->Cell(0, 9, 'Halaman ke 2 dari 4 halaman', 0, 1);
        // END BARIS 1

        $leftMargin = 20; // set margin kiri
        $pdf->SetX($leftMargin);

        // BARIS 2 (DATA KALIBRASI)
        // NAMA
        $pdf->SetFont('Arial', '', 10); 
        $namaAlatLabel = "Nama                            : "; // Bagian awal teks
        $namaAlatValue = "DIGITAL MULTIMETER"; // Bagian yang akan dibuat bold
        $pdf->Cell($pdf->GetStringWidth($namaAlatLabel), 10, $namaAlatLabel, 0, 0);
        $pdf->Cell(0, 10, $namaAlatValue, 0, 1); // Pindah ke baris baru setelah teks bold
        // END NAMA

        // TIPE NO SERI
        $pdf->SetX($leftMargin);
        $pdf->SetFont('Arial', '', 10); 
        $tipe_label = "Tipe/Nomor Seri            : ";
        $tipe_value = $data['nama_tipe'] . " / " . $data['no_seri']; // Bagian yang akan italic
        $pdf->Cell($pdf->GetStringWidth($tipe_label), 0, $tipe_label, 0, 0);
        $pdf->Cell($pdf->GetStringWidth($tipe_value), 0, $tipe_value, 0, 1); // Tambahkan nilai dengan font italic
        // END TIPE NO SERI

        // MERK PABRIK
        $pdf->Ln(5);
        $pdf->SetX($leftMargin);
        $pdf->SetFont('Arial', '', 10); 
        $merkPabrikLabel = "Merek Pabrik                 : ";
        $merkPabrikValue = $data['nama_merk']; // Bagian yang akan italic
        $pdf->Cell($pdf->GetStringWidth($merkPabrikLabel), 0, $merkPabrikLabel, 0, 0);
        $pdf->SetFont('Arial', 'I', 10); 
        $pdf->Cell($pdf->GetStringWidth($merkPabrikValue), 0, $merkPabrikValue, 0, 0); // Tambahkan nilai dengan font italic
        // END MERK PABRIK

        // SUHU
        $leftMargin = 140;
        $pdf->SetX($leftMargin);
        $pdf->SetFont('Arial', '', 10); 
        $suhu = "Suhu ruang  : (23 ± 3)°C";
        $suhu = utf8_decode($suhu);  // Menggunakan utf8_decode untuk karakter khusus
        $pdf->Cell(0, 0, $suhu, 0, 1, 'L');
        // END SUHU

        // TGL PENERIMAAN
        $pdf->Ln(5);
        $leftMargin = 20;
        $pdf->SetX($leftMargin);
        $tgl_masuk_asli = $data['tgl_masuk'];
        $tgl_masuk_formatted = date("d F Y", strtotime($tgl_masuk_asli)); // Format: 01 Januari 2024
        $tgl_masuk = "Tanggal Penerimaan     : ";
        $tgl = $tgl_masuk_formatted;
        $pdf->Cell(0, 0, $tgl_masuk . $tgl, 0, 1, 'L');
        // END TGL PENERIMAAN

        // KELEMBAPAN
        $leftMargin = 140;
        $pdf->SetX($leftMargin);
        $pdf->SetFont('Arial', '', 10); 
        $kelembapan = "Kelembapan : (53 ± 3) %";
        $kelembapan = utf8_decode($kelembapan);  // Menggunakan utf8_decode untuk karakter khusus
        $pdf->Cell(0, 0, $kelembapan, 0, 1, 'L');
        // END KELEMBAPAN

        // TGL KALIBRASI
        $pdf->Ln(5);
        $leftMargin = 20;
        $pdf->SetX($leftMargin);
        $tgl_kalibrasi_asli = $data['tgl_kalibrasi'];
        $tgl_kalibrasi_formatted = date("d F Y", strtotime($tgl_kalibrasi_asli)); // Format: 01 Januari 2024
        $tgl_kalibrasi = "Tanggal Kalibrasi           : ";
        $tgl = $tgl_kalibrasi_formatted;
        $pdf->Cell(0, 0, $tgl_kalibrasi . $tgl, 0, 1, 'L');
        // END TGL KALIBRASI

        // TEMPAT KALIBRASI
        $pdf->Ln(5);
        $pdf->SetX($leftMargin);
        $tempat_kalibrasi = 'Tempat Kalibrasi            : UPT Balai Yasa Sinyal Telekomunikasi dan Listrik Aliran Atas - PT. KAI';
        $pdf->Cell(0, 0, $tempat_kalibrasi, 0, 1);
        // END TEMPAT KALIBRASI

        // BARIS 3 (HASIL KALIBRASI)
        $pdf->SetFont('Arial', 'B', 10); // Set font tebal
        $hasil_kalibrasi = "HASIL KALIBRASI";
        $widthHasil = $pdf->GetStringWidth($hasil_kalibrasi);
        $totalWidth = $pdf->GetPageWidth() - 5; // Lebar halaman dikurangi margin
        $yPosition = $pdf->GetY() + 10; // Ambil posisi Y saat ini dan tambahkan offset
        $pdf->SetXY(10, $yPosition); // Set posisi X dan Y
        $pdf->Cell(0, 0, $hasil_kalibrasi, 0, 0, 'C'); // Teks ditampilkan di tengah

        // Buat garis horizontal tepat di bawah teks
        $yLinePosition = $yPosition + 2; // Atur posisi Y garis sedikit di bawah teks
        $centerX = ($pdf->GetPageWidth() - $widthHasil) / 2; // Posisi X garis di tengah halaman
        $pdf->Line($centerX, $yLinePosition, $centerX + $widthHasil, $yLinePosition); // Garis horizontal di bawah teks
        // END HASIL KALIBRASI
    }

    // Tabel
    function tabel_tegangan(){
        global $pdf;
        global $data;
        global $conn;
        global $detail_order;

        // TABEL TEGANGAN DC
        $pdf->Ln(8);
        $leftMargin = 50;
        $pdf->SetX($leftMargin);
        $pdf->SetFont('Arial', '', 10);
        $tegangan_dc = 'Tegangan DC';
        $pdf->Cell(0, 0, $tegangan_dc, 0, 0);

        $pdf->Ln(3);
        $pdf->SetX($leftMargin);
        $x = $pdf->GetX(); // Mendapatkan posisi X setelah cell sebelumnya
        $y = $pdf->GetY();
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(20, 8, 'Range', 1, 0, 'C');
        $pdf->MultiCell(20, 4, "Nilai\nStandar", 1, 'C');
        $pdf->SetXY($x + 40, $y);
        $pdf->MultiCell(25, 4, "Penunjukan\nAlat", 1, 'C');
        $pdf->SetXY($x + 65, $y);
        $pdf->Cell(20, 8, 'Koreksi', 1, 0, 'C');
        $pdf->Cell(30, 8, 'Ketidakpastian', 1, 0, 'C');

        $pengukuran = mysqli_query($conn, "SELECT p.besaran_ukur, p.range_, p.standar, p.x1, p.x2, p.x3, p.x4, p.x5, p.x6, p.rata_rata, p.koreksi_standar, p.std_dev, p.rata_rata_koreksi
                                                              FROM detail d
                                                              INNER JOIN pengukuran p ON d.detail_order = p.detail_order
                                                              WHERE d.detail_order = '$detail_order' AND
                                                              p.besaran_ukur = 'Tegangan DC'");
        $prev_range = '';
        while ($ukur = mysqli_fetch_assoc($pengukuran)) {
            // Menambah baris baru
            $pdf->Ln();
            $pdf->SetX(50);
            $pdf->SetFont('Arial', '', 10); // Normal font untuk isi data
        
            // Jika nilai range_ berbeda dari sebelumnya, tampilkan nilai range_
            if ($ukur['range_'] != $prev_range) {
                // Menampilkan nilai range_
                $pdf->Cell(20, 5, $ukur['range_'], 1, 0, 'C');
        
                // Update nilai range sebelumnya
                $prev_range = $ukur['range_'];
            } else {
                // Jika range_ sama, tambahkan cell kosong
                $pdf->Cell(20, 5, '', 1, 0, 'C');
            }
        
            // Menampilkan data lainnya
            $pdf->Cell(20, 5, $ukur['standar'], 1, 0, 'C');
            $pdf->Cell(25, 5, $ukur['rata_rata'], 1, 0, 'C');
            $pdf->Cell(20, 5, $ukur['koreksi_standar'], 1, 0, 'C');
            $pdf->Cell(30, 5, $ukur['rata_rata_koreksi'], 1, 0, 'C');
        }
        // END TABEL TEGANGAN DC

        // TABEL TEGANGAN AC
        $pdf->Ln(10);
        $leftMargin = 50;
        $pdf->SetX($leftMargin);
        $pdf->SetFont('Arial', '', 10);
        $tegangan_dc = 'Tegangan AC';
        $pdf->Cell(0, 0, $tegangan_dc, 0, 0);

        $pdf->Ln(3);
        $pdf->SetX($leftMargin);
        $x = $pdf->GetX(); // Mendapatkan posisi X setelah cell sebelumnya
        $y = $pdf->GetY();
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(20, 8, 'Range', 1, 0, 'C');
        $pdf->MultiCell(20, 4, "Nilai\nStandar", 1, 'C');
        $pdf->SetXY($x + 40, $y);
        $pdf->MultiCell(25, 4, "Penunjukan\nAlat", 1, 'C');
        $pdf->SetXY($x + 65, $y);
        $pdf->Cell(20, 8, 'Koreksi', 1, 0, 'C');
        $pdf->Cell(30, 8, 'Ketidakpastian', 1, 0, 'C');

        $pengukuran = mysqli_query($conn, "SELECT p.besaran_ukur, p.range_, p.standar, p.x1, p.x2, p.x3, p.x4, p.x5, p.x6, p.rata_rata, p.koreksi_standar, p.std_dev, p.rata_rata_koreksi
                                                              FROM detail d
                                                              INNER JOIN pengukuran p ON d.detail_order = p.detail_order
                                                              WHERE d.detail_order = '$detail_order' AND
                                                              p.besaran_ukur = 'Tegangan AC'");
        $prev_range = '';
        while ($ukur = mysqli_fetch_assoc($pengukuran)) {
            // Menambah baris baru
            $pdf->Ln();
            $pdf->SetX(50);
            $pdf->SetFont('Arial', '', 10); // Normal font untuk isi data
        
            // Jika nilai range_ berbeda dari sebelumnya, tampilkan nilai range_
            if ($ukur['range_'] != $prev_range) {
                // Menampilkan nilai range_
                $pdf->Cell(20, 5, $ukur['range_'], 1, 0, 'C');
        
                // Update nilai range sebelumnya
                $prev_range = $ukur['range_'];
            } else {
                // Jika range_ sama, tambahkan cell kosong
                $pdf->Cell(20, 5, '', 1, 0, 'C');
            }
        
            // Menampilkan data lainnya
            $pdf->Cell(20, 5, $ukur['standar'], 1, 0, 'C');
            $pdf->Cell(25, 5, $ukur['rata_rata'], 1, 0, 'C');
            $pdf->Cell(20, 5, $ukur['koreksi_standar'], 1, 0, 'C');
            $pdf->Cell(30, 5, $ukur['rata_rata_koreksi'], 1, 0, 'C');
        }
        // END TABEL TEGANGAN AC

        $pdf->SetAutoPageBreak(true, 0);
        $pdf->SetFont('Arial', '', 8);
        $pdf->Ln(10);
        $pdf->Cell(0, 5, 'Alamat : UPT Balai Yasa Sinyal Telekomunikasi dan Listrik Aliran Atas - PT. KAI, Jl. Kiaracondong No. 92, Bandung 40272, Indonesia', 0, 1, 'C');
        // $pdf->Ln(5);
        $pdf->Cell(0, 2, 'E-mail:byst@kai.id / byst.new@gmail.com Toka : 27258, 27253', 0, 1, 'C');
    }
    
    // Footer
    function footer_sertif() {
        global $pdf;
        global $data;
        $pdf->SetAutoPageBreak(true, 0);
    
        // Kotak pembungkus
        $leftMargin = 5; // Margin kiri
        $topMargin = 283; // Margin atas
        $boxWidth = $pdf->GetPageWidth() - 10; // Lebar kotak
        $boxHeight = 10; // Tinggi kotak (sesuaikan sesuai kebutuhan)
    
        // Set warna latar belakang (abu-abu)
        $pdf->SetFillColor(200, 200, 200); // RGB untuk abu-abu
        $pdf->Rect($leftMargin, $topMargin, $boxWidth, $boxHeight, 'F'); // 'F' untuk fill (isi) kotak
    
        // Set warna garis menjadi hitam
        $pdf->SetDrawColor(0, 0, 0); // RGB untuk hitam
        $pdf->Rect($leftMargin, $topMargin, $boxWidth, $boxHeight); // Gambar garis kotak
    
        // Atur posisi untuk teks agar berada di dalam kotak
        $pdf->SetXY($leftMargin + 2, $topMargin + 2); // Set posisi X dan Y dengan offset 2 untuk padding
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(0, 3, 'Dilarang menggandakan sebagian isi Sertifikat ini tanpa persetujuan tertulis dari Kepala UPT BYSTLAA - PT. KAI', 0, 1, 'C');
        $pdf->Cell(0, 3.7, 'atau Spesialist tools calibration UPT BYSTLAA - PT. KAI', 0, 1, 'C');
    }
    

    // Memanggil function
    header_sertif();
    body_sertif();
    tabel_tegangan();
    footer_sertif();
    
    // Output PDF ke browser
    $pdf->Output('I', "hasil-kalibrasi-1_$detail_order.pdf");
    endif;
?>
