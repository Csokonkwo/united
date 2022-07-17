<?php 

include("../../path.php");
include (ROOT_PATH . '/admin/server.php');
include('server.php');

$pageName = "Topics";

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
                
                <?php if(isset($topic_edit)): ?>

                <h4>Edit Previous Guides Topic  <a href="index.php">(MANAGE POSTS)</a></h4> 

                <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div>
                        <label>Name</label>
                        <input type="text" name="name" value= "<?php echo $name; ?>" class="text-input">
                        
                         <label>Description</label>
                        <textarea name="description" id="body"><?php echo $description; ?></textarea>
                    </div>
                    
                    <div>
                        <button type="submit" name="update_topic" class="btn btn-big">Update Topic</button>
                    </div>
                </form>

                <?php else: ?>

                <h4>Add New Guide Topic <a href="index.php">(MANAGE POSTS)</a> </h4>
                <form action="" method="post">
                    <div>
                        <label>Name</label>
                        <input type="text" name="name" value= "<?php echo $name; ?>" class="text-input">
                        
                         <label>Description</label>
                        <textarea name="description" id="body"><?php echo $description; ?></textarea>
                    </div>
                    
                    <div>
                        <button type="submit" name="add_topic" class="btn btn-big">Add Topic</button>
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
                        <th>Name</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($topics as $key => $topic): ?>
                        <tr>
                            <td><?php echo $key + 1; ?> </td>
                            <td><?php echo $topic['name']; ?> </td>
                            <td><a href="topics.php?topic_edit=1&id= <?php echo $topic['id']; ?>" class="edit">edit</a></td>
                            <td><a href="topics.php?delete=5&del_id=<?php echo $topic['id']; ?>" class="delete">delete</a></td>
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