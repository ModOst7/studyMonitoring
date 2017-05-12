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
class TestRecord extends \yii\db\ActiveRecord
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
            [['container_id'], 'required'],
            [['container_id', 'course', 'groupNumber', 'allStudents', 'completeStudents', 'markFive', 'markFour', 'markThree', 'markTwo'], 'integer'],
            [['averageScore', 'academicPerfomance', 'quality'], 'number'],
            [['groupName', 'teacherName', 'subject'], 'string', 'max' => 255],
            [['container_id'], 'exist', 'skipOnError' => true, 'targetClass' => Container::className(), 'targetAttribute' => ['container_id' => 'id']],
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
            'course' => 'Course',
            'groupName' => 'Group Name',
            'groupNumber' => 'Group Number',
            'teacherName' => 'Teacher Name',
            'subject' => 'Subject',
            'allStudents' => 'All Students',
            'completeStudents' => 'Complete Students',
            'markFive' => 'Mark Five',
            'markFour' => 'Mark Four',
            'markThree' => 'Mark Three',
            'markTwo' => 'Mark Two',
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
}
