<?php
$selectedCatId = NULL;
$selectedSubCatId = NULL;
include_once 'templates/header.php';

$popular = $model->getPopularMovie();
?>
<div class=" popular_products">
    <h4>Popular movies</h4><br>
    <ul class="thumbnails">
            <?php while ($pop = mysql_fetch_array($popular)) : ?>
                <li class="span2">
                    <div class="thumbnail">
                        <a href="movie-detail.php?id=<?php echo $pop['productId']; ?>">
                            <img alt="<?php echo $pop['title']; ?>" width="150" height="123" src="movies-image/<?php echo $pop['image']; ?>" />
                            <div class="caption">
                                <a href="movie-detail.php?id=<?php echo  $pop['productId']; ?>"> 
                                    <h5><?php echo $pop['title']; ?></h5>
                                </a>  Price: $<?php echo $pop['price']; ?>
                                <br /><br />
                            </div>
                    </div>
                </li>
            <?php endwhile; ?>
       
    </ul>
</div>

<?php include_once 'templates/footer.php'; ?>