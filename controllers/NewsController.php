<?php
namespace controllers;

use system\CView;

/**
 * Created by PhpStorm.
 * @author Sayan
 * Date: 16.09.2016
 * Time: 14:18
 * @package controllers
 */
class NewsController
{
    public function __construct()
    {
        $database = new \PDO('mysql:host=127.0.0.1;dbname=my_database', 'root', '');
        $this->pdo = $database;
    }

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
        $sql = 'INSERT INTO news17 (title, description) VALUES ("' . $_POST["title"] . '", "' . $_POST["description"] . '")';

        $result = $this->pdo->exec($sql);

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
        $sql = 'SELECT * FROM news17';
        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();

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
        $sql = 'SELECT * FROM news17 where id=' . $_GET['id'];
        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetch();

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
        $sql = 'SELECT * FROM news17 where id=' . $_GET['id'];
        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetch();
        
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
        $sql = 'UPDATE news17 SET title="' . $_POST['title'] . '", description="' . $_POST['description'] . '" WHERE id=' . $_POST['id'];

        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        $result = $sth->rowCount();

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
        $sql = 'DELETE FROM news17 WHERE id=' . $_GET['id'];
        $result = $this->pdo->exec($sql);

        if ($result === false) {
            throw new \Exception('Directory does not exist');
        }

        header('Location: /news/index');
    }
}