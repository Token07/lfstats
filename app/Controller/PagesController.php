<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * @see          http://cakephp.org CakePHP(tm) Project
 * @since         CakePHP(tm) v 0.2.9
 *
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller.
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @see http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    /**
     * Controller name.
     *
     * @var string
     */
    public $name = 'Pages';

    /**
     * This controller does not use a model.
     *
     * @var array
     */
    public $uses = [];

    public function beforeFilter()
    {
        $this->Auth->allow();
        parent::beforeFilter();
    }

    /**
     * Displays a view.
     *
     * @throws ForbiddenException When a directory traversal attempt.
     * @throws NotFoundException  When the view file could not be found
     *                            or MissingViewException in debug mode.
     *
     * @return void
     */
    public function display()
    {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this->set(compact('page', 'subpage', 'title_for_layout'));
        $this->render(implode('/', $path));
    }

    public function aboutSM5()
    {
    }

    public function help()
    {
    }

    public function twitch()
    {
    }

    public function wct3Schedule()
    {
    }

    public function wct4Bracket()
    {
    }

    public function internats2017Bracket()
    {
    }

    public function ect2017Bracket()
    {
    }

    public function wct2018Bracket()
    {
    }
}
