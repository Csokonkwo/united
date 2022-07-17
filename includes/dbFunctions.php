<?php
session_start();
require 'dbConnect.php';

function dd($value){
    echo "<pre>". print_r($value, true). "</pre>";
    die();
}

function successful_msg($success_msg, $location){
    $_SESSION['message'] = $success_msg;
    $_SESSION['alert-class'] = "success";

    header("location: " . $location);
    exit();
}

function executeQuery($sql, $data){

    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;
}

function createUser($table, $data){

    global $conn;
    $sql = "INSERT INTO $table SET ";

    $i = 0;

    foreach($data as $key => $value){
        if ($i === 0){
            $sql = $sql. "  $key=?";
        }
        else{
            $sql = $sql. ",  $key=?";
        }
        $i++;
    }

    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}


function selectAll($table, $conditions = []){

    global $conn;

    $sql = "SELECT * FROM $table";
    if(empty($conditions)){
        $sql = $sql. " ORDER BY id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
    else{
        $i = 0;

        foreach($conditions as $key => $value){
            if ($i === 0){
                $sql = $sql." WHERE $key=?";
            }
            else{
                $sql = $sql." AND $key=?";
            }
            $i++;
        }
        $sql = $sql. " ORDER BY id DESC";
        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}


function selectOneDesc($table, $conditions){

    global $conn;

    $sql = "SELECT * FROM $table";

        $i = 0;

    foreach($conditions as $key => $value){
        if ($i === 0){
            $sql = $sql." WHERE $key=?";
        }
        else{
            $sql = $sql." AND $key=?";
        }
        $i++;
    }

    $sql = $sql. " ORDER BY id DESC LIMIT 1";
    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
}


function selectStaz($table, $limit, $conditions = []){

    global $conn;

    $sql = "SELECT * FROM $table";
    if(empty($conditions)){
        $sql = $sql. " ORDER BY id DESC LIMIT $limit";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
    else{
        $i = 0;

        foreach($conditions as $key => $value){
            if ($i === 0){
                $sql = $sql." WHERE $key=?";
            }
            else{
                $sql = $sql." AND $key=?";
            }
            $i++;
        }
        $sql = $sql. " ORDER BY id DESC LIMIT $limit";
        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}

function selectOne($table, $conditions){

    global $conn;

    $sql = "SELECT * FROM $table";

        $i = 0;

    foreach($conditions as $key => $value){
        if ($i === 0){
            $sql = $sql." WHERE $key=?";
        }
        else{
            $sql = $sql." AND $key=?";
        }
        $i++;
    }

    $sql = $sql. " LIMIT 1";
    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
}

function update($table, $id, $data){

    global $conn;
    $sql = "UPDATE $table SET ";

    $i = 0;

    foreach($data as $key => $value){
        if ($i === 0){
            $sql = $sql. "  $key=?";
        }
        else{
            $sql = $sql. ",  $key=?";
        }
        $i++;
    }

    $sql = $sql. " WHERE id=?";
    $data['id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}

function delete($table, $id){

    global $conn;
    $sql = "DELETE FROM $table WHERE id=?";

    $stmt = executeQuery($sql, ['id' => $id]);
    return $stmt->affected_rows;
}


function sum($column, $table, $conditions = []){

    global $conn;

    $sql = "SELECT $column FROM $table";
    if(empty($conditions)){
        $results = mysqli_query($conn, $sql);
        $total = 0;
        while($row = mysqli_fetch_assoc($results)){
        $total += $row['amount'];
        }

    }else{
        $i = 0;

        foreach($conditions as $key => $value){
            if ($i === 0){
                $sql = $sql." WHERE $key = $value";
            }
            else{
                $sql = $sql." AND $key = $value";
            }
            $i++;
        }
        $results = mysqli_query($conn, $sql);
        $total = 0;
        echo mysqli_error($conn);
        while($row = mysqli_fetch_assoc($results)){
        $total += $row['amount'];
        } 
        
    }
 
    return $total;

}


function checkRows($id, $type, $status){

    global $conn;

    $sql = "SELECT * FROM transactions WHERE user_id = '$id' AND type = '$type' AND status = '$status'";
    $results = mysqli_query($conn, $sql);
    $rowNumbers = mysqli_num_rows($results);
    return $rowNumbers;
}


function checkRefRows($table, $user){

    global $conn;

    $sql = "SELECT * FROM $table WHERE referrer_id = '$user'";
    $results = mysqli_query($conn, $sql);
    $rowNumbers = mysqli_num_rows($results);
    return $rowNumbers;
}


function getPublishedPosts(){

    global $conn;
    global $page;

    if($page<1){
        $startPoint = 0;
    }
    else{$startPoint = ($page*3)-3;}

    $sql = "SELECT p.*, u.username from posts as p join users as u on p.user_id =u.id where p.published=? ORDER BY id DESC LIMIT $startPoint,20";
    $stmt = executeQuery($sql, ['published' => 1]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}


function getPostsByTopic($topic_id){

    global $conn;
    $sql = "SELECT p.*, u.username from posts as p join users as u on p.user_id =u.id where p.published=? AND topic_id=? ORDER BY id DESC LIMIT 40";
    $stmt = executeQuery($sql, ['published' => 1, $topic_id]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchPosts($term){
    $term . '%';

    $match = '%' . $term . '%';

    global $conn;
    $sql = "SELECT p.*, u.username 
    FROM posts as p 
    JOIN users as u on p.user_id =u.id 
    WHERE p.published=? 
    AND p.title LIKE ? OR p.body like ? ORDER BY id DESC LIMIT 40";

    $stmt = executeQuery($sql, ['published' => 1, 'title' => $match, 'body'=> $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function calculateAll($table, $post_id){
    //calculate comments
        global $conn;
    
        $sql = "SELECT * FROM $table where post_id = '$post_id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            $records = mysqli_num_rows($result);
        }
        return $records;
        
    }
    
    
function selectComment($table, $limit, $conditions = []){

    global $conn;

    $sql = "SELECT * FROM $table";
    if(empty($conditions)){
        $sql = $sql. " ORDER BY id DESC Limit $limit";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
    else{
        $i = 0;

        foreach($conditions as $key => $value){
            if ($i === 0){
                $sql = $sql." WHERE $key=?";
            }
            else{
                $sql = $sql." AND $key=?";
            }
            $i++;
        }
        $sql = $sql. " ORDER BY id DESC Limit $limit";
        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}

?>