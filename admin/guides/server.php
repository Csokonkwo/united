<?php  

$table = 'posts';

//gets the topic and its relation
$topics = selectAll('topics');
$posts = selectAll($table);

$errors = array();
$id = '';
$title = '';
$body = '';
$topic_id = '';
$published = '';

$id = '';
$name = '';
$description = '';

if(isset($_POST['add_post'])){

    unset($_POST['add_post']);

    foreach($_POST as $key => $value) {
        if(empty($value)){
            $errors[$key] = $key . " Cannot be empty" ;
        }
    }

    $existingPost = selectOne('posts', ['title' => $_POST['title']]);

    if(isset($existingPost)){
        if(isset($_POST['update_post']) && $existingPost['id'] != $_POST['id']){
            array_push($errors, 'Post with this title already exists');
        }

        if(isset($_POST['add_post'])){
            array_push($errors, 'Post with title already exists');
        }
        
    }

    if(count($errors)==0){

        if(!empty($_FILES['image']['name'])){
            $image_name = time(). "_" . $_FILES['image']['name'];
            $destination = "img/" .$image_name;
            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
    
            if($result){
                $_POST['image'] = $image_name;
            }
            else{
                array_push($errors, 'Failed to upload image');
            }
        }
    
        else{
            array_push($errors, "Post Image required");
        }
    
        if(count($errors)==0){

            unset($_POST['add_post']);
            $_POST['user_id'] = $_SESSION['id'];
            $_POST['published'] = isset($_POST['published']) ? 1 : 0;
            $_POST['body'] = htmlentities($_POST['body']);
            $post_id = createUser($table, $_POST);

            successful_msg("Post Created Successfully", 'index.php');

        }
    
        else{
            $title = $_POST['title'];
            $body = $_POST['body'];
            $topic_id = $_POST['topic_id'];
            $published = isset($_POST['published']) ? 1 : 0;
        }

    }

}

//published and unpublished
if(isset($_GET['published']) && isset($_GET['p_id'])){
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];
    //..... update published
    $count = update($table, $p_id, ['published' => $published]);
    successful_msg("Post published state changed", 'index.php');

}


if(isset($_GET['post_edit'])){

    $post_edit = $_GET['post_edit'];
    $post_edit = selectOne('posts', ['id' => $_GET['id']]);

    if(isset($post_edit)){
        $id = $_GET['id'];
        $post = selectOne($table, ['id' => $id]);
        $title = $post_edit['title'];
        $body = $post_edit['body'];
        $topic_id = $post_edit['topic_id'];
        $published = $post_edit['published'];   
    }
}


//gets and update posts
if(isset($_POST['update_post'])){

    if (empty($_POST['title'])){
        array_push($errors, 'Title is required');
    }

    if (empty($_POST['body'])){
        array_push($errors, 'Body is required');
    }

    if (empty($_POST['topic_id'])){
        array_push($errors, 'Please select a topic');
    }

    $existingPost = selectOne('posts', ['title' => ($_POST['title'])]);
    if($existingPost){
        if(isset($_POST['update_post']) && $existingPost['id'] != $_POST['id']){
            array_push($errors, 'Post with this title already exists');
        }
        
    }

    if(count($errors) == 0){

        if(!empty($_FILES['image']['name'])){
            $image_name = time(). "_" . $_FILES['image']['name'];
            $destination = "img/img/" .$image_name;
            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
    
            if($result){
                $_POST['image'] = $image_name;
            }
            else{
                array_push($errors, 'Failed to upload image');
            }
        }
    
        if(empty($_FILES['image']['name'])){
            unset($_POST['image']);
        }
    
        if(count($errors) == 0){
            $id = $_POST['id'];
            unset($_POST['update_post'], $_POST['id']);
            $_POST['user_id'] = $_SESSION['id'];
            $_POST['published'] = isset($_POST['published']) ? 1 : 0;
            $_POST['body'] = htmlentities($_POST['body']);
    
            $post_id = update($table, $id, $_POST);
            successful_msg("Post updated successfully", 'index.php');

        }
    
        else{
            $title = $_POST['title'];
            $body = $_POST['body'];
            $topic_id = $_POST['topic_id'];
            $published = isset($_POST['published']) ? 1 : 0;
        }
    } 
    
}



if(isset($_POST['add_topic'])){

    if (empty($topics['name'])){
        array_push($errors, 'Name is required');
    }

    $existingTopic = selectOne('topics', ['name' => $topics['name']]);
    if(isset($existingTopic)){
        if(isset($_POST['update_topic']) && $existingTopic['id'] != $_POST['id']){
            array_push($errors, 'Topic with this Name already exists');
        }

        if(isset($_POST['add_topic'])){
            array_push($errors, 'Topic with this Name already exists');
        }
    }

    if(count($errors)===0){
       
        unset($_POST['add_topic']);
        $topic_id = createUser('topics', $_POST);

        successful_msg("Topic created successfully", 'topics.php');

    }

    else{    
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}


if(isset($_GET['topic_edit'])){

    $topic_edit = selectOne('topics', ['id' => $_GET['id']]);

    if(isset($topic_edit)){
        $id = $_GET['id'];
        $topic_edit = selectOne('topics', ['id' => $id]);
        $name = $topic_edit['name'];
        $description = $topic_edit['description'];   
    }
}


if(isset($_POST['update_topic'])){

    if(empty($_POST['name'])){
        array_push($errors, 'Name is required');
    }

    $existingTopic = selectOne('topics', ['name' => $_POST['name']]);
    if(isset($existingTopic)){
        if(isset($_POST['update_topic']) && $existingTopic['id'] != $_POST['id']){
            array_push($errors, 'Topic with this Name already exists');
        }

        if(isset($_POST['add_topic'])){
            array_push($errors, 'Topic with this Name already exists');
        }
    }

    if(count($errors)===0){

        $id = $_POST['id'];
        unset($_POST['id'], $_POST['update_topic']);
        $topic_id = update('topics', $id, $_POST);

        successful_msg("Topic Updated Successfully", 'topics.php');

    }

    else{
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}


//This section displays all topics on main page

$posts = array();
$postsTitle = 'Recent Articles';

if(isset($_GET['t_id'])){
    $posts = getPostsByTopic($_GET['t_id']);
    $postsTitle = "Posts on ". $_GET['name']; 
}
else if(isset($_POST['search_term'])){
    $postsTitle = "Results for: ". $_POST['search_term']; 
    $posts = searchPosts($_POST['search_term']);
    $_GET['search_term'] = 1;
} 
else{
    $posts = getPublishedPosts();

} 




?>