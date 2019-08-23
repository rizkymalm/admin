<?php



if (isset($_POST['from'])) {
  
  $dari=$_POST['from'];
  $sampai=$_POST['to'];
    if ($_POST['socmed']=="facebook") {
      $tabday="Ldate";
      $uid="Fuid";
    }else{
      $tabday="created";
      $uid="oauth_uid";
    }



  require('fpdf181/fpdf.php');
  require('../apps/config/db.php');

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
    if ($_POST['socmed']=="facebook") {
      $tabday="Ldate";
      $uid="Fuid";
    }else{
      $tabday="created";
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
    $this->Cell(10,10,'Statistik Pengguna Hotspot','C');
    $this->Ln(10);
    $this->SetFont('Times','I',8); // Times 12
    $this->SetTextColor(132,132,132);
    $this->Cell(10,10,'Periode '.$datefrom.' s/d '.$dateto.'');
    $this->Ln(10);


    $total=mysql_query("SELECT * FROM user_$_POST[socmed] WHERE $tabday BETWEEN '$_POST[from]' AND '$_POST[to]'");
    $tsum=mysql_num_rows($total);
    $totalakun=mysql_query("SELECT * FROM user_$_POST[socmed] WHERE $tabday BETWEEN '$_POST[from]' AND '$_POST[to]' GROUP BY $uid");
    $takun=mysql_num_rows($totalakun);
    $this->SetFont('Times','',12);
    $this->SetTextColor(0,0,0);
    $this->Cell(50,10,'Total Pengunjung');
    $this->Cell(30,10,': '.$tsum.'');
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
      $tabday="created";
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

      $datasum=mysql_query("SELECT SUM(visitperday) AS visit FROM user_$_POST[socmed] WHERE $tabday='$row[$tabday]'");    
      $sum=mysql_fetch_array($datasum);

      $date=date("d M",strtotime($row[$tabday]));


      $this->Cell($w[0],8,$date,'LR',0,'C',$fill);
      $this->Cell($w[1],8,$_POST['socmed'],'LR',0,'L',$fill);
      $this->Cell($w[2],8,$count,'LR',0,'C',$fill);
      $this->Cell($w[3],8,$sum['visit'],'LR',0,'C',$fill);
      $this->Ln();
      $fill = !$fill;
     
    }
    // Closing line
    $this->Ln(10);
   } 
  }








  $pdf = new PDF();


  $header = array('Tanggal', 'Social Media', 'Jumlah Akun', 'Jumlah Kunjungan');
  $query="SELECT * FROM user_$_POST[socmed] WHERE $tabday BETWEEN '$_POST[from]' AND '$_POST[to]' GROUP BY $tabday";
  $data = $pdf->LoadDataFromSQL($query);

  $pdf->SetFont('Arial','',11);
  $pdf->AddPage();
  $pdf->FancyTable($header,$data);
  $pdf->Output();

  // pengulangan agar dokumen ada isinya dan kelihatan penomorannya

  $pdf->Output(); // menampilkan hasil...
}else{}
?>



