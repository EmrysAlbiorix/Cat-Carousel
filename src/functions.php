<?php
session_start(); /* this allows you to save data in $_SESSION */
/* https://www.w3schools.com/php/php_sessions.asp */

/* write PHP functions here */

function getSelectMenu() {
    $form = "<form action = 'carousel.php' method = 'get'>" ;

    $form.= '<select name="catBreeds" class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>' ;

    $form.= '<button name="Button" class="btn btn-primary" type="submit">Button</button>' ;

    $form.= "</form>" ;
    return $form ;
}

?>