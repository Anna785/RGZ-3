<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use app\models\Author;
use app\models\Book;
/**
 * Site controller
 */
class LibraryController extends Controller
{ 
	
	public function actionIndex()
	{
		$authors = Author::find()
		-> orderBy (['last_name' => SORT_ASC, 'first_name' =>
		SORT_ASC]) 
		-> all();
		return $this->render('index', ['authors'=>$authors]);
	}
	public function actionView($id)
	{
		$books = Author::findOne($id);
		if ($books){
			return $this->render('view',
			['books' => $books]);
		} else {
			throw new \yii\web\NotFoundHttpException('Автор не найден');
		}
	}
	public function actionHome(){
		return $this->render('home');	
	}
}