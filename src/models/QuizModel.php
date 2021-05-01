<?php

namespace app\src\models;

use app\src\core\Model;

/**
 * TestModel
 */
class QuizModel extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = "QCM";
        $this->connection();
    }
    public function GetAllByCategoryName()
	{
		$Sql = 'SELECT linkXML,name as category,slug FROM QCM,categories WHERE QCM.category = categories.id;';
		$query = $this->connection->query($Sql);
		return $query->fetchAll();
	}

    public function GetAllByCategoryNameSlug(string $slug)
	{
		$Sql = 'SELECT linkXML,name as category,slug, category as categoryNumber FROM QCM,categories WHERE QCM.category = categories.id AND categories.slug = :slug;';
        $Request = $this->connection->prepare($Sql);
		$Request->bindParam(':slug', $slug);
		$Request->execute();
		return $Request->fetch(\PDO::FETCH_ASSOC);
	}

	public function updateAbilityUser($newDifficulty, $userId, $categoryId){
		$sql = "INSERT INTO abilities VALUES (:user_id, :category_id, :new_difficulty)
				ON DUPLICATE KEY UPDATE difficulty = :new_difficulty";
		$stmt = $query = $this->connection->prepare($sql);
		$stmt->bindParam(':user_id', $userId, \PDO::PARAM_INT);
		$stmt->bindParam(':category_id', $categoryId, \PDO::PARAM_INT);
		$stmt->bindParam(':new_difficulty', $newDifficulty, \PDO::PARAM_INT);
		$stmt->execute();
	}

	

}