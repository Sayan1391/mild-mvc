<?php
namespace controllers;

use system\CView;
use system\App;
use models\User;

/**
 * Created by PhpStorm.
 * @author Sayan
 * @package controllers
 */
class UserController
{
    public function actionReg()
    {
        $view = new CView();
        $view->render('reg');
    }

    public function actionAjaxReg()
    {
        $model = new User();
        $model->login = $_POST["login"];
        $model->password = md5($_POST["password"]);
        $model->email = $_POST["email"];
        if ($_POST["password"] != $_POST["retype-password"]) {
            echo json_encode(['message' => 'err']);
            die();
        }

        $result = $model->save();
        if (!$result) {
            echo json_encode(['status' => 'err']);
            die();
        } else {
            echo json_encode(['status' => 'ok']);
            die();
        }
    }

    public function actionAccount()
    {
        $view = new CView();
        $view->render('account');
    }

    public function actionAjaxAccount()
    {
        $model = new User();

        $password = md5($_POST["password"]);

        $model = $model->findOne(['login' => $_POST["login"]]);

        if (!$model) {
            echo json_encode(['status' => 'err']);
            die();
        }

        if ($password != $model->password) {
            echo json_encode(['status' => 'err']);
            die();
        } else {
            $_SESSION['user_id'] = $model->id;
            echo json_encode(['status' => 'ok']);
            die();
        }
    }

    public function actionAjaxLogout()
    {
        $model = new User();
        unset($_SESSION['user_id']);

        if (!$_SESSION['user_id']) {
            echo json_encode(['status' => 'ok']);
        }

    }
}