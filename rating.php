<?php 
require_once 'db.php';

// $produs = $_POST['produs'];
// $rating = $_POST['rating'];

// echo $produs." -> ".$rating;


function get_data($data) {
	return isset($_POST[$data]) ? $_POST[$data] : "";
}

$data['nume'] = get_data('produs');
$data['rating'] = get_data('rating');



/*
if (isset($_POST['rate']) && !empty($_POST['rate'])) {

    $rate = $db->real_escape_string($_POST['rate']);
// check if user has already rated
    $sql = "SELECT `id` FROM `tbl_rating` WHERE `user_id`='" . $ipaddress . "'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        echo $row['id'];
    } else {

        $sql = "INSERT INTO `tbl_rating` ( `rate`, `user_id`) VALUES ('" . $rate . "', '" . $ipaddress . "'); ";
        if (mysqli_query($db, $sql)) {
            echo "0";
        }
    }
}
$db->close();

*/


 ?>