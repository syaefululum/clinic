<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PrescriptionDetail */

$this->title = Yii::t('app', 'Create Prescription Detail');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prescription Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prescription-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
