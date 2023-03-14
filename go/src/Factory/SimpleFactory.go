package Factory

import "fmt"

func Execute() {
	im := createIm("feishu")
	im.Send("hello ?")
}

type IM interface {
	Send(msg string)
}

type Wechat struct{}

type Feishu struct{}

func (f *Feishu) Send(msg string) {
	fmt.Println("Send msg by feishu:" + msg)
}

func (w *Wechat) Send(msg string) {
	fmt.Println("Send msg by wechat:" + msg)
}

func createIm(t string) IM {
	switch t {
	case "wechat":
		return &Wechat{}
	case "feishu":
		return &Feishu{}
	}
	panic("invalid im type")
}
