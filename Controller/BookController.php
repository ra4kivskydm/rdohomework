<?php
/**
 * @author Dima Korets korets.web@gmail.com
 * @Date: 24.04.18
 */

class BookController extends Controller
{
    public function createAction(Request $request)
    {
        return $this->render('create');
    }

    public function storeAction(Request $request)
    {
        if (!$request->isPost()) {
            return false;
        }


        $model = new Book();
        $model->title = $request->post('title');
        $model->author = $request->post('author');
        $model->year = $request->post('year');
        $model->save();

        $_SESSION['status'] = 'Book ' . $request->post('title') . ' has been successfully stored';

        return header('Location: ?route=book/index');
    }

    public function indexAction()
    {
        $status = isset($_SESSION['status']) ? $_SESSION['status'] : null;

        unset($_SESSION['status']);

        return $this->render('index', [
            'books' => Book::all(),
            'status' => $status
        ]);
    }
}