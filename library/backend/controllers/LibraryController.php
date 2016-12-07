<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

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
	public function actionAuthors()
	{
		$authors = Author::find()
		-> orderBy (['last_name' => SORT_ASC, 'first_name' =>
		SORT_ASC])
		->all();
		return $this->render('authors',
		['authors' => $authors]);	
	}
	public function actionBooks()
	{
		$books = Book::find()
		-> orderBy (['name' => SORT_ASC])
		->all();
		return $this->render('books',
		['books' => $books ]);	
	}
	public function actionAdd_author()
	{
		$author= new Author;
		if (isset($_POST['Author'])){
			$author->attributes=$_POST['Author'];
			if ($author->save()){
				return $this -> redirect(['library/authors']);
			}
		}
		return $this -> render('form_author', ['author'=> $author]);		
	}		
	public function actionEdit_author($id)
	{
		$author = Author::findOne($id);
		if ($author){
			if (isset($_POST['Author'])){
				$author->attributes=$_POST['Author'];
				if ($author->save()){
					return $this -> redirect(['library/authors']);
				} 
			}
		return $this -> render('form_author', ['author'=> $author]);	
		} else {
			throw new \yii\web\NotFoundHttpException('Автор не найден');
		}
	}
	public function actionDelete_author($id)
	{
		$author = Author::findOne($id);
		$author->delete();
		return $this->redirect(['library/authors']); 	
	}
	public function actionAdd_book()
	{
		$book= new Book;
		$book->status=1;
		$author= Author::find()->all();
		if (isset($_POST['Book'])){
			$book->attributes=$_POST['Book'];
			if ($book->save()){
				return $this -> redirect(['library/books']);
			}
		}
		return $this -> render('form_book', ['book'=> $book, 'author'=> $author]);	
	}
	public function actionEdit_book($id)
	{
		$book = Book::findOne($id);
		$author= Author::find()->all();
		if ($book){
			if (isset($_POST['Book'])){
				$book->attributes=$_POST['Book'];
				if ($book->save()){
					return $this -> redirect(['library/books']);
				}
			}
		return $this -> render('form_book', ['book'=> $book, 'author' =>$author]);
		} else {
			throw new \yii\web\NotFoundHttpException('Книга не найдена');
		}		
	}
	public function actionDelete_book($id)
	{
		$book = Book::findOne($id);
		if (!$book) {
			return 'Книга не найдена';
		} 
		$book->delete();
		return $this->redirect(['library/books']); 	
	}
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
						'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
}