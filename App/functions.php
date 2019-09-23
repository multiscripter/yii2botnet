<?php

use yii\BaseYii;

/**
 * @param mixed $arg логируемое значение.
 * @param string $logLocalFileName лькальное имя лог-файла.
 */
function dump2log($arg, $logLocalFileName = '') {
    $path = BaseYii::getAlias('@logs');
    $path .= DIRECTORY_SEPARATOR.$logLocalFileName;
    $dt = new DateTime();
    ob_start();
    echo $dt->format('Y-m-d H:i:s');
    echo "\n";
    print_r($arg);
    echo "\n";
    if ($logLocalFileName)
        file_put_contents($path, ob_get_clean(), FILE_APPEND);
    else
        echo '<pre>'.ob_get_clean().'</pre>';
}