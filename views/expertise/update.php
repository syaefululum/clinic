<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Expertise */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Expertise',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Expertises'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="expertise-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
