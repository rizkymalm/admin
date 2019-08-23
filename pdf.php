<?php


if (isset($_POST['from'])) {
    require('pdf/fpdf181/fpdf.php');
    require('apps/config/db.php');
    if ($_POST['show']=="semua")
    {
      $dari=$_POST['from'];
      $sampai=$_POST['to'];
      if ($_POST['socmed']=="facebook") {
        $tabday="Ldate";
        $uid="Fuid";
      }else{
        $tabday="Ldate";
        $uid="oauth_uid";
      }

      $postfrom=date("Y-m-d",strtotime($_POST['from']));
      $postto=date("Y-m-d",strtotime($_POST['to']));



      // kita akan membuat class baru yang mewarisi sifat dari class FPDF
      // tujuannya agar lebih memudahkan editing
      class PDF extends FPDF
      {
      function LoadDataFromSQL($sql)
      {
        $hasil=mysql_query($sql) or die(mysql_error());
       
        $data = array();
        while($rows=mysql_fetch_array($hasil)){
          $data[] = $rows;
      }
        return $data;
      }

      function changedate($now){
        $date=date("d M",strtotime($now));
      }


      function Header()
      {
        // $datefrom=date("d M Y",strtotime($_POST['from']));
        // $dateto=date("d M Y",strtotime($_POST['to']));
        // $postfrom=date("Y-m-d",strtotime($_POST['from']));
        // $postto=date("Y-m-d",strtotime($_POST['to']));
        // if ($_POST['socmed']=="facebook") {
        //   $tabday="Ldate";
        //   $uid="Fuid";
        // }else{
        //   $tabday="Ldate";
        //   $uid="oauth_uid";
        // }
        // Logo
        // $this->Image('image/stmik_mercusuar.jpg',10,5,30);    
        // Arial bold 12
        $this->SetFont('Arial','B',15);
        // membuat cell kosong dengan panjang 80
        // $this->Cell(80);
        // judul  
        $this->Cell(30,10,'PT.Centrin Online Prima','C');
        // line break dengan tinggi 20
        $this->Ln(20);
        $this->Cell(190,1,'','B',1,'L');
        $this->Cell(190,1,'','B',0,'L');



      }



      function Footer()
      {
        // mengatur posisi 1,5 cm ke bawah
        $this->SetY(-15);
        // arial italic 8
        $this->SetFont('Arial','I',8);
        // penomoran halaman
        $this->Cell(0,10,'Page '.$this->PageNo().'',0,0,'C');
      }

      function FancyTable($header, $data)
      {
        $datefrom=date("d M Y",strtotime($_POST['from']));
        $dateto=date("d M Y",strtotime($_POST['to']));
        $postfrom=date("Y-m-d",strtotime($_POST['from']));
        $postto=date("Y-m-d",strtotime($_POST['to']));
        if ($_POST['socmed']=="facebook") {
          $tabday="Ldate";
          $uid="Fuid";
          $uname="Ffname";
        }else{
          $tabday="Ldate";
          $uid="oauth_uid";
          $uname="username";
        }
        $this->SetFont('Times','B',12); // Times 12
        $this->Ln(10);
        $this->Cell(60);
        $this->Cell(10,10,'Data Pengguna Hotspot','C');
        $this->Ln(10);
        $this->SetFont('Times','I',8); // Times 12
        $this->SetTextColor(132,132,132);
        $this->Cell(10,10,'Periode '.$datefrom.' s/d '.$dateto.'');
        $this->Ln(10);


        $total=mysql_query("SELECT * FROM user_$_POST[socmed] WHERE $tabday BETWEEN '$postfrom' AND '$postto'");
        $tsum=mysql_num_rows($total);
        $totalakun=mysql_query("SELECT * FROM user_$_POST[socmed] WHERE $tabday BETWEEN '$postfrom' AND '$postto' GROUP BY $uid");
        $takun=mysql_num_rows($totalakun);
        $this->SetFont('Times','',12);
        $this->SetTextColor(0,0,0);
        $this->cell(50,10,'Social Media');
        $this->cell(30,10,': '.$_POST['socmed'].'');
        $this->Ln(8);
        $this->Cell(50,10,'Total Klik');
        $this->Cell(30,10,': '.$tsum.'');
        $this->Ln(8);
        $this->Cell(50,10,'Akun Terdaftar');
        $this->Cell(30,10,': '.$takun.'');
        $this->Ln(20);


        // Colors, line width and bold font
        $this->SetFillColor(255,165,74);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
         /*  $w adalah variabel lebar dari kolom data
                  dalam kasus ini, kolom no lebarnya 20, propinsi 100
               dan upah 60 */
        $w = array( 30, 65, 65, 30);
        for($i=0;$i<count($header);$i++)
          $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();
        // tentukan warna background and fontnya  
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('','',10);
        // Data
        $fill = false;
        foreach($data as $row)
        {
          $num=mysql_query("SELECT * FROM user_$_POST[socmed] WHERE $tabday='$row[$tabday]'");
          $count=mysql_num_rows($num);

          $akun=mysql_query("SELECT * FROM user_$_POST[socmed] WHERE $tabday='$row[$tabday]' GROUP BY $uid ");
          $countakun=mysql_num_rows($akun);

          $datasum=mysql_query("SELECT SUM(visitperday) AS visit FROM user_$_POST[socmed] WHERE $tabday='$row[$tabday]'");    
          $sum=mysql_fetch_array($datasum);

          $date=date("d M",strtotime($row[$tabday]));


          $this->Cell($w[0],8,$date,'LR',0,'C',$fill);
          if ($_POST['socmed']=="facebook") {
            $this->Cell($w[1],8,$row['Femail'],'LR',0,'L',$fill);
          }else{
            $this->Cell($w[1],8,$row['fname']." ".$row['lname'],'LR',0,'L',$fill);
          }

          $this->Cell($w[2],8,"@".$row[$uname],'LR',0,'L',$fill);
          $this->Cell($w[3],8,$row['visitperday'],'LR',0,'C',$fill);
          $this->Ln();
          $fill = !$fill;         
        }
        // Closing line
        $this->Ln(10);
       } 
      }

      $pdf = new PDF();
      if ($_POST['socmed']=="facebook") {
        $header = array('Tanggal', 'Email', 'Username', 'Klik perhari');
      }else{
        $header = array('Tanggal', 'Nama Lengkap', 'Username', 'Klik perhari');
      }
      $query="SELECT * FROM user_$_POST[socmed] WHERE $tabday BETWEEN '$postfrom' AND '$postto'";
      $data = $pdf->LoadDataFromSQL($query);
      $pdf->SetFont('Arial','',11);
      $pdf->AddPage();
      $pdf->FancyTable($header,$data);
	
      //$pdf->Output();
	$filename='data pengguna hotspot';
      // pengulangan agar dokumen ada isinya dan kelihatan penomorannya
      $pdf->Output('report via '.$_POST['socmed'].' '.date("dmy").'.pdf','I'); // menampilkan hasil...

      // ***************************************************** End *************************************************************//
    }
    else if ($_POST['show']=="tanggal")
    {
      // ***************************************************** Start ***********************************************************//
      $dari=$_POST['from'];
      $sampai=$_POST['to'];
      if ($_POST['socmed']=="facebook") {
        $tabday="Ldate";
        $uid="Fuid";
      }else{
        $tabday="Ldate";
        $uid="oauth_uid";
      }
      $postfrom=date("Y-m-d",strtotime($_POST['from']));
      $postto=date("Y-m-d",strtotime($_POST['to']));
      // kita akan membuat class baru yang mewarisi sifat dari class FPDF
      // tujuannya agar lebih memudahkan editing
      class PDF extends FPDF
      {
        function LoadDataFromSQL($sql)
        {
          $hasil=mysql_query($sql) or die(mysql_error());
         
          $data = array();
          while($rows=mysql_fetch_array($hasil)){
            $data[] = $rows;
          }
          return $data;
        }
        function changedate($now){
          $date=date("d M",strtotime($now));
        }
        function Header()
        {
          $datefrom=date("d M Y",strtotime($_POST['from']));
          $dateto=date("d M Y",strtotime($_POST['to']));
          $postfrom=date("Y-m-d",strtotime($_POST['from']));
          $postto=date("Y-m-d",strtotime($_POST['to']));
          if ($_POST['socmed']=="facebook") {
            $tabday="Ldate";
            $uid="Fuid";
          }else{
            $tabday="Ldate";
            $uid="oauth_uid";
          }
          // Logo
          // $this->Image('image/stmik_mercusuar.jpg',10,5,30);          
          // Arial bold 12
          $this->SetFont('Arial','B',15);
          // membuat cell kosong dengan panjang 80
          // $this->Cell(80);
          // judul
          $this->Cell(30,10,'PT.Centrin Online Prima','C');
          // line break dengan tinggi 20
          $this->Ln(20);
          $this->Cell(190,1,'','B',1,'L');
          $this->Cell(190,1,'','B',0,'L');


          $this->SetFont('Times','B',12); // Times 12
          $this->Ln(10);
          $this->Cell(60);
          $this->Cell(10,10,'Data Pengguna Hotspot Berdasarkan Tanggal','C');
          $this->Ln(10);
          $this->SetFont('Times','I',8); // Times 12
          $this->SetTextColor(132,132,132);
          $this->Cell(10,10,'Periode '.$datefrom.' s/d '.$dateto.'');
          $this->Ln(10);

	  // mencari nilai total visitperday dari tanggal inputan
          $total=mysql_query("SELECT SUM(visitperday) AS visit FROM user_$_POST[socmed] WHERE $tabday BETWEEN '$postfrom' AND '$postto'");
          $tsum=mysql_fetch_array($total);
	  //-----//
	  //mencari nilai total akun terdaftar dari tanggal inputan
          $totalakun=mysql_query("SELECT * FROM user_$_POST[socmed] WHERE $tabday BETWEEN '$postfrom' AND '$postto' GROUP BY $uid");
          $takun=mysql_num_rows($totalakun);
	  //-----//
          $this->SetFont('Times','',12);
          $this->SetTextColor(0,0,0);
          $this->Cell(50,10,'Total Klik');
          $this->Cell(30,10,': '.$tsum['visit'].'');
          $this->Ln(8);
          $this->Cell(50,10,'Akun Terdaftar');
          $this->Cell(30,10,': '.$takun.'');
          $this->Ln(20);
        }

        function Footer()
        {
          // mengatur posisi 1,5 cm ke bawah
          $this->SetY(-15);
          // arial italic 8
          $this->SetFont('Arial','I',8);
          // penomoran halaman
          $this->Cell(0,10,'Page '.$this->PageNo().'',0,0,'C');
        }

        function FancyTable($header, $data)
        {
          if ($_POST['socmed']=="facebook") {
            $tabday="Ldate";
            $uid="Fuid";
          }else{
            $tabday="Ldate";
            $uid="oauth_uid";
          }
          // Colors, line width and bold font
          $this->SetFillColor(255,165,74);
          $this->SetTextColor(255);
          $this->SetDrawColor(128,0,0);
          $this->SetLineWidth(.3);
          $this->SetFont('','B');
           /*  $w adalah variabel lebar dari kolom data
                    dalam kasus ini, kolom no lebarnya 20, propinsi 100
                 dan upah 60 */
          $w = array( 30, 90, 30, 40);
          for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
          $this->Ln();
          // tentukan warna background and fontnya  
          $this->SetFillColor(224,235,255);
          $this->SetTextColor(0);
          $this->SetFont('');
          // Data
          $fill = false;
          foreach($data as $row)
          {
            $num=mysql_query("SELECT * FROM user_$_POST[socmed] WHERE $tabday='$row[$tabday]'");
            $count=mysql_num_rows($num);

            $akun=mysql_query("SELECT * FROM user_$_POST[socmed] WHERE $tabday='$row[$tabday]' GROUP BY $uid ");
            $countakun=mysql_num_rows($akun);

            $datasum=mysql_query("SELECT SUM(visitperday) AS visitor FROM user_$_POST[socmed] WHERE $tabday='$row[$tabday]'");    
            $sum=mysql_fetch_array($datasum);

            $date=date("d M",strtotime($row[$tabday]));


            $this->Cell($w[0],8,$date,'LR',0,'C',$fill);
            $this->Cell($w[1],8,$_POST['socmed'],'LR',0,'L',$fill);
            $this->Cell($w[2],8,$count,'LR',0,'C',$fill);
            $this->Cell($w[3],8,$sum['visitor'],'LR',0,'C',$fill);
            $this->Ln();
            $fill = !$fill;
           
          }
          // Closing line
          $this->Ln(10);
        } 
      }
      $pdf = new PDF();


      $header = array('Tanggal', 'Social Media', 'Jumlah Akun', 'Jumlah Kunjungan');
      $query="SELECT * FROM user_$_POST[socmed] WHERE $tabday BETWEEN '$postfrom' AND '$postto' GROUP BY $tabday";
      $data = $pdf->LoadDataFromSQL($query);

      $pdf->SetFont('Arial','',11);
      $pdf->AddPage();
      $pdf->FancyTable($header,$data);
      $pdf->Output('report via '.$_POST['socmed'].' '.date("dmy").'.pdf','I');

      // pengulangan agar dokumen ada isinya dan kelihatan penomorannya

      $pdf->Output(); // menampilkan hasil...
    // ***************************************************** End *************************************************************//
  }elseif ($_POST['show']=="user") {
    // ***************************************************** Start ***********************************************************//



      $dari=$_POST['from'];
      $sampai=$_POST['to'];
      if ($_POST['socmed']=="facebook") {
        $tabday="Ldate";
        $uid="Fuid";
      }else{
        $tabday="Ldate";
        $uid="oauth_uid";
      }
      $postfrom=date("Y-m-d",strtotime($_POST['from']));
      $postto=date("Y-m-d",strtotime($_POST['to']));
      // kita akan membuat class baru yang mewarisi sifat dari class FPDF
      // tujuannya agar lebih memudahkan editing
      class PDF extends FPDF
      {
        function LoadDataFromSQL($sql)
        {
          $hasil=mysql_query($sql) or die(mysql_error());
         
          $data = array();
          while($rows=mysql_fetch_array($hasil)){
            $data[] = $rows;
          }
          return $data;
        }
        function changedate($now){
          $date=date("d M",strtotime($now));
        }
        function Header()
        {

        $this->SetFont('Arial','B',15);
        // membuat cell kosong dengan panjang 80
        // $this->Cell(80);
        // judul  
        $this->Cell(30,10,'PT.Centrin Online Prima','C');
        // line break dengan tinggi 20
        $this->Ln(20);
        $this->Cell(190,1,'','B',1,'L');
        $this->Cell(190,1,'','B',0,'L');



        }

        function Footer()
        {
          // mengatur posisi 1,5 cm ke bawah
          $this->SetY(-15);
          // arial italic 8
          $this->SetFont('Arial','I',8);
          // penomoran halaman
          $this->Cell(0,10,'Page '.$this->PageNo().'',0,0,'C');
        }

        function FancyTable($header, $data)
        {
          $datefrom=date("d M Y",strtotime($_POST['from']));
          $dateto=date("d M Y",strtotime($_POST['to']));
          $postfrom=date("Y-m-d",strtotime($_POST['from']));
          $postto=date("Y-m-d",strtotime($_POST['to']));
          if ($_POST['socmed']=="facebook") {
            $tabday="Ldate";
            $uid="Fuid";
            $uname="Ffname";
          }else{
            $tabday="Ldate";
            $uid="oauth_uid";
            $uname="username";
          }
          $this->SetFont('Times','B',12); // Times 12
          $this->Ln(10);
          $this->Cell(60);
          $this->Cell(10,10,'Data Pengguna Hotspot Berdasarkan User','C');
          $this->Ln(10);
          $this->SetFont('Times','I',8); // Times 12
          $this->SetTextColor(132,132,132);
          $this->Cell(10,10,'Periode '.$datefrom.' s/d '.$dateto.'');
          $this->Ln(10);
          $total=mysql_query("SELECT * FROM user_$_POST[socmed] WHERE $tabday BETWEEN '$postfrom' AND '$postto'");
          $tsum=mysql_num_rows($total);
          $totalakun=mysql_query("SELECT * FROM user_$_POST[socmed] WHERE $tabday BETWEEN '$postfrom' AND '$postto'");
          $takun=mysql_num_rows($totalakun);
          $this->SetFont('Times','',12);
          $this->SetTextColor(0,0,0);
          $this->Cell(50,10,'Total Klik');
          $this->Cell(30,10,': '.$tsum.'');
          $this->Ln(8);
          $this->Cell(50,10,'Akun Terdaftar');
          $this->Cell(30,10,': '.$takun.'');
          $this->Ln(20);
          // Colors, line width and bold font
          $this->SetFillColor(255,165,74);
          $this->SetTextColor(255);
          $this->SetDrawColor(128,0,0);
          $this->SetLineWidth(.3);
          $this->SetFont('','B');

           /*  $w adalah variabel lebar dari kolom data
                    dalam kasus ini, kolom no lebarnya 20, propinsi 100
                 dan upah 60 */
          $w = array( 50, 100, 40);
          for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
          $this->Ln();
          // tentukan warna background and fontnya  
          $this->SetFillColor(224,235,255);
          $this->SetTextColor(0);
          $this->SetFont('','',10);
          // Data
          $fill = false;
          foreach($data as $row)
          {

            $datasum=mysql_query("SELECT SUM(visitperday) AS visit FROM user_$_POST[socmed] WHERE $uid='$row[$uid]'");    
            $sum=mysql_fetch_array($datasum);

            $date=date("d M",strtotime($row[$tabday]));


            $this->Cell($w[0],8,$row[$uid],'LR',0,'C',$fill);
            $this->Cell($w[1],8,$row[$uname],'LR',0,'L',$fill);
            $this->Cell($w[2],8,$sum['visit'],'LR',0,'C',$fill);
            $this->Ln();
            $fill = !$fill;
           
          }
          // Closing line
          $this->Ln(10);
        }



      }
      $pdf = new PDF();

      if ($_POST['socmed']=="facebook") {
        $tabday="Ldate";
        $uid="Fuid";
        $uname="Ffname";
      }else{
        $tabday="Ldate";
        $uid="oauth_uid";
        $uname="username";
      }
      $header = array('UID', 'Username', 'Jumlah Klik');
      $query="SELECT * FROM user_$_POST[socmed] WHERE $tabday BETWEEN '$postfrom' AND '$postto' GROUP BY $uid ORDER BY $uname"; // catatan fuid dan ffname diganti
      $data = $pdf->LoadDataFromSQL($query);

      $pdf->SetFont('Arial','',11);
      $pdf->AddPage();
      $pdf->FancyTable($header,$data);
      $pdf->Output('report via '.$_POST['socmed'].' '.date("dmy").'.pdf','I');

      // pengulangan agar dokumen ada isinya dan kelihatan penomorannya

      $pdf->Output(); // menampilkan hasil...




    // ***************************************************** End *************************************************************//
  }
}else{}
?>



