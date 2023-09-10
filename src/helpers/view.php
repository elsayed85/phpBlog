<?php

function view($viewName, $viewData = [])
{
    $name = str_replace('.', '/', $viewName);
    extract($viewData);

    // Start output buffering
    ob_start();

    require "src/views/{$name}.php";

    // Get content that was echoed and store it in $content
    $content = ob_get_clean();

    // Render the layout, passing in the title and content
    require 'src/views/layout.php';
}
