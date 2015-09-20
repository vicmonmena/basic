<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\City;
use app\models\Country;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            [
                'attribute' => 'country_id',
                'value' => function($model) {
                    $country = Country::findOne($model->country_id);
                    return $country->name;
                },
                'filter' => ArrayHelper::map(Country::find()->all(), 'id', 'name'),
            ],
            [
                'attribute' => 'city_id',
                'value' => function($model) {
                    $city = City::findOne($model->city_id);
                    return $city->city;
                },
                'filter' => ArrayHelper::map(City::find()->all(), 'id', 'city'),
            ],
            'email:email',
            'status',
            // 'created_at',
            // 'updated_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {twitter} {web}',
                'buttons' => [
                    'web' => function ($url, $model, $key) { 
                        return $model->web != '' ? Html::a(
                            '<span class="glyphicon glyphicon-globe"</span>',
                            $model->web) : '';
                    },
                    'twitter' => function ($url, $model, $key) { 
                        return $model->twitter != '' ? Html::a(
                            '<span class="glyphicon glyphicon-picture"</span>',
                            $model->twitter) : '';
                    },
                ],
            ],
        ],
    ]); ?>

</div>
