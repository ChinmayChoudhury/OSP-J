<?php 
	if (isset($_GET['post_id'])) {
		$_SESSION['editpostid'] = $_GET['post_id'];
	}
	require_once 'DB/pdo.php';

	//to display previous data in editor, this could be optimised
	//following code is not required once post in done.

		$query = "SELECT * FROM `posts` WHERE post_id=".$_GET['post_id'];
		$stmt = $pdo->query($query);
		$stmt->execute();
		$prevDataRow = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($prevDataRow['post_author_id'] != $_SESSION['userid']) {
			$_SESSION['error'] = "That's not your post!!!";
			header("Location: dashboardv2.php?view_post"); return;
		}


	//if sumbit (draft or publish)
	if ($_POST){
		$_SESSION['title'] = $_POST['title'];
		$_SESSION['excerpt'] = $_POST['excerpt'];
		$_SESSION['text'] = $_POST['content'];
		
		if (isset($_POST['preview'])) {
			$_SESSION['text'] = $_POST['content'];
		}
		if (isset($_POST['submit']) || isset($_POST['savedraft'])) {
			// preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $_POST['content'], $image);
			// 	$imgvar = $image['src'];
			// all fields must be filled
			if (strlen($_POST['title'])<1 || strlen($_POST['category'])<1 || strlen($_POST['excerpt'])<1 ||strlen($_POST['content'])<1 ) {
				$_SESSION['error'] = "Fill all fields";
				header("Location: dashboardv2.php?addpost"); return;
			}
			//all fields are filled
			//to publish, type is 0 | to save as draft type is 1
			$typevar = (isset($_POST['submit'])) ? 0 : 1;
			//take first image as cover image if nothing is specified
			
			$imgvar = $_POST['cover'];
			if (strlen($imgvar)<1) {
				preg_match('/<img.+src=[\'"](.*?)[\'"].*>/i', $_POST['content'], $matches);
				if($matches){
					$imgvar = $matches[1];
				}
			}
			// else{
			// }
			//get everything between body tag
			// preg_match('/<body>(.*?)<\/body>/s', $_POST['content'], $contentvar);
			preg_match('/<body>(.*?)<\/body>/s', trim($_POST['content']), $contentvar);
			$blogcont = substr($contentvar[0], 6, strlen($contentvar[0])-13);
			//UPDATE posts SET post_content = :contentvar, post_category_id = :catvar, post_title = :titlevar, post_date = NOW(), type = :typevar, post_img = :imgvar, post_incerpt = :excerptvar WHERE post_id = :idvar
			$stmt = $pdo->prepare('UPDATE posts SET post_content = :contentvar, post_category_id = :catvar, post_title = :titlevar, post_date = NOW(), type = :typevar, post_img = :imgvar, post_incerpt = :excerptvar, post_status = 0 WHERE post_id = :idvar');
			
			$stmt->execute(array(
				':catvar'=>$_POST['category'],
				':titlevar'=>$_POST['title'],	
				':idvar' => $_SESSION['editpostid'],
				':contentvar'=>htmlspecialchars($blogcont),
				':typevar'=>$typevar,
				':imgvar'=>$imgvar,
				':excerptvar'=>$_POST['excerpt']
			));
			//unset session variables related to editor
			unset($_SESSION['title'], $_SESSION['excerpt'], $_SESSION['text']);

			$_SESSION['success'] = "Blog edited and added successfully.";
			header("Location: dashboardv2.php"); return;
			//off in production***********************
			// $stmt->debugDumpParams();
		}
	}
