<?php
session_start();
include 'header.php';
include 'baglan.php';
$user_deger=$_SESSION["user_id"];
if(isset($_POST['update']))
{
 
  $kad = $_POST['kad'];
  $ad = $_POST['ad'];
  $soyad = $_POST['soyad'];
  $email = $_POST['email'];
  $tc=$_POST['tc'];
  $telno=$_POST['telno'];
  $parola=$_POST['parola'];
  $profil_guncelle= "UPDATE  hesapacdb SET  kad='$kad',ad='$ad',soyad='$soyad',email='$email',tc='$tc',telno='$telno',parola='$parola' WHERE  id='$user_deger'"; 
}
?> 
<?php
if(isset($_POST['delete']))
{
  session_start();
  $user_deger=$_SESSION["user_id"]; 
  $delete = mysql_query("DELETE FROM hesapacdb WHERE id= '$user_deger'");

  if ($delete)
  {
    echo "Silme İşlemi Başarılı Bir Şekilde Gerçekleştirildi";
  }
  else
  {
    echo "Hata";
  }}
  ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Profil</h3>
        </div>

        <div class="title_right">

        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Profil<small>CarSharing</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form id="demo-form2" action="profil.php" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <?php 
                session_start();
                $user_deger=$_SESSION["user_id"];
                $baglan = mysqli_connect("localhost", "root", "12345678", "carsharingdb");
                $profil = " SELECT * FROM hesapacdb  WHERE   id='$user_deger'";
                $sonuc = mysqli_query($baglan, $profil);

                while ($cekilenveri = mysqli_fetch_array($sonuc)) {

                    ?>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Adı* <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="kad"  id="first-name" required="required" value="<?php echo $cekilenveri['kad'] ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ad* <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="ad"  required="required" value="<?php echo $cekilenveri['ad'] ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Soyad* </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="middle-name"  name="soyad" class="form-control col-md-7 col-xs-12" value="<?php echo $cekilenveri['soyad'] ?>" type="text" name="middle-name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">E-mail*</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="middle-name"  name="email" class="form-control col-md-7 col-xs-12" value="<?php echo $cekilenveri['email'] ?>" type="text" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tc*</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="middle-name" name="tc" class="form-control col-md-7 col-xs-12" value="<?php echo $cekilenveri['tc'] ?>" type="text" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telefon Numarası*</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="middle-name" name="telno" class="form-control col-md-7 col-xs-12" value="<?php echo $cekilenveri['telno'] ?>" type="text" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Parola* </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="middle-name"  name="parola" class="form-control col-md-7 col-xs-12" value="<?php echo $cekilenveri['parola'] ?>" type="password">
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <?php if ($profil_guncelle == true)?>
                       <button type="submit" name="update" value="update" class="btn btn-success">Guncelle</button> 
                        <button type="submit" name="delete"  class="btn btn-success">Hesap Sil</button>
                      </div>
                    </div>
                  <?php   } ?>
                </form>
              </div>
            </div>
          </div>
        </div>

        <?php include 'footer.php'; ?>