<?php
include_once 'connect.php';
if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($link,$_POST['title']);
    $genre = mysqli_real_escape_string($link,$_POST['genre']);
    $quality = mysqli_real_escape_string($link,$_POST['quality']);
    $duration = mysqli_real_escape_string($link,$_POST['duration']);
    $rating = mysqli_real_escape_string($link,$_POST['rating']);
    $release = mysqli_real_escape_string($link,$_POST['release']);
    $synopsis = mysqli_real_escape_string($link,$_POST['synopsis']);
    $cover = $_FILES['cover']['name'];
    $uploadpath = 'images/' . $cover;
    if ($_FILES['cover']['type'] === 'image/jpeg' || $_FILES['cover']['type'] === 'image/png') {
        if (move_uploaded_file($_FILES['cover']['tmp_name'], $uploadpath)) {
            $query = "INSERT INTO `movies`(`title`,`genre`,`quality`,`duration`,`rating`,`release_date`,`synopsis`,`cover`) VALUES('$title','$genre','$quality','$duration','$rating','$release','$synopsis','$uploadpath')";
            //var_dump($query);
            $result = mysqli_query($link, $query);
            //var_dump($result);
            header("location:index.php");
        } else {
            echo 'upload gambar gagal';
        }
    } else {
        echo 'format gambar salah';
    }
}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Movies - Add Movie</title>
	</head>
	<body>
		<div id="wrapper">
			<nav>
				<div class="col-8">
					<a href="index.php"><span class="logo-big">M</span>ovies</a>
				</div>
			</nav>
			<div class="main-normal col-8">
				<form method="POST" action="add-movie.php" id="formtambah" enctype="multipart/form-data">
					<div class="field">
						<label>Title</label>
						<input type="text" name="title" placeholder="Movie Title">
					</div>
					<div class="field">
						<label>Genre</label>
							<select name="genre">
                                <option value="-1">-Pilih-</option>
                                <?php
                                $query = 'SELECT * FROM `genres`';
                                $result = mysqli_query($link, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['genre'] . '</option>';
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
                                    echo '<option value="' . $row['id'] . '">' . $row['quality'] . '</option>';
                                }
                                ?>
                            </select>
					</div>
					<div class="field">
						<label>Duration (minutes)</label>
						<input type="text" name="duration" placeholder="Movie Duration">
					</div>
					<div class="field">
						<label>Rating (1-10)</label>
						<select name="rating">
                                <option value="-1">-Pilih-</option>
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
                                <option value="4"> 4 </option>
                                <option value="5"> 5 </option>
                                <option value="6"> 6 </option>
                                <option value="7"> 7 </option>
                                <option value="8"> 8 </option>
                                <option value="9"> 9 </option>
                                <option value="10"> 10 </option>
                            </select>
					</div>
					<div class="field">
						<label>Release Date</label>
						<input class="small" type="date" name="release">
					</div>
					<div class="field">
						<label>Synopsis</label>
						<textarea type="text" name="synopsis" placeholder="Movie Sypnosis"></textarea>
					</div>
					<div class="field">
						<label>Movie Cover</label>
						<input type="file" name="cover">
					</div>
				</form>
				<div class="field">
					<button name="submit" value="submit" form="formtambah" class="button col-12 hd field">Submit</button>
				</div>
			<footer>
				<span class="logo-small">M</span>ovies - 2017
			</footer>
		</div>
	</body>
</html>