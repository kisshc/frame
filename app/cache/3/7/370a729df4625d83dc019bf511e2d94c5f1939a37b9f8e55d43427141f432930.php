<?php

/* news.html */
class __TwigTemplate_370a729df4625d83dc019bf511e2d94c5f1939a37b9f8e55d43427141f432930 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "--------------------------------<BR/>
";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["TITLE"]) ? $context["TITLE"] : null), "html", null, true);
        echo " : ";
        echo twig_escape_filter($this->env, (isset($context["CREATE_TIME"]) ? $context["CREATE_TIME"] : null), "html", null, true);
        echo "<BR/>
--------------------------------<BR/>
";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["CONTENT"]) ? $context["CONTENT"] : null), "html", null, true);
        echo "<BR/>";
    }

    public function getTemplateName()
    {
        return "news.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 4,  22 => 2,  19 => 1,);
    }
}
