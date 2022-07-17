<?php 

include("../../path.php");
include (ROOT_PATH . '/admin/server.php');
include('server.php');

$pageName = "Guide Posts";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include(ROOT_PATH . "/admin/includes/head.php"); ?>
    
</head>

<body>

    <?php include(ROOT_PATH . "/admin/includes/header.php"); ?>

        <div class="form">
            <div class="container">
                <?php if(count($errors) > 0):?>
                <div class="msg error">

                <?php foreach($errors as $error){ ?>
                    <li class=".li-height"><?php echo $error; }?></li>

                </div>
                <?php endif; ?>
                
                <?php if(isset($post_edit)): ?>

                <h4>Edit Previous Guide Post  <a href="topics.php">(MANAGE TOPICS)</a></h4>

                <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value= "<?php echo $_GET['id']; ?>" >
                    <div>
                        <input type="text" name="title" value= "<?php echo $title; ?>" class="text-input" placeholder="Enter Post Title">
                        
                        <textarea name="body" id="body"><?php echo $body; ?></textarea>
                    </div>
                    
                    <div>
                        <label>Post Image</label>
                        <input type="file" name="image" class="text-input">
                    </div>
                    
                    <div>
                        <select name="topic_id" class="text-input">
                            <option value="">Please a Select Topic</option>
                            <?php foreach ($topics as $key => $topic): ?>
                                <?php if(!empty($topic_id) && $topic_id == $topic['id']): ?>
                                    <option selected value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>

                                <?php endif; ?>
                                <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="">
                        <?php if(empty($published)): ?>
                        <label id="check_box" for="checkbox">
                            <input type="checkbox" name="published"> Publish
                        </label>
                        <?php else: ?>
                        <label id="check_box" for="checkbox">
                            <input type="checkbox" checked name="published"> Publish
                        </label>
                        <?php endif; ?>
                    </div>
                    <div>
                        <button type="submit" name="update_post" class="btn btn-big">Update Post</button>
                    </div>
                </form>

                <?php else: ?>

                <h4>Add New Guide Post  <a href="topics.php">(MANAGE TOPICS)</a></h4> 
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <input type="text" name="title" value= "<?php echo $title; ?>" class="text-input" placeholder="Enter Post Title">
                        
                        <textarea name="body" id="body"><?php echo $body; ?></textarea>
                    </div>
                    
                    <div>
                        <label>Post Image</label>
                        <input type="file" name="image" class="text-input">
                    </div>
                    
                    <div>
                        <select name="topic_id" class="text-input">
                            <option value="">Please Select a Topic</option>
                            <?php foreach ($topics as $key => $topic): ?>
                                <?php if(!empty($topic_id) && $topic_id == $topic['id']): ?>
                                    <option selected value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>

                                <?php endif; ?>
                                <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="">
                        <?php if(empty($published)): ?>
                        <label id="check_box" for="checkbox">
                            <input type="checkbox" name="published"> Publish
                        </label>
                        <?php else: ?>
                        <label id="check_box" for="checkbox">
                            <input type="checkbox" checked name="published"> Publish
                        </label>
                        <?php endif; ?>
                    </div>
                    <div>
                        <button type="submit" name="add_post" class="btn btn-big">Add post</button>
                    </div>
                </form>

                <?php endif; ?>
            </div>
        
        </div>


        <div class="table">
            <div class="container">
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                    <?php foreach ($posts as $key => $post): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $post['title'] ?></td>
                            <?php $theAuthor = selectOne('users', ['id'=> $post['user_id']]); ?>
                            <td><?php echo $theAuthor['username'] ?></td>
                            <td><?php echo date('F j, Y.', strtotime($post['created_at'])); ?></td>
                            <td><a href="index.php?post_edit=1&id=<?php echo $post['id']; ?>" class="edit">edit</a></td>
                            <td><a href="index.php?delete=4&del_id=<?php echo $post['id']; ?>" class="delete">delete</a></td>
                            
                            <?php if($post['published']): ?>
                                <td><a href="index.php?published=0&p_id=<?php echo $post['id'] ?>" class="unpublish">unpublish</a></td>
                            <?php else: ?>
                                <td><a href="index.php?published=1&p_id=<?php echo $post['id'] ?>" class="publish">publish</a></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


    </main>
    <?php include(ROOT_PATH . "/admin/includes/footer.php"); ?>
    
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    <script src="<?php echo BASE_URL . '/admin/js/script.js' ?>"></script>
</body>
</html>