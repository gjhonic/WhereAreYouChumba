<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'Привет';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Ты где Чумба?</h1>

        <p class="lead">Треш онлайн стратегия</p>

        <p>
            <a class="btn btn-lg btn-primary" href="http://www.yiiframework.com">
                Войти в игру
            </a>
            <a class="btn btn-lg btn-success" href="<?php echo Url::to('game/run')?>">
                Создать игру
            </a>
        </p>
    </div>
</div>
