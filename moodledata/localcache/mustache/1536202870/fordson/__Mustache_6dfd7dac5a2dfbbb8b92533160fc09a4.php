<?php

class __Mustache_6dfd7dac5a2dfbbb8b92533160fc09a4 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div data-region="managecompetencies">
';
        $buffer .= $indent . '<h2>
';
        $buffer .= $indent . '    ';
        $value = $this->resolveValue($context->findDot('framework.shortname'), $context);
        $buffer .= $value;
        $buffer .= '
';
        // 'canmanage' section
        $value = $context->find('canmanage');
        $buffer .= $this->sectionF49b4b5e850038b4f7f12d2a9d3b4046($context, $indent, $value);
        $buffer .= $indent . '</h2>
';
        $buffer .= $indent . '<div>';
        $value = $this->resolveValue($context->findDot('framework.description'), $context);
        $buffer .= $value;
        $buffer .= '</div>
';
        $buffer .= $indent . '    <h3>';
        // 'str' section
        $value = $context->find('str');
        $buffer .= $this->section8ed303db86c24a1b6bfe4c5a8f2ef600($context, $indent, $value);
        $buffer .= '</h3>
';
        $buffer .= $indent . '    <div class="row-fluid row">
';
        $buffer .= $indent . '        <div class="span6 col-lg-6">
';
        $buffer .= $indent . '            <p>
