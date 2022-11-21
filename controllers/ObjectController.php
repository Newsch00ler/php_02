<?php

class ObjectController extends TwigBaseController {
    public $template = "__object.twig"; // указываем шаблон

    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT description, id FROM rappers WHERE id= :my_id");
        // подвязываем значение в my_id 
        $query->bindValue("my_id", $this->params['id']);
        $query->execute(); // выполняем запрос

        // тянем данные
        $data = $query->fetchAll();
        
        $context['description'] = $data['description'];
        $context['id'] = $data['id'];

        return $context;
    }
}