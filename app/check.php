<?php

if(isset($_POST['id'])){
    require '../db_connexion.php';

    $id = $_POST['id'];

    if(empty($id)){
       echo 'Error';
    }else {
        $todos = $conn->prepare("SELECT id, checked FROM todos WHERE id=?");
        $todos->execute([$id]);

        $todo = $todos->fetch();
        $uId = $todo['id'];
        $checked = $todo['checked'];

        $uChecked = $checked ? 0 : 1;

        $res = $conn->query("UPDATE todos SET checked=$uChecked WHERE id=$uId");

        if($res){
          echo $checked;
        }else {
          echo "Error";
        }

        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}