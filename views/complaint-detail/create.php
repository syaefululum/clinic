<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ComplaintDetail */

$this->title = Yii::t('app', 'Create Complaint Detail');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Complaint Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="complaint-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
