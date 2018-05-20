<?php
/**
 * @author Dima Korets korets.web@gmail.com
 * @Date: 23.04.18
 */

class IndexController extends Controller
{
    public function indexAction(Request $request)
    {
        $db = DbConnection::getInstance();
        if (isset($_SESSION['name'])) {
            $userName = $_SESSION['name'];
        } else {
            $userName = $request->get('name');
            $_SESSION['name'] = $userName;
        }
        $status = isset($_SESSION['status']) ? $_SESSION['status'] : null;
        $result = pow($request->get('number'), $request->get('exp'));
        var_dump($status);
        return $this->render('index', ['result1' => $result, 'name' => $userName, 'status' => $status]);

    }
}