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

    public function actionAjaxCreate()
    {
        $model = new News();
        $model->title = $_POST["title"];
        $model->description = $_POST["description"];
        $result = $model->save();

        if (!$result) {
            echo json_encode(['status' => 'err']);
        } else {
            echo json_encode(['status' => 'ok']);
        }

    }

    /**
     * @author Sayan
     * выводим всю информацию из базы данных
     */
    public function actionIndex()
    {
        $model = new News();
        $data = $model->findAll();

        $view = new CView();
        $view->render('index', [
            'data' => $data,
        ]);
    }

    public function actionAdmin()
    {
        $model = new News();
        $data = $model->findAll();

        $view = new CView();
        $view->render('admin', [
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
            'data' => $data,
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
    public function actionAjaxUpdate()
    {
        $model = new News();
        $model2 = $model->findOne(['id' => $_POST['id']]);

        $model2->title = $_POST['title'];
        $model2->description = $_POST['description'];
        $result = $model2->save();

        if (!$result) {
            echo json_encode(['status' => 'err']);
        } else {
            echo json_encode(['status' => 'ok']);
        }
    }

    /**
     * @author Sayan
     * @throws \Exception
     * рендерим представления с формой удаления записи. Если True он возвращаеться в Index, False выводит исключение
     */
    public function actionAjaxDelete()
    {
        $model = new News();
        $model2 = $model->findOne(['id' => $_POST['id']]);
        $result = $model2->delete();

        if (!$result) {
            echo json_encode(['status' => 'err']);
        } else {
            echo json_encode(['status' => 'ok']);
        }
    }


}