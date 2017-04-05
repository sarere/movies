<?php
include_once 'connect.php';
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $query='';
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $quality = $_POST['quality'];
    $duration = $_POST['duration'];
    $rating = $_POST['rating'];
    $release = $_POST['release'];
    $synopsis = $_POST['synopsis'];
    $cover = $_FILES['cover']['name'];
    $uploadpath = 'images/' . $cover;
    $oldCover = $_POST['oldCover'];
    if ($_FILES['cover']['size'] > 0) {
        $uploadpath = 'image/' . $cover;
        if ($_FILES['cover']['type'] === 'image/jpeg' || $_FILES['cover']['type'] === 'image/png') {
            if (move_uploaded_file($_FILES['cover']['tmp_name'], $uploadpath)) {
                $query = "UPDATE `movies` SET `title`='$title',`cover`='$uploadpath',`synopsis`='$synopsis',`genre`='$genre',`quality`='$quality',`duration`='$duration',`rating`='$rating',`release_date`='$release' WHERE id=".$id;
            } else {
                echo 'upload gambar gagal';
            }
        } else {
            echo 'format gambar salah';
        }
    } else {
       $query = "UPDATE `movies` SET `title`='$title',`cover`='$oldCover',`synopsis`='$synopsis',`genre`='$genre',`quality`='$quality',`duration`='$duration',`rating`='$rating',`release_date`='$release' WHERE id=".$id;
    }
    if(strlen($query)>0){
        $result = mysqli_query($link, $query);
        if($result){
            header("location:index.php");
        }
    }
}

$query = 'SELECT m.* , q.`quality`, g.`genre` FROM `qualities` q ,`movies` m, `genres` g WHERE m.`quality` = q.`id` AND m.`genre` = g.`id` AND  m.`genre` AND m.`id` = '.$id;
$result = mysqli_query($link, $query);
$data = mysqli_fetch_assoc($result);
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Movies - Edit Movie</title>
	</head>
	<body>
		<div id="wrapper">
			<nav>
				<div class="col-8">
					<a href="index.php"><span class="logo-big">M</span>ovies</a>
				</div>
			</nav>
			<div class="main-normal col-8">
				<form method="POST" action="edit-movie.php?id=<?php echo $data['id']; ?>" id="formtambah" enctype="multipart/form-data">
					<div class="field">
						<label>Title</label>
						<input type="text" name="title" placeholder="Movie Title" value="<?php echo $data['title']; ?>">
					</div>
					<div class="field">
						<label>Genre</label>
							<select name="genre">
                                <option value="-1">-Pilih-</option>
                                <?php
                                $query = 'SELECT * FROM `genres`';
                                $result = mysqli_query($link, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                	if($data['genre'] === $row['genre']){
                                		echo '<option value="' . $row['id'] . '" selected >' . $row['genre'] . '</option>';
                                	}
                                	else{
                                		echo '<option value="' . $row['id'] . '">' . $row['genre'] . '</option>';
                                	}
                                }
                                ?>
                            </select>
					</div>
					<div class="field">
						<label>Quality</label>
						<select name="quality">
                                <option value="-1">-Pilih-</option>
                                <?php
                                $query = 'SELECT * FROM `qualities`';
                                $result = mysqli_query($link, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                	if($data['quality'] === $row['quality']){
                                		echo '<option value="' . $row['id'] . '" selected >' . $row['quality'] . '</option>';
                                	}
                                	else{
                                		echo '<option value="' . $row['id'] . '">' . $row['quality'] . '</option>';
                                	}
                                }
                                ?>
                            </select>
					</div>
					<div class="field">
						<label>Duration (minutes)</label>
						<input type="text" name="duration" placeholder="Movie Duration" value="<?php echo $data['duration']; ?>">
					</div>
					<div class="field">
						<label>Rating (1-10)</label>
						<select name="rating">
                            <option value="-1">-Pilih-</option>
                            <?php
                                for($i = 1; $i <= 10; $i++) {
                                    if($i == $data['rating']){
                                        echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                    } else {
                                         echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                }
                            ?>
                            </select>
					</div>
					<div class="field">
						<label>Release Date</label>
						<input class="small" type="date" name="release" value = "<?php echo $data['release_date']; ?>">
					</div>
					<div class="field">
						<label>Synopsis</label>
						<textarea type="text" name="synopsis" placeholder="Movie Sypnosis"><?php echo $data['synopsis']; ?></textarea>
					</div>
					<div class="field">
						<label>Movie Cover</label>
                        <img src="<?php echo $data['cover'] ?>" alt="preview cover"  class="col-2">
                        <input type="hidden" name="oldCover" value="<?php echo $data['cover']; ?>">
						<input type="file" name="cover" value="<?php echo $data['cover']; ?>">
					</div>
				</form>
				<div class="field">
					<button name="submit" value="submit" form="formtambah" class="button col-12 hd field">Submit</button>
					<a href="index.php" class="button col-12 submit cam field">Cancel</a>
				</div>
			<footer>
				<span class="logo-small">M</span>ovies - 2017
			</footer>
		</div>
	</body>
</html>