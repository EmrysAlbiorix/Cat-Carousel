<?php
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

    $form .= ' <button class="btn btn-primary" type="submit">Button</button>';

    $form .= " </form>";

    $form .= " </div>";

    return $form;
}

?>

