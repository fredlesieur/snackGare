<?php

use App\Config\Db;
use PHPUnit\Framework\TestCase;
use App\Models\Model;
use App\Models\TestModel;
use PDO;
use PDOStatement;


class ModelTest extends TestCase
{
    private $model;
    private $pdoMock;
    private $stmtMock;

    protected function setUp(): void
    {
        // Création des mocks
        $this->pdoMock = $this->createMock(PDO::class);
        $this->stmtMock = $this->createMock(PDOStatement::class);

        // Configuration pour renvoyer le mock stmt pour `prepare` et `query`
        $this->pdoMock->method('prepare')->willReturn($this->stmtMock);
        $this->pdoMock->method('query')->willReturn($this->stmtMock);

        // Configuration du mock pour `execute` et `rowCount`
        $this->stmtMock->method('execute')->willReturn(true);
        $this->stmtMock->method('rowCount')->willReturn(1);

        // Initialisation du modèle avec le mock PDO
        $this->model = new Model($this->pdoMock);
    }

    public function testFindAll()
    {
        // Configuration pour que fetchAll renvoie un tableau simulé
        $this->stmtMock->method('fetchAll')->willReturn([
            ['id' => 19, 'name' => 'test'],
            ['id' => 20, 'name' => 'Updated Name'],
            ['id' => 21, 'name' => 'fetchall']
        ]);

        $resultat = $this->model->findAll();
        
        $this->assertIsArray($resultat);
        $this->assertNotEmpty($resultat);
        $this->assertCount(3, $resultat); // Vérifie qu'il y a 3 résultats
        $this->assertEquals('test', $resultat[0]['name']); // Vérifie le premier élément
    }


    public function testFindBy()
    {
        $this->stmtMock->method('fetchAll')->willReturn([['id' => 15, 'name' => 'test']]);

        $criteres = ['name' => 'test'];
        $resultat = $this->model->findBy($criteres);
        $this->assertIsArray($resultat);
        $this->assertNotEmpty($resultat);
    }

    public function testFind()
    {
        // Configuration pour que fetch renvoie un seul enregistrement
        $this->stmtMock->method('fetch')->willReturn(['id' => 20, 'name' => 'Updated Name']);
        
        $resultat = $this->model->find(20);
        
        $this->assertIsArray($resultat);
        $this->assertEquals('Updated Name', $resultat['name']);
        $this->assertEquals(20, $resultat['id']);
    }


    public function testCreate()
    {
        $this->stmtMock->method('execute')->willReturn(true);
        $this->stmtMock->method('rowCount')->willReturn(1);

        $this->pdoMock->method('prepare')->willReturn($this->stmtMock);

        $this->model = new Model($this->pdoMock);
        $this->model->setName('test');

        $result = $this->model->create();
        $this->assertTrue($result);
    }

    public function testUpdate()
    {
        // Configure `execute` pour retourner true et `rowCount` pour retourner 1
        $this->stmtMock->method('execute')->willReturn(true);
        $this->stmtMock->method('rowCount')->willReturn(1);
    
        // Force prepare à renvoyer le mock stmt
        $this->pdoMock->method('prepare')->willReturn($this->stmtMock);
    
        // Réinitialise le modèle avec le mock PDO
        $this->model = new Model($this->pdoMock);
    
        // Configure un id et un nom pour `update`
        $this->model->setId(20); // Correspond à l'ID existant dans la table
        $this->model->setName('Updated Name'); // Correspond au nom attendu
    
        // Appelle update() et observe le résultat
        $result = $this->model->update(20);
    
        // Vérification de la réussite
        $this->assertTrue($result);
    }

public function testDelete()
{
    // Configure `execute` pour retourner true
    $this->stmtMock->method('execute')->willReturn(true);
    $this->stmtMock->method('rowCount')->willReturn(1);

    // Force prepare à renvoyer le mock stmt
    $this->pdoMock->method('prepare')->willReturn($this->stmtMock);

    // Injecte le mock PDO
    $this->model = new Model($this->pdoMock);

    // Configure un id pour `delete`
    $this->model->setId(22);

    // Appelle delete() et observe le résultat
    $result = $this->model->delete($this->model->getId());

    // Vérification de la réussite
    $this->assertTrue($result);
}

public function testReq()
{
    // Mock pour tester une requête SELECT
    $sql = "SELECT * FROM test_table WHERE id = ?";
    $params = [1];

    $this->stmtMock->method('execute')->willReturn(true);
    $this->stmtMock->method('fetchAll')->willReturn([['id' => 1, 'name' => 'Test Name']]);
    
    $this->pdoMock->method('prepare')->with($sql)->willReturn($this->stmtMock);

    $this->model = new Model($this->pdoMock);
    
    $result = $this->model->req($sql, $params);

    // Vérifie que l'objet retourné est bien un PDOStatement
    $this->assertInstanceOf(PDOStatement::class, $result);
    // Vérifie le contenu de la requête
    $fetchedResult = $result->fetchAll();
    $this->assertNotEmpty($fetchedResult);
    $this->assertEquals('Test Name', $fetchedResult[0]['name']);
}

public function testHydrate()
{
    $data = ['id' => 10, 'name' => 'Hydrated Name'];
    $this->model = new Model();
    
    // Utilise la méthode hydrate
    $this->model->hydrate($data);

    // Vérifie que les propriétés ont bien été définies
    $this->assertEquals(10, $this->model->getId());
    $this->assertEquals('Hydrated Name', $this->model->getName());
}

}
