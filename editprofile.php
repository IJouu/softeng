<?php
    session_start();
    require("dbconnect.php");
    $id = (int)$_REQUEST['id'];
    //選出該編號(id)的資訊
    $sql = "SELECT * FROM library WHERE id = $id;";
    //執行SQL指令, 失敗則顯示無法獲取資訊
    $result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
    if ($rs = mysqli_fetch_assoc($result)) {
        // 如果有資料則將書名、推薦訊息、作者存入變數，方便後面顯示取用
        $organismname = $rs['organismname'];
        $label = $rs['label'];
        $kingdom = $rs['kingdom'];
        $phylum = $rs['phylum'];
        $class = $rs['class'];
        $order = $rs['order'];
        $family = $rs['family'];
        $genus = $rs['genus'];
        $species = $rs['species'];
        $food = $rs['food'];
        $season = $rs['season'];
        $status = $rs['status'];
        $habitat = $rs['habitat'];
        $note = $rs['note'];
    } else {
        //搜尋不到資訊時, (return row = 0)
        echo "Wrong ID";
        exit(0);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>生態資料庫</title>
    </head>
    <style type = 'text/css'>
      body {
        font-family: 微軟正黑體;
      }
      form {
        line-height: 40px;
      }
    </style>
    <body>
        <!-- 將推薦書單編號(id)顯示 -->
        <h1>編輯生態資料: #<?php echo $id;?></h1>
        <form method="post" action="control.php?act=update">
            <!-- 將推薦書單的編號(id)以隱藏的input元素藏在Form裡面送出 -->
            <input type="hidden" name='id' value="<?php echo $id;?>">
            Organism Name: <input name="organismname" type="text" id="organismname" value="<?php echo $organismname;?>" /> <br>
            Label: <input name="label" type="text" id="label" value="<?php echo $label;?>" /> <br>
            Kingdom: <input name="kingdom" type="text" id="kingdom" value="<?php echo $kingdom;?>" /> <br>
            Phylum: <input name="phylum" type="text" id="phylum" value="<?php echo $phylum;?>" /> <br>
            Class: <input name="class" type="text" id="class" value="<?php echo $class;?>" /> <br>
            Order: <input name="order" type="text" id="order" value="<?php echo $order;?>" /> <br>
            Family: <input name="family" type="text" id="family" value="<?php echo $family;?>" /> <br>
            Genus: <input name="genus" type="text" id="genus" value="<?php echo $genus;?>" /> <br>
            Species: <input name="species" type="text" id="species" value="<?php echo $species;?>" /> <br>
            Food: <input name="food" type="text" id="food" value="<?php echo $food;?>" /> <br>
            Season: <input name="season" type="text" id="season" value="<?php echo $season;?>" /> <br>
            Status: <br>
            <textarea name="status" type="text" id="status" cols="50" rows="5"><?php echo $status;?></textarea> <br>
            Habitat: <br>
            <textarea name="habitat" type="text" id="habitat" cols="50" rows="5"><?php echo $habitat;?></textarea> <br>
            Note: <input name="note" type="text" id="note" value="<?php echo $note;?>" /> <br>
            <input type="submit" name="Submit" value="送出" />
        </form>
    </body>
</html>
