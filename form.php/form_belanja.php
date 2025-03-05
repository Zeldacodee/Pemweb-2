<!DOCTYPE html> 
<html>
<head>
    <title>Belanja Online</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .table {
            width: 100%;
            margin-top: 20px;
            border: 1px solid #ccc; 
        }
        .form-group .col-xs-8 {
            width: 40%; 
        }
        .container {
            text-align: left; 
            margin-left: -50px; 
        }
        .table-container {
            margin-top: -20px; 
            margin-left: -40px; 
        }
        .table {
            width: 40%; 
            margin-top: 0; 
        }
        .table th, .table td {
            font-size: 14px; 
            padding: 8px;  
        }
        .dark-blue-row {
            background-color: #003366; 
            color: white;
        }
        .result-container {
            margin-top: 20px;
            text-align: left;
            margin-left: 50px; 
        }
    </style>
</head>
<body>
<h3>Belanja Online</h3>

<hr> 

<div class="container">
  <div class="row">
  
    <div class="col-xs-6">
      <form method="POST" class="form-horizontal">
        <div class="form-group">
          <label for="text" class="control-label col-xs-4">Customer</label> 
          <div class="col-xs-8">
            <input id="text" name="text" type="text" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label for="radio" class="control-label col-xs-4">Pilih Produk</label> 
          <div class="col-xs-6">
            <label class="radio-inline">
              <input type="radio" name="radio" value="tv" required>
              TV
            </label>
            <label class="radio-inline">
              <input type="radio" name="radio" value="kulkas" required>
              KULKAS
            </label>
            <label class="radio-inline">
              <input type="radio" name="radio" value="mesin cuci" required>
              MESIN CUCI
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="text1" class="control-label col-xs-4">Jumlah</label> 
          <div class="col-xs-3">
            <input id="text1" name="text1" type="number" class="form-control" required>
          </div>
        </div> 
        <div class="form-group row">
          <div class="col-xs-offset-4 col-xs-8">
            <button name="submit" type="submit" class="btn btn-success">Kirim</button>
          </div>
        </div>
      </form>
    </div>

    <div class="col-xs-6 table-container">
      <table class="table table-bordered">
        <tbody>
    
          <tr class="dark-blue-row">
            <td>Daftar Harga</td>
          </tr>
          <tr>
            <td>TV: Rp. 4.200.000</td>
          </tr>
          <tr>
            <td>KULKAS : Rp. 3.100.000</td>
          </tr>
          <tr>
            <td>MESIN CUCI : Rp. 3.800.000</td>
          </tr>
    
          <tr class="dark-blue-row">
            <td>Harga Dapat Berubah Setiap Saat </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>


  <div class="row">
    <div class="col-xs-10 result-container"> 
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $customer = $_POST['text'];
          $product = $_POST['radio'];
          $quantity = $_POST['text1'];

          
          $prices = [
              'tv' => 4200000,
              'kulkas' => 3100000,
              'mesin cuci' => 3800000,
          ];

          if (isset($prices[$product])) {
              $price = $prices[$product];
              $total = $price * $quantity;
              echo "<h4>Hasil Pembelian</h4>";
              echo "<p>Customer: $customer</p>";
              echo "<p>Produk: " . ucfirst($product) . "</p>";
              echo "<p>Jumlah: $quantity</p>";
              echo "<p>Harga Satuan: Rp. " . number_format($price, 0, ',', '.') . "</p>";
              echo "<p><strong>Total: Rp. " . number_format($total, 0, ',', '.') . "</strong></p>";
          } else {
              echo "<p>Produk yang dipilih tidak valid.</p>";
          }
      }
      ?>
    </div>
  </div>
</div>

</body>
</html>
