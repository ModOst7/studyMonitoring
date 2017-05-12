<?php

namespace app\models\test;

use Yii;

/**
 * This is the model class for table "specialty".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Test[] $tests
 */
class Specialty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specialty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTests()
    {
        return $this->hasMany(Test::className(), ['specialty_id' => 'id']);
    }
}
