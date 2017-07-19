<?php

//ini_set('display_erros', false);

const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'dz13.07.17';
const DB_HOST = 'localhost';

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//var_dump($db);




if (!$db) {
    echo 'проблема при подключении' . mysqli_connect_errno() . ' || ' . mysqli_connect_error();
} else {
    

    
    
    $query = 'SELECT * FROM students';
    $result = mysqli_query($db, $query);
    if (!$result) {
        echo ' результат не был получен' . mysqli_errno($db) . ' ' . mysqli_error($db);
    }
    
        if (isset($_POST['del'])) {
        $id = (integer) $_POST['id'];
        $query1 = "DELETE FROM `students` WHERE `id` = '$id'";
        $delete = mysql_query( $query1);
        if (!$delete) {
            echo "данные отправлены";
        } else {
            echo "данные не отправлены";
        }
    }

    
    else  {
        echo '<table cellpadding="10" cellspacing="0" border="2">';
        echo '<form  methot="post" action="">';
        echo "<input type='hidden' name='id' value=' $row'";
        

        
        while ($row = mysqli_fetch_assoc($result)) {
            //var_dump($row);
            echo '<tr>';
                                   
            foreach ($row as $key => $val) {
                echo '<td>' . $val . '</td>';
            }
            echo '<td>' . '<input type="submit" name="del" value="удалить">' . '</td>';
            echo '</form>';
            echo '</tr>';
        }
        echo '</table>';
        
        
        
    }
    var_dump($_POST);
    mysqli_close($db);
}

//DELETE FROM `students` WHERE `students`.`id` = 6;




