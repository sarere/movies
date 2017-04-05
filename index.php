<?php
include_once 'connect.php';
$genre = '';
if (isset($_GET['search'])) {
    $criteria = $_GET['search'];
}

if (isset($_GET['genre'])) {
    $genre = $_GET['genre'];
}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/movies.js"></script>
		<title>Movies</title>
	</head>
	<body>
		<div id="wrapper">
			<nav>
				<div class="col-8">
					<a href="index.php"><span class="logo-big">M</span>ovies</a>
				</div>
			</nav>
			<div class="main col-8">
				<div class="col-2 left">
					<a href="add-movie.php" class="button col-10 add">Add Movies</a>
					<label>Genres</label>
					<div class="button-box">
						<form action="index.php" method="GET">
							<input type="text" name="genre" value="1" >
							<button class="button col-5 filter">Action</button>
						</form>
						<form action="index.php" method="GET">
							<input type="text" name="genre" value="2" >
							<button class="button col-5 filter">Drama</button>
						</form>
						<form action="index.php" method="GET">
							<input type="text" name="genre" value="3" >
							<button class="button col-5 filter">Thriller</button>
						</form>
						<form action="index.php" method="GET">
							<input type="text" name="genre" value="4" >
							<button class="button col-5 filter">Adventure</button>
						</form>
						<form action="index.php" method="GET">
							<input type="text" name="genre" value="5" >
							<button class="button col-5 filter">Comedy</button>
						</form>
						<form action="index.php" method="GET">
							<input type="text" name="genre" value="6" >
							<button class="button col-5 filter">Animation</button>
						</form>
					</div>
				</div>
				<div class="content col-10">
					<form action="index.php" method="GET">
						<div class="search">
							<input id="search" type="text" placeholder="search by title" name="search">
						</div>
					</form>
					<div class="category">
						<?php
						$queryGenre = 'SELECT genre FROM genres WHERE id ='.$genre;
	                    $query = 'SELECT m.* , q.`quality`, g.`genre` FROM `qualities` q ,`movies` m, `genres` g WHERE m.`quality` = q.`id` AND m.`genre` = g.`id` AND  m.`genre` LIKE "%' . $genre . '%" order by m.`id`';
	                    ?>
						<h1>
							<?php 
								if ($result = mysqli_query($link, $queryGenre)) {
									 $data = mysqli_fetch_assoc($result);
									 echo $data['genre'];
								}
							?></h1>
						<?php
						$result = mysqli_query($link, $query);
	                    while ($data = mysqli_fetch_assoc($result)) {
	                        ?>
						<div class="item">
							<div class="detail">
								<label><?php echo $data['title']; ?></label>
								<label>Rating : <?php echo $data['rating']; ?></label>
								<label>Duration : <?php echo $data['duration']; ?> minutes</label>
								<label><?php echo $data['synopsis']; ?></label>
								<label>Release Date : <?php echo $data['release_date']; ?></label>
								<a href="edit-movie.php?id=<?php echo $data['id']; ?>" class="button action col-11 edit">Edit</a>
								<a class="col-11 button action delete" onclick="return confirm('are you sure to delete ?')" href="delete.php?id=<?php echo $data['id']; ?>">Delete</a>
							</div>
							<div class="detail-top">
								<img src="<?php echo $data['cover']; ?>" alt="Smiley face" class="poster">
								<label class="detail-type"><?php echo $data['quality']; ?></label>
							</div>
							<div class="title"><?php echo $data['title']; ?></div>
							<div class="title"><?php echo $data['genre']; ?></div>
						</div>
						<?php } ?>
					</div>
				</div>
			<footer>
				<span class="logo-small">M</span>ovies - 2017
			</footer>
		</div>
	</body>
</html>