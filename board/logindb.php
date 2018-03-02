<?php
    include 'config.php';
    $id = $_POST['login_id'];
    $pw = $_POST['login_pw'];
    $sql = "SELECT * FROM data_board WHERE user_id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if(empty($row['user_id'])){
        echo '<script>alert("존재하지 않는 아이디입니다."); window.history.back();</script>';
    } else if($row['user_pw'] == $pw){
        session_start();
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $row['user_name'];
        $prevPage = $_SERVER['HTTP_REFERER'];
        header('Location:'.$prevPage);
    } else if($row['user_pw'] != $pw){
        echo '<script>alert("비밀번호가 일치하지 않습니다."); window.history.back();</script>';
    }
?>
