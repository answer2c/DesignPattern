package Singleton

//饿汉单例

var Instance2 *Object = &Object{}

func GetInstance2() *Object {
	return Instance2
}
