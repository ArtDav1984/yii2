<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $id
 * @property int $companies_id
 * @property int $departments_id
 * @property int $cities_id
 * @property string $first_name
 * @property string $last_name
 * @property string $birthday
 * @property int $age
 * @property string $gender
 * @property string $address
 * @property int $phone_number
 * @property string $email
 *
 * @property Cities $cities
 * @property Companies $companies
 * @property Departments $departments
 * @property Salary[] $salaries
 * @property SkillsEmployees[] $skillsEmployees
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['companies_id', 'departments_id', 'city', 'first_name', 'last_name', 'birthday', 'age', 'gender', 'address', 'phone_number', 'email'], 'required'],
            [['companies_id', 'departments_id', 'age', 'phone_number'], 'integer'],
            [['birthday'], 'safe'],
            [['first_name', 'last_name', 'gender', 'city', 'address', 'email'], 'string', 'max' => 255],
            [['companies_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['companies_id' => 'id']],
            [['departments_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['departments_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'companies_id' => 'Companies',
            'departments_id' => 'Departments',
            'city' => 'City',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'birthday' => 'Birthday',
            'gender' => 'Gender',
            'address' => 'Address',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasOne(Company::className(), ['id' => 'companies_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasOne(Department::className(), ['id' => 'departments_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalaries()
    {
        return $this->hasOne(Salary::className(), ['employees_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkillsEmployees()
    {
        return $this->hasMany(SkillEmployee::className(), ['employees_id' => 'id']);
    }
}
