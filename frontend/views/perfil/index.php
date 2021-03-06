<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\Core;

$this->title = 'Perfil';
$this->params['breadcrumbs'][] = ['label' => 'cuenta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    /* stylelint-disable value-no-vendor-prefix, function-name-case, property-no-vendor-prefix */

    body {
        padding-top: 20px;
    }

    .footer {
        padding-top: 40px;
        padding-bottom: 40px;
        margin-top: 40px;
        border-top: 1px solid #eee;
    }

    /* Main marketing message and sign up button */
    .jumbotron {
        text-align: center;
        background-color: transparent;
    }
    .jumbotron .btn {
        padding: 14px 24px;
        font-size: 21px;
    }

    /* Customize the nav-justified links to be fill the entire space of the .navbar */

    .nav-justified {
        background-color: #eee;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .nav-justified > li > a {
        padding-top: 15px;
        padding-bottom: 15px;
        margin-bottom: 0;
        font-weight: 700;
        color: #777;
        text-align: center;
        background-color: #e5e5e5; /* Old browsers */
        background-image: -webkit-gradient(linear, left top, left bottom, from(#f5f5f5), to(#e5e5e5));
        background-image: -webkit-linear-gradient(top, #f5f5f5 0%, #e5e5e5 100%);
        background-image: -o-linear-gradient(top, #f5f5f5 0%, #e5e5e5 100%);
        background-image: linear-gradient(to bottom, #f5f5f5 0%, #e5e5e5 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#f5f5f5", endColorstr="#e5e5e5", GradientType=0); /* IE6-9 */
        background-repeat: repeat-x; /* Repeat the gradient */
        border-bottom: 1px solid #d5d5d5;
    }
    .nav-justified > .active > a,
    .nav-justified > .active > a:hover,
    .nav-justified > .active > a:focus {
        background-color: #ddd;
        background-image: none;
        -webkit-box-shadow: inset 0 3px 7px rgba(0, 0, 0, .15);
        box-shadow: inset 0 3px 7px rgba(0, 0, 0, .15);
    }
    .nav-justified > li:first-child > a {
        border-radius: 5px 5px 0 0;
    }
    .nav-justified > li:last-child > a {
        border-bottom: 0;
        border-radius: 0 0 5px 5px;
    }

    @media (min-width: 768px) {
        .nav-justified {
            max-height: 52px;
        }
        .nav-justified > li > a {
            border-right: 1px solid #d5d5d5;
            border-left: 1px solid #fff;
        }
        .nav-justified > li:first-child > a {
            border-left: 0;
            border-radius: 5px 0 0 5px;
        }
        .nav-justified > li:last-child > a {
            border-right: 0;
            border-radius: 0 5px 5px 0;
        }
    }

    /* Responsive: Portrait tablets and up */
    @media screen and (min-width: 768px) {
        /* Remove the padding we set earlier */
        .masthead,
        .marketing,
        .footer {
            padding-right: 0;
            padding-left: 0;
        }
    }


</style>


<!-- The justified navigation menu is meant for single line per list item.
     Multiple lines will require custom code not provided by Bootstrap. -->
<div class="masthead">
    
    <nav>
        <ul class="nav nav-justified">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Projects</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Downloads</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</div>

<!-- Jumbotron -->
<!--<div class="jumbotron">
    <h1>Marketing stuff!</h1>
    <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
    <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>
</div>-->

<!-- Example row of columns -->

<div class="col-lg-4">
    <h2>Safari bug warning!</h2>
    <?php
    echo ($model->username);
    print_r(Core::getFichasTotales(Yii::$app->user->identity));
    ?>
</div>
<div class="col-lg-4">
    <h2>Heading</h2>
    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
</div>
<div class="col-lg-4">
    <h2>Heading</h2>
    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
    <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
</div>

