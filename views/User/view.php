<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\City;
use app\models\Country;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            [
                'attribute' => 'country_id',
                'value' => Country::findOne($model->country_id)->name
            ],
            [
                'attribute' => 'city_id',
                'value' => City::findOne($model->country_id)->city
            ],
            'email:email',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
