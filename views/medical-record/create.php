<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MedicalRecord */

$this->title = Yii::t('app', 'Create Medical Record');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Medical Records'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medical-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
