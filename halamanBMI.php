<?php
class BMIPasien {
    public $nama,
           $umur,
           $jenis_kelamin,
           $berat,
           $tinggi,
           $BMIres,
           $BMIstatus = '';

    function __construct($nama, $umur, $jenis_kelamin, $berat, $tinggi)
    {
        $this->nama = $nama;
        $this->umur = $umur;
        $this->jenis_kelamin = $jenis_kelamin;
        $this->berat = $berat;
        $this->tinggi = $tinggi;
        
    }

    public function hasilBMI() {
        $this->tinggi = $this->tinggi / 100;
        $this->BMIres = $this->berat / ($this->tinggi * $this->tinggi);
        return $this->BMIres;
    }

    public function statusBMI() {
        if($this->BMIres < 18.5) {
            return $this->BMIstatus = 'Kekurangan berat badan';
        } else if ($this->BMIres >= 18.5 && $this->BMIres <= 24.9) {
            return $this->BMIstatus = 'Berat Normal';
        } else if ($this->BMIres >= 25.0 && $this->BMIres <= 29.9) {
            return $this->BMIstatus = 'Kelebihan berat badan';
        } else {
            return $this->BMIstatus = 'Kegemukan (Obesitas)';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
<div class="container mt-5 mb-5 p-5 " style="background: #f1cfff" >
<h3 align='center'><b>Hasil Evaluasi BMI</b></h3>
      <br>
      <?php 
        if(isset($_POST['proses'])) {
            $nama = $_POST['nama_lengkap'];
            $umur = $_POST['umur_'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $berat = $_POST['berat_'];
            $tinggi = $_POST['tinggi_'];
            $pas1 = new BMIPasien($nama, $umur, $jenis_kelamin, $berat, $tinggi);
                
                
            echo 'Nama :        ' . $pas1->nama . ' </br>';
            echo 'Umur :        ' . $pas1->umur. '</br>';
            echo 'Gender :      ' . $pas1->jenis_kelamin . '</br>';
            echo 'Berat Badan : ' . $pas1->berat . '</br>';
            echo 'Tinggi Badan :' . $pas1->tinggi . '</br>' ;
            echo 'BMI :         ' . round($pas1->hasilBMI()) . '</br>';
            echo 'Status :      ' . $pas1->statusBMI() . '</br>';
            }
    ?>
  </div>
</body>
</html>