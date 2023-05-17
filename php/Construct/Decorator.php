<?php

//内容组件
interface TextComponent {
     function output() :string;
}

class PlainText implements TextComponent {
    protected $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function output(): string
    {
        return $this->content;
    }
}

abstract class BaseDecorator implements TextComponent {
    protected $component;
    public function __construct(TextComponent $component)
    {
        $this->component = $component;
    }

    public function output(): string
    {
        return $this->component->output();
    }
}

class InvalidTagDecorator extends BaseDecorator {
    public function output(): string
    {

        $text =  parent::output();
        return preg_replace("/>?/", "", $text);
    }
}

class HtmlTagDecorator extends BaseDecorator {
    public function output(): string
    {

        $text =  parent::output();
        return strip_tags($text);
    }
}

class SensitiveDecorator extends  BaseDecorator {
    public function output(): string
    {

        $text =  parent::output();
        return preg_replace("/damn/", "", $text);
    }
}


$text = "damnhasifnsodij[a<p>";
$plain = new PlainText($text);
$htmlDec = new HtmlTagDecorator($plain);
var_dump($htmlDec->output());

$sensitiveDec = new SensitiveDecorator($htmlDec);
var_dump($sensitiveDec->output());
