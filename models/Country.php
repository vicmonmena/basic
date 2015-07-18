<?php

namespace app\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $name
 * @property string $create_at
 * @property string $update_at
 *
 * @property City[] $cities
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['create_at', 'update_at'], 'safe'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['country_id' => 'id']);
    }

    /** 
     * @return \yii\db\ActiveQuery 
     */ 
    public function getUsers() 
    { 
       return $this->hasMany(User::className(), ['city_id' => 'id']); 
    }
}
