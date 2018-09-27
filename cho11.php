$array = array();//先定义一个空数组变量用来保存查询结果
		if ( mysqli_num_rows($result)>0 ) {
			echo "找到了".mysqli_num_rows($result)."条记录";
			//将查询结果转换成为数组,才能显示在网页上
			while( $arr = mysqli_fetch_object($result) ){
				// 将每条记录转换成数组,放到$array[]数组中
				$array[]= $arr;
			}
			var_dump( $array);
		}
		// if ($result) {
		// 	echo "数据插入成功"; 
		// }else{
		// 	echo "数据插入失败";
		// }
	// 4.关闭连接,释放资源
	mysqli_close($conn);
