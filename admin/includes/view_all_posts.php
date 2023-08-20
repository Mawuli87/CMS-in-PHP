
<form action="" method="post"> 

    <table class="table table-bordered table-hover">



        <thead>
            <tr>
            
                <th>Id</th>
                <th>Category id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Date</th>
                <th>Image</th>
                <th>Post Content</th>
                <th>Tags</th>
                <th>Comments count</th>
                <th>Status</th>
                <th>Edit</th> 
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM posts ORDER BY post_id DESC";
                $select_posts = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_posts)) {
                    $post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_status = $row['post_status'];
                  
            
                    
                    echo "<tr>";
                    echo "<td>{$post_id}</td>";
                    echo "<td>{$post_category_id}</td>";
                    echo "<td>{$post_title}</td>";
                    echo "<td>{$post_author}</td>";
                    echo "<td>{$post_date}</td>";
                    echo "<td><img width = '100px' src='../images/$post_image' alt = 'image'></td>";
                    echo "<td>{$post_content}</td>";
                    echo "<td>{$post_tags}</td>";
                    echo "<td>{$post_comment_count}</td>";
                    echo "<td>{$post_status}</td>";
                    echo "<td><a name='edit_post' href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                    echo "<td><a onClick=\" javascript: return confirm('Are uou sure to delete?');\" href='posts.php?delete={$post_id}'>Delete</a></td>";
                    echo "<tr>";
                    ?>

                  
                    <?php 
                        

                       
                
                }
            ?>


            <?php 
                if (isset($_GET['delete'])) {
                    $the_post_id = $_GET['delete'];

                    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
                    $delete_query = mysqli_query($connection, $query);
                    confirmQuery($delete_query);
                    header("Location: posts.php");
                }


                if (isset($_GET['reset'])) {
                    $the_post_id = $_GET['reset'];

                    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = {$the_post_id}";
                    $reset_views_query = mysqli_query($connection, $query);
                    confirmQuery($reset_views_query);
                    header("Location: posts.php");
                }





             ?>

            
        </tbody>
    </table>
</form>