<?php
namespace app\models;

class RegForm extends User
    {
        public $password_repeat;
        public $agree;
        public function rules()
        { return [
            [[ 'name', 'surname', 'patronymic', 'login', 'email', 'password', 'agree'], 'required'],
            [[ 'name'], 'match', 'pattern'=>'/^[А-ЯЁа-яё]{5,}/u', 'message'=>'Используйте минимум 5 русских букв'],
            [[ 'password'], 'match', 'pattern'=>'/^[A-Za-z0-9]{5,}/', 'message'=>'Используйте минимум 5 латинских букв и цифр'],
            [[ 'email'], 'email'] ,
            [[ 'email'], 'unique'],
            [[ 'surname'], 'match', 'pattern'=>'/^[А-ЯЁа-яё]{5,}/u', 'message'=>'Используйте минимум 5 русских букв'],
            [[ 'patronymic'], 'match', 'pattern'=>'/^[А-ЯЁа-яё]{5,}/u', 'message'=>'Используйте минимум 5 русских букв'],
            [[ 'name'], 'match', 'pattern'=>'/^[А-ЯЁа-яё]{5,}/u', 'message'=>'Используйте минимум 5 русских букв'],
            [['agree'], 'compare', 'compareValue'=>true, 'message'=>''],
            [['name', 'surname', 'patronymic', 'login', 'email', 'password'], 'string', 'max' => 255],
        ];
        }
        /**
        * {@inheritdoc}
        */
        public function attributeLabels()
        { return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'login' => 'Логин',
            'email' => 'Почта',
            'password' => 'Пароль',
            'is_admin' => 'админ',
            'agree' => 'Подвердите согласие на обработку персональных данных',
            ];
        }
        }
