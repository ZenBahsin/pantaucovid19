<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->



    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <title>Pantau Penyebaran Covid-19 </title>
  </head>
  <body>

<div class="jumbotron jumbotron-fluid bg-primary text-white text-center">
  <div class="container">
    <h1 class="display-4">Covid-19</h1>
    <p class="lead">
      <h2>
          PANTAU PENYEBARAN COVID-19 DI DUNIA
          <br> SECARA REALTIME
          <br> MENGGUNAKAN API DATA GLOBAL
      </h2>
    </p>
  </div>
</div>

<style type="text/css">
    .box {
      padding: 30px 40px;
      border-radius:5px;
    }

    .peding {
    margin-top: 20px;
    padding: 18px;
    position: relative;
    width: 100%;
    bottom: 0px;
    font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    }

    .red-top-border {
    border-top: 1px solid rgba(233, 32, 48, .800);
    }
    .card-footer {
    padding: .75rem 1.25rem;
    background-color: rgba(0, 0, 0, .03);
    /* border-top: 1px solid rgba(0, 0, 0, .125); */
  }
</style>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="bg-danger box text-white">
        <div class="row">
          <div class="col-md-6">
              <h5>Positif</h5> 
              <h2 id="data-kasus">--------<h2>
              <h5>Orang</h5>
          </div>
          <div class="col-md-4">
              <img src="img/sad.svg" style="width:100px;">
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="bg-info box text-white">
        <div class="row">
          <div class="col-md-6">
              <h5>Meninggal</h5> 
              <h2 id="data-mati">--------<h2>
              <h5>Orang</h5>
          </div>
          <div class="col-md-4">
              <img src="img/cry.svg" style="width:100px;">
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="bg-success box text-white ">
        <div class="row">
          <div class="col-md-6">
              <h5>Sembuh</h5> 
              <h2 id="data-sembuh">--------<h2>
              <h5>Orang</h5>
          </div>
          <div class="col-md-4">
              <img src="img/happy.svg" style="width:100px;">
          </div>
        </div>
      </div>
    </div>

<!-- <div class="input-group mt-3 mb-3">
  <select class="custom-select" id="inputGroupSelect01">
    <option selected>Pilih kecamatan</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
</div> -->


    <div class="col-md-12 mt-3">
      <div class="bg-primary box text-white">
        <div class="row">
          <div class="col-md-3">
              <h5>INDONESIA</h5> 
              <h5 id="data-id">Positif:  -------- Orang <br>Meninggal:  ------ Orang <br>Sembuh: -------- Orang<h5>
          </div>
          <div class="col-md-4">
              <img src="img/indonesia.svg" style="width:150px;">
          </div>
        </div>
      </div>
    </div> 
    
  </div>

  <div class="card mt-3 mb-10">
     <div class="card-header bg-danger text-white">
         <b>Data Sebaran Covid-19 di Indonesia Berdasarkan Provinsi</b>
     </div>
  <div class="card-body">
    <table id="myTable" class="table table-striped table-bordered" style="width:100%">
      <thead>
      <tr>
        <th>No.</th>
        <th>Nama Provinsi</th>
        <th>Positif</th>
        <th>Sembuh</th>
        <th>Meninggal</th>
        </tr>
      </thead>
      <tbody id="tabel-data">
     
      </tbody>
     </table>

  </div>
</div>
 
</div>

<div class="card-footer peding red-top-border" style="color: #869099;">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        MUHAMMAD ZEN
    </div>
    <!-- Default to the left -->
    <strong> PANTAU PENYEBARAN COVID-19 DI DUNIA</strong>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.min.js"></script>
  


  </body>
</html>


<script>


  $(document).ready(function(){
    semuaData();
    dataNegara();
    dataProvinsi();
    setInterval(() => {
      semuaData();
      dataNegara();
    //   dataProvinsi();
    }, 3000);

      function semuaData(){
          $.ajax({
            url : 'http://coronavirus-19-api.herokuapp.com/all',
            
            success : function(data){
              try {
                  var json= data;
                  var kasus= data.cases;
                  var meninggal = data.deaths;
                  var sembuh= data.recovered;
                  // alert(kasus);
                  $('#data-kasus').html(kasus);
                  $('#data-mati').html(meninggal);
                  $('#data-sembuh').html(sembuh);
              } catch {
                  alert('error');
              }
            }
          });
      }


      function dataNegara(){
        $.ajax({
            url : 'http://coronavirus-19-api.herokuapp.com/countries',
            
            success : function(data){
              try {
                  var json= data;
                  var html=[];

                  if(json.length > 0){
                    var i;
                    for(i=0; i<json.length; i++){
                      var dataNegara = json[i];
                      var namaNegara = dataNegara.country;
                      if(namaNegara==='Indonesia'){
                        var kasus = dataNegara.cases;
                        var mati = dataNegara.deaths;
                        var sembuh = dataNegara.recovered;
                        $('#data-id').html('Positif: '+kasus+' Orang <br> Meninggal: '+mati+' Orang <br> Sembuh: '+sembuh+' Orang <br>')
                      }
                    }
                  }

              } catch {
                  alert('error');
              }
            }
          });
      }

      function dataProvinsi(){
        $.ajax({
            url : 'curl.php',
            type: 'GET',
            success : function(data){
              try {
                  $('#tabel-data').html(data);
                  $('#myTable').DataTable();
              } catch {
                  alert('error');
              }
            }
          });
       }

  
  });
//   $(document).ready( function () {
//     $('#myTable').DataTable();
//     } );

//     $(document).ready( function () {
//     $('#example').DataTable();
//     } );
</script>


	
