<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-6-12 下午2:10
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
namespace KpBootstrap3\Form\View\Helper;

use Zend\Form\FieldsetInterface;
use Zend\Form\FormInterface;
use Zend\Form\View\Helper\Form;

class Bootstrap3Form extends Form{

    public function render(FormInterface $form)
    {
        if (method_exists($form, 'prepare')) {
            $form->prepare();
        }

        $form->setAttribute('class','form-horizontal');

        $formContent = '';

        foreach ($form as $element) {
            if ($element instanceof FieldsetInterface) {
                $formContent.= $this->getView()->formCollection($element);
            } else {
                $formContent.= $this->getView()->KpBootstrap3FormRow($element);
            }
        }

        return $this->openTag($form) . $formContent . $this->closeTag();
    }
}