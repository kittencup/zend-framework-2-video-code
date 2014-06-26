<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-5-14 下午6:08
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

namespace KpUser\Controller;

use KpUser\Event\User;
use KpUser\Form\UserLogin;
use KpUser\Form\UserRegister;
use KpUser\Options\UserModuleOptionsAwareInterface;
use KpUser\Options\UserModuleOptionsTrait;
use Zend\InputFilter\InputFilter;
use Zend\Mvc\Controller\AbstractActionController;

class UserController extends AbstractActionController implements UserModuleOptionsAwareInterface
{
    use UserModuleOptionsTrait;

    public function indexAction()
    {
        $userTable = $this->serviceLocator->get('KpUser\Table\UserTable');

        /* @var \Zend\Paginator\Paginator $userPaginator */
        $userPaginator = $userTable->fetchUserPaginator();


        $request = $this->getRequest();

        $page = $request->getQuery('page', 1);

        $userPaginator->setCurrentPageNumber($page);

        return [
            'userPaginator' => $userPaginator
        ];

    }

    public function disabledRegisterAction()
    {
        if (!$this->userModuleOptions->getDisabledRegister()) {
            $this->redirect()->toRoute('KpUser-user', ['action' => 'register']);
        }
    }

    public function registerAction()
    {
        if ($this->userModuleOptions->getDisabledRegister()) {
            $this->redirect()->toRoute('KpUser-user', ['action' => 'disabledRegister']);
        }

        $formElementManager = $this->serviceLocator->get('formElementManager');

        $form = $formElementManager->get('KpUser\Form\UserRegister');

        $request = $this->getRequest();

        if ($request->isPost()) {

            $parameters = $request->getPost();

            $form->setData($parameters);

            $form->setInputFilter(new InputFilter());

            if ($form->isValid()) {

                $userEntity = $form->getData();

                $userEvent = new User();
                $userEvent->setForm($form)
                    ->setUserModuleOptions($this->userModuleOptions)
                    ->setUserEntity($userEntity)
                    ->setServiceLocator($this->serviceLocator);

                $responseCollection = $this->getEventManager()->trigger(User::USER_REGISTER_PER, $userEvent, function ($callbackReturn) {
                    return $callbackReturn === false;
                });

                if ($responseCollection->last() !== false) {

                    // 将数据保存在数据库里
                    $userTable = $this->serviceLocator->get('KpUser\Table\UserTable');

                    if ($userTable->saveUser($userEntity)) {
                        $this->getEventManager()->trigger('user.register.post');
                    } else {
                        $this->getEventManager()->trigger('user.register.fail');
                    }

                    $this->redirect()->toRoute('KpUser-user', ['action' => 'login']);
                }

            }
        }

        return [
            'form' => $form
        ];

    }

    public function loginAction()
    {

        $form = new UserLogin();

        return [
            'form' => $form
        ];
    }
}