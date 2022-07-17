<?php 

include('../path.php');
include('server.php');

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
                <form action="blog.php" method="post" enctype="multipart/form-data">
                <i class="fa fa-blog"></i> Blog Post

                    <?Php if(count($errors) > 0): ?>
                        <div class="alert error">
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?>.</li>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>

                    <label>Post Title </label>
                    <input name="title" placeholder="Enter Blog Title" value="<?php echo $title ?>">

                    <textarea name="body" id="body"><?php echo $body; ?></textarea>
                    
                    <label>Select Image</label>
                    <input type="file" name="image" placeholder="Select image">
                    
                    <button type="submit" name="submit_blog_post" class="btn">Submit</button>
                
                </form>
            </div>
        </div>

        
        <div class="table">
            <i class="fa fa-blog"> </i> Blog Posts
            <div class="container">
            <?php $blog_posts = selectAll('blog'); ?>
            <table>
                    <thead>
                        <th>SN</th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>title</th>
                        <th>Date_created</th>
                        <th colspan="2">Actions</th>
                        
                    </thead>
                    
                    <tbody>
                    <?php foreach ($blog_posts as $key => $blog_post): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $blog_post['id'] ?></td>
                            <td><?php echo $blog_post['username'] ?></td>
                            <td><?php echo $blog_post['title'] ?></td>
                            <td><?php echo date('F j, Y.', strtotime($blog_post['created_at'])); ?></td>
                            <?php if($blog_post['published'] === 0): ?>
                            <td><a href="blog.php?published=1&n_id=<?php echo $blog_post['id'] ?>">Publish</a></td>               
                            <?php else: ?>
                            <td><a href="blog.php?published=0&n_id=<?php echo $blog_post['id'] ?>">Unpublish</a></td>
                            <?php endif; ?>
                            
                            <td><a href="blog.php?delete=3&del_id=<?php echo $blog_post['id'] ?>">Delete</a></td>
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