<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm2 extends Model
{   
    public $fname;
    public $mname;
    public $lname;
    public $username;
    public $email;
    public $password;
   // public $password;
    public $designation;
    public $contact_no;
    public $country_code;
    public $contactperson;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['fname', 'required'],
           // ['mname', 'required'],
            ['lname', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['designation', 'required'],
            ['designation', 'string', 'max' => 100],
            ['contact_no', 'required'],
            ['contact_no', 'number'],
            ['country_code', 'required'],
            ['country_code', 'number'],

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->fname = $this->fname;
            $user->mname = $this->mname;
            $user->lname = $this->lname;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->type = 'Vendor';
            $user->designation = $this->designation;
            $user->contact_no = $this->contact_no;
            $user->country_code = $this->country_code;
            $user->setPassword($this->password);
            $user->password = $this->password;
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
