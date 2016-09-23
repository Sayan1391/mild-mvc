<?php
namespace controllers;

use system\CView;
use system\App;
use models\News;

/**
 * Created by PhpStorm.
 * @author Sayan
 * Date: 16.09.2016
 * Time: 14:18
 * @package controllers
 */
class NewsController
{
    /**
     * @author Sayan
     * рендерим представления с формой добавления записи
     */
    public function actionCreate()
    {
        $view = new CView();
        $view->render('create');
    }

    /**
     * @author Sayan
     * @throws \Exception
     * добавляем информацию в базу данных. Если True он возвращаеться в Index, False выводит исключение
     */
    public function actionCreateProcess()
    {
        $model = new News();
        $model->title = $_POST["title"];
        $model->description = $_POST["description"];
        $data = $model->save();

        if ($data != true) {
            throw new \Exception('Directory does not exist');
        }

        header('Location: /news/index');
    }

    /**
     * @author Sayan
     * выводим всю информацию из базы данных
     */
    public function actionIndex()
    {
        $model = new News();
        $data = $model->findAll();

//        echo '<pre>';
//        var_dump($data);

        $view = new CView();
        $view->render('index', [
            'data' => $data,
        ]);
    }

    /**
     * @author Sayan
     * выводим информацию из базы данных указанного Id
     */
    public function actionView()
    {
        $model = new News();
        $data = $model->findOne(['id' => $_GET['id']]);

        $view = new CView();
        $view->render('view', [
            'result' => $data,
        ]);
    }

    /**
     * @author Sayan
     * рендерим представления с формой обновления записи
     */
    public function actionUpdate()
    {
        $model = new News();
        $data = $model->findOne(['id' => $_GET['id']]);

        $view = new CView();
        $view->render('update', [
            'data' => $data,
        ]);
    }

    /**
     * @author Sayan
     * @throws \Exception
     * редактируем информацию в базе данных. Если True он возвращаеться в Index, False выводит исключение
     */
    public function actionUpdateProcess()
    {
        $model = new News();

        $model2 = $model->findOne(['id' => $_POST['id']]);
        
        $model2->title = $_POST['title'];
        $model2->description = $_POST['description'];
        $data = $model2->save();
        
        if (!$data) {
            throw new \Exception('Directory does not exist');
        }

        header('Location: /news/index');
    }

    /**
     * @author Sayan
     * @throws \Exception
     * рендерим представления с формой удаления записи. Если True он возвращаеться в Index, False выводит исключение
     */
    public function actionDelete()
    {
        $model = new News();
        $model2 = $model->findOne(['id' => $_GET['id']]);
        $data = $model2->delete();

        if ($data != true) {
            throw new \Exception('Directory does not exist');
        }

        header('Location: /news/index');
    }
}