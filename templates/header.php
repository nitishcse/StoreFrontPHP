<?php
include_once 'models/movie_model.php';

$model = new Movie();
$totalCategory = $model->getTotalByCategory();

$parentCategory = array();
$allCategory = array();
while ($cat = mysql_fetch_array($totalCategory)) {
    if ($cat['parent'] == NULL) {
        $parentCategory[$cat['id']] = array();
        $subCategory[$cat['id']] = array();
        $parentCategory[$cat['id']] = $cat;
    } else {
        $subCategory[$cat['parent']][] = $cat;
    }
    $allCategory[$cat['id']] = $cat;
}
?>
<html lang="en"><head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Bootstrap - shopping cart</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link id="switch_style" href="bootstrap/css/united/bootstrap.css" rel="stylesheet">

        <link href="css/main.css" rel="stylesheet">
        <link href="css/jquery.rating.css" rel="stylesheet">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <style type="text/css"></style></head>

    <body>
        <div class="container">
            <div class="row"><!-- start header -->
                <div class="span4 logo">
                    <a href="index.php">
                        <h1>Movie Store</h1>
                    </a>
                </div>
                <div class="span8">
                </div>
            </div><!-- end header -->

            <div class="row"><!-- start nav -->
                <div class="span12">
                    <div class="navbar">
                        <div class="navbar-inner">
                            <div class="container" style="width: auto;">
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                    <span class="icon-bar"></span>

                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </a>
                                <div class="nav-collapse">
                                    <ul class="nav">
                                        <?php foreach ($parentCategory as $parent): ?>
                                            <li class="dropdown">
                                                <a href="javascript:void(null);" class="dropdown-toggle" data-toggle="dropdown"><?php echo $parent['name']; ?> <b class="caret"></b></a>
                                                <?php if (count($subCategory[$parent['id']]) > 0) : ?>
                                                    <ul class="dropdown-menu">
                                                    <?php endif; ?>
                                                    <?php foreach ($subCategory[$parent['id']] as $child): ?>
                                                        <li><a href="category.php?catId=<?php echo $parent['id']; ?>&subCatId=<?php echo $child['id']; ?>"><?php echo $child['name']; ?></a></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>

                                    <ul class="nav pull-right">
                                        <li class="divider-vertical"></li>
                                        <form class="navbar-search" action="search.php">
                                            <input type="text" name="term" class="search-query span2" placeholder="Search">
                                            <button class="btn btn-primary btn-small search_btn" type="submit">Go</button>
                                        </form>

                                    </ul>
                                </div><!-- /.nav-collapse -->
                            </div>
                        </div><!-- /navbar-inner -->
                    </div><!-- /navbar -->
                </div>
            </div><!-- end nav -->	 
            <div class="row">
                <div class="span3">
                    <!-- start sidebar -->
                    <ul class="breadcrumb">
                        <li>Categories</li>
                    </ul>
                    <div class="span3 product_list">
                        <ul class="nav">
                            <?php foreach ($parentCategory as $parent): ?>
                                <li class="dropdown">
                                    <a class="<?php echo ($selectedCatId == $parent['id']) ? 'active' : ''; ?>" href="category.php?catId=<?php echo $parent['id']; ?>"><?php echo $parent['name'] . ' (' . $parent['total'] . ')' ?> </a>
                                    <?php if (count($subCategory[$parent['id']]) > 0) : ?>
                                        <ul>
                                        <?php endif; ?>
                                        <?php foreach ($subCategory[$parent['id']] as $child): ?>
                                            <li><a href="category.php?catId=<?php echo $parent['id']; ?>&subCatId=<?php echo $child['id']; ?>"> - <?php echo $child['name'] . ' (' . $child['total'] . ')' ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div><!-- end sidebar -->		</div>
                <div class="span9">
      