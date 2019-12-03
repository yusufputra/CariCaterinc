<?php
require_once 'connection.php';

class USER{
	private $db;
 
    public function __construct($DB_conn)
    {
    	$this->db = $DB_conn;
    }

    public function deleteslider($id)
    {
        try {
            $sql    = "DELETE FROM `slider` WHERE `id_slider` = '$id'";
            $sql    = $this->db->query($sql);

            return $sql;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addslider($target_dir_up,$target_dir,$target_file_up,$target_file,$file,$file_tmp,$file_size,$uploadOk,$imageFileType,$judul)
    {
        try {
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
            $uploadOk = 0;
            }

            move_uploaded_file($file_tmp, $target_file_up);
            $sql    = "INSERT INTO `slider`(`id_slider`, `gambar`, `judul`) VALUES (null,'$target_file', '$judul')";
            $sql    = $this->db->query($sql);

            return $sql;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addToDelivered($pemesan,$user_id,$date)
    {
        try{
            $query_deliv    = $this->db->query("SELECT * FROM `order` WHERE `pemesan` = '$pemesan' AND `penjual` = '$user_id'");
            $deliv          = $query_deliv->fetch_all();
            $row_deliv      = $query_deliv->num_rows;
            

            for ($i=0; $i < $row_deliv; $i++) { 
                $id_konten  = $deliv[$i][1];
                $pemesan    = $deliv[$i][2];
                $penjual    = $deliv[$i][3];
                $qty        = $deliv[$i][4];
                $jumlah     = $deliv[$i][5];
                $notes      = $deliv[$i][6];
            
            $sql        = "INSERT INTO `delivered`(`id_deliv`, `id_konten`, `pemesan`, `penjual`, `qty`, `jumlah`, `notes`, `date`) VALUES (null,'$id_konten','$pemesan','$penjual','$qty','$jumlah','$notes','$date')";
            $sql        = $this->db->query($sql);
            //echo var_dump($order);
            
        }

        return $sql;
            

        }catch(PDOExeception $e){
            echo $e->getMessage();
        }
    }

    public function deleteFromOrder($pemesan,$user_id)
    {
        try {
            $sql    = "DELETE FROM `order` WHERE `pemesan` = '$pemesan' AND `penjual` = '$user_id'";
            $sql    = $this->db->query($sql);

            return $sql;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteOrder($user_id)
    {
        try {
            $sql    = "DELETE FROM `cart` WHERE `pemesan` = '$user_id'";
            $sql    = $this->db->query($sql);

            return $sql;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addToOrder($note,$user_id,$date)
    {
        try{
            $query_order    = $this->db->query("SELECT * FROM `cart` WHERE `pemesan` = '$user_id'");
            $order          = $query_order->fetch_all();
            $row_order      = $query_order->num_rows;
            //echo var_dump($order);

            for ($i=0; $i < $row_order; $i++) { 
                $id_konten  = $order[$i][1];
                $pemesan    = $order[$i][2];
                $penjual    = $order[$i][3];
                $qty        = $order[$i][4];
                $jumlah     = $order[$i][5];
            
            $sql        = "INSERT INTO `order`(`id_order`, `id_konten`, `pemesan`, `penjual`, `qty`, `jumlah`, `notes`, `date`) VALUES (NULL,'$id_konten','$pemesan','$penjual','$qty','$jumlah','$note','$date')";
            $sql        = $this->db->query($sql);
        }

        return $sql;

        }catch(PDOExeception $e){
            echo $e->getMessage();
        }
    }

    public function editUser($id,$name,$username,$email,$telp,$address)
    {
    	try{
    		$sql 		= "UPDATE `user` SET `name`='$name',`user`='$username',`email`='$email',`telepon`='$telp',`alamat` = '$address' WHERE `id`='$id'";
        	$sql		= $this->db->query($sql);

        return $sql;

    	}catch(PDOExeception $e){
    		echo $e->getMessage();
    	}

    }

    public function addToCart($user_id,$cart,$qty,$user,$harga,$seller)
    {
    	try{
    		$jumlah = $qty * $harga;
    		$sql 	= "INSERT INTO `cart`(`id_cart`, `id_konten`, `pemesan`, `penjual`, `qty`, `jumlah`) VALUES (null,'$cart','$user_id','$seller','$qty','$jumlah')";
    		$sql 	= $this->db->query($sql);

    		return $sql;
    	}catch(PDOExeception $e){
    		echo $e->getMessage;
    	}
    }

    public function deleteUser($id)
    {
    	try{
    		$sql	= "DELETE FROM `user` WHERE `id` = '$id'";
    		$sql 	= $this->db->query($sql);


    		return $sql;
    	}catch(PDOExeception $e){
    		echo $e->getMessage();
    	}
    }

    public function deletePromo($id)
    {
    	try{
    		$sql	= "DELETE FROM `promo` WHERE `id_promo` = '$id'";
    		$sql 	= $this->db->query($sql);


    		return $sql;
    	}catch(PDOExeception $e){
    		echo $e->getMessage();
    	}
    }

    public function deleteCart($id_konten){
    	try {
    		$sql	= "DELETE FROM `cart` WHERE `id_konten` = '$id_konten'";
    		$sql 	= $this->db->query($sql);

    		return $sql;
    	} catch (PDOException $e) {
    		echo $e->getMessage();
    	}
    }

    public function deleteMenu($judulmenu)
    {
    	try{
            $sql1   = "DELETE FROM `promo` WHERE `judul` = '$judulmenu'";
            $this->db->query($sql1);
    		$sql 	= "DELETE FROM `konten` WHERE `judul` = '$judulmenu'";
    		$sql 	= $this->db->query($sql);

    		return $sql;
    	}catch(PDOExeception $e){
    		echo $e->getMessage(); 
    	}
    }

    public function editMenu($id,$judul,$desc,$harga)
    {
    	try{
    		$sql 	= "UPDATE `konten` SET `judul`='$judul',`deskripsi`='$desc',`harga`='$harga' WHERE `id_konten` = '$id'";
    		$sql 	= $this->db->query($sql);

    		return $sql;
    	}catch(PDOExeception $e){
    		echo $e->getMessage();
    	}
    }

    public function addToPromo($judulmenu)
    {
    	try{
    		$sql 	= "INSERT INTO `promo`(`id_promo`, `judul`) VALUES (null,'$judulmenu')";
    		$sql 	= $this->db->query($sql);
    		
    		return $sql;
    	}catch(PDOExeception $e){
    		echo $e->getMessage();
    	}
    }


    public function addComment($commentText,$user_id,$seller)
    {
    	try{
    		$sql	= "INSERT INTO `comment`(`comment`, `user`, `commentor`) VALUES ('$commentText','$seller','$user_id')";
    		$sql	= $this->db->query($sql);
    		
            

    		return $sql;
    	}catch(PDOExeception $e){
    		echo $e->getMessage();
    	}

    }

    public function deleteKomentar($id)
    {
    	try{
    		$sql 	= "DELETE FROM `comment` WHERE `id_comment` = '$id'";
    		$sql 	= $this->db->query($sql);

    		return $sql;
    	}catch(PDOExeception $e){
    		echo $e->getMessage(); 
    	}
    }

    public function editslider($target_dir_up,$target_dir,$target_file_up,$target_file,$file,$file_tmp,$file_size,$uploadOk,$imageFileType,$id,$judul)
    {
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
            $uploadOk = 0;
        }

        move_uploaded_file($file_tmp, $target_file_up);

        $sql    = "UPDATE `slider` SET `gambar`='$target_file',`Judul`='$judul' WHERE `id_slider` = '$id'";
        $sql    = $this->db->query($sql);

        return $sql;
    }

    public function addMenu($judul,$target_dir,$target_file,$file,$file_tmp,$file_size,$uploadOk,$imageFileType,$cat,$minor,$time,$harga,$desk,$user_id,$cat_mkn)
	{
		try{
		/*
		$check		= getimagesize($file_tmp);
		if($check === TRUE){
			$uploadOk = 1;
		}else{
			$uploadOk = 0;
		}

		if($file_size > 500000){
			$uploadOk = 0;
		}
		*/
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
			$uploadOk = 0;
		}

		move_uploaded_file($file_tmp, $target_file);
		$sql	= "INSERT INTO `konten`(`id_konten`, `judul`, `deskripsi`, `harga`, `rate`, `pict`, `kategori`, `kategori_makan`, `waktu`, `minor`, `user`) VALUES (null, '$judul', '$desk', '$harga', '0', '$target_file', '$cat', '$cat_mkn', '$time', '$minor', '$user_id')";	
		$sql 	= $this->db->query($sql);
		//echo var_dump($sql);
		return $sql;

		}catch(PDOExeception $e)
		{
			echo $e->getMessage();
		}
	}

	public function register($name,$uname,$upass,$email,$telp,$gender,$seller)
	{
		try{
		$new_pass	= base64_encode($upass);
		$sql 		= "INSERT INTO `user`(`id`, `name`, `user`, `password`, `email`, `telepon`, `gender`, `seller`) VALUES (null, '$name', '$uname', '$new_pass', '$email','$telp', '$gender', '$seller')";
        $sql		= $this->db->query($sql);

        return $sql;

		
		}catch(PDOExeception $e)
		{
			echo $e->getMessage();
		}
	}

	public function update($id,$name,$uname,$upass,$email,$telp,$target_file,$target_dir,$file,$file_tmp,$file_size,$uploadOk,$imageFileType,$address)
	{ 
		try{
		

		$new_pass	= base64_encode($upass);
		$check		= getimagesize($file_tmp);

		if($check === TRUE){
			$uploadOk = 1;
		}else{
			$uploadOk = 0;
		}

		if($file_size > 500000){
			$uploadOk = 0;
		}

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
			$uploadOk = 0;
		}

		move_uploaded_file($file_tmp, $target_file);

		$sql 		= "UPDATE `user` SET `name`='$name',`user`='$uname',`password`='$new_pass',`email`='$email',`telepon`='$telp',`alamat` = '$address' , `picture` = '$target_file' WHERE `id`='$id'";
        $sql		= $this->db->query($sql);

        return $sql;

		
		}catch(PDOExeception $e)
		{
			echo $e->getMessage();
		}
	}

	public function login($uname,$upass)
	{
		if($uname == "admin"){
			$upass 		= base64_encode($upass);
			$sql		= $this->db->query("SELECT * FROM `user` WHERE `user` = '$uname' AND `password` = '$upass'");

		if ($sql->num_rows <= 0) {
			return false;
		}

		$_SESSION['user_session'] = $uname;
		header("Location: admin/");
		}
		$upass 		= base64_encode($upass);
		$sql		= $this->db->query("SELECT * FROM `user` WHERE `user` = '$uname' AND `password` = '$upass'");

		if ($sql->num_rows <= 0) {
			return false;
		}

		$_SESSION['user_session'] = $uname;
		return true;
	}

	public function is_loggedin()
	{
		if(isset($_SESSION['user_session'])){
			return true;
		}
	}

	public function redirect($url)
	{
		header("Location: $url");
	}

	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}


    public function editMenu2($id,$judul,$desc,$harga,$cat_mkn,$time,$waktu,$minor)
    {
        try{
            $sql    = "UPDATE `konten` SET `judul`='$judul',`deskripsi`='$desc',`harga`='$harga', `kategori`='$cat_mkn', `kategori_makan`='$time', `waktu`='$waktu', `minor`='$minor' WHERE `id_konten` = '$id'";
            $sql    = $this->db->query($sql);

            return $sql;
        }catch(PDOExeception $e){
            echo $e->getMessage();
        }
    }

    
}
?>