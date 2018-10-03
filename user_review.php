<?php
class UserReview{
 
    // database connection and table name
    private $conn;
    private $table_name = "user_review";
 
    // object properties
    public $id;
    public $order_id;
    public $product_id;
    public $user_id;
    public $rating;
    public $review;
    public $created_at;
    public $updated_at;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// read products
	function read(){
 
		// select all query
		$query = "SELECT
					* FROM " . $this->table_name;
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// execute query
		$stmt->execute();
	 
		return $stmt;
	}
	
	// create product
	function create(){
	 
		// query to insert record
		$query = "INSERT INTO
					" . $this->table_name . "
				SET
					order_id=:order_id, 
					product_id=:product_id, 
					user_id=:user_id, 
					rating=:rating, 
					review=:review, 
					created_at=:created_at";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->order_id=htmlspecialchars(strip_tags($this->order_id));
		$this->product_id=htmlspecialchars(strip_tags($this->product_id));
		$this->user_id=htmlspecialchars(strip_tags($this->user_id));
		$this->rating=htmlspecialchars(strip_tags($this->rating));
		$this->review=htmlspecialchars(strip_tags($this->review));
		$this->created_at=htmlspecialchars(strip_tags($this->created_at));
	 
		// bind values
		$stmt->bindParam(":order_id", $this->order_id);
		$stmt->bindParam(":product_id", $this->product_id);
		$stmt->bindParam(":user_id", $this->user_id);
		$stmt->bindParam(":rating", $this->rating);
		$stmt->bindParam(":review", $this->review);
		$stmt->bindParam(":created_at", $this->created_at);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
		 
	}
	// update the product
	function update(){
	 
		// update query
		$query = "UPDATE
					" . $this->table_name . "
				SET
					order_id=:order_id, 
					product_id=:product_id, 
					user_id=:user_id, 
					rating=:rating, 
					review=:review
				WHERE
					id = :id";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->order_id=htmlspecialchars(strip_tags($this->order_id));
		$this->product_id=htmlspecialchars(strip_tags($this->product_id));
		$this->user_id=htmlspecialchars(strip_tags($this->user_id));
		$this->rating=htmlspecialchars(strip_tags($this->rating));
		$this->review=htmlspecialchars(strip_tags($this->review));
		
		$this->id=htmlspecialchars(strip_tags($this->id));
	 
		// bind new values
		$stmt->bindParam(":order_id", $this->order_id);
		$stmt->bindParam(":product_id", $this->product_id);
		$stmt->bindParam(":user_id", $this->user_id);
		$stmt->bindParam(":rating", $this->rating);
		$stmt->bindParam(":review", $this->review);
		
		$stmt->bindParam(':id', $this->id);
	 
		// execute the query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
	}
	
	// delete the product
	function delete(){
	 
		// delete query
		$query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->id=htmlspecialchars(strip_tags($this->id));
	 
		// bind id of record to delete
		$stmt->bindParam(1, $this->id);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
		 
	}
}