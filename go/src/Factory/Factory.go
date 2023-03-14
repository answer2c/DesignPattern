package Factory

import "fmt"

func Execute2() {
	factory := new(WechatFactory)
	im := factory.create()
	im.Send("hello ?")

}

type IM2 interface {
	Send(msg string)
}

type Wechat2 struct{}

type Feishu2 struct{}

func (w *Wechat2) Send(msg string) {
	fmt.Println("Send msg by wechat:" + msg)
}

func (f *Feishu2) Send(msg string) {
	fmt.Println("Send msg by feishu:" + msg)
}

type abstractFactory interface {
	create() IM2
}

type WechatFactory struct{}
type FeishuFactory struct{}

func (w *WechatFactory) create() IM2 {
	return new(Wechat2)
}

func (f *FeishuFactory) create() IM2 {
	return new(Feishu2)
}
