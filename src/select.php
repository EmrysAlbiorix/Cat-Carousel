<?php
function getCatBreeds() {
    $url = "https://api.thecatapi.com/v1/breeds";
    $response = file_get_contents($url);
    return json_decode($response, true);
}

function getSelectMenu() {
    $form = "<form action = 'carousel.php' method = 'get'>" ;

    $form.= '<select name="catBreeds" class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                foreach ($catBreeds as $breed):
                
            </select>' ;

    $form.= '<button name="Button" class="btn btn-primary" type="submit">Button</button>' ;

    $form.= "</form>" ;
    return $form ;
}

?>