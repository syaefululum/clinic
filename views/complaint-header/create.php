<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ComplaintHeader */

$this->title = Yii::t('app', 'Create Complaint Header');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Complaint Headers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="complaint-header-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
