<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-6-12 下午2:10
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
namespace KpBootstrap3\Form\View\Helper;

use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormElementErrors;
use Zend\Form\View\Helper\FormRow;

class Bootstrap3FormRow extends FormRow
{

    protected $wrap = '<div class="form-group %s">%s%s</div>';

    protected $eleWrap = '<div class="%s">%s%s</div>';


    public function render(ElementInterface $element)
    {

        $eleWrapClass = [
            'col-sm-10',
        ];

        $label = $element->getLabel();

        $labelHtml = '';

        if (!empty($label)) {
            // label
            $element->setLabelAttributes(
                [
                    'class' => 'col-sm-2 control-label'
                ]
            );
            $labelHelper = $this->getLabelHelper();
            $labelHtml = $labelHelper($element);
        } else {
            $eleWrapClass[] = 'col-md-offset-2';
        }
        // element
        $element->setAttribute('class', 'form-control');
        $elementHelper = $this->getElementHelper();

        $errorHtml = '';
        $errorClass = '';
        if (count($element->getMessages()) > 0) {
            $errorHelper = $this->getElementErrorsHelper();
            $errorHtml = $errorHelper($element);
            $errorClass = 'has-error';
        }

        $elementHtml = sprintf($this->eleWrap, implode(' ', $eleWrapClass), $elementHelper($element), $errorHtml);

        return sprintf($this->wrap, $errorClass, $labelHtml, $elementHtml);
    }

    public function getElementErrorsHelper()
    {
        if ($this->elementErrorsHelper) {
            return $this->elementErrorsHelper;
        }

        if (method_exists($this->view, 'plugin')) {
            $this->elementErrorsHelper = $this->view->plugin('KpBootstrap3FormElementErrors');
        }

        if (!$this->elementErrorsHelper instanceof FormElementErrors) {
            $this->elementErrorsHelper = new Bootstrap3FormElementErrors();
        }

        return $this->elementErrorsHelper;
    }

}