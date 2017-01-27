<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PrescriptionHeader */

$this->title = Yii::t('app', 'Create Prescription Header');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prescription Headers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prescription-header-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
