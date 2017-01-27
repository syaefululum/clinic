<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrderHeader */

$this->title = Yii::t('app', 'Create Order Header');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Order Headers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-header-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
