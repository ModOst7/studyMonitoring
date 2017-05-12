<?php

namespace app\models\test;

use Yii;

/**
 * This is the model class for table "container".
 *
 * @property integer $id
 * @property integer $year
 * @property integer $month
 *
 * @property Test[] $tests
 */
class Container extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'container';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year', 'month'], 'required'],
            [['year', 'month'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'year' => 'Год',
            'month' => 'Месяц',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTests()
    {
        return $this->hasMany(Test::className(), ['container_id' => 'id']);
    }
}
