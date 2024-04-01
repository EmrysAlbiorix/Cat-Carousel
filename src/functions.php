<?php
//phpinfo();
session_start(); /* this allows you to save data in $_SESSION */

function getCatBreeds()
{
    $url = "https://api.thecatapi.com/v1/breeds";
    $response = file_get_contents($url);
    return json_decode($response, true);
}

function getSelectMenu()
{
    $catBreeds = getCatBreeds();

    $form = '<div style="display:flex">';

    $form .= "<form action = 'carousel.php' method = 'get'>";

    $form .= '<select name="catBreeds" class="form-select" aria-label="Default select example" style="display:flex">';
    foreach ($catBreeds as $breed):
        $form .= '<option value="' . $breed['id'] . '">' . $breed['name'] . '</option>';
    endforeach;
    $form .= '</select>';

    $form .= ' <button class="btn btn-primary" type="submit">Get Photo</button>';

    $form .= " </form>";

    $form .= " </div>";

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
//    echo json_encode($catInfo);
    echo getImg($catInfo);
    exit();
}

?>