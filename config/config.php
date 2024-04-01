<?php

// Function to fetch cat information based on breed ID from Cat API
function getCatInfo($breedId) {
    $url = "https://api.thecatapi.com/v1/images/search?breed_ids=" . $breedId;
    $response = file_get_contents($url);
    return json_decode($response, true)[0];
}
// Handle breed selection change

function getImg($info) {
    $res = '<div style="height:650px">';

    $res .= '<img src="' . $info['url'] . '" alt="cat" style="max-width: 100%; height: auto;"></img>';

    $res .= '</div>';

    return $res;
}

if(isset($_GET['catBreeds'])) {
    $breedId = $_GET['catBreeds'];
    $catInfo = getCatInfo($breedId);
//    echo json_encode($catInfo);
    echo getImg($catInfo);
    exit();
}


echo "Insert Cat here";

?>

