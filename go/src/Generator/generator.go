package Generator

import "fmt"

type Car struct {
	wheel  int
	seat   int
	engine string
}

type Bicycle struct {
	wheel  int
	seat   int
	engine string
}

type Builder interface {
	setSeat(num int)
	setWheel(num int)
	setEngine(obj string)
	reset()
}

type CarBuilder struct {
	Product *Car
}
type BicycleBuilder struct {
	Product *Bicycle
}

func (c *CarBuilder) getProduct() *Car {
	product := c.Product
	c.reset()
	return product
}

func (c *CarBuilder) reset() {
	c.Product = new(Car)
}

func (c *CarBuilder) setSeat(num int) {
	c.Product.seat = num
}

func (c *CarBuilder) setWheel(num int) {
	c.Product.wheel = num
}

func (c *CarBuilder) setEngine(obj string) {
	c.Product.engine = obj
}

func (b *BicycleBuilder) setSeat(num int) {
	b.Product.seat = num
}
func (b *BicycleBuilder) setWheel(num int) {
	b.Product.wheel = num
}

func (b *BicycleBuilder) setEngine(obj string) {
	b.Product.engine = obj
}

func (b *BicycleBuilder) reset() {
	b.Product = new(Bicycle)
}

func (b *BicycleBuilder) getProduct() *Bicycle {
	product := b.Product
	b.reset()
	return product
}

func Execute() {
	builder := &BicycleBuilder{}
	//the following steps can be setted in a director class
	builder.reset()
	builder.setWheel(2)
	builder.setSeat(1)
	builder.setEngine("manual")

	bicycle := builder.getProduct()
	fmt.Println(bicycle.seat)
	fmt.Println(bicycle.wheel)
	fmt.Println(bicycle.engine)

}
