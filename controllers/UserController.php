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
        } else {
            $result = $model->save();
            if (!$result) {
                echo json_encode(['status' => 'err']);
            } else {
                echo json_encode(['status' => 'ok']);
            }
//            var_dump($result);
//            die();
        }


    }
}