<?php
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", "On");
class File{
    private $conn; //数据库连接句柄
    private $table_name = "files"; //数据库表名
    public $destination; //文件上传路径
    public $filename; //文件名
    public $file; //服务器上临时文件夹内文件名

    // 初始化
    public function __construct($db){
        $this->conn = $db;
    }

    
    function upload(){
	if (move_uploaded_file($this->file, $this->destination)) {
		
		// query to insert record
        	$query = "INSERT INTO " . $this->table_name . " SET filename=:filename";
        	$stmt = $this->conn->prepare($query);

       	 	// sanitize
       		$this->filename=htmlspecialchars(strip_tags($this->filename));

        	// bind values
        	$stmt->bindParam(":filename", $this->filename);
		if($stmt->execute()){
        //        	echo "File uploaded successfully";
	    	 }
		else{
	//		echo "Failed to execute sql query :".$query;
		}
        } 
	else {
        //    echo "Failed to upload file.";
        }
    }
    
    function download($filename){
	$query = "SELECT * FROM " . $this->table_name . " WHERE filename=:filename";
        $stmt = $this->conn->prepare($query);
        $filename=htmlspecialchars(strip_tags($filename));
        $stmt->bindParam(":filename",$filename);
        if($stmt->execute()){ // 处理打算执行的SQL命令
        	$result = $stmt->fetchAll();    
		if(count($result)>=1)//取出查询结果
            	{
                $filepath = "../../uploads/".$filename;
                if (file_exists($filepath)) {
                   # header('Content-Description: File Transfer');
                   # header('Content-Type: application/octet-stream');
                   # header('Content-Disposition: attachment; filename=' . basename($filepath));
                   # header('Expires: 0');
                   # header('Cache-Control: must-revalidate');
                   # header('Pragma: public');
                   # header('Content-Length: ' . filesize($filepath));
		     readfile($filepath);
                }
                
            	}
        }
        else {
            echo "Failed to download file.";
        }
    }

    function read(){
        // select all query
        $query = "SELECT * FROM " . $this->table_name;
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
	$result = $stmt->fetchAll();
        return $result;
    }

}
?>

