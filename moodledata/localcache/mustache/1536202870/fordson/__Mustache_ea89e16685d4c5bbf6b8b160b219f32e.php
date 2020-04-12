<?php

class __Mustache_ea89e16685d4c5bbf6b8b160b219f32e extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        // 'pix' section
        $value = $context->find('pix');
        $buffer .= $this->section5e86ec2bf56971e8cb11fa89119b6edf($context, $indent, $value);
        $buffer .= '
';

        return $buffer;
    }

    private function section593c25068e3a89c698b5f1d973444350(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'loading, tool_lp';
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
                
                $buffer .= 'loading, tool_lp';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5e86ec2bf56971e8cb11fa89119b6edf(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'y/loading, core, {{#str}}loading, tool_lp{{/str}}';
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
                
                $buffer .= $indent . 'y/loading, core, ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section593c25068e3a89c698b5f1d973444350($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
