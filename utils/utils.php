<?php
function cleanInput(?string $value):?string{
    return htmlspecialchars(strip_tags(trim($value)),ENT_NOQUOTES);
}
function getFileExtension($file){
    return substr(strrchr($file,'.'),1);
}

