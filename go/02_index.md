1. 卫述语句
a, b := 4, 0
res, err := divisionInt(a, b)
if err != nil {
	fmt.Println(err.Error())
	return
}
fmt.Println(a, "除以", b, "的结果是 ", res)

2. 空白标识符(_)