<?php

include_once 'templates/header.php';
$id = isset($_GET['id']) ? $_GET['id'] : NULL;
$movie = $model->getMovie($id);
$movie = mysql_fetch_assoc($movie);

if (!$movie) {
    header('Location: index.php');
}
$selectedCatId = $movie['catId'];
$selectedSubCatId = $movie['subCatId'];
$otherVersion = $model->getOtherVersionMovie($movie['id'], $movie['groupId']);
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
<div class="row">
    <div class="span9">
        <h1><?php echo $movie['title']; ?></h1>
    </div>
</div>
<hr>

<div class="row">
    <div class="span3">
        <img alt="<?php echo $movie['title']; ?>" width="220" height="220" src="movies-image/<?php echo $movie['image']; ?>" />
    </div>	 

    <div class="span6">
        <div class="span6">
            <address>
                <strong>Product Code:</strong> <span><?php echo $movie['productId']; ?></span><br>
                <strong>Availability:</strong> <span>In Stock</span><br>
                <strong>Shipping:</strong> <span>Delivered in <span class="fk-font-bold"> <?php echo $movie['shipping']; ?> business days</span>.</span><br>
            </address>
        </div>	

        <div class="span6">
            <h2>
                <strong>Price: $<?php echo $movie['price']; ?></strong> <br><br>
            </h2>
        </div>	

    </div>	
</div>
<hr>
<?php if (count($otherVersion) > 0) : ?>
    <div class="row">
        <div class="span9">
            <div class="tabbable">
                <h2> Other Variants</h2>
                <div class="tab-content">
                    <ul class="thumbnails related_products">
                        <?php while ($version = mysql_fetch_array($otherVersion)) : ?>
                            <li class="span2">
                                <div class="thumbnail">
                                    <a href="movie-detail.php?id=<?php echo $version['productId']; ?>">
                                        <img alt="<?php echo $version['title']; ?>" width="220" height="180" src="movies-image/<?php echo $version['image']; ?>" />
                                        <div class="caption">
                                            <a href="movie-detail.php?id=<?php echo $version['productId']; ?>"> 
                                                <h5><?php echo $version['title']; ?></h5>
                                            </a>  Price: $<?php echo $version['price']; ?>
                                            <br><br>
                                        </div>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php include_once 'templates/footer.php'; ?>
