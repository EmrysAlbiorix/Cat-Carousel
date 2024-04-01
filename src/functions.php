<?php
//phpinfo();
session_start(); /* this allows you to save data in $_SESSION */

function getCatBreeds() {
    $url = "https://api.thecatapi.com/v1/breeds";
    $response = file_get_contents($url);
    return json_decode($response, true);
}

function getSelectMenu() {
    $catBreeds = getCatBreeds();

    $form = '<div style="display:flex">';

    $form .= '<form action="src/carousel.php" method="get" style="display:flex; width: 100%">';

    $form .= '<select name="catBreeds" class="form-select" aria-label="Default select example" style="width: calc(75% - 10px); margin-right: 10px; font-size: 20px;">';
    foreach ($catBreeds as $breed):
        $form .= '<option value="' . $breed['id'] . '">' . $breed['name'] . '</option>';
    endforeach;
    $form .= '</select>';

    $form .= '<button class="btn btn-primary" type="submit">Select</button>';

    $form .= '</form>';

    $form .= '</div>';

    return $form;
}

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

    // Fetch the breed name from the $catBreeds array
    $breedName = "";
    $catBreeds = getCatBreeds();
    foreach ($catBreeds as $breed) {
        if ($breed['id'] == $breedId) {
            $breedName = $breed['name'];
            break;
        }
    }

    // Output the breed name in the header
    echo '<header style="font-weight: bold; font-size: 24px;">' . $breedName . '</header>';
    echo getImg($catInfo);
    exit();
}

?>