?>

	<title>Add post</title>
	<script src="https://cdn.tiny.cloud/1/gp0imis8m8mj2wq5dj4l0k8xwx39l8tg8309ey6onkkh5ntd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
 		tinymce.init({
	  		selector: "#contentarea",  // change this value according to your HTML
			menu: {
	    		file: { title: 'File', items: 'newdocument restoredraft | preview | print | fullpage ' },
	    		edit: { title: 'Edit', items: 'undo redo | cut copy paste | selectall | searchreplace' },
	    		view: { title: 'View', items: '| visualaid visualchars visualblocks | spellchecker | preview fullscreen' },
	    		insert: { title: 'Insert', items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime' },
			    format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align | forecolor backcolor | removeformat' },
	    		tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | code wordcount' },
	    		table: { title: 'Table', items: 'inserttable | cell row column | tableprops deletetable' },
	    		help: { title: 'Help', items: 'help' }
	  		},
			automatic_uploads: true,
			images_reuse_filename: true,
		  	plugins: "image imagetools media fullpage fullscreen code",
		  	images_upload_url: 'upload.php',
		  	height : 400,
		  	min_height: 400,

		  	preview_styles: 'font-size color',
  		});
	</script>


<div class="container">

	<h3 class="justify-content-center mt-4">Edit your post</h3>
		<?php if(isset($_SESSION['success'])){
			echo "<p class='text-center' style='color:green'>".$_SESSION['success']."</p>";
			unset($_SESSION['success']);
			}
		?>
		<form class="mt-3" method="post" id="signinform">
			<div class="form-group row">
				<label for="title" class="col-md-6 col-lg-4 col-form-label text-lg-right text-md-center">Title<span style="color: red">*</span>:</label>
				<div class="col-md-5">
					<input type="text" class="form-control pill" id="title" name="title" placeholder="" value="<?= (!empty($_SESSION['title']) ? htmlspecialchars($_SESSION['title']) : $prevDataRow['post_title'] ) ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="cover" class="col-md-6 col-lg-4 col-form-label text-lg-right text-md-center">Cover image:</label>
				<div class="col-md-5">
					<input type="text" class="form-control pill" id="cover" name="cover" placeholder="" value="<?= (!empty($_SESSION['cover']) ? htmlspecialchars($_SESSION['cover']) : $prevDataRow['post_img'] ) ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="category" class="col-md-6 col-lg-4 col-form-label text-md-center text-lg-right">Category<span style="color: red">*</span>:</label>
				<div class="col-md-5">
					
					<select class="form-control pill" id="category" name="category">
							<!-- enter categories -->
							<option value="1">test</option>
					</select>
					<i class="fa fa-chevron-down"></i>
				</div>
			</div>
			<div class="form-group row">
				<label for="excerpt" class="col-md-6 col-lg-4 col-form-label text-lg-right text-md-center">Blog excerpt<span style="color: red">*</span>:</label>
				<div class="col-md-5">
					<textarea class="form-control pill" name="excerpt" id="excerpt" placeholder="Give an excerpt for your blog." maxlength="" rows="5" value=""><?= (!empty($_SESSION['excerpt']) ? htmlspecialchars($_SESSION['excerpt']) : $prevDataRow['post_incerpt'] ) ?></textarea>
				</div>
			</div>
			<!-- <div class="form-group row">
				<label for="content" class="col-md-6">Content:</label>
				<div class=""> -->
				<textarea id="contentarea" name="content" placeholder="Put your ideas here...">
					<?php echo (!empty($_SESSION['text']) ? htmlspecialchars($_SESSION['text']) : $prevDataRow['post_content'] ); ?>

				</textarea>
			<!-- </div>	 -->
		</form>
	<div class="col-12 text-center mt-3">
		Preview your post before submitting.
	</div>
	<div class="col-12 text-center mt-3">                
		<button type="submit" form="signinform" name="preview" value="Preview" class="btn pill text-white black-bg">
			&nbsp;Preview&nbsp;
		</button>
		&nbsp;
		<button type="submit" form="signinform" name="savedraft" value="savedraft" class="btn pill text-white black-bg">
			&nbsp;Save as draft&nbsp;
		</button>
		&nbsp;
		<button type="submit" form="signinform" name="submit" value="submit" class="btn pill text-white black-bg">
			&nbsp;Publish&nbsp;
		</button>
	</div>
	<br>
	<?php if(isset($_SESSION['error'])){
		echo "<p class='text-center' style='color:red'>".$_SESSION['error']."</p>";
		unset($_SESSION['error']);
	}
	?>

	<h4 class="justify-content-center"> Your blog preview will be displayed below the line.</h4>
	<hr style="height:1px;border:none;color:#333;background-color:#333;width: 70%" />
    <?php
    	if (isset($_POST['preview'])) {
    		echo $_POST['content'];
    		unset($_POST['preview']);
    	}
    ?>
</div>