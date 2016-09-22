<?php
namespace controllers;

use system\CView;

use system\App;

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
        $result = App::$db->table('news17')
            ->insert([
                'title' => $_POST["title"],
                'description' => $_POST["description"]
            ])
            ->execute();

        if ($result === false) {
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
        $result = App::$db
            ->select('*')
            ->from('news17')
            ->orderBy('title DESC')
            ->fetchAll();

        $view = new CView();
        $view->render('index', [
            'result' => $result,
        ]);
    }

    /**
     * @author Sayan
     * выводим информацию из базы данных указанного Id
     */
    public function actionView()
    {
        $result = App::$db
            ->select('*')
            ->from('news17')
            ->where([
                'id' => $_GET['id']
            ])
            ->fetchRow();

        $view = new CView();
        $view->render('view', [
            'result' => $result,
        ]);
    }

    /**
     * @author Sayan
     * рендерим представления с формой обновления записи
     */
    public function actionUpdate()
    {
        $result = App::$db
            ->select('*')
            ->from('news17')
            ->where([
                'id' => $_GET['id']
            ])
            ->fetchRow();
        
        $view = new CView();
        $view->render('update', [
            'result' => $result,
        ]);
    }

    /**
     * @author Sayan
     * @throws \Exception
     * редактируем информацию в базе данных. Если True он возвращаеться в Index, False выводит исключение
     */
    public function actionUpdateProcess()
    {
        $result = App::$db
            ->table('news17')
            ->update([
                'title' => $_POST['title'],
                'description' => $_POST['description'],
            ])
            ->where([
                'id' => $_POST['id'],
            ])
            ->execute();

        if ($result === false) {
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
        $result = App::$db
            ->delete()
            ->from('news17')
            ->where([
                'id' => $_GET['id'],
            ])
            ->execute();

        if ($result === false) {
            throw new \Exception('Directory does not exist');
        }

        header('Location: /news/index');
    }
}