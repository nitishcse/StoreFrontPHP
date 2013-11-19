<?php
$selectedCatId = isset($_GET['catId']) ? $_GET['catId'] : NULL;
$selectedSubCatId = isset($_GET['subCatId']) ? $_GET['subCatId'] : NULL;

include_once 'templates/header.php';

if(! $selectedCatId) {
    header('Location: index.php');
}
$status = $model->validateCategory($selectedCatId, $selectedSubCatId);

if (!$status) {
     header('Location: index.php');
}

$movieList = $model->getMovieByCategory($selectedCatId, $selectedSubCatId);
?>
<ul class="breadcrumb">
    <li>
        <a href="index.php">Home</a> <span class="divider">/</span>
    </li>
    <?php if ($selectedSubCatId) : ?>
        <li>
            <a href="category.php?catId=<?php echo $allCategory[$selectedCatId]['id']; ?>">
                <?php echo $allCategory[$selectedCatId]['name']; ?>
            </a> 
            <span class="divider">/</span>
        </li>
        <li class="active">
            <span><?php echo $allCategory[$selectedSubCatId]['name']; ?></span>
        </li>
    <?php else : ?>
        <li class="active">
            <span><?php echo $allCategory[$selectedCatId]['name']; ?></span>
        </li>
    <?php endif; ?>

</ul>

<?php while ($pro = mysql_fetch_array($movieList)) : ?>
<div class="row">
    <div class="span1">
        <a href="movie-detail.php?id=<?php echo $pro['productId']; ?>">
            <img alt="<?php echo $pro['title']; ?>" width="60" height="60" src="movies-image/<?php echo $pro['image']; ?>" />
        </a>
    </div>	 

    <div class="span5">
        <a href="movie-detail.php?id=<?php echo $pro['productId']; ?>"><h5><?php echo $pro['title']; ?></h5></a>
    </div>	

    <div class="span1">
        <p>$<?php echo $pro['price']; ?></p>
    </div>	 

    <div class="span2">
    </div>
</div>
<hr>
<?php endwhile; ?>

<?php include_once 'templates/footer.php'; ?>
