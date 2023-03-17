package main

import (
	"Singleton"
	"fmt"
)

func main() {
	//Generator.Execute()
	instance := Singleton.GetInstance()
	fmt.Print(instance)
}
