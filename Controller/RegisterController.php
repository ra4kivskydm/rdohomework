<?php
/**
 * Created by PhpStorm.
 * Register: Дмитрий
 * Date: 20.05.2018
 * Time: 23:54
 */

class RegisterController extends Controller
{
    public function storeAction(Request $request){
        if (!$request->isPost()) {
            return false;
        }


        $model = new Users();
        $model->name = $request->post('name');
        $model->email = $request->post('email');
        $model->password = $request->post('pass');
        $model->save();
        $_SESSION['status'] = 'user ' . $request->post('name') . ' has been successfully create';

        return header('Location: ?route=index/index');

    }

    public function indexAction(){


        return $this->render('index', [
            'users' => Users::all(),
        ]);
    }
}