<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rel_job".
 *
 * @property integer $rj_id
 * @property string $positiontype
 * @property string $rj_name
 * @property string $rj_dep
 * @property string $work_type
 * @property string $max_salary
 * @property string $work_city
 * @property string $work_year
 * @property string $education
 * @property string $work_tempt
 * @property string $work_desc
 * @property string $work_address
 * @property integer $company_id
 * @property integer $rj_status
 * @property integer $addtime
 * @property integer $m_id
 * @property string $email
 * @property integer $is_hot
 * @property string $min_salary
 * @property integer $is_ok
 * @property string $lng
 * @property string $lat
 */
class RelJob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rel_job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rj_name'], 'required'],
            [['max_salary'], 'number'],
            [['work_desc'], 'string'],
            [['company_id', 'rj_status', 'addtime', 'm_id', 'is_hot', 'is_ok'], 'integer'],
            [['positiontype', 'rj_dep', 'work_type'], 'string', 'max' => 30],
            [['rj_name', 'lng', 'lat'], 'string', 'max' => 20],
            [['work_city', 'work_year', 'education'], 'string', 'max' => 10],
            [['work_tempt'], 'string', 'max' => 25],
            [['work_address'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 50],
            [['min_salary'], 'string', 'max' => 220]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rj_id' => 'Rj ID',
            'positiontype' => 'Positiontype',
            'rj_name' => 'Rj Name',
            'rj_dep' => 'Rj Dep',
            'work_type' => 'Work Type',
            'max_salary' => 'Max Salary',
            'work_city' => 'Work City',
            'work_year' => 'Work Year',
            'education' => 'Education',
            'work_tempt' => 'Work Tempt',
            'work_desc' => 'Work Desc',
            'work_address' => 'Work Address',
            'company_id' => 'Company ID',
            'rj_status' => 'Rj Status',
            'addtime' => 'Addtime',
            'm_id' => 'M ID',
            'email' => 'Email',
            'is_hot' => 'Is Hot',
            'min_salary' => 'Min Salary',
            'is_ok' => 'Is Ok',
            'lng' => 'Lng',
            'lat' => 'Lat',
        ];
    }
}
