  <?php
    if(isset($_POST["create_post"])){
	$post_title = $_POST['title'];
	$post_author = $_POST['post_author'];
	$post_category_id = $_POST['post_category_id'];
	$post_status = $_POST['post_status'];

	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];

	$post_tags = $_POST['post_tags'];
	$post_content = $_POST['post_content'];
	$post_date = date('d-m-y');
	$post_comment_count = 4;

	move_uploaded_file($post_image_temp, "../images/$post_image");

	$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags,post_comment_count, post_status) "; // space is a must

	$query .="VALUES({$post_category_id}, '{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}') "; // $ sign and '{}' are must


	$create_post_query = mysqli_query($connection, $query);

	confirmQuery($create_post_query);

	}



   ?>
<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" name="title" class="form-control">
	</div>


	<div class="form-group">
		<label for="title">Post Author</label>
		<input type="text" name="post_author" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_category_id">Post Category id</label>
		<input type="text" name="post_category_id" id="" class="form-control">
		</input>
	</div>



	<div class="form-group">
		<label for="post_status">Post Status</label>
		<select name="post_status" id="" class="form-control">
			<option value="Draft">--- Select Post Status ---</option>
			<option value="Draft">Draft</option>
			<option value="Published">Publish</option>
		</select>
	</div>

	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" name="image">
	</div>


	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" name="post_tags" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
	</div>

	

	<div class="form-group">
      <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>
	

</form>