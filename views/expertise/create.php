<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Expertise */

$this->title = Yii::t('app', 'Create Expertise');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Expertises'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expertise-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
