<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <h3>Form Nilai Mahasiswa</h3>
    <hr>
<?php
    $_ar_matkul = [
        'DDP' => 'Dasar-Dasar Pemrograman',
        'WEB1' => 'Pemrograman Web 1',
        'WEB2' => 'Pemrograman Web 2',
        'BD' => 'Basis Data',
        'AI' => 'Kecerdasan Buatan',
        'JK' => 'Jaringan Komputer',
        'UI/UX' => 'User Interface/User Experience',
    ]
?>        
    <form method='post' action='<?php echo $_SERVER['PHP_SELF'];?>'>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama Lengkap</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="nama" name="nama" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="matkul" class="col-4 col-form-label">Mata Kuliah</label> 
    <div class="col-8">
      <select id="matkul" name="matkul" class="custom-select">
        <option value=""> -- Pilih Mata Kuliah -- </option>
<?php
        foreach($_ar_matkul as $kode=>$nama) {
            echo "<option value='$kode'>$nama</option>";
        }
?>                
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="uts" class="col-4 col-form-label">Nilai UTS</label> 
    <div class="col-8">
      <input id="uts" name="uts" placeholder="Nilai UTS" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="uas" class="col-4 col-form-label">Nilai UAS</label> 
    <div class="col-8">
      <input id="uas" name="uas" placeholder="Nilai UAS" type="#" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="tugas" class="col-4 col-form-label">Nilai Tugas/Praktikum</label> 
    <div class="col-8">
      <input id="tugas" name="tugas" placeholder="Nilai Tugas" type="#" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
Hasil Input Data Nilai mahasiswa: 
<hr>
<?php
    $_nama = $_POST['nama'];
    $_matkul = $_POST['matkul'];
    $_uts = $_POST['uts'];
    $_uas = $_POST['uas'];
    $_tugas = $_POST['tugas'];
    $_rata_rata = ($_uts * 0.3)+($_uas * 0.3)+($_tugas * 0.4);
    $_keterangan = keterangan ($_rata_rata);
    $_grade = grade($_rata_rata);
?>
<?php
    function keterangan ($_rata_rata){
        if ($_rata_rata >= 80) {
            return "Lulus";
        }
        else {
            return "Tidak Lulus";
        }
    }
    
?>
<?php
    function grade ($_rata_rata){
        if ($_rata_rata >= 85 && $_rata_rata <= 100) {
            return "A (Sangat Baik)";
        }
        elseif ($_rata_rata >= 60 && $_rata_rata <= 84){
            return "B (Baik)";
        }
        elseif ($_rata_rata >= 40 && $_rata_rata <= 59){
            return "C (Cukup)";
        }
        elseif ($_rata_rata >= 20 && $_rata_rata <= 39){
            return "D (Kurang)";
        }
        elseif ($_rata_rata >= 0 && $_rata_rata <= 19){
            return "E (Sangat Kurang)";
        }
        else{
            return "Tidak Lulus";
        }
}        
?>
Nama Mahasiswa : <?=$_nama;?><br>
Mata Kuliah : <?=$_matkul;?><br>
Nilai UTS : <?=$_uts;?><br>
Nilai UAS : <?=$_uas;?><br>
Nilai Praktikum/Tugas : <?=$_tugas;?><br>
Rata-Rata Nilai : <?=$_rata_rata;?><br>
keterangan : <?=$_keterangan;?><br>
grade : <?=$_grade;?><br>


</body>
</html>