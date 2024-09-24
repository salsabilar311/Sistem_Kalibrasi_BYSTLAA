<!-- GA KEPAKE -->
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
        $pdf->Image('assets/img/kai.png', 10, 8, 40); // Gambar di posisi (x=10, y=10), lebar gambar 30
    
        // Set font untuk teks
        $pdf->SetFont('Arial', 'B', 10);
        
        // Teks yang akan ditampilkan
        $text1 = "PT. KERETA API INDONESIA (Persero)";
        $text2 = "UPT BALAI YASA SINYAL TELEKOMUNIKASI DAN LISTRIK ALIRAN ATAS";
        
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
        $headerHeight = 25; // Sesuaikan tinggi kotak sesuai kebutuhan

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

        // Teks ketiga
        $text3 = "Jl. Kiaracondong No. 92, Bandung 402402"; // Contoh teks ketiga
        
        // Tentukan posisi Y untuk teks ketiga
        $yPosition += 5; // Sesuaikan jarak antar baris
        $pdf->SetXY($xPosition, $yPosition);
        // Tambahkan teks ketiga
        $pdf->Cell(0, 5, $text3, 0, 1, 'C'); // Rata tengah

        // Teks keempat
        $text4 = "Toka : 27258, 27253, E-mail:byst@kai.id / byst.new@gmail.com"; // Contoh teks keempat
        
        // Tentukan posisi Y untuk teks keempat
        $yPosition += 4; // Sesuaikan jarak antar baris
        $pdf->SetXY($xPosition, $yPosition);
        // Tambahkan teks keempat
        $pdf->Cell(0, 5, $text4, 0, 1, 'C'); // Rata tengah

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
        $topMargin = 32; // Margin atas
        $boxWidth = $pdf->GetPageWidth() - 10; // Lebar kotak
        $boxHeight = $pdf->GetY() + 210; // Tinggi kotak (sesuaikan sesuai kebutuhan)
        
        // Gambar kotak
        $pdf->Rect($leftMargin, $topMargin, $boxWidth, $boxHeight); // Membuat kotak
    
        // JUDUL
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(0, 10, 'Sertifikat Kalibrasi', 0, 1, 'C');
        $pdf->SetFont('Arial', 'I', 18);
        $pdf->Cell(0, 5, 'CALIBRATION CERTIFICATE', 0, 1, 'C');
    
        // BARIS 1 (identitas dan no order)
        $pdf->SetFont('Arial', '', 10); // Font normal
        $identitasAlat = "IDENTITAS ALAT";
        $noOrder = "No Order: " . $detail_order; // Ambil data no order
        $widthIdentitas = $pdf->GetStringWidth($identitasAlat);
        $widthNoOrder = $pdf->GetStringWidth($noOrder);
        $totalWidth = $pdf->GetPageWidth() - 5; // Lebar halaman dikurangi margin
        $xPositionNoOrder = $totalWidth - $widthNoOrder - 10; // Menghitung posisi untuk no order
        $yPosition = $pdf->GetY() + 10; // Ambil posisi Y saat ini dan tambahkan offset

        $pdf->SetXY(10, $yPosition); // Set posisi X dan Y
        $pdf->Cell(0, 10, $identitasAlat, 0, 0); // Tidak pindah ke baris baru
        $pdf->Line(11, $yPosition + 7, 18 + $widthIdentitas, $yPosition + 7); // Garis horizontal di bawah teks
        $pdf->SetXY($xPositionNoOrder, $yPosition); // Set posisi Y yang sama untuk no order
        $pdf->Cell(0, 10, $noOrder, 0, 1); // Pindah ke baris baru setelah no order

        // BARIS 2 (instrument identification dan order number - font italic)
        $pdf->SetFont('Arial', 'I', 10); // Set font ke italic
        $eng_2_1 = "Instrument Identification"; // Teks untuk baris kedua
        $eng_2_2 = "Order Number"; // Teks untuk baris kedua
        $width_eng_2_1 = $pdf->GetStringWidth($eng_2_1);
        $width_eng_2_2 = $pdf->GetStringWidth($eng_2_2);
        $xPositionEng2_2 = $totalWidth - $width_eng_2_2 - 42; // Sejajar dengan no_order
        $yPositionBarisKedua = $pdf->GetY() - 2; // Kurangi jarak antar baris dengan offset negatif
        $pdf->SetXY(10, $yPositionBarisKedua); // Set posisi X dan Y untuk teks kiri
        $pdf->Cell(0, 4, $eng_2_1, 0, 0); // 0 untuk tidak pindah ke baris baru
        $pdf->SetXY($xPositionEng2_2, $yPositionBarisKedua); // Set posisi Y yang sama untuk Order Number
        $pdf->Cell(0, 4, $eng_2_2, 0, 1); // Pindah ke baris baru setelah teks
        
        $pdf->Ln(10);
        $leftMargin = 20; // set margin kiri
        $pdf->SetX($leftMargin);

        // BARIS 3 (IDENTITAS ALAT)
        // NAMA
        $pdf->SetFont('Arial', '', 10); 
        $namaAlatLabel = "Nama                             : "; // Bagian awal teks
        $namaAlatValue = "DIGITAL MULTIMETER"; // Bagian yang akan dibuat bold
        $pdf->Cell($pdf->GetStringWidth($namaAlatLabel), 10, $namaAlatLabel, 0, 0);
        $pdf->SetFont('Arial', 'B', 10); 
        $pdf->Cell(0, 10, $namaAlatValue, 0, 1); // Pindah ke baris baru setelah teks bold

        $pdf->SetX($leftMargin); 
        $pdf->setFont('Arial', 'I', 10);
        $eng_alat = "Instrument";
        $pdf->Cell($pdf->GetStringWidth($eng_alat), 0, $eng_alat, 0, 1);
        // END NAMA

        // MERK PABRIK
        $pdf->Ln(5);
        $pdf->SetX($leftMargin);

        $pdf->SetFont('Arial', '', 10); 
        $merkPabrikLabel = "Merek Pabrik                 : ";
        $merkPabrikValue = $data['nama_merk']; // Bagian yang akan italic
        $pdf->Cell($pdf->GetStringWidth($merkPabrikLabel), 10, $merkPabrikLabel, 0, 0);
        $pdf->SetFont('Arial', 'I', 10); 
        $pdf->Cell($pdf->GetStringWidth($merkPabrikValue), 10, $merkPabrikValue, 0, 1); // Tambahkan nilai dengan font italic

        $pdf->SetX($leftMargin);
        $pdf->SetFont('Arial', 'I', 10);
        $engMerk = "Manufacturer";
        $pdf->Cell($pdf->GetStringWidth($engMerk), 0, $engMerk, 0, 1);
        // END MERK PABRIK

        // TIPE NO SERI
        $pdf->Ln(5);
        $pdf->SetX($leftMargin);

        $pdf->SetFont('Arial', '', 10); 
        $tipe_label = "Tipe/Nomor Seri            : ";
        $tipe_value = $data['nama_tipe'] . "/" . $data['no_seri']; // Bagian yang akan italic
        $pdf->Cell($pdf->GetStringWidth($tipe_label), 10, $tipe_label, 0, 0);
        $pdf->Cell($pdf->GetStringWidth($tipe_value), 10, $tipe_value, 0, 1); // Tambahkan nilai dengan font italic

        $pdf->SetX($leftMargin);
        $pdf->SetFont('Arial', 'I', 10);
        $engMerk = "Type/Serial Number";
        $pdf->Cell($pdf->GetStringWidth($engMerk), 0, $engMerk, 0, 1);
        // END TIPE NO SERI

        // LAIN-LAIN
        $pdf->Ln(5);
        $pdf->SetX($leftMargin);

        $pdf->SetFont('Arial', '', 10); 
        $lain_lain_label = "Lain-lain                         : ";
        $rentang_ukur = "RENTANG UKUR : --"; // Bagian yang akan italic
        $pdf->Cell($pdf->GetStringWidth($lain_lain_label), 10, $lain_lain_label, 0, 0);
        $pdf->Cell($pdf->GetStringWidth($rentang_ukur), 10, $rentang_ukur, 0, 1); // Tambahkan nilai dengan font italic

        $pdf->SetX($leftMargin);
        $pdf->SetFont('Arial', 'I', 10);
        $engOther = "Other";
        $pdf->Cell($pdf->GetStringWidth($engOther), 0, $engOther, 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $resolusi = "                                RESOLUSI           : Multi resolusi";
        $pdf->Cell($pdf->GetStringWidth($resolusi), 0, $resolusi, 0, 1);
        // END LAIN-LAIN

        // BARIS 4 (IDENTITAS PEMILIK)
        $pdf->Ln(5);
        $pdf->SetFont('Arial', '', 10); // Font normal
        $identitasPemilik = "IDENTITAS PEMILIK";
        $widthPemilik = $pdf->GetStringWidth($identitasPemilik);
        $totalWidth = $pdf->GetPageWidth() - 5; // Lebar halaman dikurangi margin
        $yPosition = $pdf->GetY() + 10; // Ambil posisi Y saat ini dan tambahkan offset
        $pdf->SetXY(10, $yPosition); // Set posisi X dan Y
        $pdf->Cell(0, 10, $identitasPemilik, 0, 0); // Tidak pindah ke baris baru
        $pdf->Line(11, $yPosition + 7, 11 + $widthPemilik, $yPosition + 7); // Garis horizontal di bawah teks

        // BARIS 5 (eng owner identification)
        $pdf->Ln(8);
        $pdf->SetFont('Arial', 'I', 10); // Set font ke italic
        $eng_5 = "Owner Identification"; // Teks untuk baris kedua
        $width_eng_5 = $pdf->GetStringWidth($eng_5);
        $yPositionBarisKedua = $pdf->GetY() - 2; // Kurangi jarak antar baris dengan offset negatif
        $pdf->SetXY(10, $yPositionBarisKedua); // Set posisi X dan Y untuk teks kiri
        $pdf->Cell(0, 7, $eng_5, 0, 0); // 0 untuk tidak pindah ke baris baru

        // OWNER
        $pdf->Ln(15);
        $pdf->SetX($leftMargin);

        $pdf->SetFont('Arial', '', 10); 
        $owner_label = "Nama                             : ";
        $owner_value = $data['name_owner']; // Bagian yang akan italic
        $pdf->Cell($pdf->GetStringWidth($owner_label), 10, $owner_label, 0, 0);
        $pdf->Cell($pdf->GetStringWidth($owner_value), 10, $owner_value, 0, 1); // Tambahkan nilai dengan font italic

        $pdf->SetX($leftMargin);
        $pdf->SetFont('Arial', 'I', 10);
        $engOwner = "Owner";
        $pdf->Cell($pdf->GetStringWidth($engOwner), 0, $engOwner, 0, 1);
        // END OWNER

        // ALAMAT
        $pdf->Ln(5);
        $pdf->SetX($leftMargin);

        $pdf->SetFont('Arial', '', 10); 
        $alamat_label = "Alamat                            : ";
        $alamat_value = $data['address_1']; // Bagian yang akan italic
        $pdf->Cell($pdf->GetStringWidth($alamat_label), 10, $alamat_label, 0, 0);
        $pdf->Cell($pdf->GetStringWidth($alamat_value), 10, $alamat_value, 0, 1); // Tambahkan nilai dengan font italic

        $pdf->SetX($leftMargin);
        $pdf->SetFont('Arial', 'I', 10);
        $engAlamat = "Address";
        $pdf->Cell($pdf->GetStringWidth($engAlamat), 0, $engAlamat, 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $alamat_2 = "                            " . $data['address_2'];
        $pdf->Cell($pdf->GetStringWidth($alamat_2), 0, $alamat_2, 0, 1);
        // END ALAMAT

        // TTD
        // HALAMAN
        $pdf->Ln(20);
        $leftMargin = 130; // set margin kiri
        $pdf->SetX($leftMargin);
        $pdf->SetFont('Arial', '', 10);
        $hal = "Sertifikat ini terdiri dari         4       halaman";
        $pdf->Cell($pdf->GetStringWidth($hal), 0, $hal, 0, 1);

        $pdf->SetX($leftMargin);
        $pdf->SetFont('Arial', 'I', 10);
        $eng_hal = "This certificate includes                 pages";
        $pdf->Cell($pdf->GetStringWidth($eng_hal), 10, $eng_hal, 0, 1);

        // TERBIT
        $pdf->Ln(5);
        $pdf->SetX($leftMargin);
        $pdf->SetFont('Arial', '', 10);
        $terbit = "Diterbitkan tanggal         ";
        $tanggal = date('j F Y'); // Mengambil tanggal sekarang dalam format 'dd-mm-yyyy'
        // Cetak teks "Diterbitkan tanggal" dan tanggal sekarang
        $pdf->Cell($pdf->GetStringWidth($terbit), 0, $terbit, 0, 0); // Mencetak label "Diterbitkan tanggal"
        $pdf->Cell($pdf->GetStringWidth($tanggal), 0, $tanggal, 0, 1); // Mencetak tanggal

        $pdf->SetX($leftMargin);
        $pdf->SetFont('Arial', 'I', 10);
        $eng_date = "Date of issue";
        $pdf->Cell($pdf->GetStringWidth($eng_date), 10, $eng_date, 0, 1);

        // TANDA TANGAN
        $pdf->SetX($leftMargin);
        $pdf->SetFont('Arial', '', 10);
        $jabatan = "KUPT BYSTLAA PT.KAI";
        $pdf->Cell($pdf->GetStringWidth($jabatan), 3, $jabatan, 0, 1);

        $pdf->Ln(20);
        $pdf->SetX($leftMargin);
        $pdf->SetFont('Arial', 'B', 10);
        $manager = "SYIHABUDIN";
        $pdf->Cell($pdf->GetStringWidth($manager), 3, $manager, 0, 1);
        $yPosition = $pdf->GetY(); // Ambil posisi Y saat ini
        $pdf->Line($leftMargin+1, $yPosition, $leftMargin + $pdf->GetStringWidth($manager)+1, $yPosition); // Garis horizontal
        
        $pdf->SetX($leftMargin);
        $pdf->SetFont('Arial', '', 10);
        $nip = "NIP:      42273";
        $pdf->Cell($pdf->GetStringWidth($nip), 5, $nip, 0, 1);
        
        
        // END TTD
    }
    
    // Footer
    function footer_sertif() {
        global $pdf;
        global $data;
        $pdf->SetAutoPageBreak(true, 5);
    
        // Kotak pembungkus
        $leftMargin = 5; // Margin kiri
        $topMargin = 278; // Margin atas
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
    footer_sertif();
    
    // Output PDF ke browser
    $pdf->Output('I', "sertifikat-$detail_order.pdf");
    endif;
?>
