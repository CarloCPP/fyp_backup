<?php

class __Mustache_a17cf5634615a9ba1c97a169ec299f41 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<p>';
        // 'str' section
        $value = $context->find('str');
        $buffer .= $this->sectionE7dc50ed11a1a62856835411f6e5be1f($context, $indent, $value);
        $buffer .= '</p>
';
        $value = $this->resolveValue($context->find('form'), $context);
        $buffer .= $indent . $value;
        $buffer .= '
';
        $buffer .= $indent . '<p>';
        // 'str' section
        $value = $context->find('str');
        $buffer .= $this->section2575ff90e8e6b535fd880dcc4f5f328d($context, $indent, $value);
        $buffer .= '</p>
';
        $buffer .= $indent . '<div class="container-fluid">
';
        $buffer .= $indent . '    <div class="modules m-b-1">
';
        $buffer .= $indent . '        <div class="row m-b-1">
';
        // 'modules' section
        $value = $context->find('modules');
        $buffer .= $this->section92ca42368c068f0b81f30021f79cc1d8($context, $indent, $value);
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';

        return $buffer;
    }

    private function sectionE7dc50ed11a1a62856835411f6e5be1f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'modifybulkactions, completion';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'modifybulkactions, completion';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2575ff90e8e6b535fd880dcc4f5f328d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'affectedactivities, completion, {{modulescount}}';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'affectedactivities, completion, ';
                $value = $this->resolveValue($context->find('modulescount'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section92ca42368c068f0b81f30021f79cc1d8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div class="col-sm-2">
                    <img src="{{icon}}" class="m-r-1 m-b-1" alt=" " role="presentation" />
                    <span>{{{formattedname}}}</span>
                </div>
            ';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <div class="col-sm-2">
';
                $buffer .= $indent . '                    <img src="';
                $value = $this->resolveValue($context->find('icon'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '" class="m-r-1 m-b-1" alt=" " role="presentation" />
';
                $buffer .= $indent . '                    <span>';
                $value = $this->resolveValue($context->find('formattedname'), $context);
                $buffer .= $value;
                $buffer .= '</span>
';
                $buffer .= $indent . '                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
