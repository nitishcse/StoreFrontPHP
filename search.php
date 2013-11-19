<?php
$selectedCatId = NULL;
$selectedSubCatId = NULL;
include_once 'templates/header.php';
$term = isset($_GET['term']) ? $_GET['term'] : NULL;
if (!$term) {
    header('Location: index.php');
}
$search = $model->searchMovie($term);
?>
<div class=" popular_products">
    <h4>Search Results</h4><br>
    <h5>Search By : <?php echo $term; ?></h5><br>
    <h6>Total <?php echo mysql_num_rows($search); ?> result found.</h6><br>
    <ul class="thumbnails">
            <?php while ($pop = mysql_fetch_array($search)) : ?>
                <li class="span2">
                    <div class="thumbnail">
                        <a href="movie-detail.php?id=<?php echo $pop['productId']; ?>">
                            <img alt="<?php echo $pop['title']; ?>" width="150" height="123" src="movies-image/<?php echo $pop['image']; ?>" />
                            <div class="caption">
                                <a href="movie-detail.php?id=<?php echo $pop['productId']; ?>"> 
                                    <h5><?php echo $pop['title']; ?></h5>
                                </a>  Price: $<?php echo $pop['price']; ?>
                                <br /><br />
                            </div>
                    </div>
                </li>
            <?php endwhile; ?>
    </ul>
</div>