';
        $buffer .= $indent . '                <form data-region="filtercompetencies" data-frameworkid="';
        $value = $this->resolveValue($context->findDot('framework.id'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '" class="form-inline">
';
        $buffer .= $indent . '                    <div class="form-group">
';
        $buffer .= $indent . '                        <label class="accesshide" for="filter';
        $value = $this->resolveValue($context->find('uniqid'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '">';
        // 'str' section
        $value = $context->find('str');
        $buffer .= $this->sectionCa5204456f5e0fe787bc9578e0355ac2($context, $indent, $value);
        $buffer .= '</label>
';
        $buffer .= $indent . '                        <input class="form-control" type="text" id="filter';
        $value = $this->resolveValue($context->find('uniqid'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '" placeholder="';
        // 'str' section
        $value = $context->find('str');
        $buffer .= $this->sectionCa5204456f5e0fe787bc9578e0355ac2($context, $indent, $value);
        $buffer .= '" value="';
        $value = $this->resolveValue($context->find('search'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '">
';
        $buffer .= $indent . '                        <button class="btn btn-secondary">';
        // 'pix' section
        $value = $context->find('pix');
        $buffer .= $this->section353c2736726873e65af3dc9159290acd($context, $indent, $value);
        $buffer .= '</button>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                </form>
';
        $buffer .= $indent . '            </p>
';
        $buffer .= $indent . '            <ul data-enhance="tree" class="competency-tree">
';
        if ($partial = $this->mustache->loadPartial('tool_lp/loading')) {
            $buffer .= $partial->renderInternal($context, $indent . '                ');
        }
        $buffer .= $indent . '            </ul>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        <div class="span6 card col-lg-6">
';
        $buffer .= $indent . '            <div class="card-block card-body">
';
        $buffer .= $indent . '                <div class="card-title">
';
        $buffer .= $indent . '                    <h4 data-region="selected-competency">';
        // 'str' section
        $value = $context->find('str');
        $buffer .= $this->section3f081e460ad417a54dfa9cd702c6056f($context, $indent, $value);
        $buffer .= '</h4>
';
        $buffer .= $indent . '                        <span data-region="competencyactionsmenu" class="pull-xs-right">
';
        $buffer .= $indent . '                            <ul title="';
        // 'str' section
        $value = $context->find('str');
        $buffer .= $this->sectionAd3b4bf865abc6ce6b96cc2301a00c9b($context, $indent, $value);
        $buffer .= '" class="competencyactionsmenu">
';
        $buffer .= $indent . '                                <li>
';
        $buffer .= $indent . '                                    <a href="#">';
        // 'str' section
        $value = $context->find('str');
        $buffer .= $this->sectionAd3b4bf865abc6ce6b96cc2301a00c9b($context, $indent, $value);
        $buffer .= '</a><b class="caret"></b>
';
        $buffer .= $indent . '                                    <ul class="dropdown dropdown-menu">
';
        // 'canmanage' section
        $value = $context->find('canmanage');
        $buffer .= $this->section9db0a745b7d79d3bca0842890c0fdbe5($context, $indent, $value);
        $buffer .= $indent . '                                    <li class="dropdown-item">
';
        $buffer .= $indent . '                                        <a href="#" data-action="linkedcourses">
';
        $buffer .= $indent . '                                            ';
        // 'pix' section
        $value = $context->find('pix');
        $buffer .= $this->section0ec258893eb34cd9f7380a2dacf14623($context, $indent, $value);
        $buffer .= ' ';
        // 'str' section
        $value = $context->find('str');
        $buffer .= $this->section3175479cbbaa69a01678f07bb072fe13($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                                        </a>
';
        $buffer .= $indent . '                                    </li>
';
        // 'canmanage' section
        $value = $context->find('canmanage');
        $buffer .= $this->sectionF1e5cff19fb1284980f2fba173fc3d74($context, $indent, $value);
        $buffer .= $indent . '                                </ul>
';
        $buffer .= $indent . '                            </li>
';
        $buffer .= $indent . '                        </ul>
';
        $buffer .= $indent . '                    </span>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                <p data-region="competencyinfo">
';
        $buffer .= $indent . '                    ';
        // 'str' section
        $value = $context->find('str');
        $buffer .= $this->section36aea98d83dc89f39875a5f5db8aedc0($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                </p>
';
        $buffer .= $indent . '                <div data-region="competencyactions">
';
        // 'canmanage' section
        $value = $context->find('canmanage');
        $buffer .= $this->section19bce95cfe645c4aeb75f48fbb7f2dfd($context, $indent, $value);
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '
';
        // 'js' section
        $value = $context->find('js');
        $buffer .= $this->section739d550e29ff23d01623ced62adfe993($context, $indent, $value);
        $buffer .= $indent . '
';

        return $buffer;
    }

    private function sectionA6d75ad9a93dfb6da827f9641a607161(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'editcompetencyframework, tool_lp';
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
                
                $buffer .= 'editcompetencyframework, tool_lp';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5837bc70280770d6ed48eed131743999(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 't/edit, core, {{#str}}editcompetencyframework, tool_lp{{/str}}';
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
                
                $buffer .= 't/edit, core, ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->sectionA6d75ad9a93dfb6da827f9641a607161($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF49b4b5e850038b4f7f12d2a9d3b4046(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <a href="{{pluginbaseurl}}/editcompetencyframework.php?id={{framework.id}}&pagecontextid={{pagecontextid}}&return=competencies">{{#pix}}t/edit, core, {{#str}}editcompetencyframework, tool_lp{{/str}}{{/pix}}</a>
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
                
                $buffer .= $indent . '            <a href="';
                $value = $this->resolveValue($context->find('pluginbaseurl'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '/editcompetencyframework.php?id=';
                $value = $this->resolveValue($context->findDot('framework.id'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '&pagecontextid=';
                $value = $this->resolveValue($context->find('pagecontextid'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '&return=competencies">';
                // 'pix' section
                $value = $context->find('pix');
                $buffer .= $this->section5837bc70280770d6ed48eed131743999($context, $indent, $value);
                $buffer .= '</a>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8ed303db86c24a1b6bfe4c5a8f2ef600(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'competencies, core_competency';
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
                
                $buffer .= 'competencies, core_competency';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionCa5204456f5e0fe787bc9578e0355ac2(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'search, tool_lp';
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
                
                $buffer .= 'search, tool_lp';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBec198647490b4fd7cf2a5fed37757ce(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'search';
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
                
                $buffer .= 'search';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section353c2736726873e65af3dc9159290acd(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'a/search, , {{#str}}search{{/str}}';
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
                
                $buffer .= 'a/search, , ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->sectionBec198647490b4fd7cf2a5fed37757ce($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3f081e460ad417a54dfa9cd702c6056f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'selectedcompetency, tool_lp';
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
                
                $buffer .= 'selectedcompetency, tool_lp';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionAd3b4bf865abc6ce6b96cc2301a00c9b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'edit';
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
                
                $buffer .= 'edit';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section06156a95c0067bea78d4929542c7acc4(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 't/edit';
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
                
                $buffer .= 't/edit';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5d6027d61e3baee0d60eb47bed124409(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 't/move';
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
                
                $buffer .= 't/move';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section502e48c5c644e7959c2e3322cd65149a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'movetonewparent, tool_lp';
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
                
                $buffer .= 'movetonewparent, tool_lp';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section164e871b9170fd2140595670ad4f9c08(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 't/delete';
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
                
                $buffer .= 't/delete';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8f92e409dad2d31675245b12b8825d4e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'delete';
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
                
                $buffer .= 'delete';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section780ebc54f5ef19e1f188642066afc79a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 't/up';
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
                
                $buffer .= 't/up';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section620e7d879dadcbebf8d55b61edb38674(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'moveup';
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
                
                $buffer .= 'moveup';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB7a104ec5a4a10e3c65ec4d3ad0ffcd8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 't/down';
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
                
                $buffer .= 't/down';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section7d4bab31d51544d1336a0b23972d18c4(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'movedown';
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
                
                $buffer .= 'movedown';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section9db0a745b7d79d3bca0842890c0fdbe5(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                    <li class="dropdown-item">
                                        <a href="#" data-action="edit">
                                            {{#pix}}t/edit{{/pix}} {{#str}}edit{{/str}}
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="#" data-action="move">
                                            {{#pix}}t/move{{/pix}} {{#str}}movetonewparent, tool_lp{{/str}}
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="#" data-action="delete">
                                            {{#pix}}t/delete{{/pix}} {{#str}}delete{{/str}}
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="#" data-action="moveup">
                                            {{#pix}}t/up{{/pix}} {{#str}}moveup{{/str}}
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="#" data-action="movedown">
                                            {{#pix}}t/down{{/pix}} {{#str}}movedown{{/str}}
                                        </a>
                                    </li>
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
                
                $buffer .= $indent . '                                    <li class="dropdown-item">
';
                $buffer .= $indent . '                                        <a href="#" data-action="edit">
';
                $buffer .= $indent . '                                            ';
                // 'pix' section
                $value = $context->find('pix');
                $buffer .= $this->section06156a95c0067bea78d4929542c7acc4($context, $indent, $value);
                $buffer .= ' ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->sectionAd3b4bf865abc6ce6b96cc2301a00c9b($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '                                        </a>
';
                $buffer .= $indent . '                                    </li>
';
                $buffer .= $indent . '                                    <li class="dropdown-item">
';
                $buffer .= $indent . '                                        <a href="#" data-action="move">
';
                $buffer .= $indent . '                                            ';
                // 'pix' section
                $value = $context->find('pix');
                $buffer .= $this->section5d6027d61e3baee0d60eb47bed124409($context, $indent, $value);
                $buffer .= ' ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section502e48c5c644e7959c2e3322cd65149a($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '                                        </a>
';
                $buffer .= $indent . '                                    </li>
';
                $buffer .= $indent . '                                    <li class="dropdown-item">
';
                $buffer .= $indent . '                                        <a href="#" data-action="delete">
';
                $buffer .= $indent . '                                            ';
                // 'pix' section
                $value = $context->find('pix');
                $buffer .= $this->section164e871b9170fd2140595670ad4f9c08($context, $indent, $value);
                $buffer .= ' ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section8f92e409dad2d31675245b12b8825d4e($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '                                        </a>
';
                $buffer .= $indent . '                                    </li>
';
                $buffer .= $indent . '                                    <li class="dropdown-item">
';
                $buffer .= $indent . '                                        <a href="#" data-action="moveup">
';
                $buffer .= $indent . '                                            ';
                // 'pix' section
                $value = $context->find('pix');
                $buffer .= $this->section780ebc54f5ef19e1f188642066afc79a($context, $indent, $value);
                $buffer .= ' ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section620e7d879dadcbebf8d55b61edb38674($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '                                        </a>
';
                $buffer .= $indent . '                                    </li>
';
                $buffer .= $indent . '                                    <li class="dropdown-item">
';
                $buffer .= $indent . '                                        <a href="#" data-action="movedown">
';
                $buffer .= $indent . '                                            ';
                // 'pix' section
                $value = $context->find('pix');
                $buffer .= $this->sectionB7a104ec5a4a10e3c65ec4d3ad0ffcd8($context, $indent, $value);
                $buffer .= ' ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section7d4bab31d51544d1336a0b23972d18c4($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '                                        </a>
';
                $buffer .= $indent . '                                    </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section0ec258893eb34cd9f7380a2dacf14623(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 't/viewdetails';
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
                
                $buffer .= 't/viewdetails';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3175479cbbaa69a01678f07bb072fe13(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'linkedcourses, tool_lp';
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
                
                $buffer .= 'linkedcourses, tool_lp';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section22ee337edf54458589e0dbd973a89fe1(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 't/add';
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
                
                $buffer .= 't/add';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE16694b4cdb95d45a9839039bde94e91(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'addcrossreferencedcompetency, tool_lp';
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
                
                $buffer .= 'addcrossreferencedcompetency, tool_lp';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF3103fb48ab4f3b6ec40803419f475e2(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'competencyrule, tool_lp';
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
                
                $buffer .= 'competencyrule, tool_lp';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF1e5cff19fb1284980f2fba173fc3d74(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                    <li class="dropdown-item">
                                        <a href="#" data-action="relatedcompetencies">
                                            {{#pix}}t/add{{/pix}} {{#str}}addcrossreferencedcompetency, tool_lp{{/str}}
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="#" data-action="competencyrules">
                                            {{#pix}}t/edit{{/pix}} {{#str}}competencyrule, tool_lp{{/str}}
                                        </a>
                                    </li>
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
                
                $buffer .= $indent . '                                    <li class="dropdown-item">
';
                $buffer .= $indent . '                                        <a href="#" data-action="relatedcompetencies">
';
                $buffer .= $indent . '                                            ';
                // 'pix' section
                $value = $context->find('pix');
                $buffer .= $this->section22ee337edf54458589e0dbd973a89fe1($context, $indent, $value);
                $buffer .= ' ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->sectionE16694b4cdb95d45a9839039bde94e91($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '                                        </a>
';
                $buffer .= $indent . '                                    </li>
';
                $buffer .= $indent . '                                    <li class="dropdown-item">
';
                $buffer .= $indent . '                                        <a href="#" data-action="competencyrules">
';
                $buffer .= $indent . '                                            ';
                // 'pix' section
                $value = $context->find('pix');
                $buffer .= $this->section06156a95c0067bea78d4929542c7acc4($context, $indent, $value);
                $buffer .= ' ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->sectionF3103fb48ab4f3b6ec40803419f475e2($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '                                        </a>
';
                $buffer .= $indent . '                                    </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section36aea98d83dc89f39875a5f5db8aedc0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'nocompetencyselected, tool_lp';
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
                
                $buffer .= 'nocompetencyselected, tool_lp';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section19bce95cfe645c4aeb75f48fbb7f2dfd(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                    <button class="btn btn-secondary" data-action="add">{{#pix}}t/add{{/pix}} <span data-region="term"></span></button>
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
                
                $buffer .= $indent . '                    <button class="btn btn-secondary" data-action="add">';
                // 'pix' section
                $value = $context->find('pix');
                $buffer .= $this->section22ee337edf54458589e0dbd973a89fe1($context, $indent, $value);
                $buffer .= ' <span data-region="term"></span></button>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section490630ca92ce152d033410a641d2e483(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' {{{framework.shortname}}} ';
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
                
                $buffer .= ' ';
                $value = $this->resolveValue($context->findDot('framework.shortname'), $context);
                $buffer .= $value;
                $buffer .= ' ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section739d550e29ff23d01623ced62adfe993(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
// Initialise the JS.
require([\'tool_lp/tree\', \'tool_lp/competencytree\', \'tool_lp/competencyactions\', \'jquery\'],
        function(ariatree, treeModel, actions, $) {

    treeModel.init({{framework.id}},
                   {{#quote}} {{{framework.shortname}}} {{/quote}},
                   \'{{search}}\',
                   \'[data-enhance=tree]\',
                   {{canmanage}});

    actions.init(treeModel, {{pagecontextid}}, \'{{{framework.taxonomies}}}\', {{{rulesmodules}}});

});
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
                
                $buffer .= $indent . '// Initialise the JS.
';
                $buffer .= $indent . 'require([\'tool_lp/tree\', \'tool_lp/competencytree\', \'tool_lp/competencyactions\', \'jquery\'],
';
                $buffer .= $indent . '        function(ariatree, treeModel, actions, $) {
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '    treeModel.init(';
                $value = $this->resolveValue($context->findDot('framework.id'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= ',
';
                $buffer .= $indent . '                   ';
                // 'quote' section
                $value = $context->find('quote');
                $buffer .= $this->section490630ca92ce152d033410a641d2e483($context, $indent, $value);
                $buffer .= ',
';
                $buffer .= $indent . '                   \'';
                $value = $this->resolveValue($context->find('search'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '\',
';
                $buffer .= $indent . '                   \'[data-enhance=tree]\',
';
                $buffer .= $indent . '                   ';
                $value = $this->resolveValue($context->find('canmanage'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= ');
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '    actions.init(treeModel, ';
                $value = $this->resolveValue($context->find('pagecontextid'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= ', \'';
                $value = $this->resolveValue($context->findDot('framework.taxonomies'), $context);
                $buffer .= $value;
                $buffer .= '\', ';
                $value = $this->resolveValue($context->find('rulesmodules'), $context);
                $buffer .= $value;
                $buffer .= ');
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '});
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
