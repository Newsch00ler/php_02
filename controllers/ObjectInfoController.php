<?php

class ObjectInfoController extends TwigBaseController {
    public $template = "base_info.twig"; // указываем шаблон

    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT info, description, id FROM rappers WHERE id= :my_id");
        // подвязываем значение в my_id 
        $query->bindValue("my_id", $this->params['id']);
        $query->execute(); // выполняем запрос

        // тянем данные
        $data = $query->fetch();
        
        $context['info'] = $data['info'];
        $context['description'] = $data['description'];
        $context['id'] = $data['id'];

        return $context;
    }
}