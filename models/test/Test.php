<?php

namespace app\models\test;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property integer $id
 * @property integer $container_id
 * @property integer $course
 * @property string $groupName
 * @property integer $groupNumber
 * @property string $teacherName
 * @property string $subject
 * @property integer $allStudents
 * @property integer $completeStudents
 * @property integer $markFive
 * @property integer $markFour
 * @property integer $markThree
 * @property integer $markTwo
 * @property double $averageScore
 * @property double $academicPerfomance
 * @property double $quality
 *
 * @property Container $container
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['container_id', 'specialty_id', 'course', 'groupNumber', 'allStudents', 'completeStudents', 'markFive', 'markFour', 'markThree', 'markTwo', 'teacherName', 'subject'], 'required'],
            [['container_id', 'specialty_id', 'course', 'groupNumber', 'allStudents', 'completeStudents', 'markFive', 'markFour', 'markThree', 'markTwo'], 'integer'],
            [['averageScore', 'academicPerfomance', 'quality'], 'number'],
            [['teacherName', 'subject'], 'string', 'max' => 255],
            [['container_id'], 'exist', 'skipOnError' => true, 'targetClass' => Container::className(), 'targetAttribute' => ['container_id' => 'id']],
            [['specialty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Specialty::className(), 'targetAttribute' => ['specialty_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'container_id' => 'Container ID',
            'specialty_id' => 'Спциальность',
            'course' => 'Курс',
            'groupName' => 'Название группы',
            'groupNumber' => 'Номер группы',
            'teacherName' => 'Преподаватель',
            'subject' => 'Предмет',
            'allStudents' => 'Всего студентов',
            'completeStudents' => 'Выполнило студентов',
            'markFive' => 'Оценка 5',
            'markFour' => 'Оценка 4',
            'markThree' => 'Оценка 3',
            'markTwo' => 'Оценка 2',
            'averageScore' => 'Average Score',
            'academicPerfomance' => 'Academic Perfomance',
            'quality' => 'Quality',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContainer()
    {
        return $this->hasOne(Container::className(), ['id' => 'container_id']);
    }

    public function getSpecialty()
    {
        return $this->hasOne(Specialty::className(), ['id' => 'specialty_id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert))
        {
            $this->averageScore = intval(ceil((5*$this->markFive + 4*$this->markFour + 3*$this->markThree + 2*$this->markTwo)/$this->completeStudents));
            $this->academicPerfomance = intval(ceil(($this->markFive + $this->markFour + $this->markThree)*100/$this->allStudents));
            $this->quality = intval(ceil(($this->markFive + $this->markFour)*100/$this->allStudents));
            return true;
        } else return false;
    }
}
