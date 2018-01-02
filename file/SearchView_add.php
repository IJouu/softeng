<?php
  include 'header.php';
  if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../Views/loginForm.php");
    exit(0);
  }
  require("../Modules/loginModel.php");
  require("../Modules/Function.php");
/* 先針對post進來的id，再以id與資料庫比對，存取資料庫的值到變數中 */
?>

<div class="container">
  <b>Add Ecology</b>
  <hr/>
  <form method="post" action="../Control/Control.php?act=createEcology">
    <b>Organ:</b><input type="text" name="organismname" id="organismname" /><br/>
    <b>Label:</b><input type="text" name="label" id="label" /><br/>
    <b>Family:</b><input type="text" name="family" id="family" /><br/>
    <b>Genus:</b><input type="text" name="genus" id="genus" /><br/>
    <b>Food:</b><input type="text" name="food" id="food" /><br/>
    <b>Season:</b><input type="text" name="season" id="season" /><br/>
    <b>Status:</b>
    <textarea name="status" type="text" id="status" cols="50" rows="5" style="vertical-align:top"></textarea><br/>
    <b>Habitat:</b>
    <textarea name="habitat" type="text" id="habitat" cols="50" rows="5" style="vertical-align:top"></textarea><br/>
    <b>Note:</b><input type="text" name="note" id="note" /><br/>
    <input type="submit" name="Submit" value="送出" />[<a href='../Views/SearchView.php'>返回</a>]
  </form>
</div>
<?php
  include 'footer.php';
?>
