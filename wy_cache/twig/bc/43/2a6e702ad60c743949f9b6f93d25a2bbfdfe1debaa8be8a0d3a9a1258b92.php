<?php

/* page.html */
class __TwigTemplate_bc432a6e702ad60c743949f9b6f93d25a2bbfdfe1debaa8be8a0d3a9a1258b92 extends Twig_Template
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
        echo "<!doctype html>
<html>
<head>
    <title>Page ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "page_title"), "html", null, true);
        echo " - Wayang CMS</title>
</head>
<body>
    <h1>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "page_title"), "html", null, true);
        echo "</h1>
    ";
        // line 8
        echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "page_content");
        echo "
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "page.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 8,  30 => 7,  24 => 4,  19 => 1,);
    }
}
