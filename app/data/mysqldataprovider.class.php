<?php 

class MySqlDataProvider extends DataProvider {

    private function connect(){
        try {   
            return new PDO($this-> source, CONFIG['db_user'], CONFIG['db_password']);
        } catch (PDOException $e) {
            return null;
        }
    }

    
    public function get_terms(){
        $db = $this -> connect();

        if($db == null){
            return [];
        }

        $query = $db -> query('SELECT * FROM terms ');
        
        $data = $query -> fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        $query = null;
        $db = null;

        return $data;


    }

    public function get_term($term){
       
        $db = $this -> connect();

        if($db == null){
            return ;
        }

        $sql = 'SELECT * FROM terms WHERE id = :id ';
        $statement= $db -> prepare($sql);

        $statement -> execute([
            ":id" => $term,
        ]);
        
        $data = $statement -> fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        if(empty($data)){
            return;
        }

        
        $db = null;

        return $data[0];

    }

    public function add_term($term, $definition){
      $db = $this -> connect();

      if($db == null){
        return;
      }
      $sql = 'INSERT INTO terms (term, definition) VALUES (:term, :definition)';
      $statement = $db -> prepare($sql);

      $statement -> execute([
        ':term' => $term,
        ':definition' => $definition
      ]);

      $statement = null;
      $db = null;

    }

    public function update_term($id, $new_term, $definition){
      
    $db = $this -> connect();

      if($db == null){
        return;
      }
      $sql = 'UPDATE terms SET term = :term, definition= :definition WHERE id =:id';
      $statement = $db -> prepare($sql);

      $statement -> execute([
        ":id" => $id,
        ':term' => $new_term,
        ':definition' => $definition
      ]);

      $statement = null;
      $db = null;

    }

    public function delete_term($id){
     $db = $this -> connect();

      if($db == null){
        return;
      }
      $sql = 'DELETE FROM terms WHERE id =:id';
      $statement = $db -> prepare($sql);

      $statement -> execute([
        ":id" => $id,
        
      ]);

      $statement = null;
      $db = null;
    }

    public function search_terms($search){
       
        $db = $this -> connect();

        if($db == null){
            return[] ;
        }

        $sql = 'SELECT * FROM terms WHERE term LIKE :search OR definition LIKE :search ';
        $statement= $db -> prepare($sql);

        $statement -> execute([
            ":search" => "%".$search."%",
        ]);
        
        $data = $statement -> fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        $statement = null;
        $db = null;

        return $data; 

    }

   


}

?>