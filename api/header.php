<?php
    function insert_head($title)
    {
        echo '<head>';
        echo '<title>' . $title . '</title>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
        echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">';
        echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>';
        echo '</head>';
    }
?>