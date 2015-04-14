<?php

namespace Page\Controller;

use Zend\Db\Sql\Predicate\Like;
use Zend\Db\Sql\Predicate\NotLike;
use Zend\Db\Sql\Predicate\Predicate;
use Zend\Db\Sql\Predicate\PredicateSet;
use Zend\Json\Json;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;


use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Result;
use Zend\Authentication\Storage\Session as SessionStorage;
use Zend\Db\Adapter\Adapter as DbAdapter;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;

class PageController extends AbstractActionController
{
    public function homeAction()
    {
//        $menu = $this->getMenuService()->getMenuByMachineName('main-menu');
//        $this->layout()->menu = $menu;

        $slider = $this->getSliderService()->findOneBySlug('slider-glowny');
        $items = $slider->getItems();

        $lastPost = $this->getPostTable()->getOneBy(array('category' => 'news', 'status_id' => 1), 'id DESC');

        $collections = $this->getPostTable()->getBy(array('category' => 'kolekcje', 'status_id' => 1));

        $page = $this->getPageService()->findOneBySlug('o-firmie');

        $this->layout('layout/home');

        $viewParams = array();
        $viewParams['items'] = $items;
        $viewParams['post'] = $lastPost;
        $viewParams['collections'] = $collections;
        $viewParams['page'] = $page;
        $viewModel = new ViewModel();
        $viewModel->setVariables($viewParams);
        return $viewModel;
    }

    public function viewPageAction()
    {
        $this->layout('layout/home');

        $slug = $this->params('slug');

        $page = $this->getPageService()->findOneBySlug($slug);

        if(empty($page)){
            $this->getResponse()->setStatusCode(404);
        }

        $viewParams = array();
        $viewParams['page'] = $page;
        $viewModel = new ViewModel();
        $viewModel->setVariables($viewParams);
        return $viewModel;
    }

    public function viewNewsAction()
    {
        $this->layout('layout/home');

        $slug = $this->params('slug');

        $post = $this->getPostTable()->getOneBy(array('category' => 'news', 'status_id' => 1, 'url' => $slug), 'id DESC');

        $lastPosts = array();

        if(!empty($post))
        {
            $predicate = new NotLike('id', $post->getId());
            $lastPosts = $this->getPostTable()->getBy(array('category' => 'news', 'status_id' => 1, $predicate), 'id DESC', 5);
        }

        $viewParams = array();
        $viewParams['post'] = $post;
        $viewParams['lastPosts'] = $lastPosts;
        $viewModel = new ViewModel();
        $viewModel->setVariables($viewParams);
        return $viewModel;
    }

    public function viewContactAction()
    {
        $this->layout('layout/home');

        $viewParams = array();
        $viewModel = new ViewModel();
        $viewModel->setVariables($viewParams);
        return $viewModel;
    }

    public function viewCollectionAction()
    {
        $this->layout('layout/home');

        $slug = $this->params('slug');
        $collections = $this->getPostTable()->getBy(array('category' => $slug, 'status_id' => 1));
        $dictionary = $this->getDictionaryTable()->getOneBy(array('category' => $slug));

        $viewParams = array();
        $viewModel = new ViewModel();
        $viewParams['collections'] = $collections;
        $viewParams['slug'] = $slug;
        $viewParams['dictionary'] = $dictionary;
        $viewModel->setVariables($viewParams);
        return $viewModel;
    }

    public function oneCollectionAction()
    {
        $this->layout('layout/home');

        $url = $this->params('url');
        $slug = $this->params('slug');

        $dictionary = $this->getDictionaryTable()->getOneBy(array('category' => $slug));
        $collection = $this->getPostTable()->getOneBy(array('url' => $url, 'status_id' => 1));

        $id = $collection->getId();
        $files = $this->getPostFileTable()->getBy(array('post_id' => $id));

        $viewParams = array();
        $viewModel = new ViewModel();
        $viewParams['collection'] = $collection;
        $viewParams['files'] = $files;
        $viewParams['dictionary'] = $dictionary;
        $viewModel->setVariables($viewParams);
        return $viewModel;
    }

    public function contactFormAction()
    {
        $request = $this->getRequest();
        if ($request->isPost())
        {
            $name = $request->getPost('name');
            $email = $request->getPost('email');
            $phone = $request->getPost('phone');
            $subject = $request->getPost('subject');
            $content = $request->getPost('text');

            $content = "Imię i nazwisko: <b>" . $name . "</b> <br/>" .
                "Email: <b>" . $email . "</b> <br/>" .
                "Telefon kontaktowy: <b>" . $phone . "</b> <br/>" .
                "Temat: <b>" . $subject . "</b> <br/>" .
                "Treść: <b>" . $content . "</b> <br/>";

            $html = new MimePart($content);
            $html->type = "text/html";

            $body = new MimeMessage();
            $body->setParts(array($html));

            $transport = $this->getServiceLocator()->get('mail.transport');
            $message = new \Zend\Mail\Message();
            $this->getRequest()->getServer();
            $message->addTo('biuro@web-ir.pl')
                ->addFrom('biuro@web-ir.pl')
                ->setEncoding('UTF-8')
                ->setSubject('Wiadomość z formularza kontaktowego')
                ->setBody($body);
            $transport->send($message);
        }

        $params = 'Wiadomość została wysłana poprawnie';
        $jsonObject = Json::encode($params, true);
        echo $jsonObject;
        return $this->response;
    }

    /**
     * @return \CmsIr\Menu\Service\MenuService
     */
    public function getMenuService()
    {
        return $this->getServiceLocator()->get('CmsIr\Menu\Service\MenuService');
    }

    /**
     * @return \CmsIr\Slider\Service\SliderService
     */
    public function getSliderService()
    {
        return $this->getServiceLocator()->get('CmsIr\Slider\Service\SliderService');
    }

    /**
     * @return \CmsIr\Page\Service\PageService
     */
    public function getPageService()
    {
        return $this->getServiceLocator()->get('CmsIr\Page\Service\PageService');
    }

    /**
     * @return \CmsIr\Newsletter\Model\SubscriberTable
     */
    public function getSubscriberTable()
    {
        return $this->getServiceLocator()->get('CmsIr\Newsletter\Model\SubscriberTable');
    }

    /**
     * @return \CmsIr\System\Model\StatusTable
     */
    public function getStatusTable()
    {
        return $this->getServiceLocator()->get('CmsIr\System\Model\StatusTable');
    }

    /**
     * @return \CmsIr\Post\Model\PostTable
     */
    public function getPostTable()
    {
        return $this->getServiceLocator()->get('CmsIr\Post\Model\PostTable');
    }

    /**
     * @return \CmsIr\Dictionary\Model\DictionaryTable
     */
    public function getDictionaryTable()
    {
        return $this->getServiceLocator()->get('CmsIr\Dictionary\Model\DictionaryTable');
    }

    /**
     * @return \CmsIr\Post\Model\PostFileTable
     */
    public function getPostFileTable()
    {
        return $this->getServiceLocator()->get('CmsIr\Post\Model\PostFileTable');
    }
}
