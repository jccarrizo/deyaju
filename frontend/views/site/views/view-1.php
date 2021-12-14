<?php

use common\helpers\Core;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>

<body>
    <div>
        <p>tab-2</p>
        <div class="row">
            <?php
            $count = 0;
            $div1 = '<div class="column">';
            $div2 = '</div>';
            foreach ($galleries as $gallery) {
                if ($count == 0) {
                    echo $div1;
                }
                if ($count < $galleries_count) {
            ?>
                  <p>prueba</p>
            <?php
                    $count++;
                }
                if ($count == $galleries_count) {
                    echo $div2;
                    $count = 0;
                }
            }
            ?>
        </div>
    </div>
</body>

</html>