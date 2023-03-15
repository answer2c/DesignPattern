package Factory

import "fmt"

/*
*
实体对象的定义
*/
type Btn interface {
	Click()
}

type WinBtn struct{}

type MacBtn struct{}

func (w *WinBtn) Click() {
	fmt.Println("btn on windows have been  clicked...")
}
func (m *MacBtn) Click() {
	fmt.Println("btn on mac have been  clicked...")
}

type CheckBox interface {
	Choose()
}

type WinCheckBox struct{}
type MacCheckBox struct{}

func (w *WinCheckBox) Choose() {
	fmt.Println("checkbox on windows have benn chosen...")
}

func (m *MacCheckBox) Choose() {
	fmt.Println("checkbox on mac have benn chosen...")
}

/**
工厂定义
*/

type Factory interface {
	CreateBtn() Btn
	CreateCheckBox() CheckBox
}

type WinFactory struct{}

type MacFactory struct{}

func (w *WinFactory) CreateBtn() Btn {
	return new(WinBtn)
}

func (w *WinFactory) CreateCheckBox() CheckBox {
	return new(WinCheckBox)
}

func (m *MacFactory) CreateBtn() Btn {
	return new(MacBtn)
}

func (m *MacFactory) CreateCheckBox() CheckBox {
	return new(MacCheckBox)
}

func Execute3() {
	factory := MacFactory{}
	btn := factory.CreateBtn()
	checkbox := factory.CreateCheckBox()
	btn.Click()
	checkbox.Choose()
}
