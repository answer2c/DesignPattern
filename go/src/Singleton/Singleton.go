package Singleton

import (
	"sync"
)

//懒汉单例 加锁操作

type Object struct {
	name string
}

var Instance *Object
var lock sync.Mutex

func GetInstance() *Object {
	if Instance != nil {
		return Instance
	}
	lock.Lock()
	defer lock.Unlock()
	if Instance == nil {
		Instance = &Object{
			name: "lazy guy",
		}
	}
	return Instance
}
