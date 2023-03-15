<?php

/**
 * 抽象工厂
 * 工厂需要创建多种不同种类、不同性质实体对象
 * 抽象工厂中定义所有类型实体对象的创建方法
 * 具体工厂来实现某一种类下所有对象的初始化。
 * 以下边的代码为例： 实体对象分为两大类：mac与windows， 而各种类下又包含多个性质的对象：button与checkbox
 */



interface Button {
    function click();
}
class WinButton implements Button {
    function click()
    {
        echo "btn on windows have been clicked... \n";
    }
}
class MacButton implements Button {
    function click()
    {
        echo "btn on mac have been clicked... \n";
    }
}

interface CheckBox{
    function choose();
}

class WinCheckBox implements CheckBox {
    public function choose()
    {
        echo "checkbox on windows have been chosen... \n";
    }
}

class MacCheckBox implements CheckBox {
    public function choose()
    {
        echo "checkbox on mac have been chosen... \n";
    }
}



interface AbstractFactory {

    function createButton() :Button;

    function createCheckBox() :CheckBox;

}


class WindowsFactory implements AbstractFactory {

    function createButton() :WinButton
    {
        return new WinButton();
    }

    function createCheckBox() :WinCheckBox
    {
        return new WinCheckBox();
    }

}

class MacFactory implements AbstractFactory {

    function createButton() :MacButton
    {
        return new MacButton();
    }

    function createCheckBox() :MacCheckBox
    {
        return new MacCheckBox();
    }

}

$factory = new MacFactory();
$button = $factory->createButton();
$checkbox = $factory->createCheckBox();

$button->click();
$checkbox->choose();