<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $id
 * @property int $companies_id
 * @property int $departments_id
 * @property string $first_name
 * @property string $last_name
 * @property string $birthday
 * @property int $age
 * @property string $gender
 * @property string $city
 * @property string $address
 * @property int $phone_number
 * @property string $email
 *
 * @property Companies $companies
 * @property Departments $departments
 * @property EmployeesSkills[] $employeesSkills
 * @property Salaries[] $salaries
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
            [['companies_id', 'departments_id', 'first_name', 'last_name', 'birthday', 'age', 'gender', 'city', 'address', 'phone_number', 'email'], 'required'],
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
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'birthday' => 'Birthday',
            'age' => 'Age',
            'gender' => 'Gender',
            'city' => 'City',
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
    public function getEmployeesSkills()
    {
        return $this->hasMany(EmployeesSkill::className(), ['employees_id' => 'id']);
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
    public function getSalariesHistory()
    {
        return $this->hasOne(Salary::className(), ['employees_id' => 'id']);
    }
}
