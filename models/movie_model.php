<?php

include_once 'database.php';

class Movie {

    public function __construct() {
        Database::connect();
    }

    /**
     * Get Total Movies by Category
     * @return type array
     */
    public function getTotalByCategory() {
        $sql = 'SELECT category.* , COUNT( movie.id ) AS total
FROM movie
LEFT JOIN category ON ( category.id = movie.catId
OR category.id = movie.subCatId ) 
GROUP BY category.id
LIMIT 0 , 30';

        $result = mysql_query($sql);
        if (!$result) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
        return $result;
    }

    /**
     * Get Popular Movies
     * @return type array
     */
    public function getPopularMovie() {
        $sql = "SELECT * FROM movie LIMIT 10";
        $result = mysql_query($sql);
        if (!$result) { // add this check.
            die('Invalid query: ' . mysql_error());
        }

        return $result;
    }

    /**
     *  Search Movies
     * @param type $term
     * @return type array
     */
    public function searchMovie($term) {
        $sql = "SELECT * FROM movie WHERE title LIKE '%" . $term . "%'  GROUP BY groupId";
        $result = mysql_query($sql);
        return $result;
        
    }

    /**
     * Get Movies By Category
     * @param type $catId
     * @param type $subCatId
     * @return type array
     */
    public function getMovieByCategory($catId, $subCatId) {

        if ($catId) {
            $sql = "SELECT * FROM movie WHERE catId = " . $catId;
        }
        if ($subCatId) {
            $sql = "SELECT * FROM movie WHERE catId = " . $catId . " AND subCatId = " . $subCatId;
        }
        $result = mysql_query($sql);
        if (!$result) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
        return $result;
    }

    /**
     * Validate Category and Sub Category Id
     * @param type $catId
     * @param type $subCatId
     * @return type boolean
     */
    public function validateCategory($catId, $subCatId) {
        if ($subCatId) {
            $sql = "SELECT * FROM category WHERE id =" . $subCatId . " AND parent = " . $catId;
        } else {
            $sql = "SELECT * FROM category WHERE id =" . $catId . "";
        }
        $result = mysql_query($sql);

        return (mysql_num_rows($result) == 1) ? true : false;
    }

    /**
     * Get Movie Detail By Product Id
     * @param type $id
     * @return type array
     */
    public function getMovie($id) {
        $sql = "SELECT * FROM movie WHERE productId = '" . $id . "'";
        $result = mysql_query($sql);
        return $result;
    }

    /**
     * Get All Version of a Group
     * @param type $groupId
     * @return type array
     */
    public function getOtherVersionMovie($id, $groupId) {
        $sql = "SELECT * FROM movie WHERE id != '" . $id . "' AND groupId = '" . $groupId ."'";
        $result = mysql_query($sql);
        return $result;
    }

}

?>
