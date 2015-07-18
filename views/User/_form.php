<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


use yii\helpers\ArrayHelper;
use app\models\City;
use app\models\Country;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput() ?>
    
    <?= $form->field($model, 'password_hash')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'country_id') 
		->dropDownList(
			ArrayHelper::map(Country::find()->all(), 'id', 'name'),
			[
				'prompt' => 'Selecciona país',
				'onchange' => '$.get("' . Yii::$app->urlManager->createUrl('city/list') . '", { id: $(this).val() }).done(
					function(data) {
						$("select#user-city_id").html(data);
					});'					
			]
		);
	?>	

    <?= $form->field($model, 'city_id') 
		->dropDownList(
			ArrayHelper::map(City::find()->all(), 'id', 'city'),
			[
				'prompt' => 'Selecciona ciudad'
			]
		)
	?>	


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
